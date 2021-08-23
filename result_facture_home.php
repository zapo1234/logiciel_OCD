<?php
include('connecte_db.php');
include('inc_session.php');

 $record_peage=20;
$page="";
  
  if(isset($_POST['page'])){
$page = (int) strip_tags($_POST['page']);
}

else {

$page=1;	
	
}

$smart_from =($page -1)*$record_peage;
	

   if($_POST['action']=="fetch") {
	
    // recuperer la permission pour afficher le checkout
   	// emttre la requete sur le fonction
    $rel=$bdd->prepare('SELECT  permission,society,code FROM inscription_client WHERE email_user= :email_user');
    $rel->execute(array(':email_user'=>$_SESSION['email_user']));
	$donns =$rel->fetch();
	 
	 //gérer les permission de vues des factures
	if($donns['permission']=="user:boss" OR $donns['permission']=="user:gestionnaire"){
		  // emttre la requete sur le fonction
        $req=$bds->prepare('SELECT  date,adresse,check_in,check_out,time,time1,clients,user,montant,montant_repas,mont_tva,types,id_fact,nombre,type,society,code,calls FROM facture WHERE email_ocd= :email_ocd  ORDER BY id_fact DESC LIMIT '.$smart_from.','.$record_peage.'');
        $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
		}
		
		// afficher les facture.
		if($donns['code']==1 OR $donns['code']==2){
		$session=$donns['code'];
		// emttre la requete sur le fonction
       $req=$bds->prepare('SELECT  date,adresse,check_in,check_out,time,time1,clients,user,montant,montant_repas,mont_tva,types,id_fact,nombre,type,code,society,code,calls FROM facture WHERE email_ocd= :email_ocd AND code= :code ORDER BY id_fact DESC LIMIT '.$smart_from.','.$record_peage.'');
       $req->execute(array(':code'=>$session,
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
	
	$export='<form method="post" action="excel.php"> <span class="export">Export  <button type="submit" class="excel">Excel<i class="far fa-file-excel"></i></button>';
		
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
	 $reg=$bds->prepare('SELECT count(*) AS nbrs FROM facture WHERE email_ocd= :email_ocd');
     $reg->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
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
   
   if($_POST['action']=="details"){
	   // recupérer le chiffre
	 $id=$_POST['id'];
	 $data = explode(',',$id);
	 $id_fact = $data[0];
	 $code = $data[1];
	  // aller chercher les auteurs en écriture sur une facture
	 $res=$bds->prepare('SELECT date,adresse,clients,email_client,numero,check_in,check_out,time,time1,nombre,piece_identite,montant,reste,avance,mont_tva,user,moyen_paiement,types,id_fact,type FROM facture WHERE code= :code AND id_fact= :id AND email_ocd= :email_ocd');
   $res->execute(array(':code'=>$code,
                       ':id'=>$id_fact,
                      ':email_ocd'=>$_SESSION['email_ocd']));
   $donnees=$res->fetch();
   
   // requete 
   // recupére les données de la base de données si $_GET['id_fact']
   $req=$bds->prepare('SELECT type_logement,chambre,id_chambre,montant,mont_restant FROM bord_informations WHERE code= :code AND id_fact= :id_fact AND email_ocd= :email_ocd ');
    $req->execute(array(':code'=>$code,
	                    ':id_fact'=>$id_fact,
	                   ':email_ocd'=>$_SESSION['email_ocd']));
   
    $nombre =substr($donnees['id_fact'],2); 
    
	// modifier en display block $donnees[user] pour écriture
	$rem='<br/>';
	$rt=",";
  	$montant = number_format($donnees['montant'], 2, '.', '');
	$mont_tva = number_format($donnees['mont_tva'], 2, '.', '');
	
	 echo'<div class="detail">
	      <h4>Détails de la facture</h4>
	      <div class="h">N° de facture <span class="fact">'.$nombre.'</span><br/><span class="typ">Type de facture :  '.$donnees['types'].'</span></div>
	      <div class="h"><i class="far fa-user" style="font-size:13px;color:#4e73df"></i>  Client :'.$donnees['clients'].'  <span class="num"><i class="fas fa-phone" style="font-size:13px;color:#4e73df;padding-left:2%;"></i> Numéro tél: '.$donnees['numero'].'</span><br/>
		  <i class="fas fa-envelope-open" style="font-size:13px; color:#4e73df"></i> Email :'.$donnees['email_client'].'</div>
		  
		  <div class="h">Local facturé</div>
		  <table class="liste">
		  <th class="h">Type de logement</th>
		  <th class="h">Local facturé</th>
		  <th class="h"> Prix hors taxe(unitaire)</th>
		  <th class="h">Temps éffectué</th>
		  ';
		  
		  while($datas=$req->fetch()){
		  echo'<tr>
		  <td class="h">'.$datas['type_logement'].'</td>
		  <td class="h">'.$datas['chambre'].'</td>
		  <td class="h">'.$datas['montant'].'xof x'.$donnees['nombre'].'</td>
		  </tr>';
		  }
		  echo'</table>
		  
		  <div class="h">
		  <table class="list">
		  <tr>
		  <th>Montant à payer </th>
		  <th>Taxe(TVA)</td>
		  <th>Acompte sur facture</th>
		  <th> Reste à payer</td>
		  <th> Moyens de paimement</td>
		  </tr>
		  <tr>
		  <td>'.$montant.'xof</td>
		  <td>'.$mont_tva.'xof</td>
		  <td>'.$donnees['avance'].'xof</td>
		  <td>'.$donnees['reste'].'xof</td>
		  <td>'.str_replace($rt,$rem,$donnees['moyen_paiement']).'</td>
		  </tr>
		  </table>
		  </div>
		  
		  <div class="h"><i class="fas fa-edit" style="color:#4e73df;font-size:20px;"></i> historique ecritures,facture éditéé et modifiée</div>
		  <div class="hs">'.str_replace($rt,$rem,$donnees['user']).'</div>
		  </div> 
          </div>		  
		  ';
   
   }
   
   if($_POST['action']=="deleted"){
	   
	 $id=$_POST['id']; 
	 $data =explode(',',$id);
	 $id_fact =$data[0];
	 $code =$data[1];
     
    $rej=$bds->prepare('SELECT email_ocd,montant,encaisse,reservation,depense,reste FROM tresorie_customer WHERE code= :code AND email_ocd= :email_ocd');
   $rej->execute(array(':code'=>$code,
                      ':email_ocd'=>$_SESSION['email_ocd']));
   $donnees=$rej->fetch();
   $rej->closeCursor();

   // aller chercher les auteurs en écriture sur une facture
	 $res=$bds->prepare('SELECT date,user,montant,reste,avance FROM facture WHERE code= :code AND id_fact= :id AND email_ocd= :email_ocd');
   $res->execute(array(':code'=>$code,
                       ':id'=>$id_fact,
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
         $ret=$bds->prepare('UPDATE tresorie_customer SET encaisse= :des, reservation= :rs, reste= :re WHERE code= :code AND email_ocd= :email_ocd');
        $ret->execute(array(':des'=>$donnees['encaisse']-$donns['montant'],
							':rs'=>$donnees['reservation']-$donns['avance'],
							':re'=>$donnees['reste']-$donns['reste'],
							':code'=>$code,
                            ':email_ocd'=>$_SESSION['email_ocd']
					 ));
		$ty="4";
		$tys="facture annulé";
		// on modifie le type dans la table facture
         $ret=$bds->prepare('UPDATE facture SET user= :us, type= :ty, types= :tys WHERE code= :code AND id_fact= :id AND email_ocd= :email_ocd');
        $ret->execute(array(':us'=>$user_datas,
		                    ':ty'=>$ty,
							':tys'=>$tys,
							':code'=>$code,
							':id'=>$id_fact,
                            ':email_ocd'=>$_SESSION['email_ocd']
					 ));
        // vous suprimer les données dans home_occupation
        $rey =$bds->prepare('DELETE FROM home_occupation WHERE code= :code AND id_fact= :id AND email_ocd= :email_ocd');
		$rey->execute(array(':code'=>$code,
		                    ':id'=>$id_fact,
		                    ':email_ocd'=>$_SESSION['email_ocd']
							));
       		
           echo'<div class="enre"><span class="d" style="color:#AB040E;"><i class="fas fa-exclamation-circle" style="font-size:16px;color:#AB040E;"></i> vous avez annulé la facture</span></div>';
	   
   }
   
   

if($_POST['action']=="mail"){
	
	if($_SESSION['code']==0){
	 $session=0;
	}
	else{
		$session=$_SESSION['code'];
	}
	// aller chercher les auteurs en écriture sur une facture
	$id=$_POST['id'];
	 $res=$bds->prepare('SELECT email_client FROM facture WHERE code= :code AND id_fact= :id AND email_ocd= :email_ocd');
   $res->execute(array(':code'=>$session,
                       ':id'=>$id,
                      ':email_ocd'=>$_SESSION['email_ocd']));
   $donns=$res->fetch();
	
	echo'<div class="envoyer">
   <form method="post" id="form_envoi" action="">
   <h1>Envoyer la facture <br/> à l\'adresse mail</h1>
   <div>Client:<span id="nam"></span></div>
   <div><input type="email" id="emails" name="emails" value="'.$donns['email_client'].'"></div>
   <div class="action"><button type="button" class="envoi">Annuler</button> <button type="button" class="env">envoyer</button></div>
   <input type="hidden" name="value" id="'.$id.'">
  <input type="hidden" name="token" id="token" value="<?php
  //Le champ caché a pour valeur le jeton
   '.$_SESSION['token'].'">
   </form>
 
  </div>';
	
}



?>