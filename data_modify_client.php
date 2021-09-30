<?php
include('connecte_db.php');
include('inc_session.php');

if(!isset($_GET['id_fact']) AND !isset($_GET['code_data'])) {
	
  header('location: index.php');
}

 $id =$_GET['id_fact'];
 $session =$_GET['code_data'];
 

?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="confirmation">
    <meta name="author" content="">

    <title>Confirmation</title>
     <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom fonts for this template-->
  
    <!-- Custom fonts for this template -->
   
<style>
 
  
 #pak{width:200px;position: fixed;top: 0;left:0;width:100%;height:100%;background-color:black;z-index:2;opacity:0.7;}
label{color:black;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;font-weight:bold;color:black}
 .dep {
  animation: spin 2s linear infinite;
  margin-top:10px;font-size:45px;font-weight:bold;
  }

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.nam{color:black;font-weight:bold;}
.enre{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;color:black;z-index:4;position:absolute;top:130px;left:40%;border:2px solid white;font-family:arial;font-size:18px;width:280px;height:100px;padding:2%;text-align:center;background-color:white;
}

.side{color:#A9D3F2;padding:35%;text-align:center;margin-left:-8%;width:160px;height:160px;border-radius:50%;background:white;border:2px solid white;margin-top:95px;}
ul a{margin-left:3%;}
.dr{font-size:18px;text-align:center;margin-top:10px;}
</style>

</head>

<?php



 if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token']))
		
{
	//Si le jeton de la session correspond à celui du formulaire
	if($_SESSION['token'] != $_POST['token'])
	{
		//On stocke le timestamp qu'il était il y a 15 minutes
		$timestamp_ancien = time() - (5*60);
		//Si le jeton n'est pas expiré
		if($_SESSION['token_time'] < $timestamp_ancien)
		{
		     echo'<body onload="alert(\'OCD ne vous reconnais pas  , vous n\'avez pas acces a la page \')">';
	           echo'<meta http-equiv = "refresh" content="0; URL= login_user_ocd.php">';
		}
	}
}


 try{
	
	
		$session=$_GET['code_data'];
		
   $rej=$bds->prepare('SELECT email_ocd,montant,encaisse,reste,reservation FROM tresorie_customer WHERE  code= :code AND  email_ocd= :email_ocd');
   $rej->execute(array(':code'=>$session,
                       ':email_ocd'=>$_SESSION['email_ocd']));
   $donns=$rej->fetch();
	$rej->closeCursor();

  // aller chercher les auteurs en écriture sur une facture
	 $res=$bds->prepare('SELECT date,user,montant,reste,avance,mont_tva,user FROM facture WHERE code= :code AND id_fact= :id AND email_ocd= :email_ocd');
   $res->execute(array(':code'=>$session,
                       ':id'=>$id,
                      ':email_ocd'=>$_SESSION['email_ocd']));
   $donnees=$res->fetch();
   $res->closeCursor();
   
   $dat=$donnees['date'];
   
   $dats = explode('-',$dat);
    $j = $dats[2];
	$mm = $dats[1];// search_date facture
	$an = $dats[0];
	
	// recupere les mois pour les recherches de facture.
	if($mm=="01"){
	 $mms="Janvier";
	}
	elseif($mm=="02"){
	$mms="Février";
    }
	elseif($mm=="03"){
	$mms="Mars";
	}
	elseif($mm=="04"){
	  $mms="Avril";	
	}
    elseif($mm=="05"){
      $mms="Mai";
    }
    elseif($mm=="06"){
	  $mms="Juin";	
	}
    elseif($mm=="07"){
      $mms="Juillet";
    }
	elseif($mm=="08"){
	$mms="Août";
	}
	elseif($mm=="09"){
	$mms="Septembre";
	}
	elseif($mm=="10"){
	  $mms="Octobre";	
	}
    elseif($mm=="11"){
      $mms="Novembre";
    }
	else{
	  $mms="Décembre";	
	}
	
	
	// trnaformer la chaine de caractère user en tableau
	$user = str_split($donnees['user']);
	$result = count($user);
	
   
   // création d'un tableau pour recupérer les users
   $user_data = $donnees['user'].',<i class="fas fa-list-alt" style="font-size:13px;color:#66FF8F;"></i>  modifié le  '.date('d-m-Y').'à  '.date('H:i').' par   <span class="edit"><i class="fas fa-user-edit" style="font-size:13px;color:#4e73df;"></i>'.$_SESSION['user'].'</span>';
   // convertir en chaine de caractère le tableau
   $user = explode(',',$user_data);
   
   $user_datas = implode(',',$user);
  
   $rev=$bds->prepare('SELECT email_ocd,id_chambre FROM bord_informations WHERE code= :code AND id_fact= :id AND email_ocd= :email_ocd');
   $rev->execute(array(':code'=>$session,
                      ':id'=>$id,
                      ':email_ocd'=>$_SESSION['email_ocd']));
   $donnes=$rev->fetchAll();
   $rev->closeCursor();
   // on regroupe tout les id_chambre dans un tableau deja facturé
   $arrays = [];
   foreach($donnes as $data){
	  $datas =$data['id_chambre'].',';
	  
	  $dats = explode(',',$datas);
	  
	  foreach($dats as $value){
		 
         $arrays[] = $value;		 
	  }
  }
	
	
	// definir les 2 tableau de date en fonction du type de réservation
	if($_POST['to']=="séjour" OR $_POST['to']=="réservation"){
	$dates1 =$_POST['days'];
	$dates2 =$_POST['das'];

	
	$dates1 = explode('-',$dates1);
	
	$j = $dates1[2];
	$mm = $dates1[1];
	$an = $dates1[0];
	
	$dates2 = explode('-',$dates2);
	
	$j1 = $dates2[2];
	$mm1 = $dates2[1];
	$an1 = $dates2[0];
	
	$debut_date = mktime(0, 0, 0, $mm, $j, $an);
     $fin_date = mktime(0, 0, 0, $mm1, $j1, $an);
	 
	 $tab = [];
	 $french = [];
	  for($i = $debut_date; $i <= $fin_date; $i+=86400)
     {
       
	   	   // date en francais
	   $data_french = date("d-m-Y",$i);
	   
	   $data_fren = explode(' ', $data_french);
	   
	   $dates =  date("Y-m-d",$i);
	   
	   $dates = explode(' ',$dates);
	   
	   foreach($dates as $dats){
		   
		 $tab[] = $dats;  
		   
	   }
	   
	   foreach($data_fren as $das){
		   
		 $french[] = $das;  
		   
	   }
	 }
	 
	 $datas = implode(',',$tab);
	 $datas_fren = implode(',',$french);// date en francais recupéré
	 
	} 
	
	if($_POST['to']=="horaire") {
	 
	 $dates3 =$_POST['tim'];
	 $dates4 =$_POST['tis'];
	  $array = [];
	  $dats = $dates3.'.'.$dates4;
	  $dats = explode('.',$dats);
	   
	   foreach($dats as $horaire){
		  $array[] = $horaire;  
	}
	  $horaires = implode(',',$array);
	  $datas_fren = implode(',',$array);// date en francais recupéré
	}
	
   // on recupére les variable fixe
   
   $dat =$_POST['dat']; // date d'enregistrement.
   $civilite = $_POST['civil']; // civilité
   $name = html_entity_decode(trim($_POST['name']));
   $client = html_entity_decode(trim($_POST['piece']));
   $adresse = html_entity_decode(trim($_POST['adresse']));
   $numero_compte=$_SESSION['email_ocd'];
   $email =$_SESSION['email_ocd'];
   $email1 =$_POST['email'];
   $code =$_SESSION['code'];
   $society =$_SESSION['society'];
   
   // recupere la value rde la somme pour le total html
   // on créer un tableau vide
   $tab = [];
   $som =$_POST['pay'];
   // transformation en chaine de caractère
   $som = implode(',',$som);
   // on transform en tableau les données
   $somme = explode(',',$som);
   
   foreach($somme as $value){
	   $tab[]= $value;
	 }
   // cacule du montant HTTc
   $sommes = array_sum($tab)*$_POST['nbjour']+$_POST['rep'];
   $somm = $sommes*$_POST['tva']/100 +$sommes;
   $taxe2 = $sommes*$_POST['tva']/100;
   
  $direction = $_POST['to'];
   // récupére les variable dans différentes cas possible de séjour
   $prix_repas =$_POST['rep'];
   
   // Type de moyens de paiment
   if(empty($_POST['paie1']) AND empty($_POST['paie2'])  AND empty($_POST['paie3']) AND empty($_POST['paie4'])){
	  $total =$_POST['mon']+$_POST['mont_ta'];	  
	 $data_status ='espéce :'.$total.',';   
   }
   
   if($_POST['paie1']=="0" AND $_POST['paie2']=="0"  AND $_POST['paie3']=="" AND $_POST['paie4']=="0"){
	  $total =$_POST['mon']+$_POST['mont_ta'];	  
	 $data_status ='espéce :'.$total.',';   
   }
   
   if(!empty($_POST['paie1'])) {
	   
	  $status1 = 'espéces :'.$_POST['paie1'].'xof';
	  $num1 =$_POST['paie1'];
   }
   
   else{
	   
	   $status1 = ' ';
	   $num1 ="0";
   }
   
   if(!empty($_POST['paie2'])) {
	   
	  $status2 = 'Carte Bancaire :'.$_POST['paie2'].'xof';
	  $num2 = $_POST['paie2'];
   }
   
   else{
	   
	   $status2 = ' ';
	   $num2="0";
   }
   
   if(!empty($_POST['paie3'])) {
	   
	  $status3 = 'Mobile  monney :'.$_POST['paie3'].'xof';
	  $num3= $_POST['paie3'];
   }
   
   else{
	   
	   $status3 = ' ';
	   $num3="0";
   }
   
   if(!empty($_POST['paie4'])) {
	   
	  $status4 = 'chéques :'.$_POST['paie4'].'xof';
	  $num4 = $_POST['paie4'];
   }
   
   else{
	   
	   $status4 = ' ';
	   $num4 ="0";
   }
   
   
   if(empty($_POST['taxe'])){
	   
	 $_POST['taxe']=0;  
   }
   
   if(empty($_POST['status'])){
	   
	 $_POST['status']=0; 
     $status =0;	 
   }
   
   if(empty($_POST['monts'])){
	   
	 $_POST['monts']=0;  
   }
   
   if(empty($_POST['tva'])) {
	   
	  $_POST['tva']==0; 
   }
   
   
   if($_POST['to']=="séjour") {
	   
	   if($_POST['acomp']==""){
		 
         $avance = 0;
         $reste =0;		 
	   }

      // date check in et check out
      $dat1= $_POST['days'];
      $dat2= $_POST['das'];
	  
	  $dat3 = date('H:i');
       $dat4 = date('H:i');
	   
	 $avance=$_POST['acomp'];
     $reste=$_POST['rest']; 
     $mode =1;
     $nombre_heures=0;	 
	 $rete_payer="";
     $encaisser="";
	 $nombre_jours =$_POST['nbjour'];
	 // date check in et chekout 
	 //time et time
	 $date1=$dat1;
     $date2=$dat2;
	 $time= date('H:i');
     $time1= date('H:i');
	 $tva =$_POST['tva'];
	 
	 if(!isset($_POST['mons'])){
		
     $total=0;		
	 }
	 
	 else{
		 
		 $total=$_POST['mons'];
	 }
	 
	 $ty="client facturé";
	 $status =$_POST['status'];
	 $total1 =$_POST['mon'];
	 
	 $mont = $donnees['montant']-$donnees['mont_tva']+floatval($prix_repas)+$total;
	 $monts = $mont+$mont*$tva/100;
	 $taxe = $mont*$tva/100;
	 // montant à ajouter sur tresorie_customer
	 $totals = $total + $total*$tva/100;
	 $reste= floatval($monts)- floatval($avance);
	 $data_status = $status1.','.$status2.','.$status3.','.$status4;
	 $data_num = $num1.','.$num2.','.$num3.','.$num4;
	 $status =$data_status;
	 
	
   }
   
 if($_POST['to']=="réservation") {
	   
	 if($_POST['acomp']==""){
		 
         $avance = 0;
         $reste =0;		 
	   }
	   
	   
	   // date check in et check out
      $dat1= $_POST['days'];
      $dat2= $_POST['das'];
	 
	 $avance=$_POST['acomp'];
     $reste=$_POST['rest'];
     $mode =3;	 
	 $rete_payer=$reste;
     $encaisser=$avance;
	 $nombre_jours =$_POST['nbjour'];
	 // date check in et chekout 
	 //time et time
	 $date1=$dat1;
     $date2=$dat2;
	 $time= date('H:i');
     $time1=date('H:i');
     $tva =$_POST['tva'];
	
	if(!isset($_POST['mons'])){
	 $total=0;		
	 }
	 
	 else{
		 
		$total =$_POST['mons'];
	 }
    
     $ty="réservation client";
	 $status =$_POST['status'];
	 
	 if(!isset($_POST['mon'])){
		$total1=0;
	 }
	 
	 else{
     $total1 = $_POST['mon'];
	 }
     
	 $mont = $donnees['montant']-$donnees['mont_tva']+floatval($prix_repas)+$total;
	 $monts = $mont+$mont*$tva/100;
	 $taxe = $mont*$tva/100;
	 // montant à ajouter sur tresorie_customer
	 $totals = $total + $total*$tva/100;
	 	 
	 $taxe = $monts*$tva/100;
	 $reste= floatval($total+$total1)- floatval($avance);
	 $data_status = $status1.','.$status2.','.$status3.','.$status4;
	 $data_num = $num1.','.$num2.','.$num3.','.$num4;
	 $status =$data_status;
   }
   
 if($_POST['to']=="horaire") {
	   
	  if($_POST['acomp']==""){
		 
         $avance = 0;
         $reste =0;		 
	   }
	   
	   // date check in et check out
      $dat1= $_POST['days'];
      $dat2= $_POST['das'];
	  
	   $dat3 = $_POST['tim'];
       $dat4 = $_POST['tis'];
	   
	  $avance=$_POST['acomp'];
     
	   
     $mode =2;	 
	 $rete_payer="";
     $encaisser="";
     $nombre_heures=0;
	 $nombre_jours = $_POST['nbjour'];
	 // date check in et chekout 
	 //time et time
	 $date1=date('Y-m-d');
     $date2=date('Y-m-d');
	 $time=$dat3;
     $time1=$dat4;
     $tva =$_POST['tva'];
	 
	 if(!isset($_POST['mons'])){
		
     $total=0;		
	 }
	 
	 else{
     $total = $_POST['mons'];
	 }
	 
	 if(!isset($_POST['mon'])){
		$total1=0;
	 }
	 
	 else{
		 
		$total1 =$_POST['mon']; 
	 }
	 
	 $total1 =$_POST['mon'];
     $ty= "horaire client"; 
     $status =$_POST['status'];	 
	 //calcule des montants
     $mont = $donnees['montant']-$donnees['mont_tva']+floatval($prix_repas)+$total;
	 $monts = $mont+$mont*$tva/100;
	 $taxe = $mont*$tva/100;
	 
	 // montant à ajouter sur tresorie_customer
	 $totals = $total + $total*$tva/100;
	 
	 $reste= floatval($total+$total1)- floatval($avance);
     $taxe = $monts*$tva/100;
     $data_status = $status1.','.$status2.','.$status3.','.$status4;
	 $data_num = $num1.','.$num2.','.$num3.','.$num4; 
	 $status =$data_status;
	}

   // récupérer les variables en boucles
   
   $chambre = $_POST['chambre'];
   $montant =$_POST['pay'];
   $id_chambre = $_POST['id_chambre'];
   $type = $_POST['typ'];

   
   // boucler sur les valeurs pour entrer les données dans la bdd

   // on peut modifier la facture 4fois 
   
   if($result < 1300){

   if($_POST['to']=="séjour" OR $_POST['to']=="réservation"){

    

   for($count=0;  $count<count($_POST['chambre']); $count++){ 
   
     $name_chambre = $chambre[$count];
	 $montants = $montant[$count];
	 $ids_chambre = $id_chambre[$count];
	 $types = $type[$count];
	 //
		// on redirige vers la page
		 echo'<div id="pak"></div>
             <div class="enre"><div><i class="fas fa-check-circle" style="color:green;font-size:20px;"></i>Le séjour du client  <i class="far fa-user" style="color:green;font-size:20px;"></i>  <span class="nam">'.$name.'</span> à été bien modifié </div>
		     <div class="dr">'.$ty.'</div>
			 <div class="dep"><i class="fa fa-hourglass-end" aria-hidden="true" style="color:green;font-size:15px;"></i></div></div>
             <meta http-equiv="Refresh" content="4; url=//localhost/tresorie_ocd/gestion_facture_customer.php"/>';
		
	// verifier sur l'id_chambre est deja dans le tableau
	if(!in_array($ids_chambre,$arrays)){
	// on insere les données dans la bds-
		$rey=$bds->prepare('INSERT INTO bord_informations (email_ocd,id_chambre,type_logement,dat,chambre,check_in,check_out,time1,time2,date1,date2,montant,mode,mont_restant,encaisser,rete_payer,id_fact,type,code) 
		VALUES(:email_ocd,:id_chambre,:type_logement,:dat,:chambre,:check_in,:check_out,:time1,:time2,:date1,:date2,:montant,:mode,:mont_restant,:encaisser,:rete_payer,:id_fact,:type,:code)');
	     $rey->execute(array(':email_ocd'=>$email,
	                        ':id_chambre'=>$ids_chambre,
						    ':type_logement'=>$types,
					        ':dat'=>$dat,
						    ':chambre'=>$name_chambre,
					        ':check_in'=>$date1,
						    ':check_out'=>$date2,
							':time1'=>$time,
							':time2'=>$time1,
						    ':date1'=>$date1,
						    ':date2'=>$date2,
						    ':montant'=>$montants,
						    ':mode'=>$mode,
						    ':mont_restant'=>$reste,
						    ':encaisser'=>$encaisser,
						    ':rete_payer'=>$rete_payer,
		                    ':id_fact'=>$id,
						    ':type'=>$ty,
							':code'=>$session

						  ));
				
	           
                	
                // on recupére les date dans la base de donnnées.
	     $reys=$bds->prepare('INSERT INTO home_occupation (id_local,email_ocds,date,date_french,dates,id_fact,type,code) 
		 VALUES(:id_local,:email_ocds,:date,:date_french,:dates,:id_fact,:type,:code)');
		 $dates ="";
		 $reys->execute(array(':id_local'=>$ids_chambre,
		                      ':email_ocds'=>$_SESSION['email_ocd'],
		                      ':date'=>$datas,
							  ':date_french'=>$datas_fren,
							  ':dates'=>$dates,
							  ':id_fact'=>$id,
							  ':type'=>$mode,
							  ':code'=>$session
	                        ));				
		}
       }
	  
	   // update sur moyen paiment
	    // modifie les moyens de paiment si possible
	   // on modifie les données de la base de données guide
        $rev=$bds->prepare('UPDATE moyen_tresorie SET date= :ds, montant= :mont, montant1= :mont1, montant2= :mont2, montant3= :mont3 WHERE code= :code AND email_ocd= :email_ocd AND id_fact= :id');
        $rev->execute(array(':ds'=>$dat,
		                    ':mont'=>$num1,
					        ':mont1'=>$num2,
							':mont2'=>$num3,
							':mont3'=>$num4,
							':code'=>$session,
							':id'=>$id,
                            ':email_ocd'=>$_SESSION['email_ocd']
					 ));

       	// on modifie les données de la table home_occupation
         $ret=$bds->prepare('UPDATE facture SET date= :des, civilite= :ds, adresse= :rs, check_in= :cke, check_out= :cko, time= :tim1, time1= :tim2,
		  nombre= :nbr, numero= :num, user= :us, clients= :client, piece_identite= :pc, montant= :mont, avance= :avc,
		  reste= :rest, montant_repas= :mont_rep, tva= :tv, mont_tva= :mtva, remise= :remi, type= :ty,
		  moyen_paiement= :moyen_paie, data_montant= :data_mont, types= :typ, search_date= :sh WHERE code= :code AND email_ocd= :email_ocd AND id_fact= :id');
        $ret->execute(array(':des'=>$dat,
		                    ':ds'=>$civilite,
							':rs'=>$adresse,
							':cke'=>$date1,
							':cko'=>$date2,
							':tim1'=>$time,
							':tim2'=>$time1,
							':nbr'=>$nombre_jours,
							':num'=>$_POST['numero'],
							':us'=>$user_datas,
							':client'=>$name,
							':pc'=>$client,
							':mont'=>$somm,
							':avc'=>$avance,
							':rest'=>$reste,
							':mont_rep'=>$prix_repas,
							':tv'=>$tva,
							':mtva'=>$taxe2,
							':remi'=>$_POST['remise'],
							':ty'=>$mode,
							':moyen_paie'=>$status,
							':data_mont'=>$data_num,
							':typ'=>$ty,
							':id'=>$id,
							':code'=>$session,
                            ':email_ocd'=>$_SESSION['email_ocd'],
							':sh'=>$mms
					 ));
            				  
			
			
		
 		// on modifie les données de la base de données guide
        $ret=$bds->prepare('UPDATE tresorie_customer SET encaisse= :des, reservation= :reser, reste= :res WHERE code= :code AND email_ocd= :email_ocd');
          $ret->execute(array(':des'=>$donns['encaisse']-$donnees['montant']+$somm,
		                    ':res'=>$donns['reste']-$donnees['reste']+$reste,
					        ':reser'=>$donns['reservation']-$donnees['avance']+$avance,
                            ':code'=>$session,
							':email_ocd'=>$_SESSION['email_ocd']
					 ));
					
					 
			// on detruire le tableau de session des données
				unset($_SESSION['add_home']);

       }
   
   
   else{
	   
	   
	   for($count=0;  $count<count($_POST['chambre']); $count++){ 
   
     $name_chambre = $chambre[$count];
	 $montants = $montant[$count];
	 $ids_chambre = $id_chambre[$count];
	 $types = $type[$count];
	
			 echo'<div id="pak"></div>
             <div class="enre"><div><i class="fas fa-check-circle" style="color:green;font-size:20px;"></i>Le séjour du client  <i class="far fa-user" style="color:green;font-size:20px;"></i>  <span class="nam">'.$name.'</span> à été bien modifié </div>
		     <div class="dr">'.$ty.'</div>
			 <div class="dep"><i class="fa fa-hourglass-end" aria-hidden="true" style="color:green;font-size:15px;"></i></div></div>
             <meta http-equiv="Refresh" content="4; url=//localhost/tresorie_ocd/gestion_facture_customer.php"/>';
		// on insere les données dans la bds-
		
		// delete bord_informations 
        // verifier sur l'id_chambre est deja dans le tableau
	if(!in_array($ids_chambre,$arrays)){
		
		$rey=$bds->prepare('INSERT INTO bord_informations (email_ocd,id_chambre,type_logement,dat,chambre,check_in,check_out,time1,time2,date1,date2,montant,mode,mont_restant,encaisser,rete_payer,id_fact,type,code) 
		VALUES(:email_ocd,:id_chambre,:type_logement,:dat,:chambre,:check_in,:check_out,:time1,:time2,:date1,:date2,:montant,:mode,:mont_restant,:encaisser,:rete_payer,:id_fact,:type,:code)');
	     $rey->execute(array(':email_ocd'=>$email,
	                        ':id_chambre'=>$ids_chambre,
						    ':type_logement'=>$types,
					        ':dat'=>$dat,
						    ':chambre'=>$name_chambre,
					        ':check_in'=>$date1,
						    ':check_out'=>$date2,
							':time1'=>$time,
							':time2'=>$time1,
						    ':date1'=>$date1,
						    ':date2'=>$date2,
						    ':montant'=>$montants,
						    ':mode'=>$mode,
						    ':mont_restant'=>$reste,
						    ':encaisser'=>$encaisser,
						    ':rete_payer'=>$rete_payer,
		                    ':id_fact'=>$id,
						    ':type'=>$ty,
							':code'=>$session
						  ));
						  
					
					
                // on recupére les date dans la base de donnnées.
	     $reys=$bds->prepare('INSERT INTO home_occupation (id_local,email_ocds,date,date_french,dates,id_fact,type,code) 
		 VALUES(:id_local,:email_ocds,:date,:date_french,:dates,:id_fact,:type,:code)');
		 $dates ="";
		 $reys->execute(array(':id_local'=>$ids_chambre,
		                      ':email_ocds'=>$_SESSION['email_ocd'],
		                      ':date'=>$datas,
							  ':date_french'=>$datas_fren,
							  ':dates'=>$dates,
							  ':id_fact'=>$id,
							  ':type'=>$mode,
							  ':code'=>$session
	                        ));		
			 }    				
		
	  }
	  
	   // modifie les moyens de paiment si possible
	   // on modifie les données de la base de données guide
       $res=$bds->prepare('UPDATE moyen_tresorie SET date= :ds, montant= :mont, montant1= :mont1, montant2= :mont2, montant3= :mont3 
	   WHERE code= :code AND email_ocd= :email_ocd AND id_fact= :id');
        $res->execute(array(':ds'=>$dat,
		                    ':mont'=>$num1,
					        ':mont1'=>$num2,
							':mont2'=>$num3,
							':mont3'=>$num4,
							':code'=>$session,
							':id'=>$id,
							':email_ocd'=>$_SESSION['email_ocd']
					 ));
           
	   
	   // Action update sur facture 
         $reg=$bds->prepare('UPDATE facture SET date= :des, civilite= :ds, adresse= :rs, check_in= :cke, check_out= :cko, time= :tim1, time1= :tim2,
		  nombre= :nbr, numero= :num, user= :us, clients= :client, piece_identite= :pc, montant= :mont, avance= :avc,
		  reste= :rest, montant_repas= :mont_rep, tva= :tv, mont_tva= :mtva, remise= :remi, type= :ty,
		  moyen_paiement= :moyen_paie, data_montant= :data_mont, types= :typ, search_date= :sh WHERE code= :code AND email_ocd= :email_ocd AND id_fact= :id');
          $reg->execute(array(':des'=>$dat,
		                    ':ds'=>$civilite,
							':rs'=>$adresse,
							':cke'=>$date1,
							':cko'=>$date2,
							':tim1'=>$time,
							':tim2'=>$time1,
							':nbr'=>$nombre_jours,
							':num'=>$_POST['numero'],
							':us'=>$user_datas,
							':client'=>$name,
							':pc'=>$client,
							':mont'=>$somm,
							':avc'=>$avance,
							':rest'=>$reste,
							':mont_rep'=>$prix_repas,
							':tv'=>$tva,
							':mtva'=>$taxe2,
							':remi'=>$_POST['remise'],
							':ty'=>$mode,
							':moyen_paie'=>$status,
							':data_mont'=>$data_num,
							':typ'=>$ty,
							':id'=>$id,
                            ':email_ocd'=>$_SESSION['email_ocd'],
							':code'=>$session,
							':sh'=>$mms
					 ));
            				
		 // on modifie les données de la base de données guide
        $ret=$bds->prepare('UPDATE tresorie_customer SET encaisse= :des, reservation= :reser, reste= :res WHERE code= :code AND email_ocd= :email_ocd');
        $ret->execute(array(':des'=>$donns['encaisse']-$donnees['montant']+$somm,
		                    ':res'=>$donns['reste']-$donnees['reste']+$_POST['rest'],
					        ':reser'=>$donns['reservation']-$donnees['montant']+$_POST['acomp'],
							':code'=>$session,
                            ':email_ocd'=>$_SESSION['email_ocd']
					 ));
           
         		   
					 
			// on detruire le tableau de session des données
				unset($_SESSION['add_home']);


             		 
   }
   }
   else{
	   
	   echo'<div id="pak"></div>
             <div class="enre"><i class="fas fa-check-circle" style="color:red;font-size:20px;"></i>Vous pouvez plus modifier cette facture
		     <div class="dep"><i class="fa fa-hourglass-end" aria-hidden="true" style="color:red;font-size:13px;"></i></div></div>
             <meta http-equiv="Refresh" content="3; url=//localhost/tresorie_ocd/gestion_facture_customer.php"/>';
   }
   
   
  }
   catch(Exception $e)
  {
die('Erreur : '.$e->getMessage());
 }  

?>