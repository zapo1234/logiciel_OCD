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

    <title>SB Admin 2 - 404</title>

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
     h1,select{height:35px;border-color:#eee;text-align:center;border-bottom:1px solid #eee;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:18px;font-weight:300;color:black;margin-left:%;}
    #collapse{width:300px;height:100px;padding:2%;position:fixed;top:60px;left:81%;border-shadow:3px 3px 3px black;}
    .bg{background:white;width:300px;border:2px solid #eee;height:210px;padding:4%;}
.center{background-color:white;width:80%;height:750px;} .inputs,.input{margin-left:5%;float:left;}
.nav-search{width:70%;} .form-select{margin-left:40%;width:200px;height:43px;}
.inputs{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;font-weight:bold;color:green;}
#pak{position: fixed;top: 0;left: 0;width:100%;height: 100%;background-color: black;z-index:2;opacity: 0.6;}
#examp{padding:3%;position:absolute;width:60%;height:1000px;z-index:3;left:18%;top:20px;background-color:white;border-radius:10px;}
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
.table{width:80%;margin-left:5%;margin-top:14px;border:1px solid #eee;} td,th{text-align:center;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;color:black;}
th{text-align:center;background:white;color:black;font-size:13px;text-transform:uppercase;}
.div{color:green;} #block_delete{position: absolute;top:200px;left:40%;width:370px;;height:160px;background-color:white;z-index:4;}
 h3{color:black;padding-top:5%;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:16px;text-align:center;}
 #button_annuler{width:120px;margin-left:6%;height:40px;color:white;background:red;margin-top:20px;border:2px solid red;text-align:center;border-radius:15px;}
 #button_delete{width:50px;height:40px;background:#4e73df;color:white;border-radius:50%;margin-left:10%;margin-top:20px;border:2px solid #4e73df;}
 .enr{color:white;padding:2%;font family:arial;background:red;width:150px;height:25px;}
 #data_delete{position:absolute;top:200px;left:15%;} #forms {color:black;}
 .color{background:#ACD6EA;font-weight:bold;} .home{color:#111E7F;font-size:18px;font-weight:bold;}
.side{color:#A9D3F2;padding:35%;text-align:center;margin-left:-8%;width:160px;height:160px;border-radius:50%;background:white;border:2px solid white;margin-top:95px;}

ul a{margin-left:3%;}
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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
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
                           <option selected>lister</option>
                           <option selected>5</option>
						   <option selected>15</option>
						   <option selected>25</option>
						   <option selected>35</option>
                         </select>
                          </div>  
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Type ou nombre de place chambre" aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

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
<form method="post" action="">
<button type="button" id="button_delete">ok</button>
<button type="button" id="button_annuler">Annuler</button>
<input type="hidden" name="ids" id="ids">
<input type="hidden" name="token" id="token" value="<?php
//Le champ caché a pour valeur le jeton
echo $_SESSION['token'];?>">
</form>
</div>

<div id="data_delete"></div><!--retour ajax-->

<!--div black-->
<div id="pak" style="display:none"></div>

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
 
 function load() {
				var action="fetch";
				$.ajax({
					url: "liste_data_home.php",
					method: "POST",
					data:{action:action},
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