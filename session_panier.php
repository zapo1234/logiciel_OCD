<?php
include('connecte_db.php');
include('inc_session.php');

if(!empty($_SESSION['add_home']) AND isset($_SESSION['add_home'])){
		  
		  $total =0;
	     	$count =count($_SESSION['add_home']);
			if($count ==1){
			  $local ="local";
			  $select ="selectionné";
			  $phrase ="Facturation d'un";
			}
			
			else{
				$local ="locaux";
				$select ="selectionnées";
				$phrase ="Facturation de";
			}
			
			echo'<div class="panier"><i class="fas fa-check-circle" style="color:green;font-size:13px;"></i>  '.$phrase.' '.$count.' '.$local.' en cours'.'</div>';
			
			foreach($_SESSION['add_home'] as $keys => $values){
		
			
			if($values['to']=="séjour" OR $values['to']=="réservation"){
				
				if(!empty($values['prix_nuite'])){
		
             $pays = $values['prix_nuite'];	
        		
	          }
	 
	        else{
		 
		     $pays = $values['paynuite'];
	          }
	         }
				
		     if($values['to']=="horaire"){
				
				if(!empty($values['prix_pass'])){
		
             $pays = $values['prix_pass'];		
	       }
	 
	       else{
		 
		     $pays= $values['paypass'];
	        }
				
			}
			
			
			$total = $total +($pays*$values['nbjour']);
			 
			echo'<div class="panier"><div>'.$values['to'].' client</div>
			<div><span class="d">'.$values['chambre'].'</span> <span class="d">'.$pays.'x'.$values['nbjour'].' xof</span> <span class="remove" data-id4="'.$values['id'].'"></div></div>';
		
		    }
		
	  }
      else{
        echo'<div class="panie">Aucun local en cours de facturation</div>';
	  }
 
 ?>