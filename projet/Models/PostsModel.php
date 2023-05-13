<?php

namespace App\Models;

use App\Entity\Post;
use DateTime;
use PDO;

class PostsModel extends Model {

	public function listPost(): array {
        //$bdd Represente'instanciation PDO retourner par getDB .
		$bdd = $this->getDB();
        //order by filtré
        //  on recupere tout les posts dont les utilisateurs qui les ont crees .
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
        //$bdd Represente'instanciation PDO retourner par getDB .
		$bdd = $this->getDB();
        //recupere toute les information du post ainsi que le nom de l utilisateur .
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
        //$try = DateTime('d-m-Y');
		$requete = $bdd->prepare('INSERT INTO post (titre,chapo, img, date_mjr, id_user)  VALUES (?, ?, ?, Now(), ?)');
		$requete->execute(array($titre, $chapo, $nameFile, $userId));
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
		$requete = $bdd->prepare('UPDATE post SET titre=?, date_modif=Now(), img=?, chapo=? WHERE id = ?');
		$requete->execute(array($titre, $nameFile, $chapo, $id));
	}

}
