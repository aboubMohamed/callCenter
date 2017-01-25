<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/tools/db.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/Models/ContactInfo.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/Models/Adresse.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/Models/Appel.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/Models/ClientProduit.php';

class Client {

    public $idClient;
    public $firstname;
    public $lastname;
    public $dateCreation;
    public $listAdresses;
    public $listTelephone;
    public $listEmail;
    public $listAppel;
    public $listProduit;

    //   private $adresse_list = null;

    public function __construct($idClient = null, $firstname = "", $lastname = "") {
        if ($idClient) {
            $this->getClient($idClient);
        } else {
            $this->firstname = $firstname;
            $this->lastname = $lastname;
        }
    }

    public function setClient() {
        $connection = connect_db();
        $result = null;
        $query = "insert into client(firstname,lastname) values('$this->firstname','$this->lastname')";
        if ($connection->query($query) === TRUE) {
            $this->idClient = $connection->insert_id;
            $result = $this;
        } 
        disconnect_db($connection);
        return $result;
    }

    public function getClient($idClient) {
        $connection = connect_db();
        $query = "SELECT * FROM client where idClient = $idClient";
        $result = null;
        $res = $connection->query($query);

        if ($res != null && $res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $this->idClient = $idClient;
            $this->firstname = html_entity_decode($row["firstname"]);
            $this->lastname = html_entity_decode($row["lastname"]);
            $this->dateCreation = $row["dateCreation"];
            $this->getAllAdressesClient();
            $this->getAllContactInfo();
            $this->getAllAppelClient();
            $this->getAllProduits();
            $result = $this;
        } 
        disconnect_db($connection);
        return $result;
    }

    public function getAllAdressesClient() {
        $connection = connect_db();
        $query = "SELECT * FROM adresses where idClient = $this->idClient";
        $result = null;
        $res = null;
        $res = $connection->query($query);
        if ($res != null && $res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $adresse = new Adresse($row["idAdresse"]);
                $this->listAdresses[] = $adresse;
            }
            $result = $this;
        } 
        disconnect_db($connection);
        return $result;
    }

    public function getAllContactInfo() {
        $connection = connect_db();
        $query = "SELECT * FROM contactinfo WHERE idClient = $this->idClient";
        $res = null;
        $result = null;
        $res = $connection->query($query);
        if ($res != null && $res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $contactInfo = new ContactInfo($row["id"]);
                if ($contactInfo->type == 2) {
                    $this->listEmail[] = $contactInfo;
                } else {
                    $this->listTelephone[] = $contactInfo;
                }
            }
             $result = $this;
        } 
        disconnect_db($connection);
        return $result;
    }

    public function getAllAppelClient() {
        $connection = connect_db();
        $query = "SELECT * FROM appel WHERE idClient = $this->idClient order by idCategorie";
        $res = null;
        $result = null;
        $res = $connection->query($query);
        if ($res != null && $res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $appel = new Appel($row["id"]);
                $this->listAppel[] = $appel;
            }
             $result = $this;
        } 
        disconnect_db($connection);
        return $result;
    }

    public function getAllProduits() {
        $connection = connect_db();
        $query = "SELECT * FROM clientproduit WHERE idClient = $this->idClient order by dateAjout";
        $result = null;
        $res = null;
        $res = $connection->query($query);
        if ($res != null && $res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $clientProduit = new ClientProduit($row["id"]);
                $this->listProduit[] = $clientProduit;
            }
            $result = $this;
        } 
        disconnect_db($connection);
        return $result;
    }

}
