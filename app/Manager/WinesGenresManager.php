<?php
/**
 * Catgorie
 */
namespace Manager;

class WinesGenresManager extends \W\Manager\Manager {

	/**
	 * constrcuteur
	 */
	public function __construct(){
		$this->setTable('wines_genres');
		$this->dbh = \W\Manager\ConnectionManager::getDbh();
	}

}