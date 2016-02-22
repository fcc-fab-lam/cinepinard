<?php
/**
 * Catgorie
 */
namespace Manager;

class AddWineManager extends \W\Manager\Manager {

	/**
	 * constrcuteur
	 */
	public function __construct(){
		$this->setTable('wines');
		$this->dbh = \W\Manager\ConnectionManager::getDbh();
	}

}