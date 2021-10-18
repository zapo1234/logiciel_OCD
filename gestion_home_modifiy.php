<?php
include('connecte_db.php');
include('inc_session.php');

 if(!isset($_GET['id_fact'])AND !isset($_GET['code_data'])) {
	 
	 header('location:index.php');
 }
 
 // on envoi la requete
    $id_fact =$_GET['id_fact'];
	$code =$_GET['code_data'];
  // emttre la requete sur le fonction
    $req=$bds->prepare('SELECT  date,adresse,check_in,check_out,time,time1,clients,user,email_client,montant,montant_repas,types,id_fact,nombre,type,numero,piece_identite,
	civilite,tva,montant,avance,reste,nombre FROM facture WHERE code= :code AND  id_fact= :id_fact AND email_ocd= :email_ocd');
    $req->execute(array(':code'=>$code,
	                    ':id_fact'=>$id_fact,
		                ':email_ocd'=>$_SESSION['email_ocd']));
	
	$donnees = $req->fetch();
	
   // recupere les valeurs
   $clients =$donnees['clients'];
   $email =$donnees['email_client'];
   $piece = $donnees['piece_identite'];
   $numero = $donnees['numero'];
   $adresse =$donnees['adresse'];
   $date=$donnees['date'];
	
	$number =$donnees['id_fact'];
	
	// recupérer le chiffre
	$number =substr($number,2);
	
	$date1=$donnees['date'];
	$date1 = explode('-',$date1);
	$j = $date1[2];
	$mm = $date1[1];
	$an = $date1[0];
	
	$date =$j.'/'.$mm.'/'.$an;
	
	$da2=$donnees['check_in'];
	$da3=$donnees['check_out'];
	$date2 = explode('-',$da2);
	$j1 = $date2[2];
	$mm1 = $date2[1];
	$an1 = $date2[0];

    $date2 =$j1.'/'.$mm1.'/'.$an1;
	
	$date3 = explode('-',$da3);
	$j2 = $date3[2];
	$mm2 = $date3[1];
	$an2 = $date3[0];
	
	$date3 =$j2.'/'.$mm2.'/'.$an2;
	
	
	if($donnees['type']==1){
	$type="Séjour facturé";
	$types="séjour";
	$reference ='Réference client : <i class="far fa-user" style="font-size:13px;color:green;"></i><span class="de">'.$donnees['clients'].'</span> <i class="fas fa-phone" style="padding-left:4%;color:green;font-size:13px;"></i> contact :<span class="des"> '.$donnees['numero'].'</span><span class="intervalle"> <span class="intervalle"> <i class="fas fa-calendar-minus" style="font-size:13px;color:green;"></i> Arrivée le  <span class="from">'.$date2.'</span> ,  <i class="fas fa-calendar-minus" style="font-size:13px;color:green;"></i> Départ le  <span class="todate">'.$date3.'</span> </span>';	
	
	$da2=$donnees['check_in'];
	$da3=$donnees['check_out'];
	
	$type_sejour='<select id="to" class="to" name="to" required>
     <option value="séjour">séjour facturé</option>
	 <option value="horaire">horaire facturé</option>
	 <option value="réservation">réservation</option>
	 <option value="séjour">séjour facturé</option>
	 </select>';
	
	if($donnees['nombre']==1){
		$jour ='Durée : <span class="det">'.$donnees['nombre'].'heure</span>';
	}
	
	else{
		
		$jour ='Durée : <span class="det">'.$donnees['nombre'].'heures</span>';
	}
	}
	
	elseif($donnees['type']==2){
	$type="horaire facturé";
	$types="horaire";
	$da2=$donnees['time'];
	$da3=$donnees['time1'];
	$date1=$donnees['date'];
	$date1 = explode('-',$date1);
	$j = $date1[2];
	$mm = $date1[1];
	$an = $date1[0];
	
	$date =$j.'/'.$mm.'/'.$an;
	
	
	$reference ='Réference client : <i class="far fa-user" style="font-size:13px;color:green;"></i><span class="de">'.$donnees['clients'].'</span> <i class="fas fa-phone" style="padding-left:4%;color:green;font-size:13px;"></i> contact :<span class="des"> '.$donnees['numero'].'</span><span class="intervalle"> <span class="intervalle"> <i class="fas fa-calendar-minus" style="font-size:13px;color:green;"></i> Arrivée le  <span class="from">'.$da2.'</span> ,  <i class="fas fa-calendar-minus" style="font-size:13px;color:green;"></i> Départ le  <span class="todate">'.$da3.'</span> </span>';	
	
   $type_sejour = '<select id="to" class="to" name="to" required>
     <option value="horaire">horaire facturé</option>
	 <option value="séjour">séjour facturé</option>
	 <option value="réservation">réservation</option>
	 <option value="horaire">horaire facturé</option>
	 </select>';
	
	if($donnees['nombre']==1){
		$jour ='Durée : <span class="det">'.$donnees['nombre'].'jour</span>';
	}
	
	else{
		
		$jour ='Durée : <span class="det">'.$donnees['nombre'].'jours </span>';
		$reference ='Réference client : <i class="far fa-user" style="font-size:13px;color:green;"></i><span class="de">'.$date.'</span> <i class="fas fa-phone" style="padding-left:4%;color:green;font-size:13px;"></i> contact :<span class="des"> '.$date.'</span><span class="intervalle"> <span class="intervalle"> <i class="fas fa-calendar-minus" style="font-size:13px;color:green;"></i> Arrivée le  <span class="from">'.$donnees['check_in'].'</span> ,  <i class="fas fa-calendar-minus" style="font-size:13px;color:green;"></i> Départ le  <span class="todate">'.$date.'</span> </span>';	
	    $type="Réservation";
	}
	
	
	}
	
	else{
		$type="réservation";
		$types="réservation";
		$da2=$donnees['check_in'];
	    $da3=$donnees['check_out'];
		$reference ='Réference client : <i class="far fa-user" style="font-size:13px;color:green;"></i><span class="de">'.$donnees['clients'].'</span> <i class="fas fa-phone" style="padding-left:4%;color:green;font-size:13px;"></i> contact :<span class="des"> '.$donnees['numero'].'</span><span class="intervalle"> <span class="intervalle"> <i class="fas fa-calendar-minus" style="font-size:13px;color:green;"></i> Arrivée le  <span class="from">'.$date2.'</span> ,  <i class="fas fa-calendar-minus" style="font-size:13px;color:green;"></i> Départ le  <span class="todate">'.$date3.'</span> </span>';	
		
		$type_sejour='<select id="to" class="to" name="to" required>
      <option value="réservation">réservation</option>
	  <option value="horaire">horaire facturé</option>
	  <option value="séjour">séjour facturé</option>
	  <option value="réservation">réservation</option>
	   </select>';
		
		if($donnees['nombre']==1){
		$jour ='Durée : <span class="det">'.$donnees['nombre'].'jour</span>';
	}
	
	else{
		
		$jour ='Durée : <span class="det">'.$donnees['nombre'].'jours</span>';
	}
	}
	
	

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
	#panier{display:none;}
     .s{display:none;}
	 h1,select{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:18px;margin-left:8%;color:black}
    #collapse{width:300px;height:100px;padding:2%;position:fixed;top:60px;left:81%;border-shadow:3px 3px 3px black;}
    .bs{width:340px;height:300px;border:1px solid #eee;}
	.titre,.titres{text-align:center;font-family:arial;color:white;background:#224abe;border:2px solid #224abe;}
	.en{height:50px;border-bottom:1px solid #eee;} .h1{font-size:24px; text-align:center;} .encaiss{font-size:16px;font-weight:none;} .h2{margin-top:70px;margin-left:10%;} .t_monts,.t_mont,.t_mon{font-size:18px;margin-left:-20px;}
	#montant td{font-weight:none;} .butt{height:35px;border-radius:15px;padding:1.5%;width:180px;font-weight:200;background:#F026FA;color:white;font-size:20px;border:2px solid #F026FA;}
	.t_monts{color:#42FC72;} .t_mont{color:#FA2367;} .t_mon{color:#14B5FA;}
.center{background-color:#eee;width:80%;height:950px;padding:1.5%;margin-top:5px;} .inputs,.input{margin-left:5%;float:left;}
.nav-search{width:70%;} .form-select{margin-left:40%;width:200px;height:43px;}
.inputs{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;font-weight:bold;color:green;}
#pak{position: fixed;top: 0;left: 0;width:100%;height: 100%;background-color:black;z-index:2;opacity: 0.6;}
#examp{display:block;border:2px solid #eee;padding:3%;position:absolute;width:40%;height:700px;z-index:3;left:28%;top:20px;background-color:white;border-radius:10px;}
.forms{width:200px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;font-weight:bold;color:black}
h2,h1{width:500px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;text-transform:uppercase;color:black;border-bottom:1px solid #eee;margin-bottom:15px;}
label {color:black;} .buttons{margin-left:55%;margin-top:20px;width:250px;height:40px;color:white;
background:#ACD6EA;border-radius:15px;text-transform:capitalize;border:2px solid #ACD6EA}
.form1,.form2{display:none;}

.content1{color:black;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";}
.h3{padding-bottom:5px;font-size:20px;font-weight:bold;color:#4e73df;text-transform:uppercase;border-bottom:2px solid #ACD6EA;}
.h5{text-align:center;font-size:11px;font-weight:bold;color:green;padding:2%;width:180px;height:35px;}
.h6{color:red;font-weight-bold;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";}

.de,.des{padding-left:0.3%;color:#ACD6EA} .nbjour{color:black;font-weight:300;padding-left:10%;font-size:18px;}
.de,.des{padding-left:0.3%;color:#ACD6EA} .nbjour{color:black;font-weight:300;padding-left:10%;font-size:18px;}
.content_home{width:75%;margin-top:15px;display:none;height:950px;overflow-y:scroll;} 
#content3{margin-left:2%;background:white;margin-top:5px;float:left;margin-left:2.5%;width:30%;height:240px;border:2px solid #eee;padding:1%;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";color:black;}

.content_home,.content2{float:left;display:none;} .content2{margin-left:0.2%;}
.dt{font-size:11px;color:green;} .prix,.pric{border:1px solid #eee;width:30%;margin-left:2%;}
.dc{padding-bottom: 5px;font-size:14px;font-weight: bold;color: #ACD6EA;} .but2 a{font-size:11px;padding:0.8%;margin-left:25%;background:#111E7F;color:white;text-decoration:none;border:2px solid #111E7F;border-radius:15px;} .but1{margin-left:3%;}
.df{padding-left:55%;font-size:18px;color:#FF00FF;font-weight:bold;}

.dt{font-size:11px;color:green;} .prix,.pric{border:1px solid #eee;width:30%;margin-left:2%;}
.dc{padding-bottom: 5px;font-size:14px;font-weight: bold;color: #ACD6EA;}  .but1{margin-left:3%;}
.df{padding-left:55%;font-size:18px;color:#FF00FF;font-weight:bold;}
.intervalle{font-size:13px;padding-left:3%;} 
h4,h5{text-align:center;font-weight:bold;color:black;font-size:13px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";}
.hom{text-align:center;border-bottom:1px solid #eee;padding:0.3%;color:black;font-size:14px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";}
 h5{font-size:13px;} .dg{padding-left:3%;} 
 .montant{padding:1%;background-color:white;text-align:center;margin-top:30px;color:black;font-size:13px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"} 
 #monts,#tva,#account,#rpay,#paie1,#paie2,#paie3,#paie4{width:90px;font-weight:200;border:2px solid #eee;} .tot{margin-top:10px;} #mont{padding-left:2%;}
.remov{padding-left:3%;}
.bg{font-weight:bold;color:black;font-size:13px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"}
.tot{margin-bottom:10px;} #add_local{height:35px;margin-left:4%;border:2px solid #E5F1FB;#font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";margin-left:15px;margin-top:10px;width:150px;color:black;background:#E5F1FB;padding:1%;}
.reini{padding:2%;z-index:3;position:absolute;top:300px;left:40%;background-color:white;width:350px;height:220px;border-radius:10px;border:3px solid white;}
.action{margin-top:25px;} .annul{border-radius:15px;width:120px;height:30px;background-color:#FF4500;color:white;border:2px solid #FF4500;}
.ok{width:45px;height:45px;border-radius:50%;margin-left:30%;background-color:#1E90FF;border:2px solid #1E90FF} #reini{margin-left:2%;height:40px;width:130px;font-family:arial;}

#pak{display:block;position:fixed;top:0;left:0;width:100%;height:100%;background-color:black;z-index:2;opacity: 0.9;}

.h6{font-family:arial;font-size:14px;text-align:center;color:black;margin-top:10px;}
.enre{font-size:12px;z-index:4;position:absolute;top:83px;left:70%;color:red;font-weight:bold;font-size:16px;padding:1%;text-align:center;}

.tab,.tabs{border:1px solid #eee;margin-top:5px;padding:2%;margin-top:5px;}
.tabs td{padding:2%;font-size:13px;width:130px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";;margin-left:2%;color:black}
.tabs{margin-left:4%;}
.dep {
  animation: spin 2s linear infinite;
  margin-top:10px;
  }
  
  .side{margin-left:-10%;width:160px;height:160px;border-radius:50%;background:white;border:2px solid white;margin-top:95px;}
   ul a{margin-left:3%;}
@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.side{color:#A9D3F2;padding:35%;text-align:center;margin-left:-8%;width:160px;height:160px;border-radius:50%;background:white;border:2px solid white;margin-top:95px;}
ul a{margin-left:3%;} #form_logo{display:none;} h3{font-size:14px;}.print{border-radius:20px;width:150px;height:35px;background:#85C9F8;border:2px solid #85C9F8;color:white;text-align:center;color:white;margin-left:12%;margin-top:80px;}
.td{margin-left:5%;margin-top:5px;font-size:16px;} .moyens{display:none}
#logo{position:absolute;top:6px;left:1.7%;border-radius:50%;}

.td{margin-left:10%;margin-top:5px;font-size:16px;} #logo{position:absolute;top:6px;left:1.7%;border-radius:50%;}
.tds{font-size:28px;margin-left:12%;color:#09A81F;}
.tdv{font-size:28px;margin-left:12%;color:#A80913;}
.tdc{font-size:28px;margin-left:12%;color:#0E84D1;}


.reservation,.pass,.sejour{padding:left:2%;}
.sejour{color:#42A50A;font-weight:bold;} .reservation{color:#063999;font-weight:bold;}
.pass{color:#650699;font-weight:bold;}
.annule{color:#C81C31;font-weight:bold}
.live-infos{
  width: 250px;
  height: 200px;
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

.butto{margin-left: 2%; margin-top: 20px; width: 250px;height: 40px;color: white;background: #ACD6EA;border-radius: 15px;text-transform: capitalize;
    border: 2px solid #ACD6EA;margin-top:150px;
}

.hom{background:white;color:black;font-size:14px;padding:3%;}

.montant1,.montant{display:none;}
.montant1{background:white;color:black;text-align:center;}
.hom{background:white;color:black;font-size:14px;padding:3%;}
.tot{font-weight:none;background:white;height:90px;padding:2%;color:black;font-size:14px;} .option{margin-left:3%;color:black;height:30px;background:white;}
.ouvrir,.ouvrir1{cursor:pointer;}
.ouvrir11,.ouvrir12{display:none;cusor:pointer;}

h3{color:#06308E;font-size:16px;font-weight:bold;} 
.indispo{display:none;}


@media (max-width: 575.98px) { 

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
.btn{display:block;} #searchDropdown{display:none;}
 
#examp{width:85%;left:10%;height:900px} .buttons{margin-left:5%;}
.navbar-nav{display:none;}
#content3{display:block;margin-left:2%;background:white;margin-top:5px;margin-left:3%;width:90%;height:240px;border:2px solid #eee;padding:1%;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";color:black;}
.content_home{width:95%;}

.content_home{width:95%;margin-top:15px;display:none;height:950px;overflow-y:scroll;}  

.content_home{width:95%;margin-top:15px;display:none;height:950px;overflow-y:scroll;}  .titre{background:white;display:block;position:absolute;left:70%;top:14px;cursor:pointer;color:#224abe;
font-weight:bold;} 

.titre{cursor:pointer;background:white;display:block;position:absolute;left:70%;top:14px;cursor:pointer;color:#224abe;
font-weight:bold;border-color:white;font-size:12px;} 

.titres{cusor:pointer;background:white;display:block;position:absolute;left:70%;top:35px;cursor:pointer;color:#224abe;
font-weight:bold;border-color:white;font-size:12px;} 

.rr{display:none;} 

.data{font-size:16px;display:none;padding:1%;width:97%;z-index:2;position:absolute;top:70px;left:1%;background:white;height:130px;} 

.datas{font-size:16px;display:none;padding:2%;width:97%;z-index:2;position:absolute;top:300px;left:1%;background:white;height:650px;}

.data1{font-size:16px;display:none;padding:1%;width:97%;z-index:2;position:absolute;top:90px;left:1%;background:white;height:130px;} 

.datas1{font-size:16px;display:none;padding:1%;width:97%;z-index:2;position:absolute;top:100px;left:1%;background:white;height:110px;} 

 h2{border-color:none;color:#224abe;font-weight:bold;}
.form-select{display:none;} h4{display:none;} 
 #add_local{margin-top:30px;margin-left:15%;width:75%;}

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
.center{height:1200px;} .detail{margin-left:2.5%;}
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
.center{height:1400px;} .detail{margin-left:12.5%;}
}

</style>

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
		$rel=$bdd->prepare('SELECT  permission,society,code FROM inscription_client WHERE email_user= :email_user');
        $rel->execute(array(':email_user'=>$_SESSION['email_user']));
	    $donns =$rel->fetch();
		if($donns['permission']=="user:boss" OR $donns['permission']=="user:gestionnaire"){
        $res=$bds->prepare('SELECT date,numero,clients,montant,type,types FROM facture WHERE  email_ocd= :email_ocd  ORDER BY id DESC LIMIT 0,5');
        $res->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
        }
		
		// afficher les facture.
		if($donns['code']==1 OR $donns['code']==2 OR $donns['code']==3){
		$session=$donns['code'];
		$res=$bds->prepare('SELECT date,numero,clients,montant,type,types FROM facture WHERE code= :code AND  email_ocd= :email_ocd  ORDER BY id DESC LIMIT 0,5');
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
		       '.$type.' '.$donnes['montant'].' xof</li>';
		}
		       ?>
				   
				</ul>
	               
				  </div><!--livre-infos-->
	              
				  </div><!--live-infos-->
                      
                    </div>
					
					
					<div class="bg">
                        
                      
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
                               facture N°<?php echo$number;?> <button type="button" class="btn btn-primary" id="but">
                              +</button>
                            </div>

                        <div class="input"><select class="form-select form-select-sm" aria-label=".form-select-sm example">
                         <option selected>Type de logement</option>
						  <option value="1">chambre single</option><option value="2">chambre double</option>
                           <option value="3">chambre triple</option><option value="4">chambre twin</option><option value="5">chambre standard</option><option value="6">chambre deluxe</option>
                          <option value="7">studio double</option>
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
  <form method="post" id="form1" action="data_modify_client.php?id_fact=<?php echo$_GET['id_fact'];?>&code_data=<?php echo$_GET['code_data'];?>">
 <div  id="examp">
  <h2> Les informations du client </h2>
   
   <div class="form-row">
    <div class="form-group col-md-6">
      <div class="input-group">
	  <label for="inputPassword4">Date <br/></label>
    <input type="date" name="dat" id="dat" class="form-control"  required value="<?php echo$date;?>">                                               
  </div>
 </div>

   
    <div class="form-group col-md-6">
	<div class="input-group">
      <label for="inputPassword4">Client *</label>
      <input type="text" name="name" id="name" class="form-control" id="inputPassword4" placeholder="Nom & prénom" value="<?php echo$clients;?>">
    </div>
   </div>
     
	 <div class="form-group col-md-6">
      <label for="inputEmail4">piéce d'identité *</label>
      <input type="email" name="piece" id="piece" class="form-control" id="inputEmail4" placeholder="Nature/numéro" value="<?php echo$piece;?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Numéro de phone *</label>
      <input type="number" name="numero" id="numero" class="form-control" id="inputPassword4" placeholder="entre 8 et 14 chiffre" value="<?php echo$numero;?>">
    </div>
     <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="text" name="email" id="email" class="form-control" id="inputEmail4" placeholder="email par défaut" value="<?php echo$email;?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Adresse </label>
      <input type="adresse" name="adresse" class="form-control" id="inputPassword4" placeholder="facultatif" value="<?php echo$adresse;?>">
    </div>
    
    <h2>Information hébergement</h2>
	
	<div class="form-group col-md-6">
      <label for="inputPassword4">Type de séjour</label>
      <?php echo$type_sejour;?>
	  </div>
	
	<div class="form-group col-md-6">
      
     </div>
	
     <div class="form1 col-md-6">
	  <label for="inputPassword4">Date d'entrée(check_in) </label>
      <input type="date" name="days" id="days" class="form-control" id="inputPassword4" placeholder="" value="<?php echo$da2;?>">
     </div>
	
	 <div class="form1 col-md-6">
      <label for="inputPassword4">Date du départ(check_out) </label> 
      <input type="date" name="das" id="das" class="form-control" id="inputPassword4" placeholder="" value="<?php echo$da3;?>">
    </div>
	
	<div class="form2 col-md-6">
	  <label for="inputPassword4">Heure d'entrée(check_in) </label>
      <input type="time" name="tim" id="tim" class="form-control" id="inputPassword4" value="<?php echo$da2;?>">
     </div>
	
	 <div class="form2 col-md-6">
	  
      <label for="inputPassword4">Heure du départ(check_out) </label>
      <input type="time" name="tis" id="tis" class="form-control" id="inputPassword4" value="<?php echo$da3;?>">
    </div>
	
  </div>
  <span class="errors"></span>
  <a href="gestion_facture_customer.php" title="retour liste facture"><button type="button" class="butto">retour</button></a>
   
   <button type="button" class="buttons">continuer</button>
 </div>
 
 <div class="content">
 <div class="content1">
 <div class="h3"><span id="h3"><?php echo$type;?></span><span class="nbjour"><?php echo$jour;?></span></div>
 <span class="client"><?php echo$reference;?></span>
 </div>


 <input type="hidden" id="nbjour" name="nbjour">
 
</div><!--content-->



<div class="contents">
<div id="resultat_home"><?php include('list_data_home.php');?></div><!--affiche les homme-->

 <div class="content2">
 <div id="result"></div>
  <h4> Les détails sur le séjour </h4>
  <div id="resul"></div>
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
 <div class="action"><button type="button" class="annul">Annuler</button><input type="submit" class="ok" value="ok"></div>
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
<div id="pak"></div>
<div id="resul"></div>

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
	 $('.data').slideToggle();
	 $('.datas').slideToggle();
	 
	});
	
	$(document).on('click','.titres',function(){
	 $('.data1').slideToggle();
	 $('.datas1').slideToggle();
	 $('.data').slideToggle();
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
	
	 
	 $('#sms').click(function(){
	$('.drop').slideToggle();
	});
	
	$('#news_data').click(function(){
	$('.drops').slideToggle();
	$('.drop').css('display','none');
	
	});
	
	 $('#news').click(function(){
	$('.users').slideToggle();
	});
	
 $('#but').click(function(){
   $('#examp').css('display','block');
   $('#pak').css('display','block');
   var email = "default@gmail.com";
   $('#email').val(email);
 });
 
 $('#sidebarToggleTop').click(function(){
		$('#accordionSidebar').css('display','block');
	 });
	 
 
 $('#pak').click(function(){
   $('.reini').css('display','none');
 });
 
 $(document).on('click','.h31', function(){
 $('.moyens').css('display','block'); 
	 
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
		 $('.client').append('Réference client : <i class="far fa-user" style="font-size:13px;color:green;"></i><span class="de">'+name+'</span> <i class="fas fa-phone" style="padding-left:4%;color:green;font-size:13px;"></i> contact :<span class="des"> '+numero+'</span><span class="intervalle"> <span class="intervalle"> <i class="fas fa-calendar-minus" style="font-size:13px;color:green;"></i> Arrivée le  <span class="from">'+tim+'</span> ,  <i class="fas fa-calendar-minus" style="font-size:13px;color:green;"></i> Départ le  <span class="todate">'+tis+'</span> </span>');
		 
		 if(r==1){
		 $('.nbjour').append('Durée : <span class="det">'+r+'heure</span>');
		 }
		 if(r > 1){
			$('.nbjour').append('Durée : <span class="det">'+r+'heures</span>');			  
		 }
		 
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
	url: "modify_home.php?id_fact=<?php echo$_GET['id_fact'];?>&code_data=<?php echo$_GET['code_data'];?>",// on traite par la fichier
	data:{id:id,nbjour:nbjour,days:days,das:das,tim:tim,tis:tis,to:to,chambre:chambre,type:type,prix_nuite:prix_nuite,prix_pass:prix_pass,paynuite:paynuite,paypass:paypass,dat:dat,action:action},
	success:function(data) { // on traite le fichier recherche apres le retour
		$('#results').html(data);
	
	 },
	 error: function() {
    alert('vérifier votre connexion'); }
	 
	});

	});
	
	// recupération et caclul des montants
	// calculer les sommes automatiquement du récapitualitif
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
		var acomp =$('#acomp').val();
		var monta = $('.monta').text();
		var mont = parseFloat(monta);
		
	// on lance l'apel ajax
	  $.ajax({
	  type: 'POST', // on envoi les donnes
	   url: "modify_home.php?id_fact=<?php echo $_GET['id_fact'];?>&code_data=<?php echo $_GET['code_data'];?>",// on traite par la fichier
	  data:{id:id,nbjour:nbjour,to:to,chambre:chambre,type:type,prix_nuite:prix_nuite,prix_pass:prix_pass,paynuite:paynuite,paypass:paypass,action:action},
	success:function(data) { // on traite le fichier recherche apres le retouy
		$('#results').html(data);

      },
	 error: function() {
    alert('vérifier votre connexion'); }
	 
	});
		
	});
	
	
	// fonction remove pour suprimer un local de la liste
	$(document).on('click','.removes',function(){
		var action ="removes";
		var id = $(this).data('id4');
		var nbjour = $('#nbjour').val();
	    var type = $('#type'+id).val();
	    var prix_nuite = $('#prix'+id).val();
	    var prix_pass = $('#pric'+id).val();
	    var paynuite = $('#cout_nuite'+id).val();
	    var paypass = $('#cout_pass'+id).val();
	    var to = $('#to').val();
		var mon =$('#mon').val();
		var acomp =$('#acomp').val();
		var rest =$('#rest').val();
		var rep =$('#rep').val();
		var monta =$('.mon').text();
		var result = parseFloat(monta);
		var taxe =$('#tva').val();
	    
		if(acomp==""){
		acomp =0;
		}
		// result
		var results = parseFloat(monta)-parseFloat(acomp);
		
		if(acomp < result || acompt==result){
	// on lance l'apel ajax
	  $.ajax({
	  type: 'POST', // on envoi les donnes
	  url: "modify_home.php?id_fact=<?php echo $_GET['id_fact'];?>&code_data=<?php echo $_GET['code_data'];?>",// on traite par la fichier
	  data:{id:id,nbjour:nbjour,to:to,mon:mon,taxe:taxe,rest:rest,acomp:acomp,rep:rep,action:action},
	success:function(data) { // on traite le fichier recherche apres le retouy
		$('#homs'+id).html('');
		$('#resul').html('<div class="enre"><div><i class="fas fa-check-circle" style="color:red"></i>local suprimé de la liste</button>');
	    loads();
		load();
		$('#rest').val(results);
		$('.buttons').click();

      },
	 error: function() {
    alert('vérifier votre connexion'); }
	 
	});
	
	}

  else{
	 // inséré un petit message pour 
	 $('.eror').html('<div style="color:red;font-size:12px;"><i class="fas fa-check-circle" style="color:red;font-size:12px"></i> l\'acompte doit etre <br/>inférieur au montant httc');
    }	
	});
	
	// calculer les sommes automatiquement du récapitualitif
	
	$(document).on('keyup','#tva',function(){
		
	var tva = $('#tva').val();
	var totals =$('#mon').val();
	var monta = $('.monta').text();
	if(tva > 0 && tva.length <3 && tva.length!=""){
	var result = parseFloat(totals)*parseFloat(tva);
	var resul = parseFloat(result)/100;
	var results = resul.toFixed(2);
	var t = parseFloat(results)+parseFloat(totals);
	var ts = t.toFixed(2);
	$('.tva').html('<span class="taxe">'+results+'</span> <input type="hidden" name="taxe" value="'+results+'">');	
	$('.mon').text(ts);
	}
	
	if(tva.length > 2){
     var results = 0;
	$('.tva').html('<span class="taxe">Tva pas réglémentée</span> xof<input type="hidden" name="taxe" value="'+results+'">');	
    }	

    if(tva.length ==""){
     var results = 0;
	$('.tva').html('<span class="taxe">'+results+'</span> <input type="hidden" name="taxe" value="'+results+'">');	
    }
     
	if(totals ==0){
     var results = 0;
	$('.tva').html('<span class="taxe">'+results+'</span><input type="hidden" name="taxe" value="'+results+'">');	
    }
   	
  });
  
  $(document).on('keyup','#acomp',function(){
	 var totals =  $('.mon').text();
	 var tota = parseFloat(totals);
     var montas = $('.montas').text();	 
	 var account = $('#acomp').val();
	 if(account >0 || account==0){
		if(account < tota){
		var result = parseFloat(totals) - parseFloat(account);
		var ts = result.toFixed(2);
        $('#rest').val(ts);
	 }
	 else{
		$('#rest').val(0);
	 }
	 }
	 
	 if(account.length ==""){
		$('#rest').val(0);	
	}
	  
  });
  
  
  // afficher les données existant dans les array de mofication
  function loads() {
				var action="modify";
				var to =$('#to').val();
				$.ajax({
					url: "modify_home.php?id_fact=<?php echo$_GET['id_fact'];?>&code_data=<?php echo$_GET['code_data'];?>",
					method: "POST",
					data:{action:action,to:to},
					success: function(data) {
						$('#resul').html(data);
					}
				});
			}

			loads();

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
			
	$('#sms').click(function(){
	$('.drop').slideToggle();
	});
	 
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
			
	// click sur les news message
	
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
  
	
    // afficher la div pour réinitailiser les chiffres	
	$(document).on('click','.butt',function(){
    $('.reini').css('display','block');
    $('#pak').css('display','block');
    });
	
     
	  
	 $(document).on('click','#add_local', function() {
	// on traite le fichier recherche apres le retour
	  var acomp =$('#acomp').val();
	  var monta =$('.mon').text();
	  var montas = $('.montas').text();
	  var mts = parseFloat(montas);
	  var results = parseFloat(monta);
	  var paie1 =$('#paie1').val();
	  var paie2 = $('#paie2').val();
	  var paie3 = $('#paie3').val();
	  var paie4 = $('#paie4').val();
	  
	  if($('#mts').hasClass('montas')) {
		 var results = parseFloat(monta)+parseFloat(montas); 
	  }
	   if(acomp < results || acomp==results){
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
  
  $('#page-top').click(function(){
	alert(zapo);	 
	  
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


});
</script>
</body>

</html>

