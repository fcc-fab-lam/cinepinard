<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\FixUserManager as UserManager;

class UsersController extends Controller
{
	// Profil de l'utilisateur
	public function userProfil()
	{
		$this->show('back/user-profil', ['showErr' => $showErr, 'err' => $err]);
	}

	// Modif profil de l'utilisateur

	public function updateProfil()
	{
		$this->show('back/update-profil', ['showErr' => $showErr, 'err' => $err]);
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
}