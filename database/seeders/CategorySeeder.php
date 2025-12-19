<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Fundamental Concepts',
                'slug' => 'fundamental-concepts',
                'description' => 'Basic programming and web development concepts that every developer should know',
            ],
            [
                'name' => 'JavaScript Advanced',
                'slug' => 'javascript-advanced',
                'description' => 'Advanced JavaScript topics including async, promises, closures, and more',
            ],
            [
                'name' => 'Frontend Architecture',
                'slug' => 'frontend-architecture',
                'description' => 'Patterns, best practices, and architectural concepts for frontend development',
            ],
            [
                'name' => 'Backend & APIs',
                'slug' => 'backend-apis',
                'description' => 'Server-side development, RESTful APIs, and backend architecture',
            ],
            [
                'name' => 'DevOps & Tools',
                'slug' => 'devops-tools',
                'description' => 'Development tools, CI/CD, deployment, and DevOps practices',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
