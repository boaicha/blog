<?php

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

$page = '';
if (isset($_GET['p'])) {
	$page = $_GET['p'];
}

switch ($page) {
	case 'inscription':
		echo $twig->render('inscription.twig');
		break;
	case 'connexion':
		echo $twig->render('connexion.twig');
		break;
	case 'posts':
		echo $twig->render('posts.twig');
		break;
	case 'home':
		echo $twig->render('home.twig');
		break;
	case 'test':
		echo $twig->render('test.twig');
		break;
	default:
		header('HTTP/1.0 404 Not Found');
		echo $twig->render('404.twig');
		break;
}
