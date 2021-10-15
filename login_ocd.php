<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>logiciel innovant</title>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	  
	<style>
	body{
        padding-top:4.2rem;
		padding-bottom:4.2rem;
		background:rgba(0, 0, 0, 0.76);
        }
        a{
         text-decoration:none !important;
         }
         h1,h2,h3{
         font-family: 'Kaushan Script', cursive;
         }
          .myform{
		position: relative;
		display: -ms-flexbox;
		display: flex;
		padding: 1rem;
		-ms-flex-direction: column;
		flex-direction: column;
		width: 100%;
		pointer-events: auto;
		background-color: #fff;
		background-clip: padding-box;
		border: 1px solid rgba(0,0,0,.2);
		border-radius: 1.1rem;
		outline: 0;
		max-width: 500px;
		 }
         .tx-tfm{
         text-transform:uppercase;
         }
         .mybtn{
         border-radius:50px;
         }
        
         .login-or {
         position: relative;
         color: #aaa;
         margin-top: 10px;
         margin-bottom: 10px;
         padding-top: 10px;
         padding-bottom: 10px;
         }
         .span-or {
         display: block;
         position: absolute;
         left: 50%;
         top: -2px;
         margin-left: -25px;
         background-color: #fff;
         width: 50px;
         text-align: center;
         }
         .hr-or {
         height: 1px;
         margin-top: 0px !important;
         margin-bottom: 0px !important;
         }
         .google {
         color:#666;
         width:100%;
         height:40px;
         text-align:center;
         outline:none;
         border: 1px solid lightgrey;
         }
          form .error {
         color: #ff0000;
         }
         #second{display:none;}
		 label {text-transform:uppercase;}
		 #sub{height:50px;background:#0769BA;width:350px;border:2px solid #0769BA;color:white;border-radius:10px;cursor:pointer;} .text{size:11px;text-align:center;}
	</style>
</head>
<body>
    <div class="container">
        <div class="row">
			<div class="col-md-5 mx-auto">
			<div id="first">
				<div class="myform form ">
					 <div class="logo mb-3">
						 <div class="col-md-12 text-center">
							<div><img src="image/logo.jpg" width="180px" height="100px"></div>
						 </div>
					</div>
                   <form action="" id="form1" method="post" name="login">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Entrez votre EMAIL</label>
                              <input type="email" name="email_ocd"  class="form-control" id="email_ocd" aria-describedby="emailHelp" placeholder="e-mail">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Votre Mot de pass</label>
                              <input type="password" name="id_ocd" id="id_ocd"  class="form-control" aria-describedby="emailHelp" placeholder="Password"><br/><span class="error"></span>
                           </div>
                         
                           <div class="col-md-12 text-center ">
                              <button type="submit" id="sub" class="tx-tfm">Connectez vous</button><br/><span class="error"></span>
                           </div>
                           <div class="col-md-12 ">
                              <div class="login-or">
                                 <hr class="hr-or">
                                 <span class="span-or">or</span>
                              </div>
                           </div>
                           <div class="form-group">
                              <p class="text-center">Acccès oubliés? <a href="#" id="signup">Recupérer ces accès !</a><br/>Contactez nous ici</p>
                           </div>
						   <div class="form-group">
                              <p class="text">Optimisation de comptabilité à distance,<br/> Tous droits  réservés  2021-2022</p>
                           </div>
						   
                        </form>
                 
				</div>
			</div>
			  
                        </form>
                     </div>
			</div>
		</div>
      </div>  

  <div id="ass" style="color:red;position:absolute;top:580px;left:68%;"></div>
    <div id="as" style="color:red;position:absolute;top:580px;left:68%;"></div>
	<div id="av"></div>
    <div id="visuel"></div>	  
         
</body>

<script type="text/javascript">
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
  $('#as').append('<div class="cir" style="position:absolute;width:300px;"> Entrer vos identifiants OCD !</div>');
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
