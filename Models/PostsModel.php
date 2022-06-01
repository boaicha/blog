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


}

?>