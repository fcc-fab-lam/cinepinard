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
		$this->allowTo(['1','2']);
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
        // On instancie nos variables
        $post = array();
        $err = array();
        $formValid = false;
        $showErr = false;
        $maxSize = 200000;
        $mimeTypeAllowed = array('image/jpg', 'image/jpeg', 'image/gif', 'image/png'); // Controle l'extension de l'image
        
		if (!empty($_POST)) {
			$userManager = new UserManager();
			$authentificationManager = new AuthentificationManager();
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
				if(strlen($post['lastname']) < 3){
					$err[] = 'Le nom doit faire au moins 3 caractères';
				}
				// Prénom
				if(strlen($post['firstname']) < 3){
					$err[] = 'Le prénom doit faire au moins 3 caractères';
				}
				// Pseudo
				if(strlen($post['nickname']) < 3){
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
				if(count($err) > 0){
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
						$imgPath = $app->getBasePath().'/uploads/user-'.$userUpdate["id"].'.'.$imgExtension;
						if(move_uploaded_file($_FILES['photo']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$imgPath)){
							$userManager->update(["photo" => $imgPath], $userUpdate["id"]);
						}
					}
					
					$formValid = true;
                    $userInfos = $authentificationManager->getLoggedUser();
					$userPreferences = new UsersPreferencesManager();
                    
					$userPreferences->deleteUsersPreferences($userInfos['id']);
					$userPreferences->setUsersPreferences($preferences, $userInfos['id']);
                    
                    $userPrefs = $userPreferences->getUsersPreferences($userInfos['id']);
                    $authentificationManager->refreshUser();
                    $_SESSION['userPrefs'] = $userPrefs;
					$this->redirectToRoute('user-profil');
				}
			}
		
			$params = [
                'showErr' => $showErr,
                'err' => $err,
                'formValid' => $formValid,
                'post' => $post
                ];
		}
			
		// On instancie nos classes
		$userPreferences = new UsersPreferencesManager();
		$authentificationManager = new AuthentificationManager();
		$cat = new WinesCategories();

		// Recupère le profil de l'utilisateur et ses préférences
		$authentificationManager->refreshUser();
		$userInfos = $authentificationManager->getLoggedUser();
		$userPrefs = $userPreferences->getUsersPreferences($userInfos['id']);
        $_SESSION['userPrefs'] = $userPrefs;
        
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
		// Ajout Commentaires
		$post = array();
        $err = array();
        $idAsso = '';
        $formValid = false;
        $showErr = false;
		$userCave = new UsersPreferencesManager();
		$authentificationManager = new AuthentificationManager();
		$table = new UserManager();
		$userInfos = $authentificationManager->getLoggedUser();
		$table->setTable('users_notes_comments');
		$params = array();

		if(!empty($_POST)){
			foreach($_POST as $key => $value){
				$post[$key] = trim(strip_tags($value));
			}
			if(!is_numeric($post['note'])){
				$err[] = 'La note doit être un nombre.';
			}
			if(!is_numeric($post['idAsso'])){
				$err[] = 'Merci de jouer au malin !!!';
			}
			else{
				$table->setTable('users_notes_comments');		
				$recupComment = $table->find($post['idAsso']);

		
				// on verifie que le GET correspond en bdd a une assoc de  l'utilisateur	
				if (empty($recupComment)) {
					$err[] = 'cette association n\'est pas enregistrée';
				}
				else{
					// on verifie que l'utilisateur connecte est bien celui du commentaire recupere
					if ($userInfos['id'] != $recupComment['user_id']) {
						$err[] = 'Vous n\'avez pas les droits sur cette association';
					}
				}
			}
			if (count($err) > 0) {
			}
			else{
				$updateValues = [
						'comment' => $post['comment'],
						'note' => $post['note'],
						'moderation' => 0,
						];
				$table->setTable('users_notes_comments');
				$vinInfos = $table->update($updateValues, $post['idAsso']);

				$idAsso = $post['idAsso'];
			}
		}




        // on initialise nos variables et nos objets
		$userSelection = $userCave->getUsersCave($userInfos['id']);
		
		$alloCine = new AlloCine();
        $allInfos = array();
        if(!empty($userSelection)){
            foreach($userSelection as $key => $value){
                $allInfos[$key] = [
                    'infosFilm' =>  json_decode($alloCine->get($value['movie_id']), true),
                    'id' => $value['assoId'],
                    'name' => $value['name'], // table wine
                    'appellation' => $value['appellation'], // table wine
                    'description' => $value['description'], // table wine
                    'comment' => $value['comment'], // table user_note_comment
                    'note' => $value['note'], // table user_note_comment
           		];
            }
        }
		$params = [
			'userCave' => $allInfos,
			'err' => $err,
			'idAsso' => $idAsso,
		];

		$this->show('back/cave', $params);
	}

    
        /**
     * Page d'ajout à la cave de l'association film/vin 
    */
    public function addToCave($idFilm, $idVin)
    {
        // on initialise nos variables et nos objets
		$userCave = new UsersPreferencesManager();
		$authentificationManager = new AuthentificationManager();
		$userInfos = $authentificationManager->getLoggedUser();
        $userManager = new UserManager();
        $err = array();
        $insertValues = array();
        
        if(empty($userInfos)){ // on verifie si l'utilisateur est connecté
            $this->redirectToRoute('home');
        }
        if(isset($idFilm)){
            $idFilm = trim(strip_tags($idFilm));
        }
        if(isset($idVin)){
            $idVin = trim(strip_tags($idVin));
        }

        if(empty($idFilm)){ // on verifie si idFilm est vide
            $err[] = 'L\'id du film ne peut être vide.';
        }
        elseif(!is_numeric($idFilm)){ // on verifie si idFilm est un nombre
            $err[] = 'L\'id du film doit être un nombre';
        }
        else{ // on verifie si idFilm correspond bien à un film
            $alloCine = new AlloCine();
            $filmInfos = json_decode($alloCine->get($idFilm), true);
            if(isset($filmInfos['error'])){
                $err[] = 'Aucun film correspondant';
            }
        }        
        if(empty($idVin)){ // on verifie si idVin est vide
            $err[] = 'L\'id du vin ne peut être vide.';
        }
        elseif(!is_numeric($idVin)){ // on verfie si idVin est un nombre
            $err[] = 'L\'id du vin doit être un nombre';
        }
        else{ // on verifie si idVin correspond bien à un vin
            $userManager->setTable('wines');
            $vinInfos = $userManager->find($idVin);
            if(empty($vinInfos)){
                $err[] = 'Aucun vin correspondant';
            }
        }
        if($userCave->existAssoInCave($idFilm, $idVin, $userInfos['id'])){
            $err[] = 'Cette association existe déjà dans votre cave';
        }
        if(count($err) > 0){ // on verifie s'il y a des erreurs
            $params = [
                'err' => $err,
                'filmInfos' => $filmInfos,
                'vinInfos' => $vinInfos,
            ];
        }
        else{
            $insertValues = [
                'movie_id' => $idFilm,
                'wine_id' => $idVin,
                'user_id' => $userInfos['id'],
            ];
            $params = [
                'insertValues' => $insertValues,
                'filmInfos' => $filmInfos,
                'vinInfos' => $vinInfos,
            ];
            $userManager->setTable('users_notes_comments');
            $userManager->insert($insertValues);
            $this->redirectToRoute('cave');

        }

		$this->show('back/add-to-cave', $params);
        
    }

	
	// Ajouter un commentaire
	public function addComments()
	{
		$post = array();
        $err = array();
        $formValid = false;
        $showErr = false;
		$userCave = new UsersPreferencesManager();
		$authentificationManager = new AuthentificationManager();
		$table = new UserManager();
		$userInfos = $authentificationManager->getLoggedUser();
		$table->setTable('users_notes_comments');


		// on controle que le GET n'est pas vide, nettoyage et isnumeric
		if (!empty($_GET['id'])) {
			$idAsso = trim(strip_tags($_GET['id']));
			if (!is_numeric($idAsso)) {
				$err[] = 'Association inconnue';
			} 
			else{
				$userSelection = $userCave->getUsersCave($userInfos['id']);
				$recupComment = $table->find($idAsso);
		
				// on verifie que le GET correspond en bdd a une assoc de  l'utilisateur	
				if (empty($recupComment)) {
					$err[] = 'cette association n\'est pas enregistrée';
				}
				// on verifie que l'utilisateur connecte est bien celui du commentaire recupere
				if ($userInfos['id'] != $recupComment['user_id']) {
					$err[] = 'Vous n\'avez pas les droits sur cette association';
				}
				if (count($err) > 0) {
					$this->redirectToRoute('cave');
				}
				else{
					$alloCine = new AlloCine();
					$filmInfos = json_decode($alloCine->get($recupComment['movie_id']), true);
					$table->setTable('wines');
					$vinInfos = $table->find($recupComment['wine_id']);

					$params = [
						'recupComment' => $recupComment,
						'filmInfos' => $filmInfos,
						'vinInfos' => $vinInfos,
						];
				}
			}
		}// fin verification du $_GET non vide

		if(!empty($_POST)){
			foreach($_POST as $key => $value){
				$post[$key] = trim(strip_tags($value));
			}
			if(!is_numeric($post['note'])){
				$err[] = 'La note doit être un nombre.';
			}
			if(!is_numeric($post['idAsso'])){
				$err[] = 'Merci de jouer au malin !!!';
			}
			else{
				$table->setTable('users_notes_comments');		
				$recupComment = $table->find($post['idAsso']);

		
				// on verifie que le GET correspond en bdd a une assoc de  l'utilisateur	
				if (empty($recupComment)) {
					$err[] = 'cette association n\'est pas enregistrée';
				}
				else{
					// on verifie que l'utilisateur connecte est bien celui du commentaire recupere
					if ($userInfos['id'] != $recupComment['user_id']) {
						$err[] = 'Vous n\'avez pas les droits sur cette association';
					}
				}
			}
			if (count($err) > 0) {
				//$this->redirectToRoute('cave');
			}
			else{
				$updateValues = [
						'comment' => $post['comment'],
						'note' => $post['note'],
						];
				$table->setTable('users_notes_comments');
				$vinInfos = $table->update($updateValues, $post['idAsso']);

				$this->redirectToRoute('cave');
			}
		}

	$this->show('back/add-comments', $params);

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
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			foreach($_POST as $key => $value) {
				$post[$key] = trim(strip_tags($value));
			}
			// je verifie qu'un choix a été fait
			if(empty($post['disable'])){
				$err[] = 'Vous devez selectionner un bouton pour valider votre choix';
			}
			// si il se desincrit
			elseif($post['disable'] == 'oui'){
			  $user = $this->getUser();
			  $userManager->update(['nickname'=>'Anonyme'.$user['id']], $user['id']);
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



