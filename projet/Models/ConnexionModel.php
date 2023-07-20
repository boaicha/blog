<?php

namespace App\Models;

use App\Entity\User;
use PDO;

class ConnexionModel extends Model {
	public function findUser(string $username) {
        //$bdd Represente'instanciation PDO retourner par getDB .
		$bdd = $this->getDB();

		$requete = $bdd->prepare('SELECT * FROM user WHERE mail = ?');
		$requete->execute(array($username));
        $requete->setFetchMode(PDO::FETCH_CLASS, User::class);
		return $requete->fetch();
	}

}
