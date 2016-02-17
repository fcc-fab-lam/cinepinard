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

}