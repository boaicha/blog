<?php

namespace App\Models;

class InscriptionModel extends Model {
	private $username;
	private $password;
	private $name;
	private $prenom;

	public function inscription(string $username, string $password, string $name, string $prenom): array {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('INSERT INTO user (mail, password,nom,prenom)  VALUES (?, ?, ?, ?)');
		$requete->execute(array($username, $password, $name, $prenom));
		$message = "vous etes inscrit";
		echo($message);
	}

}
