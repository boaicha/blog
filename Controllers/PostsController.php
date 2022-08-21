<?php

namespace App\Controllers;

use App\Models\CommentModel;
use App\Models\PostsModel;

class PostsController extends Controller {
	/**
	 * route = /posts
	 * Affichage des la liste des posts
	 * @return void|null
	 */
	public function index() {
		$post = new PostsModel();
		$list = $post->listPost();
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
		$post = $postsModel->findPostById($id);

		$commentModel = new CommentModel();
		$comments = $commentModel->listCommentsOfPost($id);

		$comment = $_POST['commentModel'] ?? null;
		$commentsPost = addslashes(htmlspecialchars($comment));
		$dateComment = date("d.m.y");
		$commentModel->addComment($id[0], $commentsPost, $dateComment);

		return $this->view('post', array(
				'post' => $post,
				'comments' => $comments,
			)
		);

	}
}
