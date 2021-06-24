<?php
include('connecte_db.php');
include('inc_session.php');


 // on recupere le montant
 $req=$bds->prepare('SELECT depense FROM tresorie_customer WHERE email_ocd= :email_ocd');
 $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
 $donnes=$req->fetch();

 $date=$_POST['ti'];
 $designation=$_POST['designation'];
 $fournisseur=$_POST['fournisseur'];
 $montant=$_POST['montant'];
 $nature=$_POST['des'];
 $monts=$_POST['idy'];
 $user =$_SESSION['user'];
 $numero_facture= html_entity_decode($_POST['fact']);

 for($count=0;  $count<count($_POST['ti']); $count++){
	
 $dates=$date[$count];
 $desi=$designation[$count];
 $fourni=$fournisseur[$count];
 $mont=$montant[$count];
 $nat=$nature[$count];
 
 if($nat==1){
$natu='dépense effectué'; 
	 
 }
 
 if($nat==2){
	$natu='crédit fournisseur'; 
 }
 
 // insertions des données dans la base de données depense
 $req=$bds->prepare('INSERT INTO depense(email_ocd,numero_facture,date,designation,fournisseur,user,nature,montant,status) VALUES(:email_ocd,:numero_facture,:date,:designation,:fournisseur,:user,:nature,:montant,:status)');
 $req->execute(array(':email_ocd'=>$_SESSION['email_ocd'],
                     ':numero_facture'=>$numero_facture,
                      ':date'=>$dates,
					  ':designation'=>$desi,
					  ':fournisseur'=>$fourni,
					  ':user'=>$_SESSION['user'],
					  ':nature'=>$natu,
					  ':montant'=>$mont,
					  ':status'=>$nat
					  
					 ));
	                
					// confirmation 
					
	}

  // on modifie les données de la base de données guide
  $ret=$bds->prepare('UPDATE tresorie_customer SET depense= :des WHERE email_ocd= :email_ocd');
  $ret->execute(array(':des'=>$donnes['depense']+$monts,
                       ':email_ocd'=>$_SESSION['email_ocd']
					 ));
					 
  
  

?>