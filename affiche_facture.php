<?php
include('connecte_db.php');
include('inc_session.php');

 $id=$_POST['id'];
 $data = explode(',',$id);
 // on crer un tableau$
 $array = [];
 foreach($data as $value){
	$array[] = $value;
 }
 // id facture
  $id ='0.'.$array[0];
  $code=$array[1];
  $req=$bdd->prepare('SELECT id,email_ocd,email_user,denomination,user,numero,adresse,logo,numero_compte,id_entreprise FROM inscription_client WHERE email_user= :email_user');
   $req->execute(array(':email_user'=>$_SESSION['email_user']));
   $donnees =$req->fetch();
   $req->closeCursor();
   // emttre la requete sur le fonction
    $reg=$bds->prepare('SELECT  check_in,check_out,time1,time2,chambre,montant FROM bord_informations WHERE code= :code AND email_ocd= :email_ocd AND id_fact= :id');
    $reg->execute(array(':code'=>$code,
	                   ':id'=>$id,
	                   ':email_ocd'=>$_SESSION['email_ocd']));
					   
    // aller chercher les auteurs en écriture sur une facture
   $res=$bds->prepare('SELECT date,check_in,check_out,time,time1,user,clients,numero,email_client,nombre,montant,reste,avance,remise,tva,mont_tva,montant_repas,id_fact,type,types FROM facture WHERE code= :code AND id_fact= :id AND email_ocd= :email_ocd');
   $res->execute(array(':code'=>$code,
                      ':id'=>$id,
                      ':email_ocd'=>$_SESSION['email_ocd']));
   $donns=$res->fetch();
   
   $dates2 = explode('-',$donns['check_in']);
	
	$j = $dates2[2];
	$mm = $dates2[1];
	$an = $dates2[0];
	//
	$dat=$j.'/'.$mm.'/'.$an.'';
	
	$dates1 = explode('-',$donns['check_out']);
	
	$j1 = $dates1[2];
	$mm1 = $dates1[1];
	$an1 = $dates1[0];
   //
	$dat1=$j1.'/'.$mm1.'/'.$an1.'';
   // éditer la facture client
   if($donns['type']==1 OR $donns['type']==3) {
	$date1 = $donns['check_in'];
    $date2 =$donns['check_out'];
    $date = '.Date d\'entrée:'.$dat.' Date de sortie:'.$dat1.'';
     $time = 'Cout/nuité';
     $time1 ='Nombre/jour(s)';	 
	}
   
   if($donns['type']==2){
	$date1 = $donns['time'];
    $date2 = $donns['time1'];
	$date = '.Heure d\'entrée:'.$dat.' Heure de sortie:'.$dat1;	
	$time ='Cout/horaire';
	$time1='Nombre/d\'heure(s)';
   }
   
   
   echo'
       <div id="result_s"><div class="content2">
        
		<div class="conten1" style="float:left"><div class="con"><img id="logos" src="image_logo/'.$donnees['logo'].'" alt="'.$donnees['logo'].'"></div>
		<br/><br/><span class="entre">Entreprise '.$donnees['denomination'].'</span><br/><br/>
		<span class="tel">Numéro tel '.$donnees['numero'].'</span><br/><br/>
		<span class="tel">Email '.$donnees['email_ocd'].'</span><br/><br/>
		<span class="adresse">Adresse '.$donnees['adresse'].'</span><br/><br/><br/><br/>
		<span class="number">N° facture:<strong>'.$array[0].'</strong></span><br/>
		</div>
		
		<div class="cont1" style="float:left">
	     <span class="fact">Date d\'édition:'.$donns['date'].'</span><br/><br/>
		<span class="name">Nom client:<br/>'.$donns['clients'].'</span><br/><br/>
		<span class="name">Numéro:'.$donns['numero'].'</span><br/><br/>
		<span class="email">Email:'.$donns['email_client'].'</span><br/><br/>
		
		</div><!--cont1-->
		
	     </div>';
		
	echo'<div class="con3">
	     <div class="zz"> Type : '.$donns['types'].' <span class="z">'.$date.'</span></div></div>
	     <table id="ts">
		 <tr>
		 <th>Désignation du local</th>
		 <th>'.$time.'</th>
		 <th>'.$time1.'</th>
		 <th>Total à payer</th>
		 </tr>';
		 
		 while($donnees =$reg->fetch()){
			 
			$montants =$donnees['montant']*$donns['nombre']; 
		 echo'<tr>
             <td>'.$donnees['chambre'].'</td>
			 <td>'.$donnees['montant'].'</td>
			 <td>'.$donns['nombre'].'</td>
			 <td>'.$montants.'</td>
             </tr>';		 
		}
		 
		echo'</table>';
		
		echo'<div class="text_facture">Facture</div>';
		
		$montant=$donns['montant']-floatval($donns['mont_tva']);
		$montant_reel = $donns['montant']-floatval($donns['remise']);
		echo'<table id="tab">
		     <tr>
			 <td>Montant(repas)</td>
			 <td>'.$donns['montant_repas'].'xof</td>
			 </tr>
			 <tr>
			 <td>Montant(HT)</td>
			 <td>'.$montant.' xof</td>
			 </tr>
			 <tr>
			 <td>TVA(%)</td>
			 <td>'.$donns['tva'].' %</td>
			 </tr>
			 <tr>
			 <td>Remise sur facture(TTC)</td>
			 <td>'.$donns['remise'].' xof</td>
			 </tr>
			 <tr>
			 <td>Montant(TTC)</td>
			 <td>'.$donns['montant'].' xof</td>
			 </tr>
			 <tr>
			 <td>Doit payer(TTC)</td>
			 <td>'.$montant_reel.' xof</td>
			 </tr>
		    </table>
	        <div><button type="button" class="prin" style="margin-top:1px;" title="imprimer sa caisse journalière" onclick="printContent(\'caisse\')">imprimer la facture</button></div>
			<div class="footers">'.$donnees['denomination'].' '.$donnees['email'].' '.$donnees['id_entreprise'].' </div>
         </div></div></div>';

?>