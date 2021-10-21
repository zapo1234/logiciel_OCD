<?php
include('../connecte_db.php');
include('../inc_session.php');

if(!isset($_GET['id_home']) AND !isset($_GET['home_user'])) {
  header('location:home_none.php');
}	

// recupére les variable
$id_home =$_GET['id_home'];
$home_user =$_GET['home_user'];
$req=$bdd->prepare('SELECT denomination,email_user,numero,id_visitor FROM inscription_client WHERE id_visitor= :id');
   $req->execute(array(':id'=>$_GET['home_user']));
   $donnees=$req->fetch();
	$req->closeCursor();
	
	if(!isset($_GET['home_user']) OR $_GET['home_user']!=$donnees['id_visitor']){
	header('location:home_none.php');
}

  // recupere les données des chambre 
   $reg=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,equipements,equipement,cout_nuite,cout_pass,icons,infos,nombre_lits FROM chambre WHERE id_chambre= :id_home AND  id_visitor= :home_user');
    $reg->execute(array(':id_home'=>$id_home,
	                    ':home_user'=>$home_user));
						
	$donns = $reg->fetch();
	
	if($donns['nombre_lits']==1){
	$lits = '<i class="fas fa-bed"></i>';
	}
	elseif($donns['nombre_lits']==2){
	 $lits ='<i class="fas fa-bed"></i> <i class="fas fa-bed"></i>';	
	}
	else{
		$lits='<i class="fas fa-bed"></i> <i class="fas fa-bed"></i>
		       <i class="fas fa-bed"></i> plus...';
		}
	
	$reg->closeCursor();
     $rem='<span class="ts"></span>';
	$rt=",";
	$rs='<span class="ts"><i style="font-size:12px;font-weight:200px" class="fa">&#xf00c;</i></span>';
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
	<link rel="stylesheet" href="/lib/w3.css"><!-- bar progression indicateur-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
     .s{display:none;}
	 h1,select{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:18px;margin-left:8%;color:black}
	 .x{display:none;position:absolute;top:50px;left:80%;z-index:5;cursor:pointer;}
    #collapse{background:white;width:200px;height:800px;position:fixed;top:60px;left:82%;border-shadow:3px 3px 3px black;}
    
    .bs{background:#eee;width:250px;height:250px;border:1px solid #eee;background:white;}
	.bc{background:white;width:250px;height:250px;border:1px solid #eee;margin-top:30px;margin-left:3%;color:black;padding:2%;}
	
	.bd{margin-top:10px;margin-left:3%;} .users{width:250px;background:white;color:black;padding:2.5%;margin-left:4%;}
		
.center{background-color:white;width:80%;height:1250px;padding:1.5%;margin-top:5px;} .inputs,.input{margin-left:5%;float:left;}
.nav-search{width:70%;} 

.content2{margin-left:0.2%;}
.dt{font-size:11px;color:green;} .prix,.pric{border:1px solid #eee;width:30%;margin-left:2%;}
.dc{padding-bottom: 5px;font-size:14px;font-weight: bold;color: #ACD6EA;} .but2 a{font-size:11px;padding:0.8%;margin-left:50%;background:#111E7F;color:white;text-decoration:none;border:2px solid #111E7F;border-radius:15px;} .but1{margin-left:3%;}

#pak{position: fixed;top: 0;left: 0;width:100%;height: 100%;background-color: black;z-index:2;opacity: 0.8;}
.center{background:#eee;} 

.navbar-nav{background:#eee;}
 .btn{display:none;}
.sup{cursor:pointer;color:white;font-size:12px;}
.but{margin-left:60%;width:200px;height:38px;margin-top:20px;margin-bottom:20px;border: 2px solid #0769BA;background:#0769BA;color:white;}
h1{margin-top:18px;} .resul a{padding:2%;color:black;width:15%;} .resul{padding:2%;border-bottom:2px solid white;height:110px;border-top:2px solid white;} .resul a:hover{text-decoration:none;} .homesoccupe{display:none;}
.button{width:200px;height:35px;background:green;color:white;border:2px solid green;font-weight:bold;} 
#examp{background:white;width:35%;height:250px;position:absolute;z-index:4;left:30%;top:100px;padding:2%;} .libre{display:none;}
h3{text-center:center;color:#0769BA;} .buttons{margin-left:50%;width:250px;height:40px;background:#0769BA;
color:white;border:2px solid #0769BA;margin-top:20px;font-weight:bold;border-radius:20px;}
label{color:black;font-size:13px;}
table{background:white;} th,td{color:black;font-weight:200}
.vert{font-size:13px;color:green;}
.trs{font-size:25px;color:black;font-weight:bold;}
.df{padding-left:2%;color:black;font-family:arial;font-size:13px;}
h3{margin-left:25%;}
/*------------------------------------------------------------------
[ Responsive ]*/
@media (max-width: 575.98px) { 
.s{display:block;}
#panier{display:none;}
#logo{display:none;} .side{display:none;} .bs{display:none;}.bg{display:none;}
.cont1,.cont12,.cont13,.cont14{display:block;width:250px;margin-top:8px;margin-left:7%;}
.cont2{display:block;width:250px;margin-top:10px;margin-left:8%;} .center{width:95%;height:2400px;}
.us{margin-top:5px;border-bottom:1px solid #eee;color:black;}
#news_data{display:block;} #news{display:none;} .users{display:block;color:black;}
#accordionSidebar{width:100px;} .btn{display:block;}#searchDropdown{display:none;} 
#collapse{display:none;position:absolute;left:1%;height:1500px;}
#im{display:none;} 
}


@media (min-width: 768px) and (max-width: 991px) {
#panier{display:none;}
#logo{display:none;} .side{display:none;} .bs{display:none;}.bg{display:none;}
 .center{width:100%;margin:0;padding:0;height:1000px;}
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
#searchDropdown{display:none;} 
#collapse{position:absolute;display:none;left:62%;height:1200px;}
}


@media (min-width: 992px) and (max-width: 1200px) {
#panier{margin-left:-30%;}
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
height:2800px;overflow-y:scroll;z-index:5;} #searchDropdown{display:none;}
#collapse{position:absolute;display:none;left:70%;height:1200px;}
}



</style>

</head>

<body id="page-top">
 <div class="x"><i class="fas fa-times" style="color:white;font-size:20px;"></i></div>
        <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <div class="navbar-nav bg-gradient sidebar sidebar-dark accordion" id="accordionSidebar">
         <h1>Liste des chambres disponible</h1>
		 <div class="df">à l'instant
		 Ajourd'huit à <?php echo date('H:i');?></div>
		  <div id="result"><!--retour ajax list home-->
          
		  </div>
        </div>
		
        <!-- End of Sidebar -->
        
         <div id="collapse" class="collapse show" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bn">
                      
                  <div class="container">
 
	              
				  </div><!--live-infos-->
					  
                    </div>
					
					
					<div class="bd">
		
		<div class="users">
		
		
		</div>
	
		<div class="bc">
		<div>Récapitulatif de réservation</div>
		</div>
                      
                    </div>
                </div>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn rounded-circle mr-3">
                        <i class="fa fa-bars" style="color:blue"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="navbar-search">
                        <div class="input-group">
                            
                           <div class="inputs">
                               <button type="button" class="button">choix de disponibilité</button>
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
					<div class="equipement">
                    <table class="table">
       <thead>
    <tr>
      <th scope="col">Type de local</th>
      <th scope="col">Equipements</th>
	  <th scope="col">Occupants</th>
	  <th scope="col">Tarif</th>
      <th scope="col">Divers</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo$donns['type_logement'];?><br/>
	  <i class="fas fa-home" style="font-size:12px"> </i><?php echo $donns['chambre'];?></th>
      <td>Equipements principaux<br/><span class="vert"><?php echo$donns['equipement'];?></span><br/><br/>
	  Equipements secondaires<br/><?php echo str_replace($rt,$rs,$donns['equipements']);?></td>
      <td>Nombre de personnes autorisés<br/><?php echo$donns['icons'];?><br/>
	      Nombre de lits au sein de la chambre<br/>
		  <?php echo$lits;?>
	  </td>
      <td>Prix nuité<br/><span class="trs"><?php echo$donns['cout_nuite'];?>xof</span><br/>Prix horaire<br/><span class="trs"><?php echo$donns['cout_nuite'];?>xof</span></td>
    </tr>
    
  </tbody>
</table>

<div class="content">
<h3><i class="fas fa-camera"></i> Visualisez le local en images  </h3>

</div>
 
                     </div>
	                 </div><!--center-->

	
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

<div id="examp" style="display:none">
<form method="post" id="form1" action="">
 
  <h3> check_in et check_out </h3>
   
   <div class="row mb-3">
                    <div class="col">
					  <label>Date d'arrivée</label>
                      <input type="date" id="days" name="days" class="form-control" placeholder="" min="<?php echo date('Y-m-d');?>" required>
                    </div>
                    <div class="col">
					<label>Date de départ</label>
                      <input type="date" id="das" name="das" class="form-control" placeholder="" min="<?php echo date('Y-m-d');?>" required
					  >
                    </div>
                </div>
  <span class="errors"></span>
   <button type="submit" class="buttons">rechercher</button>
 
<input type="hidden" name="token" id="token" value="<?php
//Le champ caché a pour valeur le jeton
echo $_SESSION['token'];?>">

 </form>
 </div>

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
     
	 $('#sidebarToggleTop').click(function(){
		$('#accordionSidebar').css('display','block');
	 });
	 
	$('#sms').click(function(){
	$('.drop').slideToggle();
	$('.drops').css('display','none');

	});
	
	 $('#news_data').click(function(){
	$('#collapse').slideToggle();
	$('.drop').css('display','none');
	
	});
	
	 $('#news').click(function(){
	$('.users').slideToggle();
	});
			
	// click sur les news message
	
	// pagintion
  $(document).on('click','.bout',function(){
	  var page =$(this).attr("id");
	  list(page);
   });
	
	// compter les nouveaux message
	function list(page) {
				var action="list";
				$.ajax({
					url: "list_datas_homes.php?home_user=<?php echo$_GET['home_user'];?>",
					method: "POST",
					data:{action:action},
					success: function(data) {
						$('#result').html(data);
					}
				});
			}

			list();
			
	
   $('.but').click(function(){
   $('#pak').hide(2000);
   $('#block').hide(1000);
 });
 
 $('.button').click(function(){
	$('#pak').css('display','block');
   $('#examp').css('display','block');	
	 $('.x').css('display','block');
 });
 
 $('.x').click(function(){
	$('#pak').css('display','none');
   $('#examp').css('display','none');	
	 $('.x').css('display','none');
 });
 
 
 $('#pak').click(function(){
	$('#pak').css('display','none');
   $('#examp').css('display','none');	
   
 });
 
  $(function(){
  var winners_list = $('.winners li');
  var ul_height = $('.winners').outerHeight();
  $('.winners').append(winners_list.clone());

  var i = 0;
  (function displayWinners(i){
    setTimeout(function(){
      if( $('.winners').css('top') == (-1 * ul_height) + 'px'){
        $('.winners').css('top', '0');
      }
      var li_height = $(winners_list[i]).outerHeight();
      $('.winners').animate({
        top: '-=' + li_height + 'px'}, 500);
      if( i == winners_list.length - 1){
        i = 0;
      }else{
        i++;
      }
      displayWinners(i);
      
    }, 5500);
  })(i);
  
});


});
</script>
</body>

</html>