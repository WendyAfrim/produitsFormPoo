<?php 
    
    require_once "classes/database.class.php";
    require_once "classes/produits.class.php";

    $database = new Database;
    $connexionBdd = $database->getConnexion();

    $produits = new Produits($connexionBdd);
    $allProducts = $produits->findAll();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    

    <title>Page Index - Liste des produits</title>
  </head>
  <body>
        <div class="container">

            <!-- DEBUT FORMULAIRE -->

            <?php include_once 'config/header_produits.php';?>
      
            <h1>Page Index - Liste des produits</h1>
            <br>

            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($product = $allProducts->fetch()) { ?>
                        <tr>
                        <th scope="row"><?php echo $product['id_produit'] ;?></th>
                        <td><?php echo $product['nom'] ;?></td>
                        <td><?php echo $product['description'];?></td>
                        <td><?php echo $product['prix'].'€' ;?></td>
                        <td>
                            <a href="details_produits.php?id_detail=<?php echo $product['id_produit'];?>" type="button" class="btn btn-outline-info">Afficher</a>
                            <a href="" type="button" class="btn btn-outline-warning">Modifier</a>
                            <a href="delete_produits.php?id_delete=<?php echo $product['id_produit'];?>" type="button" class="btn btn-outline-danger">Supprimer</a>
                        </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
       

            <?php 
                // FEEDBACK CREATE

                if(isset($_GET['feedback']) && $_GET['feedback'] == 'create') {
            ?> 
                <div class="alert alert-success" role="alert">
                    Votre produit a été ajouté avec succès ! :)
                </div>
            <?php
            }
            ?>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>