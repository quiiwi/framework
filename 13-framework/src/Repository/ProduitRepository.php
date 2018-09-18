<?php

//src/Repository/ProduitRepository.php

namespace Repository;

use PDO; 

class ProduitRepository extends EntityRepository
{
	// Tout le code de EntityRepository est copié/collé ici
	
	public function getAllProduit(){
		return $this -> findAll();
	}
	
	public function getProduitById($id){
		return $this -> find($id);
	}
	
	public function addProduit($infos){
		return $this -> register($infos);
	}
	
	public function updateProduit($id, $infos){
		return $this -> update($id, $infos);
	}
	
	public function deleteProduit($id){
		return $this -> delete($id);
	}
	
	public function getAllCategorie(){
		$requete = "SELECT DISTINCT categorie FROM produit";
		$resultat = $this -> getDb() -> query($requete);
		$data = $resultat -> fetchAll();
		
		if(!$data){
			return FALSE;
		}
		else{
			return $data;
		}	
	}	
	
	
	public function getAllProduitByCategorie($categorie){
		$requete = "SELECT * FROM produit WHERE categorie = :categorie";
		
		$resultat = $this -> getDb() -> prepare($requete); 
		$resultat -> bindParam(':categorie', $categorie, PDO::PARAM_STR);
		$resultat -> execute();
		
		$resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity\Produit');
		
		$data = $resultat -> fetchAll();
		
		if(!$data){
			return FALSE;
		}
		else{
			return $data;
		}	
	}

	
	public function getAllSuggestions(\Entity\Produit $produit){	
		$prix 		= $produit -> getPrix();
		$categorie 	= $produit -> getCategorie();
		$public 	= $produit -> getPublic();
		$id_produit = $produit -> getId_produit();
		
		$prix_min = $prix - (30*$prix/100); // 70% du prix initial
		$prix_max = $prix + (30*$prix/100); // 130% du prix initial
		
		$requete = "
			SELECT * 
			FROM produit
			WHERE categorie = '$categorie' 
			AND prix BETWEEN $prix_min AND $prix_max
			AND public = '$public'
			AND id_produit != $id_produit
		";
		$resultat = $this -> getDb() -> query($requete);
		$resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity\Produit');
		$data = $resultat -> fetchAll();
		
		if(!$data){
			return FALSE;
		}
		else{
			return $data;
		}	
	}
	
	
	
	
	
	
	
}