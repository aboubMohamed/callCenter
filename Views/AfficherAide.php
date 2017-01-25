<?php
if (!isset($_SESSION['idUser'])) {  // pour protéger l'accée à la page par l'url.
    $_SESSION = array();
    session_destroy();
    header('Location: ../index.php');
}
?> 
<?php
if (isset($_POST['FermerSession'])) {
    // Détruit toutes les variables de la session.
    $_SESSION = array();
    session_destroy(); // Détruire la session en cours.
    header('Location: ../index.php'); //redigérer vers la page d'accueil.
}
?>

<?php require_once '../include/entete.php'; ?>
<?php require_once '../include/enteteIndex.php'; ?>
<style type="text/css">
    .button-style{
        font-size: 15px;
    }
</style>

<div class="row">

    <div class="col-sm-12" style="background-color:darkkhaki;">
        <h2>Aide</h2>
        <ol>
            <li>Informations client
                <ul>
                    <li><a href="" data-toggle="modal" data-target="#myModal5">Rechercher client</a></li>
                    <li><a href="" data-toggle="modal" data-target="#myModal6">Ajouter client</a></li>
                </ul>
            </li></br>


            <li><a href="" data-toggle="modal" data-target="#myModal10">Mise à jour</a></li></br>
            <li><a href="" data-toggle="modal" data-target="#myModal9">Ajouter notes</a></li></br>
            <li><a href="" data-toggle="modal" data-target="#myModal8">Ajouter produits</a></li></br>
            <li><a href="" data-toggle="modal" data-target="#myModal11">FAQ</a></li></br>
            <li><a href="../include/Call_Center_de_Bell.pdf" target="_blank">Télécharger l'aide en format PDF</a></li></br>
        </ol>
    </div>

</div>

<!--***********************************modal5*************-->
<div class="container">
    <div class="modal fade" id="myModal5" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Rechercher client</h4>
                </div>
                <div class="modal-body">
                    <table>
                        <tbody
                            <tr>
                                <td><img src="../images/Recherche.png"  width="250"/> </td>
                                 <td width="20px"></td>
                                  <td><img src="../images/recherche1.png" width="250"/></td>
                                   <td width="20px"></td>
                                    <td> <img src="../images/recherche2.png" width="250"/></td>
                                    
                            </tr>
                            <tr>
                                <td> <p>Entrez le nom ou le prénom du client</p></td>
                                 <td></td>
                                  <td> <p>Sélectionnez un client</p></td>
                                   <td></td>
                                    <td><p>Confirmer ou Annuler votre choix</p></td>
                                    
                            </tr>
                    </tbody>
                        
                        
                    </table>
                    
                    <h3 style="color:blue">Rechercher un client</h3>
                    <ol>
                        <li>Entrez le nom ou le prénom du client dans la zone de recherche.</li>
                        <li>Une liste des clients s'affiche, sélectionnez le client désiré </li>
                        <li>Appuyez sur le bouton <b class="button-style">Confirmer</b> ou <b class="button-style">Annuler</b> pour faire une autre recherche.</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-donate" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!--***********************************modal10*************-->
<div class="container">
    <div class="modal fade" id="myModal10" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Mise à jour</h4>
                </div>
                <div class="modal-body">
                    <img border="0" alt="" src="../images/mise.png">
                    <h3 style="color:blue">Mise à jour (Ajouter des adresses, téléphones ou emails pour un client)</h3>
                    <ol>
                        <li>Cliquez sur l'onglet <b class="button-style">Mise à jour</b> dans le barre de navigation.</li>
                        <li>Remplir les informations.</li>
                        <li>Appuyez sur button <b class="button-style">Ajouter</b> pour ajouter Adresse, téléphone ou Email</li>
                    </ol>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-donate" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--***********************************modal9*************-->
<div class="container">
    <div class="modal fade" id="myModal9" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ajouter notes</h4>
                </div>
                <div class="modal-body">
                    <img border="0" alt="" src="../images/note1.png">
                    <h3 style="color:blue">Ajouter notes</h3>
                    <ol>
                        <li>Cliquez sur l'onglet <b class="button-style">Ajouter notes</b> dans le barre de navigation.</li>
                        <li>Choisissez la categorie de produit dans la liste des catégories.</li>
                        <li>Ramplir les champs "note de client" et "note de l'agent".</li>
                        <li>Appuyez sur bouton <b class="button-style">soumettre</b> pour soumettre les informations.</li>

                    </ol>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-donate" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--***********************************modal8*************-->
<div class="container">
    <div class="modal fade" id="myModal8" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ajouter produit</h4>
                </div>
                <div class="modal-body">
                    <img border="0" alt="" src="../images/foto3.0.png">
                    <h3 style="color:blue">Ajouter produit.</h3>
                    <ol>
                        <li>Cliquez sur l'onglet <b class="button-style">Ajouter produits </b> dans le barre de navigation.</li>
                        <li>Choisissez un produit de la liste affiché.</li>
                        <li>Appuyez sur bouton <b class="button-style">Ajouter le produit</b> pour ajouter le produit à la liste des produit du client.</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-donate" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--***********************************modal6*************-->
<div class="container">
    <div class="modal fade" id="myModal6" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ajouter client</h4>
                </div>
                <div class="modal-body">
                    <img border="0" alt="" src="../images/foto2.png">
                    <h3 style="color:blue">Ajouter client</h3>
                    <ol>
                        <li>Cliquer sur l'onglet <b class="button-style">Ajouter client</b> dans le barre de navigation.</li>
                        <li>Remplir les champs suivants: "nom", "prénom", "adresse" et "contact information".</li>
                        <li>Appuyez sur le bouton <b class="button-style">Soumettre</b> pour enregistrer le client.</li>
                        <li>Aprés l'enregistrement de client Vous pouvez Ajouter une autre adresse, téléphones ou Email</li>
                        <li>Vous pouvez Ajouter un nouveau client par le clique sur bouton <b class="button-style">Nouveau client<b> </li>

                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-donate" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--***********************************modal11*************-->
<div class="container">
    <div class="modal fade" id="myModal11" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Foire aux questions</h4>
                </div>
                <div class="modal-body">
                    <img border="0" alt="" src="../images/faq.png">
                    <h3 style="color:blue">Foire aux questions</h3>
                    <ol>
                        <li>Cliquez sur l'onglet <b class="button-style">FAQ</b> dans le barre de navigation.</li>
                        <li>Les questions et les reponses sont classées par categorie</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-donate" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</div>