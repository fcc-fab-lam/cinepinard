<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\FixUserManager as UserManager;
use \Manager\WinesCategoriesManager as WinesCategories;
use \Manager\AlloCineManager as AlloCine;
use W\Security\AuthentificationManager;

class DefaultController extends Controller
{

	// TRAITEMENT FORMULAIRE D'INSCRIPTION
	public function signUp()
	{
		$userManager = new UserManager();
		$authentificationManager = new AuthentificationManager();
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
			if(strlen($post['nickname'])<3){
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
			if(strlen($post['password'])<8){
				$err[] = 'Le mot de passe doit faire au moins 8 caractères';
			}
			if($post['password'] !== $post['password2']){
				$err[] = 'Les mots de passe doivent être identique';
			}
			// Image
			/*if(empty($_FILES['photo']['tmp_name'])){
				$err[] = 'Vous devez insérer une image';
			}*/
			elseif($_FILES['photo']['size'] > $maxSize){
				$err[] = 'L\'image excède le poids autorisé';
			}
			elseif(!empty($_FILES['photo']['tmp_name'])){ 
				$finfo = new \finfo();
				$fileMimeType = $finfo->file($_FILES['photo']['tmp_name'], FILEINFO_MIME_TYPE);
				if(!in_array($fileMimeType, $mimeTypeAllowed)){
					$err[] = 'Le fichier n\'est pas une image';
				}
			}
			// Majorité
			if(!isset($post['majeur'])){
				$err[] = 'Vous devez être majeur pour vous inscrire';
			}
		// On regarde s'il y a des erreurs
			if(count($err)>0){
				$showErr = true;
			}
			// S'il n'y a pas d'erreur on enregistre en BDD
			else{
				// On supprime les variables majeur & password2 dont on a pas besoin
				unset($post['password2']);
				unset($post['majeur']);
				// On définit le role à utilisateur par défault 
				$post['role_id'] = 2;
				// On hash le password
				$post['password'] = password_hash($post['password'], PASSWORD_DEFAULT);

				$newUser = $userManager->insert($post);

				$imgExtension = explode('/', $fileMimeType)[1];
				// On récupère la classe qui permet d'utiliser la fonction
				$app = getApp();
				$imgPath = $app->getBasePath().'/uploads/'.$newUser["id"].'.'.$imgExtension;
				if(move_uploaded_file($_FILES['photo']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$imgPath)){
					$userManager->update(["photo" => $imgPath], $newUser["id"]);
				}
				$user = $userManager->find($signIn);
				$authentificationManager->logUserIn($user);
				$formValid = true;
			}
		}
		$params = ['showErr' => $showErr, 'err' => $err, 'formValid' => $formValid, 'post' => $post];
		$this->show('default/signup', $params);
	}

	// TRAITEMENT DU FORMULAIRE DE CONNEXION
	public function home()
	{
		// On instancie nos variables
		$err = array();
		$formValid = false;
		$showErr = false;
		$userManager = new UserManager();
		$authentificationManager = new AuthentificationManager();
		if(!empty($_POST)){
			// On verifie les champs Email & Password à l'aide de la fonction du AuthentificationManager
			$signIn = $authentificationManager->isValidLoginInfo($_POST['email'], $_POST['password']);
			if($signIn == 0){
				$err[] = 'L\'adresse email ou le mot de passe est incorrect';
			}
			// Si email et password correct on enregistre en session les données de l'utilisateur
			else{
				$user = $userManager->find($signIn);
				$authentificationManager->logUserIn($user);
				$formValid = true;
			}
			// On regarde s'il y a des erreurs
			if(count($err)>0){
				$showErr = true;
			}
		}
		$cat = new WinesCategories();
		$categories = $cat->getCategories();

		$params = [
					'showErr' => $showErr,
					'err' => $err,
					'formValid' => $formValid,
					'categories' => $categories,
					];
		$this->show('default/home', $params);
	}

	/**
	 * Page Resultat de recherches
	 */
	public function searchResults()
	{
		$allocine = new AlloCine();
		$result = json_decode($allocine->search($_GET['film']));
		$params = [
				'resultats' => $result->feed->movie,
				];

		$this->show('default/search-results', $params);
	}
	/**
	 * Page A Propos
	 */ 
	public function aboutUs()
	{
		$this->show('default/about-us');
	}
	/* Page Film selectionné
	 */ 
	public function selectionMovie()
	{
		$this->show('default/selection-movie');
	
	}

}
