<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\FixUserManager as UserManager;
use W\Security\AuthentificationManager;
use \Manager\UsersPreferencesManager;


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
			$userPreferences = new UsersPreferencesManager();
			$authentificationManager = new AuthentificationManager();
			$userInfos = $authentificationManager->getLoggedUser();
			$userPrefs = $userPreferences->getUsersPreferences($userInfos['id']);
			$params = [
			'userInfos' => $userInfos,
			'userPrefs' => $userPrefs,
			];
		$this->show('back/update-profil', $params);
	}

	// liste des choix de l'utilisateur(cave)
	public function cave()
	{
		$this->show('back/cave', ['showErr' => $showErr, 'err' => $err]);
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
