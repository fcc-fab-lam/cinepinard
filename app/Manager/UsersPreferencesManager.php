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

	public function setUsersPreferences($uPrefs, $userId){
		$sql = "DELETE FROM users_preferences WHERE user_id = :id";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id", $userId);
		$sth->execute();


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
	public function getUsersCave($id){
		$sql3 = 'SELECT * FROM users_notes_comments AS unc LEFT JOIN wines as wi ON (unc.wine_id = wi.id) WHERE user_id = :userId';
		$req3 = $this->dbh->prepare($sql3);
		$req3->bindValue(':userId', $id);
		$req3->execute();
		return $req3->fetchAll();
	}
}
