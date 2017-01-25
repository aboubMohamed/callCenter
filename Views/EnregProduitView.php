<?php
if (!isset($_SESSION['idUser'])) {  // pour protéger l'accée à la page par l'url.
    header('Location: ../index.php');
}
?> 

<?php require_once 'php-script/EnregProduit-script.php'; ?>
<input type="hidden" id="idClientProduit" value=""/>
<div id="idProduitView" style="display:none;">

</div>

