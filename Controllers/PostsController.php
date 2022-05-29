<?php

namespace App\Controllers;

use App\Models\PostsModel;

class PostsController extends Controller{

    public function index(){
        $post = new PostsModel();
        $list = $post->listPost();
        // var_dump($list);
        return $this->view('index', array(
            'posts' => $list,
        )
    );
    }

}

?>