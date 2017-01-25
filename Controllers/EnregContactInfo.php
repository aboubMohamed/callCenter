<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/Models/ContactInfo.php';
$contenue = isset($_POST['contenue']) ? test_input($_POST['contenue']) : null;
$type = isset($_POST['type']) ? $_POST['type'] : null;
$idClient = isset($_POST['idClient']) ? $_POST['idClient'] : null;

if ($contenue != null) {
    $contactInfo = new ContactInfo("", $idClient, $type, $contenue, "");
    $test = $contactInfo->setContactInfo();
    if ($test == null)
        $retour["contenue"] = 0;
    else
        $retour['contenue'] = 1;
}
header('Content-Type: application/json');
echo json_encode($retour);
