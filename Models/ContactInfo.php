<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/tools/db.php';

class ContactInfo {

    public $id;
    public $idClient;
    public $type;
    public $contenue;
    public $preferred;

    public function __construct($id = null, $idClient = "", $type = "", $contenue = "", $preferred = "") {

        if ($id) {
            $this->getContactInfo($id);
        } else {
            $this->idClient = $idClient;
            $this->type = $type;
            $this->contenue = $contenue;
            $this->preferred = $preferred;
        }
    }

        public function setContactInfo() {
        $connection = connect_db();
        $query = "INSERT INTO contactinfo(idClient, type, contenue) values($this->idClient,$this->type,'$this->contenue')";
        if ($connection->query($query) === TRUE) {
            $this->id = $connection->insert_id;
        } else
            return null;

        disconnect_db($connection);
        return $this;
    }

    public function getContactInfo($id) {
        $connection = connect_db();
        $res = null;
        $row = null;
        $query = "SELECT * from contactInfo where id = $id";
        $res = $connection->query($query);
        if ($res != null && $res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $this->id = $row["id"];
            $this->type = $row["type"];
            $this->idClient = $row["idClient"];
            $this->contenue = html_entity_decode($row["contenue"]);
            $this->preferred = $row["preferred"];
        } else
            return null;
        disconnect_db($connection);

//@RR retourner l'pobjet plutot que le name
        return $this;
    }

}
