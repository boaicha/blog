<?php

namespace App\Controllers;

class ExceptionController extends Controller
{
    public function notFoundAction(string $url) {
        return $this->view('404', array(
            'url' => $url
        ));
    }

    public function error500Action(string $message) {
        return $this->view('500', array(
            'message' => $message
        ));
    }
}
