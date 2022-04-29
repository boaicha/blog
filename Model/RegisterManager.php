<?php

namespace App\Model;

class RegisterManager extends Manager {
	private $username;
	private $password;
	private $name;
	private $prenom;

	public function __construct($username, $password, $name, $prenom) {
		$this->username = $username;
		$this->password = $password;
		$this->name = $name;
		$this->prenom = $prenom;
	}

	public function inscription($username, $password, $name, $prenom) {
		// $bdd= new connexionBdd();
		$bdd = $this->bdd();
		$requete = $bdd->prepare('INSERT INTO user (mail, password,nom,prenom)  VALUES (?, ?, ?, ?)');
		$requete->execute(array($username, $password, $name, $prenom));
		$message = "vous etes inscrit";
		echo($message);

	}

}
