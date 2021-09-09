<?php
include('connecte_db.php');
include('inc_session.php');

 $rel=$bdd->prepare('SELECT  permission,code FROM inscription_client WHERE   email_user= :email_user');
    $rel->execute(array(':email_user'=>$_SESSION['email_user']));
	$donns =$rel->fetch();
	
// requete qui va chercher les montants
    if($donns['permission']=="user:boss" OR $donns['permission']=="user:gestionnaire"){
   $rej=$bds->prepare('SELECT email_ocd,montant,encaisse,reservation,depense,reste,society  FROM tresorie_customer WHERE email_ocd= :email_ocd');
    $rej->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
	}
	
if($donns['permission']=="user:employes"){
$rej=$bds->prepare('SELECT email_ocd,montant,encaisse,reservation,depense,reste,
     society FROM  tresorie_customer WHERE code= :code AND email_ocd= :email_ocd');
     $rej->execute(array(':code'=>$_SESSION['code'],
                       ':email_ocd'=>$_SESSION['email_ocd']));
  }  
  
  if($_POST['action']=="fetch") {
	 
	  
   while($donnees =$rej->fetch()){
  
  echo'<span class="h1">Caisse '.$donnees['society'].'</span>

   <div id="caisse">
 <div class="td"> Facture soldée:</div>
 <div class="tds">'.$donnees['encaisse'].' XOF</div>

 <div class="td"> Dépense </div>
 <div class="tdv">'.$donnees['depense'].' XOF</div>
 
 <div class="td"> Acompte réservation</div>
 <div class="tdc">'.$donnees['reservation'].' XOF</div>
 
 <div class="td">Reste à payer réservation</div>
 <div class="tdc">'.$donnees['reste'].' XOF</div>
  
     
 </div><br/><br/>';
 }
 
  if($donns['permission']=="user:gestionnaire" OR $donns['permission']=="user:employes"){
    echo'<div><button type="button" class="print" style="margin-top:1px;" title="imprimer sa caisse journalière" onclick="printContent(\'caisse\')">imprimer</button></div>
     <div class=""><button type="button" style="margin-top:12px;margin-left:5%;"class="butt"><i style="font-size:13px" class="fa">&#xf0e2;</i>cloture de caisse</button></div>';
  }
	 
 
  $rej->closeCursor();
}

if($_POST['action']=="dat"){
	
	$rel=$bdd->prepare('SELECT permission,code,society FROM inscription_client WHERE email_user= :email_user');
    $rel->execute(array(':email_user'=>$_SESSION['email_user']));
	$donns =$rel->fetch();
	$rel->closeCursor();
	$monts=0;
	
	// recupére les données dans la base de données.
	$rej=$bds->prepare('SELECT   email_ocd,montant,encaisse,reservation,depense,reste,society FROM  tresorie_customer WHERE code= :code AND email_ocd= :email_ocd');
     $rej->execute(array(':code'=>$_SESSION['code'],
                       ':email_ocd'=>$_SESSION['email_ocd']));
     
	 $donnees = $rej->fetch();
	 $rej->closeCursor();
	 
	 // recupere les myens de paiment du user de la date de cloture
	 // recupére les données dans la base de données.
	$red=$bds->prepare('SELECT date,   email_ocd,montant,montant1,montant2,montant3 FROM  moyen_tresorie WHERE code= :code AND email_user= :email_user AND date= :dat');
     $red->execute(array(':code'=>$_SESSION['code'],
	                     ':dat'=>$_POST['date'],
                         ':email_user'=>$_SESSION['email_user']));
     
	 $dar = $red->fetchAll();
	// recupere toute les montant de myens de paiement
	// créer des tableau pour recupérer les données
	$data =[];
	$donne = [];
	$donne1 = [];
	$donne2 = [];
	$donne3 = [];
	
	foreach($dar as $values){
		$data1 = $values['date'];
		$data2 = $values['montant'];// espece
		$data3 = $values['montant1'];// carte bancaire
		$data4 = $values['montant2'];// mobile monney
		$data5 = $values['montant'];// espece chéque
		// sinder les chaine de caractère en segment
		$datas = explode(',' ,$data1);
		$datas1 = explode(',', $data2);
		$datas2 = explode(',', $data3);
		$datas3 = explode(',', $data4);
		$datas4 = explode(',', $data5);
		// les date
		foreach($datas as $value){
		$data[] = $value;
		}
		//les montant espèce
		foreach($datas1 as $valu){
		$donne[] = $valu;
		}
		// paimement en cb
		foreach($datas2 as $vale){
		$donne1[] = $vale;
		}
		// paiement par mobile monney
		foreach($datas3 as $vales){
		$donne2[] = $vales;
		}
		// paiment par chéque
		foreach($datas4 as $vlue){
		$donne3[] = $vlue;
		}
	 }
	 
	 // on recupere les montant
	 // paiement en espece
	 $a = array_sum($donne).'xof';
	 // paiment par cb
	 $b = array_sum($donne1).'xof';
	 // paiement en espece
	 $c = array_sum($donne2).'xof';
	 // paiment par cb
	 $d = array_sum($donne3).'xof';
	 
	 if(empty($a)){
		$paiement ="";
	 }
	 
	 else{
		$paiement ='<img src="https://img.icons8.com/ios-glyphs/30/000000/cash-in-hand.png"/> espéce caisse:'.$a.',';
	 }
	 if(empty($b)){
		$paiement1=""; 
	 }
	 else{
		 $paiement1='<i class="fa fa-cc-visa" aria-hidden="true"></i> carte bancaire :'.$b.',';
	}
	
	if(empty($c)){
		$paiement2=""; 
	 }
	 else{
		 $paiement2='<img src="img/check_n.png" width="40px" height="40px"></i> Mobile monney :'.$c.',';
	}
	
	if(empty($d)){
		$paiement3=""; 
	 }
	 else{
		 $paiement3='<img src="img/check.png" width="40px" height="40px" alt="check"></i> chéque :'.$d.',';
	}
	// variable 
	$payments = $paiement.','.$paiement1.','.$paiement2.','.$paiement3.',';
	 
	 if(in_array($_POST['date'],$data)){
   // on redirige vers la page
          echo'<div class="enre"><div><i class="fas fa-check-circle" style="color:green"></i> Opération réussie</button>
		     <div class="dep"><i style="font-size:40px;color:white" class="fa">&#xf250;</i></div></div>';
    $code=$_SESSION['code'];
	$society=$_SESSION['society'];
	// recuperer la permission pour afficher le checkout
   	// emttre la requete sur le fonction
	
	
   
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
   // on recupere les données pour les injecter dans la base de donnees	 
   // insertion des données dans la table facture
		$rev=$bds->prepare('INSERT INTO tresorie_user (date,email_ocd,user_gestionnaire,entree,sorties,reservation,reste,code,society,calls,moyen_paiement)VALUES(:date,:email_ocd,:user_gestionnaire,:entree,:sorties,:reservation,:reste,:code,:society,:calls,:moyen_paiement)');
	     $rev->execute(array(':date'=>$_POST['date'],
		                    ':email_ocd'=>$_SESSION['email_ocd'],
							':user_gestionnaire'=>$_SESSION['user'],
							':entree'=>$donnees['encaisse'],
							':sorties'=>$donnees['depense'],
							':reservation'=>$donnees['reservation'],
							':reste'=>$donnees['reste'],
							':code'=>$session,
							':society'=>$society,
							':calls'=>$calls,
							':moyen_paiement'=>$payments
					));
   
   // on modifie les données de la base de données guide
         $ret=$bds->prepare('UPDATE tresorie_customer SET encaisse= :des, depense= :ds, reservation= :rs, reste= :re WHERE code= :code AND email_ocd= :email_ocd');
         $ret->execute(array(':des'=>$monts,
		                    ':ds'=>$monts,
							':rs'=>$monts,
							':re'=>$monts,
							':code'=>$session,
                            ':email_ocd'=>$_SESSION['email_ocd']));
	     }
		 
		 else{
		echo'<div class="enre" style="color:red"><div><i class="fas fa-check-circle" style="color:red"></i>date inconnue,essayer à nouveau</button>
		     <div class="dep"><i style="font-size:40px;color:white" class="fa">&#xf250;</i></div></div>';	 
			 
		 }
		
		}

 if($_POST['action']=="recap"){
	 
	 $id =$_POST['id_fact'];
	// requete sur la facture
	// entre la requete sur le fonction
    $req=$bds->prepare('SELECT  montant,montant_repas,type,types,tva,montant,avance,reste,nombre FROM facture WHERE id_fact= :id_fact AND email_ocd= :email_ocd');
    $req->execute(array(':id_fact'=>$id,':email_ocd'=>$_SESSION['email_ocd']));
	
	// on recupére les chambres dans la boucle au cas 
	// entre la requete sur le fonction
    $res=$bds->prepare('SELECT  type_logement,chambre,montant,id_chambre FROM bord_informations WHERE id_fact= :id_fact AND email_ocd= :email_ocd');
    $res->execute(array(':id_fact'=>$id,':email_ocd'=>$_SESSION['email_ocd']));
	
	$donnees = $req->fetch();
	
	$mont =$donnees['montant']*floatval($donnees['tva']);
	$mont =$mont/100;
	
	if($donnees['type']==1){
		if($donnees['nombre']=="1"){
		$fact ='Séjour facturé de '.$donnees['nombre'].'jour';
		}
		
		else{
			$fact ='Séjour facturé de '.$donnees['nombre'].'jours';
		}
		$avance="";
		$reste="";
	}
	elseif($donnees['type']==2){
		if($donnees['nombre']==1){
		$fact ='Horaire facturé de '.$donnees['nombre'].'heure';
		}
		else{
			$fact ='Horaire facturé de '.$donnees['nombre'].'heures';
		}
	}
	
	else{
		$fact ='Réservation client';
	}
	echo'<div class="titre">Récaputilatif</div>
	      <div class="h6">'.$fact.'</div>
		  <div class="ds">Local concerné</div>'; 
	 // on boucle sur la requete
	  echo'<table class="">';
	 while($donns =$res->fetch()){
		 
		echo'<tr>
		     <td>'.$donns['chambre'].'</td>
			 <td>'.$donns['montant'].'xof x'.$donnees['nombre'].'</td>
			 <td><a href ="#" data-id4="'.$donns['id_chambre'].'" class="removes" title="annuler le local"><i class="fas fa-minus-circle" style="color:#F7890E;font-size:14px;"</a></td>
			 <td><input type="hidden" name="chambre[]" value="'.$donns['chambre'].'"></td>
			<td><input type="hidden" name="typ[]" value="'.$donns['type_logement'].'"></td>
			<td><input type="hidden" name="pay[]" value="'.$donns['montant'].'"></td>
			 </tr>';
		  }	
		  echo'</table>';
		  echo'<table class="tabs">
		      <tr>
		     <td>Acompte :</td>
			 <td><input type=text" name="acomp" id="acomp" value="'.$donnees['avance'].'">xof</td>
			 </tr>
			 <tr>
			 <td>Reste à payer:</td>
			 <td>'.$donnees['reste'].'xof</td>
			 </tr>
			 <tr>
			 <td><input type="hidden" name="rest" id="rest" value="'.$donnees['reste'].'"></td>
			 </tr>
			 <tr>
			 <td>+Repas</td>
			 <td><input type=text" name="rep" id="rep" value="'.$donnees['montant_repas'].'">xof</td>
			 </tr>
			 <tr>
			 <td>Taux(tva):</td>
			 <td>'.$donnees['tva'].'%</td>
			 </tr>
			 <tr>
			 <td>Montant(tva):</td>
			 <td>'.$mont.'xof</td>
			 </tr>
			 <tr>
			 <td>Total facturé :</td>
			 <td>'.$donnees['montant'].'xof</td>
			 </tr>
			 <td><input type="hidden" name="mon" id="mon" value="'.$donnees['montant'].'"></td>
			 </tr>
		   </table>';
	 
	}
	
	if($_POST['action']=="delete_check"){
		
		if(isset($_POST['checkbox_value'])){
   $email=$_SESSION['email_ocd'];
   
	for($count= 0; $count < count($_POST['checkbox_value']); $count++) {
		$req="DELETE FROM tresorie_user WHERE id ='".$_POST['checkbox_value'][$count]."' AND email_ocd='".$email."'";
		$statement= $bds->prepare($req);
		$statement->execute();
		
    }
	}
	}

?>