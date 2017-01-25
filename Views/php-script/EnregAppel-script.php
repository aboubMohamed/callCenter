<script type="text/javascript">
    function chargerCategories(data) {
        var cboCategories = document.getElementById("target");

        cboCategories.options.length = data.length;
        for (var i = 0; i < data.length; i++)
        {

            cboCategories.options[i].text = data[i].name;
            cboCategories.options[i].value = data[i].idCategorie;
        }



    }


    $(document).ready(function () {

        $.post("../Controllers/getCategories.php", {}, function (data, status) {
            chargerCategories(data);

        });

        $("#target").selectmenu();
        $("#target option:first").attr('selected', 'selected');
        $("#idEnvoyerNote").click(function () {
            var idUser = $('#idUser').val();
            var idClient = $('#idClientInput').val();
            var idCategorie = $('#target').val();
            var note = $('#idNote').val();
            var reponse = $('#idReponse').val();
            $.post("../Controllers/EnregAppel.php", {idUser: idUser, idClient: idClient, note: note, reponse: reponse, idCategorie: idCategorie}, function (data, status) {
                if (data == 1)
                {
                    AlertMessage("ENREGISTREMENT RÉUSSI DE LA NOTE");
                    informationsClient();
                    var note = $('#idNote').val("");
                    var reponse = $('#idReponse').val("");
                } else
                    AlertMessage("ÉCHEC D'ENREGISTREMENT ");

            });


        });
    });


</script> 
