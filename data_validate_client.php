<?php
include('connecte_db.php');
include('inc_session.php');

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
.enre{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;color:black;z-index:4;position:absolute;top:100px;left:40%;border:2px solid white;font-family:arial;font-size:18px;width:280px;height:200px;padding:2%;text-align:center;background-color:white;
}
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
	
	 // recuperer la permission pour afficher le checkout
   	// emttre la requete sur le fonction
    $rel=$bdd->prepare('SELECT permission,code,society FROM inscription_client WHERE email_user= :email_user');
    $rel->execute(array(':email_user'=>$_SESSION['email_user']));
	$donns =$rel->fetch();
	
	if($donns['code']==0){
		$session = $donns['code'];
		}
		
		else{
		$session=$donns['code'];
		}
		
		if($donns['permission']=="user:boss"){
			$calls="";
		}
		
		if($donns['permission']=="user:gestionnaire"){
			if($donns['code']==0){
			$calls='transmis par le gestionnaire';
			}
			else{
			$calls='Gestionnaire de '.$donns['society'].'';
			}
		}
		
		if($donns['permission']=="user:employes"){
			if($donns['code']==0){
			$calls='réceptionniste';
			}
			
			else{
				$calls='Récéptionniste de '.$donns['society'].'';
			}
		}
		
	
   $rej=$bds->prepare('SELECT email_ocd,montant,encaisse,reste,reservation,code FROM tresorie_customer WHERE code= :code AND email_ocd= :email_ocd');
   $rej->execute(array(':code'=>$session,
                       ':email_ocd'=>$_SESSION['email_ocd']));
   $donns=$rej->fetch();
	$rej->closeCursor();
	
	
	
	// fixer les numero de facture
	$reb=$bds->prepare('SELECT id_fact FROM facture WHERE code= :code AND email_ocd= :email_ocd ORDER BY id DESC');
   $reb->execute(array(':code'=>$session,
                       ':email_ocd'=>$_SESSION['email_ocd']));
   $donnes=$reb->fetch();
	$reb->closeCursor();
	
	if(empty($donnes)) {
	 
     $id_fact=0.00001;	 
		
	}
	
	else{
	$mt = $donnes['id_fact'];
	$mt = floatval($mt);
	$id_fact=$mt+0.00001;
	}
	
	// definir les varaible au cas de sejour
	if($_POST['to']=="séjour" OR $_POST['to']=="réservation"){
	$dates1 =$_POST['days'];
	$dates2 =$_POST['das'];

	$dates1 = explode('-',$dates1);
	$j = $dates1[2];
	$mm = $dates1[1]; // période de recherche des factures.
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
       $dates =  date("Y-m-d",$i);
	   
	   // date en francais
	   $data_french = date("d-m-Y",$i);
	   $data_fren = explode(' ', $data_french);
	   $dates = explode(' ',$dates);
	   
	   foreach($dates as $dats){
		   $tab[] = $dats;  
		 }
	   
	   foreach($data_fren as $das){
		   $french[] = $das;  
		 }
	  }
	 
	 $datas = implode(',',$tab);// format en anglais recupère avec Mysql
	 $datas_fren = implode(',',$french);// date en francais recupéré
	 
	} 
	
	// on defini le séjour au cas de variable horaire
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
	  $datas_fren = implode(',',$array);
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
   $session = $donns['code'];
   
   
    $dat1 = explode('-',$_POST['dat']);
	
	$js = $dat1[2];
	$mms = $dat1[1];// recuperation search_date
	$ans = $dat1[0];
	
	// recupere les mois pour les recherches de facture.
	if($mms=="01"){
	 $mm="Janvier";
	}
	elseif($mms=="02"){
	$mm="Février";
    }
	elseif($mms=="03"){
	$mm="Mars";
	}
	elseif($mms=="04"){
	  $mm="Avril";	
	}
    elseif($mms=="05"){
      $mm="Mai";
    }
    elseif($mms=="06"){
	  $mm="Juin";	
	}
    elseif($mms=="07"){
      $mm="Juillet";
    }
	elseif($mms=="08"){
	$mm="Août";
	}
	elseif($mms=="09"){
	$mm="Septembre";
	}
	elseif($mms=="10"){
	  $mm="Octobre";	
	}
    elseif($mms=="11"){
      $mm="Novembre";
    }
	else{
	  $mm="Décembre";	
	}
	
   $user_data = '<i class="fas fa-pen"style="color:green;font-size:13px;"></i> edité le  '.$js.'/'.$mms.'/'.$ans.' à '.date('H:i').'  par  '.$_SESSION['user'].'';
   
   $direction = $_POST['to'];
   // récupére les variable dans différentes cas possible de séjour
   
   $prix_repa =$_POST['monts'];
   $prix_repas =floatval($prix_repa)*18/100;
   
   if(empty($_POST['taxe'])){
	   
	 $_POST['taxe']=0;  
   }
   
   if(empty($_POST['paie1']) AND empty($_POST['paie2'])  AND empty($_POST['paie3']) AND empty($_POST['paie4'])){
	  $total =$_POST['total']+$_POST['taxe'];	  
	 $data_status ='espéce :'.$total.',';   
   }
   
     if(!empty($_POST['paie1'])) {
	   $status1 = 'espéces :'.$_POST['paie1'].' xof';
	  $num1 =$_POST['paie1'];
   }
   
   else{
	   $status1 = ' ';
	   $num1 ="0";
   }
   
   if(!empty($_POST['paie2'])) {
	   $status2 = 'Carte Bancaire :'.$_POST['paie2'].' xof';
	   $num2 = $_POST['paie2'];
   }
   else{
	   
	   $status2 = ' ';
	   $num2="0";
   }
   
   if(!empty($_POST['paie3'])) {
	   $status3 = 'Mobile  monney :'.$_POST['paie3'].' xof';
	  $num3= $_POST['paie3'];
   }
   
   else{
	   $status3 = ' ';
	   $num3="0";
   }
   
   if(!empty($_POST['paie4'])) {
	   $status4 = 'chéques :'.$_POST['paie4'].' xof';
	  $num4 = $_POST['paie4'];
   }
   
   else{
	   
	   $status4 = ' ';
	   $num4 ="0";
   }
   //
   
   
   
   if(empty($_POST['status'])){
	   
	 $_POST['status']=0; 
     $status =0;	 
   }
   
   if(empty($_POST['monts'])){
	   $_POST['monts']=0;  
   }
   
   if(empty($_POST['tva'])) {
	   $_POST['tva']=0; 
   }
   
   if(empty($_POST['remise'])){
	   $_POST['remise']=0;
   }
   
   
   if($_POST['to']=="séjour") {
	   
	   if($_POST['account']==""){
		 
         $avance = 0;
         $reste =0;		 
	   }

      // date check in et check out
      $dat1= $_POST['days'];
      $dat2= $_POST['das'];
	  
	  $dat3 = date('H:i');
       $dat4 = date('H:i');
	   
	 $avance=$_POST['account'];
     $reste=$_POST['rpay']; 
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
	 $taxe =$_POST['taxe'];
	 $total =$_POST['total'];
	 $ty="client facturé";
	 $data_status = $status1.','.$status2.','.$status3.','.$status4;
	 $data_num = $num1.','.$num2.','.$num3.','.$num4;
	 $status =$data_status;
	 
	 $monts = $total+floatval($prix_repas)+floatval($taxe);
   }
   
 if($_POST['to']=="réservation") {
	   
	 if($_POST['account']==""){
		 
         $avance = 0;
         $reste =0;		 
	   }
	   
	   
	   // date check in et check out
      $dat1= $_POST['days'];
      $dat2= $_POST['das'];
	 
	 $avance=$_POST['account'];
     $reste=$_POST['rpay'];
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
	 $taxe =$_POST['taxe'];
     $total = $_POST['total'];
     $ty="réservation client";
	 $data_status = $status1.','.$status2.','.$status3.','.$status4;
	 $data_num = $num1.','.$num2.','.$num3.','.$num4;
	 $status =$data_status;
     
     $monts =$total+floatval($prix_repas)+$taxe;	 
	   
   }
   
 if($_POST['to']=="horaire") {
	   
	  if($_POST['account']==""){
		 
         $avance = 0;
         $reste =0;		 
	   }
	   
	   // date check in et check out
      $dat1= $_POST['days'];
      $dat2= $_POST['das'];
	  
	   $dat3 = $_POST['tim'];
       $dat4 = $_POST['tis'];
	   
	   $avance=$_POST['account'];
     $reste=$_POST['rpay'];
	   
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
	 $taxe =$_POST['taxe'];
     $total = $_POST['total'];
     $ty= "horaire client";
     $data_status = $status1.','.$status2.','.$status3.','.$status4;
     $data_num = $num1.','.$num2.','.$num3.','.$num4; 
     $status =$data_status;
	  
     $monts =$total+floatval($prix_repas)+$taxe;	  
	}

   // récupérer les variables en boucles
   
   $chambre = $_POST['chambre'];
   $montant =$_POST['pay'];
   $id_chambre = $_POST['id_chambre'];
   $type = $_POST['typ'];

   
   // boucler sur les valeurs pour entrer les données dans la bdd

   if($_POST['to']=="séjour" OR $_POST['to']=="réservation"){

   for($count=0;  $count<count($_POST['chambre']); $count++){ 
   
     $name_chambre = $chambre[$count];
	 $montants = $montant[$count];
	 $ids_chambre = $id_chambre[$count];
	 $types = $type[$count];
	 
		// on redirige vers la page
		 echo'<div id="pak"></div>
             <div class="enre"><div><i class="fas fa-check-circle" style="color:green;font-size:20px;"></i>Le séjour du client  <i class="far fa-user" style="color:green;font-size:20px;"></i>  <span class="nam">'.$name.'</span> à été bien effectué<br/></div>
			 <div class="dr">'.$ty.'</div>
		     <div class="dep"><i class="fa fa-hourglass-end" aria-hidden="true" style="color:green;font-size:15px;"></i></div></div>
             <meta http-equiv="Refresh" content="3; url=//localhost/tresorie_ocd/gestion_facture_customer.php"/>';
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
		                    ':id_fact'=>$id_fact,
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
							  ':id_fact'=>$id_fact,
							  ':type'=>$mode,
							  ':code'=>$session
	                        ));				
			}
			
			// insert dans moyen_tresorie  
			$res=$bds->prepare('INSERT INTO moyen_tresorie (date,email_ocd,email_user,id_fact,montant,montant1,montant2,montant3,code) 
		 VALUES(:date,:email_ocd,:email_user,:id_fact,:montant,:montant1,:montant2,:montant3,:code)');
		 
		 $res->execute(array( ':date'=>$dat,
		                      ':email_ocd'=>$_SESSION['email_ocd'],
		                      ':email_user'=>$_SESSION['email_user'],
							  ':id_fact'=>$id_fact,
		                      ':montant'=>$num1,
							  ':montant1'=>$num2,
							  ':montant2'=>$num3,
							  ':montant3'=>$num4,
							  ':code'=>$session
	                        ));	
	  
	   // insertion des données dans la table facture
		$rev=$bds->prepare('INSERT INTO facture (date,civilite,email_ocd,adresse,check_in,check_out,time,time1,nombre,email_client,numero,user,clients,piece_identite,montant,avance,reste,montant_repas,tva,mont_tva,remise,id_fact,type,moyen_paiement,data_montant,types,code,society,calls,search_date) VALUES(:date,:civilite,:email_ocd,:adresse,:check_in,:check_out,:time,:time1,:nombre,:email_client,:numero,:user,:clients,:piece_identite,:montant,:avance,:reste,:montant_repas,:tva,:mont_tva,:remise,
		:id_fact,:type,:moyen_paiement,:data_montant,:types,:code,:society,
		:calls,:search_date)');
	     $rev->execute(array(':date'=>$dat,
		                     ':civilite'=>$civilite,
		                    ':email_ocd'=>$email,
							':adresse'=>$adresse,
							':check_in'=>$date1,
							':check_out'=>$date2,
							':time'=>$time,
							':time1'=>$time1,
							':nombre'=>$nombre_jours,
							':email_client'=>$email1,
						    ':numero'=>$_POST['numero'],
					        ':user'=>$user_data,
						    ':clients'=>$name,
						    ':piece_identite'=>$client,
						    ':montant'=>$monts,
							':avance'=>$avance,
						    ':reste'=>$reste,
							':montant_repas'=>$prix_repas,
						    ':tva'=>$tva,
							':mont_tva'=>$taxe,
							':remise'=>$_POST['remise'],
						    ':id_fact'=>$id_fact,
							':type'=>$mode,
							':moyen_paiement'=>$status,
							':data_montant'=>$data_num,
							':types'=>$ty,
							':code'=>$session,
							':society'=>$_SESSION['society'],
							':calls'=>$calls,
							':search_date'=>$mm
							
						  ));
            				  
						  
			// on modifie les données de la base de données guide
        
         $ret=$bds->prepare('UPDATE tresorie_customer SET encaisse= :des, reservation= :reser, reste= :res WHERE code= :code AND email_ocd= :email_ocd');
        $ret->execute(array(':des'=>$donns['encaisse']+$monts,
		                    ':res'=>$donns['reste']+$reste,
					        ':reser'=>$donns['reservation']+$avance,
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
	    //
			
		  echo'<div id="pak"></div>
             <div class="enre"><div><i class="fas fa-check-circle" style="color:green;font-size:20px;"></i>Le séjour du client  <i class="far fa-user" style="color:green;font-size:20px;"></i>  <span class="nam">'.$name.'</span> à été bien effectué<br/></div>
			 <div class="dr">'.$ty.'</div>
		     <div class="dep"><i class="fa fa-hourglass-end" aria-hidden="true" style="color:green;font-size:15px;"></i></div></div>
             <meta http-equiv="Refresh" content="3; url=//localhost/tresorie_ocd/gestion_facture_customer.php"/>';
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
		                    ':id_fact'=>$id_fact,
						    ':type'=>$ty,
							':code'=>$session
						  ));
						  
					// on recupére les date dans la base de donnnées.
	     $reys=$bds->prepare('INSERT INTO home_occupation (id_local,email_ocds,date,date_french,dates,id_fact,type,code) 
		 VALUES(:id_local,:email_ocds,:date,:date_french,:dates,:id_fact,:type,:code)');
		 $reys->execute(array(':id_local'=>$ids_chambre,
		                      ':email_ocds'=>$_SESSION['email_ocd'],
		                      ':date'=>$horaires,
							  ':date_french'=>$datas_fren,
							  ':dates'=>$dat,
							  ':id_fact'=>$id_fact,
							  ':type'=>$mode,
							  ':code'=>$session,
	                        ));		
		
	         }
			 
			// insert dans moyen_tresorie  
			$res=$bds->prepare('INSERT INTO moyen_tresorie (date,email_ocd,email_user,id_fact,montant,montant1,montant2,montant3,code) 
		 VALUES(:date,:email_ocd,:email_user,:id_fact,:montant,:montant1,:montant2,:montant3,:code)');
		 
		 $res->execute(array(':date'=>$dat,
		                     ':email_ocd'=>$_SESSION['email_ocd'],
		                      ':email_user'=>$_SESSION['email_user'],
							  ':id_fact'=>$id_fact,
		                      ':montant'=>$num1,
							  ':montant1'=>$num2,
							  ':montant2'=>$num3,
							  ':montant3'=>$num4,
							  ':code'=>$session
	                        ));	 
			 
	   // insertion des données dans la table facture
		$rev=$bds->prepare('INSERT INTO facture (date,civilite,email_ocd,adresse,check_in,check_out,time,time1,nombre,email_client,numero,user,clients,piece_identite,montant,avance,reste,montant_repas,tva,mont_tva,remise,id_fact,type,moyen_paiement,data_montant,types,code,society,calls,search_date) 
		VALUES(:date,:civilite,:email_ocd,:adresse,:check_in,:check_out,:time,:time1,:nombre,:email_client,:numero,:user,:clients,:piece_identite,:montant,:avance,:reste,:montant_repas,:tva,:mont_tva,:remise,:id_fact,:type,:moyen_paiement,:data_montant,:types,:code,:society,:calls,
		:search_date)');
	     $rev->execute(array(':date'=>$dat,
		                     ':civilite'=>$civilite,
		                    ':email_ocd'=>$email,
							':adresse'=>$adresse,
							':check_in'=>$date1,
							':check_out'=>$date2,
							':time'=>$time,
							':time1'=>$time1,
							':nombre'=>$nombre_jours,
							':email_client'=>$email1,
						    ':numero'=>$_POST['numero'],
					        ':user'=>$user_data,
						    ':clients'=>$name,
						    ':piece_identite'=>$client,
						    ':montant'=>$monts,
							':avance'=>$avance,
						    ':reste'=>$reste,
							':montant_repas'=>$prix_repas,
						    ':tva'=>$tva,
							':mont_tva'=>$taxe,
							':remise'=>$_POST['remise'],
						    ':id_fact'=>$id_fact,
							':type'=>$mode,
							':moyen_paiement'=>$status,
							':data_montant'=>$data_num,
							':types'=>$ty,
							':code'=>$session,
							':society'=>$_SESSION['society'],
							':calls'=>$calls,
							':search_date'=>$mm
						  ));
						  
						  
			// on modifie les données de la base de données guide
		 
         $ret=$bds->prepare('UPDATE tresorie_customer SET encaisse= :des, reservation= :reser, reste= :res WHERE code= :code AND email_ocd= :email_ocd');
        $ret->execute(array(':des'=>$donns['encaisse']+$monts,
		                    ':res'=>$donns['reste']+$reste,
					        ':reser'=>$donns['reservation']+$avance,
							':code'=>$session,
                            ':email_ocd'=>$_SESSION['email_ocd']
					 ));

        			// on detruire le tableau de session des données
				unset($_SESSION['add_home']);
		}
  }
   catch(Exception $e)
  {
die('Erreur : '.$e->getMessage());
 }  

?>