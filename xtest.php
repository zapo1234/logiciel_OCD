<?php
include('connecte_db.php');
include('inc_session.php');

   $bd = new PDO('mysql:host=localhost;dbname=hotel_gestion', 'root','');

 function select_box($bd){
	 
    $output = '';
	$req=$bd->prepare('SELECT id,chambre FROM chambre WHERE email_ocd= :email_ocd');
    $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
    
   while($donnees = $req->fetch())
	{
	   echo'<option value="'.$donnees['id'].'">'.$donnees['chambre'].'</option>';  
	}
	
   }
	 
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

.tic{background-color:green;color:white;font-weight:18px;border:2px solid green;}
tr{background-color:#eee;padding:1%;margin:1%;width:95%;margin-top:5px;} .zap{width:80px;}

.th{padding-left:4%;color:black;font-size:25px;font-family:arial;font-weight:600;text-transform:capitalize;}
.tc{font-size:20px;} .add{background-color:white;} .clic{text-align:center;border:2px solid green;background-color:green;color:white;width:250px;height:45px;border-radius:15px;margin-bottom:10px;}



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
#resultat{padding:1%;display:none;z-index:4;left:5%;width:85%;position:absolute;left:15%;top:100px;height:500px;overflow-y:scroll;background-color:white;}
.tic{background-color:green;color:white;font-weight:18px;border:2px solid green;}
tr{background-color:#eee;padding:1%;width:95%;margin-top:5px;} .zap{width:80px;}

}

@media (min-width: 1200px) { 
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
input,select{height:35px;border:1px solid #eee;} #type{width:130px;height:35px;} .valider,#val{width:200px;height:35px;color:white;background-color:white;font-weight:bold;
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
#resus{display:none;position:absolute;left:18%;top:70px;z-index:3;background-color:white;border:2px solid white;width:710px;height:560px;} #pag{position: fixed;top: 0;left: 0;width:100%;height: 100%;background-color: black;z-index:2;opacity: 0.6;display:none;}
#form3{background-color:white;} .titre{font-family:arial;text-align:center;text-transform:uppercase;color:#00BFFF;font-weight:700;}
#vas{width:200px;height:35px;border-radius:15px;background-color:#136cbd;border:2px solid #136cbd;color:white;font-size:13px;text-transform:uppercase;}
#va{width:200px;height:35px;border-radius:15px;background-color:#136cbd;border:2px solid #136cbd;color:white;font-size:13px;text-transform:uppercase;margin-left:70%;margin-top:30px}
#veri{display:none;position:absolute;left:25%;top:80px;z-index:2;width:560px;background-color:white;border:2px solid white;padding-top:30px;}
#form4{background-color:white;height:140px;} .backs{font-family:arial;font-size:12px;text-transform:uppercase;}.dis{padding-left:3%;}
#recher{width:200px;height:35px;margin-left:30%;margin-top:20px;background-color:#136cbd;color:white;font-size:13px;font-weight:bold;border:2px solid #136cbd; 
border-radius:15px;font-family:arial;} #nums{width:70px;} #aff{position:absolute;left:15%;top:280px;font-family:arial;font-size:14px;width:450px;height:25px;z-index:2}
#nu,#nms {width:90px;} .sub{display:none;position:absolute;top:270px;left:10%;z-index:3;box-shadow:3px 3px 3px grey;width:350px;height:50px;background-color:white}
.der{position:absolute;z-index:3;background-color:#136cbd;color:white;border:2px solid #136cbd;}
#aff a{font-family:arial;font-size:14px;} #error{margin-left:10%;font-family:arial;font-size:12px;color:grey;}
#size1,#size{height:0px;}  .tt{position:absolute;top:360px;left:61%;margin-top:25px;font-family:arial;border:1px solid #eee;padding:2%;}
.ts{position:absolute;top:360px;left:77%;margin-top:25px;font-family:arial;border:1px solid #eee;padding:2%;}
#idt,#idh,.idt,.idh{font-size:20px;color:#00BFFF;font-weight:700;width:80px;}
#resultat{padding:1%;display:none;z-index:4;left:5%;width:85%;position:absolute;top:100px;height:500px;overflow-y:scroll;background-color:white;}
.tic{background-color:green;color:white;font-weight:18px;border:2px solid green;}
tr{background-color:#eee;padding:1%;margin:1%;width:95%;margin-top:5px;} .zap{width:80px;}

.th{padding-left:4%;color:black;font-size:25px;font-family:arial;font-weight:600;text-transform:capitalize;}
.tc{font-size:20px;} .add{background-color:white;} .clic{border:2px solid green;background-color:green;color:white;width:250px;height:45px;border-radius:15px;margin-bottom:10px;}
.designation{width:200px;} .enre{position:absolute;} .df{display:none;}
}

   
	
  </style>
  </head>
<body style="background-color:#eee">

<div class="container" id="first"> 
 <div class="bos1"><span class="is"><img src="image/logo.jpg" alt="logo" withd="50" height="30"/> <span class="home"><?php 
 
   try{
	   
      // on ecrire la reuete sql pour recuperer le nom
	  $req=$bdd->prepare('SELECT Denomination,numero FROM inscription_client WHERE email_ocd= :email_ocd');
     $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
     $donnees= $req->fetch();
	echo'<span class="erf">Entreprise : '.$donnees['Denomination'].' TEL :'.$donnees['numero'].'</span>';
	$req->closeCursor();
   } 
  catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}  
?>
 </span></div><div class="bos2"> <span></span><span class="it"><a href="gestion_home_tab.php" title="visualisez les actions">Bord entrées/réservations/action</a></span>
<span class="it"> <a href="gestion_home_ocd.php" title="suivi intéreactif des achats/crédit">Bord dépenses</a></span>
<span class="it"><a href="gestion_depeses_ocd.php">Tableau bord Trésorie </a></span>

<span class="dec"><a href="deconnexion.php" title="Quitter sur la plateforme"><button id="dec" style="font-size:14px">Se deconnecter</button></a></span></div>
</div><!--contenair--#id first-->
	
<div class="container" id="second"> 
<div class="second1">
<div class="box">Dynamiser et innover  vos enregsitrements <br/>entrées/reservations/gestion des espaces Hoteliers </div>
<div class="box1"><a href="acceuil_gestion_hotel.php"><i class="material-icons" style="font-size:20px;color:#00BFFF;">home</i>Acceuil</a> <button style="font-size:24px;margin-left:62%;width:14%;height:30px;background-color:#00BFFF;color:white;border:2px solid #00BFFF" title="reinitialiser vos montants"> <i class="material-icons">replay</i></button></div>
<div class="box3"> Vos Montants <span class="des"><i class="material-icons" style="color:#4682B4;font-size:22px;cursor:pointer;" title="recette/entrées/reservations/dépense">&#xe8de;</i></span><span class="ct"><i class="material-icons" style="color:#4682B4;font-size:22px;cursor:pointer;";>clear</i></div></span> <div id="monts"> </div></div>
</div>
</div><!--contenair--#id second-->
<div id="montant"></div>	
<div class="container" id="three"> 
<div class="three1">
<div class="boss1"><i class="material-icons">&#xe873;</i> <a href="gestion_description_home.php"> Lister vos appartements</a> 
<span class="clis"><i class="material-icons" style="font-size:18px">&#xe3c9;</i> Enregistrer vos locations </span></div>

<div class="boss2"><button class="x" id="sejour">Séjour</button> <button class="v" id="pass">Pass</button> <span class="reser">
<i class="material-icons">&#xe914;</i> Réservation</span> <span class="dim">vérifier des disponibilités <i class="material-icons">&#xe876;</i></span></div>

</div><!--three1-->

</div><!--contenair--#id second-->


<div class="container" id="four"> 
<div class="four1">
<div id="corps1">
<h1>enregistrer  la location du client (séjour/pass) vérifier des disponibilités avants</h1>
<div id="result">   
<form method="post" id="form1" action="">
<div class="back"><span class="bir">Date <input type="date" name="dat" id="dat" Required></span><span class="bir"><input type="text" name="name" id="name" placeholder="Nom du client" Required/><span class="bir">Pièce (NAT/n°): <input type="text" name="piece" id="piece" placeholder="CNI/N°2345872" required/> </span>
 <br/><br/><span class="bir"> Télephone: <input type="number" name="number" id="number" placeholder="numero tel" required> </span> </div>
<div class="back"><span class="bir"><select name="chambre[]" id="chambre1" required > <option value="">Choisir votre hebergement</option>
<?php echo select_box($bd);?>
</select> <span class="bir">check in/entrée <input type="date" name="date[]" id="date1" required></span><span class="bir">Checkout/sortie:<input type="date" name="dats[]" id="dats1"  required/></span></div>
<div class="back"><span class="bir">Nombre/jours <input type="number" class="zap" name="num[]" id="num1" min="1" required></span><span class="bir">Tarifs/unitaire:<input type="number" class="zap" name="nam[]" id="nam1" min="1" /></span><span class="bir"> Total :<input type="number" class="zaps" name="totale[]" id="totale1" min="1" readonly></div>
j<span class="bir">TVA <input type="number" class="zap" name="nu[]" id="nu1" required></span></div>
<input type="hidden" id="val1" value="1">
<div id="resultat">

<table id="ts">
<tr>
<td><button type="button" class="tic">+</button></td>
<td class="back"><span class="bir"><select name="chambre[]" id="chambre2"> <option value="">Choisir votre hebergement</option>
<?php echo select_box($bd);?>
</select> <span class="bir">check in/entrée <input type="date" name="date[]" id="date2"></span><span class="bir">Checkout/sortie:<input type="date" name="dats[]" id="dats2"></span>
<span class="bir">Nombre/jours <input type="number" class="zap" name="num[]" id="num2" min="1"></span><span class="bir">Tarifs/unitaire:<input type="number" class="zap" name="nam" id="nam2" min="1" /></span><span class="bir"> Total :<input type="number" class="zaps" name="totale" id="totale2" min="1">
<span class="bir"> + Repas :<select id="type2" name="type[]" ><option value="sans">sans</option><option value="petit">Petit dejeuner</option><option value="dejeuner">déjeuner</option><option value="diner">diner</option></select><span class="bir">TVA <input type="number" class="zap" name="nu[]" id="nu2"></span></td>
<input type="hidden" id="val2" value="2">
</tr>
<tr>
<td><button type="button" class="tic">+</button></td>
<td class="back"><span class="bir"><select name="chambre[]" id="chambre3" > <option value="">Choisir votre hebergement</option>
<?php echo select_box($bd);?>
</select> <span class="bir">check in/entrée <input type="date" name="date[]" id="date3"></span><span class="bir">Checkout/sortie:<input type="date" name="dats[]" id="dats3"></span>
<span class="bir">Nombre/jours <input type="number" class="zap" name="num[]" id="num3" min="1"></span><span class="bir">Tarifs/unitaire:<input type="number" class="zap" name="nam[]" id="nam3" min="1" /></span><span class="bir"> Total :<input type="number" class="zaps" name="totale[]" id="totale3" min="1">
<span class="bir"> + Repas :<select  id="type3" name="type[]" ><option value="sans">sans</option><option value="petit">Petit dejeuner</option><option value="dejeuner">déjeuner</option><option value="diner">diner</option></select><span class="bir">TVA <input type="number" class="zap" name="nu[]" id="nu3"></span></td>
<input type="hidden" id="val3" value="3">
</tr>

<tr>
<td><button type="button" class="tic">+</button></td>
<td class="back"><span class="bir"><select name="chambre[]" id="chambre4"> <option value="">Choisir votre hebergement</option>
<?php echo select_box($bd);?>
</select> <span class="bir">check in/entrée <input type="date" name="date[]" id="date4"></span><span class="bir">Checkout/sortie:<input type="date" name="dats[]" id="dats4"></span>
<span class="bir">Nombre/jours <input type="number" class="zap" name="num[]" id="num4" min="1"></span><span class="bir">Tarifs/unitaire:<input type="number" class="zap" name="nam[]" id="nam4" min="1" /></span><span class="bir"> Total :<input type="number" class="zaps" name="totale[]" id="totale4" min="1" readonly>
<span class="bir"> + Repas :<select name="type" id="type4" name="type[]" ><option value="sans">sans</option><option value="petit">Petit dejeuner</option><option value="dejeuner">déjeuner</option><option value="diner">diner</option></select><span class="bir">TVA <input type="number" class="zap" name="nu" id="nu4"></span></td>
<input type="hidden" id="val4" value="4">
</tr>

<tr>
<td><button type="button" class="tic">+</button></td>
<td class="back"><span class="bir"><select name="chambre[]" id="chambre5"> <option value="">Choisir votre hebergement</option>
<?php echo select_box($bd);?>
</select> <span class="bir">check in/entrée <input type="date" name="date[]" id="date5"></span><span class="bir">Checkout/sortie:<input type="date" name="dats[]" id="dats5"></span>
<span class="bir">Nombre/jours <input type="number" class="zap" name="num[]" id="num5" min="1"></span><span class="bir">Tarifs/unitaire:<input type="number" class="zap" name="nam[]" id="nam5" min="1" /></span><span class="bir"> Total :<input type="number" class="zaps" name="totale[]" id="totale5" min="1" readonly>
<span class="bir"> + Repas :<select  id="type5" name="type[]" ><option value="sans">sans</option><option value="petit">Petit dejeuner</option><option value="dejeuner">déjeuner</option><option value="diner">diner</option></select><span class="bir">TVA <input type="number" class="zap" name="nu[]" id="nu5"></span></td>
<input type="hidden" id="val5" value="5">
</tr>


<tr class="df">
<td><button type="button" class="tic">+</button></td>
<td class="back"><span class="bir"><select name="chambre[]" id="chambre"> <option value="">Choisir votre hebergement</option>
<?php echo select_box($bd);?>
</select> <span class="bir">check in/entrée <input type="date" name="date" id="date5"></span><span class="bir">Checkout/sortie:<input type="date" name="dats[]" id="dats5"></span>
<span class="bir">Nombre/jours <input type="number" class="zap" name="num[]" id="num5" min="1"></span><span class="bir">Tarifs/unitaire:<input type="number" class="zap" name="nam[]" id="nam5" min="1" /></span><span class="bir"> Total :<input type="number" class="zaps" name="totale[]" id="totale5" min="1" readonly>
<span class="bir"> + Repas :<select  id="type5" name="type[]" ><option value="sans">sans</option><option value="petit">Petit dejeuner</option><option value="dejeuner">déjeuner</option><option value="diner">diner</option></select><span class="bir">TVA <input type="number" class="zap" name="nu[]" id="nu5"></span></td>
<input type="hidden" id="val5" value="5">
</tr>

<tr class="df">
<td><button type="button" class="tic">+</button></td>
<td class="back"><span class="bir"><select name="chambre[]" id="chambre6"> <option value="">Choisir votre hebergement</option>
<?php echo select_box($bd);?>
</select> <span class="bir">check in/entrée <input type="date" name="date[]" id="date6"></span><span class="bir">Checkout/sortie:<input type="date" name="dats" id="dats6"></span>
<span class="bir">Nombre/jours <input type="number" class="zap" name="num[]" id="num6" min="1"></span><span class="bir">Tarifs/unitaire:<input type="number" class="zap" name="nam[]" id="nam6" min="1" /></span>
</tr>

</table>
<input type="button" value="retour validation" id="va"/>
</div>
l

<div class="back"> <span class="bir"><button type="button" class="plus" title="facturer au plus 6appt">+ajouter</button> <input type="button" value="valider" class="valider"/> <div class="sub"> Avez vous bien vérifié les informations clients?<input type="submit" value="enregistrer" class="der"/></div>
<span class="th">total facture :<input type="text" name="total" id="total"></span><span class="tc">XOF</span></div>
<input type="hidden" name="token" id="token" value="<?php
//Le champ caché a pour valeur le jeton
echo $_SESSION['token'];?>">


</form>
</div>

<div id="results">
<form method="post" id="form2" action="">
<div class="back"><span class="bir">Date <input type="date" name="da[]" id="da" Required></span><span class="bir"><input type="text" name="names" id="names" placeholder="Nom du client" Required><span class="bir">Pièce (NAT/n°): <input type="text" name="piec" id="piec" placeholder="CNI/N°2345872" required/> </span>
<br/><br/><span class="bir"> Télephone: <input type="numbr" name="numbr[]" id="numbr2" placeholder="numero tel" required/></div>
<div class="back"><span class="bir"><select name="chambres[]" id="chambres" required > <option value="">Choisir votre hebergement</option>
<?php echo select_box($bd);?>
</select> <span class="bir">check in/entrée <input type="time" name="tim[]" id="tim2" required></span><span class="bir">Checkout/sortie:<input type="time" name="tis" id="tis2"></span></div>
<div class="back"><span class="bir">Nombre/Heures <input type="number" class="zap" name="nums[]" id="nums" min="1" required></span><span class="bir">Tarifs/unitaire:<input type="number" class="zap" name="nams[]" id="nams2" min="1" /></span><span class="bir"> Total :<input type="number" class="zap" name="total" id="total2" min="1"></div>
<div class="back"><span class="bir"> + Repas :<select name="typ[]" id="typ"  required ><option value="san">sans</option><option value="peti">Petit dejeuner</option><option value="dejeun">déjeuner</option><option value="dine">diner</option></select><span class="bir">TVA <input type="number" class="zap" name="nus[]" id="nus2"></span> 
<span class="bir"> <input type="button" value="valider" class="valider"/><div class="sub"> Avez vous bien vérifié les informations clients?<input type="submit" value="enregistrer" class="der"/></div></div>
<div></div>
<input type="hidden" name="token" id="token" value="<?php
//Le champ caché a pour valeur le jeton
echo $_SESSION['token'];?>">
</form>

</div>
<div id="aff"></div>
</div>
<div id="corps2"><h2>Ajouter des dépenses achats-crédits fournisseurs</h2>
<div class="h2"><span class="dir">Ajouter/Achats</span> <button id="dir"><i class="material-icons" style="font-size:24px;color:green">add_circle_outline</i></button> 
</div>
<div>

<form id="size" method="post" action="">
<div class="tt">Total S/A :<input type="text" name="idt" id="idt"></span><span class="idt">XOF</span></div>
<div><span id="errors"></span></div>
<table  id="affiche">

</table>
<div id="add"></div>
</form>

<div id="result_depense"></div><!--retour ajax--->
<div id="erros"></div>
</div>


</div>

</div><!--contenair--#id second-->
<div id="pag"><div class="xee"><i class="material-icons" style="font-size:26px;cursor:pointer;color:white;position:fixed;left:80%;cursor:pointer;top:40px;z-index:5;font-weight:700;">clear</i></div></div>
<!--formulaire de reservations--#id second-->
<div id="resus">
<form method="post" id="form3" action="reservation_locales.php">

<div class="titre">Réservez votre locale en remplissant le formulaire de réservation</div>
<div id="error"></div>
<div class="back"><span class="bir">Date <input type="date" name="da" id="da1" required></span><span class="bir"><input type="text" name="nom" id="nom" placeholder="Nom du client" Required/><span class="bir">Pièce (NAT/n°): <input type="text" name="pice" id="pice" placeholder="CNI/N°2345872" required/> </span>
<br/><br/><span class="bir">Numéro/tel <input type="number" name="nume" id="nume1" required></div>
<div class="back"><span class="bir"><select name="chambr" id="chambr"> <option value="">Choisir votre hebergement</option>
<?php echo select_box($bd);?>
</select> <span class="bir">check in/entrée <input type="date" name="dims[]" id="dims1" required></span><span class="bir">Checkout/sortie:<input type="date" name="tise" id="tise"  required/></span></div>
<div class="back"><span class="bir">Nombre/jours <input type="number" class="zap" name="nms[]" id="nms1"  min="1" required></span><span class="bir">Tarifs/unitaire:<input type="number" name="naams" id="naams1" min="1" /></span><span class="bir"> Total :<input type="number" name="tot" id="tot"></div>
<div class="back"><span class="bir">Montant avancé <input type="number" class="zap" name="nmsi[]" id="nmsi1" min="1" required ></span><span class="bir">Reste à payer<input type="number" name="aams" id="aams1" min="1" /></span></div>
<div class="back"><span class="bir"> + Repas :<select name="typs[]" id="typs"  required ><option value="san">sans</option><option value="eti">Petit dejeuner</option><option value="dejeun">déjeuner</option><option value="dine">diner</option></select><span class="bir">TVA <input type="number" class="zap" name="us" id="us1"></span> 
<span class="bir"> <input type="button" value="reservation" id="vas"/></div>
<div></div>
<input type="hidden" name="token" id="token" value="<?php
//Le champ caché a pour valeur le jeton
echo $_SESSION['token'];?>">

</form>

</div>
<!--formulaire de reservations--#id second-->
<div id="veri">
<div class="titre">Vérifier la disponibilité de vos chambres à des dates précises</div>

<form method="post" id="form4" action="disponibilite_chambre_ocd.php">
<div class="backs"><span class="dis">Cheick in/entrée :<input type="date" id="fis" name="fis" required/></span> <span class="dis">Check out/sortie :<input type="date" name="fls" id="fls" required/></div>
<div class="backs"><input type="submit" value="rechercher" id="recher"/></div>
<input type="hidden" name="token" id="token" value="<?php
//Le champ caché a pour valeur le jeton
echo $_SESSION['token'];?>">
</form>
</div>


<div id="footer">
<div class="ocd">Optimisation de comptabilité à distance : Dynamiser et innover efficacement le suivi et la gestion de vos biens Hoteliers</div>
</div>

<?php include('inc_foot_scriptjs.php');?>

<script type="text/javascript">
$(document).ready(function(){
var today = new Date().toISOString().split('T')[0];
 document.getElementsByName("date")[0].setAttribute('min', today);
 
 var todays = new Date().toISOString().split('T')[0];
  document.getElementsByName("dats")[0].setAttribute('min', todays);
 
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
	
	
$('.x').click(function() {
// on click sur un bouton
var html="";
// on effectue du css
 $('#sejour').css('background-color','white');
 $('#sejour').css('color','green');
 $('#sejour').css('border-color','white');
 $('#sejour').css('border-radius','15px');
 $('#sejour').css('width','20%');
 $('#sejour').css('font-weight','bold');
 $('#sejour').css('height','30px');
 $('#pass').css('background-color','#eee');
 $('#pass').css('color','black');
 $('#pass').css('border-color','#eee');
 $('#pass').css('border-radius','0px');
 $('#pass').css('width','20%');
 $('#pass').css('font-weight','300');
 $('#pass').css('height','30px');
 $('#affiche').css('display','none');

$('#result').fadeIn(500);
 $('#results').css('display','none');
 })	
 
 $('.v').click(function(){
	var htmls="";
// on effectue du css
 $('#pass').css('background-color','white');
 $('#pass').css('color','green');
 $('#pass').css('border-color','white');
 $('#pass').css('border-radius','15px');
 $('#pass').css('width','20%');
 $('#pass').css('font-weight','bold');
 $('#pass').css('height','30px');
 $('#sejour').css('background-color','#eee');
 $('#sejour').css('color','black');
 $('#sejour').css('border-color','#eee');
 $('#sejour').css('border-radius','0px');
 $('#sejour').css('width','20%');
 $('#sejour').css('font-weight','300');
 $('#sejour').css('height','30px'); 
 
$('#result').css('display','none');
  $('#results').fadeIn(500);
 })


var cont = 0;
$(document).on('click','#dir', function(){


var html = '';
 cont = cont +1;
html += '<tr class="dir" id ="row_id_'+cont+'">';
html += '<td><input type="date" class="date" id="ti" name="ti[]"/></td>';
html +='<td><input type="text" class="designation" id="designation" name="designation[]" placeholder="Désignation"/></td>';
html +='<td><input type="text" class="fournisseur" id="fournisseur" name="fournisseur[]" placeholder="fournisseur"/></td>';	
html +='<td><select name="des[]" id="des"><option value="1">dépense effectué</option><option value="2">crédit fournisseur</option></select></td>';	
html +='<td><input type="number" class="montant" id="montant'+cont+'" name="montant[]" placeholder="Montant"/></td>';
html +='<td><button class="remove" name="remove" id="'+cont+'"><i class="material-icons" style="font-size:25px">highlight_off</i></button></td>';
html +='</tr>';

$('#affiche').append(html);
$('#result').css('display','none');
$('#results').css('display','none');
$('#affiche').css('display','block');
$('#add').html('<button type="submit" class="clic">Enregistrer vos dépenses</button>');
});


$(document).on('click','.remove', function(){
var id = $(this).attr("id");
$('#row_id_' +id).remove();
cont--;
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
}

$(document).on('blur','.montant',function() {
calcul();	
});

function calculs() {

 var totale = 0;
 var total_items=0;
 for(j=1; j<7; j++) {
 var mont = 0;
  mont = $('#totale'+j).val();
 if(mont > 0) {

totale = parseFloat(totale)+ parseFloat(mont);
	
  }
 }

$('#total').val(totale);
}

$(document).on('blur','.zap',function() {
calculs();	
});

$(document).on('click','#pas', function(){
$('#name').val('');
$('#pas').css('display','none');
});

$(document).on('keyup','#nam1', function(){
var num = $('#num1').val();
var nam =$('#nam1').val();
var result = num*nam;
$('#totale1').val(result);	
});

$(document).on('keyup','#nams1', function(){
var nums = $('#nums1').val();
var nams =$('#nams1').val();
var result = nums*nams;
$('#totale1').val(result);	
});

 $(document).on('keyup','#naams1', function(){
 var nms = $('#nms1').val();
 var naams =$('#naams1').val();
 var result = nms*naams;
$('#tot1').val(result);	
});

$(document).on('keyup','#nam2', function(){
var num = $('#num2').val();
var nam =$('#nam2').val();
var result = num*nam;
$('#totale2').val(result);	
});

$(document).on('keyup','#nams2', function(){
var nums = $('#nums2').val();
var nams =$('#nams2').val();
var result = nums*nams;
$('#totale2').val(result);	
});

 $(document).on('keyup','#naams2', function(){
 var nms = $('#nms2').val();
 var naams =$('#naams2').val();
 var result = nms*naams;
$('#tot2').val(result);	
});
$(document).on('keyup','#nam3', function(){
var num = $('#num3').val();
var nam =$('#nam3').val();
var result = num*nam;
$('#totale3').val(result);	
});

$(document).on('keyup','#nams3', function(){
var nums = $('#nums1').val();
var nams =$('#nams1').val();
var result = nums*nams;
$('#total3').val(result);	
});

 $(document).on('keyup','#naams3', function(){
 var nms = $('#nms1').val();
 var naams =$('#naams1').val();
 var result = nms*naams;
$('#tot3').val(result);	
});

$(document).on('keyup','#nam4', function(){
var num = $('#num4').val();
var nam =$('#nam4').val();
var result = num*nam;
$('#totale4').val(result);	
});

$(document).on('keyup','#nams4', function(){
var nums = $('#nums4').val();
var nams =$('#nams4').val();
var result = nums*nams;
$('#totale5').val(result);	
});

 $(document).on('keyup','#naams4', function(){
 var nms = $('#nms4').val();
 var naams =$('#naams4').val();
 var result = nms*naams;
$('#tot4').val(result);	
});

$(document).on('keyup','#nam5', function(){
var num = $('#num5').val();
var nam =$('#nam5').val();
var result = num*nam;
$('#totale5').val(result);	
});


$(document).on('click','.remov', function(){
var delete_row = $(this).attr('id');
$('#' +delete_row).remove();
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

$('.xee').click(function() {
$('#pag').css('display','none');
$('#resus').css('display','none');
$('#veri').css('display','none');
$('#resultat').css('display','none');
});

$('.dim').click(function() {
$('#pag').css('display','block');
$('#veri').css('display','block');
});


$('.valider').click(function(){
$('.sub').show();
	
});

$('.der').click(function(){
$('.sub').hide();

});

$('.montant').keyup(function() {
var erreur ="";

$('#erros').text(erreur);
	
});

	
$('#form1').submit(function(e) {
	e.preventDefault();
	var donnes = $(this).serialize();
	// on lance l'apel ajax
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'enregistrer_locale.php',// on traite par la fichier
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
  
  $('#form2').submit(function(e) {
	e.preventDefault();
	var donnes = $(this).serialize();
	// on lance l'apel ajax
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'enregistrer_locales.php',// on traite par la fichier
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

$('.designation').keyup(function(){

});

$('#size').on('submit', function(event) {
  event.preventDefault();
  var regex = /^[a-zA-Z0-9éçàùèàè]{1,100}$/;	
  var form_data =$(this).serialize();
  
  $('.designation').each(function() {
	 if($(this).val()==""){
      $('#erros').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i> remplissez le champs designation');
	 }
     
	 if($(this).val().length >100){
		$('#erros').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i> le champ désignation pas plus de 100 caractères');
	 }
	 
	 if (!regex.test($(this).val())){
      $('#erros').html('erreur de syntaxe pour la désignation');
    }
	 
   });
   
  $('.montant').each(function() {
	 if($(this).val()==""){
    $('#erros').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i> remplissez le champs montant');
   }
   
   else{
	   
	  $('#erros').text(''); 
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
	  $('#affiche').find("tr:gt(0)").remove();
      	  
	  }
    });
	
	setInterval(function(){
		 $('#result_depense').html('');
	 },6000);
	
	}
    	
  });



$('#depense').click(function(){
$('#size').submit();
});
});

</script>
</body>
</html>
    
