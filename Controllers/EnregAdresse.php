<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/Models/Adresse.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/tools/db.php';
$idClient = isset($_POST['idClient']) ? $_POST['idClient'] : null;
$numero = isset($_POST['numero']) ? $_POST['numero'] : null;
;
$street = isset($_POST['rue']) ? test_input($_POST['rue']) : null;
$app = isset($_POST['app']) ? test_input($_POST['app']) : null;
$ville = isset($_POST['ville']) ? test_input($_POST['ville']) : null;
$province = isset($_POST['province']) ? test_input($_POST['province']) : null;
$postalCode = isset($_POST['postalCode']) ? test_input($_POST['postalCode']) : null;
$app = isset($_POST['app']) ? test_input($_POST['app']) : null;
$country = isset($_POST['country']) ? test_input($_POST['country']) : null;
$adresse = new Adresse(null, $idClient, $numero, $street, $ville, $province, $postalCode, $country, $app);
$test = $adresse->setAdresse();
//var_dump($test);
if ($test)
    $retour = 1;
else
    $retour = 0;
header('Content-Type: application/json');
echo json_encode($retour);
