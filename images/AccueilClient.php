<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['idUser']) || $_SESSION['idUser'] == null) {
// pour protéger l'accée à la page par l'url.
    header('Location: ../index.php');
}
?> 

<?php
if (isset($_POST['FermerSession'])) {
    // Détruit toutes les variables de la session.
    $_SESSION["idUser"] = null;
    $_SESSION = array();
    session_destroy(); // Détruire la session en cours.
    header('Location: ../index.php'); //redigérer vers la page d'accueil.
}
?>


<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Centre Appel VisionTelecom</title>
        <?php
        require_once '../include/entete.php';
        require_once 'php-script/AccueilClient-script.php';
        ?>

        <style type="text/css">
            body  {

                background-color: #D6EAF8;
                overflow: scroll;
            }
            exp{
                color:red;
            }
        </style>

    </head>

    <body style="background-color:#BCD7EE;">
        <div id="idMenuVertical" style="height: 170px;width: 80%;margin-left: 10%;">
            <div style="margin-left:10px; margin-top: 10px;">  
                <label for="idChercherInput">Rechercher client</label>
                <input type="text" id="idChercherInput" class="form-control" placeholder="Entrez le nom ou le prénom ..." style="width:280px;">
                <label for="idCompte">Compte: </label><span id='idCompte'></span><br>
                <label for="idNomEtprenom">Prénom et nom: </label><span id='idNomEtprenom'></span>

                <!--<form method="post">-->

                <br><input type="hidden"  name="idClientConfirmer" id="idClientReCherche">
                <input type="submit" class="btn btn-primary" name='confirmer'  id="idConfirmation" value="Confirmer" data-toggle="tooltip" data-placement="right" title="Confirmer le choix du client" style="display:none;">
                <input type="button" class="btn btn-danger " name='annuler'    id="idAnnulerRecherche" value="Annuler" data-toggle="tooltip" data-placement="right" title="Autre recherche" style="display:none;">

            </div>


            <form method="post">
                <div class="input-group" style="position:absolute;float:right;right:15%;z-index: 999;top: 10px;">
                    <img src="../images/user-icon-6.png" width="50" height="50" alt="user-icon">
                    <span><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname'] ?></span><br>
                    <input type="submit" style="margin-left: 50px;" class="btn btn-danger" name='FermerSession' title="Fermer votre session" value="Déconnexion">
                </div>
            </form>
        </div>

        <div id="tabs" style="position: relative;width:80%;margin-left: 10%;top:10px;">
            <ul>
                <li><a href="#tabs-1" data-toggle="tooltip" data-placement="bottom" title="Tous les informations sur le client ">Informations client</a></li>
                <li><a href="#tabs-2" data-toggle="tooltip" data-placement="bottom" title="Ajouter des adresses ou des informations de contact ">Mise à jour</a></li>
                <li><a href="#tabs-3" data-toggle="tooltip" data-placement="bottom" title="Ajouter une note au client ">Ajouter notes</a></li>
                <li><a href="#tabs-4" data-toggle="tooltip" data-placement="bottom" title="Ajouter des produits au client ">Ajouter produits</a></li>
                <li><a href="#tabs-5" data-toggle="tooltip" data-placement="bottom" title="Ajouter un nouveau client ">Ajouter client</a></li>
                <li><a href="#tabs-6" data-toggle="tooltip" data-placement="bottom" title="Faire aux questions ">FAQ</a></li>
                <li><a href="#tabs-7" data-toggle="tooltip" data-placement="bottom" title="Aide en ligne ">Aide</a></li>

            </ul>

            <input type="hidden" id="idClientInput" value="<?php echo isset($_POST['idClientConfirmer']) ? $_POST['idClientConfirmer'] : ''; ?>">

            <div id="tabs-1">

                <?php
                require_once 'InformationsClient.php';
                ?>

            </div> 
            <div id="tabs-2">
<?php
require_once 'MiseAJourView.php';
?>

            </div>

            <div id="tabs-3">
<?php
require_once 'EnregAppelView.php';
?>
            </div>
            <div id="tabs-4">
                <?php
                require_once 'EnregProduitView.php';
                ?>
            </div>
            <div id="tabs-5">
                <?php require_once 'EnregClientView.php' ?>
            </div>
            <div id="tabs-6">

                <?php
                require_once 'AfficherFaq.php';
                ?>

            </div>
            <div id="tabs-7">

                <?php
                require_once 'AfficherAide.php';
                ?>

            </div>
            <div class="row">
            <div class="col-sm-4">
                <img src="../images/Recherche.png" width="400" /> 
            </div>
            <div class="col-lg-4">
                <img src="../images/recherche1.png" width="400"/>
            </div>
            <div class="col-lg-4">
                <img src="../images/recherche2.png" width="400"/>
            </div>
        </div>
        </div>
        <div id="idDialog" title="">
            <p id="idMessageDialig" style=" color:darkred; font-size: 20px; ">
            </p>
        </div>
        
    </body>
</html>
