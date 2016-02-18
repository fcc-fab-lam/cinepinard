<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\FixUserManager as UserManager;
use \Manager\WinesGenresManager;


class AdminController extends Controller
{//  autorisation exclusive à l'admin.
	public function __construct() {
		$this->allowTo(['1']);

	}


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
	public function addWineGenre()
	 {

	// je cree mes variables
		$post = array();
		$err = array();
		$formValid = false;
		$showErr = false;
		$genreManager = new WinesGenresManager ;
		$listGenre = $genreManager->findAll();

		// permet d'entrer dans le post si les champs sont vides	
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			foreach ($_POST as $key => $value) {
				$post[$key] = trim(strip_tags($value));
			}

			if(empty($post['name'])){
				$err[] = 'Vous devez definir un genre pour valider votre choix';
			}

			// Si il ya  un erreur
			if(count($err)>0){
				$showErr = true;
			} 
			else {
				
				$genreManager->insert($post, $stripTags = true);
				$formValid = true;
			}


		}
		$this->show('back/add-wine-genre', ['err' => $err, 'showErr' => $showErr, 'formValid' => $formValid, 'listGenre'=>$listGenre]);
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

}