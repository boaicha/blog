<?php

namespace App\Controllers;

use App\Models\ConnexionModel;

class DeconnexionController extends Controller {

    public function index() {
		$_SESSION['statut'] = null;
	    header('Location:http://localhost:8080/public?p=connexion');
    }
}

