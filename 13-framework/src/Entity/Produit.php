<?php
//src/Entity/Produit.php

namespace Entity; 

class Produit
{
	private $id_produit;
	private $reference;
	private $categorie;
	private $titre;
	private $description;
	private $couleur;
	private $taille;
	private $public;
	private $photo;
	private $prix;
	private $stock;
	
	/**
	* setter/getter id_produit
	*
	*/
	public function setId_produit($id){
		$this -> id_produit = $id;
	}
	public function getId_produit(){
		return $this -> id_produit;
	}
	
	/**
	* setter/getter reference
	*
	*/
	public function setReference($reference){
		$this -> reference = $reference;
	}
	public function getReference(){
		return $this -> reference;
	}
	
	/**
	* setter/getter categorie
	*
	*/
	public function setCategorie($categorie){
		$this -> categorie = $categorie;
	}
	public function getCategorie(){
		return $this -> categorie;
	}
	
		/**
	* setter/getter photo
	*
	*/
	public function setPhoto($photo){
		$this -> photo = $photo;
	}
	public function getPhoto(){
		return $this -> photo;
	}
	
	/**
	* setter/getter titre
	*
	*/
	public function setTitre($titre){
		$this -> titre = $titre;
	}
	public function getTitre(){
		return $this -> titre;
	}
	
	/**
	* setter/getter description
	*
	*/
	public function setDescription($description){
		$this -> description = $description;
	}
	public function getDescription(){
		return $this -> description;
	}
	
	/**
	* setter/getter couleur
	*
	*/
	public function setCouleur($couleur){
		$this -> couleur = $couleur;
	}
	public function getCouleur(){
		return $this -> couleur;
	}
	
	/**
	* setter/getter taille
	*
	*/
	public function setTaille($taille){
		$this -> taille = $taille;
	}
	public function getTaille(){
		return $this -> taille;
	}
	
	/**
	* setter/getter public
	*
	*/
	public function setPublic($public){
		$this -> public = $public;
	}
	public function getPublic(){
		return $this -> public;
	}
	
	/**
	* setter/getter prix
	*
	*/
	public function setPrix($prix){
		$this -> prix = $prix;
	}
	public function getPrix(){
		return $this -> prix;
	}
	
	/**
	* setter/getter stock
	*
	*/
	public function setStock($stock){
		$this -> stock = $stock;
	}
	public function getStock(){
		return $this -> stock;
	}	
}