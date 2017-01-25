<?php

require_once '../Models/User.php';
require_once '../tools/db.php';
require_once '../Models/Adresse.php';
require_once '../Models/Appel.php';
require_once '../Models/Client.php';
require_once '../Models/ContactInfo.php';


function TestUnitaireUser($username, $password) {

    $user = new User(null, test_input($username), test_input($password));
    $user1 = $user->getLoginInfo();
    if ($user1) {
        
        echo "username et password correct " . " Username :" . $username . " - " . "password:" . $password . "<br>";
        $list = $user->getAllUsername();
    
    
        
    } else {
        echo "Echec! mot de passe ou nom d'utilisateur incorrect:  " . " Username: " . $username . " - " . "password: " . $password . "<br>";
    }
    
   
   
}

function testUnitaireGetAll($user)
{
    $userExiste = $user->getUserFromDatabase(100);
    if($userExiste==null) echo "Utilisateur n'existe pas ". "idUser = 100 <br>";
    else echo "Utilisateur existe ". "idUser= 100";
}

TestUnitaireUser("admin", "admin");
TestUnitaireUser("admin", "1250");
TestUnitaireUser("d", "1250");
TestUnitaireUser("<script>alert('ok')</script>", "1250");
TestUnitaireUser('', "admin");


function TestUnitaireAdresse($idClient, $numero, $street, $ville, $province, $postalCode, $country, $app) {
    

    $adresse = new Adresse(null, $idClient, $numero, test_input($street), test_input($ville), test_input($province), $postalCode, $country, $app);
    $adresse = $adresse->setAdresse();
    if ($adresse) {
        echo "Enregistrement reussi de l'adresse<br>";
    } else {
        echo "Enregistrement Echoui de l'adresse<br>";
    }
}

TestUnitaireAdresse(null,7, "saint-leonard", "Montréal", "quebec", "A5A2A2", "canada", "52");
TestUnitaireAdresse(1,9, null, "M@$%", "?&%", "A5A-2A2", "canada", "52215");
TestUnitaireAdresse(1,10, "saint-leonard", "Montréal", "quebec", "A5A-2A2", "canada", "52215");
TestUnitaireAdresse(1,11, "saint-leonard", "Montréal", "quebec", "A5A-2A2", "canada", "52215");



function TestUnitaireAppel($idUser, $idClient, $note, $reponse, $idCategorie)
        {

$appel = new Appel(null, $idUser, $idClient, $note, $reponse, $idCategorie);

$retour = $appel->setAppel();
if ($retour == null)
   return null;
else
    return $retour;
}

TestUnitaireAppel(1,1, "Note1", "note2", 1);
TestUnitaireAppel(1,1, 5214, "#%H", 1);
TestUnitaireAppel(1,1, "<script>alert('ok')</script>", "note2", 1);

function TestUnitaireClient($idClient, $firstname, $lastname)
        {
$client = new Client(null, $firstname, $lastname);
$objetClient = $client->setClient();
if ($objetClient == null)
   echo "enregistrement reussi de client <br>";
else
    echo "enregistrement echoui de client <br>";
}

TestUnitaireClient(null, "FirstName", "lastname");
TestUnitaireClient(null, 20145, "lastname");
TestUnitaireClient(null, "firstname", "lastname");