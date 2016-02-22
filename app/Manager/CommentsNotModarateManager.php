<?php
/**
 * Catgorie
 */
namespace Manager;

class CommentsNotModarateManager extends \W\Manager\Manager {

	/**
	 * fonction de recuperation des catégories de boissons
	 * @param
	 * @return array la liste des catégories de boissons et leurs id
	 */
	public function getCommentsNotModarate(){
		$sql = 'SELECT * FROM users_notes_comments WHERE moderation = 0';
		$req = $this->dbh->prepare($sql);
		$req->execute();
		return $req->fetchAll();
		}

}
