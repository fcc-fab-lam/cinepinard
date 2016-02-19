<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\FixUserManager as UserManager;
use \Manager\WinesGenresManager;
use \Manager\FilmGenreManager;
use \Manager\GenresAssociationsManager;



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
	{	$genreVinManager = new WinesGenresManager ;
		$listGenreVin = $genreVinManager->findAll();
		$params = [
				'listGenreVin' => $listGenreVin,
				];

		$this->show('back/add-wine', $params);
	}

	// Ajout genre de vin
	public function addWineGenre()
	{

	// je cree mes variables
		$post = array();
		$err = array();
		$inputValue=false;
		$formValid = false;
		$showErr = false;
		$genreVinManager = new WinesGenresManager ;
		$listGenreVin = $genreVinManager->findAll();
		$filmGenreManager = new FilmGenreManager;//permet d'afficher la liste  pre-existante des genre de film.
		$listGenreFilm = $filmGenreManager->findAll();

		// permet d'entrer dans le post si les champs sont vides	
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if(isset($_POST['movies_genre'])) {
				$movies_genre = $_POST['movies_genre'];
				unset($_POST['movies_genre']);
				
				// Vérifier que les valeurs sont valides
				if (is_array($movies_genre)) {
					$mvInvalides = false;
					foreach ($movies_genre as $value) {
						if(!is_numeric($value)) {
							$mvInvalides = true;
						}
					} 
					if($mvInvalides) {
						$err[] = 'tu n\'es pas très urbain petit lapin';
					}
				}

			} else{
				$err[]= 'Vous devez selectionner au moins un genre de film';
			}
				
			foreach ($_POST as $key => $value) {
				$post[$key] = trim(strip_tags($value));
			}
			if(empty($post['name'])){
				$err[] = 'Vous devez definir un genre pour valider votre choix';
			}
			else {
				// si un genre de vin de ce nom existe déjà en bd,
				$genresDeMemeNom = $genreVinManager->getGenreByName($post['name']);
				var_dump(empty($genresDeMemeNom));
				if(!empty($genresDeMemeNom)) {
					// erreur
					$err[] = "Ce genre de vin existe déja";
					$inputValue = $post['name'];

				}
			}

			

			// Si il ya  un erreur
			if(count($err)>0){
				$showErr = true;
			} 
			else {
				var_dump($post);
				var_dump($movies_genre);	
				// cette fonction permet d'aller dans la BDD et d' y inscrire le nouveau genre tout en nettoyant à l'aide d'un strip tag. 
				$wineGenre = $genreVinManager->insert($post);
				$formValid = true;
		
				$genresAssociationsManager = new genresAssociationsManager ;
				foreach ($movies_genre as $genre) {
					$genre = $genresAssociationsManager->insert([
						"id_movies_genre" => $genre,
						"id_wines_genre" => $wineGenre['id'],
						"moderation" => 1
						]) ;
				}
			}
		
		}
		$this->show('back/add-wine-genre', [
			'err' => $err, 
			'showErr' => $showErr, 
			'formValid' => $formValid, 
			/*'listGenreVin'=>$listGenreVin,*/
			'listGenreFilm' =>$listGenreFilm,
			'inputValue' => $inputValue,
		]);
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