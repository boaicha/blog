<?php

require_once('connexionbdd.php');

class post extends connexionBdd
{


    public function listPost(){
        // $bdd= new connexionBdd();
        $bdd= $this->bdd();
        $requete = $bdd-> prepare('SELECT * FROM post');
        $requete->execute();
        // while ($post = $requete->fetch()) {
        // //    var_dump($post);
        
        //    return $post;
        // }
        return $requete->fetchAll(PDO::FETCH_ASSOC);
        var_dump($requete);
       
    }



}


?>