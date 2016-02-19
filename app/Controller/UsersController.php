<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\FixUserManager as UserManager;
use W\Security\AuthentificationManager;
use \Manager\UsersPreferencesManager;
use \Manager\WinesCategoriesManager as WinesCategories;
use \Manager\AlloCineManager as AlloCine;


class UsersController extends Controller
{
	public function __construct() {
		//$this->allowTo(['1','2']);
	}

	// Profil de l'utilisateur
	public function userProfil()
	{
		$userPreferences = new UsersPreferencesManager();
		$authentificationManager = new AuthentificationManager();
		$userInfos = $authentificationManager->getLoggedUser();
		$userPrefs = $userPreferences->getUsersPreferences($userInfos['id']);
		$params = [
			'userInfos' => $userInfos,
			'userPrefs' => $userPrefs,
			];

		$this->show('back/user-profil', $params);
	}

	// Modif profil de l'utilisateur

	public function updateProfil()
	{
		if (!empty($_POST)) {
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
				$preferences = $_POST['preferences'];
				unset($_POST['preferences']);
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
				elseif ($post['email'] != $_SESSION['user']['email']) {
					// On verifie que l'email n'existe pas déjà dans la bdd
					if($userManager->emailExists($post['email'])){
						$err[] = 'L\'adresse email renseignée est déjà utilisée';
					}
				}
				// Image
				if(!empty($_FILES['photo']['tmp_name'])){
					if($_FILES['photo']['size'] > $maxSize){
					$err[] = 'L\'image excède le poids autorisé';
					}
					elseif(!empty($_FILES['photo']['tmp_name'])){ 
						$finfo = new \finfo();
						$fileMimeType = $finfo->file($_FILES['photo']['tmp_name'], FILEINFO_MIME_TYPE);
						if(!in_array($fileMimeType, $mimeTypeAllowed)){
							$err[] = 'Le fichier n\'est pas une image';
						}
					}
				}
				// Preferences Vins
				if (is_array($preferences)) {
					$prefsInvalides = false;
					foreach ($preferences as $value) {
						if(!is_numeric($value)) {
							$prefsInvalides = true;
						}
					} 
					if($prefsInvalides) {
						$err[] = 'tu n\'es pas très urbain petit malin';
					}
				}

			// On regarde s'il y a des erreurs
				if(count($err)>0){
					$showErr = true;
				}
				// S'il n'y a pas d'erreur on enregistre en BDD
				else{
					// On définit le role à utilisateur par défault 
					// On hash le password

					$userUpdate = $userManager->update($post, $_SESSION['user']['id']);

					if(!empty($_FILES['photo']['tmp_name'])){
						$imgExtension = explode('/', $fileMimeType)[1];
						// On récupère la classe qui permet d'utiliser la fonction
						$app = getApp();
						$imgPath = $app->getBasePath().'/uploads/'.$userUpdate["id"].'.'.$imgExtension;
						if(move_uploaded_file($_FILES['photo']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$imgPath)){
							$userManager->update(["photo" => $imgPath], $userUpdate["id"]);
						}
					}
					
					$formValid = true;
					$setPreferences = new UsersPreferencesManager();
					$setPreferences->setUsersPreferences($preferences, $_SESSION['user']['id']);
					$this->redirectToRoute('user-profil');
				}
			}
			$params = ['showErr' => $showErr, 'err' => $err, 'formValid' => $formValid, 'post' => $post];
		}
		// Recupère le profil de l'utilisateur 
			$userPreferences = new UsersPreferencesManager();
			$authentificationManager = new AuthentificationManager();
			$authentificationManager->refreshUser();
			$userInfos = $authentificationManager->getLoggedUser();
			$userPrefs = $userPreferences->getUsersPreferences($userInfos['id']);
			$cat = new WinesCategories();
			$categories = $cat->getCategories();
			$params = [
			'userInfos' => $userInfos,
			'userPrefs' => $userPrefs,
			'categories' => $categories,
			'post' => $post,
			];
		
		$this->show('back/update-profil', $params);
	}

	// liste des choix de l'utilisateur(cave)
	public function cave()
	{
		$userCave = new UsersPreferencesManager();
		$authentificationManager = new AuthentificationManager();
		$userInfos = $authentificationManager->getLoggedUser();
		$userSelection = $userCave->getUsersCave($userInfos['id']);
		$AlloCine = new AlloCine();
		foreach($userSelection as $key => $value){
			$allInfos[$key]['infosFilm'] =  json_decode($AlloCine->get($value['movie_id']), true);
			$allInfos[$key]['id'] = $value['id'];
			$allInfos[$key]['name'] = $value['name'];
			$allInfos[$key]['appellation'] = $value['appellation'];
			$allInfos[$key]['description'] = $value['description'];
			$allInfos[$key]['comment'] = $value['comment'];
			$allInfos[$key]['note'] = $value['note'];

		}
		$params = [
			'userCave' => $allInfos,
			];
		$this->show('back/cave', $params);
	}
	
	// Ajouter un commentaire
	public function addComments()
	{
		$this->show('back/add-comments', ['showErr' => $showErr, 'err' => $err]);
	}
	// Desactiver un compte
	public function disableAccount()
	{
		// je cree mes variables
		$post = array();
		$err = array();
		$formValid = false;
		$showErr = false;
		$userManager = new UserManager();
		
			// permet d'entrer dans le post si les champs sont vides	
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			foreach ($_POST as $key => $value) {
				$post[$key] = trim(strip_tags($value));
			}
			// je verifie qu'un choix a été fait
			if(empty($post['disable'])){
				$err[] = 'Vous devez selectionner un bouton pour valider votre choix';
			}
			// si il se desincrit
			elseif($post['disable'] == 'oui'){
			  $user = $this->getUser();
			  $userManager->update(['nickname'=>'Anonyme'.$user['id']],$user['id']);
			}
			// s'il ne se desincrit pas
			elseif($post['disable'] == 'non'){
				$this->redirectToRoute('home');
			}

			// Si il ya  un erreur
			if(count($err)>0){
				$showErr = true;
			}
		}

		$this->show('back/disable-account', ['showErr' => $showErr, 'err' => $err]);
	}
}
