<?php

namespace App\Models;

class ConnexionModel extends Model {
	private $username;
	private $password;

	const ROLE_USER = 'user';
	const ROLE_ADMIN = 'admin';

	public function seConnecter($username, $password) {
		$bdd = $this->getDB();

		$requete = $bdd->prepare('SELECT * FROM user WHERE mail = ? and password = ?');
		$requete->execute(array($username, $password));
		$data = $requete->fetch();
		$nbreUtilisateur = $requete->rowCount();

		if ($nbreUtilisateur == 0) {
			echo("se compte n'existe pas");
			return;
		} else {
			$status = $data['statut'];
			$_SESSION['statut'] = $status;
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;

			if ($status == self::ROLE_USER) {
				echo('vous etes connecter');
				header('Location:http://localhost:8080/public?p=posts');
			} elseif ($status == self::ROLE_ADMIN) {
				echo('vous etes connecter administrateur');
				header('Location:http://localhost:8080/public?p=adminPost');
				echo($status);
			}
		}

		return $status;
	}

}
