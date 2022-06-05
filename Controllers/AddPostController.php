<?php

namespace App\Controllers;

use App\Models\PostsModel;

class AddPostController extends Controller{

	private $_suporttedFormats = ['image/png','image/jpeg','image/jpg','image/gif'];

	public function index() {
        
	
    return $this->view('AddPost');

}

	public function add(){
		
		if(isset($_FILES['file'])){
			$this->uploadFile($_FILES['file']);
			$nameFile = $_FILES['file']['name'];
			if (isset($_POST['Upload'])){  //si on a appuyer sur le bouton
            
				print_r("Vous etes sur le controlleur");
				// require('Modele/inscriptionModele.php'); //lienavec lemodele
				$chapo = $_POST['chapo']; //md5 pour encoder le mot depasse
				$titre = $_POST['titre'];
				$date_mjr = $_POST['date_mjr'];
				$date_modif = $_POST['date_modif'];
				
				
				$ajoutPost = new PostsModel();  //instancie la class connexion
				$ajoutPost->AddPost($chapo, $titre, $nameFile, $date_mjr, $date_modif); //appelle de la fonction compteValide de la class connexion
			// var_dump($list);
		   
	
	
		}
		}else{
			die('L\'image n\'a pas été submit');
		}
		
		
	}

	public function uploadFile($file){
        if(is_array($file)){
            if(in_array($file['type'],$this->_suporttedFormats)){
                move_uploaded_file($file['tmp_name'],'../css/produit/image/'.$file['name']);
                echo 'L\'image a bien été uploader avec succès ! ';
            }else{
                die('Le format n\'est supporté ! ');
            }

        }else{
            die('Aucune image n\'a été uploadée !');
        }
    }

}