<?php
include('connecte_db.php');
include('inc_session.php');

 
 if($_POST['action']=="fetchs") {
	 
 $req=$bds->prepare('SELECT id,date,designation,fournisseur,montant,user,status FROM depense WHERE email_ocd= :email_ocd');
 $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
 $datas=$req->fetchAll();
	
  // on boucle sur les les resultats
	echo'<div class="expor"><h2>Gestion des dépenses de votre activité</h2> <span class="export">Export  <button type="button" class="excel">Excel <i class="far fa-file-excel"></i></button>
	<button type="button" class="csv">Csv <i class="fas fa-file-csv"></i></button><span></div>';
  echo'	<table class="table">
     <thead>
     <tr class="tf">
	  <th scope="col">Date</th>
	  <th scope="col">N°facture(si existe)</th>
      <th scope="col">Désignation</th>
	  <th scope="col">fournisseur</th>
	  <th scope="col">Gestionnaire</th>
	  <th scope="col">Montant</th>
	  <th scope="col">Actions</th>
      </tr>
      </thead>
      <tbody>';
  
  foreach($datas as $donnes){

    $nombre =$donnes['status'];
	
	if($donnes['status']==1){
	 $name="dépense effectuée";
	 $mettre ='<a href="#" class="mettre" title="mettre à jour" data-id1='.$donnes['id'].'"><i class="fab fa-telegram"></i>Mettre à jour</a><br/>';
	}
	elseif($donnes['status']==2){
	 $name="crédit fournisseur";
	 $mettre='<a href="#" class="mettre" title="mettre à jour" data-id1='.$donnes['id'].'"><i class="fab fa-telegram"></i>Mettre à jour</a><br/>';
	}
	
	else{
		
		
	}

   $date1=$donnes['date'];
	$date1 = explode('-',$date1);
	$j = $date1[2];
	$mm = $date1[1];
	$an = $date1[0];
	
	echo'<tr class="datas'.$donnes['status'].'">
	     <td><span class="dat'.$donnes['status'].'"><i class="fas fa-circle" style="font-size:10px;"></i></span><span class="der"> Facture émise le<br/>'.$j.'/'.$mm.'/'.$an.'<br/>
		 '.$donnes['user'].'</span></td>
		 <td><span class="der">N° facture: '.$donnes['numero_facture'].'<br/><div class="data'.$donnes['status'].'">'.$name.'</span></div></td>
		 <td><span class="repas">'.$donnes['designation'].'</td>
		 <td><span class="repas">'.$donnes['fournisseur'].'</td>
		 <td><span class="repas">'.$donnes['user'].'</td>
		 <td><span class="repas">'.$donnes['montant'].'xof</td>
		 <td> Action à gérer <span class="action" data-id2="'.$donnes['id'].'"><i class="fas fa-angle-down"></i></span><div class="datas" style="display:none" id="content'.$donnes['id'].'">
		 '.$mettre.'
		  <a href="#" class="annuler" title="Annuler" data-id2='.$donnes['id'].'"><i class="fab fa-telegram"></i>Annuler</a><br/>
		  </div></td>
		 <td><a href="gestion_datas_facture.php?id_fact="'.$donnes['id'].'"><i class="far fa-file-pdf" style="color:red;font-size:16px;"></i></a></td>
	    </tr>';
    }	  
  }

 if($_POST['action']=="deleted"){
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
 
 
    echo'<div class="enre"><div>vos dépenses sont bien enregistrées 
		     <div class="dep"><i style="font-size:40px;color:green" class="fa">&#xf250;</i></div></div>';
 
 // insertions des données dans la base de données depense
 $req=$bds->prepare('INSERT INTO depense(email_ocd,date,designation,fournisseur,user,nature,montant,status) VALUES(:email_ocd,:date,:designation,:fournisseur,:user,:nature,:montant,:status)');
 $req->execute(array(':email_ocd'=>$_SESSION['email_ocd'],
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
					 
  }	
  

?>