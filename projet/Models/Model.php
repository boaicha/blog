<?php

namespace App\Models;

// PDO represente la cle de connexion entre php et la base de donnée
use PDO;

abstract class Model {

    //Retourne l'instanciation PDO avec les informations en parametre de la base de donnée .
    protected function getDB(): PDO {
        return new PDO(
			'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'],
	        $_ENV['DB_USER'],
	        $_ENV['DB_PASSWORD']
        );
    }

}
