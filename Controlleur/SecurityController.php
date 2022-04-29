<?php
namespace App\Controller;

class SecurityController
{
	public function login() {
		if (isset($_POST['connexion'])){  //si on a appuyer sur le bouton
			print_r("Vous etes sur le controlleur");
			//   require('Modele/connexionModele.php'); //lienavec lemodele
			$password = md5($_POST['password']); //md5 pour encoder le mot depasse
			$username = $_POST['username']; //mail
			$connexion = new connexion($username, $password);  //instancie la class connexion
			$connexion->seConnecter($username, $password); //appelle de la fonction compteValide de la class connexion

		}

	}
}

