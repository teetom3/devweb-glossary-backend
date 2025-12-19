<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Term;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;

class ExtendedTermsSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();
        $users = User::where('role', 'user')->get();
        $admin = User::where('role', 'admin')->first();

        // Concepts Fondamentaux
        $fundamentalTerms = [
            [
                'title' => 'Variable',
                'description_short' => 'Conteneur permettant de stocker une valeur qui peut être modifiée pendant l\'exécution du programme',
                'category' => 'Fundamental Concepts',
            ],
            [
                'title' => 'Fonction',
                'description_short' => 'Bloc de code réutilisable qui effectue une tâche spécifique et peut retourner une valeur',
                'category' => 'Fundamental Concepts',
            ],
            [
                'title' => 'Boucle',
                'description_short' => 'Structure de contrôle permettant de répéter l\'exécution d\'un bloc de code',
                'category' => 'Fundamental Concepts',
            ],
            [
                'title' => 'Condition',
                'description_short' => 'Structure permettant d\'exécuter du code selon qu\'une expression soit vraie ou fausse',
                'category' => 'Fundamental Concepts',
            ],
            [
                'title' => 'Tableau',
                'description_short' => 'Structure de données permettant de stocker plusieurs valeurs dans une seule variable',
                'category' => 'Fundamental Concepts',
            ],
            [
                'title' => 'Objet',
                'description_short' => 'Structure de données contenant des propriétés et des méthodes',
                'category' => 'Fundamental Concepts',
            ],
            [
                'title' => 'Classe',
                'description_short' => 'Modèle définissant la structure et le comportement des objets',
                'category' => 'Fundamental Concepts',
            ],
            [
                'title' => 'Héritage',
                'description_short' => 'Mécanisme permettant à une classe d\'hériter des propriétés et méthodes d\'une autre classe',
                'category' => 'Fundamental Concepts',
            ],
            [
                'title' => 'Encapsulation',
                'description_short' => 'Principe de programmation consistant à regrouper données et méthodes dans une classe',
                'category' => 'Fundamental Concepts',
            ],
            [
                'title' => 'Polymorphisme',
                'description_short' => 'Capacité d\'un objet à prendre plusieurs formes',
                'category' => 'Fundamental Concepts',
            ],
        ];

        // JavaScript Avancé
        $jsAdvancedTerms = [
            [
                'title' => 'Hoisting',
                'description_short' => 'Comportement de JavaScript qui déplace les déclarations en haut de leur portée',
                'category' => 'JavaScript Advanced',
            ],
            [
                'title' => 'Event Loop',
                'description_short' => 'Mécanisme gérant l\'exécution asynchrone en JavaScript',
                'category' => 'JavaScript Advanced',
            ],
            [
                'title' => 'Callback',
                'description_short' => 'Fonction passée en argument à une autre fonction pour être exécutée plus tard',
                'category' => 'JavaScript Advanced',
            ],
            [
                'title' => 'Arrow Function',
                'description_short' => 'Syntaxe concise pour déclarer des fonctions en JavaScript (ES6+)',
                'category' => 'JavaScript Advanced',
            ],
            [
                'title' => 'Destructuring',
                'description_short' => 'Syntaxe permettant d\'extraire des valeurs d\'objets ou de tableaux',
                'category' => 'JavaScript Advanced',
            ],
            [
                'title' => 'Spread Operator',
                'description_short' => 'Opérateur (...) permettant d\'étendre les éléments d\'un tableau ou d\'un objet',
                'category' => 'JavaScript Advanced',
            ],
            [
                'title' => 'Template Literals',
                'description_short' => 'Chaînes de caractères permettant l\'interpolation et les chaînes multi-lignes',
                'category' => 'JavaScript Advanced',
            ],
            [
                'title' => 'Map',
                'description_short' => 'Structure de données permettant de stocker des paires clé-valeur',
                'category' => 'JavaScript Advanced',
            ],
            [
                'title' => 'Set',
                'description_short' => 'Collection de valeurs uniques',
                'category' => 'JavaScript Advanced',
            ],
            [
                'title' => 'WeakMap',
                'description_short' => 'Map avec des clés faiblement référencées permettant le garbage collection',
                'category' => 'JavaScript Advanced',
            ],
            [
                'title' => 'Generator',
                'description_short' => 'Fonction pouvant être mise en pause et reprise, produisant une séquence de valeurs',
                'category' => 'JavaScript Advanced',
            ],
            [
                'title' => 'Proxy',
                'description_short' => 'Objet permettant d\'intercepter et de personnaliser les opérations sur un autre objet',
                'category' => 'JavaScript Advanced',
            ],
            [
                'title' => 'Symbol',
                'description_short' => 'Type de données primitif garantissant l\'unicité des identifiants',
                'category' => 'JavaScript Advanced',
            ],
            [
                'title' => 'Async/Await',
                'description_short' => 'Syntaxe moderne pour gérer les opérations asynchrones de manière synchrone',
                'category' => 'JavaScript Advanced',
            ],
            [
                'title' => 'Promise.all',
                'description_short' => 'Méthode attendant la résolution de toutes les promesses d\'un tableau',
                'category' => 'JavaScript Advanced',
            ],
        ];

        // Architecture Frontend
        $frontendArchTerms = [
            [
                'title' => 'Composant',
                'description_short' => 'Élément réutilisable et autonome d\'une interface utilisateur',
                'category' => 'Frontend Architecture',
            ],
            [
                'title' => 'Props',
                'description_short' => 'Propriétés passées à un composant pour le configurer',
                'category' => 'Frontend Architecture',
            ],
            [
                'title' => 'State',
                'description_short' => 'Données internes d\'un composant qui peuvent changer au fil du temps',
                'category' => 'Frontend Architecture',
            ],
            [
                'title' => 'Virtual DOM',
                'description_short' => 'Représentation en mémoire du DOM réel pour optimiser les mises à jour',
                'category' => 'Frontend Architecture',
            ],
            [
                'title' => 'Hook',
                'description_short' => 'Fonction permettant d\'utiliser les fonctionnalités React dans des composants fonctionnels',
                'category' => 'Frontend Architecture',
            ],
            [
                'title' => 'Context',
                'description_short' => 'API React pour partager des données entre composants sans prop drilling',
                'category' => 'Frontend Architecture',
            ],
            [
                'title' => 'Redux',
                'description_short' => 'Bibliothèque de gestion d\'état prévisible pour applications JavaScript',
                'category' => 'Frontend Architecture',
            ],
            [
                'title' => 'Store',
                'description_short' => 'Objet contenant l\'état global de l\'application dans Redux',
                'category' => 'Frontend Architecture',
            ],
            [
                'title' => 'Action',
                'description_short' => 'Objet décrivant un changement à effectuer dans le store',
                'category' => 'Frontend Architecture',
            ],
            [
                'title' => 'Reducer',
                'description_short' => 'Fonction pure spécifiant comment l\'état change en réponse à une action',
                'category' => 'Frontend Architecture',
            ],
            [
                'title' => 'Middleware',
                'description_short' => 'Fonction interceptant les actions avant qu\'elles atteignent le reducer',
                'category' => 'Frontend Architecture',
            ],
            [
                'title' => 'Routing',
                'description_short' => 'Système de navigation entre différentes vues d\'une application',
                'category' => 'Frontend Architecture',
            ],
            [
                'title' => 'Lazy Loading',
                'description_short' => 'Technique de chargement différé des ressources pour améliorer les performances',
                'category' => 'Frontend Architecture',
            ],
            [
                'title' => 'Code Splitting',
                'description_short' => 'Division du code en plusieurs bundles chargés à la demande',
                'category' => 'Frontend Architecture',
            ],
            [
                'title' => 'SSR',
                'description_short' => 'Server-Side Rendering : rendu côté serveur pour améliorer SEO et performances',
                'category' => 'Frontend Architecture',
            ],
            [
                'title' => 'SSG',
                'description_short' => 'Static Site Generation : génération de pages HTML au moment du build',
                'category' => 'Frontend Architecture',
            ],
            [
                'title' => 'Hydration',
                'description_short' => 'Processus d\'ajout d\'interactivité JavaScript au HTML pré-rendu',
                'category' => 'Frontend Architecture',
            ],
        ];

        // Backend & APIs
        $backendTerms = [
            [
                'title' => 'API REST',
                'description_short' => 'Architecture d\'API basée sur HTTP utilisant les méthodes standard',
                'category' => 'Backend & APIs',
            ],
            [
                'title' => 'Endpoint',
                'description_short' => 'URL spécifique permettant d\'accéder à une ressource d\'une API',
                'category' => 'Backend & APIs',
            ],
            [
                'title' => 'Middleware',
                'description_short' => 'Fonction s\'exécutant entre la requête et la réponse',
                'category' => 'Backend & APIs',
            ],
            [
                'title' => 'ORM',
                'description_short' => 'Object-Relational Mapping : technique de conversion entre objets et base de données',
                'category' => 'Backend & APIs',
            ],
            [
                'title' => 'Migration',
                'description_short' => 'Fichier décrivant les modifications de structure de base de données',
                'category' => 'Backend & APIs',
            ],
            [
                'title' => 'Seeder',
                'description_short' => 'Script permettant de peupler la base de données avec des données de test',
                'category' => 'Backend & APIs',
            ],
            [
                'title' => 'JWT',
                'description_short' => 'JSON Web Token : standard pour créer des tokens d\'authentification',
                'category' => 'Backend & APIs',
            ],
            [
                'title' => 'OAuth',
                'description_short' => 'Protocole d\'autorisation permettant l\'accès sécurisé à des ressources',
                'category' => 'Backend & APIs',
            ],
            [
                'title' => 'GraphQL',
                'description_short' => 'Langage de requête pour API offrant plus de flexibilité que REST',
                'category' => 'Backend & APIs',
            ],
            [
                'title' => 'WebSocket',
                'description_short' => 'Protocole de communication bidirectionnelle en temps réel',
                'category' => 'Backend & APIs',
            ],
            [
                'title' => 'Cookie',
                'description_short' => 'Petit fichier stocké côté client pour maintenir l\'état de session',
                'category' => 'Backend & APIs',
            ],
            [
                'title' => 'Session',
                'description_short' => 'Mécanisme de stockage temporaire des données utilisateur côté serveur',
                'category' => 'Backend & APIs',
            ],
            [
                'title' => 'Cache',
                'description_short' => 'Mécanisme de stockage temporaire pour accélérer l\'accès aux données',
                'category' => 'Backend & APIs',
            ],
            [
                'title' => 'Rate Limiting',
                'description_short' => 'Limitation du nombre de requêtes par unité de temps',
                'category' => 'Backend & APIs',
            ],
            [
                'title' => 'Pagination',
                'description_short' => 'Division de résultats en plusieurs pages pour améliorer les performances',
                'category' => 'Backend & APIs',
            ],
        ];

        // DevOps & Outils
        $devopsTerms = [
            [
                'title' => 'Git',
                'description_short' => 'Système de contrôle de version distribué',
                'category' => 'DevOps & Tools',
            ],
            [
                'title' => 'Branch',
                'description_short' => 'Ligne de développement indépendante dans Git',
                'category' => 'DevOps & Tools',
            ],
            [
                'title' => 'Commit',
                'description_short' => 'Enregistrement des modifications dans l\'historique Git',
                'category' => 'DevOps & Tools',
            ],
            [
                'title' => 'Merge',
                'description_short' => 'Fusion de deux branches Git',
                'category' => 'DevOps & Tools',
            ],
            [
                'title' => 'Pull Request',
                'description_short' => 'Demande de fusion de code vers une branche principale',
                'category' => 'DevOps & Tools',
            ],
            [
                'title' => 'CI/CD',
                'description_short' => 'Intégration et déploiement continus automatisés',
                'category' => 'DevOps & Tools',
            ],
            [
                'title' => 'Docker',
                'description_short' => 'Plateforme de conteneurisation d\'applications',
                'category' => 'DevOps & Tools',
            ],
            [
                'title' => 'Container',
                'description_short' => 'Environnement isolé et portable pour exécuter des applications',
                'category' => 'DevOps & Tools',
            ],
            [
                'title' => 'Kubernetes',
                'description_short' => 'Orchestrateur de conteneurs pour déploiement et gestion à grande échelle',
                'category' => 'DevOps & Tools',
            ],
            [
                'title' => 'Webpack',
                'description_short' => 'Bundler de modules JavaScript pour optimiser les ressources',
                'category' => 'DevOps & Tools',
            ],
            [
                'title' => 'Babel',
                'description_short' => 'Transpileur JavaScript convertissant le code moderne en code compatible',
                'category' => 'DevOps & Tools',
            ],
            [
                'title' => 'ESLint',
                'description_short' => 'Outil d\'analyse statique pour identifier les problèmes dans le code JavaScript',
                'category' => 'DevOps & Tools',
            ],
            [
                'title' => 'Prettier',
                'description_short' => 'Formateur de code automatique garantissant un style cohérent',
                'category' => 'DevOps & Tools',
            ],
            [
                'title' => 'NPM',
                'description_short' => 'Gestionnaire de packages pour Node.js',
                'category' => 'DevOps & Tools',
            ],
            [
                'title' => 'Yarn',
                'description_short' => 'Gestionnaire de packages JavaScript alternatif à NPM',
                'category' => 'DevOps & Tools',
            ],
        ];

        // Termes supplémentaires
        $additionalTerms = [
            [
                'title' => 'Responsive Design',
                'description_short' => 'Approche de conception web s\'adaptant à différentes tailles d\'écran',
                'category' => 'Frontend Architecture',
            ],
            [
                'title' => 'Mobile First',
                'description_short' => 'Stratégie de conception commençant par la version mobile',
                'category' => 'Frontend Architecture',
            ],
            [
                'title' => 'Progressive Web App',
                'description_short' => 'Application web offrant une expérience similaire aux applications natives',
                'category' => 'Frontend Architecture',
            ],
            [
                'title' => 'Service Worker',
                'description_short' => 'Script s\'exécutant en arrière-plan pour gérer le cache et les notifications',
                'category' => 'Frontend Architecture',
            ],
            [
                'title' => 'LocalStorage',
                'description_short' => 'API de stockage côté client pour sauvegarder des données persistantes',
                'category' => 'JavaScript Advanced',
            ],
            [
                'title' => 'SessionStorage',
                'description_short' => 'API de stockage temporaire côté client valable pour une session',
                'category' => 'JavaScript Advanced',
            ],
            [
                'title' => 'IndexedDB',
                'description_short' => 'Base de données côté client pour stocker de grandes quantités de données',
                'category' => 'JavaScript Advanced',
            ],
            [
                'title' => 'Fetch API',
                'description_short' => 'Interface moderne pour effectuer des requêtes HTTP',
                'category' => 'JavaScript Advanced',
            ],
            [
                'title' => 'DOM',
                'description_short' => 'Document Object Model : représentation structurée d\'un document HTML',
                'category' => 'Fundamental Concepts',
            ],
            [
                'title' => 'Event Delegation',
                'description_short' => 'Technique d\'écoute d\'événements sur un parent plutôt que sur chaque enfant',
                'category' => 'JavaScript Advanced',
            ],
            [
                'title' => 'Debounce',
                'description_short' => 'Technique limitant la fréquence d\'exécution d\'une fonction',
                'category' => 'JavaScript Advanced',
            ],
            [
                'title' => 'Throttle',
                'description_short' => 'Technique garantissant qu\'une fonction s\'exécute au maximum une fois par intervalle',
                'category' => 'JavaScript Advanced',
            ],
            [
                'title' => 'MVC',
                'description_short' => 'Model-View-Controller : pattern architectural séparant données, présentation et logique',
                'category' => 'Backend & APIs',
            ],
            [
                'title' => 'Singleton',
                'description_short' => 'Pattern garantissant qu\'une classe n\'a qu\'une seule instance',
                'category' => 'Fundamental Concepts',
            ],
            [
                'title' => 'Factory',
                'description_short' => 'Pattern de création d\'objets sans spécifier leur classe exacte',
                'category' => 'Fundamental Concepts',
            ],
            [
                'title' => 'Observer',
                'description_short' => 'Pattern permettant à des objets de s\'abonner aux changements d\'un autre objet',
                'category' => 'Fundamental Concepts',
            ],
            [
                'title' => 'SOLID',
                'description_short' => 'Cinq principes de conception orientée objet pour un code maintenable',
                'category' => 'Fundamental Concepts',
            ],
            [
                'title' => 'DRY',
                'description_short' => 'Don\'t Repeat Yourself : principe évitant la duplication de code',
                'category' => 'Fundamental Concepts',
            ],
            [
                'title' => 'KISS',
                'description_short' => 'Keep It Simple, Stupid : principe favorisant la simplicité',
                'category' => 'Fundamental Concepts',
            ],
            [
                'title' => 'YAGNI',
                'description_short' => 'You Aren\'t Gonna Need It : principe contre la sur-ingénierie',
                'category' => 'Fundamental Concepts',
            ],
        ];

        // Combiner tous les termes
        $allTerms = array_merge(
            $fundamentalTerms,
            $jsAdvancedTerms,
            $frontendArchTerms,
            $backendTerms,
            $devopsTerms,
            $additionalTerms
        );

        foreach ($allTerms as $termData) {
            $category = $categories->firstWhere('name', $termData['category']);
            $slug = Str::slug($termData['title']);

            if ($category) {
                // Vérifier si le terme existe déjà
                $existingTerm = Term::where('slug', $slug)->first();

                if (!$existingTerm) {
                    Term::create([
                        'title' => $termData['title'],
                        'slug' => $slug,
                        'description_short' => $termData['description_short'],
                        'category_id' => $category->id,
                        'created_by_id' => $admin->id,
                        'is_approved' => true,
                    ]);
                }
            }
        }
    }
}
