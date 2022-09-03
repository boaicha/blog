<?php

namespace App\Controllers;

use App\Models\PostsModel;

class AddPostController extends Controller {

	private $_suporttedFormats = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];

	public function index() {
		return $this->view('AddPost');
	}

	public function add() {
		if (isset($_FILES['file'])) {
			$this->uploadFile($_FILES['file']);
			$nameFile = $_FILES['file']['name'];

			if (isset($_POST['Upload'])) {  //si on a appuyer sur le bouton
				$chapo = addslashes(htmlspecialchars($_POST['chapo'])); //md5 pour encoder le mot depasse
				$titre = addslashes(htmlspecialchars($_POST['titre']));
				$date_mjr =addslashes( htmlspecialchars($_POST['date_mjr']));
				$date_modif = addslashes(htmlspecialchars($_POST['date_modif']));

				$ajoutPost = new PostsModel();  //instancie la class connexion
				$ajoutPost->addPost($chapo, $titre, $nameFile, $date_mjr, $date_modif); //appelle de la fonction compteValide de la class connexion
			}
		} else {
			throw new \Exception('L\'image n\'a pas été submit', 409);
		}

	}

	public function uploadFile($file) {
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
