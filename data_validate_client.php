<?php

include('connecte_db.php');
include('inc_session.php');


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
	
   $rej=$bds->prepare('SELECT email_ocd,montant,encaisse,reste,reservation FROM tresorie_customer WHERE email_ocd= :email_ocd');
   $rej->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
   $donns=$rej->fetch();
	$rej->closeCursor();
	
	
	$reb=$bds->prepare('SELECT id_fact FROM facture WHERE email_ocd= :email_ocd ORDER BY id DESC');
   $reb->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
   $donnes=$reb->fetch();
	$reb->closeCursor();
	
	if(empty($donnes)) {
	 
     $id_fact=0.0001;	 
		
	}
	
	else{
	$mt = $donnes['id_fact'];
	$mt = floatval($mt);
	$id_fact=$mt+0.0001;
		
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
   
   
   $direction = $_POST['to'];
   // récupére les variable dans différentes cas possible de séjour
   
   $prix_repas =$_POST['monts'];
   
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
	 $status =$_POST['status'];
	 
	 $monts = $total+$taxe+ floatval($prix_repas);
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
	 $status =$_POST['status'];
     
     $monts =$total+$taxe+floatval($prix_repas);	 
	   
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
     $status =$_POST['status'];	 
	  
     $monts =$total+$taxe+floatval($prix_repas);	  
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
	 
	 
	 // 
	 
	  $reb=$bds->prepare('SELECT dat,email_ocd,id,id_chambre,id_fact,check_in,check_out,time1,time2 FROM bord_informations WHERE id_chambre= :id_chambre');
      $reb->execute(array(':id_chambre'=>$ids_chambre));
      $dos=$reb->fetch();
	  $reb->closeCursor();
		
		
			
			$result1 =$dos['check_out'];
			$result2 = $dos['check_in'];
			$d1=$dat1;
	        $d2=$dat2;
			$dats = $dos['dat'];
			$_POST['dat'] == $dats;
		
		
	
	    if($result1 > $d1){
		echo'<div class="erro">l\'une de vos chambres occupée à ces dates</div>';
			
		}
		
		elseif($result1==$d1 AND $result2==$d2){
		
        echo'<div class="erro">l\'une de vos chambres occupée à ces dates</div>';		
			
		}
		
		elseif($result2 > $d2) {
		echo'<div class="erro">l\'une de vos chambres occupée à ces dates</div>';
		}
		
		else{
			
			
		// on insere les données dans la bds-
		$rey=$bds->prepare('INSERT INTO bord_informations (email_ocd,id_chambre,type_logement,dat,chambre,check_in,check_out,time1,time2,date1,date2,montant,mode,mont_restant,encaisser,rete_payer,id_fact,type) 
		VALUES(:email_ocd,:id_chambre,:type_logement,:dat,:chambre,:check_in,:check_out,:time1,:time2,:date1,:date2,:montant,:mode,:mont_restant,:encaisser,:rete_payer,:id_fact,:type)');
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
						    ':type'=>$ty
						  ));
						  
						  
		
		
	  
	  
	   // insertion des données dans la table facture
		$rev=$bds->prepare('INSERT INTO facture (date,civilite,email_ocd,adresse,check_in,check_out,time,time1,nombre,email_client,numero,user,clients,piece_identite,montant,avance,reste,tva,id_fact,type,status) 
		VALUES(:date,:civilite,:email_ocd,:adresse,:check_in,:check_out,:time,:time1,:nombre,:email_client,:numero,:user,:clients,:piece_identite,:montant,:avance,:reste,:tva,:id_fact,:type,:status)');
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
					        ':user'=>$_SESSION['user'],
						    ':clients'=>$name,
						    ':piece_identite'=>$client,
						    ':montant'=>$monts,
							':avance'=>$avance,
						    ':reste'=>$reste,
						    ':tva'=>$tva,
						    ':id_fact'=>$id_fact,
							':type'=>$mode,
							':status'=>$status
						  ));
						  
						  
			// on modifie les données de la base de données guide
         $ret=$bds->prepare('UPDATE tresorie_customer SET encaisse= :des, reservation= :reser, reste= :res WHERE email_ocd= :email_ocd');
        $ret->execute(array(':des'=>$donns['encaisse']+$monts,
		                    ':res'=>$donns['reste']+$reste,
					        ':reser'=>$donns['reservation']+$avance,
                            ':email_ocd'=>$_SESSION['email_ocd']
					 ));
					 
					 
			// on detruire le tableau de session des données
				unset($_SESSION['add_home']);


             echo'<div id="pak"></div>';
				
				  // on redirige vers la page
             echo'<div class="enre"><div>La facture du clientg à eté prise en compte <button class="resul">!<div></button>
		     <div class="dep"><i style="font-size:40px;color:green" class="fa">&#xf250;</i></div></div>';
  
            
			echo'<meta http-equiv="Refresh" content="4; url=//localhost/tresorie_ocd/gestion_factures_home.php"/>';
        					 
		}
	 }	
   }
   
   
   
   else{
	   
	   
	   for($count=0;  $count<count($_POST['chambre']); $count++){ 
   
     $name_chambre = $chambre[$count];
	 $montants = $montant[$count];
	 $ids_chambre = $id_chambre[$count];
	 $types = $type[$count];
	 
	 
	 // 
	 
	  $reb=$bds->prepare('SELECT dat,email_ocd,id,id_chambre,id_fact,check_in,check_out,time1,time2 FROM bord_informations WHERE id_chambre= :id_chambre');
      $reb->execute(array(':id_chambre'=>$ids_chambre));
      $dos=$reb->fetch();
	  $reb->closeCursor();
		
		
			
			$result1 =$dos['time2'];
			$result2 = $dos['time1'];
			
			$result3 =$dos['check_out'];
			$result4 = $dos['check_in'];
			
			$d1=$dat3;
	        $d2=$dat4;
		
	  if($result1 > $d1 AND $dos['dat']==$_POST['dat']){
		echo'<div class="erro">l\'une de vos chambres occupée à ces dates</div>';
			
		}
		
		elseif($result4 < $_POST['dat']){
			echo'<div class="erro">l\'une de vos chambres occupée à cette heure</div>';
		}
		
		elseif($result3 > $_POST['dat']){
			echo'<div class="erro">l\'une de vos chambres occupée à cette heure</div>';
		}
		
		elseif($result1==$d1 AND $result2==$d2 AND $dos['dat']==$_POST['dat']){
		
        echo'<div class="erro">l\'une de vos chambres occupée à ces dates</div>';		
			
		}
		
		elseif($result2 > $d2 AND $dos['dat']==$_POST['dat']) {
		echo'<div class="erro">l\'une de vos chambres occupée à ces dates</div>';
		}
		
		else{
			
			
		// on insere les données dans la bds-
		$rey=$bds->prepare('INSERT INTO bord_informations (email_ocd,id_chambre,type_logement,dat,chambre,check_in,check_out,time1,time2,date1,date2,montant,mode,mont_restant,encaisser,rete_payer,id_fact,type) 
		VALUES(:email_ocd,:id_chambre,:type_logement,:dat,:chambre,:check_in,:check_out,:time1,:time2,:date1,:date2,:montant,:mode,:mont_restant,:encaisser,:rete_payer,:id_fact,:type)');
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
						    ':type'=>$ty
						  ));
						  
						  
		
		
	  
	  
	   // insertion des données dans la table facture
		$rev=$bds->prepare('INSERT INTO facture (date,civilite,email_ocd,adresse,check_in,check_out,time,time1,nombre,email_client,numero,user,clients,piece_identite,montant,avance,reste,tva,id_fact,type,status) 
		VALUES(:date,:civilite,:email_ocd,:adresse,:check_in,:check_out,:time,:time1,:nombre,:email_client,:numero,:user,:clients,:piece_identite,:montant,:avance,:reste,:tva,:id_fact,:type,:status)');
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
					        ':user'=>$_SESSION['user'],
						    ':clients'=>$name,
						    ':piece_identite'=>$client,
						    ':montant'=>$monts,
							':avance'=>$avance,
						    ':reste'=>$reste,
						    ':tva'=>$tva,
						    ':id_fact'=>$id_fact,
							':type'=>$mode,
							':status'=>$status
						  ));
						  
						  
			// on modifie les données de la base de données guide
         $ret=$bds->prepare('UPDATE tresorie_customer SET encaisse= :des, reservation= :reser, reste= :res WHERE email_ocd= :email_ocd');
        $ret->execute(array(':des'=>$donns['encaisse']+$monts,
		                    ':res'=>$donns['reste']+$reste,
					        ':reser'=>$donns['reservation']+$avance,
                            ':email_ocd'=>$_SESSION['email_ocd']
					 ));
					 
					 
			// on detruire le tableau de session des données
				unset($_SESSION['add_home']);


             echo'<div id="pak"></div>';
				
				  // on redirige vers la page
             echo'<div class="enre"><div>La facture du clientg à eté prise en compte <button class="resul">!<div></button>
		     <div class="dep"><i style="font-size:40px;color:green" class="fa">&#xf250;</i></div></div>';
  
            
			echo'<meta http-equiv="Refresh" content="4; url=//localhost/tresorie_ocd/gestion_factures_home.php"/>';
        					 
		}
	 }	
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
   }
   
 }
   catch(Exception $e)
  {
die('Erreur : '.$e->getMessage());
 }  





?>