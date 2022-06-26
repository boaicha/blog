<?php

namespace App\Models;

class CommentModel extends Model {

	private $idPost;
	private $statutComment;

	/**
	 * fonction pour afficher tout les commentaires d'un post précis
	 * @param $idPost
	 * @return array|false
	 */
	public function displayCommentAdmin($idPost) {

		$bdd = $this->getDB();
		$requete = $bdd->prepare('SELECT*FROM commentaire WHERE id_postc = ? AND verification = "en cours"');
		$requete->execute(array($idPost));
		return $requete->fetchAll();
	}

	public function displayCommentUser($idPost) {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('SELECT*FROM commentaire WHERE id_postc = ? AND verification = "validee"');
		$requete->execute($idPost);
		return $requete->fetchAll();
	}

	public function validateComment($idComment) {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('UPDATE commentaire SET verification = "validee" WHERE id =?');
		$requete->execute($idComment);
		$requete->fetchAll();
		header("Location:" . "http://localhost:8080/public?p=adminPost");
		alert("Commentaire validé");
	}

	public function Addcomment($idPost, $comment, $date) {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('INSERT INTO commentaire (id_postc,commentaire,date)  VALUES (?, ?, ?)');
		$requete->execute(array($idPost, $comment, $date));
	}

}
