<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Controlleur{


    public function view(String $path, $datas = []){

        $loader = new FilesystemLoader('/templates');
        $twig = new Environment($loader, [
            'cache' => false,
        ]);

        echo $twig->render($path.'', $datas);

    }


}

?>