<?php

namespace App\Controllers;

use App\Models\ConnexionModel;

class DeconnexionController extends Controller {

	/**
	 * route = /deconnexion
	 * @return void
	 */
    public function index() {
		$_SESSION['statut'] = null;
	    header("Location:" . "/public?p=posts");
    }
}

