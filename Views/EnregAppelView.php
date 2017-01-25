<?php
if (!isset($_SESSION['idUser'])) {  // pour protéger l'accée à la page par l'url.
    header('Location: ../index.php');
}
?>         
<?php require_once 'php-script/EnregAppel-script.php'; ?>

<div class="form-group" id="idAppelView" style="display:none;">
    <label for="target">Catégorie:</label></br>
    <select id="target">
        <!----Liste des Catégories--->
    </select>

    <br/>     
    <label for="idNote">Note de client (Question, comentaires, suggestion etc.)</label>
    <input type="hidden" id="idClientAppel"    value=""/>
    <input type="hidden" id="idUser"    value="<?php echo $_SESSION['idUser'] ?>"/>
    <textarea width="600" class="form-control" id="idNote" rows="3" placeholder="Note de client"></textarea>
    <label for="idReponse">Note de agent (reponse)</label>
    <textarea width="600" class="form-control" id="idReponse" rows="3" placeholder="reponse... " ></textarea>

    <input type="submit" class="btn btn-primary" id="idEnvoyerNote" value="Soumettre"/><br>
</div>     