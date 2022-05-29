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



}

?>