<?php

namespace App\Controllers;

use App\Models\PostsModel;

use App\Models\CommentModel;

class PostsController extends Controller{

    private String $statutComment; 

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

?>