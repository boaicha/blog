<?php

namespace App\Controllers;

class ExceptionController extends Controller
{
    public function notFoundAction(string $url) : void{
        $this->view('404', array(
            'url' => $url
        ));
    }

    public function error500Action(string $message): void {
        $this->view('500', array(
            'message' => $message
        ));
    }
}
