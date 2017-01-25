<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/tools/db.php';

class Adresse {

    public $idAdresse;
    public $idClient;
    public $numero;
    public $street;
    public $ville;
    public $province;
    public $postalCode;
    public $country;
    public $app;

    public function __construct($idAdresse = null, $idClient = "", $numero = "", $street = "", $ville = "", $province = "", $postalCode = "", $country = "", $app = "") {

        if ($idAdresse)
            $this->getAdresse($idAdresse);
        else {
            $this->idClient = $idClient;
            $this->numero = $numero;
            $this->street = $street;
            $this->ville = $ville;
            $this->province = $province;
            $this->postalCode = $postalCode;
            $this->country = $country;
            $this->app = $app;
        }
    }

    public function getAdresse($id) {
        $connection = connect_db();
        $query = "SELECT * from adresses where idAdresse = '" . $id . "'";
        $res = null;
        $res = $connection->query($query);
        if ($res != null && $res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $this->idClient = $row["idClient"];
            $this->idAdresse = html_entity_decode($row["idAdresse"]);
            $this->numero = $row["numero"];
            $this->street = html_entity_decode($row["street"]);
            $this->ville = html_entity_decode($row["ville"]);
            $this->province = $row["province"];
            $this->postalCode = $row["postalCode"];
            $this->country = $row["country"];
            $this->app = $row["App"];
        }
        disconnect_db($connection);
        return $this;
    }

    public function setAdresse() {
        $connection = connect_db();
        $query = "INSERT INTO adresses(idClient,numero,street,ville,province,postalCode,country,app) values($this->idClient,$this->numero,'$this->street','$this->ville','$this->province','$this->postalCode','$this->country','$this->app')";
        //echo $query;
        if ($connection->query($query) === TRUE) {
            $this->idAdresse = $connection->insert_id;
        } else
            return null;
        disconnect_db($connection);

        return $this;
    }

    
}
