<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/tools/db.php';

class Categorie {

    public $idCategorie;
    public $name;

    public function __construct($idCategorie = null, $name = "") {
        if ($idCategorie)
            $this->getCategorie($idCategorie);
        else
            $this->name = $name;
    }

    public function getCategorie($idCategorie) {
        $connection = connect_db();
        $res = null;
        $row = null;
        $query = "SELECT * from categories where idCategorie = $idCategorie";
        $res = $connection->query($query);
        if ($res != null && $res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $this->idCategorie = $row["idCategorie"];
            $this->name = html_entity_decode($row["name"]);
        } else
            return null;
        disconnect_db($connection);


        return $this;
    }

    public static function getAllCategories() {
        $connection = connect_db();
        $res = null;
        $row = null;

        $query = "SELECT idCategorie FROM categories ORDER BY name";
        $res = $connection->query($query);
        $tabCategories = array();
        if ($res != null && $res->num_rows > 0) {

            while ($row = $res->fetch_assoc()) {

                $cat = new Categorie($row["idCategorie"]);
                $tabCategories[] = $cat;
            }
        }

        disconnect_db($connection);

        return $tabCategories;
    }

}
