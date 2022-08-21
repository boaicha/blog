<?php

namespace App\Controllers;

class ExceptionController extends Controller
{
    public function notFoundAction($url) {
        return $this->view('404', array(
            'url' => $url
        ));
    }

    public function error500Action($message) {
        return $this->view('500', array(
            'message' => $message
        ));
    }
}
