<?php 

if(!isset($_GET['id_detail']) && empty($_GET['id_detail'])) {
    header('location:index_produits.php');
}

$id_detail = htmlentities($_GET['id_detail']);

require_once "classes/database.class.php";
require_once "classes/produits.class.php";

$database = new Database;
$connexionBdd = $database->getConnexion();

$produit = new Produits($connexionBdd);
$produit->id = $id_detail;

$produit->findOne();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Details Produit</title>
  </head>
  <body>
        <div class="container">
            <h1>Details de notre produit</h1>
            
            <a href="index_produits.php" role="button" class="btn btn-outline-warning">Home</a>
            
            <div class="card" style="width: 18rem;">
            
                <div class="card-header">
                   <?php echo $produit->nom;?>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"> <?php echo $produit->description;?></li>
                    <li class="list-group-item"> <?php echo $produit->prix."€";?></li>
                </ul>
            </div>
            
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        </div>
  </body>
</html>

