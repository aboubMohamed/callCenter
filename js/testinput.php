<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <script src="jquery.maskedinput.min.js" type="text/javascript"></script>
        <script src="jquery.inputmask.numeric.js" type="text/javascript"></script>
        <title></title>
        <script>
        $(document).ready(function(){
            $("#idPhone").inputmask("mask:999-999-9999");
        });
    </script>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <input id="idPhone" >
    </body>
</html>
