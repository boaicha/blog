<?php

namespace App\Models;

class ConnexionModel extends Model {
	private $username;
	private $password;


	public function seConnecter($username, $password) {
		// $bdd= new connexionBdd();
		$bdd = $this->getDB();
		$requete = $bdd->prepare('SELECT * FROM user WHERE mail= ? and password = ?');
		$requete->execute(array($username, $password));
		$data = $requete->fetch();
		$nbreUtilisateur = $requete->rowCount();
		$statut = $data["statut"];
		if ($nbreUtilisateur == 0) {
			echo("se compte n'existe pas");

		} elseif ($nbreUtilisateur == 1) {
			var_dump($data);
			echo($data["statut"]);

			if ($data["statut"] == "user") {
				echo("vous etes connecter");
                header("Location:" . "http://localhost:8080/public?p=posts");
			} elseif ($data["statut"] == "admin") {
				echo("vous etes connecter administrateur");
				header("Location:" . "http://localhost:8080/public?p=adminPost");
				echo($_SESSION["statut"]);
			}

		}
		return $statut;

	}


}


?>
