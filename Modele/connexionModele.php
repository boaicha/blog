<?php

require_once('connexionbdd.php');

class connexion extends connexionBdd
{

    private $username;           //definir les variables qui vont etre utilisé
    private $password;

  public function __construct($username, $password){             //on definit le constructeur
    $this -> username = $username;
    $this -> password = $password;
  }

    public function seConnecter($username, $password){
        // $bdd= new connexionBdd();
        $bdd= $this->bdd();
        $requete = $bdd-> prepare('SELECT * FROM user WHERE mail= ? and password = ?');
        $requete->execute(array($username, $password));
        $data = $requete->fetch();
        $nbreUtilisateur=$requete-> rowCount();
        if ($nbreUtilisateur==0) {
            echo("se compte n'existe pas");

        }elseif ($nbreUtilisateur==1) {
          $_SESSION["statut"] = $data["statut"];
          if($data["statut"] == "user"){
            echo("vous etes connecter");
          }elseif ($data["statut"] == "admin") {
            echo("vous etes connecter administrateur");
            echo($_SESSION["statut"]);
          }
            
        }
        return $_SESSION["statut"];

    }



}


?>