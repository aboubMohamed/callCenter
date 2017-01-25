<?php

require_once '../Models/user.php';
require_once '../tools/db.php';
$username = isset($_POST["username"]) ? test_input($_POST["username"]) : null;
$password = isset($_POST["password"]) ? test_input($_POST["password"]) : null;
if ($username && $password) {
    $user = new User();
    $user->username = $username;
    $user->setPasswordUser($password);
    $row = $user->getLoginInfo();
    $message = -1;
    if ($row != NULL) {
        session_start();
        $_SESSION['idUser'] = $user->idUser;
        $_SESSION['firstname'] = $user->getFirstNameUser();
        $_SESSION['lastname'] = $user->getLastnameUser();
        $message = 1;
    }
}

header("content-type: application/json");
echo json_encode($message);
?>
