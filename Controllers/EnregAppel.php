<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/Models/Appel.php';
$idUser = isset($_POST['idUser']) ? $_POST['idUser'] : null;
$idClient = isset($_POST['idClient']) ? $_POST['idClient'] : null;
$idCategorie = isset($_POST['idCategorie']) ? $_POST['idCategorie'] : null;
;
$note = isset($_POST['note']) ? test_input($_POST['note']) : null;
$reponse = isset($_POST['reponse']) ? test_input($_POST['reponse']) : null;
$appel = new Appel(null, $idUser, $idClient, $note, $reponse, $idCategorie);

$retour = $appel->setAppel();
if ($retour == null)
    $retour = -1;
else
    $retour = 1;
header('Content-Type: application/json');

echo json_encode($retour);

