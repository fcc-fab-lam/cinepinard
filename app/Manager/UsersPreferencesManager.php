<?php
/**
 *
 * 
 */
namespace Manager;

class UsersPreferencesManager extends \W\Manager\Manager {

	/**
	 * Récupere les préférences de boissons de l'utilisateur en fonction de son ID
	 * @param   integer $id La colonne en fonction de laquelle trier
	 * @return   array les id de preferences boissons de l'utilisateur
	 */

	public function getUsersPreferences($id){
		$sql = 'SELECT * FROM users_preferences AS up LEFT JOIN wines_categories as wc ON (up.categorie_id = wc.id) WHERE user_id = :userId';
		$req = $this->dbh->prepare($sql);
		$req->bindValue(':userId', $id);
		$req->execute();
		return $req->fetchAll();
	}


	/**
	 * Remplace les préférences de boissons de l'utilisateur en fonction de son ID
	 * @param   $uPrefs Les prefs de l'utilisateur 
	 * @param   $userId  id  l'utilisateur
	 * @return   array les id des nouvelles preferences boissons de l'utilisateur
	 */

	public function deleteUsersPreferences($userId){
		$sql = "DELETE FROM users_preferences WHERE user_id = :id";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id", $userId);
		return $sth->execute();
	}
    
    public function setUsersPreferences($uPrefs, $userId){
		// insere les nouvelles preferences de l'utilisateur
		$this->setTable('users_preferences');
		foreach ($uPrefs as $value) {
			$this->insert(['user_id' => $userId, 'categorie_id' => $value]);
		}
	}


	/** Récupère les associations choisies par l'utilisateur
	 *
	 *
	 *
	 */
	public function getUsersCave($id, $startPage = null, $endPage = null){

		$sql3 = 'SELECT unc.id AS assoId, unc.movie_id, unc.wine_id, unc.comment, unc.note, unc.moderation, wi.name, wi.appellation, wi.description FROM users_notes_comments AS unc LEFT JOIN wines AS wi ON (unc.wine_id = wi.id) WHERE unc.user_id = :userId';

		if(!empty($startPage) || !empty($endPage) && is_int($startPage) && is_int($endPage)){
			$sql3.= ' LIMIT :start, :end';
		}

		$req3 = $this->dbh->prepare($sql3);
		$req3->bindValue(':userId', $id);

		if(!empty($startPage) || !empty($endPage) && is_int($startPage) && is_int($endPage)){
			$req3->bindValue(':start', $startPage, \PDO::PARAM_INT);
			$req3->bindValue(':end', $endPage, \PDO::PARAM_INT);
		}

		$req3->execute();
		return $req3->fetchAll();
	}

    
    public function existAssoInCave($idFilm, $idVin, $idUser){
        $sql = 'SELECT * FROM users_notes_comments WHERE user_id = :userId AND movie_id = :movieId AND wine_id = :wineId';
		$req = $this->dbh->prepare($sql);
		$req->bindValue(':userId', $idUser);
		$req->bindValue(':movieId', $idFilm);
		$req->bindValue(':wineId', $idVin);
		$req->execute();
		$asso = $req->fetch();
        if(empty($asso)){
            return false;
        }
        else{
            return true;
        }
    }
}
