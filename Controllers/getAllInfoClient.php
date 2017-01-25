<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/Models/Client.php';
$idClient = isset($_POST["idClient"]) ? $_POST["idClient"] : null;
if ($idClient) {
    $client = new Client($idClient);
} else {
    $client = null;
}
header('Content-Type: application/json');
echo json_encode($client);
