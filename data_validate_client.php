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
	
   $rej=$bds->prepare('SELECT email_ocd,montant,encaisse,reste FROM tresorie_customer WHERE email_ocd= :email_ocd');
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
   $email = $_POST['email'];
   $adresse = html_entity_decode(trim($_POST['adresse']));
   $numero_compte=$_SESSION['email_ocd'];

   $type =$_POST['to'];
   // récupére les variable dans différentes cas possible de séjour
   
   // date check in et check out
   $dat1= $_POST['days'];
   $dat2= $_POST['das'];
   
   //
   $dat3 = $_POST['tim'];
   $dat4 = $_POST['tis'];
   
   $status =$_POST['status'];
   $prix_repas =$_POST['monts'];
   
   if($type =="séjour") {
	   
	 $avance=0;
     $reste=0; 
     $mode =1;
     $nombre_heures=0;	 
	 $rete_payer="";
     $encaisser="";
	 $nombre_jours =$_POST['nbjour'];
	 // date check in et chekout 
	 //time et time
	 $date1=$dat1;
     $date2=$dat2;
	 $time=00:00;
     $time1=00:00;
	 $tva =$_POST['tva'];
	 $taxe =$_POST['taxe'];
	 $total =$_POST['total'];
	 $type="client facturé";
   }
   
   if($type =="réservation") {
	   
	 $avance=$_POST['account'];
     $reste=$_POST['rpay']; 
     $mode =3;	 
	 $rete_payer="";
     $encaisser="";
     $nombre_heures=0;
	 $nombre_jours =$_POST['nbjour'];
	 // date check in et chekout 
	 //time et time
	 $date1=$dat1;
     $date2=$dat2;
	 $time=00:00;
     $time1=00:00;
     $tva =$_POST['tva'];
	 $taxe =$_POST['taxe'];
     $total = $_POST['total'];
     $type="réservation client";	 
	   
   }
   
   if($type = "horaire") {
	   
	  $avance=$_POST['account'];
     $reste=$_POST['rpay']; 
     $mode =3;	 
	 $rete_payer="";
     $encaisser="";
     $nombre_heures=0;
	 $nombre_jours =$_POST['nbjour'];
	 // date check in et chekout 
	 //time et time
	 $date1=0000-00-00;
     $date2=0000-00-00;
	 $time=$dat3;
     $time1=$dat4;
     $tva =$_POST['tva'];
	 $taxe =$_POST['taxe'];
     $total = $_POST['total'];
     $type= "horaire client";  
	   
	   
	}

   // récupérer les variables en boucles
   
   $chambre = $_POST['chambre'];
   $montant =$_POST['pay'];
   $id_chambre = $_POST['id_chambre'];
   $type = $_POST['ty'];

   
   // boucler sur les valeurs pour entrer les données dans la bdd

   for($count=0;  $count<count($_POST['chambre']); $count++){ 
   
     $name_chambre = $chambre[$count];
	 $montants = $montant[$count];
	 $ids_chambre = $id_chambre[$count];
	 $types = $type[$count];
	 
	 
	 // 
	 
	 $reb=$bds->prepare('SELECT email_ocd,id,id_chambre,id_fact,check_in,check_out FROM bord_informations WHERE id_chambre= :id_chambre');
      $reb->execute(array(':id_chambre'=>$id_chambre));
      $dos=$reb->fetch();
	    $reb->closeCursor();
		
	
	    if($dos['check_out']> $date1){
		echo'<div class="erro">l\'une de vos chambres occupée à ces dates</div>';
			
		}
		
		elseif($dos['check_in']> $date2) {
		echo'<div class="erro">l\'une de vos chambres occupée à ces dates</div>';
		}
		
		else{
			
			
			
			
			
			
			
			
		}
	
		
   
   
   }






  }
   catch(Exception $e)
  {
die('Erreur : '.$e->getMessage());
 }  





?>