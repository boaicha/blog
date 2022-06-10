<?php

namespace App\Models;

class CommentModel extends Model {

    private $idPost;

    //fonction pour afficher tout les commentaires d'un post précis
    public function displayComment($idPost){
        $bdd =$this->getDB();
        $requete = $bdd->prepare('SELECT*FROM commentaire WHERE id_postc =?');
        $requete->execute($idPost);
        $comment = $requete->fetchAll();
        return $comment;

    }
    public function Addcomment($idPost, $comment, $date) {
        // $bdd= new connexionBdd();
        $bdd = $this->getDB();
        $requete = $bdd->prepare('INSERT INTO commentaire (id_postc,commentaire,date)  VALUES (?, ?, ?)');
        $requete->execute(array($idPost, $comment, $date));
    }


}