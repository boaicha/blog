<?php

namespace App\Model;

class PostManager extends Manager {

	public function listPost() {
		$bdd = $this->bdd();
		$requete = $bdd->prepare('SELECT * FROM post');
		$requete->execute();

		var_dump($requete);
		return $requete->fetchAll(PDO::FETCH_ASSOC);

	}

}
