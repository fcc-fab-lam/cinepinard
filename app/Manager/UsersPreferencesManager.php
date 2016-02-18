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


	public function setUsersPreferences($uPrefs, $userId){
		$sql = "DELETE FROM users_preferences WHERE user_id = :id";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id", $id);
		$sth->execute();

		$sql2 = "INSERT INTO users_preferences (user_id, categorie_id) VALUES (:userId, :categorieId)";
		foreach ($uPrefs as $value) {
			$sth2 = $this->dbh->prepare($sql2);
			$sth2->bindValue(":userId", $userId);
			$sth2->bindValue(":categorieId", $value);
			$sth2->execute();
		}
			
	}

}
