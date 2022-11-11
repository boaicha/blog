<?php

namespace App\Controllers;

use App\Models\InscriptionModel;

class InscriptionController extends Controller {
	/**
	 * route = /inscription
	 * @return null
	 */
	public function index(): void {
		// si on a appuyer sur le bouton
		if (isset($_POST['inscription'])) {

			$password = md5(htmlspecialchars($_POST['password'])); //md5 pour encoder le mot depasse
			$username = addslashes(htmlspecialchars($_POST['mail'])); //mail
			$name = addslashes(htmlspecialchars($_POST['nom']));
			$prenom = addslashes(htmlspecialchars($_POST['prenom']));

			$inscription = new InscriptionModel();  //instancie la class connexion
			$inscription->inscription($username, $password, $name, $prenom); //appelle de la fonction compteValide de la class connexion

		}

		$this->view('inscription');
	}
}
