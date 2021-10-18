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
     <link rel="stylesheet" href="/lib/w3.css"><!-- bar progression indicateur-->
	 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
     .s{display:none;}
	 h1,select{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:18px;margin-left:8%;color:black}
    #collapse{width:300px;height:100px;padding:2%;position:fixed;top:60px;left:81%;border-shadow:3px 3px 3px black;}
    .bg{border:1px solid #eee;background:white;width:340px;height:500px;padding:4%;margin-top:0px;}
    .bs{width:340px;height:300px;border:1px solid #eee;}
	.en{height:50px;border-bottom:1px solid #eee;} .h1{font-size:24px; text-align:center;} .encaiss{font-size:16px;font-weight:none;} .h2{margin-top:70px;margin-left:10%;} .t_monts,.t_mont,.t_mon{font-size:18px;margin-left:-20px;}
	#montant td{font-weight:none;} .butt,.buts{height:35px;border-radius:15px;padding:1.5%;width:180px;font-weight:200;background:#F026FA;color:white;font-size:20px;border:2px solid #F026FA;}
	.t_monts{color:#42FC72;} .t_mont{color:#FA2367;} .t_mon{color:#14B5FA;}
.center{background-color:white;width:98%;height:1050px;padding:1.5%;margin-top:5px;} .inputs,.input{margin-left:5%;float:left;}
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
.reini{padding:2%;z-index:4;position:absolute;top:300px;left:40%;background-color:white;width:350px;height:220px;border-radius:10px;border:3px solid white;}
.action{margin-top:25px;} .annul{border-radius:15px;width:120px;height:30px;background-color:#FF4500;color:white;border:2px solid #FF4500;}
.ok{width:45px;height:45px;border-radius:50%;margin-left:30%;background-color:#1E90FF;border:2px solid #1E90FF} #reini{margin-left:2%;height:40px;width:130px;font-family:arial;}

#pak{position:absolute;top:0;left:0;width:100%;height:100%;background-color:black;z-index:3;opacity: 0.9;}

.enre{font-family:arial;font-size:15px;z-index:3;background:black;opacity:0.8;position:absolute;top:700px;left:12%;color:white;width:200px;text-align:center;padding:0.5%;height:50px;}
  
  
  #tabs td, #tabs th {border: 1px solid #ddd;padding: 8px;width:150px;text-align:center;font-size:15px;}

#tabs tr:nth-child(even){background-color:#f2f2f2;}

#tabs tr:hover {background-color: #ddd;}

#tabs th {padding-top: 12px;padding-bottom: 12px;text-align: left;color: black;text-align:center;background:#D2EDF9;border:2px solid #D2EDF9}

#tabs{margin-top:10px;color:black;}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.side{color:#A9D3F2;padding:35%;text-align:center;margin-left:-8%;width:160px;height:160px;border-radius:50%;background:white;border:2px solid white;margin-top:95px;}
ul a{margin-left:3%;} #form_logo{display:none;} 
.clic{width:180px;height:40px;color:white;background:#0FAE3A;text-align:center;border:2px solid #0FAE3A;
border-radius:15px;} #idt{border-top:1px solid white;border-left:1px solid white;border-right:1px solid white;border-bottom:2px solid #3C52C7;font-size:20px;width:120px;}
.export{margin-left:40%;margin-bottom:5px;padding-bottom:25px;} .csv{margin-left:2%;} h2{color:black;}
.csv,.excel{background-color:#F026FA;border-radius:15px;color:white;border:2px solid #F026FA;}
#resul_depense,#indicateur{float:left;}
#resul_depense{width:60%;} #indicateur{width:25%;margin-left:10%;font-size:16px;}
.pied_page{margin-left:20%;margin-top:25px;} .bout{float:left;margin-left:1%;width:30px;height:30px;background:white;background:#0C80E7;color:white;border:2px solid #0C80E7}
h4{font-family:arial;font-size:18px;color:black;color:font-weight:none;}
.montants{margin-left:15%;font-size:30px;color:#04850C;font-weight:bold;} .montan{margin-left:15%;font-size:30px;color:#D20A22;font-weight:bold;}
.name{font-size:15px;margin-left:5%;color:black;} .monta{margin-left:15%;font-size:30px;color:#0A68D2;font-weight:bold;}
.montac{margin-left:15%;font-size:30px;color:#E45416;font-weight:bold;} .print,.pri{border-radius:20px;width:150px;height:35px;background:#85C9F8;border:2px solid #85C9F8;color:white;text-align:center;color:white;margin-left:12%;margin-top:80px;}
.td{margin-left:7%;margin-top:5px;font-size:16px;}
#logo{position:absolute;top:6px;left:1.3%;border-radius:50%;}
.tds{font-size:28px;margin-left:12%;color:#09A81F;}
.tdv{font-size:28px;margin-left:12%;color:#A80913;}
.tdc{font-size:28px;margin-left:12%;color:#0E84D1;}
#message_datas{padding-left:2%;padding-bottom:8px;position:absolute;}
.drop{position:absolute;top:50px;width:350px;height:200px;background:white;border:2px solid white;margin-left:-5px;
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
transition: all 200ms;}

.drops{display:none;}  .users{display:none} #news_data{display:none;}
.mobile{display:none;}
.sidebar .nav-item .nav-link span{font-size:14px;font-weight:bold;text-transform:capitalize;}
.navbar-nav{background:#06308E;}

#panier{position:fixed;left:60%;top:15px;color:black;font-size:14px;background:black;
opacity:0.6;padding:1%;color:white;border-radius:5px;}

.btn{display:none;} .delete{margin-left: 5%;margin-bottom: 10px;color:white;
 background: #F83127;width:100px;height:30px;border-radius:15px;
border: 2px solid #F83127;}

.payements{
   width :300px;
   color:black;
    padding-left: .100rem;
    margin: .175rem .175rem .175em;
    font-size: .95rem;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #e3e6f0;
    border-radius: .35rem;
	display:none;
	text-transform:capitalize;
}

.ss {
    padding: 2%;
    width: 20px;
    height: 20px;
    border-radius: 40%;
    border: 2px solid #eee;
    background: #e74a3b;
    color: white;
    margin-left: -10px;
}

/*------------------------------------------------------------------
[ Responsive ]*/

@media (max-width: 575.98px) { 
#panier{display:none;}
#logo{display:none;} .side{display:none;} .bs{display:none;}.bg{display:none;}
.cont1,.cont12,.cont13,.cont14{display:block;width:250px;margin-top:8px;margin-left:7%;}
.cont2{display:block;width:250px;margin-top:10px;margin-left:8%;} .center{width:95%;height:2100px;}
ul{display:none;}
.bg-gradient-primary{display:none;} .contens,.contens1{display:block;width:250px;margin-top:10px;margin-left:8%;}
.drop{position:absolute;left:7%;width:300px;}
 .drops{z-index:4;padding-left:5%;position:absolute;position:absolute;left:1%;width:350px;display:block;background:white;
height:2800px;overflow-y:scroll}h2{margin-top:20px;border-top:1px solid #eee;color:black;}
.us{margin-top:5px;border-bottom:1px solid #eee;color:black;}
#news_data{display:block;} #news{display:none;} .users{display:block;color:black;}
.form-select{display:none;} 
.mobile{width:350px;margin-left:2%;margin-top:15px;display:block;color:black;border-bottom:2px solid #eee;padding-bottom:20px;} .tf,#tf{display:none;}
.form-select{display:none;} .expor{margin-left:3%;} .pied_page{margin-left:-3%;} #delete_line{display:none;}
#tf,.tf{display:none;} h2{font-size:23px;width:350px;} .delete{margin-left:3%;}
.enre{font-family:arial;font-size:15px;z-index:3;background:black;opacity:0.8;position:absolute;top:90px;left:20%;color:white;width:200px;text-align:center;padding:0.5%;height:50px;}

#indicateur{display:none;} .der{padding-left:3%;color:black;font-size:16px;}
.btn{display:block;} #searchDropdown{display:none;}
.excel{margin-left:120%;}
.s{display:block;}
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
.center{height:1600px;} .detail{margin-left:2.5%;}
#indicateur{display:none;} .reini{top:120px;left:20%;}
.enre {
    font-family: arial;
    font-size: 15px;
    z-index: 3;
    background: black;
    opacity: 0.8;
    position:absolute;
    top: 155px;
    left: 60%;
    color: white;
    width: 200px;
    text-align: center;
    padding: 0.5%;
    height: 50px;
}
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
.center{height:1600px;} .detail{margin-left:12.5%;}
.btn{display:block;} #indicateur{font-weight:15px;margin-left:10%;}
#indicateur{display:none;}
}



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
         <div id="data_annuler"></div><!--retour ajax -- annuler-->
         <div id="collapse" class="collapse show" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                  
                </div>

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

                        <div class="input"><select class="form-select form-select-sm" aria-label=".form-select-sm example">
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

                    <?php include('inc_menu1.php');?>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- 404 Error Text -->
                    <div class="center">
                    
					<div id="resul_depense"></div><!--retour ajax sur la lsite des dépenses-->
		            <div id="indicateur"></div>
  <div class="reini" style="display:none">
 <form method="post" id="form_reini" action="">
 <h1>Réinitialiser votre caisse journalière</h1>
 <div class="dert"> Date du point :<input type="date" id="reini" name="reini" required></div>
 <div class="action"><button type="button" class="annul">Annuler</button><input type="submit" class="ok" value="ok"></div>
 </form>

 </div><!--reini---->
 
 <div id="data_modifier"></div><!--données modifier depense-->
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
<div id="panier"></div>
<div id="pak" style="display:none"></div>
<div id="result"></div><!--div-->


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
  <script src="js/tresorerie.js"></script>
  <script type="text/javascript">
  $('#sidebarToggleTop').click(function(){
		$('#accordionSidebar').css('display','block');
	 });
	 
	 $('.buts').click(function(){
   $('.reini').css('display','block');
   $('#pak').css('display','block');
   $('.drops').css('display','none');
   });
 
 $('.annul').click(function(){
  $('#pak').css('display','none');
  $('.reini').css('display','none');
 });
  
    $(document).on('click','.moyen',function(){
		var id = $(this).data('id2');
		var action="payements";
		var txt ='<span style="cursor:pointer" class="moyens" data-id3="'+id+'">fermer <i class="fas fa-angle-down"></i></span>';
				$.ajax({
					url: "depenses_view_tresorerie.php",
					method: "POST",
					data:{id:id,action:action},
					success: function(data) {
						$('#paiement'+id).html(data);
						$('#paiement'+id).css('display','block');
						$('#first'+id).css('display','none');
						$('#second'+id).html(txt);
						$('#indicateur').css('display','none');
					}
				});
	       });
				
		$(document).on('click','.moyens',function(){
		    var id = $(this).data('id3');
		    $('#first'+id).css('display','block');
						$('.moyens').css('display','none');
						$('#paiement'+id).css('display','none');
						$('#indicateur').css('display','block');
					});
					
			
         $(document).on('click','.moye',function(){
		var id = $(this).data('id2');
		var action="payements";
		var txt ='<span style="cursor:pointer;color:#0C80E7;padding-left:65%" class="moyes" data-id3="'+id+'">fermer <i class="fas fa-angle-down"></i></span>';
				$.ajax({
					url: "depenses_view_tresorerie.php",
					method: "POST",
					data:{id:id,action:action},
					success: function(data) {
						$('#paiemen'+id).html(data);
						$('#paiemen'+id).css('display','block');
						$('#three'+id).css('display','none');
						$('#four'+id).html(txt);
						$('#indicateur').css('display','none');
					}
				});
		
		
			});
			
			$(document).on('click','.moyes',function(){
		    var id = $(this).data('id3');
			  $('#three'+id).css('display','block');
			  $('#four'+id).html('');
			 $('#paiemen'+id).css('display','none');
						
					});
  
  </script>
</body>

</html>