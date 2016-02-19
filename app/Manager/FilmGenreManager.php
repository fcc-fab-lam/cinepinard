<?php
/**
 * Categorie
 */
namespace Manager;

class FilmGenreManager extends \W\Manager\Manager {
	

	/**
	 * constructeur (utilisé pour ajouter un genre de vin)
	 */
	public function __construct(){
		$this->setTable('movies_genres');
		$this->dbh = \W\Manager\ConnectionManager::getDbh();
	}

}