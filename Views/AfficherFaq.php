<?php
if (!isset($_SESSION['idUser'])) {
    // pour protéger l'accée à la page par l'url.
    header('Location: ../index.php');
}
?> 
<?php
require_once 'php-script/AfficherFaq-script.php';
?>
<style type="text/css">
    button.accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    button.accordion.active, button.accordion:hover{
        background-color: #333;
        color: ghostwhite;

    }

    button.accordion:after {
        content: '\02795';
        font-size: 13px;
        color: #777;
        float: right;
        margin-left: 5px;
    }

    button.accordion.active:after {
        content: "\2796";
    }


    div.panel1 {
        padding: 0 18px;
        background-color: white;
        /*display:none;*/
    }

    /* The "show" class is added to the accordion panel when the user clicks on one of the buttons. This will show the panel content */
    div.panel1 {
        /*display: block;*/
    }
    p.myClass{
        display: block;
    }

</style>


<div id="idAfficheFaq">

</div>

