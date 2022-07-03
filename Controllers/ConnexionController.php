<?php

namespace App\Controllers;

use App\Models\ConnexionModel;

class ConnexionController extends Controller {

	public function index() {
		if (isset($_POST['connexion'])) {  //si on a appuyer sur le bouton
			print_r("Vous etes sur le controlleur");
			$password = md5($_POST['password']); //md5 pour encoder le mot depasse
			$username = $_POST['username']; //mail
			$connexion = new ConnexionModel();  //instancie la class connexion
            $connexion->seConnecter($username, $password); //appelle de la fonction compteValide de la class connexion
		}
		return $this->view('connexion');

	}

}

