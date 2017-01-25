<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/tools/db.php';
$connection = connect_db();
$term = $_REQUEST['term'];
$query = "SELECT * FROM client WHERE firstname LIKE '%$term%' or lastname LIKE '%$term%'";

$requete = $connection->query($query);

$array = array(); // on créé le tableau

while ($donnee = $requete->fetch_assoc()) { // on effectue une boucle pour obtenir les données
    $valeur = $donnee['idClient'];
    $queryTelephone = "SELECT contenue FROM contactInfo WHERE idClient = $valeur and type=1";
    $requeteTelephone = $connection->query($queryTelephone);
    $row = $requeteTelephone->fetch_assoc();
    array_push($array, $donnee["idClient"] . " " . $donnee["firstname"] . " " . $donnee["lastname"] . " " . $row['contenue']); // et on ajoute celles-ci à notre tableau
}
disconnect_db($connection);
header('Content-Type: application/json');
echo json_encode($array); // il n'y a plus qu'à convertir en JSON
?>