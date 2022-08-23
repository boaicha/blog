<?php

namespace App\Controllers;

use App\Models\CommentModel;
use App\Models\PostsModel;

class PostsController extends Controller {

	private $statutComment;
    private $id;

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

		$comment = new CommentModel();
		$commentById = $comment->displayCommentUser($id);

        // ?? verifie si $_POST n'est pas null et que  $_POST['comment'] existe, alors il affecte
        //  $_POST['comment'] à $commentsPost sinon $commentsPost = null
		$commentsPost = addslashes(htmlspecialchars($_POST['comment'])) ?? null;
		$dateComment = date("d.m.y");
		$comment->addComment($id[0], $commentsPost, $dateComment);

		return $this->view('post', array(
				'post' => $postById,
				'comment' => $commentById,
			)
		);

	}
}
