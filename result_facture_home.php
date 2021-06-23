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
		
	$nombre =$donnees['id_fact'];
	// recupérer le chiffre
	$nombre =substr($nombre,2);
	
	if($donnees['type']==1){
	$name =" Séjour facturé";
	$jour = $donnees['nombre'].'jours';
	$encaiss="";
	$modif='<a href="gestion_home_modifiy.php?id_fact='.$donnees['id_fact'].'" class="modify" title="envoi par email" data-id4='.$nombre.'"><i class="fas fa-pen" style="color:blue;font-size:13px;"></i> Modifier</a><br/>';
	$annul='<a href="#"  title="Annuler" class="annul" data-id5="'.$donnees['id_fact'].'"><i class="fas fa-minus-circle" style="color:red" font-size:13px;></i> Annuler</a><br/>';
	}
	elseif($donnees['type']==2){
		
	$name="Horaire facturé";
	$jour = $donnees['nombre'].'heure';
	$encaiss="";
	$modif='<a href="gestion_home_modifiy.php?id_fact='.$donnees['id_fact'].'" class="modify" title="envoi par email" data-id4='.$nombre.'"><i class="fas fa-pen" style="color:blue;font-size:13px;"></i> Modifier</a><br/>';
	$annul=' <a href="#"  title="Annuler" class="annul" data-id5="'.$donnees['id_fact'].'"><i class="fas fa-minus-circle" style="color:red" font-size:13px;></i> Annuler</a><br/>';
	}
	
	elseif($donnees['type']==3){
	$jour = $donnees['nombre'].'jours';
	 $name ="Réservation";
	 $encaiss='<a href="#" class="envoi" title="Encaisser" data-id6='.$donnees['id_fact'].'"><i class="fas fa-arrow-square-right" sytle="font-size:13px;color:green"></i> Encaisser</a><br/>';
	 $modif='<a href="gestion_home_modifiy.php?id_fact='.$donnees['id_fact'].'" class="modify" title="envoi par email" data-id4='.$nombre.'"><i class="fas fa-pen" style="color:blue;font-size:13px;"></i> Modifier</a><br/>';
	 $annul=' <a href="#"  title="Annuler" class="annul" data-id5="'.$donnees['id_fact'].'"><i class="fas fa-minus-circle" style="color:red" font-size:13px;></i> Annuler</a><br/>';
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
	
    // afficher dans un tableau les données des chambres
	echo'<tr class="datas'.$donnees['type'].'">
	     <td><span class="dat'.$donnees['type'].'"><i class="fas fa-circle" style="font-size:10px;"></i></span><span class="der"> Facture émise le<br/>'.$j.'/'.$mm.'/'.$an.'<br/>
		 '.$data_user.'</span></td>
		 <td><span class="der">N° facture: '.$nombre.'<br/><div class="data'.$donnees['type'].'">'.$name.'</span></div>
		 <i class="far fa-user" style="font-size:16px;"></i> Client :'.$donnees['clients'].'</td>
		 <td><span class="mont">'.$donnees['montant'].' xof</span></td>
		 <td><span class="mont">'.$donnees['mont_tva'].' xof</span></td>
		 <td><span class="der"> entrée le '.$j1.'/'.$mm1.'/'.$an1.'</span></td>
		 <td><span class="der"> Sortie le '.$j2.'/'.$mm2.'/'.$an2.'</span></td>
		 <td><span class="repas">'.$repas.'<br/>Temps:'.$jour.'</td>
		 <td><a href="#" class="details" data-id2='.$donnees['id_fact'].' title="voir le détails">détails facture</a></br/><br/> gérer <span class="action" data-id2="'.$nombre.'"><i class="fas fa-angle-down"></i></span><div class="datas" style="display:none" id="content'.$nombre.'">
		 <a href="#" class="envoi" title="envoi par email" data-id3='.$donnees['id_fact'].'"><i class="fab fa-telegram"></i> Envoyer</a><br/>
		  '.$modif.'
		  '.$encaiss.'
		  '.$annul.'
		  </div></td>
		 <td><a href="gestion_datas_facture.php?id_fact="'.$nombre.'"><i class="far fa-file-pdf" style="color:red;font-size:16px;"></i></a></td>
	    </tr>';
	}
	
      echo'</tbody>
     </table>';

   }
   
   if($_POST['action']=="details"){
	   // recupérer le chiffre
	 $id =$_POST['id'];
	  // aller chercher les auteurs en écriture sur une facture
	 $res=$bds->prepare('SELECT date,adresse,clients,check_in,check_out,piece_identite,montant,reste,avance,time,time1,user,types,id_fact,email_client,numero FROM facture WHERE id_fact= :id AND email_ocd= :email_ocd');
   $res->execute(array(':id'=>$id,
                      ':email_ocd'=>$_SESSION['email_ocd']));
   $donnees=$res->fetch();
   
   // requete 
   // recupére les données de la base de données si $_GET['id_fact']
   $req=$bds->prepare('SELECT type_logement,chambre,id_chambre,montant,mont_restant FROM bord_informations WHERE id_fact= :id_fact AND email_ocd= :email_ocd ');
    $req->execute(array(':id_fact'=>$id,
	                   ':email_ocd'=>$_SESSION['email_ocd']));
   
    $nombre =substr($donnees['id_fact'],2); 
    
	// modifier en display block $donnees[user] pour écriture
	$rem='<br/>';
	$rt=",";
  	
	 echo'<div class="detail">
	      <h4>Détails de la facture</h4>
	      <div class="h">N° de facture <span class="fact">'.$nombre.'</span><br/><span class="typ">Type de facture :  '.$donnees['types'].'</span></div>
	      <div class="h"><i class="far fa-user" style="font-size:13px;color:#4e73df"></i>  Client :'.$donnees['clients'].'  <span class="num"><i class="fas fa-phone" style="font-size:13px;color:#4e73df;padding-left:2%;"></i> Numéro tél: '.$donnees['numero'].'</span><br/>
		  <i class="fas fa-envelope-open" style="font-size:13px; color:#4e73df"></i> Email :'.$donnees['email_client'].'</div>
		  
		  <div class="h">Local facturé</div>
		  <table class="liste">
		  <th class="h">Type de logement</th>
		  <th class="h">Local facturé</th>
		  <th class="h"> Prix hors taxe</th>
		  ';
		  
		  while($datas=$req->fetch()){
		  echo'<tr>
		  <td class="h">'.$datas['type_logement'].'</td>
		  <td class="h">'.$datas['chambre'].'</td>
		  <td class="h">'.$datas['montant'].'</td>
		  </tr>';
		  }
		  echo'</table>
		  <div class="h"><i class="fas fa-edit" style="color:#4e73df;font-size:20px;"></i> historique ecritures,facture éditéé et modifiée</div>
		  <div class="hs">'.str_replace($rt,$rem,$donnees['user']).'</div>
		  </div> 
          </div>		  
		  ';
   
   }
   
   if($_POST['action']=="deleted"){
	   
	 $id=$_POST['id']; 
     
    $rej=$bds->prepare('SELECT email_ocd,montant,encaisse,reservation,depense,reste FROM tresorie_customer WHERE email_ocd= :email_ocd');
   $rej->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
   $donnees=$rej->fetch();
   $rej->closeCursor();

   // aller chercher les auteurs en écriture sur une facture
	 $res=$bds->prepare('SELECT date,user,montant,reste,avance FROM facture WHERE id_fact= :id AND email_ocd= :email_ocd');
   $res->execute(array(':id'=>$id,
                      ':email_ocd'=>$_SESSION['email_ocd']));
   $donns=$res->fetch();
    
	// on ajoute le user qui as annulé la facture
	// création d'un tableau pour recupérer les users
   $user_data = $donns['user'].',<i class="fas fa-exclamation-circle" style="font-size:13px;color:#AB040E;"></i>  annulée le  '.date('d-m-Y').'à  '.date('H:i').' par   <span class="edit"><i class="fas fa-user-edit" style="font-size:13px;color:#4e73df;"></i>'.$_SESSION['user'].'</span>';
   // convertir en chaine de caractère le tableau
   $user = explode(',',$user_data);
   
   $user_datas = implode(',',$user);
    // on modifer les montants

    	// on modifie les données de la base de données guide
         $ret=$bds->prepare('UPDATE tresorie_customer SET encaisse= :des, reservation= :rs, reste= :re WHERE email_ocd= :email_ocd');
        $ret->execute(array(':des'=>$donnees['montant']-$donns['montant'],
							':rs'=>$donnees['reservation']-$donns['avance'],
							':re'=>$donnees['reste']-$donns['reste'],
                            ':email_ocd'=>$_SESSION['email_ocd']
					 ));
		$ty="4";
		$tys="facture annulé";
		// on modifie le type dans la table facture
         $ret=$bds->prepare('UPDATE facture SET user= :us, type= :ty, types= :tys WHERE id_fact= :id AND email_ocd= :email_ocd');
        $ret->execute(array(':us'=>$user_datas,
		                    ':ty'=>$ty,
							':tys'=>$tys,
							':id'=>$id,
                            ':email_ocd'=>$_SESSION['email_ocd']
					 ));			 
           echo'<div class="enre">vous avez annulé la facture</div>';
	   
   }

?>