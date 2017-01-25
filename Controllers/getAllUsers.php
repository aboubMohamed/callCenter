<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/Models/user.php';
$listUsers = User::getAllUsername();
header('Content-Type: application/json');
echo json_encode($listUsers);
//print_r($tabCategories);
