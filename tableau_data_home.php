<?php
include('connecte_db.php');
include('inc_session.php');

// recupére les utilisateur connecté et leur status
  

 $req=$bds->prepare('SELECT entree,sorties,user_gestionnaire,reservation,reste FROM tresorie_user WHERE email_ocd= :email_ocd');
 $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
 $datas=$req->fetchAll();
 
 // créer 4 tableau vide
	$datac =[];
	$datac1 =[];
	$datac2 =[];
	$datac3 =[];
  foreach($datas as $donnes){

  // recupére les montant et les mettre dans un tableau
	$data1 =$donnes['entree'].',';
	$data2= $donnes['sorties'].',';
	$data3 =$donnes['reservation'].',';
	$data4 =$donnes['reste'].',';
	
	// on créer un tableaux pour mettre les valeurs
	$datas1 = explode(',',$data1);
	$datas2 = explode(',',$data2);
	$datas3 = explode(',',$data3);
	$datas4 = explode(',',$data4);
	
	foreach($datas1 as $values) {
	$datac[] =$values;
	}
	
	foreach($datas2 as $values1) {
	$datac1[] =$values1;
	}
	
	foreach($datas3 as $values2) {
	$datac2[] =$values2;
	}
	
	foreach($datas4 as $values3) {
	$datac3[] =$values3;
	}
	
  }
  

 // calcule des pourcentage entre entrées et sorties chiffre
	$number1 =array_sum($datac);
	$number2 =array_sum($datac1);
	$number3 =array_sum($datac2);
	$number4 = array_sum($datac3);
 
   	$num_data = $number1+$number3+$number4;
	
	if($num_data==0){
		
	$ac =0;
	$b=0;
	$d=0;
	$indicateuc="";
	$indicateur="";
	$indicateurs="";
	$indicateurc="";
	$cb=0;
	}
	
	if($number1!=0 OR $number4!=0 OR $number2!=0 OR $number3!=0){
	$data_number =$number1+$number2;
	
	$data_numbers =$num_data +$number2;
	
	// prévision net 
	$ac = $number1*100/$data_number;
	$b = $number2*100/$data_number;
	
	// prévision sous réservation
	$cb = $num_data*100/$data_numbers;
	$d = $number2*100/$data_numbers;
	
	$ac =substr($ac,0,4);
	$cb =substr($cb,0,4);
	
	// prévison net
	if($ac > 80) {
		$indicateur='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:85%;background:#3DEA29;font-size:16px;color:#3DEA29;">25</div>
    </div>
    </div><br>';
	$indicateurs='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:7%;background:#F9AABB;font-size:16px;color:#F9AABB;">25</div>
  </div><br>';
	$name= '<i class="fas fa-arrow-circle-down" style="font-size:15px;color:#04850C;"></i> Activité en forte croissance';
	}
	
	elseif(50< $ac  AND $ac <80){
	$indicateur='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:70%;background:#3DEA29;font-size:16px;color:#3DEA29">25</div>
  </div><br>';
  $indicateurs='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:45%;background:#F9AABB;font-size:16px;color:#F9AABB;">25</div>
  </div><br>';
	$name= '<i class="fas fa-arrow-circle-down" style="font-size:15px;color:#04850C;"></i> Activité en  croissance';
	}
	
	elseif(30<$ac  AND $ac < 50) {
	$indicateur='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3-blue w3-round-large" style="width:40%;background:#AAF9BB;font-size:16px;color:#3DEA29;">25</div>
  </div><br>';
  $indicateurs='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:60%;background:#F9AABB;font-size:16px;color:#F9AABB;">25</div>
  </div><br>';
	  $name= 'trésorerie moyenne';
	}
	
	elseif(10 < $ac AND $ac <30){
	$indicateur='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3- w3-round-large" style="width:20%";background:#AAF9BB;font-size:16px;color:#AAF9BB>25</div>
  </div><br>';
  $indicateurs='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:70%;background:#F9AABB;font-size:16px;color:#F9AABB;">25</div>
  </div><br>';
  
	  $name= '<i class="fas fa-exclamation-triangle" style="font-size:15px;color:#BD0423;">  Attention ,trésorerie faible';
		
	}
	
	else{
	$indicateur='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3-blue w3-round-large" style="width:5%;background:#AAF9BB;font-size:16px;color:#AAF9BB;">25</div>
    </div><br>';
  $indicateurs='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:90%;background:#F9AABB;font-size:16px;color:#F9AABB;">25</div>
  </div><br>';
	  $name= '<i class="fas fa-exclamation-triangle" style="font-size:15px;color:#BD0423;">  Attention ,Activité fortement déficitaire';
		
	}
	
	
	// prevision sous réserve de réservation
	
	if($cb > 80) {
		$indicateuc='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:85%;background:#AADAF9;font-size:16px;color:#AADAF9;">25</div>
  </div><br>';
	$indicateurc='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:5%;background:#F79F76;font-size:16px;color:#F79F76;">25</div>
  </div><br>';
	$names= 'Activité en forte croissance';
	}
	
	elseif(50< $cb  AND $cb <80){
	$indicateuc='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:65%;background:#AADAF9;font-size:16px;color:#AADAF9;">25</div>
  </div><br>';
  $indicateurc='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:20%;background:#F79F76;font-size:16px;color:#F79F76;">25</div>
  </div><br>';
	$names= '<i class="fas fa-arrow-circle-down" style="font-size:15px;color:#04850C;"> </i> Activité en  croissance';
	}
	
	elseif(30<$cb  AND $cb < 50) {
	$indicateuc='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:40%;background:#AADAF9;font-size:16px;color:#AADAF9;">25</div>
  </div><br>';
  $indicateurc='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:60%;background:#F9AABB;font-size:16px;color:#F79F76;">25</div>
  </div><br>';
	  $names= 'trésorerie moyenne';
	}
	
	elseif(10 < $cb AND $cb <30){
	$indicateuc='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:20%;background:#AADAF9;font-size:16px;color:#AADAF9;">25</div>
  </div><br>';
  $indicateurc='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:70%;background:#F9AABB;font-size:16px;color:#F79F76;">25</div>
  </div><br>';
  
	  $names= '<i class="fas fa-exclamation-triangle" style="font-size:15px;color:#BD0423;">  Attention ,trésorerie faible';
		
	}
	
	else{
	$indicateuc='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:7%;background:#AADAF9;font-size:16px;color:#AADAF9;">25</div>
    </div><br>';
  $indicateurc='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:90%;background:#F9AABB;font-size:16px;color:#F79F76;">25</div>
  </div><br>';
	  $names= '<i class="fas fa-exclamation-triangle" style="font-size:15px;color:#BD0423;">  Attention ,Activité fortement déficitaire';
		
	}
}

