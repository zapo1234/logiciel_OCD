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

    <title>Logiciel en mode Saas</title>

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
     h1,select{height:35px;border-color:#eee;text-align:center;border-bottom:1px solid #eee;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:18px;font-weight:300;color:black;margin-left:%;}
    #collapse{width:300px;height:100px;padding:2%;position:fixed;top:60px;left:81%;border-shadow:3px 3px 3px black;}
    .bg{background:white;width:300px;border:2px solid #eee;height:210px;padding:4%;}
.center{background-color:white;width:80%;padding-top:5px;padding-bottom:50px;} .inputs,.input{margin-left:5%;float:left;}
.nav-search{width:70%;} .form-select{margin-left:40%;width:200px;height:43px;}
.inputs{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;font-weight:bold;color:green;}
#pak{position: fixed;top: 0;left: 0;width:100%;height: 100%;background-color: black;z-index:2;opacity: 0.6;}
#examp{padding:3%;position:absolute;width:60%;height:1150px;z-index:3;left:18%;top:20px;background-color:white;border-radius:10px;}
.forms{width:200px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;font-weight:bold;color:black}
h2{	font-size:16px;margin-top:30px;width:500px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;color:#4e73df}

input{width:50px;}
#file1,#file2,#file3,#file4{width:250px;}
#inputEmail4{width:250px;}
textarea{width:50%;} #his{width:250px;margin-left:70%;height:40px;background:#4e73df;border:2px solid #4e73df;color:white;font-family:arial;border-radius:15px;}

 #pak{width:200px;position: fixed;top: 0;left: 0;width:100%;height: 100%;background-color: black;z-index:2;opacity: 0.6;}
label{color:black;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;font-weight:bold;color:black}
 .dep {
  animation: spin 2s linear infinite;
  margin-top:10px;font-size:45px;font-weight:bold;
  }

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
#pak{position: fixed;top: 0;left: 0;width:100%;height: 100%;background-color: black;z-index:2;opacity: 0.6;}
.enre,.up,.ups{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;color:black;z-index:4;position:absolute;top:130px;left:40%;border:2px solid white;font-family:arial;font-size:14px;width:280px;height:150px;padding:2%;text-align:center;background-color:white}

.x{color:#4e73df;font-weight:bold;} .ts{padding-left:4%;} .center{width:90%;margin-left:5%;background-color:white;}

.div{color:green;} #block_delete{position: absolute;top:200px;left:40%;width:370px;;height:160px;background-color:white;z-index:4;}
 h3{color:black;padding-top:5%;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:16px;text-align:center;}
 #button_annuler{width:120px;margin-left:6%;height:40px;color:white;background:red;margin-top:20px;border:2px solid red;text-align:center;border-radius:15px;}
 #button_delete{width:50px;height:40px;background:#4e73df;color:white;border-radius:50%;margin-left:10%;margin-top:20px;border:2px solid #4e73df;}
 .enr{color:white;padding:2%;font family:arial;background:red;width:150px;height:25px;}
 #data_delete{position:absolute;top:200px;left:15%;} #forms {color:black;}
 .color{background:#E0F1FA;} .home{color:#111E7F;font-size:18px;font-weight:bold;}
.side{color:#A9D3F2;padding:35%;text-align:center;margin-left:-8%;width:160px;height:160px;border-radius:50%;background:white;border:2px solid white;margin-top:95px;}

ul a{margin-left:3%;} #form_logo{display:none;} 
.pied_page{margin-left:60%;margin-top:10px} .bout{float:left;margin-left:1%;width:30px;height:30px;background:white;}
#logo{position:absolute;top:6px;left:1.7%;border-radius:50%;}

#tb td, #tb th {border: 1px solid #ddd;padding:3px;width:250px;text-align:center;font-size:14px;}

#tb tr:nth-child(even){background-color:#f2f2f2;}

#tb tr:hover {background-color: #ddd;}

#tb th {padding-top: 12px;padding-bottom: 12px;text-align: left;color: black;text-align:center;background:#D2EDF9;border:2px solid #D2EDF9}

#tb{margin-top:10px;} #tb td{height:90px;color:black}
.pied,.p{float:left;}
#message_datas{padding-left:2%;padding-bottom:8px;position:absolute;}
.drop{position:absolute;top:50px;width:240px;height:200px;background:white;border:2px solid white;margin-left:-5px;
background-color: white;
border-radius: 20px;
border-width: 0;
box-shadow: rgba(25,25,25,.04) 0 0 1px 0,rgba(0,0,0,.1) 0 3px 4px 0;
color: black;
cursor: pointer;
display: inline-block;
font-family: Arial,sans-serif;
font-size: 1em;
height: 250px;
padding: 0 25px;
transition: all 200ms;}

.drops{display:none;}  .users{display:none} #news_data{display:none;}

.sidebar .nav-item .nav-link span{font-size:14px;font-weight:bold;text-transform:capitalize;}
.navbar-nav{background:#06308E;}

#panier{position:fixed;left:60%;top:15px;color:black;font-size:14px;background:black;
opacity:0.7;padding:1%;color:white;border-radius:5px;}

@media (max-width: 575.98px) { 
#panier{display:none}
#logo{display:none;} .side{display:none;} .bs{display:none;}.bg{display:none;}
.cont1,.cont12,.cont13,.cont14{display:block;width:250px;margin-top:8px;margin-left:7%;}
.cont2{display:block;width:250px;margin-top:10px;margin-left:8%;} .center{width:95%;height:2100px;}
ul{display:none;}
.bg-gradient-primary{display:none;} .contens,.contens1{display:block;width:250px;margin-top:10px;margin-left:8%;}
.drop{position:absolute;left:7%;width:300px;}
.drops{padding:2%;position:absolute;left:7%;width:340px;display:block;background:white;
height:2800px;overflow-y:scroll} h2{margin-top:20px;border-top:1px solid #eee;color:black;}
.us{margin-top:5px;border-bottom:1px solid #eee;color:black;}
#news_data{display:block;} #news{display:none;} .users{display:block;color:black;}
}

@media (min-width: 768px) and (max-width: 991px) {
#panier{display:none;}
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
height:2800px;overflow-y:scroll;z-index:5;}
.center{height:1700px;}
}


@media (min-width: 992px) and (max-width: 1200px) {
 #panier{display:none;}
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
height:2800px;overflow-y:scroll;z-index:5;}
.center{height:1700px;}
}




</style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include('inc_menu_principale.php');?>
        <!-- End of Sidebar -->
        

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="navbar-search">
                        <div class="input-group">
                            
                           <div class="inputs">
                               Ajouter un local  <button type="button" class="btn btn-primary" id="but">
                              +</button>
                            </div>

                        <div class="input"><select class="form-select form-select-sm" aria-label=".form-select-sm example">
                         <option selected>Type de logement</option>
						  <option value="1">chambre single</option><option value="2">chambre double</option>
                           <option value="3">chambre triple</option><option value="4">chambre twin</option><option value="5">chambre standard</option><option value="6">chambre deluxe</option>
                          <option value="7">studio double</option>
						  <option value="8">appartement meublé</option>
                          </select>
						  
                          </div>    
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- 404 Error Text -->
                    <div class="center">
                        <div id="data">
						
						</div><!--ajax data list-->
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

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
 <div id="html"></div><!--affichage retour ajax-->
 <div  id="examp" style="display:none">
 <div id="error"></div><!--affichage erreur-->

  <form method="post" id="forms"  enctype="multipart/form-data">
  <h1><i class='fas fa-house-user'></i> Formualire pour l'enregsitrement d'un local,une chambre ou un appartement de votre espace Hotelier</h1>
   
   <div class="form-row">
    <div class="form-group col-md-6">
	<h2><i style="font-size:16px" class="fa">&#xf044;</i> Informations relatives au type du local</h2>
      <label for="inputPassword4">type de local *</label>
      <select name="type" class="forms form-select-sm" aria-label=".form-select-sm example">
                           <option value="">Type de logement</option>
						   <option value="1">chambre single</option><option value="2">chambre double</option>
                           <option value="3">chambre triple</option><option value="4">chambre twin</option><option value="5">chambre standard</option><option value="6">chambre deluxe</option>
                          <option value="7">studio double</option>
						  <option value="8">appartement meublé</option>
                          </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Autre type</label>
      <input type="text" class="form-control" name="typs" id="inputEmail4" placeholder="">
    </div>
  

   <div class="form-group col-md-6">
      <label for="inputEmail4">identifier votre local *</label>
      <input type="text" class="form-control" name="ids" id="ids" required placeholder="Ex: chambre A-01, chambre 2...">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">occupants possible *</label>
      <input type="number" class="form-control" id="num" name="num" placeholder="Ex 3">
    </div>
     <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre de lits*</label>
      <input type="number" class="form-control" id="nums" name="nums" placeholder="">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">cout nuité *</label>
      <input type="number" class="form-control" id="count" name="cout" placeholder="" required>
    </div>
    
	<div class="form-group col-md-6">
      <label for="inputPassword4">cout pass </label>
      <input type="number" class="form-control" id="counts" name="couts" placeholder="">
    </div>
	
	<div class="form-group col-md-6">
      <label for="inputPassword4">Localisation(au cas ou vous avez plusieurs site) </label>
      <select name="site" class="forms form-select-sm" aria-label=".form-select-sm example">
                           <option value="">choisir</option>
						   <option value="1">site 1</option>
                           <option value="2">site 2</option>
                           <option value="3">site 3</option>
						  
                          </select>
    </div>
	
    
     <div class="form-group col-md-12">
        <h2><i style="font-size:14px" class="fa">&#xf044;</i> Informations relatives aux equipements principales du local</h2>

      <div class="custom-checkbox">
      <input type="checkbox" name="ch[]"  value="<i style='font-size:13px' class='fa'>&#xf2dc;</i> climatisation"> <i style='font-size:13px' class='fa'>&#xf2dc;</i> climatisation
     <input type="checkbox" name="ch[]"  value="<i style='font-size:13px' class='fa'>&#xf2dc;</i> ventilateur"> <i style='font-size:13px' class='fa'>&#xf2dc;</i> ventilateur
	 <input type="checkbox" name="ch[]"  value="<i style='font-size:13px' class='fa'>&#xf108;</i> télévision"> <i style="font-size:13px" class="fa">&#xf108;</i> télévision<input type="checkbox" name="ch[]"  value="<i style='font-size:14px' class='fa'>&#xf1eb;</i> wiffi">  <i style="font-size:14px" class="fa">&#xf1eb;</i> wiffi</td> <input type="checkbox" name="ch[]"  value="<i style='font-size:14px' class='fa'>&#xf2a2;</i> salle de baim"> <i style="font-size:14px" class="fa">&#xf2a2;</i> salle de bains
     <input type="checkbox" name="ch[]" value="<i style='font-size:16px' class='fas'>&#xf0f4;</i> Déjeuner"> <i style='font-size:14px' class='fas'>&#xf0f4;</i> Déjeuner
	 </div>
	 
	 <h2><i style="font-size:14px" class="fa">&#xf044;</i> Informations relatives aux equipements secondaires du local</h2>
    <input type="checkbox" name="choix[]"  value="toilletes"> toilletes
    <input type="checkbox" name="choix[]"  value="armoie ou penderie"> armoie ou penderie  
   <input type="checkbox" name="choix[]" value="chaines satellite"> chaines satellite
   <input type="checkbox" name="choix[]"  value="prise près de lit"> prise près de lit <input type="checkbox" name="choix[]"  value="espace pour pc"> espace pour pc</td> 
   <input type="checkbox" name="choix[]"  value="portant"> portant<br/>
    <input type="checkbox" name="choix[]"  value="baignoire ou douche"> Baignoire ou douche
   <input type="checkbox" name="choix[]"  value="télephone"> télephone
   <input type="checkbox" name="choix[]"  value="microonde"> microonde
   <input type="checkbox" name="choix[]"  value="réfrigérateur"> réfrigerateur
    <input type="checkbox" name="choix[]"  value="machine à laver"> machine à laver<br/>
     <input type="checkbox" name="choix[]"  value="papier toillete"> papier toillete
    <input type="checkbox" name="choix[]"  value="séche cheveux"> séche cheveux
   <input type="checkbox" name="choix[]"  value="petit café">  petit café
   <input type="checkbox" name="choix[]" value="déjeuner"> déjeuner
	</div>
      
    </div>
	
	<h2>Informations facultatives</h2>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">informations complementaire</label>
    <textarea class="form-control" name="infos" id="infos" rows="3"></textarea>
   </div>
	
  <h2><i class="fas fa-camera"></i> Prise de photo de votre local(au moins 4images)</h2>
  <input type="file" class="test" name="fil[]" id="file1"><input type="file" class="test" name="fil[]" id="file2"><input class="test" type="file" name="fil[]" id="file3">
  <input type="file" class="test" name="fil[]" id="file4">
  
  <div><input type="submit" value="enregistrer le local" id="his"/></div>
<input type="hidden" name="token" id="token" value="<?php
//Le champ caché a pour valeur le jeton
echo $_SESSION['token'];?>">
  </form><!--fin du form-->
  </div>

 </div>

<!-- div delete home-->
<div id="block_delete" style="display:none">
<h3>êtes-vous sûr de vouloir supprimer ce local ?</h3>
<form method="post" id="envoi" action="">

<input type="hidden" name="ids" id="ids">
<input type="hidden" name="token" id="token" value="<?php
//Le champ caché a pour valeur le jeton
echo $_SESSION['token'];?>">
</form>
<button type="button" id="button_delete">ok</button>

</div>

<div id="data_delete"></div><!--retour ajax-->

<!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; optimisation de comptabilité à distance 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->


<!--div black-->
<div id="pak" style="display:none"></div>
<div id="panier"></div><!--retour panier facturation-->

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
    <?php include('inc_foot_scriptjs.php');?>
  <script type="text/javascript">
   $(document).ready(function(){
   $('#sidebarToggleTop').click(function(){
		$('#accordionSidebar').css('display','block');
	 });
	 
   
   $('#sms').click(function(){
	$('.drop').slideToggle();
	});

   $('#but').click(function(){
   $('#examp').css('display','block');
   $('#pak').css('display','block');
 });
 
 $('#pak').click(function(){
	$('#examp').css('display','none');
   $('#pak').css('display','none');
   $('#block_delete').hide();   
 });
 
 $('#button_annuler').click(function(){
	 $('#pak').css('display','none');
   $('#block_delete').hide(); 
 });
 
 $('#forms').on('submit', function(event) {
 event.preventDefault();
 var form_data =$(this).serialize();
  var regex = /^[a-zA-Z0-9]{2,15}(\s[a-zA-Z0-9]{2,20}){0,4}$/;
 var rege = /^[a-zA-Z0-9-]{2,15}(\s[a-zA-Z0-9-]{2,15}){0,3}$/;
 var number = /^[0-9]{1,2}$/;
 var inf = /^[a-zA-Z0-9éàèçé]{0,200}$/;
// on ecrits les variable
var ids =$('#ids').val();
var num =$('#num').val();
var nums =$('#nums').val();
var infos = $('#infos').val();


 if(ids.length> 60) {
	$('#error').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i>nombre max de caractère est de 50 nom du client');
	}
	
	else if(num.length > 3) {
	$('#error').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i>nombre max de caractère est de 50 nom du client');
	}
	
	else if(num < 0){
		
	}
	
	else if(nums < 0) {
		
		
	}
	
	else if (!number.test(num)){
      $('#error').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur de syntaxe sur le nombre compris en 1 et 9 ');
      $('#num').css('border-color','red');
	}
	
	else if (!number.test(nums)){
      $('#error').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur de syntax sur le nombre compris entre 1et 9');
      $('#nums').css('border-color','red');
	}
	
	else if (infos.length >200){
      $('#error').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> nombre de caractères pour les informations ne peuvent pas dépasser 200');
      $('#infos').css('border-color','red');
	}
	
	else{

  $.ajax({
	type:'POST', // on envoi les donnes
	async: false,
	url:"enregistrer_liste.php",
    data:new FormData(this),
	contentType:false,
	processData:false,
	success:function(data) {
	$('#html').html(data);
	$('#forms').css('display','none');
	$('#examp').css('display','none');
	load();
	}
   });
   
   setInterval(function(){
		 $('#html').html('');
		 location.reload(true);
	 },3000);
	 
   }

}); 
	
 // delete home--
 $(document).on('click','.home', function(){
	 // recupere la variable
	 var id = $(this).data('id1');
	 var action = "deleted";
    // affiche les differentes
	$('#block_delete').css('display','block');
    $('#pak').css('display','block');
	$('#ids').val(id);
	
	$(document).on('click','#block_delete', function(){
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'data_delete.php',// on traite par la fichier
	data:{id:id,action:action},
	success:function(data) { // on traite le fichier recherche apres le retour
     $('#data_delete').html(data);
     $('#block_delete').css('display','none');
     $('#pak').css('display','none');
	}
		
	});

 });
 
 });
 
 // pagintion
  $(document).on('click','.bout',function(){
	  var page =$(this).attr("id");
	  load(page);
   });
   
   
   
  // afficher le pannier
  function panier() {
				var action="panier";
				$.ajax({
					url: "session_panier.php",
					method: "POST",
					data:{action:action},
					success: function(data) {
						$('#panier').html(data);
					}
				});
			}

			panier();
 
 function load(page) {
				var action="fetch";
				$.ajax({
					url: "liste_data_home.php",
					method: "POST",
					data:{action:action,page:page},
					success: function(data) {
						$('#data').html(data);
					}
				});
			}

			load();
 
});
</script>
</body>

</html>