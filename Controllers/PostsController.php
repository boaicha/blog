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
		$list = $postModel->listPost();
		$this->view('index', array(
				'posts' => $list,
			)
		);
	}

	/**
	 * route = /posts/post/id
	 * Affichage d'un post
	 * @param $id
	 * @return void|null
	 */
	public function post(array $id): void {
		$postsModel = new PostsModel();
		/** @var Post $post */
		$post = $postsModel->findPostById($id);

		$commentModel = new CommentModel();

		$comment = $_POST['comment'] ?? null;
		if ($comment) {
			$commentsPost = addslashes(htmlspecialchars($comment));
			$dateComment = date("d.m.y");
			$userId = $_SESSION['userId'];
			$commentModel->addComment($post->getId(), $commentsPost, $dateComment, $userId);
		}

		$comments = $commentModel->listCommentsOfPost($id);
		// var_dump($comments); die();
		$this->view('post', array(
				'post' => $post,
				'comments' => $comments,
			)
		);

	}
}
