<?php

class connexionBdd {


    public function __construct(){             //on definit le constructeur

    }

    public function bdd(){

            $bdd = new PDO('mysql:host=localhost;dbname=blog','root','');
            return $bdd;



    }


}

