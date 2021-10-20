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

.de,.des{padding-left:0.3%;color:#ACD6EA} .nbjour{color:black;font-weight:300;padding-left:10%;font-size:18px;}
.content_home{width:75%;margin-top:15px;display:none;height:950px;overflow-y:scroll;} 
#content3{margin-left:2%;background:white;margin-top:5px;float:left;margin-left:2.5%;width:30%;height:240px;border:2px solid #eee;padding:1%;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";color:black;}

.content_home,.content2{float
:left;display:none;} .content2{margin-left:0.2%;}
.dt{font-size:11px;color:green;} .prix,.pric{border:1px solid #eee;width:30%;margin-left:2%;}
.dc{padding-bottom: 5px;font-size:14px;font-weight: bold;color: #ACD6EA;} .but2 a{font-size:11px;padding:0.8%;margin-left:30%;background:#111E7F;color:white;text-decoration:none;border:2px solid #111E7F;border-radius:15px;} .but1{margin-left:3%;}
.df{padding-left:55%;font-size:18px;color:#FF00FF;font-weight:bold;}
.intervalle{font-size:13px;padding-left:3%;} 
h4,h5{text-align:center;font-weight:bold;color:black;font-size:13px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";}
.hom{text-align:center;border-bottom:1px solid #eee;padding:0.3%;color:black;font-size:14px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";}
 h5{font-size:13px;} .dg{padding-left:3%;} 
 .montant{padding:1%;background-color:white;text-align:center;margin-top:30px;color:black;font-size:13px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"} 
 #monts,#tva,#account,#rpay,#paie1,#paie2,#paie3,#paie4,#remise{width:90px;font-weight:200;border:2px solid #eee;} .tot{margin-top:10px;} #mont{padding-left:2%;}
.remov{padding-left:3%;}
.bg{font-weight:bold;color:black;font-size:13px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"}
.tot{margin-bottom:10px;} #add_local{height:35px;margin-left:4%;border:2px solid #E5F1FB;#font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";margin-left:15px;margin-top:10px;width:150px;color:black;background:#E5F1FB;padding:1%;}
.reini{padding:2%;z-index:3;position:absolute;top:300px;left:40%;background-color:white;width:350px;height:220px;border-radius:10px;border:3px solid white;}
.action{margin-top:25px;} .annul{border-radius:15px;width:120px;height:30px;background-color:#FF4500;color:white;border:2px solid #FF4500;}
.ok{width:45px;height:45px;border-radius:50%;margin-left:30%;background-color:#1E90FF;border:2px solid #1E90FF} #reini{margin-left:2%;height:40px;width:130px;font-family:arial;}

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
ul a{margin-left:3%;} #form_logo{display:none;} h3{font-size:16px;}.print{border-radius:20px;width:150px;height:35px;background:#85C9F8;border:2px solid #85C9F8;color:white;text-align:center;color:white;margin-left:12%;margin-top:80px;}
.td{margin-left:10%;margin-top:5px;font-size:16px;} #logo{position:absolute;top:6px;left:1.7%;border-radius:50%;}
.tds{font-size:28px;margin-left:12%;color:#09A81F;margin-left:10%;}
.tdv{font-size:28px;margin-left:12%;color:#A80913;margin-left:10%;font-weight:bold;}
.tdc{font-size:28px;margin-left:12%;color:#0E84D1;margin-left:10%;font-weight:bold;}
.td{margin-left:10%;}

.reservation,.pass,.sejour{padding:left:2%;}
.sejour{color:#42A50A;font-weight:bold;} .reservation{color:#063999;font-weight:bold;}
.pass{color:#650699;font-weight:bold;}
.annule{color:#C81C31;font-weight:bold}

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

.pied_page{margin-left:60%;margin-top:10px;}
.bout{float:left;margin-left:1%;width:30px;height:30px;background:white;color:#0C80E7;border:2px solid white;border-radius:50%;font-weight:bold;}
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

.ss{padding:2%;width:20px;height:20px;border-radius:40%;border:2px solid #eee;background:#e74a3b;color:white;
margin-left:-10px;} .datas_messanger{border-bottom:1px solid #eee;}
footer.sticky-footer{}

.drops{display:none;}  .users{display:none} #news_data{display:none;}

.sidebar .nav-item .nav-link span{font-size:14px;font-weight:bold;text-transform:capitalize;}
.navbar-nav{background:#06308E;}

#resultats{height:700px;overflow-y:scroll;padding-left:3%;width:270px;}

#caisse{font-size:20px;color:black;font-family:arial;} .tds,.tdv,.tdc{font-size:17px;font-weight:bold;}
.h1{padding:1%;font-size:14px;color:black;border:1px solid #eee;text-align:center;width:340px;} .site{font-size:12px;}

#panier{position:fixed;left:60%;top:15px;color:black;font-size:14px;background:black;
opacity:0.7;padding:1%;color:white;border-radius:5px;}
.btn{display:none;} .bts{background:#4e73df;color:white;font-size:16px;font-weight:bold;border:2px solid #4e73df;} 

.montant1,.montant{display:none;}
.montant1{background:white;color:black;text-align:center;margin-top:7px;}
.hom{background:white;color:black;font-size:14px;padding:3%;}
.tot{font-weight:none;background:white;height:90px;padding:2%;color:black;font-size:14px;text-align:center;} .option{color:black;height:30px;background:white;width:90%;margin-top:5px;}
.ouvrir,.ouvrir1{cursor:pointer;}
.ouvrir11,.ouvrir12{display:none;cusor:pointer;}

h3{color:#06308E;font-size:16px;margin-top:5px;font-weight:bold;}
.sup{cursor:pointer;color:white;font-size:12px;} #content1{display:none;}
.indispo{display:none;} #return{ position:fixed;top:300px;left: 20%;font-size:32px;color: #06308E;
}


@media (max-width: 575.98px) { 
#panier{display:non;}
#logo{display:none;} .side{display:none;} .bs{display:none;}.bg{display:none;}
.cont1,.cont12,.cont13,.cont14{display:block;width:250px;margin-top:8px;margin-left:7%;}
.cont2{display:block;width:250px;margin-top:10px;margin-left:8%;} .center{width:95%;height:2100px;}
ul{display:none;}
.bg-gradient-primary{display:none;} .contens,.contens1{display:block;width:250px;margin-top:10px;margin-left:8%;}
.drop{position:absolute;left:7%;width:300px;}
.drops{padding:2%;position:absolute;left:7%;width:340px;display:block;background:white;
height:2800px;} h2{margin-top:20px;border-top:1px solid #eee;color:black;}
.us{margin-top:5px;border-bottom:1px solid #eee;color:black;}
#news_data{display:block;} #news{display:none;} .users{display:block;color:black;}
input{display:block;} .form-select{display:none;} #panier{display:none;}
#examp{width:80%;margin-left:-15%;height:1100px;} .buttons{margin-left:2%;}
.btn{display:block;} #searchDropdown{display:none;}
.navbar-nav{display:none;} 
#content3{display:block;margin-left:2%;background:white;margin-top:5px;margin-left:3%;width:90%;height:240px;border:2px solid #eee;padding:1%;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";color:black;}
.content_home{width:95%;}

.content_home{width:95%;margin-top:15px;display:none;height:950px;overflow-y:scroll;}  .titre{display:block;position:absolute;left:70%;top:14px;cursor:pointer;color:#224abe;
font-weight:bold;} .rr{display:none;} .datas{display:none;}
.datas{padding:2.5%;width:95%;z-index:2;position:absolute;top:70px;left:2%;background:white;height:750px;} h2{border-color:none;color:#224abe;font-weight:bold;}
h4{display:none;} #add_local{margin-top:30px;margin-left:15%;}
.s{display:block;}
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
#content3 {width:40%;}
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
                    <button id="sidebarToggleTop" class="btn">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="navbar-search">
                        <div class="input-group">
                            
                           <div class="inputs">
                               Entrez des Clients  <button type="button" class="bts bts-primary" id="but">
                              +</button>
                            </div>

                        <div class="input"><select class="form-select form-select-sm" aria-label=".form-select-sm example">
                         <option selected>Type de logement</option>
						  <option value="1">chambre single</option><option value="2">chambre double</option>
                           <option value="3">chambre triple</option><option value="4">chambre twin</option><option value="5">chambre standard</option><option value="6">chambre deluxe</option>
                          <option value="7">studio double</option>
						  <option value="8">appartement meublé</option>
                          </select>
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
  <form method="post" id="form1" action="data_validate_client.php">
 <div  id="examp" style="display:none">
  <h2> Les informations du client </h2>
   
   <div class="form-row">
    <div class="form-group col-md-6">
      <div class="input-group">
	  <label for="inputPassword4">Date <br/>d'enregistrement *</label>
    <input type="date" name="dat" id="dat" class="form-control" placeholder="dd/mm/yyyy" required>                                               
  </div>
 </div>

   <div class="form-group col-md-6">
      <div class="input-group">
	  <label for="inputPassword4">Civilité client *<br/></label>
     <select id="civil" class="civil" name="civil">
	 <option value="monsieur">Monsieur</option>
	 <option value="madame">Madame</option>    
      <option value="famille">famille</option>
	
    </select>	  
   </div>

    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Client *</label>
      <input type="text" name="name" id="name" class="form-control" id="inputPassword4" placeholder="Nom & prénom">
    </div>
  

   <div class="form-group col-md-6">
      <label for="inputEmail4">piéce d'identité *</label>
      <input type="email" name="piece" id="piece" class="form-control" id="inputEmail4" placeholder="Nature/numéro">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Numéro de phone *</label>
      <input type="number" name="numero" id="numero" class="form-control" id="inputPassword4" placeholder="entre 8 et 14 chiffre">
    </div>
     <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="text" name="email" id="email" class="form-control" id="inputEmail4" placeholder="email par défaut">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Adresse </label>
      <input type="adresse" name="adresse" class="form-control" id="inputPassword4" placeholder="facultatif">
    </div>
    
    <h2>Information hébergement</h2>
	
	<div class="form-group col-md-6">
      <label for="inputPassword4">Type de séjour</label>
      <select id="to" class="to" name="to" required>
     <option value="sans">type</option><option value="séjour">séjour facturé</option>
	 <option value="horaire">horaire facturé</option>
	 <option value="réservation">réservation</option>
	 </select></div>
	
	<div class="form-group col-md-6">
      
     </div>
	
     <div class="form1 col-md-6">
	  <label for="inputPassword4">Date d'entrée(check_in) </label>
      <input type="date" name="days" id="days" class="form-control"  placeholder="">
     </div>
	
	 <div class="form1 col-md-6">
      <label for="inputPassword4">Date du départ(check_out) </label>
      <input type="date" name="das" id="das" class="form-control"  placeholder="">
    </div>
	
	<div class="form2 col-md-6">
	  <label for="inputPassword4">Heure d'entrée(check_in) </label>
      <input type="time" name="tim" id="tim" class="form-control" id="inputPassword4" placeholder="">
     </div>
	
	 <div class="form2 col-md-6">
      <label for="inputPassword4">Heure du départ(check_out) </label>
      <input type="time" name="tis" id="tis" class="form-control" id="inputPassword4" placeholder="">
    </div>
	
  </div>
  <span class="errors"></span>
   <button type="button" class="buttons">continuer</button>
 </div>
 
 <div class="content">
 <div class="content1">
 <div class="h3"><span id="h3"></span><span class="nbjour"></span></div>
 <span class="client"></span>
 </div>


 <input type="hidden" id="nbjour" name="nbjour">
 
</div><!--content-->



<div class="contents">
<div id="resultat_home"><?php include('list_data_home.php');?></div><!--affiche les homme-->

 <div class="content2">
 <div id="return"></div>
  <h4> Les détails sur le séjour </h4>
  
  <div id="results"></div><!--div-affiche data home selectionné-->
  
 </div>
<input type="hidden" name="token" id="token" value="<?php
//Le champ caché a pour valeur le jeton
echo $_SESSION['token'];?>">
 </div><!--content2--> 
 </form>
 
 
    
	</div>

 <div class="reini" style="display:none">
 <form method="post" id="form_reini" action="">
 <h1>Réinitialiser votre caisse journalière</h1>
 <div class="dert"> Date du point :<input type="date" id="reini" name="reini" required></div>
 <div class="action"><button type="button" class="sup">Annuler</button><input type="submit" class="ok" value="ok"></div>
 </form>
 
 </div><!--reini---->
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
<div id="panier"></div>

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
    $(document).on('click','.titre',function(){
	 $('.datas').slideToggle();
	});
	
	$(document).on('click','.ouvrir',function(){
	 $('.montant').css('display','block');
     $('.ouvrir').css('display','none');
     $('.ouvrir11').css('display','block');	 
	});
	
	$(document).on('click','.ouvrir11', function(){
	 $('.montant').css('display','none');
     	$('.ouvrir').css('display','block');
       $('.ouvrir11').css('display','none');	  
	});
	
	$(document).on('click','.ouvrir1',function(){
	 $('.montant1').css('display','block');
     $('.ouvrir1').css('display','none');
     $('.ouvrir12').css('display','block');	 
	});
	
	$(document).on('click','.ouvrir12', function(){
	 $('.montant1').css('display','none');
     	$('.ouvrir1').css('display','block');
       $('.ouvrir12').css('display','none');	  
	});
	
	$('#sidebarToggleTop').click(function(){
		$('#accordionSidebar').css('display','block');
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
 
 $(document).on('change','.to',function(){
	var selectedOptions = $('#to option:selected').text(); 
	 
	 var result = "séjour facturé";
	 var resuts = "réservation";
	 var results = "horaire";
	 
	 if(selectedOptions == result){
		 $('.form2').css('display','none');
		 $('.form1').css('display','block');
		 
	 }
	 
	 else if(selectedOptions == resuts){
		 $('.form2').css('display','none');
		 $('.form1').css('display','block');
		 
	 }
	 else{
		 
		$('.form2').css('display','block');
		 $('.form1').css('display','none'); 
	 }
 });
 
 // click sur le bouton 
 $('.buttons').click(function(){
	 
	 // on definir
	 var dat = $('#dat').val();
	 var name = $('#name').val();
	 var piece = $('#piece').val();
	 var to = $('#to').val();
	 var days = $('#days').val();
	 var das = $('#das').val();
	 var tim = $('#tim').val();
	 var tis =$('#tis').val();
	 var email = $('#email').val();
	 var adresse = $('#adresse').val();
	 var numero =$('#numero').val();
	 
	 // regex
	var regex = /^[a-zA-Z0-9éèàç]{2,25}(\s[a-zA-Z0-9éèàçà]{2,25}){0,4}$/;
    var rege = /^[a-zA-Z0-9-çéèàèç°]{1,25}(\s[a-zA-Z0-9-°]{1,25}){0,2}$/;
    var number = /^[0-9]{8,14}$/;
	var reg = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
	 
	 var date1 = new Date($('#days').val());
	 var date2 =  new Date($('#das').val());
	 
	 // convertir les dates en Français
	 var d = date1.getDate();
	 var m = date1.getMonth() +1;
	 var y = date1.getFullYear();
	 
	 var ds = date2.getDate();
	 var ms = date2.getMonth() +1;
	 var ys = date2.getFullYear();
	 
	 var datefrom = (d <= 9 ? '0' + d : d) + '/' + (m <= 9 ? '0' + m : m) +'/' + y;
	 
	 var datefro = (ds <= 9 ? '0' + ds : ds) + '/' + (ms <= 9 ? '0' + ms : ms) +'/' + ys;
	 
	 
	 // calculer le nom de jour du séjour 
	  var tmp = new Date(date2-date1);
	  var s = tmp/1000/60/60/24;
	 
	 
	 var date3 = parseInt($('#tim').val(),10);
	 var date4 = parseInt($('#tis').val(),10);
	 
	 // caclcule d'heure horaire
	 var tmps = date4-date3;
	 var r = tmps;
	 
	 if(name.length==""){
		$('#name').css('border-color','red');
		
	}
	 
	 else if (name.length > 60){
      $('.errors').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur de syntaxe sur le nom du client');
    }
	
	 
	 else if (!reg.test(email)){
      $('.errors').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur de syntaxe sur l\'email du client');
    }
	
	 else if (numero.length > 14){
      $('.errors').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> le numéro de télephone ne doit pas depasser 14chiffres');
    }
	
	
	else if (piece.length > 50){
      $('.errors').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>le nombre de caractères pour la pièce d\identité ne doit pas depasser 50');
    }
	 
	 else if(dat ==""){
		 $('#dat').css('border-color','red');
	 }
	 
	 else if(piece.length ==""){
		$('#piece').css('border-color','red'); 
		$('.error').html('fournir les informations sur l\'identité du client');
	}
	
	else if(adresse > 150){
		$('#adresse').css('border-color','red'); 
		$('.errors').html('l\'adresse du client peut pas dépasser 150 caractères');
	}
	 
	 else if(to =="sans"){
		$('#to').css('border-color','red'); 
	}
	

	else{
	 
	 if(to =="séjour"){
		 
		 var client = $('.client').text();
		 if(client ==""){
		 
		 if(days!=""){
		 
		 if(das!=""){
		 
		 if(date1 < date2) {
		 $('#h3').append('Séjour facturé');
		 $('.client').append('Réference client : <i class="far fa-user" style="font-size:13px;color:green;"></i><span class="de">'+name+'</span> <i class="fas fa-phone" style="padding-left:4%;color:green;font-size:13px;"></i> contact :<span class="des"> '+numero+'</span><span class="intervalle"> <span class="intervalle"> <i class="fas fa-calendar-minus" style="font-size:13px;color:green;"></i> Arrivée le  <span class="from">'+datefrom+'</span> ,  <i class="fas fa-calendar-minus" style="font-size:13px;color:green;"></i> Départ le  <span class="todate">'+datefro+' </span></span>');
		 
		 if(s==1){
		 $('.nbjour').append(' Durée : <span class="det">'+s+'jour</span>');
		 }
		 if(s > 1){
			$('.nbjour').append('Durée : <span class="det">'+s+'jours</span>');			  
		 }
		 $('.content1').css('display','block');
		 $('.content2').css('display','block');
		 $('#pak').css('display','none');
	     $('#examp').css('display','none');
		 $('.content_home').css('display','block');
		 $('.text').css('display','block');
		 $('.tex').css('display','none');
		 $('#nbjour').val(s);
		 }
		 
		 else{
			$('.errors').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>la date de départ ne dois pas etre inférieur à celle de l\'entréé'); 
		 }
		 
		 }
		 
		 else{
			 $('#das').css('border-color','red'); 
		 }
		 
		 }
		 
		 else{
			$('#days').css('border-color','red');  
		 }
		 
		 }
		 
		 else{
			 
			 if(date1 < date2){
			$('#h3').text('Séjour facturé'); 
			$('.de').text(name);
			$('.des').text(numero);
			$('.from').text(datefrom);
			$('.todate').text(datefro);
			
			if(s==1){
			$('.det').text(s+'jour');
			
			}
			
			if(s > 1){
				$('.det').text(s+'jours');
			}
			$('.content1').css('display','block');
			$('.content2').css('display','block');
			$('#pak').css('display','none');
	       $('#examp').css('display','none');
		   $('.content_home').css('display','block');
		   $('.text').css('display','block');
		   $('.tex').css('display','none');
		   $('#nbjour').val(s);
		 }
		 else{
			$('.errors').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>la date de départ ne dois pas etre inférieur à celle de l\'entréé');  
		 }
		}
	   }
	 
	 if(to =="horaire"){
		 var client = $('.client').text();
		 if(client==""){
		 if(tim!=""){
		 if(tis!=""){
		 if(date3 < date4){
		 $('#h3').append('Horaire facturé');
		 $('.client').append('Réference client : <i class="far fa-user" style="font-size:13px;color:green;"></i><span class="de">'+name+'</span> <i class="fas fa-phone" style="padding-left:4%;color:green;font-size:13px;"></i> contact :<span class="des"> '+numero+'</span><span class="intervalle"> <span class="intervalle"> <i class="fas fa-calendar-minus" style="font-size:13px;color:green;"></i> Arrivée le  <span class="from">'+tim+'</span> ,  <i class="fas fa-calendar-minus" style="font-size:13px;color:green;"></i> Départ le  <span class="todate">'+tis+'</span> </span>');
		 
		 if(r==1){
		 $('.nbjour').append('Durée : <span class="det">'+r+'heure</span>');
		 }
		 if(r > 1){
			$('.nbjour').append('Durée : <span class="det">'+r+'heures</span>');			  
		 }
		 
		 $('.content1').css('display','block');
		 $('.content2').css('display','block');
		    $('#pak').css('display','none');
	        $('#examp').css('display','none');
			$('.content_home').css('display','block');
		    $('.text').css('display','none');
			$('.tex').css('display','block');
			$('#nbjour').val(r);
		 }
		 else{
			 $('.errors').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>l\'heure de départ ne dois pas etre inférieur à celle de l\'entréé'); 
	      }
		 }
		 else{
			$('#tis').css('border-color','red');  
		 }
		}
		 else{
			 $('#tim').css('border-color','red'); 
		 }
		}
         else{
			if(date3 < date4){
            $('#h3').text('Horaire facturé'); 
			$('.de').text(name);
			$('.des').text(numero);
			$('.from').text(tim);
			$('.todate').text(tis);
			
			if(r==1){
			$('.det').text(r+'heure');
			
			}
			
			if(r > 1){
				$('.det').text(r+'heures');
			}
			
			$('.content1').css('display','block');
			$('.content2').css('display','block');
		    $('#pak').css('display','none');
	        $('#examp').css('display','none');
			$('.content_home').css('display','block');
		    $('.text').css('display','none');
			$('.tex').css('display','block');
			$('#nbjour').val(r);
		}
		
		else{
			$('.errors').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>la date de départ ne dois pas etre inférieur à celle de l\'entréé'); 
		}
	   }
	 }
	 
	 
	 if(to =="réservation"){
		 
		 var client = $('.client').text();
		 if(client ==""){
		 if(days!=""){
		 if(das!=""){
		 if(date1 < date2) {
		 $('#h3').append('Réservation');
		 $('.client').append('Réference client : <i class="far fa-user" style="font-size:13px;color:green;"></i><span class="de">'+name+'</span> <i class="fas fa-phone" style="padding-left:4%;color:green;font-size:13px;"></i> contact :<span class="des"> '+numero+'</span><span class="intervalle"> <span class="intervalle"> <i class="fas fa-calendar-minus" style:"font-size:13px;color:green;"></i> Arrivée le  <span class="from">'+datefrom+'</span> ,  <i class="fas fa-calendar-minus" style="font-size:13px;color:green;"></i> Départ le  <span class="todate">'+datefro+' </span></span>');
		 
		 if(s==1){
		 $('.nbjour').append('Durée : <span class="det">'+s+'jour</span>');
		 }
		 if(s > 1){
			$('.nbjour').append('Durée : <span class="det">'+s+'jours</span>');			  
		 }
		 $('.content1').css('display','block');
		 $('.content2').css('display','block');
		 $('#pak').css('display','none');
	     $('#examp').css('display','none');
		 $('.content_home').css('display','block');
		 $('.text').css('display','block');
		 $('.tex').css('display','none');
		 $('#nbjour').val(s);
		 }
		 
		 else{
			$('.errors').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>la date de départ ne dois pas etre inférieur à celle de l\'entréé'); 
		 }
		}
		 
		 else{
			 $('#das').css('border-color','red'); 
		 }
		 }
		 else{
			$('#days').css('border-color','red');  
		 }
		 }
		 
		 else{
			 if(date1 < date2){
			$('#h3').text('Réservation'); 
			$('.de').text(name);
			$('.des').text(numero);
			$('.from').text(datefrom);
			$('.todate').text(datefro);
			
			if(s==1){
			$('.det').text(s+'jour');
			
			}
			
			if(s > 1){
				$('.det').text(s+'jours');
			}
			$('.content1').css('display','block');
			$('.content2').css('display','block');
		    $('#pak').css('display','none');
	        $('#examp').css('display','none');
		    $('.content_home').css('display','block');
			$('.text').css('display','block');
		    $('.tex').css('display','none');
		    $('#nbjour').val(s);
			
		 }
		 else{
			$('.errors').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>la date de départ ne dois pas etre inférieur à celle de l\'entréé'); 
		 }
		 
		}
	 }
	 
     
	}
	 
 });
 
 
 $('.buttons').click(function(){
	
     var days = $('#days').val();
	 var das = $('#das').val();
	 var tim = $('#tim').val();
	 var tis =$('#tis').val();	
	 var to =$('#to').val();
	 var dat =$('#dat').val();
	 var dat = $('#dat').val();
	 var name = $('#name').val();
	 var piece = $('#piece').val();
	 var dat = $('#dat').val();
	 var name = $('#name').val();
	 var piece = $('#piece').val();
	 
	 if(name.length!="" && name.length!="" && piece.length!=""){
	
	$.ajax({
	type: 'POST', // on envoi les donnes
	url: 'list_data_home.php',// on traite par la fichier
	data:{days:days,das:das,tim:tim,tis:tis,to:to,dat:dat},
	success:function(data) { // on traite le fichier recherche apres le retour
	
	var dispo = $('.dispo').length;
	if(dispo==""){
		$('#return').text('Aucun local disponible pour ces dates');
	}
	 if(dispo> 1 || dispo==1){
		$('#return').text('');
	}
		$('#resultat_home').html(data);
		$('.content_home').css('display','block');
		
		if(to=="séjour" || to=="réservation"){
		$('.text').css('display','block');
		$('.tex').css('display','none');
        $('.content1').css('display','block');
		$('.content2').css('display','block');		
		}
		
		if(to=="horaire"){
			
			$('.content1').css('display','block');
			$('.content2').css('display','block');
		    $('.text').css('display','none');
			$('.tex').css('display','block');
			
		}
	
	 },
	 
	}); 
	 }
});
 
 // on récupére les données pour créer un user recaptitulatif
 
 $(document).on('click','.add_home',function() {

	var id = $(this).data('id2'); // on recupère l'id.
    var action ="add";
	// recupération des variable
	var nbjour = $('#nbjour').val();
	var chambre = $('#chambre'+id).val();
	var type = $('#type'+id).val();
	var prix_nuite = $('#prix'+id).val();
	var prix_pass = $('#pric'+id).val();
	var paynuite = $('#cout_nuite'+id).val();
	var paypass = $('#cout_pass'+id).val();
	var to = $('#to').val();
	var days = $('#days').val();
	 var das = $('#das').val();
	 var tim = $('#tim').val();
	 var tis =$('#tis').val();
	 var dat =$('#dat').val();
	
	
	// on lance l'apel ajax
	$.ajax({
	type: 'POST', // on envoi les donnes
	url: 'add_home.php',// on traite par la fichier
	data:{id:id,nbjour:nbjour,days:days,das:das,tim:tim,tis:tis,to:to,chambre:chambre,type:type,prix_nuite:prix_nuite,prix_pass:prix_pass,paynuite:paynuite,paypass:paypass,dat:dat,action:action},
	success:function(data) { // on traite le fichier recherche apres le retour
		$('#results').html(data);
	
	 },
	 error: function() {
    alert('vérifier votre connexion'); }
	 
	});

	});
	
	// recupération et caclul des montants
	
	// fonction remove pour suprimer un local de la liste
	$(document).on('click','.remove',function(){
		var action ="remove";
		var id = $(this).data('id3');
		var nbjour = $('#nbjour').val();
	    var chambre = $('#chambre'+id).val();
	    var type = $('#type'+id).val();
	    var prix_nuite = $('#prix'+id).val();
	    var prix_pass = $('#pric'+id).val();
	    var paynuite = $('#cout_nuite'+id).val();
	    var paypass = $('#cout_pass'+id).val();
	    var to = $('#to').val();
		
	// on lance l'apel ajax
	  $.ajax({
	  type: 'POST', // on envoi les donnes
	  url: 'add_home.php',// on traite par la fichier
	  data:{id:id,nbjour:nbjour,to:to,chambre:chambre,type:type,prix_nuite:prix_nuite,prix_pass:prix_pass,paynuite:paynuite,paypass:paypass,action:action},
	success:function(data) { // on traite le fichier recherche apres le retouy
		$('#results').html(data);

      },
	 error: function() {
    alert('vérifier votre connexion'); }
	 
	});
		
	});
	
	// calculer les sommes automatiquement du récapitualitif
	
	$(document).on('keyup','#tva',function(){
		
	var tva = $('#tva').val();
	var totals =$('#total').val();
	var monta = $('.monta').text();
	
	
	if(tva > 0 && tva.length <3 && tva.length!=""){
	var result = parseFloat(totals)*parseFloat(tva);
	var resul = parseFloat(result)/100;
	var results = resul.toFixed(2);
	var t = parseFloat(results)+parseFloat(totals);
	var ts = t.toFixed(2);
	$('.tva').html('<span class="taxe">'+results+'</span> xof<input type="hidden" name="taxe" value="'+results+'">');	
	$('.monta').text(ts);
	}

    if(tva.length ==""){
     var results = 0;
	$('.tva').html('<span class="taxe">'+results+'</span> xof<input type="hidden" name="taxe" value="'+results+'">');	
    $('.monta').text(totals);
	}		
  });
  
  $(document).on('keyup','#account',function(){
	 var totals =  $('.monta').text();
     var tota = parseFloat(totals);	 
	 var account = $('#account').val();
	 if(account >0){
	  
	  if(account < tota){
		var result = parseFloat(totals) - parseFloat(account);
        $('#rpay').val(result);
		
	  }
	  else{
		$('erreur acompte trop grand'); 
	 }
	 
	 }
	 
	 if(account.length ==""){
		$('#rpay').val(0);	
	}
	  
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
	
    // afficher la div pour réinitailiser les chiffres	
	$(document).on('click','.butt',function(){
    $('.reini').css('display','block');
    $('#pak').css('display','block');
    });
	
     
	  
	 $(document).on('click','#add_local', function() {
	// on traite le fichier recherche apres le retour
	  var acomp = $('#account').val();
	  if(acomp==""){
		 acomp =0; 
	  }
	  var montas = $('#total').val();
	  var result = parseFloat(acomp);
	  var result1 = parseFloat(montas);
	  if(result < result1){
	   $('#form1').submit();
	   }
	   else{
		 // inséré un petit message pour 
	  $('.eror').html('<div style="color:#AB040E;font-size:13px;"><i class="fas fa-check-circle" style="color:#AB040E;font-size:12px"></i> l\'acompte doit etre <br/>inférieur au montant httc');  
	   }
	});
	 
	 // envoi du formulaire
	 
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


// imprimer sa caisse user 
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