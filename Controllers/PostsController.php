<?php

namespace App\Controllers;

use App\Models\CommentModel;
use App\Models\PostsModel;

class PostsController extends Controller {

	private $statutComment;

	public function index() {
		$post = new PostsModel();
		$list = $post->listPost();
		return $this->view('index', array(
				'posts' => $list,
			)
		);
	}

	public function post($id) {
		$post = new PostsModel();
		$postById = $post->findPostById($id);
		// var_dump($postById);
		$comment = new CommentModel();
		// $statutComment = "validee";
		$commentById = $comment->displayCommentUser($id);
		// print_r($_POST);
		$commentsPost = $_POST['comment'];
		$dateComment = date("d.m.y");
		$comment->addComment($id[0], $commentsPost, $dateComment);
		return $this->view('post', array(
				'post' => $postById,
				'comment' => $commentById,
			)
		);

	}
}
