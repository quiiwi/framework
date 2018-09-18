<?php

//vendor/Manager/PDOManager.php

namespace Manager; 

use PDO; //On récupère la Classe PDO qui existe dans l'espace global de PHP, afin de pouvoir l'utiliser dans le namespace actuel (Manager)

class PDOManager
{
	private static $instance = NULL; // Va contenir un objet PDOManager
	protected $pdo; //Contiendra notre objet PDO
	
	private function __construct(){} // En private, on ne peut plus instancier la classe
	private function __clone(){} // En private, on ne peut pas cloner d'objet de cette classe
	
	public static function getInstance(){
		if(!self::$instance){
			self::$instance = new self;
		}
		return self::$instance;
	}
	
	public function getPdo(){
		include_once(__DIR__ . '/../../app/config.php');
		$config = new \Config;
		$connect = $config -> getParametersConnect();
		// La classe a pour mission de nous transmettre les informations de connexion à la BDD. Donc on l'inclue ici, on l'instancie, et grâce à sa fonction getParametersConnect() (voir fichier app/config.php) on récupère les infos dans $connect. 
		
		$this -> pdo = new PDO('mysql:host=' . $connect['host'] . ';dbname=' . $connect['dbname'], $connect['login'], $connect['password'], array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		));
		
		return $this -> pdo;
	}
}


