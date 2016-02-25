<?php
/**
 * Basic fix for UserManager. Extends UserManager & Manager
 *
 * How-to :
 * 	- Place-it in \app\Manager
 * 	- In your controller add in header :
 *		use \Manager\FixUserManager;
 *
 * @author Axel Wargnier <axel@axessweb.fr>
 * @copyright WebForce3 2016
 */
namespace Manager;

class FixUserManager extends \W\Manager\UserManager {


	public function __construct(){
		$app = getApp();

		// Force use datatable defined in file config.php
		// Otherwise, it searches 'wusers' datatable
		$this->setTable($app->getConfig('security_user_table'));

		$this->dbh = \W\Manager\ConnectionManager::getDbh();
		return;
	}

	public function getUserbyToken($token){

		$sql = "SELECT * FROM " . $this->table . " WHERE token = :token LIMIT 1";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":token", $token);
		$sth->execute();

		return $sth->fetch();
	}

}