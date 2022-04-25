<?php 
require 'Controlleur/controlleurPosts.php';
require 'vendor/autoload.php';


$page = 'home';
if(isset($_GET['p'])){
    $page = $_GET['p'];
}

// include ($layout);

//rendu de la vue la vue= templates
$loader = new Twig_Loader_Filesystem(__DIR__ .'/templates');
$twig = new Twig_Environment($loader, [
    'cache' => false, //__DIR__ .'/tmp'
]);


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
    default:
        header('HTTP/1.0 404 Not Found');
        echo $twig->render('404.twig');
        break;
}

if($page === 'home'){
    echo $twig->render('home.twig');
}



?>