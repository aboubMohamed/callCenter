<?php
function connect_db() {   //Fonction de connexion
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $db = "centre_appel";
    $conn = new mysqli($servername, $username, $password, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function disconnect_db($connection) { //fonction de déconnexion
    $connection->close();
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlentities($data,ENT_QUOTES);
    return $data;
}

