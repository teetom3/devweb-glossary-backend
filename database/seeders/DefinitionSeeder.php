<?php

namespace Database\Seeders;

use App\Models\Definition;
use Illuminate\Database\Seeder;

class DefinitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $definitions = [
            // API definitions
            [
                'term_id' => 1, // API
                'user_id' => 2, // John Doe
                'title' => 'Technical Definition',
                'explanation' => 'An API (Application Programming Interface) is a set of clearly defined methods of communication between various software components. It acts as an intermediary layer that allows different applications to talk to each other without needing to know how they are implemented internally.',
                'code_example' => "// Fetching data from an API\nfetch('https://api.example.com/users')\n  .then(response => response.json())\n  .then(data => console.log(data))\n  .catch(error => console.error('Error:', error));",
                'demo_url' => null,
                'is_approved' => true,
                'score' => 0,
                'views_count' => 45,
            ],
            [
                'term_id' => 1, // API
                'user_id' => 4, // Mike Johnson
                'title' => 'Simple Explanation',
                'explanation' => "Think of an API like a waiter in a restaurant. You (the client) don't go into the kitchen (the server) to cook your food. Instead, you tell the waiter (the API) what you want, and the waiter brings it to you. The API handles all the communication between you and the kitchen.",
                'code_example' => "// Simple API request example\nconst getUserData = async (userId) => {\n  const response = await fetch('/api/users/' + userId);\n  return await response.json();\n};",
                'demo_url' => null,
                'is_approved' => true,
                'score' => 0,
                'views_count' => 32,
            ],

            // Async/Await definitions
            [
                'term_id' => 2, // Async/Await
                'user_id' => 2, // John Doe
                'title' => 'Modern JavaScript Async Pattern',
                'explanation' => 'Async/await is syntactic sugar built on top of Promises, making asynchronous code look and behave more like synchronous code. It makes code easier to read and maintain by avoiding callback hell and promise chains.',
                'code_example' => "// With async/await\nasync function fetchUserData() {\n  try {\n    const response = await fetch('/api/user');\n    const data = await response.json();\n    console.log(data);\n  } catch (error) {\n    console.error('Failed to fetch:', error);\n  }\n}\n\n// Without async/await (promise chain)\nfunction fetchUserDataOld() {\n  fetch('/api/user')\n    .then(response => response.json())\n    .then(data => console.log(data))\n    .catch(error => console.error('Failed:', error));\n}",
                'demo_url' => null,
                'is_approved' => true,
                'score' => 0,
                'views_count' => 67,
            ],
            [
                'term_id' => 2, // Async/Await
                'user_id' => 3, // Jane Smith
                'title' => 'Beginner-Friendly Explanation',
                'explanation' => "Async/await allows you to write asynchronous code that reads like synchronous code. The 'async' keyword declares an asynchronous function, and 'await' pauses execution until a Promise is resolved.",
                'code_example' => "// Basic example\nasync function getData() {\n  // Wait for this to finish\n  const user = await fetchUser();\n  \n  // Then do this\n  const posts = await fetchPosts(user.id);\n  \n  return posts;\n}",
                'demo_url' => null,
                'is_approved' => true,
                'score' => 0,
                'views_count' => 54,
            ],

            // Closure definitions
            [
                'term_id' => 3, // Closure
                'user_id' => 2, // John Doe
                'title' => 'JavaScript Closure Explained',
                'explanation' => 'A closure is a function that has access to variables in its outer (enclosing) scope, even after the outer function has returned. This is possible because JavaScript functions form closures over the environment in which they were created.',
                'code_example' => "function createCounter() {\n  let count = 0; // Private variable\n  \n  return {\n    increment: function() {\n      count++;\n      return count;\n    },\n    decrement: function() {\n      count--;\n      return count;\n    },\n    getCount: function() {\n      return count;\n    }\n  };\n}\n\nconst counter = createCounter();\nconsole.log(counter.increment()); // 1\nconsole.log(counter.increment()); // 2\nconsole.log(counter.getCount());  // 2",
                'demo_url' => null,
                'is_approved' => true,
                'score' => 0,
                'views_count' => 89,
            ],

            // REST API definitions
            [
                'term_id' => 4, // REST API
                'user_id' => 4, // Mike Johnson
                'title' => 'RESTful Architecture Principles',
                'explanation' => 'REST (Representational State Transfer) is an architectural style that uses HTTP methods (GET, POST, PUT, DELETE) to perform CRUD operations on resources. Each resource is identified by a URL, and the API is stateless.',
                'code_example' => "// RESTful API endpoints\nGET    /api/users         // Get all users\nGET    /api/users/123     // Get user with ID 123\nPOST   /api/users         // Create a new user\nPUT    /api/users/123     // Update user 123\nDELETE /api/users/123     // Delete user 123\n\n// Example implementation\napp.get('/api/users/:id', async (req, res) => {\n  const user = await User.findById(req.params.id);\n  res.json(user);\n});",
                'demo_url' => null,
                'is_approved' => true,
                'score' => 0,
                'views_count' => 76,
            ],

            // Promise definitions
            [
                'term_id' => 5, // Promise
                'user_id' => 3, // Jane Smith
                'title' => 'Understanding JavaScript Promises',
                'explanation' => 'A Promise is an object representing the eventual completion or failure of an asynchronous operation. It can be in one of three states: pending, fulfilled, or rejected. Promises provide a cleaner alternative to callback-based asynchronous code.',
                'code_example' => "// Creating a Promise\nconst myPromise = new Promise((resolve, reject) => {\n  setTimeout(() => {\n    const success = true;\n    if (success) {\n      resolve('Operation successful!');\n    } else {\n      reject('Operation failed!');\n    }\n  }, 1000);\n});\n\n// Using the Promise\nmyPromise\n  .then(result => console.log(result))\n  .catch(error => console.error(error))\n  .finally(() => console.log('Promise completed'));",
                'demo_url' => null,
                'is_approved' => true,
                'score' => 0,
                'views_count' => 61,
            ],

            // Component definitions
            [
                'term_id' => 7, // Component
                'user_id' => 3, // Jane Smith
                'title' => 'React Component Basics',
                'explanation' => 'Components are independent, reusable pieces of UI in React. They accept inputs (props) and return React elements describing what should appear on the screen. Components can be functional or class-based.',
                'code_example' => "// Functional Component\nfunction WelcomeMessage({ name }) {\n  return (\n    <div className=\"welcome\">\n      <h1>Hello, {name}!</h1>\n      <p>Welcome to our application.</p>\n    </div>\n  );\n}\n\n// Usage\n<WelcomeMessage name=\"John\" />",
                'demo_url' => null,
                'is_approved' => true,
                'score' => 0,
                'views_count' => 42,
            ],
        ];

        foreach ($definitions as $definition) {
            Definition::create($definition);
        }
    }
}
