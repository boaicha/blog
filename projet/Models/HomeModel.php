<?php

namespace App\Models;
use PDO;

class HomeModel extends Model
{
    public function listPost(): array {
        $bdd = $this->getDB();
        $requete = $bdd->prepare('SELECT * FROM post ORDER BY id DESC LIMIT 3;');
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);

    }

}