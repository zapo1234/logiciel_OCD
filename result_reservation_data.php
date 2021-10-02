<?php
 include('connecte_db.php');
 include('inc_session.php');

 //Afficher en temps réel le cheminement du clients 
 //Cas de reservation rappel.
 //ecrire la requete va recupere les données entre facture et bord_informations
   // afficher les resultat
 
 if($_SESSION['code']==0){
	  $sql=$bds->prepare('SELECT id_fact,clients, 
      numero,type,check_in,email_client,check_out,avance From facture WHERE email_ocd= :email');
	  $sql->execute(array(':email'=>$_SESSION['email_ocd']));
	  }
	  
	  else{
		  $sql=$bds->prepare('SELECT id_fact, clients, 
      numero,type,check_in, email_client,check_out,avance FROM facture WHERE code = :cd AND email_ocd= :email');
	  
    $sql->execute(array(':cd'=>$_SESSION['code'],
	                    ':email'=>$_SESSION['email_ocd']));
	   
		 }
		 
	 // afficher les resultats
	   echo'<table class="tbs">
	   <th width="300px">N°facture</th>
	    <th width="300px">Client</th>
		<th>Numéro</th>
	     <th>Email</th>
		 <th width="300px">Acompte</th>
		 <th width="400px">Etat</th>';
    // on parcoure les requetes
	$date_today = date('y-m-d');

     foreach($sql as $value){
		if($value['type']==1){
		 // on recupere la date
			$date = $value['check_in'];
			$date_today = date('y-m-d');
			
			$dateTimestamp1 = strtotime($date);
            $dateTimestamp2 = strtotime($date_today);
            $diff= $dateTimestamp1-$dateTimestamp2;
			
			if($diff > 0  OR $diff ==0) {
			// diffference entre les deux dates
			$tDeb = explode("-", $date_today);
            $tFin = explode("-", $date);

           $diff = mktime(0, 0, 0, $tFin[1], $tFin[2], $tFin[0]) - 
              mktime(0, 0, 0, $tDeb[1], $tDeb[2], $tDeb[0]);
			  
			$result=$diff / 86400;
			
			if($result > 10){
				$status_reservation ='<img src="https://img.icons8.com/ios-filled/48/000000/man-dragging-sack.png" width="28px" height="28px"/> l\'arrivée du client  est en cours';
				$color="arrive";
		     }
			 
			 if($result <= 10 AND $result >= 2){
			$status_reservation ='<img src="https://img.icons8.com/ios/48/000000/man-dragging-sack.png" width="28px" height="28px"/> le client arrive  dans '.$result.'jours';
			$color ="attention";
			 }
			 
			 if($result==1){
				 $status_reservation ='<img src="https://img.icons8.com/ios/48/000000/man-dragging-sack.png" width="28px" height="28px"/>  le client arrive demain.'; 
				 $color="alerte";
			 }
			 
			 if($diff==0){
				$status_reservation ='<img src="img/valid.png" alt="valid" width="15px" height="15px"/> le séjour est consommé';
			}
			
			$acompte ="le client à soldé sa facture";
			
			   echo'<tr>
			        <td style="color:#06308E;font-size:15px;font-weight:bold">'.substr($value['id_fact'],2).'</td>
			        <td>'.$value['clients'].'</td>
					<td><img src="https://img.icons8.com/color/48/000000/phone.png" width="18px" height="18px"/> '.$value['numero'].'</td>
					<td>'.$value['email_client'].'</td>
					<td>'.$acompte.'</td>
					<td><div class="'.$color.'">'.$status_reservation.'</div></td></tr>';
			
			     echo'<div class="mobile">
				        <div>Client :'.$value['clients'].' Tel : <img src="https://img.icons8.com/color/48/000000/phone.png"width="18px" height="18px"/> '.$value['numero'].'</div>
						<div class="'.$color.'">'.$status_reservation.'</div>
						<div>
				   
				       </div>';
		}
		}
		
		elseif($value['type']==3){
			
			$date = $value['check_in'];
			$date_today = date('y-m-d');
			
			$tDeb = explode("-", $date_today);
            $tFin = explode("-", $date);

           $diff = mktime(0, 0, 0, $tFin[1], $tFin[2], $tFin[0]) - 
              mktime(0, 0, 0, $tDeb[1], $tDeb[2], $tDeb[0]);
			  
			$result=$diff / 86400;
			
			if($result > 10){
				$status_reservation ='<img src="https://img.icons8.com/ios-filled/48/000000/man-dragging-sack.png" width="28px" height="28px"/> l\'arrivée du client  est en cours';
				$color="arrive";
		     }
			 
			 if($result <= 10 AND $result >= 2){
			$status_reservation ='<img src="https://img.icons8.com/ios/48/000000/man-dragging-sack.png" width="28px" height="28px"/> le client arrive  dans'.$result.'jours';
			$color ="attention";
			 }
			 
			 if($result==1){
				 $status_reservation ='<img src="https://img.icons8.com/ios/48/000000/man-dragging-sack.png" width="28px" height="28px"/>  le client est là demain.'; 
				 $color="alerte";
			 }
			 
			 if($diff==0){
				$status_reservation ='<img src="img/valid.png" alt="valid" width="15px" height="15px"/> le séjour est consommé';
			}
			
			if($value['avance']==0 OR $value['avance']==""){
				$acompte ="pas d'acompte versé";
			}
			
			else{
				$acompte ="le client à versé un acompte sur la facture";
			}
			 
		         echo'<tr>
				      <td style="color:#06308E;font-size:15px;font-weight:bold;">'.substr($value['id_fact'],2).'</td>
				      <td>'.$value['clients'].'</td>
					<td><img src="https://img.icons8.com/color/48/000000/phone.png" width="18px" height="18px"/> '.$value['numero'].'</td>
					<td>'.$value['email_client'].'</td>
					<td>'.$acompte.'</td>
					<td><div class="'.$color.'">'.$status_reservation.'</div></td></tr>';
			       
				   echo'<div class="mobile">
				        <div>Client :'.$value['clients'].' Tel : <img src="https://img.icons8.com/color/48/000000/phone.png"width="18px" height="18px"/> '.$value['numero'].'</div>
						<div class="'.$color.'">'.$status_reservation.'</div>
						<div>
				        </div>';
		 }
		 
		 else{
			 
			 
		 }
		}
       echo'</table>';















?>