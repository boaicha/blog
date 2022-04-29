<?php

namespace App\Controller;


class PostController extends Controlleur {

	public function index() {
		$posts = new post();
		$posts->listPost();
		var_dump($posts);
		return $this->view('posts', compact($posts));

	}

}
