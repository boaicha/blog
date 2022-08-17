<?php

namespace App\Controllers;

use App\Models\ConnexionModel;

class ConnexionController extends Controller {

	public function index() {
        if(!isset($_SESSION)){
            session_start();
        }


        if(empty($_SESSION['key'])){
            $_SESSION['key'] = bin2hex(random_bytes(32));
        }

        $csrf = hash_hmac('sha256', 'this is some string', $_SESSION['key']);

		if (isset($_POST['connexion'])) {  //si on a appuyer sur le bouton
			print_r("Vous etes sur le controlleur");
            if(hash_equals($csrf, $_POST['csrf'])){
                $password = md5(htmlspecialchars($_POST['password'])); //md5 pour encoder le mot depasse
                $username = addslashes(htmlspecialchars($_POST['username'])); //mail
                $connexion = new ConnexionModel();  //instancie la class connexion
                $connexion->seConnecter($username, $password); //appelle de la fonction compteValide de la class connexion
            }else{
                echo 'CSRF failed';
            }

		}
		return $this->view('connexion', array(
            'csrf' => $csrf,
        ));

	}

}

