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
        //  on recupere tout les  articles dont les utilisateurs qui les ont crees .
		$requete = $bdd->prepare('SELECT article.id,article.img ,article.chapo,article.titre,article.date_mjr,article.descriptif,article.id_user,user.nom
FROM  article
INNER JOIN user ON user.id = article.id_user order by article.id desc ');
		$requete->execute();
		return $requete->fetchAll(PDO::FETCH_CLASS,Post::class);

	}

	/**
	 * pour la fonction rechercher un  article par son identifiant
	 * @param $id
	 * @return Post|null
	 */
	public function findPostById(array $id) {
        //$bdd Represente'instanciation PDO retourner par getDB .
		$bdd = $this->getDB();
        //recupere toute les information du  articlet ainsi que le nom de l utilisateur .
		$requete = $bdd->prepare('SELECT article.id,article.img ,article.chapo,article.titre,article.date_mjr,article.descriptif,article.id_user,user.nom
FROM  article
INNER JOIN user ON user.id = article.id_user WHERE article.id=?');
		$requete->execute($id);
		return $requete->fetchAll(PDO::FETCH_CLASS,Post::class)[0];
	}

	/**
	 * @param $chapo
	 * @param $titre
	 * @param $nameFile
	 * @param $date_mjr
     * @param $descritif
	 * @param $date_modif
	 * @return void
	 */
	public function addPost(string $chapo, string $titre, string $nameFile, string $date_mjr, string $date_modif,string $descriptif, int $userId) {
		$bdd = $this->getDB();
        //$try = DateTime('d-m-Y');
		$requete = $bdd->prepare('INSERT INTO  article (titre,chapo, img, date_mjr,descriptif, id_user)  VALUES (?, ?, ?, Now(), ?, ?)');
		$requete->execute(array($titre, $chapo, $nameFile, $descriptif, $userId));
	}

	/**
	 *
	 * @param $id
	 * @return void
	 */
	public function deletePost(int $id) {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('DELETE FROM  article WHERE id = ?');
		$requete->execute(array($id));
	}

	/**
	 * @param $titre
	 * @param $chapo
	 * @param $nameFile
	 * @param $date_mjr
     * @param $descritif
	 * @param $date_modif
	 * @param $id
	 * @return void
	 */
	public function updatePost(string $titre, string $chapo, string $nameFile, string $date_mjr,string $descriptif, string $date_modif, int $id) {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('UPDATE  article SET titre=?, date_modif=Now(), img=?,descriptif=?, chapo=? WHERE id = ?');
		$requete->execute(array($titre, $nameFile,$descriptif,$chapo, $id));
	}

}
