<?php

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
error_reporting(E_ALL);
//ini_set("display_errors", 1);

// On définit une constante contenant le dossier racine
define('ROOT', dirname(__DIR__));


// On importe les namespace nécessaires
use App\Autoloader;
use App\Core\Main;

//On importe l'autoloader
require ROOT . '/vendor/autoload.php';

// Pour utiliser le fichier d'environnement .evn (composer require vlucas/phpdotenv)
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$app = new Main();

// On démarre l'application depuis le router Main
$app->start();

