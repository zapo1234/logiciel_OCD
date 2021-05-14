<?php
include('connecte_db.php');
include('inc_session.php');
	 
?>


<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
  <?php include('inc_entete.php');?>
  <title>Optimisation de comptabilité à distance</title>
  <meta name="description" content="Dynamiser le suivi et la gestion de votre espace hotelier" />
  <style type="text/css">
 
@media (min-width: 576px) and (max-width: 767.98px) { 
#first{width:100%;height:70px;background-color:white;box-shadow:3px 3px 3px grey;padding-top:20px;padding-left:2%;position:fixed;}
.it{padding-left:3%;} a{color:black;font-family:arial;font-size:11px;text-decoration:none;text-transform:uppercase;}
.home{background-color:#F0F8FF;padding:1%;font-family:arial;font-size:12px;border-radius:15px;}
#second{width:100%;} .box,.box1,.box3{float:left;margin-left:4%;}
.second1{background-color:white;width:90%;height:90px;margin-left:5%;margin-top:10px;padding-top:20px;box-shadow:3px 3px 3px grey;margin-top:75px;}
.box{font-family:aria;font-style:italic;font-size:20px;color:} 
#button1{margin-left:12%;width:150px;height:25px;background-color:#4682B4;color:white;padding:2%;border-radius:15px;font-family:arial;
font-size:12px;border:2px solid #4682B4;cursor:pointer;}.box1{width:30%;} .box3{margin-left:12%;font-family:arial;margin-top:-12px;}
.bos1,.bos2{float:left;} .bos1{width:35%;} .bos2{width:60%;}
#three{width:100%;} .three1{width:90%;height:60px;background-color:#F0F8FF;margin-left:5%;}
.boss1,.boss2{float:left;margin-left:2%;padding-top:7px;} .boss1{width:35%;font-family:arial;} .boss2{width:55%;font-family:arial;font-size:11px;text-transform:uppercase;} .clis{padding-left:3%;} .reser{padding-left:6%;cursor:pointer;}
.dim{padding-left:8%;cursor:pointer;} #four{width:100%;} .four1{width:90%;height:600px;background-color:white;margin-left:5%;margin-top:5px;box-shadow:3px 3px 3px grey;} .x{font-size:12px;width:100px;}
#footer{width:100%;margin-top:5px;} .ocd{width:90%;height:25px;background-color:white;margin-left:5%;font-family:arial;text-align:center;}
.clis{font-family:arial;text-transform:uppercase;font-size:11px;} #dec{background-color:white;color:blue;margin-left:3%;height:25px;border-radius:15px;}
#corps1,#corps2{float:left;} #corps1{width:60%;height:300px;} #corps2{width:35%;}
h1{font-family:arial;font-size:12px;margin-left:1%;width:90%;text-align:center;text-transform:uppercase;border-bottom:1px solid #eee;padding-bottom:3px;color:#136cbd;}
h2{font-family:arial;font-size:11px;margin-left:1%;width:95%;text-align:center;text-transform:uppercase;border-bottom:1px solid #eee;padding-bottom:3px;color:#136cbd;}
#sejour,#pass{width:20%;height:25px;background-color:#eee;color:black}.bir{font-family:arial;font-size:13px;padding-left:2%;}
.back{margin-top:50px;} #dat,#dats,#date{cursor:pointer;width:120px;height:35px;} #name{width:200px;height:35px;text-align:center.font-family:arial;text-transform:uppercase;} #piece{width:170px;}
input,select{height:35px;border:1px solid #eee;} #type{width:130px;height:35px;} #valider,#val{width:200px;height:35px;color:white;background-color:white;font-weight:bold;
border:2px solid #136cbd; border-radius:15px;color:#136cbd}
form{height:400px;background-color:#F0F8FF;padding-top:5px;}
#result,#results{display:none;}.h2{font-family:arial;font-size:12px;} .dir{padding-left:7%;font-family:arial;text-transform:uppercase;} #dirs,#dir{margin-top:2px;background-color:white;color:black;border:1px solid white;
font-family:arial;cursor:pointer;} .dirs{padding-left:8%;font-family:arial;text-transform:uppercase;}


}

@media (min-width: 768px) and (max-width: 991.98px) { 
#first{width:100%;height:70px;background-color:white;box-shadow:3px 3px 3px grey;padding-top:20px;padding-left:2%;position:fixed;}
.it{padding-left:3%;} a{color:black;font-family:arial;font-size:11px;text-decoration:none;text-transform:uppercase;}
.home{background-color:#F0F8FF;padding:1%;font-family:arial;font-size:12px;border-radius:15px;}
#second{width:100%;} .box,.box1,.box3{float:left;margin-left:4%;}
.second1{background-color:white;width:90%;height:90px;margin-left:5%;margin-top:10px;padding-top:20px;box-shadow:3px 3px 3px grey;margin-top:75px;}
.box{font-family:arial;font-size:14px;color:#136cbd;font-weight:bold;text-transform:uppercase;} 
#button1{margin-left:12%;width:150px;height:25px;background-color:#4682B4;color:white;padding:2%;border-radius:15px;font-family:arial;
font-size:12px;border:2px solid #4682B4;cursor:pointer;}.box1{width:30%;} .box3{margin-left:8%;font-family:arial;margin-top:-12px;}
.bos1,.bos2{float:left;} .bos1{width:35%;} .bos2{width:60%;}
#three{width:100%;} .three1{width:90%;height:60px;background-color:#F0F8FF;margin-left:5%;}
.boss1,.boss2{float:left;margin-left:2%;padding-top:7px;} .boss1{width:35%;font-family:arial;} .boss2{width:57%;font-family:arial;font-size:11px;text-transform:uppercase;} .clis{padding-left:3%;} .reser{padding-left:6%;cursor:pointer;}
.dim{padding-left:5%;cursor:pointer;} #four{width:100%;} .four1{width:90%;height:600px;background-color:white;margin-left:5%;margin-top:5px;box-shadow:3px 3px 3px grey;} .x{font-size:12px;width:100px;}
#footer{width:100%;margin-top:5px;} .ocd{width:90%;height:25px;background-color:white;margin-left:5%;font-family:arial;text-align:center;}
.clis{font-family:arial;text-transform:uppercase;font-size:11px;} #dec{background-color:white;color:blue;margin-left:3%;height:25px;border-radius:15px;}
#corps1,#corps2{float:left;} #corps1{width:60%;height:300px;} #corps2{width:35%;}
h1{font-family:arial;font-size:12px;margin-left:1%;width:90%;text-align:center;text-transform:uppercase;border-bottom:1px solid #eee;padding-bottom:3px;color:#136cbd;}
h2{font-family:arial;font-size:11px;margin-left:1%;width:95%;text-align:center;text-transform:uppercase;border-bottom:1px solid #eee;padding-bottom:3px;color:#136cbd;}
#sejour,#pass{width:20%;height:25px;background-color:#eee;color:black}.bir{font-family:arial;font-size:13px;padding-left:2%;}
.back{margin-top:50px;} #dat,#dats,#date{cursor:pointer;width:120px;height:35px;} #name{width:200px;height:35px;text-align:center.font-family:arial;text-transform:uppercase;} #piece{width:170px;}
input,select{height:35px;border:1px solid #eee;} #type{width:130px;height:35px;} #valider,#val{width:200px;height:35px;color:white;background-color:white;font-weight:bold;
border:2px solid #136cbd; border-radius:15px;color:#136cbd}
form{height:400px;background-color:#F0F8FF;padding-top:5px;}
#result,#results{display:none;}.h2{font-family:arial;font-size:12px;} .dir{padding-left:7%;font-family:arial;text-transform:uppercase;} #dirs,#dir{margin-top:2px;background-color:white;color:black;border:1px solid white;
font-family:arial;cursor:pointer;} .dirs{padding-left:8%;font-family:arial;text-transform:uppercase;}
.montant{width:90px;padding-left:2%} .remove,.remov{background-color:white;color:#FF4500;border:2px solid white;}

 #depense{font-family:arial;font-isze:12px;width:120px;height:35px;background-color:green;color:white;border:2px solid green;font-size:12px;margin-left:8%;}
#credit{font-family:arial;font-isze:12px;width:120px;height:35px;background-color:green;color:white;border:2px solid green;font-size:12px;margin-left:13%;}
#affiche,#affich{position:absolute;left:7%;top:300px;}
#fournisseur,#designation,#ti,#fournisse,#designati,#tis{margin-top:3px;padding-left:2%;border:1px solid #eee;} #monts{display:none;position:absolute;left:75%;top:120px;width:280px;height:250px;
background-color:white;box-shadow:2px 2px 2px 2px grey;padding-top:15px;z-index:1;}.rrt{margin-top:25px;margin-left:10%;font-family:arial;font-size:16px;}
.ct{display:none;} .cli{padding-left:25%;color:green;font-size:20px;font-weight:700;font-family:arial;} .clic{padding-left:8%;} .cl{padding-left:17%;color:#136cbd;font-size:18px;font-weight:700} .cic{padding-left:4%;}
#resus{display:none;position:absolute;left:18%;top:70px;z-index:3;background-color:white;border:2px solid white;width:690px;height:560px;} #pag{position: fixed;top: 0;left: 0;width:100%;height: 100%;background-color: black;z-index:2;opacity: 0.6;display:none;}
#form3{background-color:white;} .titre{font-family:arial;text-align:center;text-transform:uppercase;color:#00BFFF;font-weight:700;}
#vas{width:200px;height:35px;border-radius:15px;background-color:#136cbd;border:2px solid #136cbd;color:white;font-size:13px;text-transform:uppercase;}
#veri{display:none;position:absolute;left:25%;top:80px;z-index:2;width:520px;background-color:white;border:2px solid white;}
#form4{background-color:white;} .backs{font-family:arial;font-size:12px;text-transform:uppercase;}.dis{padding-left:3%;}
#recher{width:200px;height:35px;margin-left:30%;margin-top:20px;background-color:#136cbd;color:white;font-size:13px;font-weight:bold;border:2px solid #136cbd; 
border-radius:15px;font-family:arial;}

}


@media (min-width: 992px) and (max-width: 1199.98px) { 
#first{width:100%;height:70px;background-color:white;box-shadow:3px 3px 3px grey;padding-top:20px;padding-left:2%;position:fixed;}
.it{padding-left:3%;} a{color:black;font-family:arial;font-size:11px;text-decoration:none;text-transform:uppercase;}
.home{background-color:#F0F8FF;padding:1%;font-family:arial;font-size:12px;border-radius:15px;}
#second{width:100%;} .box,.box1,.box3{float:left;margin-left:4%;}
.second1{background-color:white;width:90%;height:90px;margin-left:5%;margin-top:10px;padding-top:20px;box-shadow:3px 3px 3px grey;margin-top:75px;}
.box{font-family:arial;font-size:14px;color:#136cbd;font-weight:bold;text-transform:uppercase;} 
#button1{margin-left:12%;width:150px;height:25px;background-color:#4682B4;color:white;padding:2%;border-radius:15px;font-family:arial;
font-size:12px;border:2px solid #4682B4;cursor:pointer;}.box1{width:30%;} .box3{margin-left:8%;font-family:arial;margin-top:-12px;}
.bos1,.bos2{float:left;} .bos1{width:35%;} .bos2{width:60%;}
#three{width:100%;} .three1{width:90%;height:60px;background-color:#F0F8FF;margin-left:5%;}
.boss1,.boss2{float:left;margin-left:2%;padding-top:7px;} .boss1{width:35%;font-family:arial;} .boss2{width:57%;font-family:arial;font-size:11px;text-transform:uppercase;} .clis{padding-left:3%;} .reser{padding-left:6%;cursor:pointer;}
.dim{padding-left:5%;cursor:pointer;} #four{width:100%;} .four1{width:90%;height:600px;background-color:white;margin-left:5%;margin-top:5px;box-shadow:3px 3px 3px grey;} .x{font-size:12px;width:100px;}
#footer{width:100%;margin-top:5px;} .ocd{width:90%;height:25px;background-color:white;margin-left:5%;font-family:arial;text-align:center;}
.clis{font-family:arial;text-transform:uppercase;font-size:11px;} #dec{background-color:white;color:blue;margin-left:3%;height:25px;border-radius:15px;}
#corps1,#corps2{float:left;} #corps1{width:60%;height:300px;} #corps2{width:35%;}
h1{font-family:arial;font-size:12px;margin-left:1%;width:90%;text-align:center;text-transform:uppercase;border-bottom:1px solid #eee;padding-bottom:3px;color:#136cbd;}
h2{font-family:arial;font-size:11px;margin-left:1%;width:95%;text-align:center;text-transform:uppercase;border-bottom:1px solid #eee;padding-bottom:3px;color:#136cbd;}
#sejour,#pass{width:20%;height:25px;background-color:#eee;color:black}.bir{font-family:arial;font-size:13px;padding-left:2%;}
.back{margin-top:50px;} #dat,#dats,#date{cursor:pointer;width:120px;height:35px;} #name{width:200px;height:35px;text-align:center.font-family:arial;text-transform:uppercase;} #piece{width:170px;}
input,select{height:35px;border:1px solid #eee;} #type{width:130px;height:35px;} #valider,#val{width:200px;height:35px;color:white;background-color:white;font-weight:bold;
border:2px solid #136cbd; border-radius:15px;color:#136cbd}
form{height:400px;background-color:#F0F8FF;padding-top:5px;}
#result,#results{display:none;}.h2{font-family:arial;font-size:12px;} .dir{padding-left:7%;font-family:arial;text-transform:uppercase;} #dirs,#dir{margin-top:2px;background-color:white;color:black;border:1px solid white;
font-family:arial;cursor:pointer;} .dirs{padding-left:8%;font-family:arial;text-transform:uppercase;}
.montant{width:90px;padding-left:2%} .remove,.remov{background-color:white;color:#FF4500;border:2px solid white;}

 #depense{font-family:arial;font-isze:12px;width:120px;height:35px;background-color:green;color:white;border:2px solid green;font-size:12px;margin-left:8%;}
#credit{font-family:arial;font-isze:12px;width:120px;height:35px;background-color:green;color:white;border:2px solid green;font-size:12px;margin-left:13%;}
#affiche,#affich{position:absolute;left:7%;top:300px;}
#fournisseur,#designation,#ti,#fournisse,#designati,#tis{margin-top:3px;padding-left:2%;border:1px solid #eee;} #monts{display:none;position:absolute;left:75%;top:120px;width:280px;height:250px;
background-color:white;box-shadow:2px 2px 2px 2px grey;padding-top:15px;z-index:1;}.rrt{margin-top:25px;margin-left:10%;font-family:arial;font-size:16px;}
.ct{display:none;} .cli{padding-left:25%;color:green;font-size:20px;font-weight:700;font-family:arial;} .clic{padding-left:8%;} .cl{padding-left:17%;color:#136cbd;font-size:18px;font-weight:700} .cic{padding-left:4%;}
#resus{display:none;position:absolute;left:18%;top:70px;z-index:3;background-color:white;border:2px solid white;width:690px;height:560px;} #pag{position: fixed;top: 0;left: 0;width:100%;height: 100%;background-color: black;z-index:2;opacity: 0.6;display:none;}
#form3{background-color:white;} .titre{font-family:arial;text-align:center;text-transform:uppercase;color:#00BFFF;font-weight:700;}
#vas{width:200px;height:35px;border-radius:15px;background-color:#136cbd;border:2px solid #136cbd;color:white;font-size:13px;text-transform:uppercase;}
#veri{display:none;position:absolute;left:25%;top:80px;z-index:2;width:520px;background-color:white;border:2px solid white;}
#form4{background-color:white;} .backs{font-family:arial;font-size:12px;text-transform:uppercase;}.dis{padding-left:3%;}
#recher{width:200px;height:35px;margin-left:30%;margin-top:20px;background-color:#136cbd;color:white;font-size:13px;font-weight:bold;border:2px solid #136cbd; 
border-radius:15px;font-family:arial;}
}

@media (min-width: 1200px) { 
#first{width:100%;height:70px;background-color:white;box-shadow:3px 3px 3px grey;padding-top:20px;padding-left:2%;position:fixed;}
.it{padding-left:3%;} a{color:black;font-family:arial;font-size:11px;text-decoration:none;text-transform:uppercase;}
.home{background-color:#F0F8FF;padding:1%;font-family:arial;font-size:12px;border-radius:15px;}
#second{width:100%;} .box,.box1,.box3{float:left;margin-left:4%;}
.second1{background-color:white;width:90%;height:90px;margin-left:5%;margin-top:10px;padding-top:20px;box-shadow:3px 3px 3px grey;margin-top:75px;}
.box{font-family:arial;font-size:14px;} 
#button1{margin-left:12%;width:150px;height:25px;background-color:#4682B4;color:white;padding:2%;border-radius:15px;font-family:arial;
font-size:12px;border:2px solid #4682B4;cursor:pointer;}.box1{width:30%;} .box3{margin-left:8%;font-family:arial;margin-top:-12px;}
.bos1,.bos2{float:left;} .bos1{width:35%;} .bos2{width:60%;}
#three{width:100%;} .three1{width:90%;height:60px;background-color:#F0F8FF;margin-left:5%;}
.boss1,.boss2{float:left;margin-left:2%;padding-top:7px;} .boss1{width:35%;font-family:arial;} .boss2{width:57%;font-family:arial;font-size:11px;text-transform:uppercase;} .clis{padding-left:3%;} .reser{padding-left:6%;cursor:pointer;}
.dim{padding-left:5%;cursor:pointer;} #four{width:100%;} .four1{width:90%;height:600px;background-color:white;margin-left:5%;margin-top:5px;box-shadow:3px 3px 3px grey;} .x{font-size:12px;width:100px;}
#footer{width:100%;margin-top:5px;} .ocd{width:90%;height:25px;background-color:white;margin-left:5%;font-family:arial;text-align:center;}
.clis{font-family:arial;text-transform:uppercase;font-size:11px;} #dec{background-color:white;color:blue;margin-left:3%;height:25px;border-radius:15px;}

}

   
	
  </style>
  </head>
<body style="background-color:#eee">

<div class="container" id="first"> 
 <div class="bos1"><span class="is"><img src="image/logo.jpg" alt="logo" withd="50" height="30"/> <span class="home"><?php 
 
   try{
	   
      // on ecrire la reuete sql pour recuperer le nom
	  $req=$bdd->prepare('SELECT Denomination,numero FROM inscription_client WHERE numero_compte= :numero_compte');
     $req->execute(array(':numero_compte'=>$_SESSION['pose']));
     $donnees= $req->fetch();
	echo'<span class="erf">Entreprise : '.$donnees['Denomination'].' TEL :'.$donnees['numero'].'</span>';
	$req->closeCursor();
   } 
  catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}  
?>
 </span></div><div class="bos2"> <span></span><span class="it"><a href="gestion_home_tab.php" title="suivi de gestion client et location chambre">Tableau bord entrées/réservations</a></span>
<span class="it"> <a href="gestion_home_ocd.php" title="suivi intéreactif des achats/crédit">Tableau bord dépenses</a></span>
<span class="it"><a href="gestion_depeses_ocd.php">Tableau bord Trésorie </a></span>

<span class="dec"><a href="deconnexion.php" title="Quitter sur la plateforme"><button id="dec" style="font-size:14px">Se deconnecter</button></a></span></div>
</div><!--contenair--#id first-->
	
<div class="container" id="second"> 
<div class="second1">
<div class="box"><i class="material-icons" style="color:green;">check_circle</i> La reservation de votre client à été bien enregistrée</div>
<div class="box1"><a href="acceuil_gestion_hotel.php"><i class="material-icons" style="font-size:20px;color:#00BFFF;">home</i>Acceuil</a> <button style="font-size:24px;margin-left:62%;width:14%;height:30px;background-color:#00BFFF;color:white;border:2px solid #00BFFF" title="reinitialiser vos montants"> <i class="material-icons">replay</i></button></div>
<div class="box3"> Vos Montants <span class="des"><i class="material-icons" style="color:#4682B4;font-size:22px;cursor:pointer;" title="recette/entrées/reservations/dépense">&#xe8de;</i></span><span class="ct"><i class="material-icons" style="color:#4682B4;font-size:22px;cursor:pointer;";>clear</i></div></span> <div id="monts"> </div></div>
</div>
</div><!--contenair--#id second-->
	
<div class="container" id="three"> 

</div><!--contenair--#id second-->


<div class="container" id="four"> 


</div><!--contenair--#id second-->




<div id="footer">
<div class="ocd">Optimisation de comptabilité à distance : Dynamiser et innover efficacement le suivi et la gestion de vos biens Hoteliers</div>
</div>

<?php include('inc_foot_scriptjs.php');?>



</body>
</html>
    
