<?php
include('connecte_db.php');
include('inc_session.php');

 if(!isset($_GET['home'])) {
	 
	 header('location:index.php');
 }
 
 else{
 
  // requete pour aller chercher les valeurs 
   $home = $_GET['home'];
  // emttre la requete sur le fonction
    $req=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,occupant,nombre_lits,equipements,equipement,cout_nuite,cout_pass,icons,infos,type FROM chambre WHERE id_chambre= :id_chambre AND email_ocd= :email_ocd');
    $req->execute(array(':id_chambre'=>$home,
	                    ':email_ocd'=>$_SESSION['email_ocd']
						));
	
	$datas = $req->fetch();
    $req->closeCursor();
	
	// emttre la requete sur le fonction
    $ret=$bds->prepare('SELECT date,date_french,type FROM home_occupation WHERE id_chambre= :id_chambre AND email_ocd= :email_ocd');
    $ret->execute(array(':id_chambre'=>$home,
	                    ':email_ocd'=>$_SESSION['email_ocd']
						));
	
	
	// recupére les images existant

	$res=$bds->prepare('SELECT id,name_upload FROM photo_chambre WHERE id_chambre= :id_chambre AND email_ocd= :email_ocd');
    $res->execute(array(':id_chambre'=>$home,
	                    ':email_ocd'=>$_SESSION['email_ocd']
					   ));
					   
    
					   
    $rem='<span class="ts"></span>';
	$rt=",";
	$rs='<span class="ts"><i style="font-size:12px" class="fa">&#xf00c;</i></span>';
	$re ='<span class="re">.</span>';
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
    .bs{background:white;width:340px;border:2px solid #eee;height:300px;padding:4%;margin-top:0px;}
    .en{height:50px;border-bottom:1px solid #eee;} .h1{font-size:24px; text-align:center;} .encaiss{font-size:16px;font-weight:none;} .h2{margin-top:70px;margin-left:10%;} .t_monts,.t_mont,.t_mon{font-size:18px;margin-left:-20px;}
	#montant td{font-weight:none;} .butt{height:35px;border-radius:15px;padding:1.5%;width:180px;font-weight:200;background:#F026FA;color:white;font-size:20px;border:2px solid #F026FA;}
	.t_monts{color:#42FC72;} .t_mont{color:#FA2367;} .t_mon{color:#14B5FA;}
.center{background-color:white;width:80%;height:1050px;padding:1.5%;margin-top:5px;} .inputs,.input{margin-left:5%;float:left;}
.nav-search{width:70%;} .form-select{margin-left:40%;width:200px;height:43px;}
.inputs{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;font-weight:bold;color:green;}
#pak{position: fixed;top: 0;left: 0;width:100%;height: 100%;background-color: black;z-index:2;opacity: 0.6;}

.bg{font-weight:bold;color:black;font-size:13px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"}
.tot{margin-bottom:10px;} #add_local{height:35px;margin-left:4%;border:2px solid #E5F1FB;#font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";margin-left:15px;margin-top:10px;width:150px;color:black;background:#E5F1FB;padding:1%;}
.reini{padding:2%;z-index:3;position:absolute;top:300px;left:40%;background-color:white;width:350px;height:220px;border-radius:10px;border:3px solid white;}
.action{margin-top:25px;} .annul{border-radius:15px;width:120px;height:30px;background-color:#FF4500;color:white;border:2px solid #FF4500;}
.ok{width:45px;height:45px;border-radius:50%;margin-left:30%;background-color:#1E90FF;border:2px solid #1E90FF} #reini{margin-left:2%;height:40px;width:130px;font-family:arial;}

#pak{position:fixed;top:0;left:0;width:100%;height:100%;background-color:white;z-index:2;opacity: 0.9;}
.der1,.der2,.der3,.der4,.der5,.der6{color:black;cursor:pointer;width:240px;float:left;text-align:center;border:1px solid #eee;padding:1%;height:45px;} .color{background:#ACD6EA;font-weight:bold;} .home{color:#111E7F;font-size:18px;font-weight:bold;}
.side{color:#A9D3F2;padding:35%;text-align:center;margin-left:-8%;width:160px;height:160px;border-radius:50%;background:white;border:2px solid white;margin-top:95px;}

#der11{width:58%;border:1px solid #eee;margin-left:0%;padding:2%;} td{width:500px;color:black;padding-top:20px;}
#der12{width:58%;border:1px solid #eee;margin-left:19%;padding:2%;display:none;}
#der13{width:58%;border:1px solid #eee;margin-left:37.5%;padding:4%;display:none;}
#der14{width:58%;border:1px solid #eee;margin-left:37.5%;padding:4%;display:none;}
#der15{padding:3%;width:48%;border:1px solid #eee;margin-left:47.5%;padding:4%;display:none;}
.der1{border-bottom:4px solid #0661BC;color:#0661BC;}
.def{color:black;}
h2{color:black;font-weight:none;text-align:center;margin-top:80px;margin-left:35%;width:400px;border-bottom:1px solid #eee;font-family:arial;}
h3{font-size:18px;color:#C80620;font-weight:bold;margin-top:10px;}
h4{font-size:18px;color:black;font-weight:bold;margin-top:10px;}
ul a{margin-left:3%;} #form_logo{display:none;} 

.remove-padding {
  padding: 0;
}

img {
  image-rendering: auto;
}


.ts{padding-left:7px;color:black;} .t_name{color:#15CD09;font-weight:bold;font-family:arial;}
.dt{padding-left:2px;} .dr{margin-left:25%;width:150px;height:47px;background:#15CD09;border:2px solid #15CD09;border-radius:10px;}
.re{padding-left:8px;} .tar{font-size:20px;color:#06A5C8;}
.acces{margin-left:25%;width:150px;background:#EA6D11;border:2px solid #EA6D11;color:white;height:35px;border-radius:15px;}
.access{margin-left:25%;width:150px;background:#15CD09;border:2px solid #15CD09;color:white;height:35px;border-radius:15px;}
#logo{position:absolute;top:6px;left:1.7%;border-radius:50%;}
</style>

</head>

<body id="page-top">

        <?php include('inc_menu_principale.php');?>
        <!-- End of Sidebar -->
        
         <div id="collapse" class="collapse show" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bs">
                        
                    </div>
					
					<div class="bs">
                        
                    </div>
					
					<div class="bs">
                        
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
                    <div class="content1"><div class="der1"><i class="fas fa-home"></i> Type de local</div><div class="der2"><i class="fas fa-info-circle"></i> information du local</i></div>
					 <div class="der3"><i class="fas fa-table"></i> Disponibilité</div> <div class="der4"><i class="fas fa-laptop-house"></i> Statistique d'occupation </div> <div class="der5"><i class="fas fa-key"></i>Accès au local</div></div>
                     
					 <div class="content2">
					 
					 <div id="der11">
					 <table>
					 <tr>
					 <td><i class="far fa-circle" style="font-size:14px"></i><span class="t_name"> Type </span> <br/><?php echo $datas['type_logement'];?></td>
					 <td><i class="far fa-circle" style="font-size:14px"></i><span class="t_name"> Local désignée :</span> <br/> <?php echo $datas['chambre'];?></td>
					 </tr>
					 <tr>
					 <td><i class="far fa-circle" style="font-size:14px"></i><span class="t_name"> Description :</span> <br/><?php echo $datas['infos'];?></td>
					
					 </tr>
					 
					 </table>
					 
					 </div><!--der11-->
					 
					 <div id="der12">
					 <table>
					 <tr>
					 <td><i class="far fa-circle" style="font-size:14px"></i><span class="t_name"> Nombre d'occupant(s)(min)</span> : <br/><?php echo $datas['occupant'];?></td>
					 <td><i class="far fa-circle" style="font-size:14px"></i><span class="t_name"> Nombre de lit(s) :</span> <br/> <?php echo $datas['nombre_lits'];?></td>
					 </tr>
					 <tr>
					 <td><i class="far fa-circle" style="font-size:14px"></i><span class="t_name"> Prix/nuité :</span> <br/><?php echo $datas['cout_nuite'];?>xof</td>
					 <td><i class="far fa-circle" style="font-size:14px"></i><span class="t_name"> Prix/horaire :</span> <br/><?php echo $datas['cout_pass'];?>xof</td>
					</tr>
					<tr>
					 <td><i class="far fa-circle" style="font-size:14px"></i><span class="t_name"> Equipements principales : </span><br/><?php echo $datas['equipement'];?></td>
					 <td><i class="far fa-circle" style="font-size:14px"></i><span class="t_name"> Equipement sécondaires : </span><br/><?php  echo str_replace($rt,$rs,$datas['equipements']);?></td>
					</tr>
					 </table>
					 </div><!--der12-->
					 
					 
					 <?php
					 
					 echo'<div id="der13">
					 <h3><i class="fas fa-minus-circle"></i> Ce local est indisponible aux dates suivantes</h3>
					 <div class="def">Motif(pour cas de réservation,présence clients au sein du local,travaux ou divers)</div>
					 ';
					 
					 if(!empty($ret)){
						$donnes =$ret->fetchAll(); 
					 $tab =[]; // pour les séjour facturé
					 $array =[];// pour les réservation
					 $ses =[]; // pour les horaire facturé
					 foreach($donnes as $dats){
						
					$data = $dats['date_french'];
                      
					  
					 // pour les statisque
					    $datos = $dats['type'].',';
					  // on trans forme sous forme de tableau
					   $dat =explode(',',$datos);  
						 foreach($dat as $datas){
                         // mettre les élements dans un tableau $tab pour les séjour facturé
						 if($datas ==1){
						  $tab[] = $datas;							
						}
						// mettre les élements dans un tableau $array pour les réservations
						if($datas ==2){
						  $array[] = $datas;							
						}
						// mettre les élements 
						if($datas ==3) {
						$ses[] = $datas;
						}
	                }
					}
			         echo'<span>'.str_replace($rt,$re,$data).'</span><br/><br/>';
					echo'<button class="dr">Actualiser la liste<br/>regulièrement</button></div>';
					
					  // on compte le nombre 
					 // on compte le nombre d'elements dans les tableau
                        $a = count($tab);
                        $b = count($array);
                        $c = count($ses);
						
					// afficher la div 14
					
					echo'<div id="der14">
					     <h4>Visualiser les cas d\'utilisation du local par les clients à ce jour</h4>
						 <div class="tar"><i class="fas fa-check-circle" style="font-size:18px"></i> '.$a.' séjour(s) consommés</div><br/>
						 <div class="tar"><i class="fas fa-check-circle" style="font-size:18px"></i> '.$b.' réservation(s) </div><br/>
						 <div class="tar"><i class="fas fa-check-circle" style="font-size:18px"></i> '.$c.' passage(s) horaire</div>
					    </div>';
				  }
				  
					?>
					 
					 <div id="result"></div><!--div result-->
					 
					 </div>
					 
					<div class="content3">
					<h2><i class="fas fa-camera"></i> Les images du local</h2>
					<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
	
	<?php
	while($data =$res->fetch()) {
	echo'<img src="upload_image/'.$data['name_upload'].'" class="d-block w-100" alt="...">';
	}
	?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
					
					
                   
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
 
 $('.acess').click(function(){
	 var id = $(this).data('id1');
	 var action="acess";
	 $.ajax({
	type:'POST', // on envoi les donnes
	url:'result_view_home.php',// on traite par la fichier
	data:{id:id,action:action},
	success:function(data) { // on traite le fichier recherche apres le retour
	  $('#result').html(data)
	 
	}
  });
 });
 
 // afficher les données des encaissements
  function load() {
				var action="fetch";
				$.ajax({
					url: "result_view_home.php?home=<?php echo$_GET['home'];?>",
					method: "POST",
					data:{action:action},
					success: function(data) {
						$('#result').html(data);
					}
				});
			}

			load();
 
 
 $('.access').click(function(){
	 var id = $(this).data('id1');
	 var action="access";
	 $.ajax({
	type:'POST', // on envoi les donnes
	url:'result_view_home.php',// on traite par la fichier
	data:{id:id,action:action},
	success:function(data) { // on traite le fichier recherche apres le retour
	  $('#result').html(data)
	 
	}
  });
 });
 
 
 });
</script>
</body>

</html>