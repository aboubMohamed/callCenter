<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/Models/Province.php';
$tabProvinces = Province::getAllProvinces();
header('Content-Type: application/json');
echo json_encode($tabProvinces);


