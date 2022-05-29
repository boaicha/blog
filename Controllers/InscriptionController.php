<?php
namespace App\Controllers;

use App\Models\InscriptionModel;

class InscriptionController extends Controller {
	public function index() {

		if (isset($_POST['inscription'])) {  //si on a appuyer sur le bouton
            
			print_r("Vous etes sur le controlleur");
			// require('Modele/inscriptionModele.php'); //lienavec lemodele
			$password = md5($_POST['password']); //md5 pour encoder le mot depasse
			$username = $_POST['mail']; //mail
			$name = $_POST['nom'];
			$prenom = $_POST['prenom'];
            // var_dump($prenom);
			$inscription = new InscriptionModel();  //instancie la class connexion
			$inscription->inscription($username, $password, $name, $prenom); //appelle de la fonction compteValide de la class connexion

		}
        return $this->view('inscription', array(
            'prenom' => $prenom,
        ));
	}
}

?>