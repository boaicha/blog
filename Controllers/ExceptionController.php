<?php

namespace App\Controllers;

class ExceptionController extends Controller
{
    public function notFoundAction(string $url) : array{
        return $this->view('404', array(
            'url' => $url
        ));
    }

    public function error500Action(string $message): array {
        return $this->view('500', array(
            'message' => $message
        ));
    }
}
