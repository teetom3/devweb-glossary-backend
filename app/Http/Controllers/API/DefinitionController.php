<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Definition;
use App\Models\Term;
use Illuminate\Http\Request;

class DefinitionController extends Controller
{
    public function index(Request $request)
    {
        $query = Definition::with(['term', 'user', 'votes'])
            ->where('is_approved', true);

        if ($request->has('term_id')) {
            $query->where('term_id', $request->term_id);
        }

        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        $definitions = $query->orderBy('score', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return response()->json($definitions);
    }

    public function show($id)
    {
        $definition = Definition::with(['term', 'user', 'votes', 'comments.user'])
            ->where('is_approved', true)
            ->findOrFail($id);

        $definition->incrementViews();

        return response()->json($definition);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'term_id' => 'required|exists:terms,id',
            'title' => 'nullable|string|max:255',
            'explanation' => 'required|string',
            'code_example' => 'nullable|string',
            'demo_url' => 'nullable|url',
        ]);

        // Check if term exists and is approved
        $term = Term::where('id', $validated['term_id'])
            ->where('is_approved', true)
            ->firstOrFail();

        $definition = Definition::create([
            'term_id' => $validated['term_id'],
            'user_id' => $request->user()->id,
            'title' => $validated['title'] ?? null,
            'explanation' => $validated['explanation'],
            'code_example' => $validated['code_example'] ?? null,
            'demo_url' => $validated['demo_url'] ?? null,
            'is_approved' => false,
            'score' => 0,
            'views_count' => 0,
        ]);

        return response()->json($definition, 201);
    }

    public function update(Request $request, $id)
    {
        $definition = Definition::findOrFail($id);

        if ($definition->user_id !== $request->user()->id && !$request->user()->isAdmin()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'explanation' => 'sometimes|string',
            'code_example' => 'nullable|string',
            'demo_url' => 'nullable|url',
        ]);

        $definition->update($validated);

        return response()->json($definition);
    }

    public function destroy(Request $request, $id)
    {
        $definition = Definition::findOrFail($id);

        if ($definition->user_id !== $request->user()->id && !$request->user()->isAdmin()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $definition->delete();

        return response()->json(['message' => 'Definition deleted successfully']);
    }

    public function approve(Request $request, $id)
    {
        if (!$request->user()->isAdmin()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $definition = Definition::findOrFail($id);
        $definition->update(['is_approved' => true]);

        return response()->json($definition);
    }

    public function myDefinitions(Request $request)
    {
        $definitions = Definition::with(['term', 'votes'])
            ->where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return response()->json($definitions);
    }

    public function pending(Request $request)
    {
        if (!$request->user()->isAdmin()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $definitions = Definition::with(['term', 'user'])
            ->where('is_approved', false)
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return response()->json($definitions);
    }
}
