<?php
include('connecte_db.php');
include('inc_session.php');

if(!isset($_GET['data_id'])){
	header('location:index.php');
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

.delete{margin-left:55%;margin-bottom:10px;color:white;background:#F83127;border:2px solid #F83127}
.bg{font-weight:bold;color:black;font-size:13px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"}
.tot{margin-bottom:10px;} #add_local{height:35px;margin-left:4%;border:2px solid #E5F1FB;#font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";margin-left:15px;margin-top:10px;width:150px;color:black;background:#E5F1FB;padding:1%;}
.reini{padding:2%;z-index:3;position:absolute;top:300px;left:40%;background-color:white;width:350px;height:220px;border-radius:10px;border:3px solid white;}
.action{margin-top:25px;} .annul{border-radius:15px;width:120px;height:30px;background-color:#FF4500;color:white;border:2px solid #FF4500;}
.ok{width:45px;height:45px;border-radius:50%;margin-left:30%;background-color:#1E90FF;border:2px solid #1E90FF} #reini{margin-left:2%;height:40px;width:130px;font-family:arial;}

#pak{position:fixed;top:0;left:0;width:100%;height:100%;background-color:black;z-index:2;opacity:0.8;}

#paks{position:fixed;top:0;left:0;width:100%;height:100%;background-color:black;z-index:2;opacity:0.8;}

.enre{font-size:12px;z-index:4;position:absolute;top:83px;left:70%;color:green;font-weight:bold;font-size:16px;padding:1%;text-align:center;}
.dep {
  animation: spin 2s linear infinite;
  margin-top:10px;
  width:100px;
  position:absolute;
  z-index:4;
  top:200px;
  left:45%;
  }

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

 
 #tb td, #tb th {border: 1px solid #ddd;padding: 8px;width:150px;text-align:center;font-size:14px;}

#tb tr:nth-child(even){background-color:#f2f2f2;}

#tb tr:hover {background-color: #ddd;}

#tb th {padding-top: 12px;padding-bottom: 12px;text-align: left;color: black;text-align:center;background:#D2EDF9;border:2px solid #D2EDF9}

#tb{margin-top:10px;}
#results{overflow-y:scroll;height:1000px;} 
 
 
 .action{cursor:pointer;} a{color:black;text-decoration:none;font-size:15px;}

.datas{width:100px;border:2px solid white;box-shadow:1px 1px 1px 1px;} 
.data1{color:black;font-size:16px;font-weight:none;background:#7BFC83;border:2px solid #7BFC83;border-radius:20px;} .datas1{}
.data3{background:#1E90FF;font-size:16px;font-weight:none;color:white;border:2px solid #1E90FF;border-radius:20px;} .datas3{}
.data4{background:#C81C31;font-weight:none;font-size:16px;color:black;border:2px solid #C81C31;border-radius:20px;} .datas2{}
.data2{background:#AB34FA;font-weight:none;font-size:16px;color:black;border:2px solid #AB34FA;border-radius:20px;} .datas2{}

.data{background:#AB040E;font-weight:none;font-size:16px;color:white;border:2px solid #AB040E;}
.button{background-color:#224abe;border:2px solid #224abe;color:white;} .mont{font-family:arial:font-size:20px;color:#224abe;font-weight:bold;}
.der{font-size:12.5px;} .export{margin-left:40%;margin-bottom:5px;} .csv{margin-left:2%;}
.csv,.excel{background-color:#F026FA;border-radius:15px;color:white;border:2px solid #F026FA;}
.side{color:#A9D3F2;padding:35%;text-align:center;margin-left:-8%;width:160px;height:160px;border-radius:50%;background:white;border:2px solid white;margin-top:95px;}
ul a{margin-left:3%;} .annuler{background-color:white;width:350px;height:200px;border:3px solid #eee;padding:3%;position:absolute;z-index:4;top:200px;margin-left:20%;}
.annuls{width:40px;height:40px;background:#224abe;margin-left:10%;color:white;border:2px solid #224abe;margin-top:10px;}
.envoyer{background-color: white;width: 350px;height: 230px;border: 3px solid #eee;padding: 3%;position: absolute;z-index: 4;
    top: 200px;
    margin-left: 20%;
}
.detail{width:590px;background:white;position:absolute;z-index:4;border:2px solid #eee;
 font-size:15px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:16px;color:black;
 top:150px;margin-left:20%;}
  h4{text-align:center;margin-top:8px;font-size:18px;border-bottom:1px solid #eee;}
  .h{padding-left:10%;margin-top:18px;font-size:15px;} .num{padding-left:2%}
  .fact{color:#4e73df;font-weight:bold;font-size:18px;}
  .liste td{width:150px;} .list td{font-size:14px;} .liste{border-top:1px solid #eee;} .hs{padding-left:13%;margin-top:10px;font-size:13px;}
#form_logo{display:none;} .pied_page{margin-left:60%;margin-top:10px;} .bout{float:left;margin-left:1%;width:30px;height:30px;background:white;background:#0C80E7;color:white;border:2px solid #0C80E7}
.print{border-radius:20px;width:150px;height:35px;background:#85C9F8;border:2px solid #85C9F8;color:white;text-align:center;color:white;margin-left:12%;margin-top:80px;}
 #logo{position:absolute;top:6px;left:1.7%;border-radius:50%;}
.tds{font-size:28px;margin-left:12%;color:#09A81F;margin-left:10%;}
.tdv{font-size:28px;margin-left:12%;color:#A80913;margin-left:10%;}
.tdc{font-size:28px;margin-left:12%;color:#0E84D1;margin-left:10%;}
.td{margin-left:10%;}
#message_datas{padding-left:2%;padding-bottom:8px;position:absolute;}
.drop{position:absolute;top:50px;width:240px;height:350px;background:white;border:2px solid white;margin-left:-5px;
background-color: white;
border-radius: 20px;
border-width: 0;
box-shadow: rgba(25,25,25,.04) 0 0 1px 0,rgba(0,0,0,.1) 0 3px 4px 0;
color: black;
cursor: pointer;
display: inline-block;
font-family: Arial,sans-serif;
font-size: 1em;
padding: 0 25px;
transition: all 200ms;} .datas_messanger{border-bottom:1px solid #eee;}
.ss{padding:2%;width:20px;height:20px;border-radius:40%;border:2px solid #eee;background:#e74a3b;color:white;
margin-left:-10px;}

.drops{display:none;}  .users{display:none} #news_data{display:none;}
.mobile{display:none;} 

.sidebar .nav-item .nav-link span{font-size:14px;font-weight:bold;text-transform:capitalize;}
.navbar-nav{background:#06308E;}

.employes{color:black;color:black;} .gestionnaire{color:black;} .boss{color:black;}

#caisse{font-size:18px;color:black;font-family:arial;} .tds,.tdv,.tdc{font-size:17px;font-weight:bold;}
.h1{padding:1.5%;font-size:14px;color:black;border:1px solid #eee;text-align:center;width:340px;}

@media (max-width: 575.98px) { 
.envoyer{margin-left:-5%;}
#logo{display:none;} .side{display:none;} .bs{display:none;}.bg{display:none;}
.cont1,.cont12,.cont13,.cont14{display:block;width:250px;margin-top:8px;margin-left:7%;}
.cont2{display:block;width:250px;margin-top:10px;margin-left:8%;} .center{width:95%;height:2100px;}
ul{display:none;}
.bg-gradient-primary{display:none;} .contens,.contens1{display:block;width:250px;margin-top:10px;margin-left:8%;}
.drop{position:absolute;left:7%;width:300px;}
.drops{z-index:4;padding-left:5%;position:absolute;position:absolute;left:1%;width:350px;display:block;background:white;
height:2800px;overflow-y:scroll} h2{margin-top:20px;border-top:1px solid #eee;color:black;}
.us{margin-top:5px;border-bottom:1px solid #eee;color:black;padding-bottom:5px;}
#news_data{display:block;} #news{display:none;} .users{display:block;color:black;}
.form-select{display:none;} .mobile{font-size:15px;color:black;margin-left:3%;display:block;margin-top:15px;border-bottom:1px solid #eee;padding-bottom:5px;} .tf,#tf{display:none;} 
.delete_line{display:none;} h2{font-size:15px;} .export{margin-left:3%;}
#results{width:110%;overflow-y:none;margin-top:10px;} .pied_page{margin-left:3%;}
.bg-gradient-primary{display:none;} .data1,.data2,.data3,.data4{height:40px;width:40%;padding:2%;text-align:center;}
.annuler{margin-left:3%;} .dp{padding-left:3%;font-size:20px;color:black;font-weight:bold;}
h1{margin-top:10px;} .employes{display:none;} .dg{padding-left:5%;} .details{padding-left:50%;}
}


// Medium devices (tablets, 768px and up)
@media (min-width: 768px) { ... }



</style>

<script>
 function printContent(el) {
	 var restorepage = document.body.innerHTML;
	 var printcontent = document.getElementById(el).innerHTML;
	 document.body.innerHTML = printcontent;
	 window.print();
	 document.body.innerHTML = restorepage;
	}
 
 </script> 

</head>

<body id="page-top">

        <?php include('inc_menu_principale.php');?>
        <!-- End of Sidebar -->
        
         <div id="collapse" class="collapse show" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bs">
                       <div id="resultats"></div>
                      
                    </div>
					
					
					<div class="bg">
                        
              
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
                               Lister des factures  
                            </div>

                        <div class="input"><select class="form-select form-select-sm" aria-label=".form-select-sm example" id="recher" name="recher">
                         <option selected>lister sur un site</option>
						 <?php
			
			// lister les les site pour afficher des facture
			// recupére les permission 
			// recuperer la permission pour afficher le checkout
   	// emttre la requete sur le fonction
        $rel=$bdd->prepare('SELECT  permission,society,code FROM inscription_client WHERE email_user= :email_user');
        $rel->execute(array(':email_user'=>$_SESSION['email_user']));
	     $donns =$rel->fetch();
		 
		 if($donns['permission']=="user:boss" OR $donns['permission']=="user:gestionnaire"){
		 
          $rel=$bds->prepare('SELECT code,society FROM tresorie_customer WHERE email_ocd= :email_ocd');
         $rel->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
		 }
		 if($donns['permission']=="user:employes"){
			$rel=$bds->prepare('SELECT code,society FROM tresorie_customer WHERE code= :code AND email_ocd= :email_ocd');
         $rel->execute(array(':code'=>$donns['code'],
		                     ':email_ocd'=>$_SESSION['email_ocd'])); 
			}
         $donnees = $rel->fetchAll();
			foreach($donnees as $value){
	        echo'<option value="'.$value['code'].'">'.$value['society'].'</option>';
              }
					?>	  
                          </select>
						  
                          </div>  
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <?php include('inc_menu1.php');?>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- 404 Error Text -->
                    <div class="center">
                    
					<div id="resus"></div><!--afficher des données-->
 
                   </div><!--content-->
 
 
    <div class="reini" style="display:none">
   <form method="post" id="form_reini" action="">
   <h1>Réinitialiser votre caisse journalière</h1>
   <div class="dert"> Date du point :<input type="date" id="reini" name="reini" required></div>
  <div class="action"><button type="button" class="annul">Annuler</button><input type="submit" class="ok" value="ok"></div>
   </form>
 
  </div><!--reini---->
  
  <div class="annuler" style="display:none">
   <form method="post" id="form_annul" action="">
   <h1>Êtes vous sûr d'annuler la facture <span id="id_fact"></span><br/></h1>
   <div class="action"><button type="button" class="annul">Annuler</button><button type="button" class="annuls">ok</button></div>
   <input type="hidden" name="ids" id="ids">
  <input type="hidden" name="token" id="token" value="<?php
  //Le champ caché a pour valeur le jeton
   echo $_SESSION['token'];?>">
   </form>
 
  </div><!--annul---->
  
  <div id="details"></div><!--div details-->
  <div id="data_annuler"></div><!--div annuler -->
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
<div id="paks" style="display:none"><div class="dep"><i class="fa fa-hourglass-end" aria-hidden="true" style="color:white;font-size:25px;"></i></div></div>
<div id="pak" style="display:none"></div>
<div id="result"></div>

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
  <script src="js/facture.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    function lists(page) {
		var id = <?php echo $_GET['data_id'];?>;
		$.ajax({
		url: "recher_facture_site.php?data_id=<?php echo$_GET['data_id'];?>",
		method: "POST",
		data:{id:id,page:page},
		success: function(data) {
		$('#resus').html(data);
				  }
				});
			}

			lists();
			
	// pagintion
  $(document).on('click','.bout',function(){
	  var page =$(this).attr("id");
	  lists(page);
   });
  
			
	$(document).on('change','#recher',function(){
	 function recher(page) {
				var action="list";
				var id=$('#recher').val();
				$.ajax({
					url: "recher_facture_home.php",
					method: "POST",
					data:{id:id,action:action,page:page},
					success: function(data) {
						$('#resus').html(data);
						
					}
				});
			}

			recher();
		
	});		
			
			
			
   });
  
 </script>
  
 </html>
 </body>