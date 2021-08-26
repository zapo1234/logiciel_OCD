<?php
include('connecte_db.php');
include('inc_session.php');
if(isset($_GET['data_id'])){
echo$_GET['data_id'];
 $record_peage=20;
$page="";
  
  if(isset($_POST['page'])){
$page = (int) strip_tags($_POST['page']);
}

else {

$page=1;	
	
}

$smart_from =($page -1)*$record_peage;
	
	$code=$_GET['data_id'];
    // recuperer la permission pour afficher le checkout
   	// emttre la requete sur le fonction
    $rel=$bdd->prepare('SELECT  permission,society,code FROM inscription_client WHERE email_user= :email_user');
    $rel->execute(array(':email_user'=>$_SESSION['email_user']));
	$donns =$rel->fetch();
	 
	 //gérer les permission de vues des factures
	if($donns['permission']=="user:boss" OR $donns['permission']=="user:gestionnaire"){
		  // emttre la requete sur le fonction
        $req=$bds->prepare('SELECT  date,adresse,check_in,check_out,time,time1,clients,user,montant,montant_repas,mont_tva,types,id_fact,nombre,type,society,code,calls FROM facture WHERE code= :code AND email_ocd= :email_ocd  ORDER BY id_fact DESC LIMIT '.$smart_from.','.$record_peage.'');
        $req->execute(array(':code'=>$code,
		                    ':email_ocd'=>$_SESSION['email_ocd']));
		}
		
		// afficher les facture.
		if($donns['code']==1 OR $donns['code']==2 OR $donns['code']==3){
		$session=$donns['code'];
		// emttre la requete sur le fonction
       $req=$bds->prepare('SELECT  date,adresse,check_in,check_out,time,time1,clients,user,montant,montant_repas,mont_tva,types,id_fact,nombre,type,code,society,code,calls FROM facture WHERE email_ocd= :email_ocd AND code= :code ORDER BY id_fact DESC LIMIT '.$smart_from.','.$record_peage.'');
       $req->execute(array(':code'=>$code,
	                       ':email_ocd'=>$_SESSION['email_ocd']));
		}	
	
	
	if($donns['permission']=="user:boss"){
		
		$puts='<button type="submit" value="ok" class="delete">suprimer <i class="far fa-trash-alt"></i></button>
	<select name="delete_line" id="delete_line">
	<option value="">Suprimer</option>
	<option value="10">10 lignes</option>
	<option value="30">30 lignes</option>
	<option value="50">50 lignes</option>
	</select> ';
	
	$export='<form method="post" action="excel_site.php?data_id='.$code.'"> <span class="export">Export  <button type="submit" class="excel">Excel<i class="far fa-file-excel"></i></button>';
		
	}
	else{
	   $puts="";
		$export="";
	}
	
   // 
  
		
	// on boucle sur les les resultats
	echo'<div class="expor">'.$export.'
	<span></form></div>';
	// entete du tableau
	 echo'<form method="post" id="formc" action="">
	 '.$puts.'<table id="tb">
     <thead>
     <tr class="tf">
	 <th></th>
	  <th scope="col">Date</th>
      <th scope="col">Informations</th>
	  <th scope="col">Montant(TTC)</th>
	  <th scope="col">Tva(%)</th>
	  <th scope="col">check_in</th>
	  <th scope="col">check_out</th>
	  <th scope="col">Compléments</th>
	  <th scope="col">Action</th>
	  <th scope="col">Imprimer</th>
      </tr>
      </thead>
      <tbody>';
       
	while($donnees=$req->fetch()) {
		
	$nombre =$donnees['id_fact'];
	// recupérer le chiffre
	$nombre =substr($nombre,2);
	// afficher la le checkout en fonction de la permission
	if($donns['permission']=="user:boss"){
		
		$put=' <input class="form-check-input" type="checkbox" name="check[]" id="inlineCheckbox1" value="'.$donnees['id_fact'].','.$donnees['code'].',">';
		
	
	}
	else{
		$put="";
	}
	
	// recuperer la permission pour afficher le checkout
   	// emttre la requete sur le fonction
    $rel=$bdd->prepare('SELECT  permission,code FROM inscription_client WHERE email_user= :email_user');
    $rel->execute(array(':email_user'=>$_SESSION['email_user']));
	$donns =$rel->fetch();
	
 if($donns['code']==0){
		  $session=0;
		}
		
		else{
		$session=$donns['code'];
		}
		
		if($donns['permission']=="user:boss"){
			
			$calls='<span class="boss">'.$donnees['calls'].'</span>';
		}
		
		if($donns['permission']=="user:gestionnaire"){
			$calls='<span class="gestionnaire">'.$donnees['calls'].'</span>';
		}
		
		if($donns['permission']=="user:employes"){
			$calls='<span class="employes">'.$donnees['calls'].'</span>';
		}
	
	
	if($donnees['type']==1){
	$name =" Séjour facturé";
	$jour = $donnees['nombre'].'jours';
	$encaiss="";
	$modif='<a href="gestion_home_modifiy.php?id_fact='.$donnees['id_fact'].'&code_data='.$donnees['code'].'" class="modify" title="envoi par email" data-id4='.$nombre.'"><i class="fas fa-pen" style="color:blue;font-size:13px;"></i> Modifier</a><br/>';
	$annul='';
	}
	elseif($donnees['type']==2){
		
	$name="Horaire facturé";
	$jour = $donnees['nombre'].'heure';
	$encaiss="";
	$modif='<a href="gestion_home_modifiy.php?id_fact='.$donnees['id_fact'].'&code_data='.$donnees['code'].'" class="modify" title="envoi par email" data-id4='.$nombre.'"><i class="fas fa-pen" style="color:blue;font-size:13px;"></i> Modifier</a><br/>';
	$annul=' <a href="#"  title="Annuler" class="annul" data-id5="'.$donnees['id_fact'].','.$donnees['code'].'"><i class="fas fa-minus-circle" style="color:red" font-size:13px;></i> Annuler</a><br/>';
	}
	
	elseif($donnees['type']==3){
	$jour = $donnees['nombre'].'jours';
	 $name ="Réservation";
	 $encaiss="";
	 $modif='<a href="gestion_home_modifiy.php?id_fact='.$donnees['id_fact'].'&code_data='.$donnees['code'].'" class="modify" title="envoi par email" data-id4='.$nombre.'"><i class="fas fa-pen" style="color:blue;font-size:13px;"></i> Modifier</a><br/>';
	 $annul=' <a href="#"  title="Annuler" class="annul" data-id5="'.$donnees['id_fact'].','.$donnees['code'].'"><i class="fas fa-minus-circle" style="color:red" font-size:13px;></i> Annuler</a><br/>';
	}
	
	else{
		
		$name=" séjour Annulé";
		$jour ="";
		$encaiss="";
		$modif="";
		$annul="";
	}
	
	if($donnees['montant_repas']!=0){
	$repas ="+repas dejeuner";
	$monts = $donnees['montant_repas'];
	}
	
	else{
		$repas ="";
		$monts="";
	}
	
	$date1=$donnees['date'];
	$date1 = explode('-',$date1);
	$j = $date1[2];
	$mm = $date1[1];
	$an = $date1[0];
	
	$date2=$donnees['check_in'];
	$date3=$donnees['check_out'];
	$date2 = explode('-',$date2);
	$j1 = $date2[2];
	$mm1 = $date2[1];
	$an1 = $date2[0];
	$date3 = explode('-',$date3);
	$j2 = $date3[2];
	$mm2 = $date3[1];
	$an2 = $date3[0];
	
	
    
	// récupérer le user editor
	
	$data =$donnees['user'];
	$users = explode(',',$data);
	
	$data_user = $users[0];
	
	// réecrire les montants 2 chiffres après la virgule
	$mont_tva = number_format($donnees['mont_tva'], 2, '.', '');
	$montant = number_format($donnees['montant'], 2, '.', '');
	
    // afficher dans un tableau les données des chambres
	echo'<tr class="datas'.$donnees['type'].'" id="tf">
	     <td>'.$put.'</td>
	     <td><span class="dat'.$donnees['type'].'"><i class="fas fa-circle" style="font-size:10px;"></i></span><span class="der">facture<br/>
		 '.$data_user.'</span></td>
		 <td><span class="der">N° facture: '.$nombre.'<br/><div class="data'.$donnees['type'].'">'.$name.'</span></div>
		 <i class="far fa-user" style="font-size:16px;color:black;"></i> <span class="der" style="color:black">Client :'.$donnees['clients'].'</span></td>
		 <td><span class="mont">'.$montant.' xof</span></td>
		 <td><span class="mont">'.$mont_tva.' xof</span></td>
		 <td><span class="der"> entrée le '.$j1.'/'.$mm1.'/'.$an1.'</span></td>
		 <td><span class="der"> Sortie le '.$j2.'/'.$mm2.'/'.$an2.'</span></td>
		 <td><span class="repas">'.$repas.'<br/>Temps:'.$jour.'<br/><br/>'.$calls.'</td>
		 <td><a href="#" class="details" data-id2="'.$donnees['id_fact'].','.$donnees['code'].'" title="voir le détails">détails facture</a></br/><br/> gérer <span class="action" data-id2="'.$nombre.''.$donnees['code'].'"><i class="fas fa-angle-down"></i></span><div class="datas" style="display:none" id="content'.$nombre.''.$donnees['code'].'">
		 <a href="#" class="envoi" title="envoi par email" data-id3='.$donnees['id_fact'].''.$donnees['code'].'"><i class="fab fa-telegram"></i> Envoyer</a><br/>
		  <span class="motif">'.$modif.'</span>
		  '.$encaiss.'
		  '.$annul.'
		  </div></td>
		 <td><a href="generate_data_pdf.php?id_fact='.$nombre.'&code_data='.$donnees['code'].'" target="_blank"><i class="far fa-file-pdf" style="color:red;font-size:16px;"></i></a></td>
	    </tr>';
		
		echo'<div class="mobile">
		     <div><a href="details_facture.php?data_id='.$donnees['id_fact'].'" class="details" data-id2='.$donnees['id_fact'].''.$donnees['code'].' title="voir le détails">détails facture</a></br/><br/>
		     <div>'.$put.'  Facture N° '.$nombre.'<br/>édité par'.$data_user.'</div>
		     <div class="data'.$donnees['type'].'">'.$name.'<br/></div>
			 <div><i class="far fa-user" style="font-size:16px;color:black;"></i> <span class="der" style="color:black">Client : '.$donnees['clients'].'</span><span class="dp">'.$donnees['montant'].' xof</span><br/>
		     <span class="modif">'.$modif.'</span>
			  <a href="#" class="envoi" title="envoi par email" data-id3='.$donnees['id_fact'].''.$donnees['code'].'"><i class="fab fa-telegram"></i> Envoyer</a><br/>
		     '.$encaiss.'
			 <br/>'.$annul.'<br/><span class="dg">'.$donnees['calls'].'</span></div>
	       </div>';
	}
	
      echo'</tbody>
     </table></form>';
	 
	 // on compte le nombre de ligne de la table facture
	 $reg=$bds->prepare('SELECT count(*) AS nbrs FROM facture WHERE code= :code AND email_ocd= :email_ocd');
     $reg->execute(array(':code'=>$code,
	                    ':email_ocd'=>$_SESSION['email_ocd']));
    $dns=$reg->fetch();
	
	// on compte
	$totale_page=$dns['nbrs']/$record_peage;
	$totale_page = ceil($totale_page);
	
	 echo'<div class="pied_page">';
   if($page > 1){
	  $page =$page-1;
	  echo'<div class="p"><button type="button" class="but"><a href="gestion_facture_customer.php?page='.$page.'"><i class="fa fa-angle-left" aria-hidden="true" style="font-size=33px;color:black"></i></a></button></div>'; 
   }
   for($i=1; $i<=$totale_page; $i++) {
	   
	   echo'<div class="pied" style="cursor:pointer"><button class="bout" id="'.$i.'">'.$i.'</div>';
    }
	
	if($i > $page){
		$page =$page+1;
		echo'<div class="p"><button type="button"><a href="gestion_facture_customer.php?page='.($page+1).'"><i class="fa fa-angle-right" aria-hidden="true" style="font-size=33px;color:black"></i></a></button></div>'; 
	}
	
	echo'</div>';

}	
   
  