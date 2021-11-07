<?php
include('../connecte_db.php');
include('../inc_session.php');

$req=$bdd->prepare('SELECT denomination,email_user,numero,id_visitor FROM inscription_client WHERE id_visitor= :id');
   $req->execute(array(':id'=>$_GET['home_user']));
   $donnees=$req->fetch();
	$req->closeCursor();
 // recupere les données des chambre 
   $reg=$bds->prepare('SELECT id,id_chambre,id_visitor FROM chambre WHERE  id_visitor= :home_user');
    $reg->execute(array(':home_user'=>$_GET['home_user']));
    $donns = $reg->fetch();
    $reg->closeCursor();

 if(!isset($_GET['home_user']) OR $_GET['home_user']!=$donnees['id_visitor']){
	header('location:home_none.php');
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

    <!-- Custom fonts for this template-->
    <!-- Custom fonts for this template -->
	<link rel="stylesheet" href="/lib/w3.css"><!-- bar progression indicateur-->
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
	 .x{display:none;position:absolute;top:50px;left:80%;z-index:5;cursor:pointer;}
    #collapse{background:white;width:200px;height:800px;position:fixed;top:60px;left:82%;border-shadow:3px 3px 3px black;}
    
    .bs{background:#eee;width:250px;height:250px;border:1px solid #eee;background:white;}
	.bc{background:white;width:250px;height:250px;border:1px solid #eee;margin-top:30px;margin-left:3%;color:black;padding:2%;}
	
	.bd{margin-top:10px;margin-left:3%;} .users{width:250px;background:white;color:black;padding:2.5%;margin-left:4%;}
		
.center{background-color:white;width:80%;height:1250px;padding:1.5%;margin-top:5px;} .inputs,.input{margin-left:5%;float:left;}
.nav-search{width:70%;} 

.content2{margin-left:0.2%;}
.dt{font-size:13px;color:green;} .prix,.pric{border:1px solid #eee;width:30%;margin-left:2%;}
.dc{padding-bottom: 5px;font-size:14px;font-weight: bold;color: #ACD6EA;} .but2 a{font-size:11px;padding:0.8%;margin-left:50%;background:#111E7F;color:white;text-decoration:none;border:2px solid #111E7F;border-radius:15px;} .but1{margin-left:3%;}

#pak{position: fixed;top: 0;left: 0;width:100%;height: 100%;background-color: black;z-index:2;opacity: 0.8;}
.center{background:#eee;} 

#block{padding:2%;background:white;width:36%;height:330px;position:absolute;top:100px;left:25%;z-index:3;} .h1{text-transform:uppercase;color:#0769BA;}
 
 .navbar-nav{background:#eee;}
 .btn{display:none;}
.sup{cursor:pointer;color:white;font-size:12px;}
.but{margin-left:60%;width:200px;height:38px;margin-top:20px;margin-bottom:20px;border: 2px solid #0769BA;background:#0769BA;color:white;}
h1{margin-top:18px;} .resul a{padding:2%;color:black;width:15%;} .resul{padding:2%;border-bottom:2px solid white;border-top:2px solid white;} .resul a:hover{text-decoration:none;} .homesoccupe{display:none;} .homesbloque{display:none;}
.button{width:200px;height:35px;background:green;color:white;border:2px solid green;font-weight:bold;} 
#examp{background:white;width:35%;height:250px;position:absolute;z-index:4;left:30%;top:100px;padding:2%;} .libre{display:none;}
h3{text-center:center;color:#0769BA;} .buttons{margin-left:50%;width:250px;height:40px;background:#0769BA;
color:white;border:2px solid #0769BA;margin-top:20px;font-weight:bold;border-radius:20px;}
label{color:black;font-size:13px;} 
.butt{height:45px;position:absolute;top:2px;left:270%;width:250px;border-radius:20px;
background:#0769BA;border:2px solid #0769BA;}#error{color:red;font-size:13px;} tr{border-bottom:1px solid #eee;padding:2%;width:200px;} 
.rows{background:white;width:100%;}
.der{float:left;margin-left:2%;margin-top:2%;} #days,#das{width:180px;}
table{background:white;} th,td{color:black;font-weight:200}
.vert{font-size:13px;color:green;}
.trs{font-size:25px;color:black;font-weight:bold;}
.df,.data_total{padding-left:2%;color:black;font-family:arial;font-size:23px;}
h3{margin-left:25%;} .recap{text-align:center;margin-left:2%;}
.rows{background:white;width:100%;height:500px;}
.der{float:left;margin-left:2%;margin-top:2%;} #days,#das{width:180px;}
.bu{margin-top:200px;margin-left:30%;width:200px;border-radius:20px;border-radius:20px;
background:green;border:2px solid green;color:white;font-weight:bold;}
label{width:200px;}#nbjour{width:150px;}
#error{color:red;font-size:13px;} #tab{border-bottom:1px solid #eee;padding:2%;width:200px;} .recap{font-size:20px;color:black;}
.forms{margin-left:10%;} .resultat{margin-left:5%;}
.add{margin-top:5px;margin-left:10%;background:#0769BA;border:2px solid #0769BA;color:white;border-radius:15px;} .resul a:hover{text-decoration:none;} .homesoccupe{display:none;}
.button{width:200px;height:35px;background:green;color:white;border:2px solid green;font-weight:bold;} 
.user_home{position:absolute;top:100px;left:25%;width:30%;background:white;height:570px;z-index:4;padding:5%;} #name,#adresse,#numero,#email{width:250px;}
.hotes{width:95%;color:black;} .hote{margin-left:40%;text-transform:capitalize;font-size:18px;}
.numero{margin-left:3%;} .email{margin-left:3%;}
.error_date{color:red;font-size:12px;}
#mobile{display:none;} #envoi{display:block;} .users{display:none;}

.ml2 {
  font-weight: 500;
  font-size: 1.5em;
  color:green;
}

.ml2 .letter {
  display: inline-block;
  line-height: 1em;
}

.ter {
  font-weight: 600;
  font-size: 1em;
  color:#C10D23;
}

#test{color:green} .data{display:none;} .img{display:none;}
.calenda{display:none;} #panier_mobile{display:none;}
/*------------------
/*------------------------------------------------------------------
[ Responsive ]*/
@media (max-width: 575.98px) { 
.s{display:block;}
#panier{display:none;}
#logo{display:none;} .side{display:none;} .bs{display:none;}.bg{display:none;}
.cont1,.cont12,.cont13,.cont14{display:block;width:250px;margin-top:8px;margin-left:7%;}
.cont2{display:block;width:250px;margin-top:10px;margin-left:8%;} .center{width:95%;height:2400px;}
.us{margin-top:5px;border-bottom:1px solid #eee;color:black;}
#news_data{display:block;} #news{display:none;} .users{display:block;color:black;}
#accordionSidebar{width:100px;} .btn{display:block;}#searchDropdown{display:none;} 
#collapse{display:none;position:absolute;left:1%;height:1500px;}
#im{display:none;} #accordionSidebar{display:none;width:300px;}
#mobile{display:block;background:white;color:black;padding-left:4%;font-size:16px;}
#examp{background:white;width:90%;height:300px;position:absolute;z-index:4;left:5%;top:100px;padding:2%;}.hote,.numero,.email{display:none;} 
.rows{background:white;width:120%;height:650px;margin-left:-3%;} .der{margin-left:-3%;
margin-top:5px;} h3{font-size:20px;margin-left:3Px;margin-top:5px;}
#examp{background:white;width:75%;height:300px;position:absolute;z-index:4;left:10%;top:100px;padding:2%;}.hote,.numero,.email{display:none;} 
.rows{background:white;width:120%;height:650px;margin-left:-3%;} .der{margin-left:-3%;
margin-top:5px;} h3{font-size:20px;margin-left:3Px;margin-top:5px;}
.dat{margin-top:3px;border-bottom:2px solid #eee;}
.buttons{margin-left:5%;width:250px;height:40px;background:#0769BA;
color:white;border:2px solid #0769BA;margin-top:20px;font-weight:bold;border-radius:20px;}
#days,#das{width:250px;}
.resul a{padding:1%;color:black;width:350px;}
.resul{width:500px;padding:1%;border-bottom:2px solid white;border-top:2px solid white;}
.data{display:block;} .button{display:none;} .img{display:block;} .calenda{display:block;} .data,.img,.calenda{float:left;}
.calenda{margin-left:5%;} .dt{font-size:13px;}
.data,.img,.calenda{float:left;} .calenda{margin-left:35%;}
.img{margin-left:10%;} #block{margin-left:-12%;width:90%;height:400px;}
.ter{padding-left:2%;} #panier_mobile{display:block;}
#collapse{background:white;width:400px;height:800px;position:absolute;top:60px;left:4%;border-shadow:3px 3px 3px black;}
.bu{margin-top:100px;margin-left:20%;width:200px;border-radius:20px;border-radius:20px;} .bc{width:330px;} .user_home{width:300px;margin-left:-10%;}
.carous{margin-top:170px;width:400px;margin-left:-12%;}
}


@media (min-width: 768px) and (max-width: 991px) {
#panier{display:none;}
#logo{display:none;} .side{display:none;} .bs{display:none;}.bg{display:none;}
 .center{width:100%;margin:0;padding:0;height:1000px;}
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
#searchDropdown{display:none;} 
#block{margin-left:-12%;width:60%;height:400px;}
.ter{padding-left:2%;} 
.data{display:block;} .button{display:none;} .img{display:block;} .calenda{display:block;} .data,.img,.calenda{float:left;}
.calenda{margin-left:5%;} .dt{font-size:13px;}
.data,.img,.calenda{float:left;} .calenda{margin-left:45%;}
#collapse{background:white;width:400px;height:800px;position:absolute;top:60px;left:50%;border-shadow:3px 3px 3px black;}
.bu{margin-top:100px;margin-left:20%;width:200px;border-radius:20px;border-radius:20px;} .user_home{width:400px;margin-left:-10%;}
.hote{display:none;}.button{display:none;} .numero{display:none;}
.email{display:none;} .calenda{margin-left:65%;}
.carous{margin-top:150px;width:550px;margin-left:-12%;}
}


@media (min-width: 992px) and (max-width: 1200px) {
#panier{margin-left:-30%;}
#logo{display:none;} .side{display:none;} .bs{display:none;}.bg{display:none;}
#accordionSidebar{display:none;} .center{width:100%;margin:0;padding:0;height:1000px;}
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
height:2800px;overflow-y:scroll;z-index:5;} #searchDropdown{display:none;}
#collapse{position:absolute;display:none;left:70%;height:1200px;}
.hote{margin-left:25%;}
}



</style>

</head>

<body id="page-top">
 <div class="x"><i class="fas fa-times" style="color:white;font-size:20px;"></i></div>
        <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <div class="navbar-nav bg-gradient sidebar sidebar-dark accordion" id="accordionSidebar">
         <div class="df"> <?php echo date('H:i');?> en Direct</div>
		 <span class="ml2"></span><span class="ter"></span>
		  <div id="result"></div><!--retour ajax list home-->
        </div>
		
        <!-- End of Sidebar -->
        
         <div id="collapse" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bn">
                      
                  <div class="container">
 
	              
				  </div><!--live-infos-->
					  
                    </div>
					
					
					<div class="bd">
		
		<div class="users">
		
		
		</div>
	
		<div class="bc">
		<div class="recap">Récapitulatif de réservation</div>
		<form method="post" id="formB" action="data_user_reservation.php">
		<div class="forms">
       <label for="inputPassword4">Numéro de jours*</label>
      <input type="number" name="nbjour" id="nbjour" class="form-control" id="inputPassword4" placeholder="" required><br/><span id="error"></span>
       </div>
	   <div class="forms">
      <label for="inputPassword4">Option</label>
      <select id="tr" class="tr" name="tr" required>
	 <option value="choix">choix</option>
	 <option value="horaire">horaire</option>
	 <option value="réservation">réservation</option>
	 </select></div>
	 
	 <div id="div_user" style="display:none">
	 
	 <div class="form-group col-md-6">
      <label for="inputPassword4">Client *</label>
      <input type="text" name="name" id="name" class="form-control" id="inputPassword4" placeholder="Nom & prénom">
    </div>
 
    <div class="form-group col-md-6">
      <label for="inputPassword4">Numéro de phone *</label>
      <input type="number" name="numero" id="numero" class="form-control" id="inputPassword4" placeholder="entre 8 et 14 chiffre">
    </div>
     <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="text" name="email" id="email" class="form-control" id="inputEmail4" placeholder="email par défaut">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Adresse </label>
      <input type="adresse" name="adresse" class="form-control" id="inputPassword4" placeholder="facultatif">
    </div>
	 <div class="form-group col-md-6">
      <label for="inputEmail4">Payer vous un acompte? *</label>
      <input type="checkout" id="oui" name="oui">Oui <input type="checkout" id="oui" name="Non">Non
    </div>
	 
	 </div><!-- information user pour la reservation-->
	   
		<div id="resultat"></div><!--requete ajax-->
		<div id="resultats"></div><!-- requete ajax-->
       </div>
	   </form>
		</div>
           <div><button class="bu">confirmer votre réservation</button></div>            
                    
                </div>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn rounded-circle mr-3">
                        <i class="fa fa-bars" style="color:blue"></i>
                    </button>
                   <!-- Topbar Search -->
                              <div class="hotes">
                               <button type="button" class="button">choix de disponibilité</button> <span class="data"></span><span class="calenda"><i class="fas fa-calendar-alt"></i></span><span class="img"><i class="fas fa-cart-arrow-down"></i></span><span class="hote"><?php echo $donnees['denomination'];?></span>
							   <span class="numero"><i class="fas fa-phone" style="font-size:14px;"></i> <?php echo$donnees['numero'];?></span><span class="email"><i class="fas fa-envelope"style="font-size:14px"></i> <?php echo $donnees['email_user'];?></span>
                           </div>
                  
                 <?php include('inc_menu1.php');?>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- 404 Error Text -->
                    <div class="center">
					
  
 
    
	                 </div><!--center-->

	
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
  

 <!-- End of Main Content -->
<div class="user_home" style="display:none">
	 
	 <div class="form-group col-md-6">
      <label for="inputPassword4">Client *</label>
      <input type="text" name="name" id="name" class="form-control" id="inputPassword4" placeholder="Nom & prénom"><br/>
	  <span class="error"></span>
    </div>
 
    <div class="form-group col-md-6">
      <label for="inputPassword4">Numéro de phone *</label>
      <input type="number" name="numero" id="numero" class="form-control" id="inputPassword4" placeholder="entre 8 et 14 chiffre"><br/>
	  <span class="error"></span>
    </div>
     <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="text" name="email" id="email" class="form-control" placeholder="email par défaut">
	  <span class="error"></span>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Adresse </label>
      <input type="adresse" name="adresse" id="adresse" class="form-control" placeholder="facultatif">
    </div>
	 <div class="form-group col-md-6">
      <label for="inputEmail4">Solder vous un acompte? *</label>
      <input type="checkbox" id="oui" class="oui" name="oui">Oui <input type="checkbox" id="non" class="nom" name="Non">Non
    </div>
	
	<div class="form-group col-md-6">
      <label for="inputEmail4">Confirmer la réservation</label>
      <button type="button" id="envoi" name="envoi">Valider</button>
    </div>
	 
	 </div><!-- information user pour la reservation-->


<div id="examp" style="display:none">
<form method="post" id="formA" action="data_home_user.php">
 
  <h3> check_in et check_out </h3>
   
   <div class="row mb-3">
                    <div class="col">
					  <label>Date d'arrivée</label>
                      <input type="date" id="days" name="days" class="form-control" placeholder="" min="<?php echo date('Y-m-d');?>" required>
                    </div>
                    <div class="col">
					<label>Date de départ</label>
                      <input type="date" id="das" name="das" class="form-control" placeholder="" min="<?php echo date('Y-m-d');?>" required
					  >
                    </div>
					<div class="error_date"></div>
                </div>
  <span class="errors"></span>
  <input type="hidden" name="id_visitor" value="<?php echo$donns['id_visitor'];?>">
  <input type="hidden" name="id_home" value="<?php echo$donns['id_chambre'];?>">
   <button type="submit" class="buttons">rechercher</button>
 
<input type="hidden" name="token" id="token" value="<?php
//Le champ caché a pour valeur le jeton
echo $_SESSION['token'];?>">

 </form>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <?php include('inc_foot_scriptjs.php');?>
  <script type="text/javascript">
   $(document).ready(function(){
     
	 $('#sidebarToggleTop').click(function(){
		$('#accordionSidebar').slideToggle();
	 });
	 
	 $('.calenda').click(function(){
	$('#pak').css('display','block');
   $('#examp').css('display','block');	
	 $('.x').css('display','block');
	 
 });
	 
	$('#sms').click(function(){
	$('.drop').slideToggle();
	$('.drops').css('display','none');

	});
	
	 $('#news_data').click(function(){
	$('#collapse').slideToggle();
	$('.drop').css('display','none');
	
	});
	
	 $('#news').click(function(){
	$('.users').slideToggle();
	});
			
	// click sur les news message
	 $('.but').click(function(){
   $('#pak').hide(2000);
   $('#block').hide(1000);
 });
 
 $('.button').click(function(){
	$('#pak').css('display','block');
   $('#examp').css('display','block');	
	 $('.x').css('display','block');
 });
 
 $('.x').click(function(){
	$('#pak').css('display','none');
   $('#examp').css('display','none');	
	 $('.x').css('display','none');
	 $('.user_home').css('display','none');
 });
 
 
 $('#pak').click(function(){
	$('#pak').css('display','none');
   $('#examp').css('display','none');	
   
 });
	// pagintion
  $(document).on('click','.bout',function(){
	  var page =$(this).attr("id");
	  list(page);
   });
	
	// compter les nouveaux message
	function list(page) {
				var action="list";
				$.ajax({
					url: "list_datas_homes.php?home_user=<?php echo$_GET['home_user'];?>",
					method: "POST",
					data:{action:action},
					success: function(data) {
						$('#result').html(data);
						var data = $('#test').val();
						var datas = $('#tests').val();
						var dat =$('#datas').val();
						if(data.length!=""){
                        $('.ml2').html(data);
						$('.data').html(data);
						}
						if(datas.length!=""){
						 $('.ter').html('<i class="fas fa-dot-circle"></i>'+datas);
						 $('.data').html(data);
						}
					}
				});
			 }

			list();
			
  $("#envoi").click(function(){
	 var name =$('#name').val();
     var number=$('#number').val();	
    var email = $('#email').val();
    var tota= $('#tota').val();	
	var regex = /^[a-zA-Z0-9éèàç]{2,25}(\s[a-zA-Z0-9éèàçà]{2,25}){0,4}$/;
    var rege = /^[a-zA-Z0-9-çéèàèç°]{1,25}(\s[a-zA-Z0-9-°]{1,25}){0,2}$/;
    var number = /^[+0-9]{8,14}$/;
	var reg = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
	
	if(name.length==""){
		$('#name').css('border-color','red');
	}
	 else if (name.length > 80){
      $('.errors').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> le nom doit pas dépasser plus de 80 caractères');
    }
	else if (!reg.test(number)){
      $('.error').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur de syntaxe sur le numéro de phone');
    }
	else if (!reg.test(email)){
      $('.error').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur de syntaxe du mail');
    }
	else{
		$('#formB').submit();
	}
	  
  });
			
	$(document).on('click','.add',function() {

	var id = $(this).data('id2'); // on recupère l'id.
    var action ="add";
	// recupération des variable
	var tr =$('#tr').val();
	var id_chambre = $('#id_chambre'+id).val();
	var prix_nuite = $('#prix_nuite'+id).val();
	var prix_pass = $('#prix_pass'+id).val();
	var chambre =$('#chambre'+id).val();
	var nbjour = $('#nbjour').val();
	
	if(nbjour.length!="" || nbjour.length!=0){
	if(tr!="choix"){
	// on lance l'apel ajax
	$.ajax({
	type: 'POST', // on envoi les donnes
	url: 'add_home.php',// on traite par la fichier
	data:{action:action,tr:tr,id_chambre:id_chambre,prix_nuite:prix_nuite,prix_pass:prix_pass,chambre:chambre,nbjour:nbjour},
	success:function(data) { // on traite le fichier recherche apres le retour
		$('#resultat').html(data);
		$('#error').text('');
	 },
	 error: function() {
    $('#resultat').text('vérifier votre connexion'); }
	 });
	}
	else{
	  $('#error').text('choisir une option');
	}
	}
	else{
	  $('#error').text('fournir le nombre de jours/horaire séjour');
	}
	 });
	 
	       function session_add(){
		      var action="adds";
				$.ajax({
					url: "add_home.php",
					method: "POST",
					data:{action:action},
					success: function(data) {
						$('#resultats').html(data);
					}
				});
			}

			session_add();
	 
	 
	 
	$(document).on('click','.remove',function() {
	 var id = $(this).data('id3'); // on recupère l'id.
	 var action="remove";
	 var tr =$('#tr').val();
	 var id_chambre = $('#id_chambre'+id).val();
	 var prix_nuite = $('#prix_nuite'+id).val();
	 var prix_pass = $('#prix_pass'+id).val();
	 var chambre =$('#chambre'+id).val();
	 var nbjour = $('#nbjour').val();
	 
	 $.ajax({
	type: 'POST', // on envoi les donnes
	url: 'add_home.php',// on traite par la fichier
	data:{action:action,tr:tr,id_chambre:id_chambre,prix_nuite:prix_nuite,prix_pass:prix_pass,chambre:chambre,nbjour:nbjour},
	success:function(data) { // on traite le fichier recherche apres le retour
		$('#resultat').html(data);
		$('#error').text('');
	 },
	 error: function() {
    $('#resultat').text('vérifier votre connexion'); }
	 });
	 setInterval(function(){
		 $('#resultat').html('');
		 location.reload(true);
	 },3000);
	 
	 });
	 
	 $('.buttons').click(function(){
		 event.preventDefault();
		 var dat1 =$('#days').val();
		 var dat2 = $('#das').val();
	     var date1 = new Date($('#days').val());
	     var date2 =  new Date($('#das').val());
		 if(dat1.length!="" && dat2.length!=""){
		 if(date1 > date2){
		  $('.error_date').text(' *la date de départ doit etre supérieur à la date d\'arrivée'); 
		}
		else{
		$('#formA').submit();
		}
		 }
		else{
			$('.error_date').text(' *remplir les champs de date'); 
		}
	  });
	 
	 
	 $('.bu').click(function(){
	 var count =$('.dfc').length;
	    if(count!=0){
	 	$('.user_home').css('display','block'); 
        $('#pak').css('display','block');
        $('.x').css('display','block');		
		}
		else{
			$('#error').text('*vous n\'avez pas choisir un local'); 
		}
       });
	 
	$('#nbjour').keyup(function(){
	var nbjour =$('#nbjour').val();
	if(nbjour==""){
		nbjour=1;
	}
	var total = $('#tota').val();
	var s = parseFloat(nbjour)*parseFloat(total);
	$('.data_total').text(s);
	});
	
  
  // Wrap every letter in a span
var textWrapper = document.querySelector('.ml2');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.ml2 .letter',
    scale: [4,1],
    opacity: [0,1],
    translateZ: 0,
    easing: "easeOutExpo",
    duration: 950,
    delay: (el, i) => 70*i
  }).add({
    targets: '.ml2',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 2500
  });


});
</script>
</body>

</html>