<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\FixUserManager as UserManager;
use \Manager\WinesCategoriesManager as WinesCategories;
use \Manager\AlloCineManager as AlloCine;
use \Manager\UsersPreferencesManager as UsersPreferences;
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
		$params = [
            'showErr' => $showErr,
            'err' => $err,
            'formValid' => $formValid,
            'post' => $post,
        ];
		$this->show('default/signup', $params);
	}
    
    // LOGIN
    public function login()
    {
        // On instancie nos variables
		$err = array();
		$showErr = false;
		$userManager = new UserManager();
		$authentificationManager = new AuthentificationManager();
        $userPrefs = array();

		if(!empty($_POST)){
			// On verifie les champs Email & Password à l'aide de la fonction du AuthentificationManager
			$signIn = $authentificationManager->isValidLoginInfo($_POST['email'], $_POST['password']);
			
			if($signIn == 0){
				$err[] = 'L\'adresse email ou le mot de passe est incorrect';
			}
			// Si email et password correct on enregistre en session les données de l'utilisateur
			else {
				$user = $userManager->find($signIn);
				$authentificationManager->logUserIn($user);
				$userInfos = $authentificationManager->getLoggedUser();
				$pref = new UsersPreferences();
				$userPrefs = $pref->getUsersPreferences($userInfos['id']);
                
			}
			// On regarde s'il y a des erreurs
			if(count($err)>0){
				$showErr = true;
			}

			$cat = new WinesCategories();
			$categories = $cat->getCategories();
			$params = [
				'showErr' => $showErr,
				'err' => $err,
				'categories' => $categories,
				'userPrefs' => $userPrefs,
			];
            
			$this->redirectToRoute('home', $params);
		}
    }
    
    // LOGOUT
    public function logout()
    {
        $authentificationManager = new AuthentificationManager();
		$authentificationManager->logUserOut();
        $this->redirectToRoute('home');
    }
    
    
	// TRAITEMENT DU FORMULAIRE DE CONNEXION
	public function home()
	{
		// On instancie nos variables
		//$err = array();
		//$formValid = false;
		//$showErr = false;
		//$userManager = new UserManager();
		//$authentificationManager = new AuthentificationManager();
		$userPrefs = array();

		/*if(!empty($_POST)){
			// On verifie les champs Email & Password à l'aide de la fonction du AuthentificationManager
			$signIn = $authentificationManager->isValidLoginInfo($_POST['email'], $_POST['password']);
			if($signIn == 0){
				$err[] = 'L\'adresse email ou le mot de passe est incorrect';
			}
			// Si email et password correct on enregistre en session les données de l'utilisateur
			else{
				$user = $userManager->find($signIn);
				$authentificationManager->logUserIn($user);
				$userInfos = $authentificationManager->getLoggedUser();
				$pref = new UsersPreferences();
				$userPrefs = $pref->getUsersPreferences($userInfos['id']);
				$formValid = true;
			}
			// On regarde s'il y a des erreurs
			if(count($err)>0){
				$showErr = true;
			}
		}*/
		$cat = new WinesCategories();
		$categories = $cat->getCategories();

		$params = [
			//'showErr' => $showErr,
			//'err' => $err,
			//'formValid' => $formValid,
			'categories' => $categories,
			'userPrefs' => $userPrefs,
		];
		$this->show('default/home', $params);
	}

	/**
	 * Page Resultat de recherches
	 */
	public function searchResults()
	{
		// On instancie nos variables
		$listErr = array();
		// On appelle la classe Allocine
		$allocine = new AlloCine();
		// On vérifie que $_GET n'est pas vide
		if(!empty($_GET)){
			$userPrefs = array();
			// On nettoie $_GET['preferences'] et on le passe dans une variable propre
			if(isset($_GET['preferences'])){
				foreach($_GET['preferences'] as $value){
					$userPrefs[] = trim(strip_tags($value));
				}
				// On supprime la variable d'origine
				unset($_GET['preferences']);
			}
			// On nettoie $_GET['film']
			$get['film'] = trim(strip_tags($_GET['film']));

			// Si la recherche film est vide, on met une erreur
			if(empty($get['film'])){
				$listErr[] = 'Vous devez renseigner un film';
			}
			if(isset($userPrefs)){
				foreach($userPrefs as $value){
					if(empty($value) || !is_numeric($value)){
						$listErr[] = 'Vous devez renseigner des préférences valides';
					}
				}
			}
			// Si le nombre d'erreur est positif, on renvoie vers la page d'accueil avec les erreurs
			if(count($listErr)>0){
				// On définie $params
				$_SESSION['listErr'] = $listErr;
				// On redirige vers la page d'accueil
				$this->redirectToRoute('home');
			}

			// Si la recherche est correct
			else{
				$result = json_decode($allocine->search($get['film']));
				$resultats = array();
				$error = array();

				if($result->feed->totalResults == 0){
					$error = 'Aucun film ne correspond à votre recherche';
				}
				else{
					$resultats = $result->feed->movie;
				}
				// On stock nos paramètres dans une variables
				$params = [
						'resultats' => $resultats,
						'preferences' => $userPrefs,
						'erreur' => $error, 
						];

				$this->show('default/search-results', $params);
			}
		}
		else{
			$this->redirectToRoute('home');
		}
	}
	/**
	 * Page à Propos
	 */ 
	public function aboutUs()
	{
		$this->show('default/about-us');
	}
	/**
     * Page Film selectionné
	 */ 
	public function selectionMovie()
	{
		// On instancie nos variables
		$err = array();
		$params = array();
		$userPrefs = array();

		// On vérifie que $_GET existe et n'est pas vide
		if(isset($_GET['id']) && !empty($_GET['id'])){
			// On nettoie $_GET
			$idFilm = trim(strip_tags($_GET['id']));
			if(!is_numeric($idFilm)){
				$err[] = 'L\'id du film sélectionné n\'est pas correct';
			}
			else{
				if(isset($_GET['preferences'])){
					foreach($_GET['preferences'] as $value){
						$userPrefs[] = trim(strip_tags($value));
					}
					// On supprime la variable d'origine
					unset($_GET['preferences']);
				}				
				if(isset($userPrefs)){
					foreach($userPrefs as $value){
						if(empty($value) || !is_numeric($value)){
							$err[] = 'Vous devez renseigner des préférences valides';
						}
					}
				}
				// S'il n'y a pas d'erreur on fait appel à la classe Allocine
				$allocine = new AlloCine();
				$filmInfos = json_decode($allocine->get($idFilm), true);

				// On vérifie que l'id passé en paramètre correspond à un film
				if(isset($filmInfos['error'])){
					$err[] = 'Aucun film correspondant';
				}
				else{
					$params['filmInfos'] = $filmInfos;
					$genres = array();
					foreach($filmInfos['movie']['genre'] as $value){
						$genres[] = $value['code'];
					}
					$params['genres'] = $genres;
					$selec =  array_count_values($genres);
					$cat = new WinesCategories();
					$params['categories'] = $cat->getWinesGenres($genres);
					$params['propositionVin'] = $cat->getWinesProposition($params['categories'], $userPrefs);
					$params['perfectMatch'] = $cat->getPerfectMatch($params['categories'], $userPrefs, $idFilm);
					$params['usersProposition'] = $cat->getWinesUsersProposition($params['categories'], $userPrefs, $idFilm);

				}
			}
		}
		if(count($err) > 0){
			$params['err'] = $err;
		}

		$this->show('default/selection-movie', $params);
	
	}
    
}
