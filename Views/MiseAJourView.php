<?php
if (!isset($_SESSION['idUser'])) {  // pour protéger l'accée à la page par l'url.
    header('Location: ../index.php');
}
?> 
<?php require_once 'php-script/MiseAJourInfoClient.php'; ?>
<div class="row" id="idMiseAjourView" style="display: none;">
    <div class="col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading">Ajouter des Adresses</div>
            <div class="panel-body"> <table>
                    <tbody>
                        <tr>
                            <td><label >Numéro</label></td>
                            <td><label >Rue</label></td>
                            <td><label >Appartement</label></td>
                        </tr>
                        <tr>
                            <td width="20%"><input type="number" class="form-control" name = "numero" id="idNumeroMajour" ></td>
                            <td width="60%"> <input type="text" class="form-control"  class="text-capitalize form-group-lg" name = "street" id="idRueMajour" placeholder="Rue" ></td>
                            <td width="20%"> <input type="text" class="form-control" name = "app" id="idAppartementMajour" placeholder="#App" ></td>
                        </tr>
                        <tr>
                            <td><label>Ville</label></td>
                            <td><label>Province</label></td>
                            <td><label>Code postal</label></td>
                        </tr>
                        <tr>
                            <td><input type ="text" class="form-control" pattern="[A-Za-z]" name="ville" id="idVilleMajour" placeholder="Ville"></td>
                            <td><select class="form-control" id="idSelectProvincesMajour"></select></td>
                            <td> <input type="text" class="form-control" id="idPostalCodeMajour" pattern="[A-Za-z]{1}[0-9]{1}[A-Za-z]{1}-[0-9]{1}[A-Za-z]{1}[0-9]{1}" name="postalCode" placeholder="A9A-9A9"></td>
                        </tr>
                        <tr> <td><button type="button" class="btn btn-learn" aria-label="Left Align" id="idAjouterAdresseMajour">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true" > Adresse</span>
                                </button></td> </tr>
                    </tbody>

                </table>
            </div>
        </div>

    </div>  

    <div class="col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading">Ajouter des numéros de téléphone et des emails</div>
            <div class="panel-body"> 

                <table>
                    <tbody>
                        <tr><td><label>Numéro de téléphone</label><td></tr>
                        <tr><td><input type="tel" class="form-control"  id="idPhoneMajour" placeholder="999-999-9999" ></td>
                            <td ><button type="button" class="btn btn-learn" id="idAjouterPhoneMajour" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"> Téléphone</span>
                                </button></td>
                        </tr>


                        <tr><td><label>Adresse de courriel</label></td></tr>
                        <tr><td> <input type="email" class="form-control" style="width:350px;" id="idEmailMajour" required="" placeholder="Adresse E-mail:exmple@domain.com"></td>
                            <td><button type="button" class="btn btn-learn" id="idAjouterEmailMajour" aria-label="Left Align" >
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"> E-mail</span>
                                </button> </td>
                        </tr>


                    </tbody>

                </table>
            </div>
        </div>
    </div>



</div>
