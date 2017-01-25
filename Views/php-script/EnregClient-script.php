<script type="text/javascript">
    function chargerProvinces(data) {
        var cboProvinces = document.getElementById("idSelectProvinces");
        cboProvinces.options.length = data.length;

        for (var i = 0; i < data.length; i++)
        {

            cboProvinces.options[i].text = data[i].name;
            cboProvinces.options[i].value = data[i].idProvince;
        }
    }
    
function validateAdresse(numero,rue,app,ville, province,postalCode)
            {
          
            if(isNaN(numero) ||  numero <= 0) 
            {
            AlertMessage("LE NUMERO N'EST PAS VALIDE");
            return false;
            }
          
            if(typeof rue !="string" ) {AlertMessage("LE CHAMP RUE N'EST PAS VALIDE");return false;} 
            if(typeof app !="string" && app.trim() !="") {AlertMessage("LE CHAMP APPARTEMENT N'EST PAS VALIDE");return false;} 
            if(typeof ville !="string" ) {AlertMessage("LE CHAMP VILLE N'EST PAS VALIDE");return false;}
            if(typeof province !="string" ) {AlertMessage("LE CHAMP PROVINCE N'EST PAS VALIDE");return false;} 
          
        if (postalCode.length < 6 && postalCode.length > 7) // la longeur de code postal 
            {
                 AlertMessage("CODE POSTAL NON VALIDE");
                 return false;
            }
            if(postalCode.length == 7)
            {
                var tabPostalCode = postalCode.trim().split(" ");
                 if((tabPostalCode[0].length != 3 || tabPostalCode[0].length != 3) || tabPostalCode.length !=2 )
           {
               AlertMessage("CODE POSTAL NON VALIDE");
               return false;
           
            }
            var chaine =  tabPostalCode[0]+tabPostalCode[1];
            }else{
                var chaine = postalCode; 
            }
                
          
                    
              for (i=0; i<chaine.length;i=i+2)  
              {
              if ((chaine.toUpperCase().charCodeAt(i)<65 ) || (chaine.toUpperCase().charCodeAt(i)>90))
              {
             AlertMessage("CODE POSTAL NON VALIDE");
             return false;
              
              }
              if ((chaine.charCodeAt(i+1)<48 ) || ( chaine.charCodeAt(i+1)>57))
              {
             AlertMessage("CODE POSTAL NON VALIDE");
             return false;
              
              }
              
              }
             }

    $(document).ready(function ()
    {

        $("#idNouveauClient").click(function () {
            $("#idLastname").prop('disabled', false);
            $("#idFirstname").prop('disabled', false);
            $("#idAjouterAdresse").hide();
            $("#idAjouterPhone").hide();
            $("#idAjouterEmail").hide();
            $("#idSubmitClient").show();
            $("#idNouveauClient").hide();
            $('#idNumero').val(0);
            $('#idRue').val("");
            $('#idAppartement').val("");
            $('#idVille').val("");
            $('#idSelectProvinces').val("");
            $('#idPostalCode').val("")
            $('#idPhone').val("");
            $('#idEmail').val("");
            $('#idLastname').val("");
            $('#idFirstname').val("");
            $("#page-wrapper").hide();
            $("#idProduitView").hide();
            $("#idAppelView").hide();
            $("#idMiseAjourView").hide();
            $("#idCompte").html("");
            $("#idNomEtprenom").html("");


        });

        $.post("../Controllers/getProvinces.php", {}, function (data, status) {
            chargerProvinces(data);

        });

        $("#idSubmitClient").click(function ()
        {

            var lastname = $('#idLastname').val();
            var firstname = $("#idFirstname").val();
            if (lastname.trim() == "" || firstname.trim() == "")
            {
                AlertMessage("VEUILLEZ REMPLIR LE OU LES CHAMPS");

                return;

            }

            var numero = $('#idNumero').val();
            var rue = $('#idRue').val();
            var app = $('#idAppartement').val();
            var ville = $('#idVille').val();
            var province = $('#idSelectProvinces').val();
            var country = "Canada";
            var postalCode = $('#idPostalCode').val();
            var telephone = $('#idPhone').val();
            var email = $('#idEmail').val();
            if(validateAdresse(numero,rue,app,ville, province,postalCode) ==false) return;
            
          if (ConformerTelephone(telephone) == false) return;

            $.post("../Controllers/EnregClient.php", {firstname: firstname, lastname: lastname,
                numero: numero, rue: rue, app: app, ville: ville,
                province: province, postalCode: postalCode, telephone: telephone,
                email: email, country: country},
                    function (data, status)
                    {

                      if (data.client == 0) {

                            AlertMessage("ÉCHEC D'ENREGISTREMENT");
                        } else
                        {
                            AlertMessage("ENREGISTREMENT RÉUSSI");
                            $("#idLastname").prop('disabled', true);
                            $("#idFirstname").prop('disabled', true);
                            $("#idAjouterAdresse").show();
                            $("#idAjouterPhone").show();
                            $("#idAjouterEmail").show();
                            $("#idSubmitClient").hide();
                            $("#idNouveauClient").show();
                            $('#idNumero').val(0);
                            $('#idRue').val("");
                            $('#idAppartement').val("");
                            $('#idVille').val("");
                            $('#idSelectProvinces').val("");
                            $('#idPostalCode').val("")
                            $('#idPhone').val("");
                            $('#idEmail').val("");
                            $("#idCompte").html(data["idClient"]);
                            $("#idNomEtprenom").html(firstname + " " + lastname);
                            $("#idClientInput").val(data["idClient"]);
                            $("#idProduitView").show();
                            $("#page-wrapper").show();
                            $("#idAppelView").show();
                            $("#idMiseAjourView").show();
                            informationsClient();
                            $("#idChampObligatoire").html("");
                            $("exp").html("");
                            if (data.adresse == 0)
                                AlertMessage("ÉCHEC D'ENREGISTREMENT DE L'ADRESSE");

                            if (data.email == 0)
                                AlertMessage("ÉCHEC D'ENREGISTREMEN DE EMAIL");

                            if (data.telephone == 0)
                                AlertMessage("ÉCHEC D'ENREGISTEMENT DE TÉLÉPHONE");


                        }
                    });

        });

        $('#idAjouterAdresse').click(function () {
            var idClient = $('#idClientInput').val();
            var numero = $('#idNumero').val();
            var rue = $('#idRue').val();
            var app = $('#idAppartement').val();
            var ville = $('#idVille').val();
            var province = $('#idSelectProvinces').val();
            var country = "Canada";  //$('#idCountry').val();
            var postalCode = $('#idPostalCode').val();

            if (numero == 0 || rue == "" || ville == "" || province == "" || postalCode == "")
            {
                AlertMessage("UN CHAMP OBLIGATOIR EST VIDE");
                return;
            }
            if(validateAdresse(numero,rue,app,ville, province,postalCode) ==false) return;
            $.post("../Controllers/EnregAdresse.php", {
                idClient: idClient, numero: numero, rue: rue, app: app, ville: ville,
                province: province, postalCode: postalCode, country: country},
                    function (data, status)
                    {
                        if (data == 1) {
                            AlertMessage("ENREGISTREMENT RÉUSSI");
                            $('#idNumero').val(0);
                            $('#idRue').val("");
                            $('#idAppartement').val("");
                            $('#idVille').val("");
                            $('#idSelectProvinces').val("");
                            $('#idPostalCode').val("");
                        } else
                            AlertMessage("ÉCHEC ENREGISTREMENT");

                    });
        });

        $('#idAjouterPhone').click(function ()
        {


            var idClient = $('#idClientInput').val();
            var contenue = $('#idPhone').val();

            var type = 1;
            if (contenue == "")
            {
                AlertMessage("LE CHAMP EST VIDE");
                return;
            }
            if (ConformerTelephone(contenue) == false)
                return;
            $.post("../Controllers/EnregContactInfo.php", {contenue: contenue, idClient: idClient, type: type}, function (data, status)
            {

                if (data.contenue == 1) {
                    $('#idPhone').val('');
                    AlertMessage("ENREGISTREMENT RÉUSSI DE TÉLÉPHONE");

                } else
                    AlertMessage("ÉCHEC D'ENREGISTREMENT");


            });
        });
        $('#idAjouterEmail').click(function ()
        {

            var idClient = $('#idClientInput').val();
            var contenue = $('#idEmail').val();
            var type = 2;
            if (contenue.trim() == "") {
                AlertMessage("VEUILLEZ REMPLIR LE CHAMP");
                return;
            }

            $.post("../Controllers/EnregContactInfo.php", {contenue: contenue, idClient: idClient, type: type}, function (data, status)
            {
                if (data.contenue == 1) {

                    $('#idEmail').val("");
                    AlertMessage("EREGISTREMENT RÉUSSI");

                } else
                {

                    AlertMessage("ÉCHEC D'ENREGISTREMENT VERIFIER VOS DONNÉES");

                }

            });
        });

    });



</script>