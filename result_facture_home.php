<?php
include('connecte_db.php');
include('inc_session.php');

   if($_POST['action']=="fetch") {
   // emttre la requete sur le fonction
    $req=$bds->prepare('SELECT  date,adresse,check_in,check_out,time,time1,clients,user,montant,montant_repas,mont_tva,types,id_fact,nombre,type FROM facture WHERE email_ocd= :email_ocd ORDER BY id_fact DESC LIMIT 0,10');
    $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
	
	// on boucle sur les les resultats
	echo'<div class="expor"><h2>Gestion des factures de vos clients</h2> <span class="export">Export  <button type="button" class="excel">Excel <i class="far fa-file-excel"></i></button>
	<button type="button" class="csv">Csv <i class="fas fa-file-csv"></i></button><span></div>';
	// entete du tableau
	 echo'	<table class="table">
     <thead>
     <tr class="tf">
	  <th scope="col">Date</th>
      <th scope="col">Informations</th>
	  <th scope="col">Montant(HT)</th>
	  <th scope="col">Tva(%)</th>
	  <th scope="col">check_in</th>
	  <th scope="col">check_out</th>
	  <th scope="col">Compléments</th>
	  <th scope="col">Action</th>
	  <th scope="col">Imprimer</th>
      </tr>
      </thead>
      <tbody>';
       
	while($donnees = $req->fetch()) {
		
	if($donnees['type']==1){
	$name =" Séjour facturé";
	$jour = $donnees['nombre'].'jours';
	$encaiss="";
	}
	elseif($donnees['type']==2){
		
	$name="Horaire facturé";
	$jour = $donnees['nombre'].'heure';
	$encaiss="";
	}
	
	elseif($donnees['type']==3){
	$jour = $donnees['nombre'].'jours';
	 $name ="Réservation";
	 $encaiss='<a href="#" class="envoi" title="Encaisser" data-id6='.$donnees['id_fact'].'"><i class="fas fa-arrow-square-right" sytle="font-size:13px;color:green"></i> Encaisser</a><br/>';
	}
	
	else{
		
		$name="Annulé";
		$jour ="";
		$encaiss="";
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
	
	$nombre =$donnees['id_fact'];
	
	// recupérer le chiffre
	$nombre =substr($nombre,2);
	
    // afficher dans un tableau les données des chambres
	echo'<tr class="datas'.$donnees['type'].'">
	     <td><span class="data'.$donnees['type'].'"><i class="fas fa-circle" style="font-size:14px;"></i></span><span class="der"> Facture émise le<br/>'.$j.'/'.$mm.'/'.$an.'<br/>
		 par gérant: '.$donnees['user'].'</span></td>
		 <td><span class="der">N° facture: '.$nombre.'<br/><div class="data'.$donnees['type'].'">'.$name.'</span></div>
		 <i class="far fa-user" style="font-size:16px;"></i> Client :'.$donnees['clients'].'</td>
		 <td><span class="mont">'.$donnees['montant'].' xof</span></td>
		 <td><span class="mont">'.$donnees['mont_tva'].' xof</span></td>
		 <td><span class="der"> entrée le '.$j1.'/'.$mm1.'/'.$an1.'</span></td>
		 <td><span class="der"> Sortie le '.$j2.'/'.$mm2.'/'.$an2.'</span></td>
		 <td><span class="repas">'.$repas.'<br/>Temps:'.$jour.'</td>
		 <td><button type="button" class="button" data-id='.$donnees['id_fact'].'>détails facture</button></br/><br/> gérer <span class="action" data-id2="'.$nombre.'"><i class="fas fa-angle-down"></i></span><div class="datas" style="display:none" id="content'.$nombre.'">
		 <a href="#" class="envoi" title="envoi par email" data-id3='.$donnees['id_fact'].'"><i class="fab fa-telegram"></i> Envoyer</a><br/>
		 <a href="gestion_home_modifiy.php?id_fact='.$donnees['id_fact'].'" class="modify" title="envoi par email" data-id4='.$nombre.'"><i class="fas fa-pen" style="color:blue;font-size:13px;"></i> Modifier</a><br/>
		  '.$encaiss.'
		  <a href="#"  title="Annuler" class="annul" data-id5="'.$donnees['id_fact'].'"><i class="fas fa-minus-circle" style="color:red" font-size:13px;></i> Annuler</a><br/>
		  </div></td>
		 <td><a href="gestion_datas_facture.php?id_fact="'.$nombre.'"><i class="far fa-file-pdf" style="color:red;font-size:16px;"></i></a></td>
	    </tr>';
	}
	
      echo'</tbody>
     </table>';

   }

?>