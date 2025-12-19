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
                'description_short' => 'A set of protocols and tools for building software and applications',
                'is_approved' => true,
                'created_by_id' => 1,
            ],
            [
                'slug' => 'async-await',
                'title' => 'Async/Await',
                'category_id' => 2, // JavaScript Advanced
                'description_short' => 'A modern way to handle asynchronous operations in JavaScript',
                'is_approved' => true,
                'created_by_id' => 1,
            ],
            [
                'slug' => 'closure',
                'title' => 'Closure',
                'category_id' => 2, // JavaScript Advanced
                'description_short' => 'A function that has access to variables in its outer scope',
                'is_approved' => true,
                'created_by_id' => 1,
            ],
            [
                'slug' => 'rest-api',
                'title' => 'REST API',
                'category_id' => 4, // Backend & APIs
                'description_short' => 'An architectural style for designing networked applications using HTTP methods',
                'is_approved' => true,
                'created_by_id' => 1,
            ],
            [
                'slug' => 'promise',
                'title' => 'Promise',
                'category_id' => 2, // JavaScript Advanced
                'description_short' => 'An object representing the eventual completion or failure of an asynchronous operation',
                'is_approved' => true,
                'created_by_id' => 2,
            ],
            [
                'slug' => 'jwt',
                'title' => 'JWT (JSON Web Token)',
                'category_id' => 4, // Backend & APIs
                'description_short' => 'A compact, URL-safe token format for securely transmitting information',
                'is_approved' => true,
                'created_by_id' => 4,
            ],
            [
                'slug' => 'component',
                'title' => 'Component',
                'category_id' => 3, // Frontend Architecture
                'description_short' => 'A reusable, self-contained piece of UI in modern frameworks',
                'is_approved' => true,
                'created_by_id' => 3,
            ],
            [
                'slug' => 'state-management',
                'title' => 'State Management',
                'category_id' => 3, // Frontend Architecture
                'description_short' => 'The practice of managing application data and UI state',
                'is_approved' => true,
                'created_by_id' => 3,
            ],
            [
                'slug' => 'ci-cd',
                'title' => 'CI/CD',
                'category_id' => 5, // DevOps & Tools
                'description_short' => 'Continuous Integration and Continuous Deployment practices',
                'is_approved' => true,
                'created_by_id' => 5,
            ],
            [
                'slug' => 'docker',
                'title' => 'Docker',
                'category_id' => 5, // DevOps & Tools
                'description_short' => 'A platform for developing, shipping, and running applications in containers',
                'is_approved' => true,
                'created_by_id' => 5,
            ],
        ];

        foreach ($terms as $term) {
            Term::create($term);
        }
    }
}
