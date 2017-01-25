<?php require_once "php-script/AccueilClient-script.php" ?>
<?php
if (!isset($_SESSION['idUser'])) {  // pour protéger l'accée à la page par l'url.
    header('Location: ../index.php');
}
?> 
<div id="page-wrapper" style="display: none;">
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Liste des adresses
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="danger">
                                <tr>
                                    <th>Adresse</th>
                                </tr>
                            </thead>
                            <tbody id="idAdressesAfficher">

                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>

                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->

        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Liste des téléphones
                </div>
                <!-- /.panel-heading -->

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>TéLéphone</th>

                                </tr>
                            </thead>
                            <tbody id='idTelephoneAfficher'>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>

                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
    <!-- /.col-lg-6 -->
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Liste des e-mails
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>E-mail</th>

                                </tr>
                            </thead>
                            <tbody id="idEmailAfficher">

                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>

                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- produit -->
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading" >
                    Liste des Poduits du client
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Code Produit</th>
                                    <th>Titre</th>
                                    <th>Date d'achat</th>
                                </tr>
                            </thead>
                            <tbody id="idProduitClientAfficher">

                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>

                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->

    </div>


    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Liste des Appels du client
                    <div style='position: relative; float: right'>
                        <label>Chercher</label>
                        <input type="text" id="search"  class="form-control" style="with: 200px" placeholder="tapper un nom ...."/>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <!-- /.panel-heading -->

                    <table width="100%" class="table table-bordered table-hover" id="table" >
                        <thead>
                            <tr class="primary">
                                <th width='10%'>Catégorie</th>
                                <th width='10%'>Username de l'agent</th>
                                <th width='35%'>Note</th>
                                <th width='35%'>Note de répondant</th>
                                <th width='10%'>date et Heure</th>

                            </tr>
                        </thead>
                        <tbody id='idAppelAfficher'>

                        </tbody>
                    </table>

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.col-lg-6 -->
</div>
