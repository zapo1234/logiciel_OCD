<?php
include('connecte_db.php');
include('inc_session.php');

// recuperer la permission pour afficher le checkout
   	// emttre la requete sur le fonction
    $rel=$bdd->prepare('SELECT  permission,code,society FROM inscription_client WHERE email_user= :email_user');
    $rel->execute(array(':email_user'=>$_SESSION['email_user']));
	$donns =$rel->fetch();
	if($donns['code']==0){
		  $session=0;
		}
		else{
		$session=$donns['code'];
		}
		if($donns['permission']=="user:boss"){
			$calls="";
		}
		if($donns['permission']=="user:gestionnaire"){
			$calls="transmis par le gestionnaire";
	    }
		if($donns['permission']=="user:employes"){
			if($donns['code']==0){
			$calls='transmis par le réceptionniste';
			}
			else{
				$calls='transmis par '.$donns['society'].'';
			}
		}

 // on recupere le montant
 $req=$bds->prepare('SELECT depense FROM tresorie_customer WHERE code= :code AND email_ocd= :email_ocd');
 $req->execute(array(':code'=>$donns['code'],
                    ':email_ocd'=>$_SESSION['email_ocd']));
 $donnes=$req->fetch();

 $date=$_POST['ti'];
 $designation=$_POST['designation'];
 $fournisseur=$_POST['fournisseur'];
 $montant=$_POST['montant'];
 $nature=$_POST['des'];
 $monts=$_POST['idy'];
 $user =$_SESSION['user'];
 $numero_facture= $_POST['fact'];
 $dep_tresorie =$_POST['dep_tresorie'];

 for($count=0;  $count<count($_POST['ti']); $count++){
	
 $dates=$date[$count];
 $desi=$designation[$count];
 $fourni=$fournisseur[$count];
 $mont=$montant[$count];
 $nat=$nature[$count];
 
 if($nat==1){
$natu='dépense effectué'; 
	$user =$_SESSION['user']; 
 }
 if($nat==2){
	$natu='crédit fournisseur'; 
	$user =$_SESSION['user'];
}
 
 if($nat==5){
	 $natu ="Remboursement client";
	 $user = $donns['user'].', <i class="far fa-check-circle" style="color:#AB040E;font-size:14px"></i> '.$_SESSION['user'].' a annulé  une réservation client dans l\'intitulé le  '.date('d-m-Y').'à  '.date('H:i').'   <span class="edit"></span>'; 
 }
 
  $session = $_SESSION['code'];
  // insertions des données dans la base de données depense
 $req=$bds->prepare('INSERT INTO depense(email_ocd,numero_facture,date,designation,fournisseur,user,nature,montant,status,code,society,calls) VALUES(:email_ocd,:numero_facture,:date,:designation,:fournisseur,:user,:nature,:montant,:status,:code,:society,:calls)');
 $req->execute(array(':email_ocd'=>$_SESSION['email_ocd'],
                     ':numero_facture'=>$numero_facture,
                      ':date'=>$dates,
					  ':designation'=>$desi,
					  ':fournisseur'=>$fourni,
					  ':user'=>$user,
					  ':nature'=>$natu,
					  ':montant'=>$mont,
					  ':status'=>$nat,
					  ':code'=>$session,
					  ':society'=>$_SESSION['society'],
					  ':calls'=>$calls
					  ));
	                
					// confirmation 
				
 }		
	
	if($dep_tresorie==5){
		$session=5;
		$data="";
		
		if($donns['permission']=="user:gestionnaire"){
		$paiment ="dépense tiré de la trésorerie, effectué par le gestionnaire";
		$calls='transmis par '.$_SESSION['user'].'travail à'.$_SESSION['society'];
		}
		
		if($donns['permission']=="user:boss"){
		$paiment ="dépense tiré de la trésorerie, effectué par le dirigeant";
		$calls='transmis par '.$_SESSION['user'].'le dirigeant';
		}
		
		// insertion des données dans la table facture
		$rev=$bds->prepare('INSERT INTO tresorie_user (date,email_ocd,user_gestionnaire,entree,sorties,reservation,reste,code,society,calls,moyen_paiement)VALUES(:date,:email_ocd,:user_gestionnaire,:entree,:sorties,:reservation,:reste,:code,:society,:calls,:moyen_paiement)');
	     $rev->execute(array(':date'=>$dates,
		                    ':email_ocd'=>$_SESSION['email_ocd'],
							':user_gestionnaire'=>$_SESSION['user'],
							':entree'=>$data,
							':sorties'=>$monts,
							':reservation'=>$data,
							':reste'=>$data,
							':code'=>$session,
							':society'=>$_SESSION['society'],
							':calls'=>$calls,
							':moyen_paiement'=>$paiment
					));
		
		
	}
// on modifie les données de la base de données guide
  if($_SESSION['code']==0){
		  $session=0;
		}
		else{
		$session=$_SESSION['code'];
		}
	if($dep_tresorie==4){
  $ret=$bds->prepare('UPDATE tresorie_customer SET depense= :des WHERE code= :code AND email_ocd= :email_ocd');
  $ret->execute(array(':des'=>$donnes['depense']+$monts,
                      ':code'=>$_SESSION['code'],
                       ':email_ocd'=>$_SESSION['email_ocd']
					 ));
 	}
  

?>