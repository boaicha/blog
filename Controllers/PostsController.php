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

    public function post($id){
        $post = new PostsModel();
        $postById = $post->findPostById($id);
        // var_dump($postById);
        return $this->view('post', array(
            'post' => $postById,
        )
    );
    }

}

?>