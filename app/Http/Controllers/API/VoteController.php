<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use App\Models\Definition;
use App\Models\User;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function vote(Request $request, $definitionId)
    {
        $validated = $request->validate([
            'value' => 'required|integer|in:-1,1',
        ]);

        $definition = Definition::findOrFail($definitionId);
        $userId = $request->user()->id;

        // Check if user already voted
        $existingVote = Vote::where('definition_id', $definitionId)
            ->where('user_id', $userId)
            ->first();

        if ($existingVote) {
            // If same vote, remove it (toggle)
            if ($existingVote->value == $validated['value']) {
                $existingVote->delete();

                // Update definition score
                $definition->updateScore();

                return response()->json([
                    'message' => 'Vote removed',
                    'vote' => null,
                ]);
            } else {
                // Change vote
                $existingVote->update(['value' => $validated['value']]);

                // Update definition score
                $definition->updateScore();

                // Update user reputation
                $this->updateUserReputation($definition->user_id);

                return response()->json([
                    'message' => 'Vote updated',
                    'vote' => $existingVote,
                ]);
            }
        }

        // Create new vote
        $vote = Vote::create([
            'definition_id' => $definitionId,
            'user_id' => $userId,
            'value' => $validated['value'],
            'created_at' => now(),
        ]);

        // Update definition score
        $definition->updateScore();

        // Update user reputation
        $this->updateUserReputation($definition->user_id);

        return response()->json([
            'message' => 'Vote registered',
            'vote' => $vote,
        ], 201);
    }

    public function getUserVote(Request $request, $definitionId)
    {
        $vote = Vote::where('definition_id', $definitionId)
            ->where('user_id', $request->user()->id)
            ->first();

        return response()->json(['vote' => $vote]);
    }

    private function updateUserReputation($userId)
    {
        $user = User::findOrFail($userId);

        // Calculate total reputation from all definitions
        $definitions = Definition::where('user_id', $userId)->get();
        $totalReputation = 0;

        foreach ($definitions as $definition) {
            $upvotes = $definition->votes()->where('value', 1)->count();
            $downvotes = $definition->votes()->where('value', -1)->count();

            // +10 per upvote, -5 per downvote
            $totalReputation += ($upvotes * 10) - ($downvotes * 5);
        }

        $user->update(['reputation' => max(0, $totalReputation)]);
    }
}
