<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/tools/db.php';

class Entreprise {

    public $idEntreprise;
    public $name;
    public $number;
    public $street;
    public $city;
    public $bureau;
    public $province;
    public $postalCode;
    public $country;
    public $telephone;
    public $email;
    public $logoPath;


    public function __construct() {
       
            $this->getEntreprise();
    }

    public function getEntreprise() {

        $connection = connect_db();
        $res = null;
        $row = null;
        $query = "SELECT * from entreprise limit 1";
        $res = $connection->query($query);
        if ($res != null && $res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $this->name = html_entity_decode($row["name"]);
            $this->number = html_entity_decode($row["number"]);
            $this->street = html_entity_decode($row["street"]);
            $this->city = html_entity_decode($row["city"]);
            $this->province = html_entity_decode($row["province"]);
            $this->postalCode = html_entity_decode($row["postalCode"]);
            $this->country = html_entity_decode($row["country"]);
            $this->telephone = html_entity_decode($row["telephone"]);
            $this->email = html_entity_decode($row["email"]);
            $this->logoPath = html_entity_decode($row["logoPath"]);
        }

        disconnect_db($connection);
        return $this;
    }

}
