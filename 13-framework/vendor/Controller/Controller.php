<?php
//vendor/Controller/Controller.php

namespace Controller; 

use Repository, Config;

class Controller
{
	protected $repository; //Contiendra un objet de ProduitRepository, ou MembreRepository ou CommandeRepository etc... en fonction de l'entité dans laquelle je suis (produitController, ou MembreController ou CommandeController...) 
	private $url; 
	
	public function __construct(){	
		require(__DIR__ . '/../../app/Config.php');
		$config = new Config;
		$this -> url = $config -> getParametersUrl();	
	}
	
	public function getRepository(){
		// exemple : je suis dans Controller\ProduitController, et je veux un Repository\ProduitRepository
	
		$class = 'Repository\\' . str_replace(array('Controller\\', 'Controller'), '', get_called_class()) . 'Repository';
		//Controller\ProduitController
		//Produit
		//Repository\ProduitRepository
		
		$this -> repository = new $class; 
		//$this -> repository = new Repository\ProduitRepository
		
		return $this -> repository; 
	}

	
	
	public function render($layout, $view, $params){
		$dirView = __DIR__ . '/../../src/View';
		// je sors du dossier controller et je vais dans le dossier View
		
		$dirFile = str_replace(array('Controller\\', 'Controller'), '', get_called_class());
		// Si je suis dans Controller\ProduitController , je récupère le mot 'Produit' qui correspond au dossier où sont stockées mes vues. 
		
		$path_layout = $dirView . '/' . $layout;
		// notre layout.html se trouve à la racine du dossier View
		//localhost/PHPOO/13-framework/src/View/layout.html
		
		$path_view = $dirView . '/' . $dirFile . '/' . $view;
		//localhost/PHPOO/13-framework/src/View/Produit/boutique.html
	
		$params['url'] = $this -> url;
		extract($params);
	
		ob_start(); // enclenche la temporisation de sortie. Cela signifie que la ligne de code juste en dessous ne sera pas exécutée, elle sera retenue. 
		require $path_view;
		
		$content = ob_get_clean(); // cela signifie que l'action retenue en temporisation, est maintenant représentée par la variable $content. 
		
		ob_start();
		require $path_layout;
		
		return ob_end_flush();
		// retourne tout ce qui a été retenu. Il éteint la temporisation !
	}	
}