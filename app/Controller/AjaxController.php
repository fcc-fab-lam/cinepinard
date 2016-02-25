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
                /*$searchWines = new AddWine;
                $sql = "SELECT * FROM " . $searchWines->table." WHERE name LIKE :name";
                
                $sth = $searchWines->dbh->prepare($sql);
                $sth->bindValue(':name', '%'.$search.'%');
                $sth->execute();
                $json = $sth->fetchAll();*/
			break;

			case 'movies':
				$allocine = new AlloCine();
				$resultMovies = json_decode($allocine->search($search));
				
				if(!$resultMovies->feed->totalResults){
					return false;
				}
				$json = $resultMovies->feed->movie;
			break;

			default: 
				return false;
		}

		$this->showJson($json);
	}

}