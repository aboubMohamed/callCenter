<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/Models/Categorie.php';
$tabCategories = Categorie::getAllCategories();
header('Content-Type: application/json');
echo json_encode($tabCategories);
//print_r($tabCategories);

