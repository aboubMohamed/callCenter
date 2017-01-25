<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/tools/db.php';

class Appel {

    public $id;
    public $idUser;
    public $idClient;
    public $dateTimeAppel;
    public $note;
    public $reponse;
    public $idCategorie;

    public function __construct($id = null, $idUser = "", $idClient = "", $note = "", $reponse = "", $idCategorie = "") {

        if ($id) {
            $this->getAppel($id);
        } else {
            $this->idUser = $idUser;
            $this->idClient = $idClient;
            $this->note = $note;
            $this->reponse = $reponse;
            $this->idCategorie = $idCategorie;
        }
    }

    public function setAppel() {

        $connection = connect_db();
        $query = "INSERT INTO appel(idUser,idClient,note,reponse,idCategorie) VALUES($this->idUser,$this->idClient,'$this->note','$this->reponse',$this->idCategorie);";

        if ($connection->query($query) === TRUE) {
            $this->id = $connection->insert_id;
        } else
            return null;

        disconnect_db($connection);
        return $this;
    }

    public function getAppel($id) {
        $connection = connect_db();
        $res = null;
        $row = null;
        $query = "SELECT * from appel where id = $id";
        $res = $connection->query($query);
        if ($res != null && $res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $this->id = $id;
            $this->idCategorie = $row["idCategorie"];
            $this->dateTimeAppel = $row["dateTimeAppel"];
            $this->idUser = $row["idUser"];
            $this->idClient = $row["idClient"];
            $this->note = html_entity_decode($row["Note"]);
            $this->reponse = html_entity_decode($row["reponse"]);
        } else
            return null;
        disconnect_db($connection);


        return $this;
    }

}
