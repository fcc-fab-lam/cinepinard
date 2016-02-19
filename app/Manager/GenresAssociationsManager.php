<?php
/**
 * Catgorie
 */
namespace Manager;

class GenresAssociationsManager extends \W\Manager\Manager {

	/**
	 * constrcuteur
	 */
	public function __construct(){
		$this->setTable('genres_associations');
		$this->dbh = \W\Manager\ConnectionManager::getDbh();
	}

}

