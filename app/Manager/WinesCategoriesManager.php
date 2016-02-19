<?php
/**
 * Catgorie
 */
namespace Manager;

class WinesCategoriesManager extends \W\Manager\Manager {

	/**
	 * fonction de recuperation des catégories de boissons
	 * @param
	 * @return array la liste des catégories de boissons et leurs id
	 */
	public function getCategories(){
		$this->setTable('wines_categories');
		return $this->findAll();
	}
	/**
	 * fonction de recuperation des id des genres de boissons
	 * @param array liste des id des genres de films
	 * @return array la liste des id des genres de boissons
	 */
	public function getWinesGenres($genresFilm){
		$sql = "SELECT id_wines_genre FROM genres_associations WHERE id_movies_genre IN ";
		$listeIdGenresFilm = '(';
		for($i=0;$i < count($genresFilm);$i++){
			if($i!= count($genresFilm) - 1){
				$listeIdGenresFilm .= $genresFilm[$i].', ';
			}
			else{
				$listeIdGenresFilm .= $genresFilm[$i];
			}
		}
		$listeIdGenresFilm .= ')';
		$sth = $this->dbh->prepare($sql.$listeIdGenresFilm);
		$sth->execute();

		return $sth->fetchAll();
	}

	/**
	 * fonction de recuperation des id des genres de boissons
	 * @param array liste des id des genres de films
	 * @return array la liste des id des genres de boissons
	 */
	public function getWinesProposition($genresVins, $userPref){
		$sql = "SELECT * FROM wines WHERE moderation = 1 AND genre_id IN ";
		$listeIdGenresVins = '(';
		for($i=0;$i < count($genresVins);$i++){
			if($i!= count($genresVins) - 1){
				$listeIdGenresVins .= $genresVins[$i]['id_wines_genre'].', ';
			}
			else{
				$listeIdGenresVins .= $genresVins[$i]['id_wines_genre'];
			}
		}
		$listeIdGenresVins .= ')';
		$sql .= $listeIdGenresVins;
		if(!empty($userPref)){
			$listeUserPref = '(';
			for($i=0;$i < count($userPref);$i++){
				if($i!= count($userPref) - 1){
					$listeUserPref .= $userPref[$i].', ';
				}
				else{
					$listeUserPref .= $userPref[$i];
				}
			}
			$listeUserPref .= ')';
			$sql .= ' AND categorie_id IN '.$listeUserPref;
		}
		$sql .= ' ORDER BY RAND() LIMIT 0, 1';
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}


}