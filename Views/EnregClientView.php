
<?php
if (!isset($_SESSION['idUser'])) {  // pour protéger l'accée à la page par l'url.
    header('Location: ../index.php');
}
?> 
<?php
require_once 'php-script/EnregClient-script.php';
?>

<div style="margin-left: 3%;margin-right: 3%;" >
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="lastname">Nom <exp>*</exp></label>
                <input type="text" pattern="[A-Za-z]" title="Nom de client" class="form-control" id="idLastname" placeholder="Nom de famille">
                <label for="firstname">Prénom <exp>*</exp></label>
                <input type="text" pattern="[A-Za-z]" class="form-control" name="firstname" id="idFirstname" placeholder="Prénom">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <input type="submit" class="btn btn-learn" value="Nouveau client" id="idNouveauClient" style="position: absolute;float: right;top:25px;display: none;">
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-6">
            <div id="idAdresse">
                <div class="panel panel-primary">
                    <div class="panel-heading">Adresse</div>
                    <div class="panel-body">
                        <table>

                            <tbody>

                                <tr>
                                    <td><label>Numéro</label></td>
                                    <td><label>Rue</label></td>
                                    <td><label>Appartement</label></td>
                                </tr>

                                <tr>
                                    <td width="20%"><input type="text" class="form-control" name = "numero" id="idNumero" ></td>
                                    <td width="60%"> <input type="text" class="form-control"  class="text-capitalize form-group-lg" name = "street" id="idRue" placeholder="Rue"></td>
                                    <td width="20%" > <input type="text" class="form-control" name = "app" id="idAppartement" placeholder="#App" ></td>
                                </tr>

                                <tr>
                                    <td><label>Ville</label></td>
                                    <td><label>Province</label></td>
                                    <td><label>Code postal</label></td>
                                </tr>

                                <tr>
                                    <td><input type ="text" class="form-control" pattern="[A-Za-z]" name="ville" id="idVille" placeholder="Ville"></td>
                                    <td><select class="form-control" id="idSelectProvinces"></select></td>
                                    <td><input type="text" class="form-control" id="idPostalCode" name="postalCode" placeholder="A9A 9A9"></td>
                                </tr>

                                <tr> <td><button type="button" class="btn btn-learn" aria-label="Left Align" id="idAjouterAdresse" style="display:none;">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true" > Adresse</span>
                                        </button></td> 
                                </tr>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div> 
        </div>  

        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Contact Information</div>
                <div class="panel-body"> 

                    <table>
                        <tbody>
                            <tr><td><label>Numéro de téléphone <exp>*</exp></label><td></tr>
                            <tr><td width="60%"><input type="tel" class="form-control"  id="idPhone" placeholder="999-999-9999"></td>
                                <td width="40%"><button type="button" class="btn btn-learn" id="idAjouterPhone" aria-label="Left Align" style="display: none;">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"> Téléphone</span>
                                    </button></td>
                            </tr>
                         <tr><td><label>Adresse de courriel </label></td></tr>
                            <tr><td> <input type="email" class="form-control" style="width:350px;" id="idEmail" required="" placeholder="Adresse E-mail:exmple@domain.com"></td>
                                <td><button type="button" class="btn btn-learn" id="idAjouterEmail" aria-label="Left Align" style="display:none;">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"> E-mail</span>
                                    </button></td>
                            </tr>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">

        <input type="submit" class="btn btn-primary"  value="Soumettre" id="idSubmitClient" >
        <exp style="margin-left: 10%;">*</exp><span id="idChampObligatoire">Champs obligatoires</span>

    </div>   

</div>