else{
$names="";
$name="";
}
 $req->closeCursor();
 
 // recupérer les donnees sur la facture
 
  $rev=$bds->prepare('SELECT type FROM facture WHERE email_ocd= :email_ocd');
  $rev->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
  $datos=$rev->fetchAll();
  
  $tab=[];
  $tabs=[];
  $array=[];
  foreach($datos as $dataf){
	if($dataf['type']==1 OR $dataf['type']==2 OR $dataf['type']==3) {
    $type =$dataf['type'];
    $types = explode(',',$type);
    foreach($types as $ty){
     $tab[]=$ty;
    }		
   }
   if($dataf['type']==4){
	 $type =$dataf['type'];
    $types = explode(',',$type);
    foreach($types as $ty){
     $tabs[]=$ty;
    }  
	   
   }
   
   if($dataf['type']==3){
	 $dat=$dataf['type'];
	   // on le met dans un tableau
	   $dats = explode(',',$dat);
	   foreach($dats as $valu){
		 $array[]=$valu;
	  }
	}

  }
  
  $a =count($array);
  if($a==1){
	 $reserve ='1 local';
  }
  elseif($a==0 OR empty($array)){
	  
	$reserve ='0 local'; 
  }
  
  else{
	  
	 $reserve=' '.$a.' locaux'; 
  }
  
  // le nombre d'elements dans le tab
  $b=count($tab);
  
  if($b==0 OR empty($b)){
	$clients ='Zéro client facturé';
  }
  
  elseif($b==1){
	 $clients ='un client facturé'; 
  }
  
  else{
	  
	 $clients = ' '.$b.' clients facturés'; 
  }
  
  // le nombre d'elements dans le tabs
  $c=count($tabs);
  
  if($c==0){
	$cl='aucune facture annulée';
  }
  
  elseif($b==1){
	 $cl='une facture annulée'; 
  }
  
  else{
	  
	 $cl = ' '.$c.' factures annulées'; 
  } 


 // recupére les depense du crédit fournisseur dans ta table depense
 $rev=$bds->prepare('SELECT montant,status FROM depense WHERE email_ocd= :email_ocd');
 $rev->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
 $datac=$rev->fetchAll();
 // creer un tableau
 $data =[];
 
 foreach($datac as $dats){
	 if($dats['status']==2){
    $dat= $dats['montant'];
	// créer un tableau
	$dat = explode(',',$dat);
	
	foreach($dat as $value){
	 $data[]=$value;
	}
   }
 }
