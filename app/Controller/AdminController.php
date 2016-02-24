<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\FixUserManager as UserManager;
use \Manager\WinesGenresManager;
use \Manager\WinesCategoriesManager;
use \Manager\FilmGenreManager;
use \Manager\UsersNotesCommentsManager;
use \Manager\GenresAssociationsManager;
use \Manager\AddWineManager as AddWine;
use \Manager\CommentsNotModerateManager;
use \Manager\AlloCineManager as AlloCine;




class AdminController extends Controller
{
	private $itemsPerPage = 20;

	//  autorisation exclusive à l'admin.
	public function __construct() {
		//$this->allowTo(['1']);

	}


	// association 1 film et 1 vin
	public function associationMovieWine()
	{
        $params = array();
        // On instancie nos variables
		$err = array();
		$resultats = array();
		// On appelle la classe Allocine
		$allocine = new AlloCine();
		// On vérifie que $_GET n'est pas vide
		if(!empty($_GET)){
			// On nettoie $_GET['film']
			$get['film'] = trim(strip_tags($_GET['film']));

			// Si la recherche film est vide, on met une erreur
			if(empty($get['film'])){
				$err[] = 'Vous devez renseigner un film';
			}
			// S'il n'y a pas d'erreur jusque là
			if(count($err) == 0){
				$result = json_decode($allocine->search($get['film']));
				$resultats = array();
				$error = array();

				if($result->feed->totalResults == 0){
					$err = 'Aucun film ne correspond à votre recherche';
				}
				else{
					$resultats = $result->feed->movie;
				}
			}
        }
        // On stock nos paramètres dans une variable
        $params = [
                'resultats' => $resultats,
                'err' => $err, 
                ];
        
		$this->show('back/association-movie-wine',$params);
	}

	//creation fiche vin
	public function addWine()
	{	
        $genreVinManager = new WinesGenresManager ;
		$listGenreVin = $genreVinManager->findAll();
		$cat = new WinesCategoriesManager();
		$categories = $cat->getCategories();
		$params = [
				'listeGenreVin' => $listGenreVin,
				'categories' => $categories,
				];
	
				// Mes variables 
		$post = array();
        $err = array();
        $formValid = false;
        $showErr = false;
        $maxSize = 200000;
        // Controle l'extension de l'image
        $mimeTypeAllowed = array('image/jpg', 'image/jpeg', 'image/gif', 'image/png'); 

		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			// Debut des verificationns et securité
			if(isset($_POST['wines'])) {
				$wines_genre = $_POST['wines'];
				unset($_POST['wines']);
			}

			foreach($_POST as $key => $value){
				$post[$key] = trim(strip_tags($value));
			}
	    	// nom du vin
			if(strlen($post['name'])<5){
				$err[] = 'Le nom doit faire au moins 4 caractères';
			}
			// appelation
			if(strlen($post['appellation'])<5){
				$err[] = 'Le prénom doit faire au moins 5 caractères';
			}
			if(empty($post['genre_id'])){
				$err[] = 'Le genre de vin est obligatoire';
			}
			if(empty($post['categorie_id'])){
				$err[] = 'La catégorie de vin est obligatoire';
			}
			// Pays

			if(strlen($post['country'])<4){
				$err[] = 'Le pays doit faire au moins 4 caractères';
			}
			
			if(strlen($post['description'])<1){
				$err[] = 'La description doit faire au moins 20 caractères';
			}
				// verification de l'image
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
			// Si il ya  un erreur
			if(count($err)>0){
				$showErr = true;
			} 
			else{
				$insertValues =[
					'name' => $post['name'],
					'appellation' => $post['appellation'],
					'country' => $post['country'],
					'description'=> $post['description'],
					'categorie_id'=>$post['categorie_id'],
					'genre_id' => $post['genre_id'],
				];

				$userManager = new AddWine();
				$newWine = $userManager->insert($insertValues);

				if(!empty($_FILES['photo']['tmp_name'])){
					$imgExtension = explode('/', $fileMimeType)[1];
					// On récupère la classe qui permet d'utiliser la fonction
					$app = getApp();
					$imgPath = $app->getBasePath().'/uploads/wine-'.$newWine["id"].'.'.$imgExtension;
					if(move_uploaded_file($_FILES['photo']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$imgPath)){
						$userManager->update(["image" => $imgPath], $newWine["id"]);
					}
				}

				$formValid = true;
			}
		}
		$params['err'] = $err;
		$params['showErr'] = $showErr;
		$params['formValid'] = $formValid;

		$this->show('back/add-wine',$params);
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
	public function listNotModeratedComments($showPage = 1)
	{	
		$notModeratedComments = new CommentsNotModerateManager();
		$post = [];
		$reponse = '';
		if (!empty($_POST)) {
			$idAsso = $_POST['idAsso'];
			$post = array_values(array_flip($_POST));
			$reponse = trim(strip_tags($post[1]));
			$updateValue['moderation'] = $reponse;
		}
		switch ($reponse) {
			case '1':
				$notModeratedComments->updateCommentsModeration($updateValue, $idAsso);

				break;
			case '2':
				$notModeratedComments->updateCommentsModeration($updateValue, $idAsso);
				break;
			case '3':
				$updateValue['comment'] = '';
				$notModeratedComments->updateCommentsModeration($updateValue, $idAsso);
				break;
			
			default:
				break;
		}



		// On récupère le nombre des vins de l'utilisateur
		$countMovies = $notModeratedComments->countCommentsNotModerate();

		// On compte le nombre total de page
        $nbTotalPages = ceil($countMovies / $this->itemsPerPage);   

        $currentPage = 1; // Page par defaut
        // Parametre GET
        if(isset($showPage) && is_numeric($showPage)){
        	$currentPage = (int) $showPage;

	        if($currentPage > $nbTotalPages){
	        	$currentPage = $nbTotalPages;
	        }
        }

        $startPage = ($currentPage - 1) * $this->itemsPerPage;
		$listNotModeratedComments = $notModeratedComments->getCommentsNotModerate($startPage, $this->itemsPerPage);
		$alloCine = new AlloCine();
        $allInfos = array();
        if(!empty($listNotModeratedComments)){
            foreach($listNotModeratedComments as $key => $value){
                $allInfos[$key] = [
                    'infosFilm' =>  json_decode($alloCine->get($value['movie_id']), true),
                    'id' => $value['idAsso'],
                    'comment' => $value['comment'], // table user_note_comment
                    'note' => $value['note'], // table user_note_comment
                    'moderation' => $value['moderation'], // table user_note_comment
                    'idUser' => $value['idUser'], // table users
                    'nickname' => $value['nickname'], // table users
                    'email' => $value['email'], // table users
                    'photo' => $value['photo'], // table users
                    'idWine' => $value['idWine'], // table wines
                  	'name' => $value['name'], // table wines
                    'appellation' => $value['appellation'], // table wines
                    'country' => $value['country'], // table wines
                    'image' => $value['image'], // table wines                    
           		];
            }
        }
		$params = [
			'listNotModeratedComments' => $allInfos,
			'err' 		=> $err,
			'nbTotalPages' => $nbTotalPages,
			'currentPage'  => $currentPage,
			'post' => $post,
		];


		


		$this->show('back/list-not-moderated-comments', $params);
	}

	// Formulaire de moderation  
	public function moderationForm()
	{
		$this->show('back/moderation-form', ['showErr' => $showErr, 'err' => $err]);
	}

}