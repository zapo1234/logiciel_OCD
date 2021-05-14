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
	

	#form_pass td,#form_pass1 td,#form_sejour td,#form_sejour1 td{padding:0.8%;width:250px;height:80px;font-family:arial;font-size:14px;font-weight} #form_pass input,select {height:40px;border:2px solid #eee;}
	.sub{display:none;} .plus,.valider{margin-left:3%;width:150px;height:30px;} .back{padding:1%;margin-top:5px;width:75%;border-bottom:1px solid #eee;}
	.th{padding-left:4%;font-family:arial;font-size:25px;text-transform:capitalize;} #totals{width:130px;border-bottom :2px solid #1E90FF;border-top:1px solid white;border-left:1px solid white;border-right:1px solid white;}
	.d{font-size:16px;padding-left:4px;font-weight:bold;} .plus,.pluc{width:30px;background-color:#1E90FF;color:white;border:2px solid #1E90FF;border-radius:15px;}
	.donnes1{font-family:'Roboto',serif;font-size:14px;color:black;font-weight:500;margin-top:7px;}
	.donnes2{margin-top:7px;margin-left:10%;} #dir{color:white;font-size:14px;font-weight:bold;background-color:green;border:2px solid green;margin-left:4%;}
	#affiche{background-color:#F0F8FF;width:80%;} .remove{background-color:white;border:2px solid white;height:15px;width:15px;border-radius:100%;}
	#affiche td{padding:1%;font-size:14px;font-family:arial;} #affiche input {border:1px solid #eee;height:35px;}
	.donnes3{margin-top:30px;font-size:20px;font-family:arial;} #idt{width:130px;border-left:1px solid white;border-left:1px solid right;
	border-top:1px solid white;border-bottom:2px solid #1E90FF}
	.clic{position:fixed;top:500px;left:70%;background-color:#1E90FF;border:2px solid #1E90FF;border:2px solid #1E90FF;color:white;
	height:40px;border-radius:20px;width:280px;font-family:arial;}
	#pag{position: fixed;top: 0;left: 0;width:100%;height: 100%;background-color: black;z-index:2;opacity: 0.6;display:none;}
	#pak{position: fixed;top: 0;left: 0;width:100%;height: 100%;background-color: black;z-index:2;opacity: 0.6;}
	
	#resultat{padding:1%;background-color:white;display:none;z-index:3;position:absolute;top:100px;left:10%;width:80%;height:500px;border:2px solid #eee;}
	
	#google{padding:1%;background-color:white;display:none;z-index:3;position:absolute;top:100px;left:10%;width:80%;height:500px;border:2px solid #eee;}
	
	.inc{font-family:'Roboto',serif;font-size:13px;border-bottom:1px solid #eee;padding:5px;} .dec{background-color:#1E90FF;border:2px solid #1E90FF;color:white;font-weight:bold;margin-left:2%;}
	#form_add td{height:45px;} #form_add input {border:1px solid #eee;height:30px;} .nim{width:100px;}
	.removes{background-color:white;border:1px solid white;border: 1px solid white}
    .enre{z-index:4;position:absolute;top:130px;left:40%;color:green;font-weight:bold;border:2px solid white;font-family:arial;font-size:16px;width:280px;height:200px;padding:2%;text-align:center;background-color:white}
	.resul{background-color:green;color:white;font-weight:bold;font-size:13px;border:2px solid green}
	.sub,.subs{padding:3%;position:absolute;width:400px;height:200px;top:300px;left:30%;background-color:white;z-index:4;}
	.der,.drs{margin-left:2%;background-color:#1E90FF;border:2px solid #1E90FF;color:white;margin-left:50%;margin-top:50px;}
	#resus{display:none;width:90%;height:700px;background-color:white;position:absolute;top:70px;left:5%;z-index:4;overflow-y:scroll}
	.titre{font-family:arial;font-size:18px;padding:1%;border-bottom:1px solid #eee;width:50%;}
	#form3{padding:2%;} #reservation td{font-family:arial;font-size:13px;width:300px;} #reservation input {border:1px solid #eee;height:30px;}
	.deg{position:fixed;left:65%;top:250px;background-color:#1E90FF;width:250px;height:40px;color:white;text-align:center;font-weight:bold;border:2px solid #1E90FF}
	#add_reser td{width:300px;} #add_reser input {border:1px solid #eee;height:30px;} 
	#one{border-bottom:2px solid #1E90FF;width:150%;} #resus{padding:2%;}
   .erro,.eror,.eros{font-weight:bold;font-family:arial;color:white;position:absolute;background-color:red;width:350px;height:55px;text-align:center;padding:1%;z-index:4;left:45%;top:130px;}
	
	th{font-family:arial;text-transform:uppercase;font-size:13px;margin-top:5px;width:200px;border-bottom:1 px solid}
	
	
	.dep {
  animation: spin 2s linear infinite;
  margin-top:10px;
  }

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
	
	#resultats{margin-top:40px;height:350px;background-color:black;border:3px solid black;opacity:0.6;color:white;}
	.h2{font-size:15px;font-family:'Roboto',serif;padding:2%;text-align:center;}
	.er{font-family:'Roboto',serif;font-size:15px;text-transform:uppercase;width:40%;}
	.element{margin-top:4px;padding-left:1.5%;} .das{font-size:16px;font-weight:bold;padding-left:3%;}
	.butt{background-color:white;height:35px;color:black;border:2px solid white;}
	.reini{padding:2%;z-index:3;position:absolute;top:200px;left:35%;background-color:white;width:350px;height:200px;border-radius:10px;border:3px solid white;}
	.dert{font-family:arial;text-transform:uppercase;font-size:14px;}
	.action{margin-top:25px;} .annul{border-radius:15px;width:120px;height:30px;background-color:#FF4500;color:white;border:2px solid #FF4500;}
	.ok{margin-left:7%;background-color:#1E90FF;border:2px solid #1E90FF} #reini{margin-left:2%;height:40px;width:130px;font-family:arial;border:1px solid #eee;}
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
 <span class="cont"><i class="material-icons" style="font-size:15px;color:#1E90FF;font-weight:bold;">&#xe3c9;</i><a href="gestion_description_home.php" title="l'inventaire de vos chambres">  Lister vos chambres/appartements</a></span>
 <span class="cont_a">Facturer des séjours/pass de vos clients <button class="x" id="sejour" title="facturer un sejour">Séjour</button> <button class="v" id="pass" title="facturer un pass">Pass</button></span>
 <span class="cont_b"><i class="material-icons" style="font-size:15px;color:#1E90FF">&#xe914;</i><span class="re"> Gérer vos Réservations clients <button type="button" class="reser">Réservation</button> </span></span>
 </div><!--cont21-->
 
 <div class="cont22">
 <span class="cont"></span>
 
 
 
 </div><!--cont22-->
 
 </div><!--content21-->
 
 <div id="content3">
 
 <div id="result">
 <h2>facturation des séjours clients</h2>
 <div id="error"></div><!--afficher l'erreur-->
 <div id="result_sejour"></div><!--retour ajax--sejour form1-->
 <form method="post" id="form1"  action="">
 <table id="form_sejour">
 <tr>
 <td class="er">Informations relatives au client</td>
 </tr>
 <tr>
 <td>Date<span class="c">*</span><br/><input type="date" name="dat" id="dat" Required></td>
 <td>Nom du client<span class="c">*</span><br/><input type="text" name="name" id="name" required></td>
 <td>Pièce d'identité<span class="c">*</span><br/><input type="text" name="piece" id="piece" placeholder="Nature+n°piéce" required></td>
 </tr>
 <tr>
  <td>Télephone: <br/><input type="number" name="number" id="number" placeholder="numero tel" required></td>
  <td>E-mail: <br/><input type="email" name="email" id="email" placeholder="E-mail" required></td>
 </tr>
 <tr>
 </table>
 <table id="form_sejour1">
 <tr>
 <td class="er">Informations pour l'herbegement</td>
 </tr>
 
 <tr>
 <td>hébergement<br/><select name="chamb[]" id="chamb" required><span class="c">*</span>
 <option value="">Choisir l'hébergement</option><?php echo select_box($bd);?></select>
 </td>
 <td>Check_in(entrée)<br/><span class="c">*</span><input type="date"  id="days" class="days" name="days"></td>
 <td>Check_out(sortie)<br/><span class="c">*</span><input type="date"  id="das" class="das" name="das"></td>
 </tr>
 
 <tr>
 <td>Nombre(s)/jour(s)<span class="c">*</span><br/><input type="number" id="nu1" class="nu" name="nu[]" required></td>
 <td>Tarifs/unité<span class="c">*</span><br/><input type="number" id="nm1" name="nm[]" class="nm" required></td>
 <td>Total<span class="c">*</span><br/><input type="number" id="tot1" class="tot" name="tot[]" readonly></td>
 </tr>
 
 <tr>
 <td>Occupant(s) :<br/><select  id="nomr"  name="nomr[]" required >
 <option value="1">1personne</option><option value="2">Couple</option><option value="3">3personnes</option><option value="4">4personnes</option><option value="5">au + 5personne</option></select></td>
 <td> + Repas :<br/><select  id="type" name="tp[]" required >
 <option value="sans">sans</option><option value="petit">Petit dejeuner</option><option value="dejeuner">déjeuner</option><option value="diner">diner</option></select></td>
 <td><input type="hidden" name="ids[]" value="1"></td>
 <td> + facture :<br/><select  id="ts" name="ts" required >
 <option value="1">Non payé</option><option value="2">Payé</option></td>
 </tr>
 </table>
 
<div id="resultat">
<span class="inc"> + facturer plus d'un local</span><button type="button" class="dec">+</button>
<table id="form_add">

</table>
<div><button type="button" class="der">Passer à la facturation</button></div>
</div><!--resultat-->
 
 <div class="back"><button type="button" class="plus" title="facturer au plus 6appt"><span class="d">+</span></button> <input type="button" value="valider" class="valider"/> 
 <span class="th">total facture :<input type="text" name="totals" id="totals" readonly></span><span class="tc">XOF</span></div>
 <div class="sub"> Avez vous bien vérifié les informations clients?<input type="submit" value="enregistrer" class="der"/></div>
<input type="hidden" name="token" id="token" value="<?php echo $_SESSION['token'];?>">

 </form>
 </div><!--result-->
 
 
 <div id="results">
 <div id="eros"></div><!--eros-->
  <div id="result_pass"></div><!--result_pass-->
 <form method="post" id="form2" action="">
 <h2>facturer des pass à vos clients</h2>
 <table id="form_pass">
 <tr>
 <td class="er">Informations relatives à votre clients</td>
 </tr>
 <tr>
 <td>Date<span class="c">*</span><br/><input type="date" name="da" id="da" Required></td>
 <td>Nom du client<span class="c">*</span><br/><input type="text" name="names" id="names" required></td>
 <td>Pièce d'identité<span class="c">*</span><br/><input type="text" name="piec" id="piec" placeholder="Nature+n°piéce" required></td>
 </tr>
 <tr>
 <td>Télephone: <br/><input type="numbr" name="numbr" id="numbr2" placeholder="numero tel" required></td>
 <td>E-mail: <br/><input type="email" name="emais" id="emais"></td>
 </tr>
 </table>
 <table id="form_pass1">
 <tr>
 <td class="er">Informations pour l'herbergément</td>
 </tr>
 <tr>
 <td>hébergement<br/><span class="c">*</span><br/><select name="chambres[]" id="chambres" required><span class="c">*</span>
 <option value="">Choisir l'hébergement</option><?php echo select_box($bd);?></select>
 </td>
 <td>Heure(entrée)<span class="c">*</span><br/><input type="time" id="tim" name="tim"></td>
 <td>Heure(sortie)<span class="c">*</span><br/><input type="time" id="tis" name="tis"></td>
 </tr>
 
 <tr>
 <td>Nombre(s)/heure(s)<br/><span class="c">*</span><input type="number" class="nums" id="nums1" name="nums[]" required></td>
 <td>Tarifs/unité<br/><span class="c">*</span><input type="number"  class="nams" id="nams1" name="nams[]" required></td>
 <td>Total<br/><span class="c">*</span><input type="number" id="toal1" class="toal" name="toal[]" readonly></td>
 <td><input type="hidden" name="is[]" value="1"></td>
 </tr>
 
 <tr>
 <td>Occupant(s) :<br/><select  id="nombres" name="nombres[]" required >
 <option value="1">1personne</option><option value="2">Couple</option><option value="3">3personnes</option><option value="4">4personnes</option><option value="5">au + 5personne</option></select></td>
 <td> + Repas :<br/><select  id="typ" name="typ[]">
 <option value="sans">sans</option><option value="petit">Petit dejeuner</option><option value="dejeuner">déjeuner</option><option value="diner">diner</option></select></td>
 </tr>
 
 </table>
 
<div id="google">
<span class="inc"> + facturer plus d'un local</span><button type="button" class="dey">+</button>
<table id="pass_add">

</table>
<div><button type="button" class="der">Passer à la facturation</button></div>
</div><!--resulta-->
 
  <div class="back"><button type="button" class="pluc" title="facturer au plus 5appt"><span class="d">+</span></button> <input type="button" value="valider" class="valider"/> 
 <span class="th">total facture :<input type="text" name="totals_pass" id="totals_pass" readonly></span><span class="tc">XOF</span></div>
 <div class="subs"> Avez vous bien vérifié les informations clients?<input type="submit" value="enregistrer" class="drs"/></div>
<input type="hidden" name="token" id="token" value="<?php echo $_SESSION['token'];?>">
 
</form>
 
 
</div><!--results-->

<div id="result_depense"></div><!--retour ajax--->
<div id="erros"></div>
<form method="post" id="size" action="">
<div id="add"></div>

<table  id="affiche">


</table><!--recuperation tableau depenses-->
<input type="hidden" id="idy" name="idy"><!--adjout du total depense-->
</form>

 <div id="donnes_depense">
<h3>Ajouter des dépenses</h3>
<div class="donnes1"><i class="material-icons" style="font-size:18px;color:red;font-weight:bold;">&#xe3c9;</i>  Dépenses(consommées)</div>
<div class="donnes1"><i class="material-icons" style="font-size:18px;color:#1E90FF;font-weight:bold;">&#xe3c9;</i>  Crédit fournisseur en(dette)</div>
<div class="donnes2"><button id="dir" title="ajouter des entrées">+</button></div>
 <div class="donnes3"><div class="tt">Total S/Dépense :<input type="text" name="idt" id="idt" readonly><span class="idt">XOF</span></div></div>
 
 <div id="resultats"></div><!--div retour ajax--->
 
 </div><!--donnes_depense-->

 <div id="result_reser"></div><!--div result--->
 <div id="resus">
 <div class="titre">Formulaire de réservation de vos clients pour séjour clients</div>
 <div id="eror"></div><!--div---affichage-->
 
<form method="post" id="form3" action="">
<table id="reservation">

<tr>
<td class="er">Informations relatives au clients</td>
</tr>
<tr>
 <td>Date<span class="c">*</span><br/><input type="date" name="da" id="da" Required></td>
 <td>Nom du client<span class="c">*</span><br/><input type="text" name="nume" id="nume"></td>
 <td>Pièce d'identité<span class="c">*</span><br/><input type="text" name="pice" id="pice" placeholder="Nature+n°piéce"></td>
 </tr>
 <tr>
  <td>Télephone: <br/><input type="number" name="numbers"  placeholder="numero tel" required></td>
  <td>E-mail: <br/><input type="email" id="emails" name="emails"></td>
 </tr>
 
 <tr>
 <td class="er">Informations relatives à l'hébergement</td>
 </tr>
 <tr>
 <td>hébergement<br/><select name="chambr[]" id="chambr" required><span class="c">*</span>
 <option value="">Choisir l'hébergement</option><?php echo select_box($bd);?></select>
 </td>
 <td>Check_in(entrée)<span class="c">*</span><br/><input type="date"  id="dims1" name="dims"></td>
 <td>Check_out(sortie)<span class="c">*</span><br/><input type="date"  id="dise1" name="dise"></td>
 </tr>
 
 <tr>
 <td>Nombre(s)/jour(s)<span class="c">*</span><br/><input type="number"  class="nms" id="nms1" name="nms[]" required></td>
 <td>Tarifs/unité<span class="c">*</span><br/><input type="number" class="nam" id="nam1"  name="nam[]" required></td>
 <td>Total<span class="c">*</span><br/><input type="number" id="tots1" class="tots" name="tots[]" readonly></td>
 </tr>
 <tr>
 <td>Occupant(s) :<br/><select  id="nomb" name="nomb[]" required >
 <option value="1">1personne</option><option value="2">Couple</option><option value="3">3personnes</option><option value="4">4personnes</option><option value="5">au + 5personne</option></select></td>
 <td> + Repas :<select  id="ty" name="ty[]" required >
 <option value="sans">sans</option><option value="petit">Petit dejeuner</option><option value="dejeuner">déjeuner</option><option value="diner">diner</option></select></td>
 <td><input type="hidden" name="idc[]" value="1"></td>
 </tr>
</table>

<table id="add_reser">


</table><!--afficher plus d'une reservation en adjout-->
<div><button type="button" class="ders" title="+ de 1 local">+ajouter</button></div>

<table>
<th>Total sur facture</th>
<tr>
 <td>Montant avancé <input type="number" class="nmsi" name="nmsi" id="nmsi"  min="1" ></span></td>
 <td>Reste à payer<input type="number" class="aams" name="aams" id="aams" min="1" ></td>
 <td>Totale facture<input type="number" class="tota_reser" name="tota_reser" id="tota_reser" min="1" ></td>
 
 <td><input type="hidden" name="total_reser" value="1"></td>
 </tr>
</table>
<div><input type="submit" class="deg" value="valider"></div>
</form>


</div><!--resus reservation -->
 
 
</div><!--content3-->
 
 </div><!--content2-->
 
 
</div><!--div content --principal-->


<div class="reini" style="display:none">
 <form method="post" id="form_reini" action="">
 <div class="dert"> Attribuer la Recette du jour :<input type="date" id="reini" name="reini" required></div>
 <div class="action"><button type="button" class="annul">Annuler</button><input type="submit" class="ok" value="ok"></div>
 </form>
 
 </div><!--reini---->
 <div id="result_reini"></div><!--div result_reini-->

<?php include('inc_foot_scriptjs.php');?>

<script type="text/javascript">
 $(document).ready(function(){
	 
	var date1=$('#days').val();
	var date2=$('#das').val();
	
	
	dat1 = new Date('2012-08-16');
	dat2 = new Date('2012-08-17');
	
	var tmp = dat2-dat1;
	var s = tmp/1000;
	alert(s);
	function dateDiff(dat1,dat2){
	 var diff={};
	 var tmp = dat2 - dat1;
	tmp = Math.floor((tmp-diff.hour)/24);
	diff.day = tmp;
	alert( diff);	
		
	}	
		
	
	 
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
			
			
 $('.x').click(function() {
// on click sur un bouton
var html="";
// on effectue du css
 $('#sejour').css('background-color','#00FA9A');
 $('#sejour').css('color','white');
 $('#sejour').css('border-color','#00FA9A');
 $('#sejour').css('border-radius','15px');
 $('#sejour').css('width','7%');
 $('#sejour').css('font-weight','bold');
 $('#sejour').css('height','30px');
 $('#pass').css('background-color','#FF00FF');
 $('#pass').css('color','white');
 $('#pass').css('border-color','#FF00FF');
 $('#pass').css('border-radius','0px');
 $('#pass').css('width','7%');
 $('#pass').css('font-weight','300');
 $('#pass').css('height','30px');
 $('#affiche').css('display','none');
 $('#add').css('display','none');

$('#result').fadeIn(500);
 $('#results').css('display','none');
 })	
 
 $('.v').click(function(){
	var htmls="";
// on effectue du css
 $('#pass').css('background-color','#00FA9A');
 $('#pass').css('color','white');
 $('#pass').css('border-color','#00FA9A');
 $('#pass').css('border-radius','15px');
 $('#pass').css('width','7%');
 $('#pass').css('font-weight','bold');
 $('#pass').css('height','30px');
 $('#sejour').css('background-color','#FF00FF');
 $('#sejour').css('color','white');
 $('#sejour').css('border-color','#FF00FF');
 $('#sejour').css('border-radius','0px');
 $('#sejour').css('width','7%');
 $('#sejour').css('font-weight','300');
 $('#sejour').css('height','30px');
 $('#affiche').css('display','none'); 
 $('#add').css('display','none');
$('#result').css('display','none');
$('.subs').css('display','none');
  $('#results').fadeIn(500);
 })
 
  
  var cont = 0;
$(document).on('click','#dir', function(){


var html = '';
 cont = cont +1;
html += '<tr class="dir" id ="row_id_'+cont+'">';
html += '<td><input type="date" class="date" id="ti" name="ti[]" required></td>';
html +='<td><input type="text" class="designation" id="designation" name="designation[]" placeholder="Désignation" required></td>';
html +='<td><input type="text" class="fournisseur" id="fournisseur" name="fournisseur[]" placeholder="fournisseur"/></td>';	
html +='<td><select name="des[]" id="des"><option value="1">dépense effectué</option><option value="2">crédit fournisseur</option></select></td>';	
html +='<td><input type="text" class="montant" id="montant'+cont+'" name="montant[]" placeholder="Montant" required></td>';
html +='<td><button class="remove" name="remove" id="'+cont+'"><i class="material-icons" style="font-size:25px">highlight_off</i></button></td>';
html +='</tr>';

$('#affiche').append(html);
$('#result').css('display','none');
$('#results').css('display','none');
$('#affiche').css('display','block');
$('#add').css('display','block');
$('#add').html('<button type="submit" class="clic">Enregistrer vos dépenses</button>');
});

var count=1;

 $(document).on('click','.dec',function(){
	var html= '';
	count= count +1;
    html +='<tr>';
    html +='<td>hébergement<select name="chamb[]"  required><span class="c">*</span><option value="">Choisir l\'hébergement</option><?php echo select_box($bd);?></select></td>';	
	html +='<td>Nombre/jour(s)<span class="c">*</span><input type="number" id="nu'+count+'" class="nu" name="nu[]"></td>';
    html +='<td>Tarifs/unité<span class="c">*</span><input type="number" id="nm'+count+'" class="nm"  name="nm[]"></td>';
    html +='<td>Total<span class="c">*</span><input type="number" class="tot" id="tot'+count+'" class="tot"  name="tot[]" readonly></td>';
    html +='<td>Occupant(s) :<select  name="nomr[]" ><option value="1">1personne</option><option value="2">Couple</option><option value="3">3personnes</option><option value="4">4personnes</option><option value="5">au + 5personne</option></select></td>';
    html +='<td> + Repas :<select name="tp[]"><option value="sans">sans</option><option value="petit">Petit dejeuner</option><option value="dejeuner">déjeuner</option><option value="diner">diner</option></select></td>';
    html +='<td><input type="hidden" name="ids[]" value="'+count+'">';
	html +='<td><button class="removes" name="removes" ><i class="material-icons" style="font-size:20px;color:#FF4500;">highlight_off</i></button></td>';
	html +='</tr>';
	$('#form_add').append(html);
});

var cot=1;

 $(document).on('click','.dey',function(){
	var html= '';
	cot= cot +1;
    html +='<tr>';
    html +='<td>hébergement<select name="chambres[]"  required><span class="c">*</span><option value="">Choisir l\'hébergement</option><?php echo select_box($bd);?></select></td>';	
	html +='<td>Nombre/heure(s)<span class="c">*</span><input type="number" id="nums'+cot+'" class="nums" name="nums[]"></td>';
    html +='<td>Tarifs/unité<span class="c">*</span><input type="number" id="nams'+cot+'" class="nams"  name="nams[]"></td>';
    html +='<td>Total<span class="c">*</span><input type="number" class="toal" id="toal'+cot+'" class="toal"  name="toal[]" readonly></td>';
    html +='<td>Occupant(s) :<select  name="nombr[]" ><option value="1">1personne</option><option value="2">Couple</option><option value="3">3personnes</option><option value="4">4personnes</option><option value="5">au + 5personne</option></select></td>';
    html +='<td> + Repas :<select name="typ[]"><option value="sans">sans</option><option value="petit">Petit dejeuner</option><option value="dejeuner">déjeuner</option><option value="diner">diner</option></select></td>';
    html +='<td><input type="hidden" name="is[]" value="'+cot+'">';
	html +='<td><button class="removs" name="removs" ><i class="material-icons" style="font-size:20px;color:#FF4500;">highlight_off</i></button></td>';
	html +='</tr>';
	$('#pass_add').append(html);
});


 var cou=1;
$(document).on('click','.ders',function(){
	var html= '';
	cou=cou+1;
    html +='<tr class="one">';
    html +='<td>hébergement<select name="chambr[]"><span class="c">*</span><option value="">Choisir l\'hébergement</option><?php echo select_box($bd);?></select></td>';	
	html +='<td>Nombre(s)/jour(s)<span class="c">*</span><input type="number" id="nms'+cou+'" class="nms" name="nms[]"></td><td>Tarifs/unité<span class="c">*</span><input type="number" class="nam" id="nam'+cou+'"  name="nam[]"></td><td>Total<span class="c">*</span><input type="number"  class="tots" id="tots'+cou+'"  name="tots[]" readonly></td>';
	html +='<td>Occupant(s) :<select name="nomb[]" required ><option value="1">1personne</option><option value="2">Couple</option><option value="3">3personnes</option><option value="4">4personnes</option><option value="5">au + 5personne</option></select></td>';
    html +='<td><input type="hidden" name="idc[]" value="'+cou+'"></td>';
	html +='<td> + Repas :<select name="ty[]"><option value="sans">sans</option><option value="petit">Petit dejeuner</option><option value="dejeuner">déjeuner</option><option value="diner">diner</option></select></td>';
    html +='<td><button type="button" class="remov" name="remov"><i class="material-icons" style="font-size:20px;color:#FF4500;">highlight_off</i></button></td>';
	html +='</tr>';
	$('#add_reser').append(html);
});

 
$(document).on('keyup','#nams', function(){
var nums = $('#nums').val();
var nams =$('#nams').val();
var result = nums*nams;
$('#totale').val(result);	
});
  
 $(document).on('click','.remove', function(){
var id = $(this).attr("id");

if(id==1){
$('#result').css('display','block');
$('#add').css('display','none');
$('#affiche').css('display','none');	
}
var idt=$('#idt').val();
$('#row_id_' +id).remove();
cont =cont -1;
 calcul();
}); 

$(document).on('click','.removes', function(){
$(this).closest('tr').remove();
count=count-1;
calcu();

});

$(document).on('click','.removs', function(){
$(this).closest('tr').remove();
cot=cot-1;
calcule();

}); 

$(document).on('click','.remov', function(){
$(this).closest('tr').remove();
cot=cot-1;
calcules();

}); 


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



 function calculs() {

 var totale = 0;
 var idt=$('#idt').val();
 for(j=2; j<500; j++) {
 var mont = 0;
  mont = $('#montant'+j).val();
 if(mont > 0) {

totale = parseFloat(idt) - parseFloat(mont);
	
  }
 }

$('#idt').val(totale);
}

 function calcu(){

 var tot=0;

  for(j=1; j<500; j++){	
 
 var nm =$('#nm'+j).val();
 var nu =$('#nu'+j).val();
 if(nu==""){
	 nu=0;
 }
 
 if(nm==""){
	 nm=0;
 }

  var tots = parseFloat(nm)*parseFloat(nu);
  var tot = parseFloat(tots)+parseFloat(tot);
 $('#tot'+j).val(tots);
 
 }
	 
 var sum = 0;
    $('.tot').each(function(){
        sum += +$(this).val();
    });
    $('#totals').val(sum);
 
 }
 
 
 function calcule(){
 
var sum = 0;
    $('.toal').each(function(){
        sum += +$(this).val();
    });
    $('#totals_pass').val(sum);
	$('#total_pass').val(sum);
 
 }
 
 function calcules(){
 
var sum = 0;
    $('.tots').each(function(){
        sum += +$(this).val();
    });
    $('#tota_reser').val(sum);
 
 }
 
 
 
 
 
 function cal(){
 var tot=0;

  for(j=1; j<500; j++){	
 
 var nms =$('#nms'+j).val();
 var nam =$('#nam'+j).val();
 if(nam==""){
	 nam=0;
 }
 
 if(nms==""){
	 nms=0;
 }

  var tots = parseFloat(nms)*parseFloat(nam);
  var tot = parseFloat(tots)+parseFloat(tot);
 $('#tots'+j).val(tots);
 
 }
 
  var sum = 0;
    $('.tots').each(function(){
        sum += +$(this).val();
    });
	 $('#tota_reser').val(sum);
	 

 
 }
 
 
 
 function cals(){
 var tot=0;

  for(j=1; j<500; j++){	
 
 var nums =$('#nums'+j).val();
 var nams =$('#nams'+j).val();
 if(nams==""){
	 nams=0;
 }
 
 if(nums==""){
	 nums=0;
 }

  var tots = parseFloat(nums)*parseFloat(nams);
  var tot = parseFloat(tots)+parseFloat(tot);
 $('#toal'+j).val(tots);
 
 }
 
  var sum = 0;
    $('.toal').each(function(){
        sum += +$(this).val();
    });
     $('#totals_pass').val(sum);
	 $('#total_pass').val(sum);
 
 }
 
 $(document).on('keyup','#nmsi',function(){
var totals=$('#tota_reser').val();
var nmsi=$('#nmsi').val(); 
var result= parseFloat(totals)-parseFloat(nmsi);
var re=0;
if(result>0) {
$('#aams').val(result);
}

else {
$('#aams').val(re);
}
});

$(document).on('keyup','.nu',function() {
calcu();	
});
  
 $(document).on('keyup','.nm',function() {
calcu();	
});
  
$(document).on('keyup','.nms',function() {
cal();	
});
  
 $(document).on('keyup','.nam',function() {
cal();	
});

$(document).on('keyup','.nums',function() {
cals();	
});
  
 $(document).on('keyup','.nams',function() {
cals();	
});
  

$(document).on('blur','.montant',function() {
calcul();	
});


  
  
  $('.des').click(function(){
$('#monts').show();
$('.des').hide();
$('.ct').css('display','block');	
});


$('.ct').click(function() {
$('#monts').hide();
$('.des').css('display','block');
$('.ct').css('display','none');
});
$('.reser').click(function() {
$('#pag').css('display','block');
$('#resus').css('display','block');
});

$('.plus').click(function() {
$('#pag').css('display','block');
$('#resultat').css('display','block');
});

$('.pluc').click(function() {
$('#pag').css('display','block');
$('#google').css('display','block');
});

$('.xee').click(function() {
$('#pag').css('display','none');
$('#resus').css('display','none');
$('#veri').css('display','none');
$('#resultat').css('display','none');
$('#google').css('display','none');
$('.sub').css('display','none');
$('.subs').css('display','none');
$('.reini').css('display','none');
});

$('#pag').click(function() {
$('#pag').css('display','none');
$('#resus').css('display','none');
$('#veri').css('display','none');
$('#resultat').css('display','none');
$('#google').css('display','none');
$('.sub').css('display','none');
$('.subs').css('display','none');
$('.reini').css('display','none');
});

$('.dim').click(function() {
$('#pag').css('display','block');
$('#veri').css('display','block');
});


$('.valider').click(function(){
$('.sub').show(1000);
$('#pag').css('display','block');
$('.subs').show(1000);
	
});

$('.der').click(function(){
$('.sub').hide(1000);
$('#pag').css('display','none');
$('#google').css('display','none');
$('#resultat').css('display','none');
});

$('.drs').click(function(){
$('.subs').hide(1000);
$('#pag').css('display','none');
});


$(document).on('click','.butt',function(){
$('.reini').css('display','block');
$('#pag').css('display','block');

});

  $('#vas').click(function() {
	  
	  var nom = $('#nom').val();
      var pice= $('#pice').val();
	  var naams=$('#naams').val();
	  var aams=$('#aams').val();
	  var nmsi=$('#nmsi').val();
	  var nume=$('#nume').val();
      var startDt= $('#dims').val();
	  var chambr= $('#chambr').val();
      var endDt= $('#tise').val();
	  
	  
	 if(nom.length > 25) {
		$('#error').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i> le nombre caractère( du nom) doit etre inférieur à 25');  
		  
	  }
	  else if (naams=="" && aams=="" && chambr=="" && nmsi=="" && nume=="") {
		$('#error').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i> Tous vos champs doivent etre remplis');    
		  
	  }
	  
	  else if (nume < 0 && nmsi < 0 && aams < 0 ) {
		$('#error').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i> les montants sont positives');    
		  
	  }
	  
	  
	  else if(startDt=="" && endDt=="") {
		  $('#error').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i> les champs des dates sont vides');
		  
	  }
	  else if(nume.length < 8) {
		$('#error').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i> le numéro du client est compris entre 8 et 11 caractères');  
	}
	
	
	  
	  else if(Date.parse(startDt)>=Date.parse(endDt)){
     $('#error').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i>la date du cheik_in  est inférieur àcelle du check_out');
   }

else {
	
 $('#form3').submit();
	
}  
});

$('.montant').keyup(function(){
 $('#erros').html('');
});

 
 $('#form1').on('submit', function(event) {
	event.preventDefault(); 
	
	var form_data =$(this).serialize();
	var regex = /^[a-zA-Z\'éèçà]{2,15}(\s[a-zA-Z\'éèçà]{2,20}){0,4}$/;
	var rege = /^[a-zA-Z0-9-]{2,15}(\s[a-zA-Z0-9-]{2,15}){0,3}$/;
	var reg = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
	var name= $('#name').val();
	var piece=$('#piece').val();
	var number =$('#number').val();
	var nu =$('#nu').val();
	var nm=$('#nm').val();
	var totale=$('#tot').val();
	var dat1=$('#dati').val();
	var dat2=$('#dats').val();
	var email=$('#email').val();
	
	if(name.length>50) {
	$('#error').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i>nombre max de caractère est de 50 nom du client');
	}
	
	else if (!regex.test(name)){
      $('#error').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur de syntaxe sur le nom du client');
    }
	
	else if (!reg.test(email)){
      $('#error').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur de syntaxe pour le mail');
    }
	
	
    else if(piece.length >100) {
	$('#error').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> nombre max de caractère est de 50 pour la pièce');
	}
	
	else if(number.length >15) {
	$('#error').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> nombre max de caractère est de 15 pour le numéro de télephone');
	}
	 
	else if (!rege.test(piece)){
      $('#error').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>erreur de syntaxe pour la pèce d\'identité est incorrecte');
    }

	
  else{
	
	// on lance l'apel ajax
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'enregistrer_locale.php',// on traite par la fichier
	data:form_data,
	success:function(data) { // on traite le fichier recherche apres le retour
	  $('#result_sejour').html(data);
	  $('.xee').css('display','none');
	 },
	 error: function() {
    alert('vente non valide'); }
	 
	});
	
	}

});
 
 $('#form2').on('submit', function(event) {
	event.preventDefault(); 
	
	var form_data =$(this).serialize();
	var regex = /^[a-zA-Z\'éèçà]{2,15}(\s[a-zA-Z\'éèçà]{2,20}){0,4}$/;
	var rege = /^[a-zA-Z0-9-]{2,15}(\s[a-zA-Z0-9-]{2,15}){0,3}$/;
	var reg = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
	var name= $('#names').val();
	var piece=$('#piec').val();
	var number =$('#numbers').val();
	var nu =$('#nums').val();
	var nm=$('#nams').val();
	var totale=$('#toal').val();
	var dat1=$('#tim').val();
	var dat2=$('#tis').val();
	var email=$('#emais').val();
	
	if(name.length>50) {
	$('#eros').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>nombre max de caractère est de 50 nom du client');
	}
	
    else if (!regex.test(name)){
      $('#eros').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>erreur de syntaxe sur le nom du client');
    }
	
	
	else if (!rege.test(piece)){
      $('#eros').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>erreur de syntaxe pour la pièce d\'identité');
    }
	
	else if (!reg.test(email)){
      $('#eros').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>erreur de syntaxe pour le mail');
    }
	
   else if(piece.length >100) {
	$('#eros').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> nombre max de caractère est de 50 pour la pièce d\'identité du client');
		
	}
	
	else if (!rege.test(piece)){
      $('#eros').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur de syntaxe pour la pièce d\'identité du client');
    }
	
	
	else {
     
	 // on lance l'apel ajax
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'enregistrer_pass.php',// on traite par la fichier
	data:form_data,
	success:function(data) { // on traite le fichier recherche apres le retour
		$('#result_pass').html(data);
	 },
	 error: function() {
    alert('vente non valide'); }
	 
	});
	
  }
   
	 
 });
 
 
 
 $('#form3').on('submit', function(event) {
	event.preventDefault(); 
	
	var form_data =$(this).serialize();
	var regex = /^[a-zA-Z\'éèçà]{2,20}(\s[a-zA-Z\'éèçà]{2,20}){0,4}$/;
	var rege = /^[a-zA-Z0-9-]{2,15}(\s[a-zA-Z0-9-]{2,15}){0,3}$/;
	var reg = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
	var nume= $('#nume').val();
	var piece=$('#pice').val();
	var number =$('#numbers').val();
	var nu =$('#nms').val();
	var nm=$('#nam').val();
	var totale=$('#tots').val();
	var dat1=$('#dims').val();
	var dat2=$('#dise').val();
	var email=$('#emails').val();
	
	if(nume.length>50) {
	$('#eror').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>nombre max de caractère est de 50 nom du client');
	}
	
	 else if (!regex.test(nume)){
      $('#eror').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>erreur de syntaxe pour la désignation');
    }

	else if (!reg.test(email)){
      $('#eror').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>erreur de syntaxe pour le mail');
    }
	
	else if(piece.length >100) {
	$('#eror').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> nombre max de caractère est de 50 renseigner la pièce');
		
	}
	
	else if (!rege.test(piece)){
      $('#eror').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i>erreur de syntaxe pour la pièce d\'identité du client');
    }
	
	else {
     
	 // on lance l'apel ajax
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'enregistrer_locales.php',// on traite par la fichier
	data:form_data,
	success:function(data) { // on traite le fichier recherche apres le retour
		$('#result_reser').html(data);
		$('#pag').css('display','none');
		$('#resus').css('display','none');
	
	 },
	 error: function() {
    alert('vente non valide'); }
	 
	});
	
	}
   
});



$('#size').on('submit', function(event) {
  event.preventDefault();
  var regex = /^[a-zA-Z0-9éçàùèàè]{0,100}$/;	
  var form_data =$(this).serialize();
  
  $('.designation').each(function() {
	 
	 if($(this).val().length >100){
		$('#erros').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i> le champ désignation pas plus de 100 caractères');
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
    $('#erros').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i> le nombre de caractère moins de 10');
   }
   else{
	  $('#erros').html(''); 
   }
   
  });
  
  var erreur=$('#erros').text();
  
    if(erreur=="") {

	$.ajax({
	type:'POST', // on envoi les donnes
	url:'enregistrer_depense.php',// on traite par la fichier
	data:form_data,
	success:function(data) { // on traite le fichier recherche apres le retour
      $('#result_depense').html(data);
	  $('#pag').css('display','block');
	  $('.xee').css('display','none');
	  load_data();
	  $('#affiche').find("tr:gt(0)").remove();
	 
      }
    });
	
	setInterval(function(){
		 $('#result_depense').html('');
		 location.reload(true);
	 },2000);
	 
	}
    	
  });

  $('#form_reini').on('submit', function(event) {
	event.preventDefault();
	
	var action="dat";
	var date=$('#reini').val();
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'affichage_donnees.php',// on traite par la fichier
	data:{action:action,date:date},
	success:function(data) { // on traite le fichier recherche apres le retour
      $('#result_reini').html(data);
	  $('.reini').css('display','none');
	 
	}
    });
	  
	  
  });


 
 });
 

</script>
</body>
</html>
    
