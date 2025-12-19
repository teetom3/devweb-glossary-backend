<?php

namespace Database\Seeders;

use App\Models\Vote;
use App\Models\Definition;
use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $votes = [
            // Votes for Definition 1 (API - Technical)
            ['definition_id' => 1, 'user_id' => 3, 'value' => 1],
            ['definition_id' => 1, 'user_id' => 4, 'value' => 1],
            ['definition_id' => 1, 'user_id' => 5, 'value' => 1],
            ['definition_id' => 1, 'user_id' => 1, 'value' => 1],

            // Votes for Definition 2 (API - Simple)
            ['definition_id' => 2, 'user_id' => 2, 'value' => 1],
            ['definition_id' => 2, 'user_id' => 3, 'value' => 1],
            ['definition_id' => 2, 'user_id' => 5, 'value' => 1],
            ['definition_id' => 2, 'user_id' => 1, 'value' => 1],
            ['definition_id' => 2, 'user_id' => 4, 'value' => -1],

            // Votes for Definition 3 (Async/Await - Modern)
            ['definition_id' => 3, 'user_id' => 3, 'value' => 1],
            ['definition_id' => 3, 'user_id' => 4, 'value' => 1],
            ['definition_id' => 3, 'user_id' => 5, 'value' => 1],
            ['definition_id' => 3, 'user_id' => 1, 'value' => 1],

            // Votes for Definition 4 (Async/Await - Beginner)
            ['definition_id' => 4, 'user_id' => 2, 'value' => 1],
            ['definition_id' => 4, 'user_id' => 4, 'value' => 1],
            ['definition_id' => 4, 'user_id' => 5, 'value' => 1],

            // Votes for Definition 5 (Closure)
            ['definition_id' => 5, 'user_id' => 3, 'value' => 1],
            ['definition_id' => 5, 'user_id' => 4, 'value' => 1],
            ['definition_id' => 5, 'user_id' => 5, 'value' => 1],
            ['definition_id' => 5, 'user_id' => 1, 'value' => 1],

            // Votes for Definition 6 (REST API)
            ['definition_id' => 6, 'user_id' => 2, 'value' => 1],
            ['definition_id' => 6, 'user_id' => 3, 'value' => 1],
            ['definition_id' => 6, 'user_id' => 5, 'value' => 1],
            ['definition_id' => 6, 'user_id' => 1, 'value' => 1],

            // Votes for Definition 7 (Promise)
            ['definition_id' => 7, 'user_id' => 2, 'value' => 1],
            ['definition_id' => 7, 'user_id' => 4, 'value' => 1],
            ['definition_id' => 7, 'user_id' => 5, 'value' => 1],

            // Votes for Definition 8 (Component)
            ['definition_id' => 8, 'user_id' => 2, 'value' => 1],
            ['definition_id' => 8, 'user_id' => 4, 'value' => 1],
        ];

        foreach ($votes as $vote) {
            Vote::create(array_merge($vote, ['created_at' => now()]));
        }

        // Update scores for all definitions
        Definition::all()->each(function ($definition) {
            $definition->updateScore();
        });
    }
}
