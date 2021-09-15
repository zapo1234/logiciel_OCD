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

// on declare les requete sql
  $id= $_POST['chambr'];
 $rete_payer="Reste à soldé";
 $encaisser="encaisser";
 $utilisation="";
 $img="&#xe914;";
 $img1="x"; 
 $img2="";
 $img3="";
$nombre_heures="";
$nombre_jours ="Nombre de jours";
$nbrs_heure="";
$nbrs_jour="";
$type="réservation";
$numero_compte=$_SESSION['pose'];
$piece=$_POST['pice'];
$annuler="annuler";
$mont_restant=$_POST['nmsi'];
$time="";
$time1="";

if($mont_restant==0) {
	$mode="client facturé";
}

else {
	$mode ="acompte avancé";
}

// on travail sur la date1
$dat =$_POST['da'];
$result = explode('-',$dat);
$date =$result[2];
$mois =$result[1];
$year =$result[0];
$new_dat =$date.'-'.$mois.'-'.$year;

// on tra vail sur la date2 ckeck_in
$date1 =$_POST['dims'];
$results = explode('-',$date1);
$dates =$results[2];
$moi =$results[1];
$years =$results[0];
$new_date1 = $dates.'-'.$moi.'-'.$years;

// on travail sur la date3 check_out
$date2 =$_POST['tise'];
$resul =explode('-',$date2);
$dats =$resul[2];
$mo =$resul[1];
$yeas =$resul[0];
$new_date2 = $dats.'-'.$mo.'-'.$yeas;

	 // on verifie si la chambre est deja enregsitrer
    $rev=$bds->prepare('SELECT id,chambre,numero_compte FROM chambre WHERE id= :id');
   $rev->execute(array(':id'=>$id));
   $donnees=$rev->fetch();
	$rev->closeCursor();
	
	$rej=$bds->prepare('SELECT numero_compte,encaisse,reservation FROM guide WHERE numero_compte= :numero_compte');
   $rej->execute(array(':numero_compte'=>$numero_compte));
   $donns=$rej->fetch();
	$rej->closeCursor();
	
	$reb=$bds->prepare('SELECT id,chambre,numero_compte,check_in,check_out FROM bord_informations WHERE id= :id');
   $reb->execute(array(':id'=>$id));
   $donnes=$reb->fetch();
	$reb->closeCursor();

    // on compte le nombre d'enregsitrement
	$rec=$bds->prepare('SELECT count(*) AS nomb FROM bord_informations WHERE numero_compte = :numero_compte');
     $rec->execute(array(':numero_compte'=>$_SESSION['pose']));
	 $result=$rec->fetch();
	 $rec->closeCursor();
	 
	 $chaine = html_entity_decode(trim($_POST['nom']));
	 $chaines = html_entity_decode(trim($_POST['pice']));

    
	if($result['nomb']>500){
	 
	 echo'<div class="ddn"><i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i> vous avez atteint le maximum d\'enregistrements de 500</div>'; 
	}
	
	else {
		
		// on insere les données dans la bds-
		$rey=$bds->prepare('INSERT INTO bord_informations (numero_compte,id,dat,dat1,client,numero,piece_nature,chambre,check_in,check_out,
		date1,date2,time,time1,type,montant,repas,mode,mont_restant,annuler,encaisser,rete_payer,nbrs_jour,nbrs_heure,nombre_jours,nombre_heures,img,img1) 
		VALUES(:numero_compte,:id,:dat,:dat1,:client,:numero,:piece_nature,:chambre,:check_in,:check_out,:date1,:date2,:time,:time1,:type,:montant,:repas,:mode,:mont_restant,:annuler,:encaisser,:rete_payer,
		:nbrs_jour,:nbrs_heure,:nombre_jours,:nombre_heures,:img,:img1)');
	     $rey->execute(array(':numero_compte'=>$numero_compte,
	                      ':id'=>$id,
					       ':dat'=>$dat,
						  ':dat1'=>$new_dat,
						  ':client'=>$chaine,
						  'numero'=>$_POST['nume'],
						  ':piece_nature'=>$chaines,
						  'chambre'=>$donnees['chambre'],
					      ':check_in'=>$date1,
						  ':check_out'=>$date2,
						  ':date1'=>$new_date1,
						  ':date2'=>$new_date2,
						  ':time'=>$time,
						  ':time1'=>$time1,
						  ':type'=>$type,
						  ':montant'=>$_POST['tot'],
					      ':repas'=>$_POST['typs'],
						  ':mode'=>$mode,
						  ':mont_restant'=>$mont_restant,
				          ':annuler'=>$annuler,
						  ':encaisser'=>$encaisser,
						  ':rete_payer'=>$rete_payer,
						  ':nbrs_jour'=>$nbrs_jour,
						  ':nbrs_heure'=>$nbrs_heure,
						  ':nombre_jours'=>$nombre_jours,
						  ':nombre_heures'=>$nombre_heures,
						  ':img'=>$img,
					      ':img1'=>$img1));

						  
				// on insere les données dans la table facture 
				$rev=$bds->prepare('INSERT INTO facture (numero_compte,clients,description,infos_type,tarif_unitaire,nombre,nombre_jours,nombre_heures,montant,reste,tva) 
				VALUES(:numero_compte,:clients,:description,:infos_type,:tarif_unitaire,:nombre,:nombre_jours,:nombre_heures,:montant,:reste,:tva)');
	           $rev->execute(array(':numero_compte'=>$numero_compte,
			                ':clients'=>$chaine,
	                         ':description'=>$donnees['chambre'],
					         ':infos_type'=>$type,
						     ':tarif_unitaire'=>$_POST['naams'],
						       ':nombre'=>$nbrs_jour,
						      ':nombre_jours'=>$nombre_jours,
						      ':nombre_heures'=>$nombre_heures,
						       ':montant'=>$_POST['tot'],
						       ':reste'=>$mont_restant,
						        ':tva'=>$_POST['us']));
								
						// on modifie les montants
						   $rek=$bds->prepare('UPDATE guide SET  reservation = :bmont   WHERE numero_compte = :numero_compte');
				            $rek->execute(array(':bmont'=>$donns['reservation']+$_POST['nmsi'],
							                     ':numero_compte'=>$numero_compte
												 ));
						  // redirection vers la page reservattion convirmation
						      echo'<meta http-equiv = "refresh" content="0; URL= reservation_hotel_ocd.php">';
	}
?>