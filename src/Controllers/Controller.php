<?php

namespace App\Controllers;

use Couchbase\View;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class Controller {

	public function view(string $path, array $datas = []): void {
		// la variable loader va contenir le chemin de l'emplacement de tte les vue .
		$loader = new FilesystemLoader('../ressources/Views');
		$twig = new Environment($loader, [
			'cache' => false,
		]);
		$twig->addGlobal('session', $_SESSION);
		
		// on affiche la fonction render avec le chemin qui seras defini lors de l' appel de fonction
		// et en joignant les donneesde la variable data.
		echo $twig->render($path . '.twig', $datas);

	}

	public function redirect(string $controller, string $action): string {
		if (!class_exists($controller)) {
			throw new \Exception(sprintf('Controller %s not exists', $controller));
		}
		if (!method_exists($controller, $action)) {
			throw new \Exception(sprintf('Controller %s do not have an action with name %s', $controller, $action));
		}

		return $controller->$action();
	}
}
