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
#pak{position: fixed;top: 0;left: 0;width:100%;height: 100%;background-color: black;z-index:2;opacity: 0.6;}
#examp{border:2px solid #eee;padding:3%;position:absolute;width:60%;height:700px;z-index:3;left:15%;top:20px;background-color:white;border-radius:10px;}
.forms{width:200px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;font-weight:bold;color:black}
h2{border-bottom:1px solid #eee;margin-bottom:15px;}
label {color:black;} .buttons{margin-left:55%;margin-top:20px;width:250px;height:40px;color:white;
background:#ACD6EA;border-radius:15px;text-transform:capitalize;border:2px solid #ACD6EA}
.form1,.form2{display:none;}

.content1{display:none;color:black;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";}
.h3{padding-bottom:5px;font-size:20px;font-weight:bold;color:#4e73df;text-transform:uppercase;border-bottom:2px solid #ACD6EA;}
.h5{text-align:center;font-size:11px;font-weight:bold;color:green;padding:2%;width:180px;height:35px;}
.h6{color:red;font-weight-bold;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";}

.bg{font-weight:bold;color:black;font-size:13px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"}
.tot{margin-bottom:10px;} #add_local{height:35px;margin-left:4%;border:2px solid #E5F1FB;#font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";margin-left:15px;margin-top:10px;width:150px;color:black;background:#E5F1FB;padding:1%;}
.reini{padding:2%;z-index:3;position:absolute;top:300px;left:40%;background-color:white;width:350px;height:220px;border-radius:10px;border:3px solid white;}
.action{margin-top:25px;} .annul{border-radius:15px;width:120px;height:30px;background-color:#FF4500;color:white;border:2px solid #FF4500;}
.ok{width:45px;height:45px;border-radius:50%;margin-left:30%;background-color:#1E90FF;border:2px solid #1E90FF} #reini{margin-left:2%;height:40px;width:130px;font-family:arial;}

#pak{position:fixed;top:0;left:0;width:100%;height:100%;background-color:black;z-index:2;opacity: 0.9;}

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
ul a{margin-left:3%;} #form_logo{display:none;} .tt{margin-left:50%;margin-top:10px;}
.remove{background-color:white;border:1px solid white;border: 1px solid white;color:#ED8102;}
#dir{margin-left:1.5%;background:#3C52C7;border:2px solid #3C52C7;color:white;font-weight:bold;}
.clic{width:180px;height:40px;color:white;background:#0FAE3A;text-align:center;border:2px solid #0FAE3A;
border-radius:15px;} #idt{border-top:1px solid white;border-left:1px solid white;border-right:1px solid white;border-bottom:2px solid #3C52C7;font-size:20px;width:120px;}
.export{margin-left:45%;margin-bottom:5px;} .csv{margin-left:2%;}
.csv,.excel{background-color:#F026FA;border-radius:15px;color:white;border:2px solid #F026FA;}.der{padding-left:5%;}
#affiche{margin-top:15px;} 
 a{color:black;text-decoration:none;font-size:12px;}
.datas{border:2px solid white;box-shadow:2px 2px 1px 1px;font-size:12px;background-color:white;} .action{cursor:pointer;}
.data1{color:black;font-size:16px;font-weight:none;background:#7BFC83;border:2px solid #7BFC83;border-radius:20px;} .datas1{}
.data2{background:#1E90FF;font-size:16px;font-weight:none;color:white;border:2px solid #1E90FF;border-radius:20px;} .datas3{}
.data4{background:#C81C31;font-weight:none;font-size:16px;color:black;border:2px solid #C81C31;border-radius:20px;}
.data3{background:#AB040E;font-weight:none;font-size:16px;color:white;border:2px solid #AB040E;border-radius:20px;color:black}

.annuler{background-color:white;width:350px;height:200px;border:3px solid #eee;padding:3%;position:absolute;z-index:4;top:200px;margin-left:20%;}
.annuls{width:40px;height:40px;background:#224abe;margin-left:10%;color:white;border:2px solid #224abe;margin-top:10px;}

.repas{font-size:15px;} .actions{cursor:pointer;}
.datis{color:black;border:2px solid white;box-shadow:1px 1px 1px 1px;font-size:15px;background-color:white;width:360px;}
.result{z-index:4;width:550px;height:650px;border:2px solid #eee;background-color:white;position:absolute;top:150px;left:30%;}
.h{margin-top:20px;margin-left:4%;} #designatio,#fournisseu{width:400px;height:50px;}
input {border:color:1px solid #eee;height:30px;} #modif{width: 180px;height: 40px;color: white;background: #0FAE3A;text-align: center;
border: 2px solid #0FAE3A;} 
border-radius: 15px;} .error3,.error4,.error6{color:#AB040E;font-size:13px;}
.pied_page{margin-left:60%;margin-top:15px;} .bout{float:left;margin-left:1%;width:30px;height:30px;background:white;background:#0C80E7;color:white;border:2px solid #0C80E7}
.print{border-radius:20px;width:150px;height:35px;background:#85C9F8;border:2px solid #85C9F8;color:white;text-align:center;color:white;margin-left:12%;margin-top:80px;}
 #logo{position:absolute;top:6px;left:1.7%;border-radius:50%;}
.tds{font-size:28px;margin-left:12%;color:#09A81F;}
.tdv{font-size:28px;margin-left:12%;color:#A80913;}
.tdc{font-size:28px;margin-left:12%;color:#0E84D1;}
.delete{margin-left:10%;margin-bottom:10px;color:white;background:#F83127;border:2px solid #F83127}
 
 #tls td, #tls th {border: 1px solid #ddd;padding: 8px;width:150px;text-align:center;font-size:14px;}

#tls tr:nth-child(even){background-color:#f2f2f2;}

#tls tr:hover {background-color: #ddd;}

#tls th {padding-top: 12px;padding-bottom: 12px;text-align: left;color: black;text-align:center;background:#D2EDF9;border:2px solid #D2EDF9}

#tls{margin-top:10px;}
 
</style>

</head>

<body id="page-top">

        <?php include('inc_menu_principale.php');?>
        <!-- End of Sidebar -->
         <div id="data_annuler"></div><!--retour ajax -- annuler-->
         <div id="collapse" class="collapse show" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bs">
                      

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
                               Ajouter  <button type="button" class="btn btn-primary" id="but">
                              +</button>
                            </div>

                        <div class="input"><select class="form-select form-select-sm" aria-label=".form-select-sm example">
                         <option selected>Type des dépenses</option>
						  <option value="1">dépense effectuée</option><option value="2">crédit fournisseur</option>
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
                    
					<div id="resul_depense">ZAPO</div><!--retour ajax sur la lsite des dépenses-->
					<div id="result_depense"></div><!--retour ajax donnees depenses-->

  <div  id="examp" style="display:none">
  
<form method="post" id="form_depense" action="">
   <div class="donnes2">Ajouter des dépenses<button type="button" id="dir" title="ajouter des entrées">+</button> <span class="der">N° facture<input type="text" name="fact" id="fact"></div>

   
   <table  id="affiche">

   </table><!--recuperation tableau depenses-->
  <div id="add"></div>
  <input type="hidden" id="idy" name="idy"><!--adjout du total depense-->
</form>
<div class="donnes3"><div class="tt">Total S/Dépense :<input type="text" name="idt" id="idt" readonly><span class="idt">XOF</span></div></div>
</div>
 <div class="content">


</div><!--content-->

</div>

 <div class="annuler" style="display:none">
   <form method="post" id="form_annul" action="">
   <h1>Êtes vous sûr d'annuler cette dépenses ? <span id="id_fact"></span><br/></h1>
   <div class="action"><button type="button" class="annul" title="Annuler">Annuler</button><button type="button" class="annuls">ok</button></div>
   <input type="hidden" name="ids" id="ids">
  <input type="hidden" name="token" id="token" value="<?php
  //Le champ caché a pour valeur le jeton
   echo $_SESSION['token'];?>">
   </form>
   </div>


 <div class="reini" style="display:none">
 <form method="post" id="form_reini" action="">
 <h1>Réinitialiser votre caisse journalière</h1>
 <div class="dert"> Date du point :<input type="date" id="reini" name="reini" required></div>
 <div class="action"><button type="button" class="annul">Annuler</button><input type="submit" class="ok" value="ok"></div>
 </form>

 </div><!--reini---->
 
 <div id="data_modifier">ZAPO</div><!--données modifier depense-->
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
   $('.annuler').css('display','none');
   $('.detail').css('display','none');
   $('.datas').css('display','none');
   $('.result').css('display','none');
 });
 
 $(document).on('click','.action',function(){
	var id = $(this).data('id2');
  // afficher 
  $('#content'+id).slideToggle();
  if(id ===3){
 $('.datas').css('height','120px');	
  }
});

$(document).on('click','.actions',function(){
	var id = $(this).data('id7');
  // afficher 
  $('#contents'+id).slideToggle();
  if(id ===3){
 $('.datas').css('height','120px');	
  }
});


// afficher les données des dépenses
  // afficher les données des encaissements
  function loads(page) {
				var action="fetchs";
				$.ajax({
					url: "depenses_view_datas.php",
					method: "POST",
					data:{action:action,page:page},
					success: function(data) {
						$('#resul_depense').html(data);
					}
				});
			}

			loads();


    // pagintion
  $(document).on('click','.bout',function(){
	  var page =$(this).attr("id");
	  loads(page);
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

	// ajouter des champs formualire pour les dépenses
	var cont = 0;
$(document).on('click','#dir', function(){
  var html = '';
 cont = cont +1;
 html += '<tr class="dir" id ="row_id_'+cont+'">';
 html += '<td><input type="date" class="date" id="ti" name="ti[]" required></td>';
 html +='<td><input type="text" class="designation" id="designation" name="designation[]" placeholder="Désignation" required></td>';
 html +='<td><input type="text" class="fournisseur" id="fournisseur" name="fournisseur[]" placeholder="fournisseur"/></td>';
 html +='<td><select name="des[]" id="des"><option value="1">dépense effectué</option><option value="2">crédit fournisseur</option></select></td>';
 html +='<td><input type="number" class="montant" id="montant'+cont+'" name="montant[]" placeholder="Montant" required></td>';
 html +='<td><button class="remove" name="remove" id="'+cont+'"><i class="material-icons" style="font-size:25px">highlight_off</i></button></td>';
 html +='</tr>';
$('#affiche').append(html);
$('#add').html('<button type="submit" class="clic">Enregistrer</button>');
});

   $(document).on('click','.remov', function(){
   $(this).closest('tr').remove();
   cot=cot-1;
   calcules();
  });
    
	
	// suprimer une ligne pour les dépenses.
   $(document).on('click','.remove', function(){
   var id = $(this).attr("id");

  
   var idt=$('#idt').val();
  $('#row_id_' +id).remove();
  cont =cont -1;
  calcul();
  });

  // fonction
  function calcul() {

 var totale = 0;
 var total_items=0;
 for(j=1; j<500; j++) {
 var mont = 0;
  mont = $('#montant'+j).val();
 if(mont > 0) {

 totale = parseFloat(totale)+ parseFloat(mont);

  }
 }

  $('#idt').val(totale);
 $('#idy').val(totale);
}

 function calcul() {

 var totale = 0;
 var total_items=0;
 for(j=1; j<500; j++) {
 var mont = 0;
  mont = $('#montant'+j).val();
 if(mont > 0) {

totale = parseFloat(totale)+ parseFloat(mont);

  }
 }

$('#idt').val(totale);
$('#idy').val(totale);
}

 // blur sur le montant pour le total
 $(document).on('blur','.montant',function() {
calcul();
 });
   // afficher la div pour réinitailiser les chiffres
	$(document).on('click','.butt',function(){
    $('.reini').css('display','block');
    $('#pak').css('display','block');
    });



	 $(document).on('click','#add_local', function() {
	// on traite le fichier recherche apres le retour
	  $('#form1').submit();

	});


    // delete home--
 $(document).on('click','.modifier', function(){
	 // recupere la variable
	 var id = $(this).data('id3');
	 var action = "modifier";
	
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'depenses_view_datas.php',// on traite par la fichier
	data:{id:id,action:action},
	success:function(data) { // on traite le fichier recherche apres le retour
     $('#data_modifier').html(data);
	 $('#pak').css('display','block');
	}
	});
 });
	
   // formulaire d'envoi et enregsitrement des dépenses
   $('#form_depense').on('submit', function(event) {
	  var action ="insert";
	  var fact =$('#fact').val();
    event.preventDefault();
    var regex = /^[a-zA-Z0-9éçàùèàè!:;]{0,150}$/;	
	var rege =  /^[a-zA-Z0-9-]{0,15}$/;
	var reg =   /^[0-9]{0,15}$/;
   var form_data =$(this).serialize();
  
  if(fact.length > 10) {
	  $('#erros').html('le numéro de la facture ne peut pas dépasser 10 caractères');  
  }
  
  if(!rege.test($('#fact').val())) {
	 $('#erros').html('le numéro de la facture doit comporter un chiffre,nombre ou un tiret'); 
  }
  
   $('.designation').each(function() {
	 
	 if($(this).val().length >150){
		$('#erros').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i> le champ désignation pas plus de 150 caractères');
	 }
	 
	else if (!regex.test($(this).val())){
      $('#erros').html('erreur de syntaxe pour la désignation');
    }
	
	else{
		
		$('#erros').html('');
	}
	 
   });
   
   $('.fournisseur').each(function() {
	
     if($(this).val().length >100){
		$('#erros').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i> le champ fournisseur pas plus de 100 caractères');
	 }
	 
	 else if (!regex.test($(this).val())){
      $('#erros').html('erreur de syntaxe pour la désignation');
    }
	
	else {
		$('#erros').html('');
	}
	 
   });
   
   
  $('.montant').each(function() {
	 if($(this).val().length > 10){
    $('#erros').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i> le montant doit etre moins 10 caractère');
   }
   else{
	  $('#erros').html(''); 
   }
   
  });
  
  var erreur=$('#erros').text();
  
    if(erreur=="") {

	$.ajax({
	type:'POST', // on envoi les donnes
	url:'depenses_validate_datas.php',// on traite par la fichier
	data:form_data,
	success:function(data) { // on traite le fichier recherche apres le retour
      $('#result_depense').html('<div class="enre"><div><i class="fas fa-check-circle" style="color:green"></i>Dépenses enregsitrées</button>');
	  $('#pak').css('display','none');
	  $('#examp').css('display','none');
	  load();
	  $('#affiche').find("tr:gt(0)").remove();
	 
      }
    });
	
	setInterval(function(){
		 $('#result_depense').html('');
		 location.reload(true);
	 },4000);
	 
	}
    	
  });


  //
  
  // delete home--
 $(document).on('click','.annul', function(){
	 // recupere la variable
	 var id = $(this).data('id4');
	 var action = "annuler";
    // affiche les differentes
	$('.annuler').css('display','block');
	$('#id_fact').text(id);
    $('#pak').css('display','block');
	$('#ids').val(id);
	
	$(document).on('click','.annuls', function(){
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'depenses_view_datas.php',// on traite par la fichier
	data:{id:id,action:action},
	success:function(data) { // on traite le fichier recherche apres le retour
     $('#data_annuler').html('<div class="enre"><div><i class="fas fa-check-circle" style="color:green"></i>dépense annulée</div>');
     $('.annuler').css('display','none');
     $('#pak').css('display','none');
	 load();
	 loads();
	}
		
	});
	
	setInterval(function(){
		 $('#data_annuler').html('');
	 },4000);

 });
 });

    
   $(document).on('click','#modif', function(){
	 var action ="modi";
	 var md = $('#md').val();
	 var date = $('#date').val();
	 var fournisseu =$('#fournisseu').val();
	 var designatio =$('#designatio').val();
	 var status =$('#status').val();
	 var monts = $('#monts').val();
	 var facts = $('#facts').val();
	 
	 if(date.length!="" && status!=""){
	 if(designatio.length!="" && designatio.length < 150){	 
	if(fournisseu.length < 150) {
	if(monts.length < 10){
	 $.ajax({
	type:'POST', // on envoi les donnes
	url:'depenses_view_datas.php',// on traite par la fichier
	data:{md:md,monts:monts,action:action,facts:facts,date:date,fournisseu:fournisseu,status:status,designatio:designatio},
	success:function(data) { // on traite le fichier recherche apres le retour
     $('#data_modifier').html(data);
     $('#pak').css('display','none');
     loads();
	 load();
	}
		
	});
	
	setInterval(function(){
		 $('.enre').html('');
	 },4000);
	
	 }
	 
	 else{
		$('.error6').html('* le montant est obligatoire et moins de 10 chiffres');		
		 
	 }
	 
	}
	 
	 else{
		$('.error3').html('* le fournisseur  est moins de 150 caractères');		
		 
	 }
	 
	 }
	 
	 else{
		$('.error4').html('* la désignation est obligatoire et moins de 150 caractères');		
		 
	 }
	 
	 }
	   
  });

	// envoi du formulaire pour reinitalisation des montants

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