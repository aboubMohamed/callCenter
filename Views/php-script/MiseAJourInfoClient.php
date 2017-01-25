<script type="text/javascript">
    function chargerProvincesMajour(data) {
        var cboProvinces = document.getElementById("idSelectProvincesMajour");
        cboProvinces.options.length = data.length;

        for (var i = 0; i < data.length; i++)
        {

            cboProvinces.options[i].text = data[i].name;
            cboProvinces.options[i].value = data[i].idProvince;
        }



    }

    function testExpresion(chaine) // "^[a-zA-Z]{1}[0-9]{1}[a-zA-Z]{1}(\-| |){1}[0-9]{1}[a-zA-Z]{1}[0-9]{1}$"
    {

        var str = chaine;
        var patt = new RegExp(/^[A-Za-z][0-9][A-Za-z]\-[0-9][A-Za-z][0-9]$/);
        var res = patt.test(str);
        return res;
    }

    $(document).ready(function ()
    {

        $.post("../Controllers/getProvinces.php", {}, function (data, status) {
            chargerProvincesMajour(data);

        });

        $('#idAjouterAdresseMajour').click(function () {

            var numero = $('#idNumeroMajour').val();
            var rue = $('#idRueMajour').val();
            var app = $('#idAppartementMajour').val();
            var ville = $('#idVilleMajour').val();
            var province = $('#idSelectProvincesMajour').val();
            var country = "Canada";  //$('#idCountry').val();
            var postalCode = $('#idPostalCodeMajour').val();
            var idClient = $('#idClientInput').val();
           if(validateAdresse(numero,rue,app,ville, province,postalCode)==false) return;
            $.post("../Controllers/EnregAdresse.php", {
                idClient: idClient, numero: numero, rue: rue, app: app, ville: ville,
                province: province, postalCode: postalCode, country: country},
                    function (data, status)
                    {
                        if (data == 1) {
                            AlertMessage("ENREGISTREMENT RÉUSSI");
                            $('#idNumeroMajour').val(0);
                            $('#idRueMajour').val("");
                            $('#idAppartementMajour').val("");
                            $('#idVilleMajour').val("");
                            $('#idSelectProvincesMajour').val("");
                            $('#idPostalCodeMajour').val("");
                        } else
                            AlertMessage("ÉCHEC D'ENREGISTREMENT, VERIFIER VOS DONNÉES");
                    });
            informationsClient();
        });



        $('#idAjouterPhoneMajour').click(function ()
        {

            var idClient = $('#idClientInput').val();
            var contenue = $('#idPhoneMajour').val();
            var type = 1;

            if (contenue.trim() == "") {
                AlertMessage("Le champ est vide");
                return;
            }
            if (ConformerTelephone(contenue) == false) // TEST SI LE NUMERO EST CONFORME 999-999-9999
                return;
            $.post("../Controllers/EnregContactInfo.php", {contenue: contenue, idClient: idClient, type: type}, function (data, status)
            {

                if (data.contenue == 1) {
                    $('#idPhoneMajour').val('');
                    AlertMessage("ENREGISTREMENT RÉUSSI");
                } else
                    AlertMessage("ÉCHEC D'ENREGISTREMENT, VERIFIER VOS DONNÉES");

            });
            informationsClient();
        });

        $('#idAjouterEmailMajour').click(function ()
        {

            var idClient = $('#idClientInput').val();
            var contenue = $('#idEmailMajour').val();
            var type = 2;
            if (contenue.trim() == "") {
                AlertMessage("Le champ est vide");
                return;
            }
            $.post("../Controllers/EnregContactInfo.php", {contenue: contenue, idClient: idClient, type: type}, function (data, status)
            {
                if (data.contenue == 1) {
                    $('#idEmailMajour').val("");
                    AlertMessage("ENREGISTREMENT RÉUSSI");
                } else
                {
                    AlertMessage("ÉCHEC D'ENREGISTREMENT, VERIFIER VOS DONNÉES");
                }

            });
            informationsClient();
        });

    });


</script> 