<script type="text/javascript">
    $(document).ready(function () {

        $.post("../Controllers/getFaqList.php", {}, function (data, status) {
            dataFaqs = data;

            $.post("../Controllers/getCategories.php", {}, function (data, status) {

                chaine = "";
                indexAccordion = 0;

                for (var i = 0; i < data.length; i++)
                {

                    chaine += "<div class='row'>";
                    chaine += "<div class='col-sm-6 col-md-6'>";
                    chaine += "<div class = 'panel panel-primary'>";
                    chaine += "<div class = 'panel-heading'>";
                    chaine += "<h3 class = 'panel-title'>";
                    chaine += data[i].name + "</h3></div><div class = 'panel-body'>";

                    //chaine +="Panel content";
                    chaineAccordion = "";

                    for (j = 0; j < dataFaqs.length; j++)
                    {
                        if (data[i].idCategorie === dataFaqs[j].idCategorie)
                        {
                            chaineAccordion += "<button class='accordion'>" + dataFaqs[j].question + "</button>";
                            chaineAccordion += "<div class='panel1'>";
                            chaineAccordion += "<p class='toggle'>" + dataFaqs[j].reponse + "</p></div>";
                        }
                    }
                    chaineAccordion += "</div></div>";
                    chaine += chaineAccordion;
                    chaine += "</div></div";


                }

                $("#idAfficheFaq").append(chaine);
                //$("p.toggle1").hide();   
                //$("p.toggle:first").show();  
            });

        });


        var acc = document.getElementsByClassName("accordion");
        for (var i = 0; i < acc.length; i++) {
            acc[i].onclick = function () {
                this.classList.toggle("active");

                $(this).next(".toggle").slideToggle("slow");
                this.nextElementSibling.classList.toggle("show");
                $(".toggle").slideToggle("slow");
            }
        }
    });



</script>       




