<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@devglossary.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'reputation' => 1000,
            'bio' => 'Platform administrator and founder',
        ]);

        // Create regular users
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'reputation' => 250,
            'bio' => 'Full-stack developer passionate about JavaScript',
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'reputation' => 180,
            'bio' => 'Frontend developer & React enthusiast',
        ]);

        User::create([
            'name' => 'Mike Johnson',
            'email' => 'mike@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'reputation' => 320,
            'bio' => 'Backend engineer specializing in APIs',
        ]);

        User::create([
            'name' => 'Sarah Williams',
            'email' => 'sarah@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'reputation' => 150,
            'bio' => 'DevOps engineer and cloud specialist',
        ]);

        // Call other seeders
        $this->call([
            CategorySeeder::class,
            TermSeeder::class,
            ExtendedTermsSeeder::class,
            DefinitionSeeder::class,
            ExtendedDefinitionsSeeder::class,
        ]);
    }
}
