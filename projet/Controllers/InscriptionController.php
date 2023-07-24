<?php

namespace App\Controllers;

use App\Models\InscriptionModel;

class InscriptionController extends Controller {
	/**
	 * route = /inscription
	 * @return null
	 */
	public function index(): void {
		// si on a appuyer sur le bouton
		if (isset($_POST['inscription'])) {

			//$password = password_hash($_POST['password'],  PASSWORD_DEFAULT, [
             //       'cost' => 12,
            //    ]); //pour encoder le mot depasse

            $password = hash('ripemd160', $_POST['password']);

			$username = addslashes(htmlspecialchars(trim($_POST['mail']))); //mail
			$name = addslashes(htmlspecialchars(trim($_POST['nom'])));
			$prenom = addslashes(htmlspecialchars(trim($_POST['prenom'])));

			$inscription = new InscriptionModel();  //instancie la classe InscriptionModel
			$inscription->inscription($username, $password, $name, $prenom); //appelle de la fonction inscription de la class InscriptionModel
            $this->view('connexion');
		}else{
            $this->view('inscription');
        }


	}
}
