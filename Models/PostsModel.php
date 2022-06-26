<?php

namespace App\Models;

use PDO;

class PostsModel extends Model {

	public function listPost() {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('SELECT * FROM post');
		$requete->execute();
		return $requete->fetchAll(PDO::FETCH_ASSOC);

	}

	/**
	 * pour la fonction rechercher un post par son identifiant
	 * @param $id
	 * @return mixed
	 */
	public function findPostById($id) {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('SELECT*FROM post WHERE id=?');
		$requete->execute($id);
		return $requete->fetch();
	}

	/**
	 * @param $chapo
	 * @param $titre
	 * @param $nameFile
	 * @param $date_mjr
	 * @param $date_modif
	 * @return void
	 */
	public function AddPost($chapo, $titre, $nameFile, $date_mjr, $date_modif) {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('INSERT INTO post (titre,chapo, img, date_mjr, date_modif)  VALUES (?, ?, ?, ?, ?)');
		$requete->execute(array($titre, $chapo, $nameFile, $date_mjr, $date_modif));
		header("Location:" . "http://localhost:8080/public?p=adminPost");

	}

	/**
	 *
	 * @param $id
	 * @return void
	 */
	public function deletePost($id) {
		// $bdd= new connexionBdd();
		$bdd = $this->getDB();
		$requete = $bdd->prepare('DELETE FROM post WHERE id = ?');
		$requete->execute($id);
		header("Location:" . "http://localhost:8080/public?p=adminPost");
	}

	/**
	 * @param $titre
	 * @param $chapo
	 * @param $nameFile
	 * @param $date_mjr
	 * @param $date_modif
	 * @param $id
	 * @return void
	 */
	public function updatePost($titre, $chapo, $nameFile, $date_mjr, $date_modif, $id) {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('UPDATE post SET titre=?, date_modif=?, img=?, chapo=?, date_mjr=? WHERE id = ?');
		$requete->execute(array($titre, $date_modif, $nameFile, $chapo, $date_mjr, $id));
		header("Location:" . "http://localhost:8080/public?p=adminPost");
	}

}
