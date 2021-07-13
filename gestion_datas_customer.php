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
     h1,select{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:18px;margin-left:8%;color:black}
    #collapse{width:300px;height:100px;padding:2%;position:fixed;top:60px;left:81%;border-shadow:3px 3px 3px black;}
    .bg{border:1px solid #eee;background:white;width:340px;height:500px;padding:4%;margin-top:0px;}
    .bs{width:340px;height:300px;border:1px solid #eee;}
    .en{height:50px;border-bottom:1px solid #eee;} .h1{font-size:24px; text-align:center;} .encaiss{font-size:16px;font-weight:none;} .h2{margin-top:70px;margin-left:10%;} .t_monts,.t_mont,.t_mon{font-size:18px;margin-left:-20px;}
	#montant td{font-weight:none;} .butt{height:35px;border-radius:15px;padding:1.5%;width:180px;font-weight:200;background:#F026FA;color:white;font-size:20px;border:2px solid #F026FA;}
	.t_monts{color:#42FC72;} .t_mont{color:#FA2367;} .t_mon{color:#14B5FA;}
.center{background-color:white;width:80%;height:1050px;padding:1.5%;margin-top:5px;} .inputs,.input{margin-left:5%;float:left;}
.nav-search{width:70%;} .form-select{margin-left:40%;width:200px;height:43px;}
.inputs{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;font-weight:bold;color:green;}
#pak{position: fixed;top: 0;left: 0;width:100%;height: 100%;background-color: black;z-index:2;opacity: 0.8;}
#examp{border:2px solid #eee;padding:3%;position:absolute;width:40%;height:700px;z-index:3;left:28%;top:20px;background-color:white;border-radius:10px;}
.forms{width:200px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;font-weight:bold;color:black}
h2{width:500px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;text-transform:uppercase;color:black;border-bottom:1px solid #eee;margin-bottom:15px;}
label {color:black;} .buttons{margin-left:55%;margin-top:20px;width:250px;height:40px;color:white;
background:#ACD6EA;border-radius:15px;text-transform:capitalize;border:2px solid #ACD6EA}
.form1,.form2{display:none;}

.content1{display:none;color:black;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";}
.h3{padding-bottom:5px;font-size:20px;font-weight:bold;color:#4e73df;text-transform:uppercase;border-bottom:2px solid #ACD6EA;}
.h5{text-align:center;font-size:11px;font-weight:bold;color:green;padding:2%;width:180px;height:35px;}
.h6{color:red;font-weight-bold;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";}

.de,.des{padding-left:0.3%;color:#ACD6EA} .nbjour{color:black;font-weight:300;padding-left:10%;font-size:18px;}
.content_home{width:75%;margin-top:15px;display:none;background:#BDDDF9;height:950px;} .content3{background:white;margin-top:5px;float:left;margin-left:2.5%;width:30%;height:275px;border:2px solid white;padding:1%;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";color:black;}
.content_home,.content2{float:left;display:none;} .content2{margin-left:0.2%;}
.dt{font-size:11px;color:green;} .prix,.pric{border:1px solid #eee;width:30%;margin-left:2%;}
.dc{padding-bottom: 5px;font-size:14px;font-weight: bold;color: #ACD6EA;} .but2 a{font-size:11px;padding:0.8%;margin-left:50%;background:#111E7F;color:white;text-decoration:none;border:2px solid #111E7F;border-radius:15px;} .but1{margin-left:3%;}
.df{padding-left:55%;font-size:18px;color:#FF00FF;font-weight:bold;}
.intervalle{font-size:13px;padding-left:3%;} 
h4,h5{text-align:center;font-weight:bold;color:black;font-size:13px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";}
.hom{text-align:center;border-bottom:1px solid #eee;padding:0.3%;color:black;font-size:14px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";}
 h5{font-size:13px;} .dg{padding-left:3%;} 
 .montant{padding:1%;background-color:#E5F1FB;text-align:center;margin-top:30px;color:black;font-size:13px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"} 
 #monts,#tva,#account,#rpay,#paie1,#paie2,#paie3,#paie4{width:90px;font-weight:200;border:2px solid white;} .tot{margin-top:10px;font-weight:bold;} #mont{font-weight:bold;padding-left:2%;}
.remov{padding-left:3%;}
.bg{font-weight:bold;color:black;font-size:13px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"}
.tot{margin-bottom:10px;} #add_local{height:35px;margin-left:4%;border:2px solid #E5F1FB;#font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";margin-left:15px;margin-top:10px;width:150px;color:black;background:#E5F1FB;padding:1%;}
.reini{padding:2%;z-index:3;position:absolute;top:300px;left:40%;background-color:white;width:350px;height:220px;border-radius:10px;border:3px solid white;}
.action{margin-top:25px;} .annul{border-radius:15px;width:120px;height:30px;background-color:#FF4500;color:white;border:2px solid #FF4500;}
.ok{width:45px;height:45px;border-radius:50%;margin-left:30%;background-color:#1E90FF;border:2px solid #1E90FF} #reini{margin-left:2%;height:40px;width:130px;font-family:arial;}

.enre{font-size:12px;z-index:4;position:absolute;top:83px;left:70%;color:green;font-weight:bold;font-size:16px;padding:1%;text-align:center;}
.dep {
  animation: spin 2s linear infinite;
  margin-top:10px;
  }

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.side{color:#A9D3F2;padding:35%;text-align:center;margin-left:-8%;width:160px;height:160px;border-radius:50%;background:white;border:2px solid white;margin-top:95px;}
ul a{margin-left:3%;} #form_logo{display:none;} h3{font-size:16px;}.print{border-radius:20px;width:150px;height:35px;background:#85C9F8;border:2px solid #85C9F8;color:white;text-align:center;color:white;margin-left:12%;margin-top:80px;}
.td{margin-left:10%;margin-top:5px;font-size:16px;} #logo{position:absolute;top:6px;left:1.7%;border-radius:50%;}
.tds{font-size:28px;margin-left:12%;color:#09A81F;}
.tdv{font-size:28px;margin-left:12%;color:#A80913;}
.tdc{font-size:28px;margin-left:12%;color:#0E84D1;}
</style>

</head>

<body id="page-top">

        <?php include('inc_menu_principale.php');?>
        <!-- End of Sidebar -->
        
         <div id="collapse" class="collapse show" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bs">
                    <h1>Les enregistrements récents</h1>
                      
                    </div>
					
					
					<div class="bg">
                        <div id="resultats"></div>
                      
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
                            
                           <div class="inputs">
                               Entrez des Clients  <button type="button" class="btn btn-primary" id="but">
                              +</button>
                            </div>

                        <div class="input"><select class="form-select form-select-sm" aria-label=".form-select-sm example">
                         <option selected>Type de logement</option>
						  <option value="1">chambre single</option><option value="2">chambre double</option>
                           <option value="3">chambre triple</option><option value="4">chambre twin</option><option value="5">chambre standard</option><option value="6">chambre deluxe</option>
                          <option value="7">studio double</option>
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
  <form method="post" id="form1" action="data_validate_client.php">
 <div  id="examp" style="display:none">
  <h2> Les informations du client </h2>
   
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
     <option value="sans">type</option><option value="couple">couple</option>
	 <option value="monsieur">Monsieur</option>
	 <option value="madame">Madame</option>    
      <option value="famille">famille</option>
	  <option value="sans">sans précision</option>
    </select>	  
   </div>

    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Client *</label>
      <input type="text" name="name" id="name" class="form-control" id="inputPassword4" placeholder="Nom & prénom">
    </div>
  

   <div class="form-group col-md-6">
      <label for="inputEmail4">piéce d'identité *</label>
      <input type="email" name="piece" id="piece" class="form-control" id="inputEmail4" placeholder="Nature/numéro">
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
    
    <h2>Information hébergement</h2>
	
	<div class="form-group col-md-6">
      <label for="inputPassword4">Type de séjour</label>
      <select id="to" class="to" name="to" required>
     <option value="sans">type</option><option value="séjour">séjour facturé</option>
	 <option value="horaire">horaire facturé</option>
	 <option value="réservation">réservation</option>
	 </select></div>
	
	<div class="form-group col-md-6">
      
     </div>
	
     <div class="form1 col-md-6">
	  <label for="inputPassword4">Date d'entrée(check_in) </label>
      <input type="date" name="days" id="days" class="form-control" id="inputPassword4" placeholder="">
     </div>
	
	 <div class="form1 col-md-6">
      <label for="inputPassword4">Date du départ(check_out) </label>
      <input type="date" name="das" id="das" class="form-control" id="inputPassword4" placeholder="">
    </div>
	
	<div class="form2 col-md-6">
	  <label for="inputPassword4">Heure d'entrée(check_in) </label>
      <input type="time" name="tim" id="tim" class="form-control" id="inputPassword4" placeholder="">
     </div>
	
	 <div class="form2 col-md-6">
      <label for="inputPassword4">Heure du départ(check_out) </label>
      <input type="time" name="tis" id="tis" class="form-control" id="inputPassword4" placeholder="">
    </div>
	
  </div>
  <span class="errors"></span>
   <button type="button" class="buttons">continuer</button>
 </div>
 
 <div class="content">
 <div class="content1">
 <div class="h3"><span id="h3"></span><span class="nbjour"></span></div>
 <span class="client"></span>
 </div>


 <input type="hidden" id="nbjour" name="nbjour">
 
</div><!--content-->



<div class="contents">
<div id="resultat_home"><?php include('list_data_home.php');?></div><!--affiche les homme-->

 <div class="content2">
  <h4> Les détails sur le séjour </h4>
  <div id="results"></div><!--div-affiche data home selectionné-->
  
 </div>
<input type="hidden" name="token" id="token" value="<?php
//Le champ caché a pour valeur le jeton
echo $_SESSION['token'];?>">
 </div><!--content2--> 
 </form>
 
 
    
	</div>

 <div class="reini" style="display:none">
 <form method="post" id="form_reini" action="">
 <h1>Réinitialiser votre caisse journalière</h1>
 <div class="dert"> Date du point :<input type="date" id="reini" name="reini" required></div>
 <div class="action"><button type="button" class="annul">Annuler</button><input type="submit" class="ok" value="ok"></div>
 </form>
 
 </div><!--reini---->
 <div id="result_reini"></div><!--div result_reini-->
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
 
 $('#pak').click(function(){
	$('#examp').css('display','none');
   $('#pak').css('display','none');
   $('.reini').css('display','none');
 });
 
 $(document).on('change','.to',function(){
	var selectedOptions = $('#to option:selected').text(); 
	 
	 var result = "séjour facturé";
	 var resuts = "réservation";
	 var results = "horaire";
	 
	 if(selectedOptions == result){
		 $('.form2').css('display','none');
		 $('.form1').css('display','block');
		 
	 }
	 
	 else if(selectedOptions == resuts){
		 $('.form2').css('display','none');
		 $('.form1').css('display','block');
		 
	 }
	 else{
		 
		$('.form2').css('display','block');
		 $('.form1').css('display','none'); 
	 }
 });
 
 // click sur le bouton 
 $('.buttons').click(function(){
	 
	 // on definir
	 var dat = $('#dat').val();
	 var name = $('#name').val();
	 var piece = $('#piece').val();
	 var to = $('#to').val();
	 var days = $('#days').val();
	 var das = $('#das').val();
	 var tim = $('#tim').val();
	 var tis =$('#tis').val();
	 var email = $('#email').val();
	 var adresse = $('#adresse').val();
	 var numero =$('#numero').val();
	 
	 // regex
	var regex = /^[a-zA-Z0-9éèàç]{2,25}(\s[a-zA-Z0-9éèàçà]{2,25}){0,4}$/;
    var rege = /^[a-zA-Z0-9-çéèàèç°]{1,25}(\s[a-zA-Z0-9-°]{1,25}){0,2}$/;
    var number = /^[0-9]{8,14}$/;
	var reg = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
	 
	 var date1 = new Date($('#days').val());
	 var date2 =  new Date($('#das').val());
	 
	 // convertir les dates en Français
	 var d = date1.getDate();
	 var m = date1.getMonth() +1;
	 var y = date1.getFullYear();
	 
	 var ds = date2.getDate();
	 var ms = date2.getMonth() +1;
	 var ys = date2.getFullYear();
	 
	 var datefrom = (d <= 9 ? '0' + d : d) + '/' + (m <= 9 ? '0' + m : m) +'/' + y;
	 
	 var datefro = (ds <= 9 ? '0' + ds : ds) + '/' + (ms <= 9 ? '0' + ms : ms) +'/' + ys;
	 
	 
	 // calculer le nom de jour du séjour 
	  var tmp = new Date(date2-date1);
	  var s = tmp/1000/60/60/24;
	 
	 
	 var date3 = parseInt($('#tim').val(),10);
	 var date4 = parseInt($('#tis').val(),10);
	 
	 // caclcule d'heure horaire
	 var tmps = date4-date3;
	 var r = tmps;
	 
	 if(name.length==""){
		$('#name').css('border-color','red');
		
	}
	 
	 else if (name.length > 60){
      $('.errors').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur de syntaxe sur le nom du client');
    }
	
	 
	 else if (!reg.test(email)){
      $('.errors').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur de syntaxe sur l\'email du client');
    }
	
	 else if (numero.length > 14){
      $('.errors').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> le numéro de télephone ne doit pas depasser 14chiffres');
    }
	
	
	else if (piece.length > 50){
      $('.errors').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>le nombre de caractères pour la pièce d\identité ne doit pas depasser 50');
    }
	 
	 else if(dat ==""){
		 $('#dat').css('border-color','red');
	 }
	 
	 else if(piece.length ==""){
		$('#piece').css('border-color','red'); 
		$('.error').html('fournir les informations sur l\'identité du client');
	}
	
	else if(adresse > 150){
		$('#adresse').css('border-color','red'); 
		$('.errors').html('l\'adresse du client peut pas dépasser 150 caractères');
	}
	 
	 else if(to =="sans"){
		$('#to').css('border-color','red'); 
	}
	

	else{
	 
	 if(to =="séjour"){
		 
		 var client = $('.client').text();
		 if(client ==""){
		 
		 if(days!=""){
		 
		 if(das!=""){
		 
		 if(date1 < date2) {
		 $('#h3').append('Séjour facturé');
		 $('.client').append('Réference client : <i class="far fa-user" style="font-size:13px;color:green;"></i><span class="de">'+name+'</span> <i class="fas fa-phone" style="padding-left:4%;color:green;font-size:13px;"></i> contact :<span class="des"> '+numero+'</span><span class="intervalle"> <span class="intervalle"> <i class="fas fa-calendar-minus" style="font-size:13px;color:green;"></i> Arrivée le  <span class="from">'+datefrom+'</span> ,  <i class="fas fa-calendar-minus" style="font-size:13px;color:green;"></i> Départ le  <span class="todate">'+datefro+' </span></span>');
		 
		 if(s==1){
		 $('.nbjour').append(' Durée : <span class="det">'+s+'jour</span>');
		 }
		 if(s > 1){
			$('.nbjour').append('Durée : <span class="det">'+s+'jours</span>');			  
		 }
		 $('.content1').css('display','block');
		 $('.content2').css('display','block');
		 $('#pak').css('display','none');
	     $('#examp').css('display','none');
		 $('.content_home').css('display','block');
		 $('.text').css('display','block');
		 $('.tex').css('display','none');
		 $('#nbjour').val(s);
		 }
		 
		 else{
			$('.errors').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>la date de départ ne dois pas etre inférieur à celle de l\'entréé'); 
		 }
		 
		 }
		 
		 else{
			 $('#das').css('border-color','red'); 
		 }
		 
		 }
		 
		 else{
			$('#days').css('border-color','red');  
		 }
		 
		 }
		 
		 else{
			 
			 if(date1 < date2){
			$('#h3').text('Séjour facturé'); 
			$('.de').text(name);
			$('.des').text(numero);
			$('.from').text(datefrom);
			$('.todate').text(datefro);
			
			if(s==1){
			$('.det').text(s+'jour');
			
			}
			
			if(s > 1){
				$('.det').text(s+'jours');
			}
			$('.content1').css('display','block');
			$('.content2').css('display','block');
			$('#pak').css('display','none');
	       $('#examp').css('display','none');
		   $('.content_home').css('display','block');
		   $('.text').css('display','block');
		   $('.tex').css('display','none');
		   $('#nbjour').val(s);
		 }
		 else{
			$('.errors').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>la date de départ ne dois pas etre inférieur à celle de l\'entréé');  
		 }
		 
		 }
		
	 }
	 
	 if(to =="horaire"){
		 var client = $('.client').text();
		 if(client==""){
		 if(tim!=""){
		 if(tis!=""){
		 if(date3 < date4){
		 $('#h3').append('Horaire facturé');
		 $('.client').append('Réference client : <i class="far fa-user" style="font-size:13px;color:green;"></i><span class="de">'+name+'</span> <i class="fas fa-phone" style="padding-left:4%;color:green;font-size:13px;"></i> contact :<span class="des"> '+numero+'</span><span class="intervalle"> <span class="intervalle"> <i class="fas fa-calendar-minus" style="font-size:13px;color:green;"></i> Arrivée le  <span class="from">'+tim+'</span> ,  <i class="fas fa-calendar-minus" style="font-size:13px;color:green;"></i> Départ le  <span class="todate">'+tis+'</span> </span>');
		 
		 if(r==1){
		 $('.nbjour').append('Durée : <span class="det">'+r+'heure</span>');
		 }
		 if(r > 1){
			$('.nbjour').append('Durée : <span class="det">'+r+'heures</span>');			  
		 }
		 
		 $('.content1').css('display','block');
		 $('.content2').css('display','block');
		    $('#pak').css('display','none');
	        $('#examp').css('display','none');
			$('.content_home').css('display','block');
		    $('.text').css('display','none');
			$('.tex').css('display','block');
			$('#nbjour').val(r);
		 }
		 
		 else{
			 $('.errors').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>l\'heure de départ ne dois pas etre inférieur à celle de l\'entréé'); 
	      }
		 
		 }
		 
		 else{
			$('#tis').css('border-color','red');  
		 }
		 
		 }
		 
		 else{
			 $('#tim').css('border-color','red'); 
		 }
		 
		 }
         else{
			 
			 if(date3 < date4){
            $('#h3').text('Horaire facturé'); 
			$('.de').text(name);
			$('.des').text(numero);
			$('.from').text(tim);
			$('.todate').text(tis);
			
			if(r==1){
			$('.det').text(r+'heure');
			
			}
			
			if(r > 1){
				$('.det').text(r+'heures');
			}
			
			$('.content1').css('display','block');
			$('.content2').css('display','block');
		    $('#pak').css('display','none');
	        $('#examp').css('display','none');
			$('.content_home').css('display','block');
		    $('.text').css('display','none');
			$('.tex').css('display','block');
			$('#nbjour').val(r);
		}
		
		else{
			$('.errors').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>la date de départ ne dois pas etre inférieur à celle de l\'entréé'); 
		}
	   }
	 }
	 
	 
	 if(to =="réservation"){
		 
		 var client = $('.client').text();
		 if(client ==""){
		 
		 if(days!=""){
		 
		 if(das!=""){
		 
		 if(date1 < date2) {
		 $('#h3').append('Réservation');
		 $('.client').append('Réference client : <i class="far fa-user" style="font-size:13px;color:green;"></i><span class="de">'+name+'</span> <i class="fas fa-phone" style="padding-left:4%;color:green;font-size:13px;"></i> contact :<span class="des"> '+numero+'</span><span class="intervalle"> <span class="intervalle"> <i class="fas fa-calendar-minus" style:"font-size:13px;color:green;"></i> Arrivée le  <span class="from">'+datefrom+'</span> ,  <i class="fas fa-calendar-minus" style="font-size:13px;color:green;"></i> Départ le  <span class="todate">'+datefro+' </span></span>');
		 
		 if(s==1){
		 $('.nbjour').append('Durée : <span class="det">'+s+'jour</span>');
		 }
		 if(s > 1){
			$('.nbjour').append('Durée : <span class="det">'+s+'jours</span>');			  
		 }
		 $('.content1').css('display','block');
		 $('.content2').css('display','block');
		 $('#pak').css('display','none');
	     $('#examp').css('display','none');
		 $('.content_home').css('display','block');
		 $('.text').css('display','block');
		 $('.tex').css('display','none');
		 $('#nbjour').val(s);
		 }
		 
		 else{
			$('.errors').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>la date de départ ne dois pas etre inférieur à celle de l\'entréé'); 
		 }
		 
		 }
		 
		 else{
			 $('#das').css('border-color','red'); 
		 }
		 
		 }
		 
		 else{
			$('#days').css('border-color','red');  
		 }
		 
		 }
		 
		 else{
			 
			 if(date1 < date2){
			$('#h3').text('Réservation'); 
			$('.de').text(name);
			$('.des').text(numero);
			$('.from').text(datefrom);
			$('.todate').text(datefro);
			
			if(s==1){
			$('.det').text(s+'jour');
			
			}
			
			if(s > 1){
				$('.det').text(s+'jours');
			}
			$('.content1').css('display','block');
			$('.content2').css('display','block');
		    $('#pak').css('display','none');
	        $('#examp').css('display','none');
		    $('.content_home').css('display','block');
			$('.text').css('display','block');
		    $('.tex').css('display','none');
		    $('#nbjour').val(s);
			
		 }
		 
		 else{
			$('.errors').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>la date de départ ne dois pas etre inférieur à celle de l\'entréé'); 
		 }
		 
		}
	 }
	 
     
	}
	 
 });
 
 
 $('.buttons').click(function(){
	
     var days = $('#days').val();
	 var das = $('#das').val();
	 var tim = $('#tim').val();
	 var tis =$('#tis').val();	
	 var to =$('#to').val();
	 var dat =$('#dat').val();
	
	var dat = $('#dat').val();
	 var name = $('#name').val();
	 var piece = $('#piece').val();
	 
	 var dat = $('#dat').val();
	 var name = $('#name').val();
	 var piece = $('#piece').val();
	 
	 if(name.length!="" && name.length!="" && piece.length!=""){
	
	$.ajax({
	type: 'POST', // on envoi les donnes
	url: 'list_data_home.php',// on traite par la fichier
	data:{days:days,das:das,tim:tim,tis:tis,to:to,dat:dat},
	success:function(data) { // on traite le fichier recherche apres le retour
		$('#resultat_home').html(data);
		$('.content_home').css('display','block');
		
		if(to=="séjour" || to=="réservation"){
		$('.text').css('display','block');
		$('.tex').css('display','none');
        $('.content1').css('display','block');
		$('.content2').css('display','block');		
		}
		
		if(to=="horaire"){
			
			$('.content1').css('display','block');
			$('.content2').css('display','block');
		    $('.text').css('display','none');
			$('.tex').css('display','block');
			
		}
	
	 },
	 
	}); 
	 }
});
 
 // on récupére les données pour créer un user recaptitulatif
 
 $(document).on('click','.add_home',function() {

	var id = $(this).data('id2'); // on recupère l'id.
    var action ="add";
	// recupération des variable
	var nbjour = $('#nbjour').val();
	var chambre = $('#chambre'+id).val();
	var type = $('#type'+id).val();
	var prix_nuite = $('#prix'+id).val();
	var prix_pass = $('#pric'+id).val();
	var paynuite = $('#cout_nuite'+id).val();
	var paypass = $('#cout_pass'+id).val();
	var to = $('#to').val();
	var days = $('#days').val();
	 var das = $('#das').val();
	 var tim = $('#tim').val();
	 var tis =$('#tis').val();
	 var dat =$('#dat').val();
	
	
	// on lance l'apel ajax
	$.ajax({
	type: 'POST', // on envoi les donnes
	url: 'add_home.php',// on traite par la fichier
	data:{id:id,nbjour:nbjour,days:days,das:das,tim:tim,tis:tis,to:to,chambre:chambre,type:type,prix_nuite:prix_nuite,prix_pass:prix_pass,paynuite:paynuite,paypass:paypass,dat:dat,action:action},
	success:function(data) { // on traite le fichier recherche apres le retour
		$('#results').html(data);
	
	 },
	 error: function() {
    alert('vérifier votre connexion'); }
	 
	});

	});
	
	// recupération et caclul des montants
	
	// fonction remove pour suprimer un local de la liste
	$(document).on('click','.remove',function(){
		var action ="remove";
		var id = $(this).data('id3');
		var nbjour = $('#nbjour').val();
	    var chambre = $('#chambre'+id).val();
	    var type = $('#type'+id).val();
	    var prix_nuite = $('#prix'+id).val();
	    var prix_pass = $('#pric'+id).val();
	    var paynuite = $('#cout_nuite'+id).val();
	    var paypass = $('#cout_pass'+id).val();
	    var to = $('#to').val();
		
	// on lance l'apel ajax
	  $.ajax({
	  type: 'POST', // on envoi les donnes
	  url: 'add_home.php',// on traite par la fichier
	  data:{id:id,nbjour:nbjour,to:to,chambre:chambre,type:type,prix_nuite:prix_nuite,prix_pass:prix_pass,paynuite:paynuite,paypass:paypass,action:action},
	success:function(data) { // on traite le fichier recherche apres le retouy
		$('#results').html(data);

      },
	 error: function() {
    alert('vérifier votre connexion'); }
	 
	});
		
	});
	
	// calculer les sommes automatiquement du récapitualitif
	
	$(document).on('keyup','#tva',function(){
		
	var tva = $('#tva').val();
	var totals =$('#total').val();
	var monta = $('.monta').text();
	
	
	if(tva > 0 && tva.length <3 && tva.length!=""){
	var result = parseFloat(totals)*parseFloat(tva);
	var resul = parseFloat(result)/100;
	var results = resul.toFixed(2);
	var t = parseFloat(results)+parseFloat(totals);
	var ts = t.toFixed(2);
	$('.tva').html('<span class="taxe">'+results+'</span> xof<input type="hidden" name="taxe" value="'+results+'">');	
	$('.monta').text(ts);
	}

    if(tva.length ==""){
     var results = 0;
	$('.tva').html('<span class="taxe">'+results+'</span> xof<input type="hidden" name="taxe" value="'+results+'">');	
    $('.monta').text(totals);
	}		
  });
  
  $(document).on('keyup','#account',function(){
	 var totals =  $('.monta').text();	 
	 var account = $('#account').val();
	 if(account >0){
		var result = parseFloat(totals) - parseFloat(account);
        $('#rpay').val(result);
	 }
	 
	 if(account.length ==""){
		$('#rpay').val(0);	
	}
	  
  });
  
  // afficher les données des encaissements
  function load() {
				var action="fetch";
				$.ajax({
					url: "affichage_donnees.php",
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
	
     
	  
	 $(document).on('click','#add_local', function() {
	// on traite le fichier recherche apres le retour
	  var acomp = $('#account').val();
	  if(acomp==""){
		 acomp =0; 
	  }
	  var montas = $('#total').val();
	  var result = parseFloat(acomp);
	  var result1 = parseFloat(montas);
	  if(result < result1){
	   $('#form1').submit();
	   }
	   else{
		 // inséré un petit message pour 
	  $('.eror').html('<div style="color:#AB040E;font-size:13px;"><i class="fas fa-check-circle" style="color:#AB040E;font-size:12px"></i> l\'acompte doit etre <br/>inférieur au montant httc');  
	   }
	});
	 
	 // envoi du formulaire
	 
	 $('#form_reini').on('submit', function(event) {
	event.preventDefault();
	
	var action="dat";
	var date=$('#reini').val();
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'affichage_donnees.php',// on traite par la fichier
	data:{action:action,date:date},
	success:function(data) { // on traite le fichier recherche apres le retour
      $('#pak').css('display','none');
	  $('#result_reini').html(data);
	  $('.reini').css('display','none');
	  load();
	 
	}
    });
	
	setInterval(function(){
		 $('#result_reini').html('');
	 },6000);
	  
	  
  });

});
</script>
</body>

</html>