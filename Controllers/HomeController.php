<?php

namespace App\Controllers;
use App\Models\HomeModel;

class HomeController extends Controller
{
    public function index() {
        $model = new HomeModel();
        $posts = $model->listPost();
        return $this->view('home', array(
            'posts' => $posts
        ));
    }
}