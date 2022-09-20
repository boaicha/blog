<?php

namespace App\Models;

use App\Entity\Commentaire;
use PDO ;

class CommentModel extends Model {


	/**
	 * fonction pour afficher tout les commentaires d'un post précis
	 * @param $idPost
	 * @return Commentaire[]
	 */
	public function getCommentByPostId($idPost) {

		$bdd = $this->getDB();
		$requete = $bdd->prepare('SELECT * FROM commentaire WHERE id_postc = ? AND verification = "en cours"');
		$requete->execute(array($idPost));
		return $requete->fetchAll(PDO::FETCH_CLASS,Commentaire::class);
	}

	/**
	 * @param $commentId
	 * @return Commentaire|null
	 */
	public function getCommentById($commentId) {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('SELECT * FROM commentaire WHERE id = ?');
		$requete->execute([$commentId]);
		return $requete->fetchAll(PDO::FETCH_CLASS,Commentaire::class)[0];
	}

	public function listCommentsOfPost($idPost) {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('SELECT * FROM commentaire WHERE id_postc = ? AND verification = "validee"');
		$requete->execute($idPost);
		return $requete->fetchAll(PDO::FETCH_CLASS,Commentaire::class);
	}

	public function validateComment($idComment) {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('UPDATE commentaire SET verification = "validee" WHERE id = ?');
		$requete->execute($idComment);
		$requete->fetchAll(PDO::FETCH_CLASS,Commentaire::class)[0];
	}

	public function addComment($idPost, $comment, $date) {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('INSERT INTO commentaire (id_postc,commentaire,date)  VALUES (?, ?, ?)');
		$requete->execute(array($idPost, $comment, $date));
	}

	public function deleteComment($id) {
		$bdd = $this->getDB();
		$bdd->exec('DELETE FROM commentaire WHERE id = ' . $id);
	}

}
