<?php

namespace App\Models;

use App\Entity\Commentaire;
use PDO ;

class CommentModel extends Model {

	/**
	 * fonction pour afficher tout les commentaires d'un  article précis
	 * @param $idPost
	 * @return Commentaire[]
	 */
    //Recuperer les commentaires par id du  article
	public function getCommentByPostId(int $idPost) {
        //$bdd Represente'instanciation PDO retourner par getDB .

		$bdd = $this->getDB();
		$requete = $bdd->prepare('SELECT c.*, CONCAT(u.prenom, " ", u.nom) as userName FROM commentaire c LEFT JOIN user u ON c.id_userc = u.id WHERE c.id_postc = ? AND c.verification = "en cours"');
		$requete->execute(array($idPost));
		return $requete->fetchAll(PDO::FETCH_CLASS,Commentaire::class);
	}

	/**
	 * @param $commentId
	 * @return Commentaire|null
	 */
    //Recuperer les commentaires par id du commentaire .
	public function getCommentById(int $commentId) {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('SELECT c.*, CONCAT(u.prenom, " ", u.nom) as userName FROM commentaire c LEFT JOIN user u ON c.id_userc = u.id WHERE c.id = ?');
		$requete->execute([$commentId]);
		return $requete->fetchAll(PDO::FETCH_CLASS,Commentaire::class)[0];
	}
    //Recuperer la liste des commentaires du  article
	public function listCommentsOfPost(array $idPost): array {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('SELECT c.*, CONCAT(u.prenom, " ", u.nom) as userName FROM commentaire c LEFT JOIN user u ON c.id_userc = u.id WHERE c.id_postc = ? AND c.verification = "validee"');
		$requete->execute($idPost);
		return $requete->fetchAll(PDO::FETCH_CLASS,Commentaire::class);
	}
    //valider  le commentaires saisi par l'admin .
	public function validateComment(array $idComment): void {
		$bdd = $this->getDB();
		$requete = $bdd->prepare('UPDATE commentaire SET verification = "validee" WHERE id = ?');
		$requete->execute($idComment);
		$requete->fetchAll(PDO::FETCH_CLASS,Commentaire::class)[0];
	}


	public function addComment(int $idPost, string $comment, string $date, int $userId): void {
        //$bdd Represente'instanciation PDO retourner par getDB .
		$bdd = $this->getDB();
		$requete = $bdd->prepare('INSERT INTO commentaire (id_postc,commentaire,date, id_userc)  VALUES (?, ?, ?, ?)');
		$requete->execute(array($idPost, $comment, $date, $userId));
	}
    //Effaces les commentaires par id du commentaire .
	public function deleteComment(int $id): void {
		$bdd = $this->getDB();
		$lol = $bdd->prepare('DELETE FROM commentaire WHERE id = :id');
        $lol->bindParam('id', $id,PDO::PARAM_INT);
        $lol->execute();
	}
    //Effaces les commentaires par id de l article .
    public function deleteCommentsByPostId(int $idPost): void {

        $bdd = $this->getDB();
        $requete = $bdd->prepare('DELETE FROM commentaire WHERE id_postc = ?');
        $requete->execute(array($idPost));
    }

}
