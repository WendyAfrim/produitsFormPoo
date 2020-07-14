<?php

if(!isset($_POST['nom']) || !isset($_POST['description']) || !isset($_POST['prix'])) {
    header('location:form_produits.php');
}

// print_r($_POST);
// die;

$nom = htmlentities($_POST['nom']);
$description= htmlentities($_POST['description']);
$prix = htmlentities($_POST['prix']);

require_once 'classes/database.class.php';
require_once 'classes/produits.class.php';

$database = new Database;
$connexionBdd = $database->getConnexion();


// On instancie un objet produit directement depuis les données renseignées par les clients.
$product = new Produits($connexionBdd);
$product->nom = $nom;
$product->description = $description;
$product->prix = $prix;

// echo '<pre>';
// print_r($product);
// echo '</pre>';

if($product->create()) {
    header('location:index_produits.php?feedback=create');
}
else {
    header('location:form_produits.php');
}

