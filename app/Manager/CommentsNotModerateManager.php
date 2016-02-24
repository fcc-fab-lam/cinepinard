<?php
/**
 * Catgorie
 */
namespace Manager;

class CommentsNotModerateManager extends \W\Manager\Manager {

		public function __construct(){
		$this->setTable('users_notes_comments');

		$this->dbh = \W\Manager\ConnectionManager::getDbh();
		return;
	}

	/**
	 * fonction de recuperation des catégories de boissons
	 * @param
	 * @return array la liste des catégories de boissons et leurs id
	 */
	public function getCommentsNotModerate($startPage = null, $endPage = null){
		$sql = 'SELECT unc.id AS idAsso, unc.movie_id, unc.wine_id, unc.note, unc.comment, unc.user_id, unc.moderation, u.id AS idUser, u.nickname, u.email, u.photo, w.id AS idWine, w.name, w.appellation, w.country, w.image FROM '.$this->table.' AS unc LEFT JOIN users AS u ON (u.id = unc.user_id) LEFT JOIN wines AS w ON (w.id = unc.wine_id) WHERE unc.moderation = 0';
		
		if(!empty($startPage) || !empty($endPage) && is_int($startPage) && is_int($endPage)){
			$sql.= ' LIMIT :start, :end';
		}

		$req = $this->dbh->prepare($sql);

		if(!empty($startPage) || !empty($endPage) && is_int($startPage) && is_int($endPage)){
			$req->bindValue(':start', $startPage, \PDO::PARAM_INT);
			$req->bindValue(':end', $endPage, \PDO::PARAM_INT);
		}

		$req->execute();
		return $req->fetchAll();
		}


	public function countCommentsNotModerate(){
		$sql = 'SELECT COUNT(*) AS total FROM '.$this->table.' WHERE moderation = 0 OR moderation = 2';

		$req = $this->dbh->prepare($sql);
		$req->execute();

		$result = $req->fetch();

		return $result['total'];
	}

	public function updateCommentsModeration($updateValue, $id){
		$this->update($updateValue, $id);
		return;
	}

	public function deleteCommentsModeration($id){
		return $this->delete($id);
	}
}
