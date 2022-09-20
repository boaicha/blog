<?php

namespace App\Models;

use App\Entity\Post;
use PDO;

class PostsModel extends Model {

	public function listPost() {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('SELECT * FROM post');
		$requete->execute();
		return $requete->fetchAll(PDO::FETCH_CLASS,Post::class);

	}

	/**
	 * pour la fonction rechercher un post par son identifiant
	 * @param $id
	 * @return Post|null
	 */
	public function findPostById($id) {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('SELECT*FROM post WHERE id=?');
		$requete->execute($id);
		return $requete->fetchAll(PDO::FETCH_CLASS,Post::class)[0];
	}

	/**
	 * @param $chapo
	 * @param $titre
	 * @param $nameFile
	 * @param $date_mjr
	 * @param $date_modif
	 * @return void
	 */
	public function addPost($chapo, $titre, $nameFile, $date_mjr, $date_modif) {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('INSERT INTO post (titre,chapo, img, date_mjr, date_modif)  VALUES (?, ?, ?, ?, ?)');
		$requete->execute(array($titre, $chapo, $nameFile, $date_mjr, $date_modif));
	}

	/**
	 *
	 * @param $id
	 * @return void
	 */
	public function deletePost($id) {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('DELETE FROM post WHERE id = ?');
		$requete->execute($id);
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
	}

}
