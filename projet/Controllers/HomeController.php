<?php

namespace App\Controllers;
use App\Models\HomeModel;

class HomeController extends Controller
{
	/**
	 * route = /home
	 * @return null
	 */
    public function index(): void {
        $model = new HomeModel();
        $posts = $model->listPost();
        $this->view('home', array(
            'posts' => $posts
        ));
    }
}
