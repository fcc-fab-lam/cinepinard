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
		$sql = 'SELECT categorie_id, name FROM users_preferences AS up LEFT JOIN wines_categories as wc ON (up.categorie_id = wc.id) WHERE user_id = :userId';
		$req = $this->dbh->prepare($sql);
		$req->bindValue(':userId', $id);
		$req->execute();
		return $req->fetchAll();
	}

	}
