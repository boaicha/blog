<?php

namespace App\Controllers;

use App\Entity\Post;
use App\Models\CommentModel;
use App\Models\PostsModel;

class PostsController extends Controller {
	/**
	 * route = /posts
	 * Affichage des la liste des posts
	 * @return void|null
	 */

	public function index(): void {
		$postModel = new PostsModel();
        // J appel la fonction listPost.
		$list = $postModel->listPost();
		$this->view('index', array(
				'posts' => $list,
			)
		);
	}

	/**
	 * route = /posts/post/id
	 * Affichage d'un article
	 * @param $id
	 * @return void|null
	 */
    //
	public function post(array $id): void {
		$postsModel = new PostsModel();
		/** @var  article $post */
		$post = $postsModel->findPostById($id);

		$commentModel = new CommentModel();
        //on stock dans $comment le commentaire s il y en a un .
		$comment = $_POST['comment'] ?? null;
		if ($comment) {
			$commentsPost = addslashes(htmlspecialchars($comment));
			$dateComment = date("d.m.y");
			$userId = $_SESSION['userId'];
            //si le statut est un user alors on ajoute le commentaire a la base de donnée.
            if($_SESSION['statut'] == 'user'){
                $commentModel->addComment($post->getId(), $commentsPost, $dateComment, $userId);
            }else{

               // header("Location:" . "/public?p=home");
                echo '<script type="text/javascript">
                    window.onload = function () { alert("Veuillez vous connecter"); }
                </script>';
            }

		}

        //permet d afficher la liste des commentaire du  article dans post.twig .
		$comments = $commentModel->listCommentsOfPost($id);
		// var_dump($comments); die();
		$this->view('post', array(
				'post' => $post,
				'comments' => $comments,
			)
		);

	}
}
