<?php
include('connecte_db.php');
include('inc_session.php');

 if(!isset($_GET['user'])){
	
   header('location:index.php');	
 }
 $user =$_GET['user'];
  $req=$bdd->prepare('SELECT id,email_ocd,email_user,password,numero,numero1,user,categories FROM inscription_client WHERE id= :id AND email_ocd= :email_ocd');
   $req->execute(array(':id'=>$user,
                       ':email_ocd'=>$_SESSION['email_ocd']));
   $donnees =$req->fetch();
   
   $email =$donnees['email_user'];
   $users =$donnees['user'];
   $numero =$donnees['numero1'];
   $categories =$donnees['categories'];
   $ids=$user;

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
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
     h1,select{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:18px;margin-left:8%;color:black}
    #collapse{width:300px;height:100px;padding:2%;position:fixed;top:60px;left:81%;border-shadow:3px 3px 3px black;}
    .bg{background:white;width:340px;border:2px solid #eee;height:300px;padding:4%;margin-top:50px;}
    .bs{padding:2%;color:black;background:white;width:340px;border:2px solid #eee;height:300px;padding:4%;margin-top:0px;}
    .en{height:50px;border-bottom:1px solid #eee;} .h1{font-size:24px; text-align:center;} .encaiss{font-size:16px;font-weight:none;} .h2{margin-top:70px;margin-left:10%;} .t_monts,.t_mont,.t_mon{font-size:18px;margin-left:-20px;}
	#montant td{font-weight:none;} .butt{height:35px;border-radius:15px;padding:1.5%;width:180px;font-weight:200;background:#F026FA;color:white;font-size:20px;border:2px solid #F026FA;}
	.t_monts{color:#42FC72;} .t_mont{color:#FA2367;} .t_mon{color:#14B5FA;}
.center{background-color:white;width:80%;height:1050px;padding:1.5%;margin-top:5px;} .inputs,.input{margin-left:5%;float:left;}
.nav-search{width:70%;} .form-select{margin-left:40%;width:200px;height:43px;}
.inputs{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;font-weight:bold;color:green;}

.bg{font-weight:bold;color:black;font-size:13px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"}
.tot{margin-bottom:10px;} #add_local{height:35px;margin-left:4%;border:2px solid #E5F1FB;#font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";margin-left:15px;margin-top:10px;width:150px;color:black;background:#E5F1FB;padding:1%;}

#pak{position:fixed;top:0;left:0;width:100%;height:100%;background-color:black;z-index:2;opacity: 0.8;}
.der1,.der2,.der3,.der4,.der5,.der6{color:black;cursor:pointer;width:240px;float:left;text-align:center;border:1px solid #eee;padding:1%;height:45px;} .color{background:#ACD6EA;font-weight:bold;} .home{color:#111E7F;font-size:18px;font-weight:bold;}
.side{color:#A9D3F2;padding:35%;text-align:center;margin-left:-8%;width:160px;height:160px;border-radius:50%;background:white;border:2px solid white;margin-top:95px;}

#der11{width:60%;margin-left:15%;} td{width:500px;color:black;padding-top:20px;}
#der12{width:60%;margin-left:15%;display:none;}
#der13{width:75%;margin-left:10%;display:none;}
#der14{}
#der15{width:60%;margin-left:15%;display:none;}
.der1{border-bottom:4px solid #0661BC;color:#0661BC;}
.def{color:black;}
h2{color:#0661BC;width:600px;font-size:28px;font-weight:none;text-align:center;margin-top:80px;margin-left:10%;border-bottom:1px solid #eee;font-family:arial;}
ul a{margin-left:3%;} #form_logo{display:none;} 

.remove-padding {
  padding: 0;
}

img {
  image-rendering: auto;
}


.form-row{margin-top:25px;} input{height:35px;}
#name,#names{color:white;border:2px solid #0661BC;background:#0661BC;width:230px;margin-left:32%;height:45px;text-align:center;border-radius:25px;}
#role,#roles{width:320px;height:40px;border:1px solid #eee;}
label{font-family:arial;color:black;} .enre{font-family:arial;font-size:15px;z-index:3;background:black;opacity:0.8;position:absolute;top:890px;left:12%;color:white;width:200px;text-align:center;padding:0.5%;height:50px;}
.up{color:black;} .num,.emails,.pass,.prenom,.nom{color:black;}
td,th{text-align:center;} th{border:1px solid #eee;height:50px;font-family:arial;color:black}
#form3{width:40%;height:600px;background:white;border:2px solid white;padding:0.2%;position:absolute;left:25%;top:150px;z-index:4;}
#modifier,#modipass{margin-left:30%;margin-top:3px;width:220px;text-align:center;color:white;background:#0661BC;border:2px solid #0661BC;height:35px border-radius:15px;}
.bl{background:#B9102C;width:100px;color:white;text-align:center;height:25px;border:2px solid #B9102C;border-radius:15px;}
.acs{background:#10B910;width:100px;color:white;text-align:center;height:25px;border:2px solid #10B910;border-radius:15px;}
tr{border:1px solid #eee;} #logo{position:absolute;top:6px;left:1.7%;border-radius:50%;}
.titre{font-family:arial;text-align:center;margin-top:3px;font-size:18px;color:#EA4629}
.resultats{width:60%;} 
</style>

</head>

<body id="page-top">

        <?php include('inc_menu_principale.php');?>
        <!-- End of Sidebar -->
        
         <div id="collapse" class="collapse show" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bs">
                    <div class="titre">Instruction 1</div>  
                    <div>
					<li>Gérer les informations de votre entreprise</li>
					<li>Lors de la modification d'une entrée fournir toutes les informations</li>
					<li>Fournir un logo qui serait visualiser sur vos facture</li>
					<li>Des informations restent facultatives</li>
					<li>Respecter 60 caractères minimum(nom,email)</li>

                    </div>					
                    
					</div><!--lexique 1-->
					
					<div class="bs">
                     <div class="titre">Instruction 2</div>  
                    
					<li>Ajouter des comptes pour vos employés</li>
					<li>Possibilité d'ajouter 5 compte maximum</li>
					<li>Fournir un email et un mot de pass</li>
					<li>Mot de pass doit etre entre 8 12 caractères<br/>(une lettre(miniscule et majuscule),un nombre,)
					  un caractère contenant(@!$#) obligatoire</li>
                    <li>lister vos utilisateur et gérer les actions</li>					  
                    </div>
					
					<div class="bs">
                     <div class="titre">Instruction 3</div>  
					<li>Ajouter des comptes pour vos employés</li>
					<li>Possibilité d'ajouter 5 compte maximum</li>
					<li>Fournir un email et un mot de pass</li>
					<li>Mot de pass doit etre entre 8 de 12 caractères<br/>(une lettre(miniscule et majuscule),un nombre,)
					  un caractère contenant(@!$#) obligatoire</li>    
                    </div>
				
                </div>

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

                        <div class="input"><select class="form-select form-select-sm" aria-label=".form-select-sm example">
                         <option selected>Menu</option>
						  <option value="1">Votre entreprise</option><option value="2">Ajouter des comptes</option>
                           <option value="3">Lister des utilisateurs</option><option value="4">Attribuer des dates</option><option value="5">Gérer des accès</option>
                         
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
					
                    <div class="content1"><div class="der1">Votre entreprise <i class="fas fa-building"></i></div><div class="der2">Ajouter des comptes  <i class="fas fa-users"></i></div>
					 <div class="der3"> Lister des utilisateurs  <i class="fas fa-table"></i></div> <div class="der4">Attribuer des horaires  <i class="fas fa-calendar-alt"></i></div> <div class="der5">Gérér les accès  <i class="fas fa-key"></i></div></div>
                     
					 <div class="content2">
					 
					 <form method="post" id="form3" action="zapo.php">
                   		
                    <h2>Modifier les données de ce utilisateur</h2>
					<div class="form-row">
                    <div class="col">
                       <label>Nom </label><br/><input type="text" class="form-control" id="noms" name="noms" value="<?php echo$users;?>" required>
                      <br/><span class="noms"></span></div>
                    </div>
				 
				 <div class="form-row">
                    <div class="col">
                       <label>Numéro télephone</label><br/><input type="number" id="nums" name="nums" class="form-control" value="<?php echo$numero;?>" placeholder="numero">
                      <br/><span class="nums"></span></div>
                    <div class="col">
                    <br/><select id="roles" name="roles" required>
                   <option value="<?phpecho$categories;?>"><?php echo$categories;?></option>
                 <option value="1">Dirigeant</option>
				 <option value="2">Responsable</option>
                  <option value="3">Gestionnaire</option>
                  <option value="4">Réceptionniste(caisse)</option>
               </select>
                    <br/><span class="roles"></span></div>
				 
                 </div>
				 
				 <div class="form-row">
                    <div class="col">
                       <label>Email(utilisé)</label><br/><input type="text" id="emais" name="emais" class="form-control" value="<?php echo$email;?>" required><br/>
					   <span class="emais"></span>
                      </div>
                    <div class="col">
                   <label>Nouveau mot de pass</label> <input type="password" id="pas" name="pas" class="form-control">
                    <br/><span class="pas"></span></div>
				   <input type="hidden" name="ids" id="ids" value="<?php echo$ids;?>">
                  </div>
				 <div class="form-row">
                    <div class="col">
                       <input type="button" id="modifier" value="Modifier">
					   <a href="gestion_parameter_datas.php"><input type="button" id="modifier" value="retour au paramètres"></a>
                      </div>
                 </div>
				 </form>
					 
					
					 
					 
				</div><!--div result-->

					 
					 </div>
					 
					<div class="content3">
					
					
					
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
  
<!-- retour ajax edit user-->
<div id="datos"></div>

<div id="donns"></div>
<!--div black-->
<div id="pak"></div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
 });
 
 $(document).on('click','#modifier', function() {
	
	var action="editvalidate";
	 var noms = $('#noms').val();
	 var roles = $('#roles').val();
	 var password = $('#pas').val();
	 var nums =$('#nums').val();
	 var emais = $('#emais').val();
	 var ids =$('#ids').val();
	 
	 // regex //
	var regex = /^[a-zA-Z0-9éèàç]{2,25}(\s[a-zA-Z0-9éèàçà]{2,25}){0,4}$/;
    var rege = /^[a-zA-Z0-9-çéèàèç°]{1,25}(\s[a-zA-Z0-9-°]{1,25}){0,2}$/;
    var number = /^[0-9+]{8,14}$/;
	var reg = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
	var pass = /^(?=.*\d)(?=.*[A-Za-z])(?=.*[!@#$%])[0-9A-Za-z!@#$%]{8,12}$/;// contient une lettre, un chiffre et au moin un caractère spéciale
	
	if(noms.length==""){
		$('#noms').css('border-color','red');
		
	}
	 
	 else if (noms.length > 60){
      $('.noms').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> le nombre de caractères du nom ne doit pas depasser 60');
    }
	
	else if (roles==""){
      $('.roles').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> vous devez choisir un role pour l\'utilisateur');
    }
	 
	 else if (!reg.test(emais)){
      $('.emais').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur de syntaxe sur l\'email');
    }
	
	else if(nums.length >14){
	 $('.nums').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> le nombre de caractères du numéro de téléphoneest au plus 14 chiffres');
     }
	
	else if (!pass.test(password)){
      $('.pas').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur sur la syntaxe du mot de pass');
    }
	
	else{
		
		$.ajax({
	type:'POST', // on envoi les donnes
	url:'result_view_home.php',// on traite par la fichier
	data:{action:action,ids:ids,emais:emais,nums:nums,password:password,noms:noms,roles:roles},
	success:function(data) { // on traite le fichier recherche apres le retour
     $('#donns').html(data);
	 $('#pak').css('display','none');	
	}
	});
	
	}
	});
 
 });
</script>
</body>

</html>