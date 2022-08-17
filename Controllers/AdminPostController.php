<?php

namespace App\Controllers;

use App\Models\CommentModel;
use App\Models\PostsModel;

class AdminPostController extends Controller {

	private $_suporttedFormats = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];

	public function index() {
		$post = new PostsModel();
		$list = $post->listPost();
		return $this->view('AdminPosts', array(
				'posts' => $list,
			)
		);
	}

	public function displayPost($id) {
		$modelPost = new PostsModel();
		$postWithId = $modelPost->findPostById($id);
		return $this->view('updatePost', array(
			'post' => $postWithId,
		));
	}

	public function updatePost($id) {

		if (isset($_FILES['file'])) {
			$this->uploadFile($_FILES['file']);
			$nameFile = $_FILES['file']['name'];
			if (isset($_POST['Update'])) {  //si on a appuyer sur le bouton

				print_r("Vous etes sur le controlleur");
                $chapo = addslashes(htmlspecialchars($_POST['chapo'])); //md5 pour encoder le mot depasse
                $titre = addslashes(htmlspecialchars($_POST['titre']));
                $date_mjr =addslashes( htmlspecialchars($_POST['date_mjr']));
                $date_modif = addslashes(htmlspecialchars($_POST['date_modif']));

				$updatePost = new PostsModel();  //instancie la class connexion
				$updatePost->updatePost($titre, $chapo, $nameFile, $date_mjr, $date_modif, $id[0]); //appelle de la fonction compteValide de la class connexion

			}
		} else {
			die('L\'image n\'a pas été submit');
		}


	}

	public function uploadFile($file) {
		if (is_array($file)) {
			if (in_array($file['type'], $this->_suporttedFormats)) {
				move_uploaded_file($file['tmp_name'], '../css/produit/image/' . $file['name']);
				echo 'L\'image a bien été uploader avec succès ! ';
			} else {
				die('Le format n\'est supporté ! ');
			}

		} else {
			die('Aucune image n\'a été uploadée !');
		}
	}

	public function postAdmin($id) {
		$post = new PostsModel();
		$postById = $post->findPostById($id);
		$comment = new CommentModel();
		$commentById = $comment->displayCommentAdmin($id[0]);

		if (!empty($_POST)) {
			$commentsPost =addslashes(htmlspecialchars($_POST['comment']));
			$dateComment = date("d.m.y");
			$comment->addComment($id[0], $commentsPost, $dateComment);
		}

		return $this->view('postAdmin', array(
				'post' => $postById,
				'comment' => $commentById,
			)
		);
	}

	public function valideComment($id) {
		$commentModel = new CommentModel();
		$commentModel->validateComment($id);
		return $this->view('adminPosts');
	}

	public function deletePost($id) {
		$modelPost = new PostsModel();
		$modelPost->deletePost($id);
		return $this->view('adminPosts');

	}
}

