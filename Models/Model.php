<?php

namespace App\Models;

use PDO;

abstract class Model{

    protected function getDB(){

        $bdd = new PDO('mysql:host=localhost;dbname=blog','root','');
        return $bdd;

    }

}
