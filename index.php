 <!--
Projet : Centre Appels
version 1.0.0
Client :  Bell canada
Généré le :  Mer 21 Décembre 2016 
Developpeurs : Mohamed Bouaboub developpeur web
               Krasimir Ivanov  d/veloppeur web
 -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>VisionTelecom</title>
        <link rel="icon" href="images/favicon.png" type="image/x-icon">
   
        <?php require_once 'include/enteteIndex.php'; ?>
        <script type="text/javascript">
        
       $.post("Controllers/getEntrepriseInfo.php",{},function(data,status){
           
           $("#idContentModal").html(data.name);
           $("#idContentModalSuivant").html("<br>"+data.number+", "+data.street+
                   "<br>"+data.city+", "+data.postalCode+" "+data.province+"<br>"+data.telephone+"<br>"+data.email);
           
       });
       
        </script>
       
        <style>
body  {
    background-image: url("images/building5.jpg");
    background-repeat:no-repeat;
    background-size:cover;
    width: 100%;
    hight: 100%
   
}

	.panel-body{
				background-color:#f6fcf4;
			}
			#idLoginPage{
				margin: auto;
				margin-top: 10%;
				width:30%;
                                box-shadow: 3px 3px 3px #333;
                                border-radius: 10px;
				}
                                div>img{
                                    margin-left: 19%;
                                   
                                    width: 60%;
                                    
                                }      
			#username{
				margin-bottom:6%;
				background-color:#ffffff;
			}
			#idSubmit{
				background-color:rgb(0, 102, 204);
				margin-bottom:6%;
				font-family:Verdana;
				
			}
			
			
			ul {
				list-style-type: none;
				margin: 0;
				padding: 0;
				overflow: hidden;
				background-color: #333;
				position: fixed;
				bottom: 0;
				width: 100%;
			}
			li {
				float: left;
				display: inline;
			}
			ul li a {
			display: block;
				color: white;
				text-align: center;
				padding: 14px 20px;
				text-decoration: none;
			}
</style>
           </head>
           <script type="text/javascript">

               $(document).ready(function () {

                    $("#idSubmit").click(function () {

                        var usernameVal = $("#username").val();
                        var passwordVal = $("#password").val();
                         alert(usernameVal);
                           if((usernameVal.trim() == "") || (passwordVal.trim() == ""))
                         {
                        $("#idAlert").html("<span class='glyphicon glyphicon-remove-circle' aria-hidden='true'></span>&nbsp;Veuillez corriger le ou les champs indiqués ci-dessous.");$("#idAlert").show();
                        return;
                         }
                        $.post("Controllers/validationLogin.php", {username: usernameVal, password: passwordVal},
                                function (data, status)
                                {

                                    switch(data)
                                    {
                                        case  1 : location.href = "Views/AccueilClient.php";break;
                                        case -1 : $("#idAlert").html("<span class='glyphicon glyphicon-remove-circle' aria-hidden='true'></span>&nbsp;Une ou plusieurs erreurs ont été détectées. Veuillez corriger les champs indiqués ci-dessous.");$("#idAlert").show();break;

                                    }

                                });
                    });
                });

           </script>
    <body>
       
        <style type="text/css">
            
.btn-learn {
 color: #ffffff;
 background-color: #823BD0;
 border-color: #70489C;
}    
            
            
        </style>       
        

    	<div id="idLoginPage" >
			<div id="idAlert" class="alert alert-dismissible" role="alert" style="background-color: darkred;color:white;position:absolute;top:80px;display: none;z-index: 1; width: 80%;right: 10%;font-size: 15px;">
				
			</div>
			<div class="panel panel-default" style="opacity:0.8;">
                            <img src="images/logo.png" alt="logo">
				<div class="panel-body">
					
					<input type="text" class="form-control "  id="username" name="username" placeholder="Nom d'utilisateur" aria-describedby="sizing-addon2" required>
					<input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" aria-describedby="sizing-addon2" required>
					<br>
					<input type="submit"  class="btn btn-learn"  id="idSubmit" value="S'identifier" style="width:100%; font-weight: bold;">
				</div>
			</div>
		</div>
        <div class="navbar-fixed-bottom navbar-inverse" >

                <ul class="nav navbar-nav">


                    <li><a ><span class="glyphicon glyphicon-home">Centre d'appel visionTelecom&nbsp;©&nbsp;2016</span></a></li>
                    <li><a href="" data-toggle="modal" data-target="#myModal">
                            <span class="" >&nbsp;Nous joindre</span>

                        </a></li>
                   
                </ul>


            </div>

<div> 
               
<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nous joindre</h4>
        </div>
        <div class="modal-body">
            <iframe width="96%" style="margin-left: 2%;" height="275" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
                        src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=fr&amp;geocode=&amp;q=1001+Boulevard+Robert-Bourassa,+Montr%C3%A9al,+QC+H3B+4L5,+Canada&amp;aq=&amp;sll=45.502256,-73.590889&amp;sspn=0.092883,0.172863&amp;ie=UTF8&amp;hq=&amp;hnear=1001+Boulevard+Robert-Bourassa,+Montr%C3%A9al,+Qu%C3%A9bec+H3B+4L5,+Canada&amp;t=m&amp;ll=45.502136,-73.563938&amp;spn=0.021055,0.036478&amp;z=14&amp;iwloc=near&amp;output=embed">

                </iframe>

          <h3 id="idContentModal"></h3>
          <h4 id="idContentModalSuivant"></h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-donate" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>
</div>
    </body>
</html>
