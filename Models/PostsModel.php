<?php

namespace App\Models;

use PDO;

class PostsModel extends Model
{

    public function listPost(){
        // $bdd= new connexionBdd();
        $bdd= $this->getDB();
        $requete = $bdd-> prepare('SELECT * FROM post');
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
       
    }
// pour la fonction rechercher un post par son identifiant
    public function findPostById($id){
        $bdd= $this->getDB();
        $requete = $bdd->prepare('SELECT*FROM post WHERE id=?');
        $requete->execute($id);
        return $requete->fetch();
    }

    public function AddPost($chapo, $titre, $nameFile, $date_mjr, $date_modif) {
        // $bdd= new connexionBdd();
        $bdd = $this->getDB();
        $requete = $bdd->prepare('INSERT INTO post (titre,chapo, img, date_mjr, date_modif)  VALUES (?, ?, ?, ?, ?)');
        $requete->execute(array($titre, $chapo, $nameFile, $date_mjr, $date_modif));
        header("Location:" . "http://localhost:8080/public?p=adminPost");

    }

    public function deletePost($id) {
        // $bdd= new connexionBdd();
        $bdd = $this->getDB();
        $requete = $bdd->prepare('DELETE FROM post WHERE id = ?');
        $requete->execute($id);
        header("Location:" . "http://localhost:8080/public?p=adminPost");
    }

    public function updatePost($titre, $chapo, $nameFile, $date_mjr, $date_modif, $id){
        $bdd = $this->getDB();
        $requete = $bdd->prepare('UPDATE post SET titre=?, date_modif=?, img=?, chapo=?, date_mjr=? WHERE id = ?');
        $requete->execute(array($titre, $date_modif, $nameFile, $chapo, $date_mjr, $id));
        header("Location:" . "http://localhost:8080/public?p=adminPost");
    }



}

?>