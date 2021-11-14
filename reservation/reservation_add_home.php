<?php
include('connecte_db.php');
include('inc_session.php');

$req=$bdd->prepare('SELECT denomination,email_ocd,email_user,numero,id_visitor FROM inscription_client WHERE id_visitor= :id');
   $req->execute(array(':id'=>$_GET['home_user']));
   $donnees=$req->fetch();
	$req->closeCursor();
 // recupere les données des chambre 

 // recupération des variable pour injecter dans la facture
// fixer les numero de facture
	$reb=$db->prepare('SELECT id_fact FROM facture WHERE  AND email_ocd= :email_ocd ORDER BY id DESC LIMIT 0,1');
   $reb->execute(array(':email_ocd'=>$donnees['email_ocd']));
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
	$email = strip_tags($_POST['email']);
	$adresse =trim(strip_tags($_POST['adresse']));
	$numero = $_POST['numero'];
	$date1 =$_GET['date_start'];
	$date2 =$_GET['date_end'];
	$time1 =date('H:i');
	$time2=date('H:i');
	$avance="";
	$reste=="";
	$montant="";
	$mont_tva="";
	$statuts="";
	$remise="";
	$data_montant="";
	$ty = 3;
	$code =0;
	$society="";
	$search_date="";
	$user="";
	$dat =date('Y-m-d');
	$email_ocd =$donnees['email_ocd'];
	$nombre_jours=$_POST['nbjour'];
	$client="";
	$calls="";
	$prix_repas="";
	// insert  dans base de donnees facture
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

?>