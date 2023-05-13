<?php

namespace App\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class Controller {
    //$datas = [] valeur donnée par defaut liste vide
	public function view(string $path, array $datas = []): void {
		// la variable loader va contenir le chemin de l'emplacement de tte les vue .
		$loader = new FilesystemLoader('../ressources/Views');
		$twig = new Environment($loader, [
			'cache' => false,
		]);
        //les valeurs de $session sont accessible depuis le mot cle session dans les fichiers twig.
		$twig->addGlobal('session', $_SESSION);
		
		// on appel la fonction render avec le chemin qui seras defini lors de l' appel de fonction
		// et en joignant les donneesde la variable data.
		echo $twig->render($path . '.twig', $datas);

	}


}
