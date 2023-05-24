<?php

namespace App\Controllers;

use App\Models\PostsModel;

class AddPostController extends Controller {


	private $_suporttedFormats = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];

	public function index(): void {
		$this->view('AddPost');
	}

	public function add(): void {
		if (isset($_FILES['file'])) {
			$this->uploadFile($_FILES['file']);
			$nameFile = $_FILES['file']['name'];

			if (isset($_POST['Upload'])) {  //si on a appuyer sur le bouton
				$chapo = addslashes(htmlspecialchars($_POST['chapo']));
				$titre = addslashes(htmlspecialchars($_POST['titre']));
				$date_mjr =addslashes( htmlspecialchars($_POST['date_mjr']));
				$date_modif = addslashes(htmlspecialchars($_POST['date_modif']));
                $descriptif = addslashes(htmlspecialchars($_POST['descriptif']));

                $userId = $_SESSION['userId'];

				$ajoutPost = new PostsModel();  //instancie la class connexion
				$ajoutPost->addPost($chapo, $titre, $nameFile, $date_mjr, $date_modif,$descriptif,$userId); //appelle de la fonction compteValide de la class connexion

				header('Location:' . '/public?p=adminPost'); // redirection vers adminPost
			}
		} else {
			throw new \Exception('L\'image n\'a pas été submit', 409);
		}

	}
//telecharger une image
	public function uploadFile(array $file): void {
		if (is_array($file)) {
			if (in_array($file['type'], $this->_suporttedFormats)) {
				move_uploaded_file($file['tmp_name'], '../css/produit/image/' . $file['name']);
				echo 'L\'image a bien été uploader avec succès ! ';
			} else {
				throw new \Exception('Le format n\'est supporté ! ', 409);
			}

		} else {
			throw new \Exception('Aucune image n\'a été uploadée !', 409);
		}
	}

}
