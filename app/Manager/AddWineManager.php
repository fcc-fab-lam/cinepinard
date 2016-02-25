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


	public function search($search){
        $sql = "SELECT * FROM " . $this->table." WHERE name LIKE :name OR appellation LIKE :name";
                
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':name', '%'.$search.'%');
        $sth->execute();
        return $sth->fetchAll();
	}


}