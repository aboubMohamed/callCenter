<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/Models/ClientProduit.php';
$idClient = isset($_POST['idClient']) ? $_POST['idClient'] : null;
$idProduit = isset($_POST['idProduit']) ? $_POST['idProduit'] : null;
$retour = -2;
if ($idClient != null && $idProduit != null) {
    $ClProduit = new ClientProduit(null, $idClient, $idProduit);

    $ClProduit = $ClProduit->setProduitClient();
    if ($ClProduit == null)
        $retour = 0;
    else
        $retour = 1;
}
//print_r($retour);
header('Content-Type: application/json');
echo json_encode($retour);
