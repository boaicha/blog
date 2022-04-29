# Blog

## A. Installation du projet
1. `composer init`
2. `composer require twig/twig`

## B. Configurer l'autoloading
1. Ajouter ceci dans `composer.json`
`````json
"autoload": {
    "psr-4": {
        "App\\": "./"
    }
},
`````

2. Exécuter la commande pour MAJ de l'autoloading
``composer dump-autoload``

## C. Config du fichier de demarrage du projet
1. Config twig
````php
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

require_once 'vendor/autoload.php';

// Rendu de la vue la vue= templates
$loader = new FilesystemLoader(['templates']);
$twig = new Environment($loader, [
	'cache' => './var/cache',
	'auto_reload' => true,
	'debug' => true
]);

$twig->addExtension(new DebugExtension());

````

## D. Lancer l'application
```php -S localhost:8080```
