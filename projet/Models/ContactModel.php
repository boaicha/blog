<?php

namespace App\Models;

use App\Controllers\ContactController;
use PDO;

class ContactModel extends Model{

    public function addMessage(string $nom, string $email, string $objet, string $message, int $idUser): void{

        $bdd = $this->getDB();
        $requete = $bdd->prepare('INSERT INTO message (email, objet, message, idUser, nom) VALUES (?,?,?,?,?)');
        $requete->execute(array($email,$objet,$message, $idUser,$nom));

    }

    public function listMessage(): array {
        $bdd = $this->getDB();
        $requete = $bdd->prepare('SELECT * FROM message ');
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_CLASS,ContactController::class);

    }


}


?>