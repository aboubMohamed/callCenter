<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/tools/db.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/Models/Categorie.php';

class Faq {

    public $idFaq;
    public $idCategorie;
    public $question;
    public $reponse;
   
    public function __construct($idFaq = null, $idCategorie = "", $question = "", $reponse = "") {
        //@RR constructeur a partir de l'id devrait populer l'objet a partir de la BD

        if ($idFaq){
            $this->getFAQ($idFaq);
        } else {
            $this->idCategorie = $idCategorie;
            $this->question = $question;
            $this->reponse = $reponse;
        }
    }

    //@RR get FAQ initialement semble indiquer get 1 faq plutot que getFAQList
    public static function getFaqList($categoryid=null) {
        $connection = connect_db();
        $res = null;
        $row = null;
		$tabCategorie = array();
        $select = "SELECT idfaq from faq";
		if($categoryid) {
			$select .= " WHERE idCategorie=".$categoryid;
		}
		$select .= " order by idCategorie";
		
        $res = $connection->query($select);
        $faq = null;
        if ($res != null && $res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $faq = new Faq($row["idfaq"]);
//                $categorie = new Categorie($faq->idCategorie);
               
                $tabCategorie[] = $faq;
            }
        }

        disconnect_db($connection);
        return $tabCategorie;
    }

    public function getFaq($idFaq) {
        $connection = connect_db();
        $res = null;
        $row = null;
        $select = "SELECT * from faq where idfaq = $idFaq";

        $res = $connection->query($select);
        $faq = null;

        if ($res != null && $res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $this->idFaq = $row["idfaq"];
            $this->idCategorie = $row["idCategorie"];
            $this->question = html_entity_decode($row["question"]);
            $this->reponse = html_entity_decode($row["reponse"]);
        } else
            return null;

        disconnect_db($connection);
        return $this;
    }
    
    
public static function getFaqWithCategorie($idCategorie) {
        $connection = connect_db();
        $res = null;
        $row = null;
        $select = "SELECT * from faq where idCategorie = $idCategorie";

        $res = $connection->query($select);
        $faq = null;
        $listFaq = array();
        if ($res != null && $res->num_rows > 0) {
            while($row = $res->fetch_assoc())
            {
            $faq = new Faq($row["idfaq"]);
            $listFaq[] = $faq; 
            
            }
            
        } else
            return null;

        disconnect_db($connection);
        return $listFaq;
    }
}
