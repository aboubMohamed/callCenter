<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/tools/db.php';

class ClientProduit {

    public $id;
    public $idClient;
    public $idProduit;
    public $dateAjout;

    public function __construct($id = null, $idClient = "", $idProduit = "") {
        if ($id) {
            $this->getProduitClient($id);
        } else {
            $this->idClient = $idClient;
            $this->idProduit = $idProduit;
        }
    }

    public function setProduitClient() {

        $connection = connect_db();
        $query = "INSERT INTO clientproduit(idClient,idProduit) values ($this->idClient,$this->idProduit)";
        //echo $query;
        if ($connection->query($query) === TRUE) {
            $this->id = $connection->insert_id;
        } else {
            return null;
        }

        disconnect_db($connection);
        return $this;
    }

    public function getProduitClient($id) {
        $connection = connect_db();
        $res = null;
        $row = null;
        $query = "SELECT * from clientproduit where id = $id";
        $res = $connection->query($query);
        if ($res != null && $res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $this->id = $row["id"];
            $this->idClient = $row["idClient"];
            $this->idProduit = $row["idProduit"];
            $this->dateAjout = $row["dateAjout"];
        } else {
            return null;
        }
        disconnect_db($connection);
        return $this;
    }

}
