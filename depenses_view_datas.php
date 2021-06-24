<?php
include('connecte_db.php');
include('inc_session.php');


if($_POST['action']=="fetchs") {
	 
 $req=$bds->prepare('SELECT id,date,designation,fournisseur,montant,user,status,numero_facture FROM depense WHERE email_ocd= :email_ocd ORDER BY id DESC');
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
	 $mettre ='<a href="#" class="mettre" title="mettre à jour" data-id3='.$donnes['id'].'"><i class="fab fa-telegram"></i>Mettre à jour</a><br/>';
	 $annul='<a href="#" class="annul" title="annuler" data-id4='.$donnes['id'].'"><i class="fab fa-telegram"></i> Annuler</a><br/>';
	}
	elseif($donnes['status']==2){
	 $name="crédit fournisseur";
	 $mettre='<a href="#" class="mettre" title="mettre à jour" data-id3='.$donnes['id'].'"><i class="fab fa-telegram"></i>  Mettre à jour</a><br/>';
	 $annul='<a href="#" class="annul" title="modifier" data-id4='.$donnes['id'].'"><i class="fab fa-telegram"></i> Annuler</a><br/>';
	}
	
	else{
	$name="dépense annulée";
	$mettre="";
	$annul="";
	}

   $date1=$donnes['date'];
	$date1 = explode('-',$date1);
	$j = $date1[2];
	$mm = $date1[1];
	$an = $date1[0];
	
	echo'<tr class="datas'.$donnes['status'].'">
	     <td><span class="dat'.$donnes['status'].'"><i class="fas fa-circle" style="font-size:10px;"></i></span><span class="der"> enregistrement effectué le<br/>'.$j.'/'.$mm.'/'.$an.'<br/>
		 <i class="fas fa-user-edit" style="font-size:13px;color:#4e73df;"></i> par '.$donnes['user'].'</span></td>
		 <td><span class="der">N° facture: '.$donnes['numero_facture'].'<br/><div class="data'.$donnes['status'].'">'.$name.'</span></div></td>
		 <td><span class="repas">'.$donnes['designation'].'</td>
		 <td><span class="repas">'.$donnes['fournisseur'].'</td>
		 <td><span class="repas">'.$donnes['user'].'</td>
		 <td><span class="repas">'.$donnes['montant'].'xof</td>
		 <td> Action à gérer <span class="action" data-id2="'.$donnes['id'].'"><i class="fas fa-angle-down"></i></span><div class="datas" style="display:none" id="content'.$donnes['id'].'">
		 '.$mettre.'
		  <a href="#" class="modifier" title="modifier" data-id3='.$donnes['id'].'"><i class="fab fa-telegram"></i> Modifier</a><br/>
		 '.$annul.'
		  
		  </div></td>
	    </tr>';
    }	  
  }