// la somme des valeur du tableau pour les crédit fournisseur
 $sum = array_sum($data);   
	 
 

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
     h1,select{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:18px;margin-left:8%;color:black}
    #collapse{width:300px;height:100px;padding:2%;position:fixed;top:60px;left:81%;border-shadow:3px 3px 3px black;}
    .bg{border:1px solid #eee;background:white;width:340px;height:30%;padding:4%;margin-top:0px;}
    .bs{width:340px;height:280px;border:1px solid #eee;}
    .en{height:50px;border-bottom:1px solid #eee;} .h1{font-size:24px; text-align:center;} .encaiss{font-size:16px;font-weight:none;} .h2{margin-top:70px;margin-left:10%;} .t_monts,.t_mont,.t_mon{font-size:18px;margin-left:-20px;}
	#montant td{font-weight:none;} .butt{height:35px;border-radius:15px;padding:1.5%;width:180px;font-weight:200;background:#F026FA;color:white;font-size:20px;border:2px solid #F026FA;}
	.t_monts{color:#42FC72;} .t_mont{color:#FA2367;} .t_mon{color:#14B5FA;}
.center{background-color:white;width:80%;height:1250px;padding:1.5%;margin-top:5px;} .inputs,.input{margin-left:5%;float:left;}
.nav-search{width:70%;} .form-select{margin-left:40%;width:200px;height:43px;}
.inputs{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;font-weight:bold;color:green;}
#pak{position: fixed;top: 0;left: 0;width:100%;height: 100%;background-color: black;z-index:2;opacity: 0.8;}
#examp{border:2px solid #eee;padding:3%;position:absolute;width:40%;height:700px;z-index:3;left:28%;top:20px;background-color:white;border-radius:10px;}
.forms{width:200px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;font-weight:bold;color:black}
h2,h1{width:500px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;text-transform:uppercase;color:black;border-bottom:1px solid #eee;margin-bottom:15px;}

h3{padding:1%;text-align:center;padding-top:10px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;text-transform:uppercase;color:black;}
label {color:black;} .buttons{margin-left:55%;margin-top:20px;width:250px;height:40px;color:white;
background:#ACD6EA;border-radius:15px;text-transform:capitalize;border:2px solid #ACD6EA}
.form1,.form2{display:none;}

.content1{display:none;color:black;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";}
.h3{padding-bottom:5px;font-size:20px;font-weight:bold;color:#4e73df;text-transform:uppercase;border-bottom:2px solid #ACD6EA;}
.h5{text-align:center;font-size:11px;font-weight:bold;color:green;padding:2%;width:180px;height:35px;}
.h6{color:red;font-weight-bold;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";}

.de,.des{padding-left:0.3%;color:#ACD6EA} .nbjour{color:black;font-weight:300;padding-left:10%;font-size:18px;}
.content_home{width:75%;margin-top:15px;display:none;background:#BDDDF9;height:950px;} .content3{background:white;margin-top:5px;float:left;margin-left:2.5%;width:30%;height:275px;border:2px solid white;padding:1%;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";color:black;}
.content_home,.content2{float:left;display:none;} .content2{margin-left:0.2%;}
.dt{font-size:11px;color:green;} .prix,.pric{border:1px solid #eee;width:30%;margin-left:2%;}
.dc{padding-bottom: 5px;font-size:14px;font-weight: bold;color: #ACD6EA;} .but2 a{font-size:11px;padding:0.8%;margin-left:50%;background:#111E7F;color:white;text-decoration:none;border:2px solid #111E7F;border-radius:15px;} .but1{margin-left:3%;}
.df{padding-left:55%;font-size:18px;color:#FF00FF;font-weight:bold;}
.intervalle{font-size:13px;padding-left:3%;} 
h4,h5{text-align:center;font-weight:bold;color:black;font-size:13px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";}
.hom{text-align:center;border-bottom:1px solid #eee;padding:0.3%;color:black;font-size:14px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";}
 h5{font-size:13px;} .dg{padding-left:3%;} 
 .montant{padding:1%;background-color:#E5F1FB;text-align:center;margin-top:30px;color:black;font-size:13px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"} 
 #monts,#tva,#account,#rpay,#paie1,#paie2,#paie3,#paie4{width:90px;font-weight:200;border:2px solid white;} .tot{margin-top:10px;font-weight:bold;} #mont{font-weight:bold;padding-left:2%;}
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

.center{background:#eee;} .conte1{width:100%;height:300px;} .cont1,.cont12,.cont13,.cont14{float:left;} .conte2{width:100%;height:300px;}
 .cont1{border-bottom:4px solid #0FF955; float:left;margin-left:2%;padding:1%;width:23%;height:200px;background:white;} .cont2{float:left;} .titre{font-family:arial;text-align:center;color:black;font-size:18px;}
.cont12{border-bottom:4px solid #7BCCF8; float:left;margin-left:2%;padding:1%;width:23%;height:200px;background:white;} .cont2{float:left;} .titre{font-family:arial;text-align:center;color:black;font-size:18px;}
.cont13{border-bottom:4px solid #F87B90; float:left;margin-left:2%;padding:1%;width:23%;height:200px;background:white;} .cont2{float:left;} .titre{font-family:arial;text-align:center;color:black;font-size:18px;}

.cont14{border-bottom:4px solid #F87B90; float:left;margin-left:2%;padding:1%;width:23%;height:200px;background:white;} .cont2{float:left;} .titre{font-family:arial;text-align:center;color:black;font-size:18px;}


.montant1{font-weight:bold;color:#0FF955;font-size:30px;margin-top:30px;margin-left:10%;} .monai{padding-left:20%;}
.montant2{font-weight:bold;color:#7BCCF8;font-size:30px;margin-top:30px;margin-left:10%;}
.montant3{font-weight:bold;color:#F87B90;font-size:30px;margin-top:30px;margin-left:10%;}

.cont2{float:left;margin-left:2%;padding:1%;width:23%;height:200px;background:white;border:3px solid white;}

.dtx{font-weight:bold;color:#04850C;font-size:25px;margin-left:5%;margin-top:15px;}
.dtt{color:#06308E;font-weight:bold;font-size:25px;margin-left:5%;margin-top:15px;}
.dts{font-weight:bold;color:#C10D23;font-size:25px;margin-left:5%;margin-top:15px;}

.user{border-bottom:1px solid #eee;padding-top:5px;font-size:15px;color:font-weight:none;}
.contens,.contens1{float:left}
.contens{width:46%;background:white;height:250px;margin-left:2%;margin-top:-50px;padding-left:5%;}
.contens1{width:46%;background:white;height:250px;margin-left:3%;margin-top:-50px;padding-left:5%;}
.montants{font-size:25px;margin-left:60%;color:#04850C;font-weight:bold;}
.monta{font-size:25px;margin-left:60%;color:#06308E;font-weight:bold;}
.h{font-family:arial;margin-left:5%;font-size:18px;}

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
padding: 0 30px;
transition: all 200ms;
}

.ss{padding:2%;width:20px;height:20px;border-radius:40%;border:2px solid #eee;background:#e74a3b;color:white;
margin-left:-10px;} .datas_messanger{border-bottom:1px solid #eee;}

.drops{display:none;}  .users{display:none} #news_data{display:none;}

.sidebar .nav-item .nav-link span{font-size:14px;font-weight:bold;text-transform:capitalize;}
.navbar-nav{background:#06308E;}
#panier{position:fixed;left:60%;top:15px;color:black;font-size:14px;background:black;
opacity:0.7;padding:1%;color:white;border-radius:5px;}

/*------------------------------------------------------------------
[ Responsive ]*/
@media (max-width: 575.98px) { 
#panier{display:none;}
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
}


@media (max-width: 1024px) {
#panier{display:none;}
#logo{display:none;} .side{display:none;} .bs{display:none;}.bg{display:none;}
#accordionSidebar{display:none;} .center{width:100%;margin:0;padding:0;height:1000px;}
cont1,.cont12,.cont13,.cont14,.titre{font-size:14px;}
.drop{position:absolute;left:7%;width:300px;}
.drops{padding:8%;position:absolute;left:-150px;width:540px;display:block;background:white;
height:1200px;overflow-y:scroll} h2{margin-top:20px;border-top:1px solid #eee;color:black;}
.us{margin-top:5px;border-bottom:1px solid #eee;color:black;margin-left:10%;}
#news_data{display:block;} #news{display:none;} 
.users{display:block;color:black;font-family:arial;font-size:13px;} h2{margin-left:3%;}
#caisse{font-size:14px;} .tds,.tdv,.tdc{font-size:22px;font-weight:bold;}
.user{padding-left:7%;} .dtt,.dts{font-size:20px;} h1{font-size:13px;}
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
		// afficher les dernières enregistrements
		// aller chercher les auteurs en écriture sur une facture
	    $res=$bds->prepare('SELECT date,numero,clients,montant,type,types FROM facture WHERE  email_ocd= :email_ocd  ORDER BY id DESC LIMIT 0,5');
        $res->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
        
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
          
              <h2>Historique des utilisateurs(en ligne)</h2>
		
		<div class="users">
		
		<?php
        $rq=$bdd->prepare('SELECT user,permission,numero,date,heure,active,society FROM inscription_client WHERE email_ocd= :email_ocd');
        $rq->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
   		
		  while($dato=$rq->fetch()){
		    if($dato['society']==""){
			 $transmi="";  
		   }
		   
		   else{
			   
			  $transmi ='travail à'.$dato['society'].''; 
		   } 
			
	     if($dato['active']=="on"){
	       $action='<i class="fas fa-circle" style="font-size:12px;color:green;"></i>  en ligne';
	      }
          if($dato['active']=="off"){
          $action=' connecté depuis '.$dato['date'].' à '.$dato['heure'].' ';
	     }

         echo'<div class="user"><i class="far fa-user"></i> '.$dato['user'].' '.$action.'<br/>'.$transmi.'</div> ';	 
       }
     ?>
						
	</div>
	
		<div class="resutat">
		<h2>Résultat de trésorerie</h2>
		<h3>Précision Net:</h3>
		<div class="h"><?php echo$name;?></div><br/>
		<h3>Prévision attendu:</h3>
		<div class="h"><?php echo$names;?></div>
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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="navbar-search">
                        <div class="input-group">
                            
                           <div class="inputs">
                               Tableau de bord
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
					<?php
					echo'<div class="conte1">';
					echo'<div class="cont1">
					     <div class="titre"><i class="fas fa-coins" style="font-size:18px;color:green"></i>  Encaissement séjour&pass</div>
					     <div class="montant1">'.$number1.'<br/><span class="monai">xof</span></div>
						 </div>
						 
						 <div class="cont12">
						 <div class="titre"><i class="fas fa-coins" style="font-size:18px;color:#7BCCF8;"></i> Acompte Réservation</div>
					     <div class="montant2">'.$number3.'<br/><span class="monai">xof</span></div>
						 </div>
						 
						 <div class="cont13">
						 <div class="titre"><i class="fas fa-coins" style="font-size:18px;color:#F87B90;"></i> Dépenses éffectuées</div>
					     <div class="montant3">'.$number2.'<br/><span class="monai">xof</span></div>
						 </div>
					
					     <div class="cont14">
						 <div class="titre"><i class="fas fa-coins" style="font-size:18px"></i> Crédit fournisseur</div>
					     <div class="montant3">'.$sum.'<br/><span class="monai">xof</span></div>
						 </div>';
					
					 echo'</div>';
					 
					 
					echo'<div class="conte2">';
					echo'<div class="cont2">
					     <div class="titre"><i class="fas fa-house-user" style="color:#04850C"></i>  Nombre(s) de locaux réservés</div>
					     <div class="dtx">'.$reserve.'</div>
						 </div>
						
						 <div class="cont2">
						 <div class="titre"><i class="fas fa-user-friends" style="color:#06308E"></i>  Nombre de clients facturés</div>
					     <div class="dtt">'.$clients.'</div>
						 </div>
						 
						 <div class="cont2">
						 <div class="titre"><i class="fas fa-coins" style="font-size:14px;color:#C10D23"></i>  Nombre de factures annulées</div>
					     <div class="dts">'.$cl.'</div>
						 </div>
					
					     <div class="cont2">
						 <div class="titre"><i class="fas fa-sync"></i>
						 Locaux indisponible
						 </div>
					     </div>
						 
						 </div>
						 
						 <div class="tresor">
						 <div class="contens">
						 <h3>Prévisionnel NET Trésorie(Sans acompte réservation)</h3>
						 <h4>Indicateur</h4>
		                <div class="montants">+'.$ac.'%</div>
		                <div>'.$indicateur.'</div>
		                <div class="montan"></div><br/>
		                </div>
						 
						 <div class="contens1">
						 <h3>Prévisionnel BRUT Trésorie(Acompte réservation)</h3>
						 <h4>Indicateur</h4>
						 <div class="monta">+'.$cb.'%</div>
		                  <div>'.$indicateuc.'</div>
		                  <div class="montac"></div><br/>
		                
		                   </div>';
					
					 echo'</div>';
					 
					?>
  
 
    
	                 </div><!--center-->

 <div class="reini" style="display:none">
 <form method="post" id="form_reini" action="">
 <h1>Réinitialiser votre caisse journalière</h1>
 <div class="dert"> Date du point :<input type="date" id="reini" name="reini" required></div>
 <div class="action"><button type="button" class="annul">Annuler</button><input type="submit" class="ok" value="ok"></div>
 </form>
 
 </div><!--reini---->
 <div id="result_reini"></div><!--div result_reini-->
 <div id="home_data"></div><!--div home-->
  <div id="message_datas"></div><!--div home-->  
	
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
<div id="panier"></div><!--ajax panier  facturation-->

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
	$('.drops').css('display','none');

	});
	
	 $('#news_data').click(function(){
	$('.drops').slideToggle();
	$('.drop').css('display','none');
	
	});
	
	 $('#news').click(function(){
	$('.users').slideToggle();
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
			
	// click sur les news message
	
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
		  var action ="click";
		  $.ajax({
            type: 'POST',
            url:'messanger_datas.php',
            data:{action:action},
            async:true,
            success: function(data){
            $('#message_datas').html(data);
	         view();
		    }
          });
		  
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
 

	
    // afficher la div pour réinitailiser les chiffres	
	$(document).on('click','.butt',function(){
    $('.reini').css('display','block');
    $('#pak').css('display','block');
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