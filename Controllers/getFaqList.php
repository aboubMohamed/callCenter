<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/CentreAppel1/Models/Faq.php';
$categoryid = (isset($_REQUEST["idcategory"]) && ($_REQUEST["idcategory"] != "")) ? $_REQUEST["idcategory"] : null;
$tabCategories = Faq::getFaqList($categoryid);
header('Content-Type: application/json');
echo json_encode($tabCategories);

