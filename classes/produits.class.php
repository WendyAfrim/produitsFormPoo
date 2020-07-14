<?php 

class Produits {

    public $id;
    public $nom;
    public $description;
    public $prix;
    
    public $conn;

    public function __construct($connexionBdd) {
        $this->conn = $connexionBdd;
    }

    // Permet de nous retourner tous les produits
    public function findAll() {

        $reqSelect = $this->conn->query("SELECT * FROM produits");
        return $reqSelect;
    }

    // Permet de nous recupérer un produit
    public function findOne() {  

        $query = "SELECT * FROM produits WHERE id_produit = :id_detail";

        $reqSelectOne = $this->conn->prepare($query);
        $reqSelectOne->execute([
                            'id_detail' => $this->id
        ]);
    
        $row = $reqSelectOne->fetch();

        $this->nom = $row['nom'];
        $this->description = $row['description'];
        $this->prix = $row['prix'];
    }

    // Permet de modifier un produit
    public function edit() {

    }

    public function delete() {

        $query = "DELETE FROM produits WHERE id_produit =:id_delete";

        $reqDelete = $this->conn->prepare($query);

        if($resultat = $reqDelete->execute(['id_delete' => $this->id])) {
            return true;
        } 
        else {
            return false;
        }

    }

    public function create() {
        // Function permettant de créer un nouvel objet autrement dit de l'insérer directement en BDD lorsque l'utilisateur créer un nouveau produit
        $reqInsert = "INSERT INTO produits (nom, description, prix) VALUES (:nom, :description, :prix )";

        $insertion = $this->conn->prepare($reqInsert);
        $insertion->execute(array(
                              'nom' => $this->nom,
                              'description' => $this->description,
                              'prix' => $this->prix
        ));

        return $insertion;
    }
}