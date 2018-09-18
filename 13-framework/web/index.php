<?php
session_start(); 

require_once(__DIR__ . '/../vendor/autoload.php');

$app = new Manager\Application;
$app -> run();





//index.php /   produit   /    afficheall
//index.php /   produit   /    affiche    /   12
//index.php /   produit   /    categorie  /   pull

//www.monsite.com/produit/afficheall


// TEST 1 : Entity
// $produit = new Entity\Produit;
// $produit -> setTitre('Mon super Produit');
// echo $produit -> getTitre();

// $membre = new Entity\Membre;
// $membre -> setPseudo('Yakine');
// echo '<br/>' . $membre -> getPseudo();

// TEST 2 : PDOManager;
// $pdo = Manager\PDOManager::getInstance() -> getPdo();
// $resultat = $pdo -> query("SELECT * FROM produit");
// $produits = $resultat -> fetchAll();
// echo '<pre>'; 
// print_r($produits);
// echo '</pre>'; 

// TEST 3 : EntityRepository 
// ATTENTION : Pour tester ce fichier il faut simuler que l'on soit dans une entité particulière en précisant 'return Produit' (exemple) dans la fonction getTableName();. Pour la suite on remettre la fonction dans son état initial. 

// $er = new Repository\EntityRepository; 
// $produits = $er -> findAll();
// $pdt = $er -> find(10);

// $_POST = array(
	// 'id_produit' => 12,
	// 'reference' => '456',
	// 'categorie' => 'tshirt',
	// 'titre' => 'nouveau produit',
	// 'description' => 'Super produit',
	// 'public' => 'm',
	// 'taille' => 'XL', 
	// 'couleur' => 'bleu',
	// 'prix' => 10,
	// 'stock' => 50
// );

// $infos = array(
	// 'reference' => '456',
	// 'categorie' => 'tshirt',
	// 'titre' => 'nouveau produit',
	// 'description' => 'Super produit',
	// 'public' => 'm',
	// 'taille' => 'XL', 
	// 'couleur' => 'bleu',
	// 'prix' => 10,
	// 'stock' => 50
// );

// $er -> register($_POST);
// $er -> delete(12);
// $er -> update(11, $infos);
// $produits = $er -> findAll();

// echo '<pre>'; 
// print_r($produits);
// print_r($pdt);
// echo '</pre>'; 



// TEST 4 : ProduitRepository

// $pr = new Repository\ProduitRepository; 

// $produits = $pr -> getAllProduit(); 
// $pdt = $pr -> getProduitById(11);

// $categories = $pr -> getAllCategorie();
// $produit_cat = $pr -> getAllProduitByCategorie('pull');

// echo '<pre>'; 
// print_r($produits);
// print_r($pdt);
// print_r($categories);
// print_r($produit_cat);
// echo '</pre>';


//TEST 5 : ProduitController
//$pc = new Controller\ProduitController; 
//$pc -> afficheall();
//$pc -> affiche(11);








