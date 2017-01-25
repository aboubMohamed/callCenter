<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/Models/ContactInfo.php';
$id = isset($_POST["id"]) ? $_POST["id"] : null;
if ($id) {
    $ContactInfo = new ContactInfo($id);
} else
    $contactInfo = null;

header('Content-Type: application/json');
echo json_encode($ContactInfo);

