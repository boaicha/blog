<?php

namespace App\Model;

class Manager {

	public function getDbConnect() {
		return new \PDO('mysql:host=localhost;dbname=blog', 'root', '');
	}

}

