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

			break;

			case 'movies':
				$allocine = new AlloCine();
				$result = json_decode($allocine->search($search));
				
				if(!$result->feed->totalResults){
					return false;
				}
				$json = $result->feed->movie;
			break;

			default: 
				return false;
		}

		$this->showJson($json);
	}

}