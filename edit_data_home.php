<?php
include('connecte_db.php');
include('inc_session.php');

if(!isset($_GET['home']) AND !empty($_GET['home'])) {
	
	header('location:index.php');
} 

   // requete pour aller chercher les valeurs 
   $home = $_GET['home'];
  // emttre la requete sur le fonction
    $req=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,occupant,nombre_lits,equipements,equipement,cout_nuite,cout_pass,icons,infos FROM chambre WHERE id_chambre= :id_chambre');
    $req->execute(array(':id_chambre'=>$home));

    // on recupère les données
	$donnees = $req->fetch();
	// recupére les images existant
	// on recupére les equipement checkbox
	$data = $donnees['equipement'];
	$data1  = $donnees['equipements'];

	 
	$res=$bds->prepare('SELECT id,name_upload FROM photo_chambre WHERE id_chambre= :id_chambre');
    $res->execute(array(':id_chambre'=>$home));

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
.center{background-color:white;width:80%;height:950px;} .inputs,.input{margin-left:5%;float:left;}
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
.enre{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;color:black;z-index:4;position:absolute;top:130px;left:40%;border:2px solid white;font-family:arial;font-size:14px;width:280px;height:150px;padding:2%;text-align:center;background-color:white}

.x{color:#4e73df;font-weight:bold;} .ts{padding-left:4%;} .center{width:90%;margin-left:5%;background-color:white;}
.table{width:80%;margin-left:5%;margin-top:14px;} td,th{border:1px solid #5bbaff;text-align:center;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;color:black;}
th{text-align:center;background:#4c76b2;color:white;font-size:13px;border-color:1 px solid #5bbaff}
.div{color:green;} #block_delete{position: absolute;top:200px;left:40%;width:370px;;height:160px;background-color:white;z-index:4;}
 h3{color:black;padding-top:5%;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:16px;text-align:center;}
 #button_annuler{width:120px;margin-left:6%;height:40px;color:white;background:red;margin-top:20px;border:2px solid red;text-align:center;border-radius:15px;}
 #button_delete{width:50px;height:40px;background:#4e73df;color:white;border-radius:50%;margin-left:10%;margin-top:20px;border:2px solid #4e73df;}
 .enr{color:white;padding:2%;font family:arial;background:red;width:150px;height:25px;}
 #data_delete{position:absolute;top:200px;left:15%;} #forms {color:black;}
 .d{border:1px solid #eee;} .homes{overflow-y:scroll;z-index:4;position:absolute;top:20px;left:15%;display:none;width:70%;height:900px;background:white;border:2px solid #eee;} . der{padding-left:2%;}
 .imgs{border-radius:20%;font-weight:bold;width:110px;color:white;text-align:center;padding:1%;background:#FF7133;border:2px solid #FF7133;color:block;margin-top:6px;margin-left:25%;}
 .text_img{padding:1.5%;border:4px solid #eee;width:355px;}
</style>

</head>

<body id="page-top">

           <?php include('inc_menu_principale.php');?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
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

                        <div class="input"><select class="form-select form-select-sm" aria-label=".form-select-sm example">
                           <option selected>Type de chambre</option>
                           
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
                    <!--formulaire affiche-->
  <form method="post" id="forms"  enctype="multipart/form-data">
  <h1> <i class='fas fa-house-user' style='font-size:20px'></i> Formualire pour modifier les données d'un local,une chambre ou un appartement de votre espace Hotelier</h1>
   
   <div class="form-row">
    <div class="form-group col-md-6">
	<h2><i style="font-size:16px" class="fa">&#xf044;</i> Informations relatives au type du local</h2>
      <label for="inputPassword4">type de local *</label>
      <select name="type" class="forms form-select-sm" aria-label=".form-select-sm example">
                           <option value="<?phpecho$donnees['type_logement']?>"><?phpecho$donnees['type_logement'];?></option>
						   <option value="0">chambre single</option><option value="1">chambre double</option>
                           <option value="2">chambre triple</option><option value="3">chambre twin</option><option value="4">chambre standard</option><option value="5">chambre deluxe</option>
                          <option value="6">studio double</option>
                          </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Autre type</label>
      <input type="text" class="form-control" name="typs" id="inputEmail4" value="<?php echo$donnees['type_logement'];?>">
    </div>
  

   <div class="form-group col-md-6">
      <label for="inputEmail4">identifier votre local *</label>
      <input type="text" class="form-control" name="ids" id="ids" required value="<?php echo$donnees['chambre'];?>" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">occupants possible *</label>
      <input type="number" class="form-control" id="num" name="num" value="<?php echo$donnees['occupant'];?>" required>
    </div>
     <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre de lits*</label>
      <input type="number" class="form-control" id="nums" name="nums" value="<?php echo$donnees['nombre_lits'];?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">cout nuité *</label>
      <input type="number" class="form-control" id="count" name="cout" value="<?php echo$donnees['cout_nuite'];?>" required>
    </div>
    
	<div class="form-group col-md-6">
      <label for="inputPassword4">cout pass </label>
      <input type="number" class="form-control" id="counts" name="couts" value="<?php echo$donnees['cout_pass'];?>" placeholder="">
    </div>
    
     <div class="form-group col-md-12">
        <h2><i style="font-size:14px" class="fa">&#xf044;</i> Informations relatives aux equipements principales du local</h2>

      <div class="custom-checkbox">
      <input type="checkbox" name="ch[]"  value="<i style='font-size:13px' class='fa'>&#xf2dc;</i> climatisation" <?php $a = "climatisation"; if(strpos($data,$a) !== false){echo'checked';} else{} ?>> <i style='font-size:13px' class='fa'>&#xf2dc;</i> climatisation
     <input type="checkbox" name="ch[]"  value="<i style='font-size:13px' class='fa'>&#xf108;</i> télévision" <?php $a = "télévision"; if(strpos($data,$a) !== false){echo'checked';} else{} ?>> <i style='font-size:13px' class='fa'>&#xf108;</i> télévision<input type="checkbox" name="ch[]"  value="<i style='font-size:14px' class='fa'>&#xf1eb;</i> wiffi">  <i style='font-size:14px' class='fa'>&#xf1eb;</i> wiffi</td> <input type="checkbox" name="ch[]"  value="<i style='font-size:14px' class='fa'>&#xf2a2;</i> salle de baim"> <i style="font-size:14px" class="fa">&#xf2a2;</i> salle de bains
     <input type="checkbox" name="ch[]" value="<i style='font-size:16px' class='fas'>&#xf0f4;</i> Déjeuner" <?php $a = "Déjeuner"; if(strpos($data,$a) !== false){echo'checked';} else{} ?>> <i style="font-size:14px" class="fas">&#xf0f4;</i> Déjeuner
	 </div>
	 
	 <h2><i style="font-size:14px" class="fa">&#xf044;</i> Informations relatives aux equipements secondaires du local</h2>
    <input type="checkbox" name="choix[]"  value="toilletes" <?php $a = "toilletes"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> toilletes
    <input type="checkbox" name="choix[]"  value="armoie ou penderie" <?php $a = "armoie"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> armoie ou penderie  
   <input type="checkbox" name="choix2[]" value="chaines satellite" <?php $a = "chaines satellite"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> chaines satellite
   <input type="checkbox" name="choix2[]"  value="prise près du lit" <?php $a = "prise près du lit"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> prise près de lit <input type="checkbox" name="choix[]"  value="espace pour pc"> espace pour pc</td> 
   <input type="checkbox" name="choix[]"  value="portant" <?php $a = "portant"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> portant<br/>
    <input type="checkbox" name="choix[]"  value="baignoire ou douche" <?php $a = "baignoire ou douche"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> Baignoire ou douche
   <input type="checkbox" name="choix[]"  value="télephone" <?php $a = "télephone"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> télephone
   <input type="checkbox" name="choix[]"  value="microonde" <?php $a = "microonde"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> microonde
   <input type="checkbox" name="choix[]"  value="fer à repasser" <?php $a = "fer à repasser"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> fer à repasser
   <input type="checkbox" name="choix[]"  value="réfrigérateur" <?php $a = "réfrigerateur"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> réfrigerateur
    <input type="checkbox" name="choix[]"  value="machine à laver" <?php $a = "machine à laver"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> machine à laver<br/>
     <input type="checkbox" name="choix[]"  value="papier toillete" <?php $a = "papier toillette"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> papier toillete
    <input type="checkbox" name="choix[]"  value="séche cheveux" <?php $a = "séche cheveux"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> séche cheveux
   <input type="checkbox" name="choix[]"  value="petit café" <?php $a = "petit café"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>>  petit café
   <input type="checkbox" name="choix[]" value="déjeuner" <?php $a = "déjeuner"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> déjeuner
	</div>
      
    </div>
   <h2>Informations facultatives</h2>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">informations complementaire</label>
    <textarea class="form-control" name="infos" id="infos" rows="3"><?php echo$donnees['infos'];?></textarea>
  </div>
  
  <div class="d"><i class="fas fa-camera"></i> Prise de photo de votre local(au moins 4images)
  <span class="der"><a href="#" class="der">visualiser les images existant</a></span></div>
  <input type="file" class="test" name="fil[]" id="file1"><input type="file" class="test" name="fil[]" id="file2"><input class="test" type="file" name="fil[]" id="file3">
  <input type="file" class="test" name="fil[]" id="file4">
  
  <div><input type="submit" value="Modifier les données" id="his"/></div>
<input type="hidden" name="token" id="token" value="<?php
//Le champ caché a pour valeur le jeton
echo$_SESSION['token'];?>">
  </form><!--fin du form-->
  </div>
	
    <?php 

	echo'<div class="homes">';
	while($donnes = $res->fetch()){
	 
	 echo'<div class="text_img"><a href="#" ><img src="upload_image/'.$donnes['name_upload'].'" width="300" height="250"></a><br/>
	 <button type="button" data-id2="'.$donnes['id'].'" class="imgs">suprimer</button></div>';
	}
	echo'</div>';
 ?>	
					
                    

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

  <div id="delete_img"></div><!-- affichage retour ajax-->

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
   $('.homes').css('display','none');   
 });
 
 
  $('.der').click(function(){ 
	// recupére la variable
	var text = $('.homes').text();
	if(text.length !=""){
	$('.homes').css('display','block');
	$('#pak').css('display','block');
	}
 });
 
 $('.mr').click(function(){
	 
	 alert('zapo');
	 
 }
 
 // compter le nombre de class
  var thecount = $('.text_img').length;
  
  if(thecount > 3) {
	$('#file2').hide();
	$('#file3').hide();
	$('#file4').hide();
	  
  }
  
  else if(thecount > 1) {
	 $('#file3').hide();
	$('#file4').hide(); 
	  
  }
  
  else if(thecount == 1){
	$('#file1').hide();	 
}

 
 // delete home--
 $(document).on('click','.imgs', function(){
	 // recupere la variable
	 var ids = $(this).data('id2');
	 var action = "delete_img";
    // affiche les differentes
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'data_delete.php',// on traite par la fichier
	data:{ids:ids, action:action},
	success:function(data) { // on traite le fichier recherche apres le retour
     $('#delete_img').html(data);
     }
		
	});
	
	 setInterval(function(){
		 $('#delete_img').html('');
		 location.reload(true);
	 },3000);

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


 if(ids.length> 50) {
	$('#error').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i>nombre max de caractère est de 50 nom du client');
	}
	
	else if(num.length > 3) {
	$('#error').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i>nombre max de caractère est de 50 nom du client');
	}
	
	else if (!number.test(num)){
      $('#error').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur de syntaxe sur le nombre compris en 1 et 9 ');
      $('#num').css('border-color','red');
	}
	
	else if (!number.test(nums)){
      $('#error').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur de syntax sur le nombre compris entre 1et 9');
      $('#nums').css('border-color','red');
	}
	
	else if (infos.length >300){
      $('#error').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> nombre de caractères pour les informations ne peuvent pas dépasser 200');
      $('#infos').css('border-color','red');
	}
	
	else{

  $.ajax({
	type:'POST', // on envoi les donnes
	async: false,
	url:"enregistrer_edit_home.php?home=<?php echo$_GET['home'];?>",
    data:new FormData(this),
	contentType:false,
	processData:false,
	success:function(data) {
	$('#html').html(data);
	$('#forms').css('display','none');
	$('#examp').css('display','none');
	}
   });
   
   

}); 

 
 
});
</script>
</body>

</html>