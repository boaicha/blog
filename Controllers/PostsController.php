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

	public function index() {
		$postModel = new PostsModel();
		$list = $postModel->listPost();
		return $this->view('index', array(
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
	public function post($id) {
		$postsModel = new PostsModel();
		/** @var Post $post */
		$post = $postsModel->findPostById($id);

		$commentModel = new CommentModel();
		$comments = $commentModel->listCommentsOfPost($id);

		$comment = $_POST['comment'] ?? null;
		if ($comment) {
			$commentsPost = addslashes(htmlspecialchars($comment));
			$dateComment = date("d.m.y");
			$commentModel->addComment($post->getId(), $commentsPost, $dateComment);
		}

		return $this->view('post', array(
				'post' => $post,
				'comments' => $comments,
			)
		);

	}
}
