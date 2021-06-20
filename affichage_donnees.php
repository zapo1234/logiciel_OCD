<?php
include('connecte_db.php');
include('inc_session.php');

// requete qui va chercher les montants

$rej=$bds->prepare('SELECT email_ocd,montant,encaisse,reservation,depense,reste FROM tresorie_customer WHERE email_ocd= :email_ocd');
   $rej->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
   $donnees=$rej->fetch();
   $rej->closeCursor();

if($_POST['action']== "fetch") {
  

 
  
  echo'<div class ="h1">Encaissement journalier</div>
 <table id="montant">
 <tr class="en">
 <td><i style="font-size:18px;color:green" class="fa">&#xf063;</i> Facture soldée:</td>
 <td>'.$donnees['encaisse'].' XOF</td>
 </tr>
 <tr class="en">
 <td><i style="font-size:18px;color:red;" class="fa">&#xf062;</i> Dépense </td>
 <td>'.$donnees['depense'].' XOF</td>
 </tr>
 <tr class="en">
 <td><i style="font-size:18px;color:#1E90FF" class="fa">&#xf07a;</i>  Acompte réservation</td>
 <td>'.$donnees['reservation'].' XOF</td>
 </tr>
 
 <tr class="en">
 <td><i style="font-size:18px;color:#1E90FF" class="fa">&#xf07a;</i> Reste à payer réservation</td>
 <td>'.$donnees['reste'].' XOF</td>
 </tr>
 
 </table>';
 
 echo'<div class="h2"><button type="button" class="butt"><i style="font-size:13px" class="fa">&#xf0e2;</i>  réinitialiser</button>';
 

}

if($_POST['action']=="dat"){
$monts=0;

   // on redirige vers la page
          echo'<div class="enre"><div><i class="fas fa-check-circle" style="color:green"></i> Opération réussie</button>
		     <div class="dep"><i style="font-size:40px;color:white" class="fa">&#xf250;</i></div></div>';

  // on recupere les données pour les injecter dans la base de donnees	 
   // insertion des données dans la table facture
		$rev=$bds->prepare('INSERT INTO tresorie_user (date,email_ocd,user_gestionnaire,entree,sorties,reservation,reste) 
		VALUES(:date,:email_ocd,:user_gestionnaire,:entree,:sorties,:reservation,:reste)');
	     $rev->execute(array(':date'=>$_POST['date'],
		                    ':email_ocd'=>$_SESSION['email_ocd'],
							':user_gestionnaire'=>$_SESSION['user'],
							':entree'=>$donnees['encaisse'],
							':sorties'=>$donnees['depense'],
							':reservation'=>$donnees['reservation'],
							':reste'=>$donnees['reste']
					));
   
   // on modifie les données de la base de données guide
         $ret=$bds->prepare('UPDATE tresorie_customer SET encaisse= :des, depense= :ds, reservation= :rs, reste= :re WHERE email_ocd= :email_ocd');
        $ret->execute(array(':des'=>$monts,
		                    ':ds'=>$monts,
							':rs'=>$monts,
							':re'=>$monts,
                            ':email_ocd'=>$_SESSION['email_ocd']
					 ));
					 
	  
  	
	
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

?>