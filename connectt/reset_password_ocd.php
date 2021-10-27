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
		height:350px;
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
		 #sub{height:50px;background:#057ABD;width:350px;border:2px solid #0769BA;color:white;border-radius:10px;cursor:pointer;margin-bottom:20px;margin-top:20px;} .text{size:11px;text-align:center;}
			 .myform{height:420px;} 
			 .h{text-align:center;font-size:20px;margin-bottom:15px;}	   
			 #as,#ass{position:absolute;color:red;top:300px;z-index:3;left:25%;width:300px;}
			.contact{color:#CE6C0A;font-weight:bold;}
			 
	   @media (max-width: 575.98px) { 
	   #sub{height:50px;background:#0769BA;width:250px;border:2px solid #0769BA;color:white;border-radius:10px;cursor:pointer;margin-top:10px;}
        .myform{height:420px;} .h{text-align:center;font-size:20px;margin-bottom:15px;}	   
	   }
	   
	   @media (min-width: 768px) and (max-width: 991px) {
		 .myform{width:400px;margin-left:-15%;} 
        .myform{height:420px;} 
			 .h{text-align:center;font-size:20px;margin-bottom:15px;}	   
			 
	   }
	   
	   @media (min-width: 992px) and (max-width: 1200px) {
		   
		   #sub{height:50px;background:#0769BA;width:300px;border:2px solid #0769BA;color:white;border-radius:10px;cursor:pointer;} 
	   }
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
                   <form action="" id="form1" method="post" id="user_admin" >
                        <div class="h">Récupérez vos accès</div>   
						   <div class="form-group">
                              <label for="exampleInputEmail1">Entrez votre EMAIL</label>
                              <input type="email" name="email_ocd"  class="form-control" id="email_ocd" aria-describedby="emailHelp" placeholder="e-mail">
                           </div>
                           
						   <div class="col-md-12 text-center ">
                              <button class="login100-form-btn" id="sub" onKeyPress="if(event.keyCode == 13)envoi()">
							Envoyer
						</button>
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
    <div id="as"></div>
	<div id="av"></div>  
         
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
 if(email_ocd!="" || id_ocd!=""){
 $.ajax({
	type:'POST', // on envoi les donnes
	url:'login_connecte.php',// on traite par la fichier
	data:{email_ocd:email_ocd,id_ocd:id_ocd},
	async:true,
	success:function(data) { // on traite le fichier recherche apres le retour
		$('#ass').html(data);
	 },
	 error: function() {
    $('#ass').text('verifiez la connexion internet'); }
	 
	});
 }
 
 else {
  $('#as').text(' Entrer vos identifiants OCD !');
  $('#email_ocd').css('borderColor','red');
  $('#id_ocd').css('borderColor','red');
  
}
 });
});


});
		
	</script>
