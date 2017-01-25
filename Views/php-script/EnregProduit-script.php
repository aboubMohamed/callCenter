<script type="text/javascript">
    $(document).ready(function () {

        $.post("../Controllers/getProduits.php", {}, function (data, status) {
            reste = data.length;

            chaine = "";
            for (var i = 0; i < data.length; )
            {


                chaine += "<div class='row'>";
                if (reste > 3)
                    maxDiv = 3;
                else
                    maxDiv = reste;
                for (var j = 0; j < maxDiv; j++, i++)
                {

                    chaine += "<div class='col-sm-6 col-md-4'><div class='thumbnail'>";
                    chaine += "<div class='caption'><h4><b> " + data[i].title + "</b></h4>";
                    chaine += "<h1>" + data[i].prix + "$</h1>";
                    chaine += "<p>" + data[i].description + "</p>";
                    chaine += "<button  class='btn btn-danger clAjouter' value=" + data[i].idProduit + ">Ajouter le produit</button>";
                    chaine += "</div></div></div>";

                }

                chaine += "</div>";
                reste = data.length - i;

            }

            $("#idProduitView").html(chaine);
            $(".clAjouter").click(function () {

                var idProduit = $(this).val();

                var idClient = $('#idClientInput').val();
                $.post("../Controllers/EnregProduitClient.php", {idProduit: idProduit, idClient: idClient}, function (data, status) {
                    if (data == 0) {

                        AlertMessage("PRODUIT EXISTE DANS LA LISTE DU CLIENT");
                    } else {
                        AlertMessage("LE PRODUIT à ÉTÉ AJOUTER A LA LISTE DU CLIENT");
                        informationsClient();

                    }


                });
            });
        });
    });



</script> 