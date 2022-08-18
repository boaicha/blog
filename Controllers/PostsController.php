<?php

namespace App\Controllers;

use App\Models\CommentModel;
use App\Models\PostsModel;

class PostsController extends Controller {
	/**
	 * Affichage des la liste des posts
	 * @return void
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
	 * Affichage d'un post
	 * @param $id
	 * @return void
	 */
	public function post($id) {
		$postsModel = new PostsModel();
		$post = $postsModel->findPostById($id);

		$commentModel = new CommentModel();
		$comments = $commentModel->listCommentsOfPost($id);

		$commentsPost = addslashes(htmlspecialchars($_POST['commentModel'])) ?? null;
		$dateComment = date("d.m.y");
		$commentModel->addComment($id[0], $commentsPost, $dateComment);

		return $this->view('post', array(
				'post' => $post,
				'comments' => $comments,
			)
		);

	}
}
