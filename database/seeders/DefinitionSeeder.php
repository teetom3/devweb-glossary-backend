<?php

namespace Database\Seeders;

use App\Models\Definition;
use App\Models\Term;
use App\Models\User;
use Illuminate\Database\Seeder;

class DefinitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer les termes et utilisateurs
        $apiTerm = Term::where('slug', 'api')->first();
        $asyncAwaitTerm = Term::where('slug', 'async-await')->first();
        $closureTerm = Term::where('slug', 'closure')->first();
        $restApiTerm = Term::where('slug', 'rest-api')->first();
        $promiseTerm = Term::where('slug', 'promise')->first();
        $componentTerm = Term::where('slug', 'component')->first();

        $users = User::where('role', 'user')->get();

        if ($users->count() === 0) {
            return;
        }

        // API definitions
        if ($apiTerm) {
            Definition::create([
                'term_id' => $apiTerm->id,
                'user_id' => $users[0]->id,
                'title' => 'Technical Definition',
                'explanation' => 'An API (Application Programming Interface) is a set of clearly defined methods of communication between various software components. It acts as an intermediary layer that allows different applications to talk to each other without needing to know how they are implemented internally.',
                'code_example' => "// Fetching data from an API\nfetch('https://api.example.com/users')\n  .then(response => response.json())\n  .then(data => console.log(data))\n  .catch(error => console.error('Error:', error));",
                'demo_url' => null,
                'is_approved' => true,
                'score' => 0,
                'views_count' => 45,
            ]);

            if ($users->count() > 2) {
                Definition::create([
                    'term_id' => $apiTerm->id,
                    'user_id' => $users[2]->id,
                    'title' => 'Simple Explanation',
                    'explanation' => "Think of an API like a waiter in a restaurant. You (the client) don't go into the kitchen (the server) to cook your food. Instead, you tell the waiter (the API) what you want, and the waiter brings it to you. The API handles all the communication between you and the kitchen.",
                    'code_example' => "// Simple API request example\nconst getUserData = async (userId) => {\n  const response = await fetch('/api/users/' + userId);\n  return await response.json();\n};",
                    'demo_url' => null,
                    'is_approved' => true,
                    'score' => 0,
                    'views_count' => 32,
                ]);
            }
        }

        // Async/Await definitions
        if ($asyncAwaitTerm) {
            Definition::create([
                'term_id' => $asyncAwaitTerm->id,
                'user_id' => $users[0]->id,
                'title' => 'Modern JavaScript Async Pattern',
                'explanation' => 'Async/await is syntactic sugar built on top of Promises, making asynchronous code look and behave more like synchronous code. It makes code easier to read and maintain by avoiding callback hell and promise chains.',
                'code_example' => "// With async/await\nasync function fetchUserData() {\n  try {\n    const response = await fetch('/api/user');\n    const data = await response.json();\n    console.log(data);\n  } catch (error) {\n    console.error('Failed to fetch:', error);\n  }\n}",
                'demo_url' => null,
                'is_approved' => true,
                'score' => 0,
                'views_count' => 67,
            ]);

            if ($users->count() > 1) {
                Definition::create([
                    'term_id' => $asyncAwaitTerm->id,
                    'user_id' => $users[1]->id,
                    'title' => 'Beginner-Friendly Explanation',
                    'explanation' => "Async/await allows you to write asynchronous code that reads like synchronous code. The 'async' keyword declares an asynchronous function, and 'await' pauses execution until a Promise is resolved.",
                    'code_example' => "// Basic example\nasync function getData() {\n  // Wait for this to finish\n  const user = await fetchUser();\n  \n  // Then do this\n  const posts = await fetchPosts(user.id);\n  \n  return posts;\n}",
                    'demo_url' => null,
                    'is_approved' => true,
                    'score' => 0,
                    'views_count' => 54,
                ]);
            }
        }

        // Closure definitions
        if ($closureTerm) {
            Definition::create([
                'term_id' => $closureTerm->id,
                'user_id' => $users[0]->id,
                'title' => 'JavaScript Closure Explained',
                'explanation' => 'A closure is a function that has access to variables in its outer (enclosing) scope, even after the outer function has returned. This is possible because JavaScript functions form closures over the environment in which they were created.',
                'code_example' => "function createCounter() {\n  let count = 0; // Private variable\n  \n  return {\n    increment: function() {\n      count++;\n      return count;\n    },\n    decrement: function() {\n      count--;\n      return count;\n    },\n    getCount: function() {\n      return count;\n    }\n  };\n}\n\nconst counter = createCounter();\nconsole.log(counter.increment()); // 1",
                'demo_url' => null,
                'is_approved' => true,
                'score' => 0,
                'views_count' => 89,
            ]);
        }

        // REST API definitions
        if ($restApiTerm && $users->count() > 2) {
            Definition::create([
                'term_id' => $restApiTerm->id,
                'user_id' => $users[2]->id,
                'title' => 'RESTful Architecture Principles',
                'explanation' => 'REST (Representational State Transfer) is an architectural style that uses HTTP methods (GET, POST, PUT, DELETE) to perform CRUD operations on resources. Each resource is identified by a URL, and the API is stateless.',
                'code_example' => "// RESTful API endpoints\nGET    /api/users         // Get all users\nGET    /api/users/123     // Get user with ID 123\nPOST   /api/users         // Create a new user\nPUT    /api/users/123     // Update user 123\nDELETE /api/users/123     // Delete user 123",
                'demo_url' => null,
                'is_approved' => true,
                'score' => 0,
                'views_count' => 76,
            ]);
        }

        // Promise definitions
        if ($promiseTerm && $users->count() > 1) {
            Definition::create([
                'term_id' => $promiseTerm->id,
                'user_id' => $users[1]->id,
                'title' => 'Understanding JavaScript Promises',
                'explanation' => 'A Promise is an object representing the eventual completion or failure of an asynchronous operation. It can be in one of three states: pending, fulfilled, or rejected. Promises provide a cleaner alternative to callback-based asynchronous code.',
                'code_example' => "// Creating a Promise\nconst myPromise = new Promise((resolve, reject) => {\n  setTimeout(() => {\n    const success = true;\n    if (success) {\n      resolve('Operation successful!');\n    } else {\n      reject('Operation failed!');\n    }\n  }, 1000);\n});\n\n// Using the Promise\nmyPromise\n  .then(result => console.log(result))\n  .catch(error => console.error(error));",
                'demo_url' => null,
                'is_approved' => true,
                'score' => 0,
                'views_count' => 61,
            ]);
        }

        // Component definitions
        if ($componentTerm && $users->count() > 1) {
            Definition::create([
                'term_id' => $componentTerm->id,
                'user_id' => $users[1]->id,
                'title' => 'React Component Basics',
                'explanation' => 'Components are independent, reusable pieces of UI in React. They accept inputs (props) and return React elements describing what should appear on the screen. Components can be functional or class-based.',
                'code_example' => "// Functional Component\nfunction WelcomeMessage({ name }) {\n  return (\n    <div className=\"welcome\">\n      <h1>Hello, {name}!</h1>\n      <p>Welcome to our application.</p>\n    </div>\n  );\n}\n\n// Usage\n<WelcomeMessage name=\"John\" />",
                'demo_url' => null,
                'is_approved' => true,
                'score' => 0,
                'views_count' => 42,
            ]);
        }
    }
}
