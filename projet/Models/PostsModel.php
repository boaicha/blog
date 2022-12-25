<?php

namespace App\Models;

use App\Entity\Post;
use PDO;

class PostsModel extends Model {

	public function listPost(): array {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('SELECT post.id,post.img ,post.chapo,post.titre,post.date_mjr,post.id_user,user.nom
FROM post
INNER JOIN user ON user.id = post.id_user order by post.id desc ');
		$requete->execute();
		return $requete->fetchAll(PDO::FETCH_CLASS,Post::class);

	}

	/**
	 * pour la fonction rechercher un post par son identifiant
	 * @param $id
	 * @return Post|null
	 */
	public function findPostById(array $id) {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('SELECT post.id,post.img ,post.chapo,post.titre,post.date_mjr,post.id_user,user.nom
FROM post
INNER JOIN user ON user.id = post.id_user WHERE post.id=?');
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
	public function addPost(string $chapo, string $titre, string $nameFile, string $date_mjr, string $date_modif, int $userId) {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('INSERT INTO post (titre,chapo, img, date_mjr, date_modif, id_user)  VALUES (?, ?, ?, ?, ?, ?)');
		$requete->execute(array($titre, $chapo, $nameFile, $date_mjr, $date_modif, $userId));
	}

	/**
	 *
	 * @param $id
	 * @return void
	 */
	public function deletePost(int $id) {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('DELETE FROM post WHERE id = ?');
		$requete->execute(array($id));
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
	public function updatePost(string $titre, string $chapo, string $nameFile, string $date_mjr, string $date_modif, int $id) {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('UPDATE post SET titre=?, date_modif=?, img=?, chapo=?, date_mjr=? WHERE id = ?');
		$requete->execute(array($titre, $date_modif, $nameFile, $chapo, $date_mjr, $id));
	}

}
