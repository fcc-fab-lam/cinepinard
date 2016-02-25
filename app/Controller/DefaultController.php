<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\FixUserManager as UserManager;
use \Manager\WinesCategoriesManager as WinesCategories;
use \Manager\AlloCineManager as AlloCine;
use \Manager\AddWineManager as AddWine;
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
        $userPrefs = array();
		$err = array();
		$formValid = false;
		$showErr = false;
		$maxSize = 200000;
		$mimeTypeAllowed = array('image/jpg', 'image/jpeg', 'image/gif', 'image/png'); // Controle l'extension de l'image
			// On nettoie $_POST
		if(!empty($_POST)){
			// On nettoie $_POST['preferences'] et on le passe dans une variable propre
			if(isset($_POST['preferences'])){
				foreach($_POST['preferences'] as $value){
					$userPrefs[] = trim(strip_tags($value));
				}
				// On supprime la variable d'origine
				unset($_POST['preferences']);
			}
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
            // on verifie les preferences utilisateur
			if(isset($userPrefs)){
				foreach($userPrefs as $value){
					if(empty($value) || !is_numeric($value)){
						$listErr[] = 'Vous devez renseigner des préférences valides';
					}
				}
			}
            // On regarde s'il y a des erreurs
			if(count($err)>0){
				$showErr = true;
			}
			// S'il n'y a pas d'erreur on enregistre en BDD
			else{
				// On supprime les variables majeur & password2 dont on n'a pas besoin
				unset($post['password2']);
				unset($post['majeur']);
				// On hash le password
				$post['password'] = password_hash($post['password'], PASSWORD_DEFAULT);

				$newUser = $userManager->insert($post);
                
                if(isset($fileMimeType)){                    
				    $imgExtension = explode('/', $fileMimeType)[1];
                    // On récupère la classe qui permet d'utiliser la fonction
                    $app = getApp();
                    $imgPath = $app->getBasePath().'/uploads/'.$newUser["id"].'.'.$imgExtension;
                    if(move_uploaded_file($_FILES['photo']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$imgPath)){
                        $userManager->update(["photo" => $imgPath], $newUser["id"]);
                    }
                }
                // on insere les preferences utilisateur si il y en a
                if(!empty($userPrefs)){
                    $insertPrefs = new UsersPreferences();
                    $insertPrefs->setUsersPreferences($userPrefs, $newUser['id']);
                    $_SESSION['userPrefs'] = $userPrefs;                   
                }
                
				$user = $userManager->find($newUser['id']);
				$authentificationManager->logUserIn($user);
                
				$formValid = true;
                $this->redirectToRoute('home');
			}
		}
        
		$cat = new WinesCategories();
		$categories = $cat->getCategories();

		$params = [
            'showErr' => $showErr,
            'err' => $err,
            'formValid' => $formValid,
            'post' => $post,
			'categories' => $categories,
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
            foreach($_POST as $key => $value){
                $post[$key] = trim(strip_tags($value));
            }
			// On verifie les champs Email & Password à l'aide de la fonction du AuthentificationManager
			$signIn = $authentificationManager->isValidLoginInfo($post['email'], $post['password']);
			
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
                $_SESSION['userPrefs'] = $userPrefs;
                
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
            if($userInfos['role_id'] == 1){
                $this->redirectToRoute('user-profil', $params);
            }
            elseif(isset($post['currentPage'])){
                if($post['currentPage'] == 'selection-movie'){
                    header('Location: '.$this->generateUrl('selection-movie').'?id='.$post['idFilm'].'&idVin1='.$post['idVin1'].'&idVin2='.$post['idVin2'].'&idVin3='.$post['idVin3']);
                    die();
                }
			$this->redirectToRoute($post['currentPage'], $params);
            }
            else{
			$this->redirectToRoute('home', $params);
            }
		}
    }
    
    // LOGOUT
    public function logout()
    {
        $authentificationManager = new AuthentificationManager();
		$authentificationManager->logUserOut();
        unset($_SESSION['userPrefs']);
        $this->redirectToRoute('home');
    }
    
    
	// TRAITEMENT DU FORMULAIRE DE CONNEXION
	public function home()
	{
		$cat = new WinesCategories();
		$categories = $cat->getCategories();

		$params = [
			'categories' => $categories,
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
        $addWine = new AddWine();

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
                    
                    $propositionVin = $cat->getWinesProposition($params['categories'], $userPrefs);
                    $perfectMatch = $cat->getPerfectMatch($params['categories'], $userPrefs, $idFilm);
                    $userProposition = $cat->getWinesUsersProposition($params['categories'], $userPrefs, $idFilm);
                    
                    if(isset($_GET['idVin1']) && is_numeric($_GET['idVin1'])){
                        $resultVin1[0] = $addWine->find($_GET['idVin1']);
                        
                        if(!empty($resultVin1)){
                            $propositionVin = $resultVin1;
                        }
                    }
                    
                    if(isset($_GET['idVin2']) && is_numeric($_GET['idVin2'])){
                        $resultVin2[0] = $addWine->find($_GET['idVin2']);
                        if(!empty($resultVin2)){
                            $perfectMatch = $resultVin2;
                        }
                    }
                    
                    if(isset($_GET['idVin3']) && is_numeric($_GET['idVin3'])){
                        $resultVin2[0] = $addWine->find($_GET['idVin3']);
                        if(!empty($resultVin3)){
                            $userProposition = $resultVin3;
                        }
                    }
                    
					$params['propositionVin'] = $propositionVin;
					$params['perfectMatch'] = $perfectMatch;
					$params['usersProposition'] = $userProposition;

				}
			}
		}
		if(count($err) > 0){
			$params['err'] = $err;
		}

		$this->show('default/selection-movie', $params);
	
	}


	// Récupération de mot de passe
	public function forgetPassword(){

		$userManager = new UserManager();

		// On instancie nos variables
		$err = array();
		$showErr = false;
		$tokenCreate = false;
		$formValid = false;

		if(!empty($_POST)){
			// On nettoit $_POST
			$post = trim(strip_tags($_POST['email']));

			// On verifie que c'est bien une adresse email
			if(empty($post)){
				$err[] = 'Vous devez renseigner une adresse email';
			}
			elseif(!filter_var($post, FILTER_VALIDATE_EMAIL)){
				$err[] = 'L\'adresse email renseignée n\'est pas valide';
			}

			// Si c'est bien un email on verifie qu'elle existe en BDD
			else{
				// Si elle existe on lance la récupération
				if($userManager->emailExists($post)){
					// On récupère l'ID de l'user
					$userId = $userManager->getUserByUsernameOrEmail($post)['id'];
					// On créé un token
					$token = md5(uniqid());
					// On l'insère dans la BDD
					$newToken = $userManager->update(['token' => $token], $userId);

					$tokenCreate = true;
				}
				// Sinon on affiche un message d'erreur
				else{
					$err[] = 'Oups, il semblerait que l\'adresse email renseignée n\'existe pas dans notre base';
				}
			}
		}

		// Si le $token a été correctement créé et inséré en BDD on l'envoi à l'utilisateur par email
		if($tokenCreate){

			$message = 'Cliquez sur ce lien pour réinitialiser votre mot de passe : <a href="http://'.$_SERVER["HTTP_HOST"].$this->generateUrl('init-password').'?token='.$token.'">réinitialisation</a>';

            $app = getApp();
            
            $mail = new \PHPMailer; 
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'smtp.mailgun.org'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
             $mail->Username = $app->getConfig("phpmailer_user");           
             // SMTP username
            $mail->Password = $app->getConfig("phpmailer_pass");
            // SMTP password
            $mail->SMTPSecure = 'tls';
            // Enable TLS encryption, ssl also accepted
            $mail->Port = $app->getConfig('phpmailer_port');
            // TCP port to connect to

            $mail->setFrom('no-reply@winescreen.com', 'WineScreen');
            $mail->addAddress($post); // Name is optional

            $mail->isHTML(true); // Set email format to HTML

            $mail->Subject = 'Réinitialisation de mot de passe';
            $mail->Body    = $message;
            $mail->AltBody = $message;

            if(!$mail->send()) {
                $err[] = 'Le mail n\'a pas été envoyé';
                $err[] = 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                $formValid = true;
            }
		}

		if(count($err)){
			$showErr = true;
		}

		// On stock nos paramètres dans une variables
		$params = [
			'showErr' => $showErr,
			'err' => $err,
			'formValid' => $formValid,
		];

		// On envoie à la vue
		$this->show('back/forget-password', $params);
	}

	// Réinitialisation du mot de passe suite à token
	public function initPassword(){

		$userManager = new UserManager();
		// On instancie nos variables
		$err = array();
		$formValid = false;
		$tokenValid = false;
		$showErr = false;

		//
		// VERIFICATION DU TOKEN
		//

		// On verifie que le token existe et n'est pas vide
		if(isset($_GET['token']) && !empty($_GET['token'])){

			// On nettoi $_GET
			$token = trim(strip_tags($_GET['token']));

			// On verifie qu'il existe en BDD
			if($user = $userManager->getUserbyToken($token)){
				$tokenValid = true;
			}
			else{
				$err[] = 'Le token renseigné n\'est pas valide';
			}
		}

		//
		// VERIFICATION DU NEW PASSWORD
		//

		if(!empty($_POST)){

			// On nettoit $_POST
			foreach($_POST as $key => $value){
				$post[$key] = trim(strip_tags($value));
			}

			// On verifie que le mdp fait au moins 8 caractères
			if(strlen($post['password'])<8){
				$err[] = 'Le mot de passe doit faire au moins 8 caractères';
			}
			// On verifie que les mdp sont identiques
			if($post['password'] !== $post['password2']){
				$err[] = 'Les mots de passe doivent être identique';
			}

			// On regarde s'il y a des erreurs
			if(count($err)>0){
				$showErr = true;
			}
			// S'il n'y a pas d'erreur on enregistre en BDD
			else{
				// On hash password
				$password = password_hash($post['password'], PASSWORD_DEFAULT);
				// Puis on enregistre le nouveau mdp en BDD
				if($userManager->update(['password' => $password], $user['id'])){
					$formValid = true;
				}
				else{
					$err[] = 'Une erreur s\'est produite, veuillez réessayer';
					$showErr = true;
				}
			}

		}

		$params = [
			'showErr' => $showErr,
			'err' => $err,
			'formValid' => $formValid,
			'tokenValid' => $tokenValid,
		];

    	$this->show('back/init-password', $params);
	}
}