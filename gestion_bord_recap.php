<?php
include('connecte_db.php');
include('inc_session.php');

   $bd = new PDO('mysql:host=localhost;dbname=hotel_gestion', 'root','');

 function select_box($bd){
	 
    $output = '';
	$req=$bd->prepare('SELECT id,id_chambre,chambre FROM chambre WHERE email_ocd= :email_ocd');
    $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
    
   while($donnees = $req->fetch())
	{
	   echo'<option value="'.$donnees['id_chambre'].'">'.$donnees['chambre'].'</option>';  
	}
	
   }
	 
?>


<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
 <?php include('inc_entete.php');?>
 <title>ERP de solution de chiffrage devis, facturation</title>
	<meta property="og:title" content="viidea -ERP de solution de chiffrage" />

	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://www.erpviidea.com/" />
	<meta property="og:description" content="Logiciel ERP innovant en mode Saas dans le domaine hotelier" />
	<!-- TWITTER CARD -->
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="http://www.erpviidea.com/" />
	<meta name="twitter:title" content="ERP logiciel de gestion innonvat pour l'hotelerie" />
	<meta name="twitter:description" content="Mobilité de solution de chiffrage en mode Saas" />
	<link rel="shortcut icon" href="" />
   <!-- style CSS -->
	<link rel="stylesheet" href="css/acceuil_gestion.css?v=0.0.38" type="text/CSS" />
	
    <!-- Google Font-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:Thin,Light,Bold">
    <link rel="stylesheet" href="public/css/login?v=0.0.52" type="text/CSS" />
    <style>
	body{background-color:#eee;}
	#content_principal{width:100%;height:100%;}
	
	#content1{width:18%;height:850px;}
	
	.content11{width:97%;height:150px;background-color:white;padding-top:10px;padding-left:7%;}
	#content2{width:80%;} #content1,#content2{float:left;}
	.content12{margin-top:10px;width:96%;background-color:#1E90FF;height:795px;font-size:18px;color:white;font-family:'Roboto',serif}
	 .lien1 a{margin-top:5px;color:white;font-weight:600;padding:1%;}
	 .lien1{margin-top:20px;padding:4%;}
	.content13{width:95%;height:300px;background-color:white;font-family:arial;padding:2%;margin-top:15px;}
	h1{text-align:center;font-size:15px;border-bottom:1px solid #eee;width:95%;margin-top:5px;font-family:'Roboto',serif;padding:2%;}
	.lien2{margin-top:15px;border-bottom:1px solid #eee;} .mont{padding-left:3px;font-family:arial;font-siez:11px;text-transform:uppercase;}
	#montant{width:98%;}td{height:50px;} .fa{font-size:24px;}
	
	.name_entreprise{text-transform:capitalize;font-size:15px;font-weight:600px;font-family:'Roboto',serif}
	.name_eur{font-family:arial;text-transform:capitalize;font-weight:800;}
		#dispo1,#dispo2{width:180px;height:45px;border:2px solid #1E90FF;color:#1E90FF;font-weight:bold;font-size:18px;}
	     .conts{padding-left:10%;font-family:'Roboto',serif;font-size:15px;}
	.content21{width:100%;height:150px;background-color:white;padding:1%;} .cont21{margin-top:30px;}
	.reser{font-family:arial;margin-left:1%;width:180px;text-align:center;color:white;padding:0.5%;background-color:#000080;border:2px solid #000080;border-radius:15px;}
	.cont_b,.cont_a,.cont_c{padding-left:8%;font-weight:400;font-family:'Roboto',serif;color:black;}
	.cont{padding-left:2%;font-weight:400;font-family:'Roboto',serif;color:black;}
	
	#content2 a{color:black;} #content2 a :hover{text-decoration:none;}
	.x,.v{width:7%;height:40px;border-radius:15px;color:white;}
     .v{background-color:#FF00FF;border:2px solid #FF00FF} .x{background-color:#00FA9A;border: 2px solid #00FA9A}
	
	.reser,.dim{cursor:pointer;} .consul{margin-left:3%;}
	
	#content3{width:100%;height:810px;background-color:white;margin-top:5px;padding:2%;}
	
	 #result,#donnes_depense,#results,#affiche{float:left;} #result{width:80%;} #donnes_depense{width:15%;} h3{font-family:arial;font-size:14px;text-transform:uppercase;border-bottom:1px solid #eee;}
	#results,#affiche{display:none;width:80%;} h2{width:70%;font-family:arial;font-size:18px;text-transform:uppercase;border-bottom:1px solid #eee;margin-bottom:8px;}
	
	#form_sejour,#form_sejour1{padding:2%;width:80%;margin-top:30px;background-color:#eee;}
	 #form_sejour input,select {height:40px;border:2px solid #eee;}
	#form_sejour1 input,select {height:40px;border:2px solid #eee;}
	#name,#piece,#email,#names,#piec,#nume,#pice,#emais{width:280px;}
	#form_pass,#form_pass1{padding:2%;width:80%;background-color:#eee;margin-top:30px;}
	

	
	</style>
	

</head>

<body>

 <div id="content_principal">
 
 <div id="content1">
 
 <?php include('inc_menu.php');?>
 
 </div><!--content1-->
 
 
 <div id="content2">
 
 <div class="content21">
 
 <div class="cont211">
 <span class="conts">Disponibilité de vos chambres  Arrivée  <input type="date" id="dispo1" name="dispo1" placeholder="Date de départ"> Départ <input type="date" id="dispo2" name="dispo2" placeholder="Date d'arrivée"><button type="button" class="consul" title="dospinibilités de vos chambres"><i style="font-size:24px" class="fa">&#xf06e;</i></button></span>
 </div>
 
 <div class="cont21">
 
 </div><!--cont21-->
 
 <div class="cont22">
 
 
 
 
 </div><!--cont22-->
 
 </div><!--content21-->
 
 <div id="content3">
 
 <div id="result">

<div class="resultats"></div><!-- resultat des enregsitrement donnees--> 
 
 
 
 </div><!--result-->
 
 
 <div id="results">
 
 
</div><!--results-->


 
 
</div><!--content3-->
 
 </div><!--content2-->
 
 
</div><!--div content --principal-->


<?php include('inc_foot_scriptjs.php');?>

<script type="text/javascript">
 $(document).ready(function(){
	 
	 
	function load() {
				var action="fetch";
				$.ajax({
					url: "donnees_data.php",
					method: "POST",
					data:{action:action},
					success: function(data) {
						$('#resultats').html(data);
					}
				});
			}

			load();

 
 });
 

</script>
</body>
</html>
    
