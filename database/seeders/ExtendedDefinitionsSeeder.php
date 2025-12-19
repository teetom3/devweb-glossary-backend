<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Term;
use App\Models\Definition;
use App\Models\User;

class ExtendedDefinitionsSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('role', 'user')->get();
        $terms = Term::all();

        $definitions = [
            // Variable
            'Variable' => [
                'explanation' => 'Une variable est un espace de stockage nommé dans la mémoire de l\'ordinateur qui contient une valeur. Cette valeur peut être modifiée pendant l\'exécution du programme. En JavaScript, on déclare une variable avec let, const ou var.',
                'code_example' => 'let nom = "Alice";\nconst age = 25;\nvar ville = "Paris";\n\nconsole.log(nom); // Alice',
            ],
            // Fonction
            'Fonction' => [
                'explanation' => 'Une fonction est un bloc de code réutilisable conçu pour effectuer une tâche particulière. Elle peut accepter des paramètres en entrée et retourner une valeur. Les fonctions permettent d\'organiser le code et d\'éviter les répétitions.',
                'code_example' => 'function addition(a, b) {\n  return a + b;\n}\n\nconst resultat = addition(5, 3);\nconsole.log(resultat); // 8',
            ],
            // Boucle
            'Boucle' => [
                'explanation' => 'Une boucle est une structure de contrôle qui permet de répéter l\'exécution d\'un bloc de code tant qu\'une condition est vraie. Les boucles les plus courantes sont for, while et do...while.',
                'code_example' => 'for (let i = 0; i < 5; i++) {\n  console.log("Itération " + i);\n}\n\n// Affiche "Itération 0" à "Itération 4"',
            ],
            // Condition
            'Condition' => [
                'explanation' => 'Une condition est une structure de contrôle qui permet d\'exécuter différents blocs de code selon qu\'une expression booléenne est vraie ou fausse. On utilise principalement if, else if et else.',
                'code_example' => 'const age = 18;\n\nif (age >= 18) {\n  console.log("Majeur");\n} else {\n  console.log("Mineur");\n}',
            ],
            // Tableau
            'Tableau' => [
                'explanation' => 'Un tableau (array) est une structure de données qui permet de stocker plusieurs valeurs dans une seule variable. Les éléments sont indexés à partir de 0 et peuvent être de types différents.',
                'code_example' => 'const fruits = ["pomme", "banane", "orange"];\nconsole.log(fruits[0]); // pomme\n\nfruits.push("fraise");\nconsole.log(fruits.length); // 4',
            ],
            // Objet
            'Objet' => [
                'explanation' => 'Un objet est une structure de données qui regroupe des propriétés (données) et des méthodes (fonctions). Les propriétés sont accessibles via la notation pointée ou les crochets.',
                'code_example' => 'const personne = {\n  nom: "Martin",\n  age: 30,\n  saluer() {\n    console.log("Bonjour!");\n  }\n};\n\nconsole.log(personne.nom); // Martin',
            ],
            // Promise
            'Promise' => [
                'explanation' => 'Une Promise est un objet représentant l\'achèvement ou l\'échec éventuel d\'une opération asynchrone. Elle permet de gérer les opérations asynchrones de manière plus élégante que les callbacks.',
                'code_example' => 'const maPromise = new Promise((resolve, reject) => {\n  setTimeout(() => {\n    resolve("Succès!");\n  }, 1000);\n});\n\nmaPromise.then(resultat => console.log(resultat));',
            ],
            // Closure
            'Closure' => [
                'explanation' => 'Une closure est une fonction qui a accès à son propre scope, au scope de la fonction englobante, et au scope global. Cela permet de créer des fonctions privées et de préserver l\'état.',
                'code_example' => 'function compteur() {\n  let count = 0;\n  return function() {\n    return ++count;\n  };\n}\n\nconst increment = compteur();\nconsole.log(increment()); // 1\nconsole.log(increment()); // 2',
            ],
            // API REST
            'API REST' => [
                'explanation' => 'REST (Representational State Transfer) est une architecture d\'API basée sur HTTP. Elle utilise les méthodes HTTP standard (GET, POST, PUT, DELETE) pour effectuer des opérations CRUD sur des ressources.',
                'code_example' => '// GET - Récupérer des données\nfetch("/api/users")\n  .then(response => response.json())\n  .then(data => console.log(data));\n\n// POST - Créer une ressource\nfetch("/api/users", {\n  method: "POST",\n  body: JSON.stringify({ nom: "Alice" })\n});',
            ],
            // Component
            'Composant' => [
                'explanation' => 'Un composant est une unité réutilisable et autonome de l\'interface utilisateur. Il encapsule sa structure (HTML), son style (CSS) et son comportement (JavaScript). Les composants peuvent être imbriqués pour construire des interfaces complexes.',
                'code_example' => 'function Bouton({ texte, onClick }) {\n  return (\n    <button onClick={onClick}>\n      {texte}\n    </button>\n  );\n}\n\n// Utilisation\n<Bouton texte="Cliquez-moi" onClick={handleClick} />',
            ],
            // Hoisting
            'Hoisting' => [
                'explanation' => 'Le hoisting est un comportement JavaScript où les déclarations de variables et de fonctions sont déplacées en haut de leur portée avant l\'exécution du code. Seules les déclarations sont hissées, pas les initialisations.',
                'code_example' => 'console.log(x); // undefined (pas d\'erreur)\nvar x = 5;\n\n// Équivalent à:\n// var x;\n// console.log(x);\n// x = 5;\n\nsaluer(); // "Bonjour!" (fonctionne)\nfunction saluer() {\n  console.log("Bonjour!");\n}',
            ],
            // Event Loop
            'Event Loop' => [
                'explanation' => 'L\'Event Loop est le mécanisme qui permet à JavaScript d\'exécuter du code asynchrone malgré son modèle mono-thread. Il surveille la Call Stack et la Callback Queue, en déplaçant les callbacks vers la stack quand elle est vide.',
                'code_example' => 'console.log("1");\n\nsetTimeout(() => {\n  console.log("2");\n}, 0);\n\nconsole.log("3");\n\n// Affiche: 1, 3, 2\n// Le setTimeout est placé dans la queue',
            ],
            // Callback
            'Callback' => [
                'explanation' => 'Un callback est une fonction passée en argument à une autre fonction pour être exécutée ultérieurement, généralement après la fin d\'une opération asynchrone.',
                'code_example' => 'function chargerDonnees(callback) {\n  setTimeout(() => {\n    const data = { nom: "Alice" };\n    callback(data);\n  }, 1000);\n}\n\nchargerDonnees((resultat) => {\n  console.log(resultat.nom);\n});',
            ],
            // Virtual DOM
            'Virtual DOM' => [
                'explanation' => 'Le Virtual DOM est une représentation légère en mémoire du DOM réel. Les frameworks comme React l\'utilisent pour optimiser les mises à jour en comparant l\'ancien et le nouveau Virtual DOM avant de mettre à jour le DOM réel.',
                'code_example' => '// React crée automatiquement le Virtual DOM\nfunction App() {\n  const [count, setCount] = useState(0);\n  \n  // Seul le bouton sera mis à jour dans le DOM\n  return (\n    <div>\n      <p>Compteur: {count}</p>\n      <button onClick={() => setCount(count + 1)}>\n        Incrémenter\n      </button>\n    </div>\n  );\n}',
            ],
            // JWT
            'JWT' => [
                'explanation' => 'JSON Web Token est un standard ouvert pour créer des tokens d\'authentification. Un JWT contient trois parties encodées en Base64: header, payload et signature. Il est utilisé pour sécuriser les API REST.',
                'code_example' => '// Création d\'un JWT (côté serveur)\nconst jwt = require("jsonwebtoken");\n\nconst token = jwt.sign(\n  { userId: 123, email: "user@example.com" },\n  "secret_key",\n  { expiresIn: "1h" }\n);\n\n// Vérification\nconst decoded = jwt.verify(token, "secret_key");',
            ],
            // Docker
            'Docker' => [
                'explanation' => 'Docker est une plateforme de conteneurisation qui permet d\'empaqueter une application et ses dépendances dans un conteneur portable. Cela garantit que l\'application fonctionnera de la même manière sur n\'importe quel environnement.',
                'code_example' => '# Dockerfile\nFROM node:18\nWORKDIR /app\nCOPY package*.json ./\nRUN npm install\nCOPY . .\nEXPOSE 3000\nCMD ["npm", "start"]\n\n# Construction et lancement\n# docker build -t mon-app .\n# docker run -p 3000:3000 mon-app',
            ],
            // Git
            'Git' => [
                'explanation' => 'Git est un système de contrôle de version distribué qui permet de suivre les modifications du code source. Chaque développeur possède une copie complète de l\'historique du projet.',
                'code_example' => '# Initialiser un repository\ngit init\n\n# Ajouter des fichiers\ngit add .\n\n# Créer un commit\ngit commit -m "Premier commit"\n\n# Créer une branche\ngit branch feature-x\n\n# Fusionner une branche\ngit merge feature-x',
            ],
        ];

        foreach ($definitions as $termTitle => $defData) {
            $term = $terms->firstWhere('title', $termTitle);

            if ($term) {
                // Créer 2-3 définitions par terme avec différents auteurs
                $numDefs = rand(1, 2);

                for ($i = 0; $i < $numDefs; $i++) {
                    $randomUser = $users->random();

                    Definition::create([
                        'term_id' => $term->id,
                        'user_id' => $randomUser->id,
                        'title' => $i === 0 ? null : "Définition alternative de " . $term->title,
                        'explanation' => $defData['explanation'],
                        'code_example' => isset($defData['code_example']) ? $defData['code_example'] : null,
                        'demo_url' => null,
                        'is_approved' => rand(0, 10) > 2, // 80% approuvées
                        'score' => rand(-2, 15),
                        'views_count' => rand(10, 500),
                    ]);
                }
            }
        }

        // Ajouter des définitions simples pour les termes restants
        $remainingTerms = $terms->whereNotIn('title', array_keys($definitions));

        foreach ($remainingTerms as $term) {
            $randomUser = $users->random();

            Definition::create([
                'term_id' => $term->id,
                'user_id' => $randomUser->id,
                'explanation' => 'Cette fonctionnalité ' . strtolower($term->title) . ' est essentielle en développement web moderne. Elle permet d\'améliorer l\'efficacité et la maintenabilité du code.',
                'is_approved' => rand(0, 10) > 3,
                'score' => rand(-1, 10),
                'views_count' => rand(5, 300),
            ]);
        }
    }
}
