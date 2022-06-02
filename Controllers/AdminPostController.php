<?php

namespace App\Controllers;

use App\Models\PostsModel;

class AdminPostController extends Controller{

	public function index() {
        $post = new PostsModel();
        $list = $post->listPost();
        // var_dump($list);
        return $this->view('AdminPost', array(
            'posts' => $list,
        )
    );


	}
}

