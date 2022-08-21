<?php

namespace App\Models;

class ConnexionModel extends Model {
	public function findUser($username, $password) {
		$bdd = $this->getDB();

		$requete = $bdd->prepare('SELECT * FROM user WHERE mail = ? and password = ?');
		$requete->execute(array($username, $password));
		return $requete->fetch();
	}

}
