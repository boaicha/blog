<?php
// use Controlleur;

require_once('controlleur.php');
require_once('Modele/postsModele.php');



class PostsControlleur extends Controlleur {

    public function index() {
        $posts = new post();
        $posts->listPost();
        var_dump($posts);
        return $this->view('posts', compact($posts));

    }

}





?>
