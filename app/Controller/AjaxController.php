<?php


namespace Controller;

use \W\Controller\Controller;
use \Manager\AddWineManager as AddWine;
use \Manager\AlloCineManager as AlloCine;

class AjaxController extends Controller
{


	public function getJson($type = null, $search = null) {

		$search =  trim(strip_tags($search));

		switch ($type) {
			case 'wines':
                $wines = new AddWine();
                $resultsWines = $wines->search($search);
                if(empty($resultsWines)){
                	return false;
                }
                $json = $resultsWines;
			break;

			case 'movies':
				$allocine = new AlloCine();
				$resultsMovies = json_decode($allocine->search($search));
				
				if(!$resultsMovies->feed->totalResults){
					return false;
				}

				// On recreer le tableau a cause des correspondances FR / EN
				$listMovies = [];

				foreach($resultsMovies->feed->movie as $movie){
					if(isset($movie->title)){
						$movie->searchTitle = $movie->title.' - ('.$movie->productionYear.')';
					}
					else {
						$movie->searchTitle = $movie->originalTitle.' - ('.$movie->productionYear.')';
					}
					$listMovies[] = $movie;
				}

				$json = $listMovies;

			break;

			default: 
				return false;
		}

		$this->showJson($json);
	}

}