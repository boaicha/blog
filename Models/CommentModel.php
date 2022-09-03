<?php

namespace App\Models;

use App\Entity\Commentaire;
use PDO ;

class CommentModel extends Model {


	/**
	 * fonction pour afficher tout les commentaires d'un post précis
	 * @param $idPost
	 * @return array|false
	 */
	public function displayCommentAdmin($idPost) {

		$bdd = $this->getDB();
		$requete = $bdd->prepare('SELECT*FROM commentaire WHERE id_postc = ? AND verification = "en cours"');
		$requete->execute(array($idPost));
		return $requete->fetchAll(PDO::FETCH_CLASS,Commentaire::class);
	}

	public function listCommentsOfPost($idPost) {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('SELECT * FROM commentaire WHERE id_postc = ? AND verification = "validee"');
		$requete->execute($idPost);
		return $requete->fetchAll(PDO::FETCH_CLASS,Commentaire::class);
	}

	public function validateComment($idComment) {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('UPDATE commentaire SET verification = "validee" WHERE id =?');
		$requete->execute($idComment);
		$requete->fetchAll(PDO::FETCH_CLASS,Commentaire::class)[0];
		header("Location:" . "http://localhost:8080/public?p=adminPost");
		alert("Commentaire validé");
	}

	public function addComment($idPost, $comment, $date) {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('INSERT INTO commentaire (id_postc,commentaire,date)  VALUES (?, ?, ?)');
		$requete->execute(array($idPost, $comment, $date));
	}

}
