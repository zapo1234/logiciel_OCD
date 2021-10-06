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
	.s{display:none;}
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
.der1,.der2,.der3,.der4,.der5,.der6{color:black;cursor:pointer;width:20%;float:left;text-align:center;border:1px solid #eee;padding:1%;height:45px;} .color{background:#ACD6EA;font-weight:bold;} .home{color:#111E7F;font-size:18px;font-weight:bold;}
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
label{font-family:arial;color:black;} .enre{font-family:arial;font-size:15px;z-index:3;background:black;opacity:0.8;position:absolute;top:690px;left:12%;color:white;width:200px;text-align:center;padding:0.5%;height:50px;}
.up{color:black;} .num,.emails,.pass,.prenom,.nom{color:black;}

#form3{width:40%;height:600px;background:white;border:2px solid white;padding:0.2%;position:absolute;left:25%;top:150px;z-index:4;}
#modifier,#modipass{margin-left:30%;margin-top:3px;width:220px;text-align:center;color:white;background:#0661BC;border:2px solid #0661BC;height:35px border-radius:15px;}
.bl{background:#B9102C;width:100px;color:white;text-align:center;height:25px;border:2px solid #B9102C;border-radius:15px;}
.acs{background:#10B910;width:100px;color:white;text-align:center;height:25px;border:2px solid #10B910;border-radius:15px;}
 #logo{position:absolute;top:6px;left:1.7%;border-radius:50%;}
.titre{font-family:arial;text-align:center;margin-top:3px;font-size:18px;color:#EA4629}
.resultats{width:90%;} .dert{font-family:10px;}

#tab td, #tab th {border: 1px solid #ddd;padding: 8px;width:150px;text-align:center;font-size:14px;}

#tab tr:nth-child(even){background-color: #f2f2f2;}

#tab tr:hover {background-color: #ddd;}

#tab th {padding-top: 12px;padding-bottom: 12px;text-align: left;color: black;text-align:center;background:#D2EDF9;border:2px solid #D2EDF9}

#tab{width:90%;}

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
.mobile{display:none}

.sidebar .nav-item .nav-link span{font-size:14px;font-weight:bold;text-transform:capitalize;}
.navbar-nav{background:#06308E;}

#panier{position:fixed;left:60%;top:15px;color:black;font-size:14px;background:black;opacity:0.7;padding:1%;color:white;border-radius:5px;}
.btn{display:none;}

/*------------------------------------------------------------------
[ Responsive ]*/


@media (max-width: 575.98px) { 

#logo{display:none;} .side{display:none;} .bs{display:none;}.bg{display:none;}
.cont1,.cont12,.cont13,.cont14{display:block;width:250px;margin-top:8px;margin-left:7%;}
.cont2{display:block;width:250px;margin-top:10px;margin-left:8%;} .center{width:95%;height:1150px;}
ul{display:none;}
.bg-gradient-primary{display:none;} .contens,.contens1{display:block;width:250px;margin-top:10px;margin-left:8%;}
.drop{position:absolute;left:7%;width:300px;}
.drops{z-index:4;padding-left:5%;position:absolute;position:absolute;left:1%;width:350px;display:block;background:white;
height:1100px;overflow-y:scroll} h2{margin-top:20px;border-top:1px solid #eee;color:black;}
.us{padding-bottom:5px;margin-top:5px;border-bottom:1px solid #eee;color:black;}
#news_data{display:block;} #news{display:none;} .users{display:block;color:black;}
.dy{display:none;} .input{display:none;} h2{position:absolute;top:140px;left:-35%;font-size:18px;border:none;margin-top:20px;}
form{margin-top:100px;} #names,#name{margin-left:2%;} #modipass,#modifier{margin-left:-5%;}
.tab{display:none}  .mobile{color:black;font-size:14px;width:120%;display:block;margin-left:5%;border-bottom:1px solid #eee;
padding-bottom:15px;border-bottom:2px solid #eee;} .df{margin-left:30%;}
#resultat{margin-top:100px;}
.enre{font-family:arial;font-size:15px;z-index:3;background:black;opacity:0.8;position:absolute;top:50px;left:12%;color:white;width:200px;text-align:center;padding:0.5%;height:50px;} .form-search{display:none;}
label,input{display:block;} .col{display:block;}
#code{width:250px;} .btn{display:block;} #panier{display:none;}
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
.center{height:1200px;} .dy{display:none} #tab{margin-left:-13%;}
#tab{width:70%;} .enre{font-family:arial;font-size:15px;z-index:3;background:black;opacity:0.8;position:absolute;top:100px;left:12%;color:white;width:200px;text-align:center;padding:0.5%;height:50px;border-radius:15px;}
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
.center{height:1400px;} .detail{margin-left:12.5%;}
#tab{margin-left:-5%;} 
}

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
					<li>En cas de plusieurs site(attribuer un code filiale)</li>
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
                    <button id="sidebarToggleTop" class="btn">
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

                    <?php include('inc_menu1.php');?>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- 404 Error Text -->
                    <div class="center">
					
                    <div class="content1"><div class="der1"><span class="dy">Votre entreprise</span> <i class="fas fa-building"></i></div><div class="der2"><span class="dy">Ajouter des comptes</span>  <i class="fas fa-users"></i></div>
					 <div class="der3"><span class="dy"> Lister des utilisateurs</span>  <i class="fas fa-table"></i></div> <div class="der4"><span class="dy">Attribuer des horaires</span>  <i class="fas fa-calendar-alt"></i></div> <div class="der5"><span class="dy">Gérér les accès</span>  <i class="fas fa-key"></i></div></div>
                     
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
                       <label>Numéro télephone</label><br/><input type="text" id="num" name="num" class="form-control">
                      <br/><span class="num"></span></div>
                    
					<div class="col">
                    
					<select id="role" name="role" class="form-control" required>
                   <option value="">choisir sa fonction</option>
                 <option value="1">Dirigeant</option>
                  <option value="3">Gestionnaire</option>
                  <option value="4">Employé(caisse)</option>
               </select>
                    <br/><span class="role"></span></div>
				 
                 </div>
				 
				 <div class="form-row">
                    <div class="col">
                       <label>Choisir un site</label>
      <select id="code" name="code" class="form-control">
        <option selected>Choose...</option>
        <option value="1">site 1</option>
		<option value="2">site 2</option>
		<option value="3">site 3</option>
      </select>
					   <span class="code"></span>
                      </div>
					  
					<div class="form-row">
                    <div class="col">
                   <label>filiale(dénomination)</label> <input type="text" id="society" name="society" class="form-control" placeholder="nom du site" required>
                    <br/><span class="socie"></span></div>
				 
                 </div>
				 </div>
				 
				 <div class="form-row">
                    <div class="col">
                       <label>Email(utilisé)</label><br/><input type="text" id="emails" name="emails" class="form-control"  required><br/>
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
					 <form method="post" id="form1"  enctype="multipart/form-data" action="">
					 <h2>Informations sur votre entreprise</h2>
                     <div class="form-row">
                    <div class="col">
                       <label>Nom de la societé(dénomination)</label><br/><input type="text" id="nam" name="nam" class="form-control" placeholder="First name"><br/>
					   <span class="nam"></span>
                      </div>
					  </div>
					  <div class="form-row">
                    <div class="col">
                    <label>Email(societé)</label><br/><input type="text" id="email" name="email" class="form-control" placeholder="Email" required><br/>
					<span class="email"></span>
                    </div>
				 
                 </div>
				 
				 <div class="form-row">
                    <div class="col">
                       <label>Numéro télephone</label><br/><input type="text" id="numero" name="numero" class="form-control" placeholder="Votre numéro"><br/>
					   <span class="numero"></span>
                      </div>
				 
                 </div>
				 
				 <div class="form-row">
                    <div class="col">
                       <label>Adresse</label><br/><input type="text" id="adress" name="adress" class="form-control" placeholder="Votre adresse"><br/>
					   <span class="adress"></span>
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
				 
				 </form>
					 
					<div id="datas"></div><!--datas retour ajax --> 
					 
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
                   <label>Nouveau Mot de pass</label><br/><input type="password" class="form-control" name="past" id="past" required>
                    <br/><span class="pass"></span></div>
                    </div>
					 <input type="button" id="modipass" value="Nouveau mot de pass">
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
<div id="pak" style="display:none"></div>
<div id="panier"></div><!--retour panier facturation-->

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

  $('#sidebarToggleTop').click(function(){
		$('#accordionSidebar').css('display','block');
	 });

  $('#sms').click(function(){
	$('.drop').slideToggle();
	});
	
	 $('#news_data').click(function(){
	$('.drops').slideToggle();
	$('.drop').css('display','none');
	 });

  $('#but').click(function(){
   $('#examp').css('display','block');
   $('#pak').css('display','block');
 
 });
 
 $('#im').click(function(){
	 
	 $('#data').css('display','block');
	 
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
 $('#der14').css('display','none');
 $('#der15').css('display','block');
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
	 },3000);
		
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
	 var code =$('#code').val();
	 var society = $('#society').val();
	 
	 // regex //
	var regex = /^[a-zA-Z0-9éèàç]{2,25}(\s[a-zA-Z0-9éèàçà]{2,25}){0,4}$/;
    var rege = /^[a-zA-Z0-9-çéèàèç°]{1,25}(\s[a-zA-Z0-9-°]{1,25}){0,2}$/;
    var number = /^[0-9+]{8,14}$/;
	var reg = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
	var pass = /^(?=.*\d)(?=.*[A-Za-z])(?=.*[!@#$%])[0-9A-Za-z!@#$%]{8,12}$/;// contient une lettre, un chiffre et au moin un caractère spéciale
	var cod = /^[0-9]{1,2}$/;
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
	
	 else if (!cod.test(code)){
      $('.code').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur sur la syntaxe du code filiale');
    }
	
	else{
		
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'result_view_home.php',// on traite par la fichier
	data:{action:action,emails:emails,num:num,prenom:prenom,password:password,nom:nom,role:role,code:code,society:society},
	success:function(data) { // on traite le fichier recherche apres le retour
     $('#data').html(data);
	 
	}
    });
	
	setInterval(function(){
		 $('#data').html('');
		 location.reload(true);
	 },3000);
		
	}
	 
	  
	});
	
	// compter les nouveaux message
	function view() {
				var action="news";
				$.ajax({
					url: "messanger_datas.php",
					method: "POST",
					data:{action:action},
					success: function(data) {
						$('#sms').html(data);
					}
				});
			}

			view();
	
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
	 var action="acces";
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
	 var action="bloquer";
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
	
	
	
	$(document).on('click','#modipass', function() {
	var action= "modipass";
	var pass = $('#past').val();
	var pas = /^(?=.*\d)(?=.*[A-Za-z])(?=.*[!@#$%])[0-9A-Za-z!@#$%]{8,12}$/;// contient une lettre, un chiffre et au moin un caractère spéciale
     
	if(pass.length==""){
		$('#pass').css('border-color','red');
	}
	
	else if (pass.length > 12){
      $('.pass').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>Le nombre de caractères est entre 8 et 12 pour le mot de pass');
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
	
	setInterval(function(){
		 $('#datos').html('');
		 location.reload(true);
	 },5000);
		
	}
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
	
	// click sur les news message
	
	$(document).on('click','#sms',function(){
		  var action ="click_messsage";
		  $.ajax({
            type: 'POST',
            url:'messanger_datas.php',
            data:{action:action},
            async:true,
            success: function(data){
            $('#message_datas').html(data);
	
		    }
          });
		  
	  });
 
 });
</script>
</body>

</html>