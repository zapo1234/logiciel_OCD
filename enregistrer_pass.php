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

	$rej=$bds->prepare('SELECT email_ocd,montant,encaisse FROM tresorie_customer WHERE email_ocd= :email_ocd');
   $rej->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
   $donns=$rej->fetch();
	$rej->closeCursor();
	
	
	$reg=$bdd->prepare('SELECT user FROM inscription_client WHERE identifiant_cle= :identifiant_cle');
   $reg->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
   $dons=$reg->fetch();
	$reg->closeCursor();
	
	$reb=$bds->prepare('SELECT email_ocd,id,id_chambre,id_fact,check_in,check_out FROM bord_informations WHERE email_ocd= :email_ocd ORDER BY id DESC');
   $reb->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
   $donnes=$reb->fetch();
	$reb->closeCursor();
	
	if(empty($donnes)) {
	 
     $id_fact=0.0001;	 
		
	}
	
	else{
	
	$id_fact=$donnes['id_fact']+0.0001;
		
	}



// on travail sur la date1
$dat =$_POST['da'];
$new_dat=$dat;


$email_client=$_POST['emais'];


// on declare les requete sql
  
 $rete_payer="";
 $encaisser="";
 
 $img="thumb_up";
 $img1="x"; 
 $nombre_heures=0;
$nombre_jours =0;
$mode="client facturé";
$nbrs_heure=0;

$type="Pass";
$numero_compte=$_SESSION['email_ocd'];
$piece=$_POST['piec'];
$annuler="";
$mont_restant="";
$avance=0;
$reste=0;
$tva=20;
$email=$_POST['emais'];
$mode=2;


// variable dans l'insert dans la boucle

$dat1=$_POST['tim'];
$dat2=$_POST['tis'];
$ids=$_POST['chambres'];
$jours=$_POST['nums'];
$tarif=$_POST['nams'];
$total=$_POST['toal'];
$occupant=$_POST['nombres'];
$repas=$_POST['typ'];
$num=$_POST['is'];
$mont=$_POST['totals_pass'];




	
     $chaine = html_entity_decode(trim($_POST['names']));
	 $chaines = html_entity_decode(trim($_POST['piec']));

    
	if(isset($_POST['chambres'])) {
     
	for($count=0;  $count<count($_POST['chambres']); $count++){    
		
		$id_chambre=$ids[$count];
		$date1=$dat1;
		$date2=$dat2;
		$totale=$total[$count];
		$nbrs_jour=$jours[$count];
		$tarifs=$tarif[$count];
		$repa=$repas[$count];
		$nums=$num[$count];
		$occupants=$occupant[$count];
		
	  $reb=$bds->prepare('SELECT email_ocd,id,id_chambre,id_fact,check_in,check_out FROM bord_informations WHERE id_chambre= :id_chambre');
      $reb->execute(array(':id_chambre'=>$id_chambre));
      $dos=$reb->fetch();
	    $reb->closeCursor();
		
	
	    if($date1 > $date2) {
			
			echo'<div class="erro">une date d\'entrée est supérieur à celle de sortie</div>';
		}
		
		elseif($dos['check_out']> $date1){
		echo'<div class="erro">l\'une de vos chambres occupée à ces dates</div>';
			
		}
		
		elseif($dos['check_in']> $date2) {
		echo'<div class="erro">l\'une de vos chambres occupée à ces dates</div>';
		}
		
		elseif(!preg_match('#^[0-9]{1,4}#',$nbrs_jour)){
			
			echo'<div class="erro">le nombre maxi de caractère est de 4 chiffre pour le nombre de jours</div>';
		}
		
		elseif(!preg_match('#^[0-9]{1,6}#',$tarifs)){
			echo'<div class="erro">le nombre maxi de caractère est de 6 chiffre pour le tarif</div>';
		}
		
       
		
	  else{
	   
	
        if($nbrs_jour>0){
		
		// on insere les données dans la bds-
		$rey=$bds->prepare('INSERT INTO bord_informations (email_ocd,id_chambre,occupant,dat,dat1,piece_nature,chambre,check_in,check_out,
		date1,date2,time,time1,montant,repas,mode,mont_restant,encaisser,rete_payer,nbrs_jour,nbrs_heure,nombre_jours,nombre_heures,id_fact,num_choix,type) 
		VALUES(:email_ocd,:id_chambre,:occupant,:dat,:dat1,:piece_nature,:chambre,:check_in,:check_out,:date1,:date2,:time,:time1,:montant,:repas,:mode,:mont_restant,:encaisser,:rete_payer,
		:nbrs_jour,:nbrs_heure,:nombre_jours,:nombre_heures,:id_fact,:num_choix,:type)');
	     $rey->execute(array(':email_ocd'=>$numero_compte,
	                      ':id_chambre'=>$id_chambre,
						  ':occupant'=>$occupants,
					       ':dat'=>$dat,
						  ':dat1'=>$new_dat,
						  ':piece_nature'=>$_POST['piec'],
						  'chambre'=>$id_chambre,
					      ':check_in'=>$date1,
						  ':check_out'=>$date2,
						  ':date1'=>$date1,
						  ':date2'=>$date2,
						  ':time'=>$time,
						  ':time1'=>$time1,
						  ':montant'=>$totale,
					      ':repas'=>$repa,
						  ':mode'=>$mode,
						  ':mont_restant'=>$mont_restant,
						  ':encaisser'=>$encaisser,
						  ':rete_payer'=>$rete_payer,
						  ':nbrs_jour'=>$nbrs_jour,
						  ':nbrs_heure'=>$nbrs_heure,
						  ':nombre_jours'=>$nombre_jours,
						  ':nombre_heures'=>$nombre_heures,
						  ':id_fact'=>$id_fact,
						  ':num_choix'=>$nums,
						  ':type'=>$mode
						  ));
						  
						  
		}
		}
	   }
		
		  // insertion des données dans la table facture
		$rev=$bds->prepare('INSERT INTO facture (date,email_ocd,email_client,numero,user,clients,description,infos_type,montant,avance,reste,tva,id_fact,type) 
		VALUES(:date,:email_ocd,:email_client,:numero,:user,:clients,:description,:infos_type,:montant,:avance,:reste,:tva,:id_fact,:type)');
	     $rev->execute(array(':date'=>$dat,
		                    ':email_ocd'=>$numero_compte,
							':email_client'=>$email,
						   ':numero'=>$_POST['numbr'],
					       ':user'=>$_SESSION['user'],
						   ':clients'=>$chaine,
						   ':description'=>$new_dat,
						   ':infos_type'=>$type,
						    ':montant'=>$mont,
							':avance'=>$avance,
						   ':reste'=>$reste,
						    ':tva'=>$tva,
						    ':id_fact'=>$id_fact,
							':type'=>$mode
						  ));
			
			// on modifie les données de la base de données guide
         $ret=$bds->prepare('UPDATE tresorie_customer SET encaisse= :des WHERE email_ocd= :email_ocd');
        $ret->execute(array(':des'=>$donns['encaisse']+$mont,
                       ':email_ocd'=>$_SESSION['email_ocd']
					 ));
		
				
				 // on redirige vers la page
        echo'<SCRIPT LANGUAGE="JavaScript">
           document.location.href="confirm_user_sejours.php"
           </SCRIPT>'; 
				
	}
 
 }
 catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}  
 
 
?>