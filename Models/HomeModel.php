<?php

namespace App\Models;
use PDO;

class HomeModel extends Model
{
    public function listPost() {
        $bdd = $this->getDB();
        $requete = $bdd->prepare('SELECT * FROM post LIMIT 2');
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);

    }
}