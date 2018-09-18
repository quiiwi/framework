<?php
//src/Controller/MembreController.php

namespace Controller; 

class MembreController extends Controller
{
	public function inscription(){
		$message = '';
		if($_POST){
			
			$user = $this -> getRepository() -> getMembreByPseudo($_POST['pseudo']);
			if($user){
				//pas bon
				$message = 'Pqseudo non disponible';
			}
			else{
				$this -> getRepository() -> registerMembre($_POST);
				//return $this -> connexion();
				$message = 'Bravo';
			}
		}
		
		//web/Membre/inscription
		
		$params = array(
			'message' => $message
		);
		return $this -> render('layout.html', 'inscription.html', $params);	
	}
	
	
	
	
	
}