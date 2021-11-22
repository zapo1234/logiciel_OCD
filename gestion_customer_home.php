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
     .s{display:none;}
	 h1,select{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:18px;margin-left:8%;color:black}
    #collapse{width:300px;height:100px;padding:2%;position:fixed;top:60px;left:81%;border-shadow:3px 3px 3px black;}
    .bg{border:;background:white;width:340px;height:500px;padding:4%;margin-top:0px;}
    .bs{width:340px;height:300px;}
    .en{height:50px;border-bottom:1px solid #eee;} .h1{font-size:24px; text-align:center;} .encaiss{font-size:16px;font-weight:none;} .h2{margin-top:70px;margin-left:10%;} .t_monts,.t_mont,.t_mon{font-size:18px;margin-left:-20px;}
	#montant td{font-weight:none;} .butt{height:35px;border-radius:15px;padding:1.5%;width:180px;font-weight:200;background:#F026FA;color:white;font-size:20px;border:2px solid #F026FA;}
	.t_monts{color:#42FC72;} .t_mont{color:#FA2367;} .t_mon{color:#14B5FA;}
.center{background-color:#eee;width:80%;height:1050px;padding:1.5%;margin-top:5px;} .inputs,.input{margin-left:5%;float:left;}
.nav-search{width:70%;} .form-select{margin-left:40%;width:200px;height:43px;}
.inputs{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;font-weight:bold;color:green;}
#pak{position: fixed;top: 0;left: 0;width:100%;height: 100%;background-color: black;z-index:2;opacity: 0.8;}
#examp{border:2px solid #eee;padding:3%;position:absolute;width:40%;height:700px;z-index:3;left:28%;top:20px;background-color:white;border-radius:10px;}
.forms{width:200px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;font-weight:bold;color:black}
h2,h1{width:500px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;text-transform:uppercase;color:black;border-bottom:1px solid #eee;margin-bottom:15px;}
label {color:black;} .buttons{margin-left:55%;margin-top:20px;width:250px;height:40px;color:white;
background:#ACD6EA;border-radius:15px;text-transform:capitalize;border:2px solid #ACD6EA}
.form1,.form2{display:none;}

.content1{display:none;color:black;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";}
.h3{padding-bottom:5px;font-size:20px;font-weight:bold;color:#4e73df;text-transform:uppercase;border-bottom:2px solid #ACD6EA;}
.h5{text-align:center;font-size:11px;font-weight:bold;color:green;padding:2%;width:180px;height:35px;}
.h6{color:red;font-weight-bold;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";}


.conten1,.conten2{float:left;margin-left:2%;background:white;height:700px;}  .conten2{width:20%;} .conten1{width:95%;overflow-y:scroll;}


.side{color:#A9D3F2;padding:35%;text-align:center;margin-left:-8%;width:160px;height:160px;border-radius:50%;background:white;border:2px solid white;margin-top:95px;}
ul a{margin-left:3%;} #form_logo{display:none;} h3{font-size:16px;}.print{border-radius:20px;width:150px;height:35px;background:#85C9F8;border:2px solid #85C9F8;color:white;text-align:center;color:white;margin-left:12%;margin-top:80px;}
.td{margin-left:10%;margin-top:5px;font-size:16px;} #logo{position:absolute;top:6px;left:1.7%;border-radius:50%;}
.tds{font-size:28px;margin-left:12%;color:#09A81F;margin-left:10%;}
.tdv{font-size:28px;margin-left:12%;color:#A80913;margin-left:10%;font-weight:bold;}
.tdc{font-size:28px;margin-left:12%;color:#0E84D1;margin-left:10%;font-weight:bold;}
.td{margin-left:10%;}

.live-infos{
  width: 250px;
  height: 600px;
  overflow: hidden;
  position: relative;
  background-color:white;
  
}
ul.winners{
  position: absolute;
  top: 0;
  width: 200%;
  list-style-type: none;
  padding: 0;
  margin: 0;
}
ul.winners li{
  /*height: 50px;*/
  border-bottom: 1px #eee solid;
  line-height: 50px;
  font-size: 1rem;
  color: black;
  padding-left: 2rem;
}
.mentions{
  display: block;
  margin: 10px 0;
  font-size: 1.2rem;
  
}

.sidebar .nav-item .nav-link span{font-size:14px;font-weight:bold;text-transform:capitalize;}
.navbar-nav{background:#06308E;}

#resultats{height:700px;overflow-y:scroll;padding-left:3%;width:270px;}

h3{font-size:20px;padding:2%;color:black;border-bottom:1px solid #eee;width:95%;}

.btn{display:none;} tr{width:100%;border:1px solid #eee;height:50px;} th,td{text-align:center;color:black;font-size:15px;}
.alerte{color:white;background:#EC2D3B;padding:1%;border-radius:20px;font-family:arial;}
.attention{color:white;background:#31C813;padding:1%;border-radius:20px;font-family:arial;} .mobile{display:none;}
.sup{cursor:pointer;color:white;font-size:12px;}

#menu_s{margin-left:4%;}
#menu_s a {padding:3%;font-size:14px;color:black;font-weight:none;}
.menu_mobile{display:none;}
.btns{display:block;background:white;border-color:white;color:#7BCCF8;}


@media (max-width: 575.98px) { 
#panier{display:non;} #accordionSidebar{display:none;} #searchDropdown{display:none;}
#logo{display:none;} .side{display:none;} .bs{display:none;}.bg{display:none;}
.cont1,.cont12,.cont13,.cont14{display:block;width:250px;margin-top:8px;margin-left:7%;}
.cont2{display:block;width:250px;margin-top:10px;margin-left:8%;} .center{width:95%;height:2100px;}
ul{display:none;}
.bg-gradient-primary{display:none;} .contens,.contens1{display:block;width:250px;margin-top:10px;margin-left:8%;}
.drop{position:absolute;left:7%;width:300px;}
.drops{padding:2%;position:absolute;left:7%;width:340px;display:block;background:white;
height:2800px;overflow-y:scroll} h2{margin-top:20px;border-top:1px solid #eee;color:black;}
.us{margin-top:5px;border-bottom:1px solid #eee;color:black;}
#news_data{display:block;} #news{display:none;} .users{display:block;color:black;}
input{display:block;} .form-select{display:none;} #panier{display:none;}
.mobile{display:block;border-bottom:2px solid #eee;color:black;height:100px;padding:3%;} .tbs{display:none;}.conten1{width:95%;padding:3%;} .conten2{display:none;}
 #but{display:none;} 
 .menu_mobile{padding:1%;color:black;width:75%;height:800px;background:white;position:absolute;top:60px;left:0px;z-index:4;padding:3%} 
.menu_mobile a {color:black;font-size:18px;font-size:18px;border-bottom:1px solid #eee;font-family:arial;padding:1%;} .nav{margin-top:30px;margin-left:7%;} .nv{padding-left:3%;font-size:16px;}
.xs{position:absolute;top:5px;left:3%;z-index:4;}
}


@media (min-width: 768px) and (max-width: 991px) {
#panier{display:none;}
#logo{display:none;width:100px;} .side{display:none;} .bs{display:none;}.bg{display:none;}
#accordionSidebar{display:none;} .center{width:100%;margin:0;padding:0;height:1000px;}
cont1,.cont12,.cont13,.cont14,.titre{font-size:14px;}
 h2{margin-top:20px;border-top:1px solid #eee;color:black;}
.us{margin-top:5px;border-bottom:1px solid #eee;color:black;margin-left:10%;}
#news_data{display:block;} #news{display:none;} 
.users{display:block;color:black;font-family:arial;font-size:13px;} h2{margin-left:3%;}
#caisse{font-size:14px;} .tds,.tdv,.tdc{font-size:22px;font-weight:bold;}
.user{padding-left:7%;} .dtt,.dts{font-size:20px;} .h1{font-size:14px;}
.btn{display:block;} .form-select{display:none;}

.drop{position:absolute;width:300px;left:-20%;top:100px;background:white;}
.drops{padding:2%;position:absolute;left:-40%;width:500px;background:white;
height:2800px;overflow-y:scroll;z-index:5;} #examp{width:80%;margin-left:-15%;}
.content3 {width:40%;}
.menu_mobile{padding:1%;color:black;width:33%;height:800px;background:white;position:absolute;top:60px;left:0px;z-index:4;padding:3%} 
.menu_mobile a {color:black;font-size:18px;font-size:18px;border-bottom:1px solid #eee;font-family:arial;padding:1%;} .nav{margin-top:30px;margin-left:7%;} .nv{padding-left:3%;font-size:16px;}
.xs{position:absolute;top:5px;left:3%;z-index:4;}
}


@media (min-width: 992px) and (max-width: 1200px) {
#panier{margin-left:-20%;}
#logo{display:none;} .side{display:none;} .bs{display:none;}.bg{display:none;}
#accordionSidebar{display:none;width:100px;} .center{width:100%;margin:0;padding:0;height:1000px;}
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
.center{height:1600px;} .input{display:none;} #examp{width:60%;margin-left:-5%;}
.menu_mobile{padding:1%;color:black;width:30%;height:800px;background:white;position:absolute;top:60px;left:0px;z-index:4;padding:3%} 
.menu_mobile a {color:black;font-size:18px;font-size:18px;border-bottom:1px solid #eee;font-family:arial;padding:1%;} .nav{margin-top:30px;margin-left:7%;} .nv{padding-left:3%;font-size:16px;}
.xs{position:absolute;top:5px;left:3%;z-index:4;}
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
        
         <div id="collapse" class="collapse show" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bs">
                    <h1>Les enregistrements récents</h1>
                      
                  <div class="container">
 
                  <div class="live-infos">
                   
				   <ul class="winners">
	            <?php
		// afficher les dernières enregistrements
		// aller chercher les auteurs en écriture sur une facture
	    $rel=$bdd->prepare('SELECT  permission,society,code FROM inscription_client WHERE email_user= :email_user');
        $rel->execute(array(':email_user'=>$_SESSION['email_user']));
	    $donns =$rel->fetch();
		if($donns['permission']=="user:boss" OR $donns['permission']=="user:gestionnaire"){
        $res=$bds->prepare('SELECT date,numero,clients,montant,type,types,society FROM facture WHERE  email_ocd= :email_ocd  ORDER BY id DESC LIMIT 0,10');
        $res->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
        }
		
		// afficher les facture.
		if($donns['code']==1 OR $donns['code']==2 OR $donns['code']==3){
		$session=$donns['code'];
		$res=$bds->prepare('SELECT date,numero,clients,montant,type,types,society FROM facture WHERE code= :code AND  email_ocd= :email_ocd  ORDER BY id DESC LIMIT 0,5');
        $res->execute(array(':code'=>$session,
		                    ':email_ocd'=>$_SESSION['email_ocd']));
		}
		
		 while($donnes=$res->fetch()){
			
          if($donnes['type']==1){
            $icons='<i class="fas fa-coins" style="font-size:15px;color:#42A50A"></i>';
		    $type ='<span class="sejour">'.$donnes['types'].'</span>';
			
		  }
        	
          if($donnes['type']==2){
             $icons='<i class="fas fa-coins" style="font-size:15px;color:#650699"></i>';
			 $type ='<span class="pass">'.$donnes['types'].'</span>';
		  }

          if($donnes['type']==3){
            $icons='<i class="fas fa-wheelchair" style="font-size:15px;color:#063999"></i>';
			$type ='<span class="reservation">'.$donnes['types'].'</span>';
		  }
          
		  if($donnes['type']==4){
            $icons='<i class="fas fa-wheelchair" style="font-size:15px;color:#063999"></i>';
			$type ='<span class="annule">'.$donnes['types'].'</span>';
		  }	
			 
		 echo'<li>'.$icons.'  <i class="far fa-user" style="font-size:15px;padding-left:3px;"></i>  '.$donnes['clients'].'<br/>
		       '.$type.' '.$donnes['montant'].' xof de <br/><span class="site">'.$donnes['society'].'</span></li>';
		}
		       ?>
				   
				</ul>
	               
				  </div><!--livre-infos-->
	              
				  </div><!--live-infos-->
					  
                    </div>
					
	 
            
			</div>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <span id="sidebar" class="btns">
                        <i class="fa fa-bars"></i>
                    </span>

                    <!-- Topbar Search -->
                    <form
                        class="navbar-search">
                        <div class="input-group">
                            
                           <div class="inputs">
                              Réservation en cours
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
                    <div class="conten1">
					<h3>Suivi des arrivées clients en temps réel en cas de réservation</h3>
					<div id="result"></div><!--retour ajax -->
					</div><!--conten1-->
 
    
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
  

<!--div black-->
<div id="pak" style="display:none"></div>
<div id="panier"></div>
<?php include('inc_menu.php');?>
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
    
	$('#navs').click(function(){
	$('.collapse').slideToggle();
	 });

    $('#sidebar').click(function(){
		$('#pak').css('display','block');
		$('.menu_mobile').css('display','block');
		$('.xs').css('display','block');
	 });
	 
	 $('.xs').click(function(){
	 $('.menu_mobile').css('display','none');
	 $('#pak').css('display','none');
	 $('.xs').css('display','none');
	 });
	 

  $('#sms').click(function(){
	$('.drop').slideToggle();
	});

   $('#but').click(function(){
   $('#examp').css('display','block');
   $('#pak').css('display','block');
   var email = "default@gmail.com";
   $('#email').val(email);
 });
 
 $('#im').click(function(){
	$('#data').css('display','block');
	 
 });
 
 $('#pak').click(function(){
	$('#examp').css('display','none');
   $('#pak').css('display','none');
   $('.reini').css('display','none');
 });
 
 $('.sup').click(function(){
	$('#pak').css('display','none');
    $('.reini').css('display','none');	
	 
 });
 
 // recupération et caclul des montant
	
	// calculer les sommes automatiquement du récapitualiti

  
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
      
    }, 3500);
  })(i);
  
});

// Afficher les données pour les reservation
	function result() {
				var action="result";
				$.ajax({
					url: "result_reservation_data.php",
					method: "POST",
					data:{action:action},
					success: function(data) {
						$('#result').html(data);
					}
				});
			}

			result();
			
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

});
</script>
</body>

</html>