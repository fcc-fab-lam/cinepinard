<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Manager\UserManager;

class UsersController extends Controller
{

	// TRAITEMENT FORMULAIRE D'INSCRIPTION
	public function signUp()
	{
		$userManager = new UserManager();
		// On instancie nos variables
		$post = array();
		$err = array();
		$formValid = false;
		$showErr = false;
		$maxSize = 200000;
		$mimeTypeAllowed = array('image/jpg', 'image/jpeg', 'image/gif', 'image/png'); // Controle l'extension de l'image
			// On nettoie $_POST
		if(!empty($_POST)){
			foreach($_POST as $key => $value){
				$post[$key] = trim(strip_tags($value));
			}
			// var_dump($post); var_dump($_FILES); die();
			
			// On verifie les champs
			// Nom
			if(strlen($post['lastname'])<3){
				$err[] = 'Le nom doit faire au moins 3 caractères';
			}
			// Prénom
			if(strlen($post['firstname'])<3){
				$err[] = 'Le prénom doit faire au moins 3 caractères';
			}
			// Pseudo
			if(strlen($post['pseudo'])<3){
				$err[] = 'Le pseudo doit faire au moins 3 caractères';
			}
			// Email
			if(!filter_var($post['email'], FILTER_VALIDATE_EMAIL)){
				$err[] = 'L\'adresse email renseignée n\'est pas valide';
			}
			else{
				// On verifie que l'email n'existe pas déjà dans la bdd
				if($userManager->emailExists($post['email'])){
					$err[] = 'L\'adresse email renseignée est déjà utilisée';
				}
			}
			// Mot de passe
			if(strlen($post['password1'])<8){
				$err[] = 'Le mot de passe doit faire au moins 8 caractères';
			}
			if($post['password1'] !== $post['password2']){
				$err[] = 'Les mots de passe doivent être identique';
			}
			// Image
			if(empty($_FILES['photo']['tmp_name'])){
				$err[] = 'Vous devez insérer une image';
			}
			elseif($_FILES['photo']['size'] > $maxSize){
				$err[] = 'L\'image excède le poids autorisé';
			}
			elseif(!empty($_FILES['photo']['tmp_name'])){ 
				$finfo = new finfo();
				$fileMimeType = $finfo->file($_FILES['img']['tmp_name'], FILEINFO_MIME_TYPE);
				if(!in_array($fileMimeType, $mimeTypeAllowed)){
					$err[] = 'Le fichier n\'est pas une image';
				}
			}
			// Majorité
			if(!isset($post['majeur'])){
				$err[] = 'Vous devez être majeur pour vous inscrire';
			}
		}
		// On regarde s'il y a des erreurs
		if(count($err)>0){
			$showErr = true;
		}
		// S'il n'y a pas d'erreur on enregistre en BDD
		else{
			$userManager->insert($post);
		}

		$this->show('default/signup', ['showErr' => $showErr, 'err' => $err]);
	}
}