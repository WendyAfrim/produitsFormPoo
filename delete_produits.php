<?php 

if(!isset($_GET['id_delete']) && empty($_GET['id_delete'])) {
    header('location:index_produits.php');
}

$id_delete = htmlentities($_GET['id_delete']);


require_once "classes/database.class.php";
require_once "classes/produits.class.php";

$database = new Database;
$connexionBdd = $database->getConnexion();

$produit = new Produits($connexionBdd);
$produit->id = $id_delete;

if ($produit->delete()) {
    header('location:index_produits.php');
} else {
    header('location:index_produits.php');
}