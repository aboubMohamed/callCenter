<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/tools/db.php';

class Produit {
    
    public $idProduit;
    public $idCategorie;
    public $title;
    public $photoPath;
    public $description;
    public $prix;


    public function __construct($idProduit=null,$idCategorie = "", $title = "",$photoPath="",$description="",$prix="") {
        if($idProduit) {
            $this->getProduit($idProduit);
            
        }
        else{
        $this->idCategorie = $idCategorie;
        $this->title = $title;
        $this->photoPath = $photoPath;
        $this->description = $description;
        $this->prix = $prix;
        
        }
        
    }
    
                   
            
    public function getProduit($idProduit){
        $connection = connect_db();
        $query = "SELECT * from produit where idProduit =  $idProduit ";
        $res = null;
        $row = null;
        $res = $connection->query($query);

        if ($res != null && $res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $this->idProduit = $idProduit;
            $this->idCategorie = $row["idCategorie"];
            $this->title = html_entity_decode($row["title"]);
            $this->photoPath = $row["photoPath"];
            $this->description =  html_entity_decode($row["description"]);
            $this->prix = $row["prix"];
           
        }
        disconnect_db($connection);
       
        return $this;
        
    }
    
    public static function getListProduits(){
        $connection = connect_db();
        $query = "SELECT * from produit order by idCategorie";
        $res = null;
        $row = null;
        $listProduits = array();
        $res = $connection->query($query);
       
        if ($res != null && $res->num_rows > 0) {
            while($row = $res->fetch_assoc())
            {
            $listProduits[] = new Produit($row["idProduit"]);
            }
        }
       
        disconnect_db($connection);
        return $listProduits;
        
    }
    
    
    
}
