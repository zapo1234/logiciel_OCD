<!DOCTYPE html>
<html lang="en">
<head>
	<title>Optimisation de comptabilité à distance</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		
		
		
		<div class="container-login100">
			<div class="container-login10">
		
		<div class="h1" style="width:700px;margin-left:-52%;color:white;font-size:26px;margin-top:50px;font-family:arial;">Responsable d'hôtels,d'appartements meublées privés<br/>Gagnez énormement de temps et gérez efficacement </div>
		<h1 style="position:absolute;left:2%;top:300px;font-size:35px;color:white;">Simplifier en quelques clic la gestion de <br/>votre activité en temps réel et à distance.</h1>
		
		</div>
			
			<div class="wrap-login100">
				
                 <div style="position:absolute;top:120px;left:69%;"><img id="img_logo" src="img/ocd.jpg" alt="ocd" width="200px" height="80px"></div>
				<form class="login100-form validate-form" id="user_admin" method="post" action="" autocomplete="off">
					<span class="login100-form-title">
						Espace utilisateurs
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email_ocd" id="email_ocd" placeholder="Votre Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="id_ocd" id="id_ocd" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" id="sub" onKeyPress="if(event.keyCode == 13)envoi()">
							Connectez vous
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Accès oubliés
						</span>
						<a class="txt2" href="acces_ocd_forgotten.php">
							 mot de pass oublié ?
						</a>
					</div>
                    </form>
					<div class=" p-t-136">
						
				  <h2 style="font-size:13px;width:150%;margin-left:-8%;">Optimisation de comptabilité à distance tous droits réservés 2021-2022.</h2>
				</div>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	
	<div id="ass"></div>
    <div id="as"></div>
    <div id="visuel"></div>
	
	<script >
 $(document).ready(function() {

function envoi(){
$(document).getElementById('user_admin').submit();
}

$(function() {
$(document).on('click','#sub',function() {
	
// on envoi le formulaire

// on recupere les deux variale
var email_ocd =$('#email_ocd').val();
var id_ocd =$('#id_ocd').val();
// on defini des varaible
if(email_ocd!="" && id_ocd!=""){
 $.ajax({
	type:'POST', // on envoi les donnes
	url:'login_connecte.php',// on traite par la fichier
	data:{email_ocd:email_ocd,id_ocd:id_ocd},
	async:true,
	success:function(data) { // on traite le fichier recherche apres le retour
		$('#ass').html(data);
		$('#as').css('display','none');
	 },
	 error: function() {
    alert('pas de connexion'); }
	 
	});
 }
 
 else {
  $('#as').append('<div class="cir"> Entrer vos identifiants OCD !</div>');
  $('#email_ocd').css('borderColor','red');
  $('#id_ocd').css('borderColor','red');
  
}
 });
});


$('.his2').click(function() {
$('#top_corps').fadeIn(1000);
$('#visuel').fadeIn(500);
});
$('.visa').click(function() {
$('#top_corps').hide();
$('.dnn').hide();
$('#visuel').css('display','none');	
});

});
		
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>