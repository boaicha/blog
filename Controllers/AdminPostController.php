<?php

namespace App\Controllers;

use App\Models\CommentModel;
use App\Models\PostsModel;

class AdminPostController extends Controller {

	/**
	 * @var string[]
	 */
	private array $_suporttedFormats = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];

	/**
	 * route = /adminPost/index
	 * @return null
	 */
	public function index() {
		$post = new PostsModel();
		$list = $post->listPost();
		// var_dump($list);
		// die();
		return $this->view('AdminPosts', array(
				'posts' => $list,
			)
		);
	}

	/**
	 * route = /adminPost/displayPost/id
	 * @param $id
	 * @return null
	 */
	public function displayPost(array $id) {
		$modelPost = new PostsModel();
		$postWithId = $modelPost->findPostById($id);

		return $this->view('updatePost', [
			'post' => $postWithId,
		]);
	}

	/**
	 * route = /adminPost/updatePost/id
	 * @param $id
	 * @return void
	 * @throws \Exception
	 */
	public function updatePost(array $id) {
		if (isset($_FILES['file'])) {
			$this->uploadFile($_FILES['file']);
			$nameFile = $_FILES['file']['name'];
			if (isset($_POST['Update'])) {  //si on a appuyer sur le bouton

                $chapo = addslashes(htmlspecialchars($_POST['chapo'])); //md5 pour encoder le mot depasse
                $titre = addslashes(htmlspecialchars($_POST['titre']));
                $date_mjr =addslashes( htmlspecialchars($_POST['date_mjr']));
                $date_modif = addslashes(htmlspecialchars($_POST['date_modif']));

				$updatePost = new PostsModel();  //instancie la class connexion
				$updatePost->updatePost($titre, $chapo, $nameFile, $date_mjr, $date_modif, $id[0]); //appelle de la fonction compteValide de la class connexion

				$this->_redirectToHomePage();

			}
		} else {
			throw new  \Exception('L\'image n\'a pas été submit', 409);
		}


	}

	public function uploadFile(array $file) {
		if (is_array($file)) {
			if (in_array($file['type'], $this->_suporttedFormats)) {
				move_uploaded_file($file['tmp_name'], '../css/produit/image/' . $file['name']);
				echo 'L\'image a bien été uploader avec succès ! ';
			} else {
				throw new \Exception('Le format n\'est supporté ! ');
			}

		} else {
			throw new \Exception('Aucune image n\'a été uploadée !');
		}
	}

	public function postAdmin(array $id) {
		$postModel = new PostsModel();
		$post = $postModel->findPostById($id);
		$commentModel = new CommentModel();
		$comments = $commentModel->getCommentByPostId($id[0]);
		// var_dump($comments); die();

		if (!empty($_POST)) {
			$commentsPost =addslashes(htmlspecialchars($_POST['comment']));
			$commentModel->addComment($post->getId(), $commentsPost, date('d.m.y'));
		}

		return $this->view('postAdmin', [
				'post' => $post,
				'comments' => $comments,
			]
		);
	}

	public function valideComment(array $id) {
		$commentModel = new CommentModel();
		$commentModel->validateComment($id);
		$this->_redirectToHomePage();
	}

	public function deletePost(array $id) {
		$modelPost = new PostsModel();
		$modelPost->deletePost($id[0]);
		$this->_redirectToHomePage();
	}

	public function deleteComment(array $commentId) {
		$commentModel = new CommentModel();
		$comment = $commentModel->getCommentById($commentId[0]);
		if ($comment) {
			$commentModel->deleteComment($comment->getId());
			$this->_redirectToPost($comment->getIdPostc());
		} else {
			$this->_redirectToHomePage();
		}

	}

	private function _redirectToHomePage() {
		header('Location:' . '/public?p=adminPost');
	}

	private function _redirectToPost(int $postId) {
		header('Location:' . '/public?p=adminPost/postAdmin/' . $postId);
	}
}

