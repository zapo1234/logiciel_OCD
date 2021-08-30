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
.center{background-color:#eee;width:80%;height:800px;padding:0.01%;margin-top:5px;} .inputs,.input{margin-left:5%;float:left;}
.nav-search{width:70%;} .form-select{margin-left:40%;width:200px;height:43px;}
.inputs{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;font-weight:bold;color:green;}

.delete{margin-left:15%;margin-bottom:10px;color:white;background:#F83127;border:2px solid #F83127}
.bg{font-weight:bold;color:black;font-size:13px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"}
.tot{margin-bottom:10px;} #add_local{height:35px;margin-left:4%;border:2px solid #E5F1FB;#font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";margin-left:15px;margin-top:10px;width:150px;color:black;background:#E5F1FB;padding:1%;}
.reini{padding:2%;z-index:3;position:absolute;top:300px;left:40%;background-color:white;width:350px;height:220px;border-radius:10px;border:3px solid white;}
.action{margin-top:25px;} .annul{border-radius:15px;width:120px;height:30px;background-color:#FF4500;color:white;border:2px solid #FF4500;}
.ok{width:45px;height:45px;border-radius:50%;margin-left:30%;background-color:#1E90FF;border:2px solid #1E90FF} #reini{margin-left:2%;height:40px;width:130px;font-family:arial;}

#pak{position:fixed;top:0;left:0;width:100%;height:100%;background-color:black;z-index:2;opacity:0.8;}

.enre{font-size:12px;z-index:4;position:absolute;top:83px;left:70%;color:green;font-weight:bold;font-size:16px;padding:1%;text-align:center;}
.dep {
  animation: spin 2s linear infinite;
  margin-top:10px;
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
 
.side{color:#A9D3F2;padding:35%;text-align:center;margin-left:-8%;width:160px;height:160px;border-radius:50%;background:white;border:2px solid white;margin-top:95px;}
ul a{margin-left:3%;} .annuler{background-color:white;width:350px;height:200px;border:3px solid #eee;padding:3%;position:absolute;z-index:4;top:200px;margin-left:20%;}
.annuls{width:40px;height:40px;background:#224abe;margin-left:10%;color:white;border:2px solid #224abe;margin-top:10px;}
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

#result{width:100%;height:580px;overflow-y:scroll;}.message{} #message{padding:1%;margin-left:2%;width:90%;border:2px solid #eee;height:90px;border-radius:30px;}
.sends{cursor:pointer;position:absolute;left:77%;top:800px;background:white;padding:0.8%;border-radius:50%;}

.datas_messanger{color:black;margin-top:8px;width:40%;background:white;margin-left:1%;padding:2%;
border-radius:25px;}

.h1{margin-bottom:3px;} .boss,.gestionnaire,.employes{font-size:15px;color:black;text-transform:capitalize;font-weight:bold;}

#statusboss{padding-left:70%;color:green;font-size:18px;font-weight:bold;} .dt{padding-left:10%;} .donnes{font-family:arial;font-size:14px;}
#statusgestionnaire{padding-left:70%;color:blue;font-size:18px;font-weight:bold;} .dt{padding-left:10%;font-size:13px;} .donnes{font-family:arial;font-size:14px;}
#statusemployes{padding-left:70%;color:#F43E78;font-size:18px;font-weight:bold;}

#datasboss{margin-left:60%;background:#A3F8D5;} #datasgestionnaire{margin-left:20%;background:#B9DFFB;}
.action{padding-left:70%;cursor:pointer;} .divaction{width:100px;padding:2%;background:white;color:black;border-radius:15px;}
.divaction a{color:black;font-size:14px;text-align:center;text-decoration:none;}
#supboss{margin-left:68%;font-family:arial;border:2px solid #eee;border-radius:20px;} 
#supgestionnaire{margin-left:20%;} #supemployes{margin-left:20%;} 
h2{text-align:center;font-size:16px;color:black} .bs,.bg{padding:2%;}
#form_sup{margin-left:20%;margin-top:10px;} #sends{margin-left:6%;margin-top:30px;width:150px;height:30px;color:#F7361C;color:white;border:2px solid #F7361C;
background:#F7361C;}
.mot{color:black;margin-left:15%;margin-top:60px;} .count{margin-left:15%;margin-top:50px;}
.dr{padding-left:30%;font-size:25px;padding-top:10px;font-weight:bold;color:#3589E3;}
.mots{padding-left:30%;font-size:25px;padding-top:10px;font-weight:bold;}
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
transition: all 200ms;}
.datas_messanger{border-bottom:1px solid #eee;}

.ss{padding:2%;width:20px;height:20px;border-radius:40%;border:2px solid #eee;background:#e74a3b;color:white;
margin-left:-10px;}

.drops{display:none;}  .users{display:none} #news_data{display:none;}

.sidebar .nav-item .nav-link span{font-size:14px;font-weight:bold;text-transform:capitalize;}
.navbar-nav{background:#06308E;}

#panier{position:fixed;left:60%;top:15px;color:black;font-size:14px;background:black;opacity:0.7;padding:1%;color:white;border-radius:5px;}


@media (max-width: 575.98px) { 
#panier{display:none;}
#logo{display:none;} .side{display:none;} .bs{display:none;}.bg{display:none;}
.cont1,.cont12,.cont13,.cont14{display:block;width:250px;margin-top:8px;margin-left:7%;}
.cont2{display:block;width:250px;margin-top:10px;margin-left:8%;} .center{width:95%;height:2100px;}
ul{display:none;}
.bg-gradient-primary{display:none;} .contens,.contens1{display:block;width:250px;margin-top:10px;margin-left:8%;}
.drop{position:absolute;left:7%;width:300px;}
drops{z-index:4;padding-left:5%;position:absolute;position:absolute;left:1%;width:350px;display:block;background:white;
height:2800px;overflow-y:scroll} h2{margin-top:20px;border-top:1px solid #eee;color:black;}
.us{padding-bottom:5px;margin-top:5px;border-bottom:1px solid #eee;color:black;}
#news_data{display:block;} #news{display:none;} .users{display:block;color:black;}
#but{display:none;} .datas_messanger{padding-left:0%;}

.datas_messanger{color:black;margin-top:8px;width:70%;background:white;margin-left:1%;padding:2%;
border-radius:25px;}

.h1{margin-bottom:3px;} .boss,.gestionnaire,.employes{font-size:15px;color:black;text-transform:capitalize;font-weight:bold;}
.sup_send{margin-left:5%;}
#statusboss{padding-left:10%;} .dt{padding-left:10%;} .donnes{font-family:arial;font-size:14px;}
#statusgestionnaire{padding-left:10%;} .dt{padding-left:10%;font-size:13px;} .donnes{font-family:arial;font-size:14px;}
#statusemployes{padding-left:10%;}

#datasboss{margin-left:10%;} #datasgestionnaire{margin-left:20%;background:#B9DFFB;}
#supboss{margin-left:10%;} 
#supgestionnaire{margin-left:20%;} #supemployes{margin-left:20%;} 
.divaction{width:50px;padding:1%;background:white;color:#eee;border-radius:15px;}
.sup_send{color:white;} .action{padding-left:30%;}
}


// Medium devices (tablets, 768px and up)
@media (min-width: 768px) { ... }


</style>



</head>

<body id="page-top">

        <?php include('inc_menu_principale.php');?>
        <!-- End of Sidebar -->
        
         <div id="collapse" class="collapse show" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bs">
                     <h2>Evaluer le compteur</h2>
					 <div id="results"></div><!--ajax--result-->
                      <div class="mot">Messages maximum à émmetre<br/><span class="mots">2500</span></div>
					
					  </div>
					
					<?php
	//afficher le checkout
   	// emttre la requete sur le fonction
        $rel=$bdd->prepare('SELECT  permission,code FROM inscription_client WHERE email_user= :email_user');
        $rel->execute(array(':email_user'=>$_SESSION['email_user']));
	     $donns =$rel->fetch();
	            if($donns['permission']=="user:boss" OR $donns['permission']=="user:gestionnaire"){
					echo'<div class="bg">
                     <h2>Suprimer des messsages du compteur</h2>
                     <form method="post" id="form_sup" action="delete_datas.php">
					 <input type="checkbox" class="co1" id="co1" name="co1"  value="50"> Suprimer 50 entrées<br/><br/>
					 <input type="checkbox" class="co2" id="co2" name="co2"  value="100"> Suprimer 100 entrées<br/><br/>
					 <input type="checkbox" class="co3" id="co3" name="co3"  value="150"> Suprimer 200 entrées<br/><br/>
					 <input type="button" id="sends" value="suprimer">
					  </form>
					  <div id="resul"></div><!--div--ajax-->
                    </div>';
				}
					?>
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
                               Echanges  <button type="button" class="btn btn-primary" id="but">
                              +</button>
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
                    
					<div id="result"></div>
					
					<div class="message">
					<span id="message_datas"></span><!--reponse--><br/>
					<form method="post" action="" id="form-sendm">l^k,
					<span id="error"></span><!--message d'erreur'-->
					<textarea name="message" id="message" rows="3" placeholder="Taper votre message"></textarea>
					<div class="sends"><i class="fa fa-paper-plane" aria-hidden="true" style="color:green"></i></div>
					</div>
                    </form>
                   </div><!--content-->
 
 
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
<div id="panier"></div><!--div ajax retour facturation-->


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
    
	$('#sms').click(function(){
	$('.drop').slideToggle();
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
			
	// afficher les données des encaissements
    // compter les nouveaux message
	function views() {
				var action="fetchs";
				$.ajax({
					url: "news_messages.php",
					method: "POST",
					data:{action:action},
					success: function(data) {
						$('#resultats_messages').html(data);
					}
				});
			}

			views();	
		
	
	// compter le nombre de message maximum à envoyer
	function loads() {
				var action="count_message";
				$.ajax({
					url: "messanger_datas.php",
					method: "POST",
					data:{action:action},
					success: function(data) {
						$('#results').html(data);
					}
				});
			}

			loads();
			
			
	function load() {
				var action="fetch";
				$.ajax({
					url: "messanger_datas.php",
					method: "POST",
					data:{action:action},
					success: function(data) {
						$('#result').html(data);
					}
				});
			}

			load();
	 
	$('.sends').click(function(){
	 
	 var action="send";
    // on récupére la variable
    var message = $('#message').val();

    if(message.length=="") {
      $('#message').css({"border":"2px solid red","color":"black"});
	}

   else if(message.length > 450)	{
	   
	   $('#error').html('votre message ne peut pas dépasser 450 caractères');
   }
   
   else{
	   
	  $.ajax({
	type:'POST', // on envoi les donnes
	url:'messanger_datas.php',// on traite par la fichier
	data:{action:action,message:message},
	success:function(data) { // on traite le fichier recherche apres le retour
      $('#result').html(data);
	  load();
	  loads();
	  $('#message').val('');
	 }
    });
	  
   }
		
  });
  
  $('#im').click(function(){
 $('#data').css('display','block');
 });
 
 $(document).on('click','.sup_send',function(){
	 var id =$(this).data('id2');
	 var action="sup";
	 
	 $.ajax({
            type: 'POST',
            url:'messanger_datas.php',
            data:{action:action,id:id},
            async:true,
            success: function(data){
            $('#result').html(data);
			load();
			loads();
			}
          });
	 
 });
  
  //Fonction valide formulaire appui entrée
      $(document).keypress(function(e){
        if(e.keyCode == 13){
        var action="send";
    // on récupére la variable
	var action="send";
    var message = $('#message').val();

    if(message.length=="") {
      $('#message').css({"border":"2px solid red","color":"black"});
	}

   else if(message.length > 450){
	   
	   $('#error').html('votre message ne peut pas dépasser 450 caractères');
   } 
   
    else{
          
          $.ajax({
            type: 'POST',
            url:'messanger_datas.php',
            data:"action=envoi&message="+message+'&action='+action,
            async:true,
            success: function(data){
            $('#result').html(data);
			load();
			loads();
			$('#message').val('');
         
            }
          });
         }
		}
		});
      function envoi() {
        document.getElementById('form-sendm').submit();
      }
	
	 $(document).on('click','.action',function(){
	   	var id = $(this).data('id1');	
      // on affiche la div
       $('#id'+id).slideToggle();
       
	   for(id-1; id <5000; id++){
        $('#id'+id).css('display','none');
        }

        for(5000; id > 0; id--){
        $('#id'+id).css('display','none');
        }	
		 			
		 	
	 });
	 
	 
	$('#message').keydown(function(){
     var action ="write";
       $.ajax({
            type: 'POST',
            url:'messanger_datas.php',
            data:{action:action},
            async:true,
            success: function(data){
            $('#message_datas').html(data);
			$('#message_datas').css('display','block');
		    }
          });

    });	

     $('#message').keyup(function(){
     var action ="write";
      $('#message_datas').hide(2000);
		   
      });
	  
	  $(document).on('click','#sms',function(){
		  var action ="click";
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
	  
	  $(".co1").click(function(){
		
       $("#co2").prop('checked',false);	
       $("#co3").prop('checked',false);		   
		  
	  });
	  
	  $(".co2").click(function(){
		
       $("#co1").prop('checked',false);	
       $("#co3").prop('checked',false);		   
		  
	  });
	  
	  $(".co3").click(function(){
		
       $("#co1").prop('checked',false);	
       $("#co2").prop('checked',false);		   
		  
	  });
	  
	  $('#sends').click(function(){
	  if($("#co1").is(':checked') || $("#co2").is(':checked') || $("#co2").is(':checked')){
        $('#form_sup').submit();
	  }

  else{

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

    });	
   
  </script>