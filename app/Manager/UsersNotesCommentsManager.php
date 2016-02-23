<?php
/**
 * Catgorie
 */
namespace Manager;

class UsersNotesCommentsManager extends \W\Manager\Manager {

	public function __construct(){
		$this->setTable('users_notes_comments');

		$this->dbh = \W\Manager\ConnectionManager::getDbh();
		return;
	}

	public function countComments($idUser){
		$sql = 'SELECT COUNT(*) AS total FROM '.$this->table.' WHERE user_id = :userId';

		$req = $this->dbh->prepare($sql);
		$req->bindValue(':userId', $idUser);
		$req->execute();

		$result = $req->fetch();

		return $result['total'];
	}

}