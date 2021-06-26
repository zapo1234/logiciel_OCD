<?php
include('connecte_db.php');
include('inc_session.php');

	 
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
	#content3{width:100%;height:810px;background-color:white;margin-top:5px;padding:2%;}
	
	#pag {position: fixed;top: 0;left: 0;width: 100%;height: 100%;background-color: black;z-index: 2;
    opacity: 0.6;
    display: none;
}
    
	.add{font-family:arial;width:180px;height:40px;padding:0.3%;background-color:green;color:white;
	border:2px solid green;border-radius:20px;} .aide{padding-left:70%;cursor:pointer;}
	#results{overflow-y:scroll;width:75%;height:850px;position:absolute;z-index:3;background-color:white;top:10px;left:10%;
	border:3px solid white;box-shadow:2px 2px 2px 2px}
	.fermer{margin-left:80%;}
	
	#form_info,#form_infos1,h2{margin-left:10%;} h2{font-family:arial;font-isze:18px;}.ot{color:red;font-weight:bold;}
	#form_info td {padding:1%;width:350px;height:35px;} #form_info input{height:40px;border:1px solid #eee;}
	#form_infos1 td{padding:1%;width:150px;}
	.text{margin-left:10%;margin-top:20px;}.h{font-family:arial;font-size:14px;} textarea{width:250px;height:100px;border:1px solid #eee;}
	.zap{margin-top:25px;display:none;}.zaps{height:100px;}
	
	
	.but1,.but2,.but3,.but4{margin-left:4%;margin-bottom:10px;cursor:pointer;margin-top:20px;}
	select{width:200px;height:35px;border:1px solid #eee;}
	#his{width:200px;height:35px;position:fixed;top:690px;left:65%;background-color:#1E90FF;z-index:4;border:2px solid #1E90FF;
	color:white;font-size:14px;font-family:arial;text-transform:uppercase;}
	.up,.ups{position:absolute;}
	
	.dep {
  animation: spin 2s linear infinite;
  margin-top:10px;
  }

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
#pak{position: fixed;top: 0;left: 0;width:100%;height: 100%;background-color: black;z-index:2;opacity: 0.6;}
.enre{z-index:4;position:absolute;top:130px;left:40%;font-weight:bold;border:2px solid white;font-family:arial;font-size:16px;width:280px;height:200px;padding:2%;text-align:center;background-color:white}
	
	</style>
	

</head>

<body>

 <div id="content_principal">
 
 <div id="content1">
 
 <?php include('inc_menu.php');?>
 
 </div><!--content1-->
 
 
 <div id="content2">
 
 <div class="content21">
 <button type="button" class="add"><i style="font-size:14px;color:white;" class="fa">&#xf067;</i>  Ajouter un local</button>
 <span class="aide">Aide <i style="font-size:15px;color:#1E90FF" class="fa">&#xf059;</i>
 </div><!--content21-->
 
 <div id="content3">
 



</div><!--content3-->
 
 </div><!--content2-->
 
 
</div><!--div content --principal-->

<div id="results" style="display:none">
<div class="fermer">fermer <i style="font-size:15px;color:black;cursor:pointer;" id="fermer" class="fa">&#xf2d3;</i></div>
<h1>Formualire pour l'enregsitrement d'un local,une chambre ou un appartement de votre espace Hotelier</h1>
<div id="error"></div><!--affichage erreur-->
<div id="html"></div><!--affichage retour ajax-->
<form method="post" id="forms"  enctype="multipart/form-data">
<h2><i style="font-size:24px" class="fa">&#xf044;</i> Informations relatives au type du local</h2>
<table id="form_info">
<tr>
<td>Type de logement<span class="ot">*</span> <br/><select name="type" id="type"><option value="">Type de logement</option><option value="0">chambre single</option><option value="1">chambre double</option>
<option value="2">chambre triple</option><option value="3">chambre twin</option><option value="4">chambre standard</option><option value="5">chambre deluxe</option>
<option value="6">studio double</option></select></td>
<td>Autre type de logement<span class="ot"></span><br/><input type="text" name="typs" id="typs" size="25" placeholder=""></td>
<td>Identifier votre local<span class="ot">*</span><br/><input type="text" name="ids" id="ids" size="25" placeholder="ex:chambre A10,chambre B1" required></td>
</tr>
<tr>
<td>occupants possible<span class="ot">*</span><br/><input type="number" name="num" id="num" size="25" placeholder="nombre maxi" required></td>
<td>Nombre de lits<br/><input type="number" name="nums" id="nums" size="25" required></td>
</tr>
<tr>
<td>cout/nuité<span class="ot">*</span><br/><input type="number" name="cout" id="cout" size="20" placeholder="tarif nuité" required></td>
<td>cout/pass<br/><input type="number" name="couts" id="couts" size="20" required></td>
</tr>
</table>
<h2><i style="font-size:24px" class="fa">&#xf044;</i> Informations relatives aux equipements principales du local</h2>
<table id="form_infos1">
<tr>
<td><input type="checkbox" name="ch[]"  value="<i style='font-size:14px' class='fa'>&#xf2dc;</i> climatisation"> <i style='font-size:14px' class='fa'>&#xf2dc;</i> climatisation</td> 
<td><input type="checkbox" name="ch[]"  value="<i style='font-size:14px' class='fa'>&#xf108;</i> télévision"> <i style="font-size:14px" class="fa">&#xf108;</i> télévision</td>  
<td><input type="checkbox" name="ch[]"  value="<i style='font-size:14px' class='fa'>&#xf1eb;</i> wiffi">  <i style="font-size:14px" class="fa">&#xf1eb;</i> wiffi</td> 
<td><input type="checkbox" name="ch[]"  value="<i style='font-size:14px' class='fa'>&#xf2a2;</i>salle de baim"> <i style="font-size:14px" class="fa">&#xf2a2;</i> salle de bains</td> 
</tr>
</table>

<h2><i style="font-size:24px" class="fa">&#xf044;</i> Informations relatives aux equipements secondaires du local</h2>
<table id="form_infos1">
<tr>
<td><input type="checkbox" name="choix[]"  value="toilletes"> toilletes</td> 
<td><input type="checkbox" name="choix[]"  value="armoie ou penderie"> armoie ou penderie</td>  
<td><input type="checkbox" name="choix2[]" value="chaines satellite"> chaines satellite</td> 
<td><input type="checkbox" name="choix2[]"  value="prise près de lit"> prise près de lit</td> 
</tr>
<tr>
<td><input type="checkbox" name="choix[]"  value="espace pour pc"> espace pour pc</td> 
<td><input type="checkbox" name="choix[]"  value="portant"> portant</td>  
<td><input type="checkbox" name="choix[]"  value="baignoire ou douche"> Baignoire ou douche</td> 
<td><input type="checkbox" name="choix[]"  value="télephone"> télephone</td> 
<tr>
<td><input type="checkbox" name="choix[]"  value="papier toillete"> papier toillete</td> 
<td><input type="checkbox" name="choix[]"  value="séche cheveux"> séche cheveux</td>  
<td><input type="checkbox" name="choix[]"  value="petit café">  petit café</td> 
<td><input type="checkbox" name="choix[]" value="déjeuner"> déjeuner</td> 
</tr>
</tr>
</table>

<div class="text">
<div class="h">Prise de photo de votre local(au moins 4images)</div>
<div class="za">
<input type="file" class="test" name="fil[]" id="file1"><input type="file" class="test" name="fil[]" id="file2"><input class="test" type="file" name="fil[]" id="file3">
<input type="file" class="test" name="fil[]" id="file4">
</div>
<div class="zaps">

<span id="img"></span><span id="img1"></span><span id="img2"></span>
</div>
</div>

<div class="text">
<div class="h">Informations facultatives</div>
<div><textarea name="infos" id="infos" size="35" maxlenght="50" cols="50" placeholder="moins de 150 caractères à respecter"></textarea></div>
</div>

<div><input type="submit" value="valider le local" id="his"/></div>
<input type="hidden" name="token" id="token" value="<?php
//Le champ caché a pour valeur le jeton
echo $_SESSION['token'];?>">
</form>
</div>
</div>
</div><!--resultat-->




<?php include('inc_foot_scriptjs.php');?>

<script type="text/javascript">
 $(document).ready(function(){
	function accounb() {
$.ajax(
    {
     type:"GET",
     data:"action=refresh",
     url: "accueil_montant.php",
     success:function(msg) {
     document.getElementById('monts').innerHTML = msg;}});
     setTimeout(accounb,50);
}
accounb();
	

$('#forms').on('submit', function(event) {
 event.preventDefault();
 var form_data =$(this).serialize();
  var regex = /^[a-zA-Z0-9]{2,15}(\s[a-zA-Z0-9]{2,20}){0,4}$/;
 var rege = /^[a-zA-Z0-9-]{2,15}(\s[a-zA-Z0-9-]{2,15}){0,3}$/;
 var number = /^[0-9]{1,2}$/;
 var inf = /^[a-zA-Z0-9éàèçé]{2,100}$/;
// on ecrits les variable
var ids =$('#ids').val();
var num =$('#num').val();
var nums =$('#nums').val();
var infos = $('#infos').val();


 if(ids.length> 40) {
	$('#error').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i>nombre max de caractère est de 50 nom du client');
	}
	
	else if(num.length > 3) {
	$('#error').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i>nombre max de caractère est de 50 nom du client');
	}
	
	else if (!number.test(num)){
      $('#error').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur de syntaxe sur le nom du client');
    }
	
	else if (!number.test(nums)){
      $('#error').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur de syntaxe pour le mail');
    }
	
	else{

  $.ajax({
	type:'POST', // on envoi les donnes
	async: false,
	url:"enregistrer_liste.php",
    data:new FormData(this),
	contentType:false,
	processData:false,
	success:function(data) {
	$('#html').html(data);
	$('#forms').css('display','none');
	}
   });
	 
   }

}); 
	
$('#form1').submit(function(e) {
	e.preventDefault();
	var donnes = $(this).serialize();
	// on lance l'apel ajax
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'insert_clients.php',// on traite par la fichier
	data:donnes,
	success:function(data) { // on traite le fichier recherche apres le retour
		$('#aff').html(data);
	
	 },
	 error: function() {
    alert('vente non valide'); }
	 
	});
	setInterval(function(){
		 $('#af').html('');
	 },7000);
	
  });

$('.add').click(function(){
$('#results').show();
$('#pag').css('display','block');	
});

$('#fermer').click(function(){
$('#results').hide();
$('#pag').css('display','none');	
});
$('.ct').click(function() {
$('#monts').hide();
$('.des').css('display','block');
$('.ct').css('display','none');
});

 

});
 

</script>
</body>
</html>
    
