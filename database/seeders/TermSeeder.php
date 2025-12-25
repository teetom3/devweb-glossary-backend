<?php

namespace Database\Seeders;

use App\Models\Term;
use Illuminate\Database\Seeder;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $terms = [
            [
                'slug' => 'api',
                'title' => 'API (Application Programming Interface)',
                'category_id' => 4, // Backend & APIs
                'is_approved' => true,
                'created_by_id' => 1,
            ],
            [
                'slug' => 'async-await',
                'title' => 'Async/Await',
                'category_id' => 2, // JavaScript Advanced
                'is_approved' => true,
                'created_by_id' => 1,
            ],
            [
                'slug' => 'closure',
                'title' => 'Closure',
                'category_id' => 2, // JavaScript Advanced
                'is_approved' => true,
                'created_by_id' => 1,
            ],
            [
                'slug' => 'rest-api',
                'title' => 'REST API',
                'category_id' => 4, // Backend & APIs
                'is_approved' => true,
                'created_by_id' => 1,
            ],
            [
                'slug' => 'promise',
                'title' => 'Promise',
                'category_id' => 2, // JavaScript Advanced
                'is_approved' => true,
                'created_by_id' => 1,
            ],
            [
                'slug' => 'jwt',
                'title' => 'JWT (JSON Web Token)',
                'category_id' => 4, // Backend & APIs
                'is_approved' => true,
                'created_by_id' => 1,
            ],
            [
                'slug' => 'component',
                'title' => 'Component',
                'category_id' => 3, // Frontend Architecture
                'is_approved' => true,
                'created_by_id' => 1,
            ],
            [
                'slug' => 'state-management',
                'title' => 'State Management',
                'category_id' => 3, // Frontend Architecture
                'is_approved' => true,
                'created_by_id' => 1,
            ],
            [
                'slug' => 'ci-cd',
                'title' => 'CI/CD',
                'category_id' => 5, // DevOps & Tools
                'is_approved' => true,
                'created_by_id' => 1,
            ],
            [
                'slug' => 'docker',
                'title' => 'Docker',
                'category_id' => 5, // DevOps & Tools
                'is_approved' => true,
                'created_by_id' => 1,
            ],
        ];

        foreach ($terms as $term) {
            Term::create($term);
        }
    }
}
