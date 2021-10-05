<?php
include('connecte_db.php');
include('inc_session.php');

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

    <!-- Custom fonts for this template-->
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
     .s{display:none;}
	 h1,select{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:18px;margin-left:8%;color:black}
    #collapse{width:300px;height:100px;padding:2%;position:fixed;top:60px;left:81%;border-shadow:3px 3px 3px black;}
    .bg{border:;background:white;width:340px;height:500px;padding:4%;margin-top:0px;}
    .bs{width:340px;height:300px;}
    .en{height:50px;border-bottom:1px solid #eee;} .h1{font-size:24px; text-align:center;} .encaiss{font-size:16px;font-weight:none;} .h2{margin-top:70px;margin-left:10%;} .t_monts,.t_mont,.t_mon{font-size:18px;margin-left:-20px;}
	#montant td{font-weight:none;} .butt{height:35px;border-radius:15px;padding:1.5%;width:180px;font-weight:200;background:#F026FA;color:white;font-size:20px;border:2px solid #F026FA;}
	.t_monts{color:#42FC72;} .t_mont{color:#FA2367;} .t_mon{color:#14B5FA;}
.center{background-color:#eee;width:80%;height:1050px;padding:1.5%;margin-top:5px;} .inputs,.input{margin-left:5%;float:left;}
.nav-search{width:70%;} .form-select{margin-left:40%;width:200px;height:43px;}
.inputs{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;font-weight:bold;color:green;}
#pak{position: fixed;top: 0;left: 0;width:100%;height: 100%;background-color: black;z-index:2;opacity: 0.8;}
#examp{border:2px solid #eee;padding:3%;position:absolute;width:40%;height:1000px;z-index:3;left:28%;top:20px;background-color:white;border-radius:10px;}
.forms{width:200px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;font-weight:bold;color:black}
h2,h1{width:500px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;text-transform:uppercase;color:black;border-bottom:1px solid #eee;margin-bottom:15px;}
label {color:black;} .buttons{margin-left:55%;margin-top:20px;width:250px;height:40px;color:white;
background:#ACD6EA;border-radius:15px;text-transform:capitalize;border:2px solid #ACD6EA;position:fixed;left:10%;top:200px;z-index:5}
.form1,.form2{display:none;}

.content1{display:none;color:black;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";}
.h3{padding-bottom:5px;font-size:20px;font-weight:bold;color:#4e73df;text-transform:uppercase;border-bottom:2px solid #ACD6EA;}
.h5{text-align:center;font-size:11px;font-weight:bold;color:green;padding:2%;width:180px;height:35px;}
.h6{color:red;font-weight-bold;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";}

.de,.des{padding-left:0.3%;color:#ACD6EA} .nbjour{color:black;font-weight:300;padding-left:10%;font-size:18px;}
.content_home{width:75%;margin-top:15px;display:none;height:950px;overflow-y:scroll;} 
.content3{margin-left:2%;background:white;margin-top:5px;float:left;margin-left:2.5%;width:30%;height:240px;border:2px solid #eee;padding:1%;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";color:black;}

.dc{padding-bottom: 5px;font-size:14px;font-weight: bold;color: #ACD6EA;} .but2 a{font-size:11px;padding:0.8%;margin-left:30%;background:#111E7F;color:white;text-decoration:none;border:2px solid #111E7F;border-radius:15px;} .but1{margin-left:3%;}
.df{padding-left:55%;font-size:18px;color:#FF00FF;font-weight:bold;}
.intervalle{font-size:13px;padding-left:3%;} 
h4,h5{text-align:center;font-weight:bold;color:black;font-size:13px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";}
.hom{text-align:center;border-bottom:1px solid #eee;padding:0.3%;color:black;font-size:14px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";}
 h5{font-size:13px;} .dg{padding-left:3%;} 
.enre{font-size:12px;z-index:4;position:absolute;top:83px;left:70%;color:green;font-weight:bold;font-size:16px;padding:1%;text-align:center;}
.dep {
  animation: spin 2s linear infinite;
  margin-top:10px;
  }

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.sidebar .nav-item .nav-link span{font-size:14px;font-weight:bold;text-transform:capitalize;}
.navbar-nav{background:#06308E;}

#resultats{height:700px;overflow-y:scroll;padding-left:3%;width:270px;}


h3{color:#06308E;font-size:16px;margin-top:5px;font-weight:bold;}
.sup{cursor:pointer;color:white;font-size:12px;} #content1{display:none;}

.name_error,.id_ocd,.email_error,.site1_error,.site2_error,.site3_error{font-size:16px;color:red;}

@media (max-width: 575.98px) { 
#panier{display:non;}
#logo{display:none;} .side{display:none;} .bs{display:none;}.bg{display:none;}
.cont1,.cont12,.cont13,.cont14{display:block;width:250px;margin-top:8px;margin-left:7%;}
.cont2{display:block;width:250px;margin-top:10px;margin-left:8%;} .center{width:95%;height:2100px;}
ul{display:none;}
.bg-gradient-primary{display:none;} .contens,.contens1{display:block;width:250px;margin-top:10px;margin-left:8%;}
.drop{position:absolute;left:7%;width:300px;}
.drops{padding:2%;position:absolute;left:7%;width:340px;display:block;background:white;
height:2800px;} h2{margin-top:20px;border-top:1px solid #eee;color:black;}
.us{margin-top:5px;border-bottom:1px solid #eee;color:black;}
#news_data{display:block;} #news{display:none;} .users{display:block;color:black;}
input{display:block;} .form-select{display:none;} #panier{display:none;}
#examp{width:80%;margin-left:-15%;height:1100px;} .buttons{margin-left:2%;}
.btn{display:block;} #searchDropdown{display:none;}
.navbar-nav{display:none;} 
.content3{display:block;margin-left:2%;background:white;margin-top:5px;margin-left:3%;width:90%;height:240px;border:2px solid #eee;padding:1%;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";color:black;}
.content_home{width:95%;}

.content_home{width:95%;margin-top:15px;display:none;height:950px;overflow-y:scroll;}  .titre{display:block;position:absolute;left:70%;top:14px;cursor:pointer;color:#224abe;
font-weight:bold;} .rr{display:none;} .datas{display:none;}
.datas{padding:2.5%;width:95%;z-index:2;position:absolute;top:70px;left:2%;background:white;height:750px;} h2{border-color:none;color:#224abe;font-weight:bold;}
h4{display:none;} #add_local{margin-top:30px;margin-left:15%;}

}



@media (min-width: 768px) and (max-width: 991px) {
#panier{display:none;}
#logo{display:none;width:100px;} .side{display:none;} .bs{display:none;}.bg{display:none;}
#accordionSidebar{display:none;} .center{width:100%;margin:0;padding:0;height:1000px;}
cont1,.cont12,.cont13,.cont14,.titre{font-size:14px;}
 h2{margin-top:20px;border-top:1px solid #eee;color:black;}
.us{margin-top:5px;border-bottom:1px solid #eee;color:black;margin-left:10%;}
#news_data{display:block;} #news{display:none;} 
.users{display:block;color:black;font-family:arial;font-size:13px;} h2{margin-left:3%;}
#caisse{font-size:14px;} .tds,.tdv,.tdc{font-size:22px;font-weight:bold;}
.user{padding-left:7%;} .dtt,.dts{font-size:20px;} .h1{font-size:14px;}
.btn{display:block;} .form-select{display:none;}

.drop{position:absolute;width:300px;left:-20%;top:100px;background:white;}
.drops{padding:2%;position:absolute;left:-40%;width:500px;background:white;
height:2800px;overflow-y:scroll;z-index:5;} #examp{width:80%;margin-left:-15%;}
.content3 {width:40%;}
}


@media (min-width: 992px) and (max-width: 1200px) {
#panier{margin-left:-20%;}
#logo{display:none;} .side{display:none;} .bs{display:none;}.bg{display:none;}
#accordionSidebar{display:none;width:100px;} .center{width:100%;margin:0;padding:0;height:1000px;}
cont1,.cont12,.cont13,.cont14,.titre{font-size:14px;}
 h2{margin-top:20px;border-top:1px solid #eee;color:black;}
.us{margin-top:5px;border-bottom:1px solid #eee;color:black;margin-left:10%;}
#news_data{display:block;} #news{display:none;} 
.users{display:block;color:black;font-family:arial;font-size:13px;} h2{margin-left:3%;}
#caisse{font-size:14px;} .tds,.tdv,.tdc{font-size:22px;font-weight:bold;}
.user{padding-left:7%;} .dtt,.dts{font-size:20px;} .h1{font-size:14px;}
.btn{display:block;} 

.drop{position:absolute;width:300px;left:-20%;top:100px;background:white;}
.drops{padding:2%;position:absolute;left:-40%;width:500px;background:white;
height:2800px;overflow-y:scroll;z-index:5;}
.center{height:1600px;} .input{display:none;} #examp{width:60%;margin-left:-5%;}
}


</style>

<script>
 function printContent(el) {
	 var restorepage = document.body.innerHTML;
	 var printcontent = document.getElementById(el).innerHTML;
	 document.body.innerHTML = printcontent;
	 window.print();
	 document.body.innerHTML = restorepage;
	}
 
 </script> 

</head>

<body id="page-top">
        
         <div id="collapse" class="collapse show" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bs">
                    <h1><a href="deconnexion.php">Déconnexion</a></h1>
                      
                  <div class="container">
 
                  <div class="live-infos">
                   
				   <ul class="winners">
	            
	               
				  </div><!--livre-infos-->
	              
				  </div><!--live-infos-->
					  
                    </div>
					
	 
            
			</div>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="navbar-search">
                        <div class="input-group">
                            
                           <div class="inputs">
                               Crée des comptes  <button type="button" class="bts bts-primary" id="but">
                              +</button>
                            </div>

                        
                        </div>
                    </form>

                  
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- 404 Error Text -->
                    <div class="center">
 
					<div id="resultat"></div><!--retour affichage ajax-->
  
  <form method="post" id="form1" action="">
 <div  id="examp" style="display:none">
  <h2> Création de compte utilisateurs OCD </h2>
   
   <div class="form-row">
    <div class="form-group col-md-6">
      <div class="input-group">
	  <label for="inputPassword4">Date <br/>d'enregistrement *</label>
    <input type="date" name="dat" id="dat" class="form-control" placeholder="dd/mm/yyyy" required>                                               
  </div>
 </div>

   <div class="form-group col-md-6">
      <div class="input-group">
	  <label for="inputPassword4">Civilité client *<br/></label>
     <select id="civil" class="civil" name="civil">
	 <option value="monsieur">Monsieur</option>
	 <option value="madame">Madame</option>    
      
	
    </select>	  
   </div>

    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Responsable compte *</label>
      <input type="text" name="name" id="name" class="form-control" id="inputPassword4" placeholder="Nom & prénom">
	  <span class="name_error"></span>
    </div>
  

   <div class="form-group col-md-6">
      <label for="inputEmail4">Numéro phone</label>
      <input type="number" name="numero" id="numero" class="form-control" id="inputEmail4" placeholder="Nature/numéro">
	  <span class="numero_error"></span>
       </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email*</label>
      <input type="text" name="emails" id="emails" class="form-control" id="inputPassword4" placeholder="entre 8 et 14 chiffre">
	  <span class="email_error"></span>
    </div>
     <div class="form-group col-md-6">
      <label for="inputEmail4">Identifiant OCD</label>
      <input type="text" name="ocd" id="ocd" class="form-control" id="inputEmail4" placeholder="identifiant OCD" required>
	  <span class="id_error"></span>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Mot de pass </label>
      <input type="password" name="password" id="password" class="form-control" id="inputPassword4" placeholder="Mot de pass">
	  <span class="pass_error"></span>
    </div>
    
    <h2>Nommer les sites de votre activité<br/>Pas plus de 3 site</h2>
	
	<div class="form-group col-md-12">
      <label for="inputPassword4">site 1</label>
	  <input type="text" name="site1" id="site1" class="form-control" id="inputPassword4" placeholder="Exemple Hotel 5 étoile d'Abidjan">
	 
      </div>
	  
	  <div class="form-group col-md-12">
      <label for="inputPassword4">site 2</label>
	  <input type="text" name="site2" id="site2" class="form-control" id="inputPassword4" placeholder="Nommer">
	  
      </div>
	  
	  <div class="form-group col-md-12">
      <label for="inputPassword4">site 3</label>
	  <input type="text" name="site3" id="site3" class="form-control" id="inputPassword4" placeholder="Nommer">
	  <span class="site3_error"></span>
      </div>
	
	</div>
	
	<h2>Type abonnement</h2>
	
	<div class="form-group col-md-12">
      <label for="inputPassword4">Option de soucription</label>
	  <input type="text" name="option" id="option" class="form-control" id="inputPassword4" placeholder="">
      </div>
	  
	  <div class="form-group col-md-12">
      <label for="inputPassword4">Montant versé</label>
	  <input type="number" name="montant" id="site2" class="form-control" id="inputPassword4" placeholder="">
      </div>
	
  <span class="errors"></span>
  <input type="hidden" name="token" id="token" value="<?php
//Le champ caché a pour valeur le jeton
echo $_SESSION['token'];?>">
   <input type="submit" class="buttons" value="créer un compte">
 </div>
 
 <div class="content">
 <div class="content1">
 
</div><!--content-->

</form>
 
 
    
	</div>


 <div id="home_data"></div><!--div home-->
    
	</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; optimisation de comptabilité à distance 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <!-- Modal -->
  

<!--div black-->
<div id="pak" style="display:none"></div>
<div id="panier"></div>

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
    

   $('#but').click(function(){
   $('#examp').css('display','block');
   $('#pak').css('display','block');
   var email = "default@gmail.com";
   $('#email').val(email);
 });
 
 $('#im').click(function(){
	$('#data').css('display','block');
	 
 });
 
 $('#pak').click(function(){
	$('#examp').css('display','none');
   $('#pak').css('display','none');
   $('.reini').css('display','none');
 });

 
$('#form1').on('submit', function(event) {
	event.preventDefault();

	 var form_data = $(this).serialize();
     var name = $('#name').val();
	 var email = $('#emails').val()
	 var site1 = $('#site1').val();
	 var site2 = $('#site2').val();
	 var site3 =$('#site3').val();
	 var numero =$('#numero').val();
	 var ocd =$('#ocd').val();
	 var regx = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
	 var names = /^[a-zA-Z0-9éàèçéô@'-]{0,100}$/;
	 
	 if(name.length==""){
	 $('.name_error').text('le nom du responsable est vide'); 
	}
	
	else if (!names.test(name)){
      $('.error_name').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur sur la syntaxe du nom');
    }
	
	else if (!names.test(site1)){
      $('.error_site').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur sur le nom du site1');
    }
	
	else if (!names.test(site2)){
      $('.error_email').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur sur le nom du site2');
    }
	
	
	 else if(ocd.length > 12) {
	$('.id_error').html('l\'identifiant OCD ne peut pas dépasser 12 caractères'); 
	 }
	 else if(name.length > 70) {
		$('.name_error').html('limiter à 70 caractères le nom du responsable'); 
	 }
	 else if(site1.length > 100) {
		$('.site1_error').html('limiter à 70 caractères le nom du site1'); 
	 }
	  else if(site2.length > 100) {
		$('.site2_error').html('limiter à 70 caractères le nom du site2');  
	 }
	 
	 else if(site3.length > 100) {
		$('.site3_error').html('limiter à 70 caractères le nom du site3');  
	 }
	 
	  else if (!regx.test(email)){
      $('.error_email').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur de syntaxe sur l\'email du client');
    }
	 
	 else{
	 $.ajax({
	type: "POST", // on envoi les donnes
	url: "data_create_users.php",// on traite par la fichier
	data:form_data,
	success:function(data) { // on traite le fichier recherche apres le retour
		$('#resultat').html(data);
		$('#form1').css('display','none');
		$('#pak').css('display','none');
	    }
	   });
	   setInterval(function(){
		 $('#resultat').html('');
		 location.reload(true);
	 },4000);
	 }	 
  });
 
 // on récupére les données pour créer un user recaptitulatif
 
 
  
  // afficher les données des encaissements
  function load() {
				var action="fetch";
				$.ajax({
					url: "data_create_users.php",
					method: "POST",
					data:{action:action},
					success: function(data) {
						$('#resultats').html(data);
					}
				});
			}

			load();
	
    // afficher la div pour réinitailiser les chiffres	
	$(document).on('click','.butt',function(){
    $('.reini').css('display','block');
    $('#pak').css('display','block');
    });

	  
});
</script>
</body>

</html>