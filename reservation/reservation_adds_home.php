<?php
include('connecte_db.php');
include('inc_session.php');
try{
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
	
	 // récupérer les variables en boucles
	 $req=$bdd->prepare('SELECT denomination,email_ocd,email_user,numero,id_visitor FROM inscription_client WHERE id_visitor= :id');
    $req->execute(array(':id'=>$_GET['home_user']));
   $donnees=$req->fetch();
	$req->closeCursor();
 // recupere les données des chambre 
   $email =$donnees['email_ocd'];
    
   // recupération des variable pour injecter dans la facture
// fixer les numero de facture
   // fixer les numero de facture
	$reb=$db->prepare('SELECT id_fact FROM facture WHERE email_ocd= :email_ocd ORDER BY id DESC');
   $reb->execute(array(':email_ocd'=>$email));
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
	
	// recupere les variable
	$clients =trim(strip_tags($_POST['name']));
	$email1 = $_POST['email'];
	$adresse =trim(strip_tags($_POST['adresse']));
	$numero = $_POST['numero'];
   
   if(!isset($_GET['date_start'])){
	$date1 = date('y-m-d');
    $date2 = date('y-m-d');	
   }
   else{
   $date1=$_GET['date_start'];
   $date2=$_GET['date_end'];
   }
    $time1 =date('H:i');
	$time2=date('H:i');
	// variable boucle
   //variable boucle
   $session=0;
   $dat =date('y-m-d');
   $reste="";
   $encaisser="";
   $rete_payer="";
   $ty="";
   $mode=3;
   $time=date('H:i');
   $avance="";
	$reste="";
	$montant="";
	$mont_tva="";
	$status="";
	$remise="";
	$data_montant="";
	$ty = 3;
	$code =0;
	$society="";
	$search_date="";
	$user="";
	$dat =date('Y-m-d');
	$email =$donnees['email_ocd'];
	$nombre_jours=$_POST['nbjour'];
	$client="";
	$calls="";
	$prix_repas="";
	$civilite="";
	$tva =0;
	$mode="";
	$data_num="";
	$session=0;
   
 // boucler sur les valeurs pour entrer les données dans la bdd
  for($count=0;  $count<count($_POST['list']); $count++){ 
     $name_chambre = $_POST['list'][$count];
	 $montants = $_POST['list1'][$count];
	 $types = $_POST['list2'][$count];
	 $ids_chambre = $_POST['list3'][$count];
	  // on redirige vers la page
		// on insere les données dans la bds-
		$rey=$db->prepare('INSERT INTO bord_informations (email_ocd,id_chambre,type_logement,dat,chambre,check_in,check_out,time1,time2,date1,date2,montant,mode,mont_restant,encaisser,rete_payer,id_fact,type,code) 
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
						  
			// insert to dans facture
			
			}

  // insert  dans base de donnees facture
    // insertion des données dans la table facture
		$rev=$db->prepare('INSERT INTO facture (date,civilite,email_ocd,adresse,check_in,check_out,time,time1,nombre,email_client,numero,user,clients,piece_identite,montant,avance,reste,montant_repas,tva,mont_tva,remise,id_fact,type,moyen_paiement,data_montant,types,code,society,calls,search_date) VALUES(:date,:civilite,:email_ocd,:adresse,:check_in,:check_out,:time,:time1,:nombre,:email_client,:numero,:user,:clients,:piece_identite,:montant,:avance,:reste,:montant_repas,:tva,:mont_tva,:remise,
		:id_fact,:type,:moyen_paiement,:data_montant,:types,:code,:society,
		:calls,:search_date)');
	     $rev->execute(array(':date'=>$dat,
		                     ':civilite'=>$civilite,
		                    ':email_ocd'=>$email,
							':adresse'=>$adresse,
							':check_in'=>$date1,
							':check_out'=>$date2,
							':time'=>$time1,
							':time1'=>$time2,
							':nombre'=>$nombre_jours,
							':email_client'=>$email1,
						    ':numero'=>$_POST['numero'],
					        ':user'=>$user,
						    ':clients'=>$clients,
						    ':piece_identite'=>$client,
						    ':montant'=>$montant,
							':avance'=>$avance,
						    ':reste'=>$reste,
							':montant_repas'=>$prix_repas,
						    ':tva'=>$tva,
							':mont_tva'=>$mont_tva,
							':remise'=>$remise,
						    ':id_fact'=>$id_fact,
							':type'=>$mode,
							':moyen_paiement'=>$status,
							':data_montant'=>$data_num,
							':types'=>$ty,
							':code'=>$session,
							':society'=>$society,
							':calls'=>$calls,
							':search_date'=>$search_date
							
						  ));
						  
			// on detruit la varaible de session
			unset($_SESSION['add_homes']);
			// on envoi une repose positif
			echo'
             <div class="enre"><div>
			 <div><i class="far fa-check-circle" style="color:green;font-size:50px"></i></div>
			 <div>Félicitation  <i class="fas fa-coins" style="font-size:15px;color:#42A50A"></i> '.$clients.'</div>
			 <div> Un instant votre  réservation est  prise en compte<br/> , l\'etablissement reviens vers vous ..<br/>Prioriser un acompte pour vos réservations</div>
		     </div><div id="pak"></div>';
			 
			 echo'<meta http-equiv="Refresh" content="5; url=//localhost/logiciel_OCD/gestion_facture_customer.php"/>';

}

catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
} 
?>