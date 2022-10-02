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
	public function index() {
		$token = $this->generateToken();

		if (isset($_POST['connexion'])) {  // Traitement du formulaire envoyé
            if (hash_equals($token, $_POST['csrf'])){
                $password = md5(htmlspecialchars($_POST['password'])); //md5 pour encoder le mot depasse
                $username = addslashes(htmlspecialchars($_POST['username'])); //mail
                $connexionModel = new ConnexionModel();  // instancie la class connexion
                $user = $connexionModel->findUser($username, $password); //appelle de la fonction compteValide de la class connexion

	            if (!count($user)) {
		            echo("se compte n'existe pas");
	            } else {
		            /** @var User $user */
		            $user = $user[0];
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
	            }
            } else {
                echo 'CSRF failed';
            }

		}
		return $this->view('connexion', array(
            'csrf' => $token,
        ));

	}

	private function generateToken() {
		if (empty($_SESSION['token'])){
			$_SESSION['token'] = bin2hex(random_bytes(32));
		}

		return hash_hmac('sha256', 'this is some string', $_SESSION['token']);
	}

	private function redirectToAdminPage() {
		$controller = new AdminPostController();
		$controller->index();
		//exit();
	}

	private function redirectToHomePage() {
		$controller = new HomeController();
		$controller->index();
		//exit();
	}

}

