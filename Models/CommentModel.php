<?php

namespace App\Models;

class CommentModel extends Model {

    private $idPost;
    private $statutComment;

    //fonction pour afficher tout les commentaires d'un post précis
    public function displayCommentAdmin($idPost){

        $bdd =$this->getDB();
        $requete = $bdd->prepare('SELECT*FROM commentaire WHERE id_postc = ? AND verification = "en cours"');
        $requete->execute(array($idPost));
        $comment = $requete->fetchAll();
        return $comment;

    }

    public function displayCommentUser($idPost){

        $bdd =$this->getDB();
        $requete = $bdd->prepare('SELECT*FROM commentaire WHERE id_postc = ? AND verification = "validee"');
        $requete->execute($idPost);
        $comment = $requete->fetchAll();
        return $comment;

    }

    public function validateComment($idComment){
        $bdd =$this ->getDB();
        $requete = $bdd->prepare('UPDATE commentaire SET verification = "validee" WHERE id =?');
        $requete->execute($idComment);
        $requete->fetchAll();
        header("Location:" . "http://localhost:8080/public?p=adminPost");
        alert("Commentaire validé");

    }
   
    
    public function Addcomment($idPost, $comment, $date) {
        // $bdd= new connexionBdd();
        $bdd = $this->getDB();
        $requete = $bdd->prepare('INSERT INTO commentaire (id_postc,commentaire,date)  VALUES (?, ?, ?)');
        $requete->execute(array($idPost, $comment, $date));
    }


}