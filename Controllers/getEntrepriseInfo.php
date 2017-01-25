<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/Models/Entreprise.php';
$entreprise = new Entreprise();
header('Content-Type: application/json');
echo json_encode($entreprise);

