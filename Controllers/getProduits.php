<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/Models/Produit.php';
$listProduits = Produit::getListProduits();

header('Content-Type: application/json');
echo json_encode($listProduits);
