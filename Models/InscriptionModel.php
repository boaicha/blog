<?php

namespace App\Models;

use PDO;

class InscriptionModel extends Model {
	private $username;
	private $password;
	private $name;
	private $prenom;


	public function inscription($username, $password, $name, $prenom) {
		// $bdd= new connexionBdd();
		$bdd = $this->getDB();
		$requete = $bdd->prepare('INSERT INTO user (mail, password,nom,prenom)  VALUES (?, ?, ?, ?)');
		$requete->execute(array($username, $password, $name, $prenom));
		$message = "vous etes inscrit";
		echo($message);

	}

}
