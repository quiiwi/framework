<?php

//vendor/autoload.php

class Autoload
{
	
	public static function inclusion_automatique($className){
		
		//$pc = new    Controller\ProduitController;
		//require 'src/Controller/ProduitController.php';
	
		//$c = new Controller\Controller;
		//require 'vendor/Controller/Controller.php';
	
		$tab = explode('\\', $className);
		
		if(
			$tab[0] == 'Manager' 
			||($tab[0] == 'Controller' && $tab[1] == 'Controller')
			||($tab[0] == 'Repository' && $tab[1] == 'EntityRepository')
		){
			$path = __DIR__ . '/' . implode('/', $tab) . '.php';
			//c://localhost/phpoo/13-framework/vendor/Controller/Controller.php
		}
		else{
			$path = __DIR__ . '/../src/' . implode('/', $tab) . '.php';
			//c://localhost/phpoo/13-framework/src/Controller/produitController.php
		}
	
		require $path; 
		
		//----------
		//echo '<pre>Autoload : ' . $className . '<br/>';
		//echo '=> require "' . $path . '"</pre><hr/>';
		//----------
	}
}

//----------------------
spl_autoload_register(array('Autoload', 'inclusion_automatique'));
//----------------------
/*
Lorsqu'on utilise spl_autoload_register en POO, on doit lui fournir le nom de la classe et la méthode (OBLIGATOIREMENT static) à exécuter.
*/







