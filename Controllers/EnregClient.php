<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/Models/Client.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/Models/Adresse.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/Models/ContactInfo.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/tools/db.php';
//spl_autoload_register();
$firstname = isset($_POST['firstname']) ? test_input($_POST['firstname']) : null;
$lastname = isset($_POST['lastname']) ? test_input($_POST['lastname']) : null;
$numero = isset($_POST['numero']) ? test_input($_POST['numero']) : null;
$street = isset($_POST['rue']) ? test_input($_POST['rue']) : null;
$app = isset($_POST['app']) ? test_input($_POST['app']) : null;
$ville = isset($_POST['ville']) ? test_input($_POST['ville']) : null;
$province = isset($_POST['province']) ? test_input($_POST['province']) : null;
$postalCode = isset($_POST['postalCode']) ? test_input($_POST['postalCode']) : null;
$app = isset($_POST['app']) ? test_input($_POST['app']) : null;
$country = isset($_POST['country']) ? test_input($_POST['country']) : null;
$telephone = isset($_POST['telephone']) ? test_input($_POST['telephone']) : null;
$email = isset($_POST['email']) ? test_input($_POST['email']) : null;

$client = new Client(null, $firstname, $lastname);
$objetClient = $client->setClient();

if ($objetClient == null) {
    $retour['client'] = 0;
} else {
    $retour['idClient'] = $objetClient->idClient;
    $retour['client'] = 1;
    if ($numero != null && $street != null && $ville != null) {
        $adresse = new Adresse(null, $client->idClient, $numero, $street, $ville, $province, $postalCode, $country, $app);
        $objetAdresse = $adresse->setAdresse();

        if ($objetAdresse == null) {
            $retour['adresse'] = 0;
        } else {
            $retour['adresse'] = 1;
        }
    } else
        $retour['adresse'] = -1;

    if ($telephone != null) {
        $contactInfo = new ContactInfo(null, $client->idClient, 1, $telephone, "");
        $objetTelephone = $contactInfo->setContactInfo();
        if ($objetTelephone == null)
            $retour["telephone"] = 0;
        else
            $retour['telephone'] = 1;
    } else
        $retour['telephone'] = -1;

    if ($email != null) {
        $contactInfo = new ContactInfo("", $client->idClient, 2, $email, "");
        $objetEmail = $contactInfo->setContactInfo();
        if ($objetEmail == null)
            $retour["email"] = 0;
        else
            $retour['email'] = 1;
    } else
        $retour['email'] = -1;
}

header('Content-Type: application/json');
echo json_encode($retour);
