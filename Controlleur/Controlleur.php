<?php

namespace App\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class Controlleur {

	/**
	 * @throws \Twig\Error\SyntaxError
	 * @throws \Twig\Error\RuntimeError
	 * @throws \Twig\Error\LoaderError
	 */
	public function view(string $path, $datas = [])
	{
		$loader = new FilesystemLoader('/templates');
		$twig = new Environment($loader, [
			'cache' => false,
		]);

		$template = $twig->load($path);
		echo $template->render($datas);

	}
}
