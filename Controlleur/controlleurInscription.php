<?php


if (isset($_POST['inscription'])){  //si on a appuyer sur le bouton
      print_r("Vous etes sur le controlleur");
      require('Modele/inscriptionModele.php'); //lienavec lemodele
      $password = md5($_POST['password']); //md5 pour encoder le mot depasse
      $username = $_POST['username']; //mail
      $name= $_POST['name'];
      $prenom = $_POST['prenom'];
      $inscription = new sinscrire($username, $password,$name,$prenom);  //instancie la class connexion
      $inscription->inscription($username, $password,$name,$prenom); //appelle de la fonction compteValide de la class connexion
      
  }



?>