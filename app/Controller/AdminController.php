<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\FixUserManager as UserManager;

class AdminController extends Controller
{

	// TRAITEMENT FORMULAIRE D'INSCRIPTION
	public function signUp()
	{
		$this->show('back/signup', ['showErr' => $showErr, 'err' => $err]);
	}
	
 	// association 1 film et 1 vin
	public function associationMovieWine()
	{
		$this->show('back/association-movie-wine', ['showErr' => $showErr, 'err' => $err]);
	}

	//creation fiche vin
	public function addWine()
	{
		$this->show('back/add-wine', ['showErr' => $showErr, 'err' => $err]);
	}

	// Ajout genre de vin
	public function WineGenre()
	{
		$this->show('back/add-wine-genre', ['showErr' => $showErr, 'err' => $err]);
	}

	//Ajout genre de film

	public function addMovieGenre()
	{
		$this->show('back/add-movie-genre', ['showErr' => $showErr, 'err' => $err]);
	}

	// Association 1 genre de film et 1 genre de vin
	public function associationGenres()
	{
		$this->show('back/association-genres', ['showErr' => $showErr, 'err' => $err]);
	}

	// Liste des associations non-modérées 
	public function listNotModeratedAssociations()
	{
		$this->show('back/list-not-moderated-associations', ['showErr' => $showErr, 'err' => $err]);
	}

	// Liste des commentaires non-moderés 
	public function listNotModeratedComments()
	{
		$this->show('back/list-not-moderated-comments', ['showErr' => $showErr, 'err' => $err]);
	}

	// Formulaire de moderation  
	public function moderationForm()
	{
		$this->show('back/moderation-form', ['showErr' => $showErr, 'err' => $err]);
	}

	// Desactiver un compte
	public function disableAccount()
	{
		$this->show('back/disable-acccount', ['showErr' => $showErr, 'err' => $err]);
	}

}