<?php
include('connecte_db.php');
include('inc_session.php');

$record_peage=20;
$page="";
  
  if(isset($_POST['page'])){
$page = $_POST['page'];
}

else {

$page=1;	
	
}
 if($_POST['action']=="fetchs"){
$smart_from =($page -1)*$record_peage;
	 
 // recuperer la permission pour afficher le checkout
   	// emttre la requete sur le fonction
    $rel=$bdd->prepare('SELECT  permission,society,code FROM inscription_client WHERE email_user= :email_user');
    $rel->execute(array(':email_user'=>$_SESSION['email_user']));
	$donns =$rel->fetch();
	
	// emttre la requete sur le fonction
    $req=$bds->prepare('SELECT  date,adresse,check_in,check_out,time,time1,clients,user,montant,montant_repas,mont_tva,types,id_fact,nombre,type,moyen_paiement FROM facture WHERE email_ocd= :email_ocd ORDER BY id_fact DESC LIMIT '.$smart_from.','.$record_peage.'');
    $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
	
	if($donns['permission']=="user:boss"){
		
		$puts='<button type="button" class="delete">suprimer <i class="far fa-trash-alt"></i></button>
	<select name="delete_line" id="delete_line">
	<option value="">Suprimer</option>
	<option value="10">10 lignes</option>
	<option value="30">30 lignes</option>
	<option value="50">50 lignes</option>
	</select> ';
		
	}
	else{
		
		$puts="";
	}
	
	
 $req=$bds->prepare('SELECT id,date,entree,sorties,user_gestionnaire,reservation,reste,society,moyen_paiement,code FROM tresorie_user WHERE email_ocd= :email_ocd ORDER BY id DESC LIMIT '.$smart_from.','.$record_peage.'');
 $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
 $datas=$req->fetchAll();
	
	echo'<div id="derr">';
  // on boucle sur les les resultats
	// on boucle sur les les resultats
	echo'<div class="expor"><h2>Suivi des montants journaliers encaissés</h2><form method="post" action="excelc.php"> <span class="export">Export  <button type="submit" class="excel">Excel<i class="far fa-file-excel"></i></button>
	<span>'.$puts.'</form></div>';
  echo'	<table id="tabs">
     <thead>
     <tr class="tf">
	 <th></th>
	  <th scope="col">Date de cloture</th>
	  <th scope="col">Entrées en caisse</th>
      <th scope="col">Sorties de caisse</th>
	  <th scope="col">Acompte(réservation)</th>
	  <th scope="col">Reste à solder(réservation)</th>
	  <th scope="col">Géstionnaire</th>
	  <th scope="col">Moyen/paiement</th>
      </tr>
      </thead>
      <tbody>';
    
	
	// créer 4 tableau vide
	$datac =[];
	$datac1 =[];
	$datac2 =[];
	$datac3 =[];
  foreach($datas as $donnes){
	  
	  // afficher la le checkout en fonction de la permission
	if($donns['permission']=="user:boss"){
		
		$put=' <input class="form-check-input" type="checkbox" name="check[]" id="inlineCheckbox1" value="'.$donnes['id'].'">';
		
	}
	else{
		
		$put="";
	}

   $date1=$donnes['date'];
	$date1 = explode('-',$date1);
	$j = $date1[2];
	$mm = $date1[1];
	$an = $date1[0];
	$rt='<br/>';
	$rem=',';
     echo'<tr class="datas'.$j.'/'.$mm.'/'.$an.'" id="tf">
	     <td>'.$put.'</td>
	     <td>'.$j.'/'.$mm.'/'.$an.'</td>
		 <td><span class="repas">'.$donnes['entree'].'xof</td>
		 <td><span class="repas">'.$donnes['sorties'].'xof</td>
		 <td><span class="repas">'.$donnes['reservation'].'xof</td>
		 <td><span class="repas">'.$donnes['reste'].'xof</td>
		 <td><span class="repas">'.$donnes['user_gestionnaire'].' travail à '.$donnes['society'].'<br/></td>
		 <td><div id="first'.$donnes['id'].'"><span style="cursor:pointer" class="moyen" data-id2='.$donnes['id'].'>Moyen de paiment <i class="fas fa-angle-down"></i></span></div> 
		 <div id="second'.$donnes['id'].'"></div>
		 <div id="paiement'.$donnes['id'].'" class="payements"></div></td>
		</tr>';
		// pour le mobile
		echo'<div class="mobile">
		     <div>'.$put.' <span class="der"><img src="img/caisse.png" alt="caisse" width="15px" height="15px"> transmis le '.$j.'/'.$mm.'/'.$an.' par   <i class="far fa-user" style="font-size:16px;color:black;"></i>'.$donnes['user_gestionnaire'].'</span></div>
		     <div>Recette encaissée<span class="der"><span> '.$donnes['entree'].'xof</div>
			 <div>Dépense effectuée <span class="der">'.$donnes['sorties'].'xof</span></div>
		     <div>Acompte réservation <span class="der">'.$donnes['reservation'].'xof</span></div>
		     <div>Reste à payer<span class="der">'.$donnes['reste'].'xof</span></div><br/>
			 <div class="user" style="font-size:16px;color:green"><img src="img/map.png" alt="map" width="15px" height="15px"> travail à '.$donnes['society'].'</div>
			 <div class="pay">
			 <div id="three'.$donnes['id'].'"><span style="cursor:pointer;color:#0C80E7;padding-left:40%;"  class="moye" data-id2='.$donnes['id'].'>Moyen de paiement <i class="fas fa-angle-down"></i></span></div> 
		     <div id="four'.$donnes['id'].'"></div>
		    <div id="paiemen'.$donnes['id'].'"  class="payements"></div>     </div>
		     
	       </div>';
		   
    }

       echo'</table>';
	   
       // on compte
		// on compte le nombre de ligne de la table facture
      // on compte le nombre de ligne de la table facture
	 if($_SESSION['code']==0){
	 $reg=$bds->prepare('SELECT count(*) AS nbrs FROM tresorie_user WHERE email_ocd= :email_ocd');
     $reg->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
	 }
	 
	 else{
		$reg=$bds->prepare('SELECT count(*) AS nbrs FROM depense WHERE code= :code AND email_ocd= :email_ocd');
        $reg->execute(array(':code'=>$_SESSION['code'],
	                    ':email_ocd'=>$_SESSION['email_ocd'])); 
	 }
	
	$dns=$reg->fetch();
	$totale_page=$dns['nbrs']/$record_peage;
	$totale_page = ceil($totale_page);
	
	for($i=1; $i<=$totale_page; $i++) {
	   
	   echo'<div class="pied_page"><button class="bout" id="'.$i.'">'.$i.'</button></div>';
    }
  
   echo'</div>';
   $reg->closeCursor();
 }
 
 if($_POST['action']=="payements"){
	// recupere les moyens de paiement dans la base de données
	$id =$_POST['id'];
	$req=$bds->prepare('SELECT moyen_paiement FROM tresorie_user WHERE id= :id ');
 $req->execute(array(':id'=>$id));
 $donnes =$req->fetch();
 // on afficher
   $rt=',';
   $rem ='<br/>';
   echo'<span>'.str_replace($rt,$rem,$donnes['moyen_paiement']).'</span>';
   $req->closeCursor();
 }