<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/tools/db.php';
/**
 * Description of Province
 *
 * @author Portable
 */
class Province {
    
    public $idProvince;
    public $name;
    
    public function __construct($idProvince="",$name="") {
        $this->idProvince = $idProvince;
        $this->name = $name;

        }
    
    public static function getAllProvinces()
    {
        $connexion = connect_db();
        $query = "SELECT * FROM PROVINCES ORDER BY NAME";
        if(!($res=$connexion->query($query))) return null;
        while ($row=$res->fetch_assoc())
        {
        $tabProvinces[] = new Province($row['idProvince'], html_entity_decode($row['name']));
        
        }
        
        return $tabProvinces;
            
    }
    
}
