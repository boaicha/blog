<?php

namespace App\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class Controller {

    public function view(string $path, $datas = []){

        // la variable loader va contenir le chemin de l'emplacement de tte les vue .
        $loader = new FilesystemLoader('../ressources/Views');
        $twig = new Environment($loader, [
            'cache' => false,
        ]);
        // on affiche la fonction render avec le chemin qui seras defini lors de l' appel de fonction
        // et en joignant les donneesde la variable data.
        echo $twig->render($path.'.twig', $datas);

    }
}


?>