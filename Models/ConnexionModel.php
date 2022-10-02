<?php

namespace App\Models;

use App\Entity\User;

class ConnexionModel extends Model {
	public function findUser(string $username, string $password) {
		$bdd = $this->getDB();

		$requete = $bdd->prepare('SELECT * FROM user WHERE mail = ? and password = ?');
		$requete->execute(array($username, $password));
		return $requete->fetchAll(\PDO::FETCH_CLASS,User::class);
	}

}
