<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/Models/Faq.php';
$idCategorie = $_POST['idCategorie'];

$listFaq = Faq::getFaqWithCategorie($idCategorie);
header('Content-Type: application/json');
echo json_encode($listFaq);

