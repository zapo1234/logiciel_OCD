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
	$user = $_SESSION['user'].',  <i class="far fa-check-circle" style="color:red;font-size:13px">  '.$_SESSION['user'].' à remboursé une annulation au client le  '.date('d-m-Y').'à  '.date('H:i').'<span class="edit"></span>';  
 }
 
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
					  ':code'=>$_SESSION['code'],
					  ':society'=>$_SESSION['society'],
					  ':calls'=>$calls
					  
					 ));
	                
					// confirmation 
				}
// on modifie les données de la base de données guide
  if($_SESSION['code']==0){
		  $session=0;
		}
		
		else{
		$session=$_SESSION['code'];
		}
  $ret=$bds->prepare('UPDATE tresorie_customer SET depense= :des WHERE code= :code AND email_ocd= :email_ocd');
  $ret->execute(array(':des'=>$donnes['depense']+$monts,
                      ':code'=>$_SESSION['code'],
                       ':email_ocd'=>$_SESSION['email_ocd']
					 ));
 	 
  
  

?>