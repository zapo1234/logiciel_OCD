<?php
if(!isset($_GET['user_data'])){
 header('location:index.php');
}
?>
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
		 #sub{height:50px;background:#057ABD;width:350px;border:2px solid #0769BA;color:white;border-radius:10px;cursor:pointer;} .text{size:11px;text-align:center;}
			 #as,#ass{position:absolute;color:red;top:300px;z-index:3;left:25%;width:300px;}
			.contact{color:#CE6C0A;font-weight:bold;}
			.dnn{width:300px;margin-left:3%;margin-top:5px;margin-bottom:10px;color:red;font-size:16px;}
			 
	   @media (max-width: 575.98px) { 
	   #sub{height:50px;background:#0769BA;width:250px;border:2px solid #0769BA;color:white;border-radius:10px;cursor:pointer;} 
	   .myform{margin-top:-30px;}  
	   }
	   
	   @media (min-width: 768px) and (max-width: 991px) {
		 .myform{width:400px;margin-left:-15%;}  
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
                   <form action=""  method="post" id="user_admin" >
                           <div class="form-group">
                              <label for="exampleInputEmail1">Entrez nouveau mot de pass </label>
                              <input type="password" name="pass1"  class="form-control" id="pass1" aria-describedby="emailHelp" placeholder="Nouveau mot de pass" required><br/><span class="pass"></span>
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Confirmez le mot de pass</label>
                              <input type="password" name="pass2" id="pass2"  class="form-control" aria-describedby="emailHelp" placeholder="" required><br/><span class="pass1"></span><!--retour ajax-->
                           </div>
                            
                           <div class="col-md-12 text-center ">
                              <button  type="button" id="sub" class="button">
							valider
						</button>					
						<div id="result"></div><!--resutat ajax de la requete-->
                           <div class="col-md-12 ">
                              <div class="login-or"><br/>
                                 <hr class="hr-or">
                                
                              </div>
                           </div>
                           <div class="form-group">
                              
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
      
   <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
<script src="@@path/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <?php include('inc_foot_scriptjs.php');?>
  <script type="text/javascript">
  $(document).ready(function(){
	$('#sub').click(function(){
 var pass1= $('#pass1').val();
 var pass2=$('#pass2').val();
 var pass = /^(?=.*\d)(?=.*[A-Za-z])(?=.*[!@#$%])[0-9A-Za-z!@#$%]{8,12}$/;
     
	 if(pass1.length=="") {
		$('.pass').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> Entrer un mot de pass');
	 }
	 
	 else if(!pass.test(pass1)){
      $('.pass').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> le mot de pass doit contenir une lettre majuscule et miniscule,<br/>un chiffre et un caractère sépcial(!$@#)<br/> et doit etre entre de 8 et 12 caractères');
    }
	
	else if(pass1!=pass2){
		$('.pass1').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>vos mots de pass ne sont pas identiques');
	}
	
	else{
	$.ajax({
	type:'POST', // on envoi les donnes
	url:"reset_password_change.php?user_data=<?php echo$_GET['user_data'];?>",// on traite par la fichier
	success:function(data) { // on traite le fichier recherche apres le retour
     $('#result').html(data);
	}
	});
    	
	}
	});
  });
   </script>  
  </body>
</html>
