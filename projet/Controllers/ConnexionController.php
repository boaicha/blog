<?php

namespace App\Controllers;

use App\Entity\User;
use App\Models\ConnexionModel;

class ConnexionController extends Controller {
	const ROLE_ADMIN = 'admin';

	/**
	 * route = /connexion/index
	 * @return null
	 * @throws \Exception
	 */
	public function index():void {
		$token = $this->generateToken();

		if (isset($_POST['connexion'])) {  // si on appuie ou valider le bouton connexion dans le formulaire
            if (hash_equals($token, $_POST['csrf'])){
                $password = htmlspecialchars(trim($_POST['password']));
                //var_dump($password);
                $username = addslashes(htmlspecialchars(trim($_POST['username']))); //mail retirer les espaces ajout de slash si (').sous format html
                $connexionModel = new ConnexionModel();  // instancie la class connexion
                $user = $connexionModel->findUser($username); //appelle de la fonction findUser de la class connexion
                if($user->getPassword() == hash('ripemd160', $password)) {
                        // S il trouve le user.
                        /** @var User $user */
                        //$user = $user[0];
                        $status = $user->getStatut();
                        $_SESSION['statut'] = $status;
                        $_SESSION['username'] = $user->getMail();
                        $_SESSION['password'] = $user->getPassword();
                        $_SESSION['userId'] = $user->getId();

                        if ($status == self::ROLE_ADMIN) {
                            header("Location:" . "/public?p=adminPost");
                        } else {
                            header("Location:" . "/public?p=home");
                        }

                }else{
                    echo("se compte n'existe pas");
                   // $passwordHash = hash('ripemd160', 'pepe');
                   // echo hash('ripemd160', 'pepe');

                    //var_dump(password_verify($password, $user->getPassword()));
                    var_dump($user);
                }
            } else {
                echo 'CSRF failed';
            }

		}
		$this->view('connexion', array(
            'csrf' => $token,
        ));

	}

	private function generateToken(): string {
		if (empty($_SESSION['token'])){
			$_SESSION['token'] = bin2hex(random_bytes(32));
		}

		return hash_hmac('sha256', 'this is some string', $_SESSION['token']);
	}


}

