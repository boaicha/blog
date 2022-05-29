<?php

namespace App\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class Controller {

    public function view(string $path, $datas = []){

        $loader = new FilesystemLoader('../ressources/Views');
        $twig = new Environment($loader, [
            'cache' => false,
        ]);
        
        echo $twig->render($path.'.twig', $datas);

    }
}


?>