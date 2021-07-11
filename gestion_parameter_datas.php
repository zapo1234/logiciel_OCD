<?php
include('connecte_db.php');
include('inc_session.php');

  $req=$bdd->prepare('SELECT id,email_ocd,email_user,denomination,password,user,numero,permission,user,categories FROM inscription_client WHERE email_ocd= :email_ocd');
   $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
   

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
#pak{position: fixed;top: 0;left: 0;width:100%;height: 100%;background-color: black;z-index:2;opacity: 0.6;}

.bg{font-weight:bold;color:black;font-size:13px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"}
.tot{margin-bottom:10px;} #add_local{height:35px;margin-left:4%;border:2px solid #E5F1FB;#font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";margin-left:15px;margin-top:10px;width:150px;color:black;background:#E5F1FB;padding:1%;}

#pak{position:fixed;top:0;left:0;width:100%;height:100%;background-color:black;z-index:2;opacity: 0.8;}
.der1,.der2,.der3,.der4,.der5,.der6{color:black;cursor:pointer;width:240px;float:left;text-align:center;border:1px solid #eee;padding:1%;height:45px;} .color{background:#ACD6EA;font-weight:bold;} .home{color:#111E7F;font-size:18px;font-weight:bold;}
.side{color:#A9D3F2;padding:35%;text-align:center;margin-left:-8%;width:160px;height:160px;border-radius:50%;background:white;border:2px solid white;margin-top:95px;}

#der11{width:60%;margin-left:15%;} td{width:500px;color:black;padding-top:20px;}
#der12{width:60%;margin-left:15%;display:none;}
#der13{width:65%;margin-left:10%;display:none;}
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
#form3{width:40%;height:550px;background:white;border:2px solid white;padding:0.2%;position:absolute;left:25%;top:150px;z-index:4;}
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
					<li>Fournir un logo qui serait visualiser sur vos facture</li>
					<li>Des informations restent facultavES</li>
					<li>Respecter 60 caractères minimum(nom,email)</li>

                    </div>					
                    
					</div><!--lexique 1-->
					
					<div class="bs">
                     <div class="titre">Instruction 2</div>  
                    
					<li>Ajouter des comptes pour vos employés</li>
					<li>Possibilité d'ajouter 5 compte maximum</li>
					<li>Fournir un email et un mot de pass</li>
					<li>Mot de pass doit etre au plus de 12 caractères<br/>(une lettre(miniscule et majuscule),un nombre,)
					  un caractère contenant(@!$#) obligatoire</li>
                    <li>lister vos utilisateur et gérer les actions</li>					  
                    </div>
					
					<div class="bs">
                     <div class="titre">Instruction 3</div>  
					<li>Ajouter des comptes pour vos employés</li>
					<li>Possibilité d'ajouter 5 compte maximum</li>
					<li>Fournir un email et un mot de pass</li>
					<li>Mot de pass doit etre au plus de 12 caractères<br/>(une lettre(miniscule et majuscule),un nombre,)
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
					 
					 <div id="der12">
					 <h2>Créer un compte pour votre collaborateur</h2>
					 <form method="post" id="form2" action="">
                     <div class="form-row">
                    <div class="col">
                       <label>Nom </label><br/><input type="text" class="form-control" id="nom" name="nom" placeholder="nom" required>
                      <br/><span class="nom"></span></div>
                    <div class="col">
                    <label>Prénom</label><br/><input type="text" class="form-control" id="prenom" name="prenom" placeholder="prenom" required>
                    <br/><span class="prenom"></span></div>
				 
                 </div>
				 
				 <div class="form-row">
                    <div class="col">
                       <label>Numéro télephone</label><br/><input type="text" id="num" name="num" class="form-control" placeholder="numero">
                      <br/><span class="num"></span></div>
                    <div class="col">
                    <br/><select id="role" name="role" required>
                   <option value="">Attribuer un role</option>
                 <option value="1">Dirigeant</option>
				 <option value="2">Responsable</option>
                  <option value="3">Gestionnaire</option>
                  <option value="4">Réceptionniste(caisse)</option>
               </select>
                    <br/><span class="role"></span></div>
				 
                 </div>
				 
				 <div class="form-row">
                    <div class="col">
                       <label>Email(utilisé)</label><br/><input type="text" id="emails" name="emails" class="form-control" placeholder="First name" required><br/>
					   <span class="emails"></span>
                      </div>
                    <div class="col">
                   <label>Mot de pass</label> <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required>
                    <br/><span class="pass"></span></div>
				 <input type="hidden" name="token" id="token" value="<?php echo $_SESSION['token'];?>">
                 </div>
				 
				 
				 <div class="form-row">
                    <div class="col">
                       <input type="submit" id="names" value="créer le compte">
                      </div>
				  <div id="data"></div><!--ajax--->
                 </div>
				 
                  </form>
					 
					 </div><!--der12-->
					 
					 <div id="der11">
					 <form method="post" id="form1"  enctype="multipart/form-data">
					 <h2>Informations sur votre entreprise</h2>
                     <div class="form-row">
                    <div class="col">
                       <label>Nom de la societé(dénomination)</label><br/><input type="text" id="nam" name="nam" class="form-control" placeholder="First name" required><br/>
					   <span class="nam"></span>
                      </div>
                    <div class="col">
                    <label>Email(societé)</label><br/><input type="text" id="email" name="email" class="form-control" placeholder="Last name" required><br/>
					<span class="email"></span>
                    </div>
				 
                 </div>
				 
				 <div class="form-row">
                    <div class="col">
                       <label>Numéro télephone</label><br/><input type="text" id="numero" name="numero" class="form-control" placeholder="First name"><br/>
					   <span class="numero"></span>
                      </div>
                    <div class="col">
                    <label>Numéro sécondaire(si existe)</label><br/><input type="text" id="numero1" name="numero1" class="form-control" placeholder="Last name"><br/>
					<span class="numero1"></span>
                    </div>
				 
                 </div>
				 
				 <div class="form-row">
                    <div class="col">
                       <label>Adresse</label><br/><input type="text" id="adress" name="adress" class="form-control" placeholder="First name"><br/>
					   <span class="adress"></span>
                      </div>
                    <div class="col">
                   <label>Adresse suite</label> <input type="text" id="adress1" name="adress1" class="form-control" placeholder="Last name">
                    </div>
				 
                 </div>
				 
				 <div class="form-row">
                    <div class="col">
                       <label>N° d'enregistrement</label><br/><input type="text" id="enre" name="enre" class="form-control" placeholder="First name">
                      </div>
                    <div class="col">
                   <label>N° de compte contribuable</label> <input type="text" id="compt" name="compt" class="form-control" placeholder="Last name">
                    </div>
				 
                 </div>
				 
				 <div class="form-row">
                    <div class="col">
                       <label>Importer votre logo</label><input type="file" name="logo" class="form-control" placeholder="First name">
                      <input type="hidden" name="token" id="token" value="<?php echo $_SESSION['token'];?>">
					  </div>
				 
                 </div>
				 
				 <div class="form-row">
                    <div class="col">
                       <input type="submit" id="name" value="Valider">
                      </div>
				  
                 </div>
				 <div id="datas"></div><!--datas retour ajax -->
				 </form>
					 
					 
					 </div><!--der12-->
					 
					 
					<div id="der13">
					<h2>Liste des utilisateurs de votre compte</h2>
					 
					 <div id="resultat"></div>
					 
					 </div><!--der13-->
					 
					  <div id="der14">
					     
					    </div><!--der15-->
				  
				  
					
					 
					 <div id="der15">
					 <h2>Modifier votre mot de pass</h2>
					 <form method="post" id="form4" action="">
                     <div class="form-row">
                    <div class="col">
                   <label>Nouveau Mot de pass</label><br/><input type="password" class="form-control" name="pass" id="pass" required>
                    <br/><span class="pass"></span></div>
                    </div>
					 <input type="submit" id="modipass" value="Nouveau mot de pass">
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
<!--div black-->
<div id="pak" style="display:none"></div>

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
 
 $('#pak').click(function(){
	$('#examp').css('display','none');
   $('#pak').css('display','none');
   $('.reini').css('display','none');
   $('#form3').css('display','none');
 });
 
    $('.der1').click(function(){
	$('.der1').css({"border-bottom":"3px solid #0661BC","color":"#0661BC"});
	$('.der3').css({"border":"1px solid #eee","color":"black"});
	$('.der4').css({"border":"1px solid #eee","color":"black"});
	$('.der5').css({"border":"1px solid #eee","color":"black"});
	$('.der2').css({"border":"1px solid #eee","color":"black"});
	$('#der11').css('display','block');
	$('#der12').css('display','none');
	$('#der13').css('display','none');
	$('#der14').css('display','none');
	$('#der15').css('display','none');
	});
 
 $('.der2').click(function(){
 $('.der1').css({"border":"1px solid #eee","color":"black"});
 $('.der2').css({"border-bottom":"4px solid #0661BC","color":"#0661BC"});
 $('.der3').css({"border":"1px solid #eee","color":"black"});
 $('.der4').css({"border":"1px solid #eee","color":"black"});
 $('.der5').css({"border":"1px solid #eee","color":"black"});
 $('#der11').css('display','none');
 $('#der12').css('display','block');
 $('#der13').css('display','none');
 $('#der14').css('display','none');
 $('#der15').css('display','none'); 
 });
 
 $('.der3').click(function(){
 $('.der1').css({"border":"1px solid #eee","color":"black"});
 $('.der3').css({"border-bottom":"4px solid #0661BC","color":"#0661BC"});
 $('.der2').css({"border":"1px solid #eee","color":"black"});
 $('.der4').css({"border":"1px solid #eee","color":"black"});
 $('.der5').css({"border":"1px solid #eee","color":"black"});
 $('#der11').css('display','none');
 $('#der12').css('display','none');
 $('#der13').css('display','block');
 $('#der14').css('display','none');
 $('#der15').css('display','none');
 });
 
 $('.der4').click(function(){
 $('.der1').css({"border":"1px solid #eee","color":"black"});
 $('.der4').css({"border-bottom":"4px solid #0661BC","color":"#0661BC"});
 $('.der2').css({"border":"1px solid #eee","color":"black"});
 $('.der3').css({"border":"1px solid #eee","color":"black"});
 $('.der5').css({"border":"1px solid #eee","color":"black"});
 $('#der11').css('display','none');
 $('#der12').css('display','none');
 $('#der13').css('display','none');
 $('#der14').css('display','block');
 $('#der15').css('display','none');
 });
 
 $('.der5').click(function(){
 $('.der1').css({"border":"1px solid #eee","color":"black"});
 $('.der5').css({"border-bottom":"4px solid #0661BC","color":"#0661BC"});
 $('.der2').css({"border":"1px solid #eee","color":"black"});
 $('.der3').css({"border":"1px solid #eee","color":"black"});
 $('.der4').css({"border":"1px solid #eee","color":"black"});
 $('#der11').css('display','none');
 $('#der12').css('display','none');
 $('#der13').css('display','none');
 $('#der14').css('display','none');
 $('#der15').css('display','block');
 });
 
  $('#form1').on('submit', function(event) {
	event.preventDefault();
      
	 var form_data = $(this).serialize();
	 var nam = $('#nam').val();
	 var adress = $('#adress').val();
	 var adress = $('#adress1').val();
	 var numero = $('#numero').val();
	 var numero1 = $('#numero1').val();
	 var compt = $('#compt').val();
	 var enre = $('#enre').val();
	 var email = $('#email').val();
	 
	// regex //
	var regex = /^[a-zA-Z0-9éèàç]{2,25}(\s[a-zA-Z0-9éèàçà]{2,25}){0,4}$/;
    var rege = /^[a-zA-Z0-9-çéèàèç°]{1,25}(\s[a-zA-Z0-9-°]{1,25}){0,2}$/;
    var number = /^[0-9+]{8,14}$/;
	var reg = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    
	
   if(nam.length==""){
		$('#nam').css('border-color','red');
		
	}
	 
	 else if (nam.length > 60){
      $('.nam').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> le nombre de caractères du nom ne doit pas depassé 60');
    }
	
	else if (adress.length >100){
      $('.adress').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> l\'adresse ne doit pas dépasser 100 caractères');
    }
	 
	 else if (!reg.test(email)){
      $('.email').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur de syntaxe sur l\'email ');
    }
	
	 else if (!number.test(numero)){
      $('.numero').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur  sur la syntaxe du numéro de téléphone ');
    }
	
	
	 else if (numero.length > 14){
      $('.numero').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> le numéro de télephone ne doit pas depasser 14chiffres');
    }
	
	else if (enre.length > 14){
      $('.enre').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> le numéro d\'immatricualtion ne doit pas dépasser 14chiffres');
    }
	
	else if (compt.length > 14){
      $('.compt').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> le numéro du compte contribuable ne doit pas depasser 14chiffres');
    }
	
	else{
		
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'datas_parameter.php',// on traite par la fichier
	async: false,
	data:new FormData(this),
	contentType:false,
	processData:false,
	success:function(data) { // on traite le fichier recherche apres le retour
     $('#datas').html(data);
	 
	}
    });
	
	setInterval(function(){
		 $('#datas').html('');
		 location.reload(true);
	 },5000);
		
	}
	
 });
  
  $(document).on('click','#names', function(event) {
	  event.preventDefault();
	  
	  var action="parameter";
	 var form_data = $(this).serialize();
	 var nom = $('#nom').val();
	 var role = $('#role').val();
	 var prenom = $('#prenom').val();
	 var password = $('#pass').val();
	 var num =$('#num').val();
	 var emails = $('#emails').val();
	 
	 // regex //
	var regex = /^[a-zA-Z0-9éèàç]{2,25}(\s[a-zA-Z0-9éèàçà]{2,25}){0,4}$/;
    var rege = /^[a-zA-Z0-9-çéèàèç°]{1,25}(\s[a-zA-Z0-9-°]{1,25}){0,2}$/;
    var number = /^[0-9+]{8,14}$/;
	var reg = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
	var pass = /^(?=.*\d)(?=.*[A-Za-z])(?=.*[!@#$%])[0-9A-Za-z!@#$%]{8,12}$/;// contient une lettre, un chiffre et au moin un caractère spéciale
	
	if(nom.length==""){
		$('#nom').css('border-color','red');
		
	}
	 
	 else if (nom.length > 60){
      $('.nom').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> le nombre de caractères du nom ne doit pas depasser 60');
    }
	
	else if (role==""){
      $('.role').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> vous devez choisir un role pour l\'utilisateur');
    }
	 
	 else if (!reg.test(emails)){
      $('.email').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur de syntaxe sur l\'email');
    }
	
	else if (nom.length > 12){
      $('.pass').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> le nombre de caractères du mot de pass ne doit pas depasser 12');
    }
	
	else if (!pass.test(password)){
      $('.pass').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> le mot de pass doit contenir une lettre, un chiffre et un caractère sépcial(!$@#)');
    }
	
	 else if (!number.test(num)){
      $('.num').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur sur la syntaxe du numéro de téléphone');
    }
	
	
	else{
		
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'result_view_home.php',// on traite par la fichier
	data:{action:action,emails:emails,num:num,prenom:prenom,password:password,nom:nom,role:role},
	success:function(data) { // on traite le fichier recherche apres le retour
     $('#data').html(data);
	 
	}
    });
	
	setInterval(function(){
		 $('#data').html('');
		 location.reload(true);
	 },5000);
		
	}
	 
	  
	});
	
	// afficher les user
	function load() {
				var action="add_user";
				$.ajax({
					url: "result_view_home.php",
					method: "POST",
					data:{action:action},
					success: function(data) {
						$('#resultat').html(data);
					}
				});
			}

			load();
	
	$(document).on('click','.delete', function() {
	 var action="delete";
	 var id = $(this).data('id2');
	 $.ajax({
	type:'POST', // on envoi les donnes
	url:'result_view_home.php',// on traite par la fichier
	data:{action:action,id:id},
	success:function(data) { // on traite le fichier recherche apres le retour
     $('#data').html(data);
	 load();
	 }
    });
	
	setInterval(function(){
		 $('#data').html('');
		 location.reload(true);
	 },5000);
    	 
	});
	
	$(document).on('click','.edit', function() {
	 var action="edit";
	 var id = $(this).data('id1');
	 
	 $.ajax({
	type:'POST', // on envoi les donnes
	url:'result_view_home.php',// on traite par la fichier
	data:{action:action,id:id},
	success:function(data) { // on traite le fichier recherche apres le retour
     $('#pak').css('display','block');
	 $('#datos').html(data);
	 }
    });
	
    	 
	});
	
	$(document).on('click','.bl', function() {
	 var action="bloquer";
	 var id = $(this).data('id3');
	 
	 $.ajax({
	type:'POST', // on envoi les donnes
	url:'result_view_home.php',// on traite par la fichier
	data:{action:action,id:id},
	success:function(data) { // on traite le fichier recherche apres le retour
	 $('#datos').html(data);
	 load();
	 }
    });
	
	setInterval(function(){
		 $('#datos').html('');
		 location.reload(true);
	 },5000);
    	 
	});
	
	$(document).on('click','.acs', function() {
	 var action="acces";
	 var id = $(this).data('id4');
	 
	 $.ajax({
	type:'POST', // on envoi les donnes
	url:'result_view_home.php',// on traite par la fichier
	data:{action:action,id:id},
	success:function(data) { // on traite le fichier recherche apres le retour
	 $('#datos').html(data);
	 load();
	 }
    });
	
	setInterval(function(){
		 $('#datos').html('');
		 location.reload(true);
	 },5000);
    	 
	});
	
	$(document).on('click','#modifier', function() {
	event.preventDefault();
	var action="editvalide";
	 var form_data = $(this).serialize();
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
	
	if(nom.length==""){
		$('#noms').css('border-color','red');
		
	}
	 
	 else if (noms.length > 60){
      $('.noms').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> le nombre de caractères du nom ne doit pas depasser 60');
    }
	
	else if (role==""){
      $('.roles').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> vous devez choisir un role pour l\'utilisateur');
    }
	 
	 else if (!reg.test(emais)){
      $('.emais').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur de syntaxe sur l\'email');
    }
	
	else if (password!=""){
      
	  if (pas.length > 12){
      $('.pas').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> le nombre de caractères du mot de pass ne doit pas depasser 12');
    }
	
	if (!pass.test(password)){
      $('.pas').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> le mot de pass doit contenir une lettre, un chiffre et un caractère sépcial(!$@#)');
    }
	
	  $('.pas').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> le nombre de caractères du mot de pass ne doit pas depasser 12');
    }
	 else if (!number.test(nums)){
      $('.nums').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur sur la syntaxe du numéro de téléphone');
    }
	
	else{
		
		$.ajax({
	type:'POST', // on envoi les donnes
	url:'result_view_home.php',// on traite par la fichier
	data:{action:action,ids:ids,emais:emais,nums:nums,prenom:prenom,password:password,noms:noms,roles:roles},
	success:function(data) { // on traite le fichier recherche apres le retour
     $('#data').html(data);
	  load();
	}
	
	});
	}
	
	});
	
	$('#form4').on('submit', function(event) {
	event.preventDefault();
	var action= "modipass";
	var pass = $('#pass').val();
	var pas = /^(?=.*\d)(?=.*[A-Za-z])(?=.*[!@#$%])[0-9A-Za-z!@#$%]{8,12}$/;// contient une lettre, un chiffre et au moin un caractère spéciale
      
	if(pass.length==""){
		$('#pass').css('border-color','red');
	}
	
	else if (!pas.test(pass)){
      $('.pass').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>Erreur sur la syntaxe du mot de pass');
    }
	
	else{
		
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'result_view_home.php',// on traite par la fichier
	data:{pass:pass,action:action},
	success:function(data) { // on traite le fichier recherche apres le retour
     $('#datos').html(data);
		
	}
	
	});
		
	}
	});
 
 });
</script>
</body>

</html>