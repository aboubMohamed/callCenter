<script type="text/javascript">
    $(document).ready(function ()
    {
        tab = new Array();
        $("#tabs").tabs();

        $('#idChercherInput').autocomplete({
            source: "../Controllers/ChercherClient.php",
            select: function (event, ui) { // lors de la sélection d'une proposition
               
                $("#idConfirmation").show();
                $("#idAnnulerRecherche").show();
                tab = ui.item.value.split(" ");
                $("#idClientInput").val(tab[0]);
                $("#idCompte").text(tab[0]);
                $("#idNomEtprenom").html(tab[1] + " " + tab[2]);

            }

        });

        $("#idConfirmation").click(function () {
            $("#idProduitView").show();
            $("#page-wrapper").show();
            $("#idAppelView").show();
            $("#idMiseAjourView").show();
            $("#idConfirmation").hide();
            $("#idAnnulerRecherche").hide();
            $('#idChercherInput').val("");
            informationsClient();
        });

        $("#idAnnulerRecherche").click(function () {
            $('#idChercherInput').val(""); //Input pour garder le idClient
            $("#idCompte").html("");
            $("#idNomEtprenom").html("");
            $("#idClientInput").val('');
            $("#idConfirmation").hide();
            $("#idAnnulerRecherche").hide();

        });
        $("#search").keyup(function () {
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($("#table tbody").find("tr"), function () {

                if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                    $(this).hide();
                else
                    $(this).show();
            });

        });
        informationsClient();


    });

    function AlertMessage(message)
    {
        $("#idDialog").attr("title", "Alert");
        $("#idDialog").dialog({
            dialogClass: "no-close",
            buttons: [
                {
                    text: "Fermer",
                    click: function () {
                        $(this).dialog("close");
                    }
                }
            ]
        });
        $("#idMessageDialig").html(message);

    }

    function ConformerTelephone(telephone)
    {
        var resultat = true;
        var testTelephone = telephone.split("-");
        if (testTelephone.length == 3)
        {
            for (var i = 0; i < testTelephone.length; i++)
            {
                if (isNaN(testTelephone[i])) {
                    AlertMessage("NUMERO DE TELEPHONE NON CONFORME DOIT ETRE DES NOMBRES");
                    resultat = false;
                }
            }
            if (testTelephone[0].length != 3 || testTelephone[1].length != 3 || testTelephone[2].length != 4)
            {
                AlertMessage("NUMÉRO DE TELEPHONE NON CONFORME VÉRIFIER");
                resultat = false;
            }
        } else {
            AlertMessage("NUMÉRO DE TELEPHONE NON CONFORME VERIFIER LE NUMÉRO");
            resultat = false;
        }


        return resultat;
    }

    function informationsClient()
    {
        var objetCategories = null;
        var listUsername;
        var idClient = $("#idClientInput").val();
        intialiserTableau();


        if (idClient == 0) {
            return;
        }

        $.post("../Controllers/getCategories.php", {},
                function (data, status)
                {
                    objetCategories = data;

                });

        $.post("../Controllers/getAllUsers.php", {},
                function (data, status)
                {

                    listUsername = data;
                });

        $.post("../Controllers/getAllInfoClient.php", {idClient: idClient},
                function (data, status)
                {

                    $("#idCompte").html("<span style='font-size:25px;color:darkblue;'>" + data.idClient + "</span>");
                    $("#idNomEtprenom").html("<span style='font-size:20px;color:darkblue;'>" + data.firstname + " " + data.lastname + "</span>")

                    if (data.listAppel)
                        afficherListeDesAppels(objetCategories, listUsername, data);
                    if (data.listProduit)
                        afficherListeDesProduits(data);
                    if (data.listTelephone)
                        afficherListeDesTelephones(data);
                    if (data.listEmail)
                        afficherListeDesEmail(data);
                    if (data.listAdresses)
                        afficheListeDesAdresses(data);
                });






    }


    function afficheListeDesAdresses(data)
    {
        var chaine = "";
        for (i = 0; i < data.listAdresses.length; i++)
        {

            if (i % 2 == 0)
            {
                ligneClass = "<tr class='success'><td>";
            } else
            {
                ligneClass = "<tr class='warning'><td>";
            }


            if (data.listAdresses[i].app != "")
                var app = ",App# " + data.listAdresses[i].app + ", "
            else
                app = ", "
            chaine += ligneClass + data.listAdresses[i].numero + " " + data.listAdresses[i].street + app + data.listAdresses[i].ville + ", " +
                    data.listAdresses[i].postalCode + ", " + data.listAdresses[i].province + "</td></tr>";
        }
        if (chaine != "")
            $("#idAdressesAfficher").html(chaine);
    }

    function afficherListeDesTelephones(data) //Afficher la liste des tepephones
    {
        var chaine = "";

        for (i = 0; i < data.listTelephone.length; i++)
        {
            if (i % 2 == 0)
                ligneClass = "<tr class='default'><td>";
            else
                ligneClass = "<tr class='success'><td>";
            //
            chaine += ligneClass + data.listTelephone[i].contenue + "</td></tr>";
        }
        if (chaine != "")
            $("#idTelephoneAfficher").html(chaine);

    }

    function afficherListeDesEmail(data)
    {
        var chaine = "";

        for (i = 0; i < data.listEmail.length; i++)
        {

            if (i % 2 == 0) {
                ligneClass = "<tr class='default'><td>";
            } else
            {
                ligneClass = "<tr class='success'><td>";
            }
            chaine += ligneClass + data.listEmail[i].contenue + "</td></tr>";
        }
        if (chaine != "")
            $("#idEmailAfficher").html(chaine);
    }

    function afficherListeDesAppels(objetCategories, listUsername, data)
    {

        var chaine = "";
        for (i = 0; i < data.listAppel.length; i++)
        {

            if (i % 2 == 0)
            {
                tigneClass = "<tr class='default'><td>";
            } else
            {
                tigneClass = "<tr class='info'><td>";
            }


            for (var j = 0; j < objetCategories.length; j++)

            {



                if (objetCategories[j].idCategorie == data.listAppel[i].idCategorie)
                {

                    var title = objetCategories[j].name;
                    break;
                }
            }

            for (var j = 0; j < listUsername.length; j++)

            {



                if (listUsername[j].idUser == data.listAppel[i].idUser)
                {

                    var username = listUsername[j].username;
                    break;
                }
            }
            chaine += tigneClass + title + "</td><td>" +
                    username + "</td><td>" + data.listAppel[i].note + "</td><td>" +
                    data.listAppel[i].reponse + "</td><td>" + data.listAppel[i].dateTimeAppel +
                    "</td></tr>";
        }
        if (chaine != "")
            $("#idAppelAfficher").html(chaine);
    }


    function afficherListeDesProduits(dataObjet)
    {
        var chaine = "";
        $.post("../Controllers/getProduits.php", {}, function (data, status) {

            for (var i = 0; i < dataObjet.listProduit.length; i++)
            {


                for (var j = 0; j < data.length; j++)

                {

                    if (dataObjet.listProduit[i].idProduit == data[j].idProduit)
                    {

                        var title = data[j].title;

                        break;
                    }

                }


                if (i % 2 == 0)
                {
                    ligneClass = "<tr class='default'><td>";
                } else
                {
                    ligneClass = "<tr class='danger'><td>";
                }
                chaine += ligneClass + dataObjet.listProduit[i].idProduit + "</td><td>" + title + "</td><td>" + dataObjet.listProduit[i].dateAjout + "</td></tr>";

            }
            if (chaine != "")
                $("#idProduitClientAfficher").html(chaine);



        });
    }

    function intialiserTableau()
    {
        var chaine = "";
        $("#idAdressesAfficher").html(chaine);
        $("#idTelephoneAfficher").html(chaine);
        $("#idEmailAfficher").html(chaine);
        $("#idAppelAfficher").html(chaine);
        $("#idProduitClientAfficher").html(chaine);

    }
</script>