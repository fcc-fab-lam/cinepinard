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

	public function getGenreByName($name) {
		// SELECT * FROM `wines_genres` where name LIKE '%rouge fruité%' 
		$sql = "SELECT * FROM " . $this->table . " WHERE name LIKE :name";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":name", $name);
		$sth->execute();

		return $sth->fetch();
	}

}