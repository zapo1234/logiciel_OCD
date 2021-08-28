<?php
include('connecte_db.php');
include('inc_session.php');

if(!empty($_SESSION['add_home']) AND isset($_SESSION['add_home'])){
		  
		  $total =0;
	     	$count =count($_SESSION['add_home']);
			if($count ==1){
			  $local ="local";
			  $select ="selectionné"
			}
			
			else{
				$local ="locaux";
				$select ="selectionnées"
			}
			echo'<div><div class="titre">Enregistrement en cours '.$count.' '.$local.' '.$select.'</div></div>';
			
			foreach($_SESSION['add_home'] as $keys => $values){
		
			
			if($_POST['to']=="séjour" OR $_POST['to']=="réservation"){
				
				if(!empty($_POST['prix_nuite'])){
		
             $pays = $values['prix_nuite'];	
        		
	          }
	 
	        else{
		 
		     $pays = $values['paynuite'];
	          }
	 
	        }
				
		
			if($_POST['to']=="horaire"){
				
				if(!empty($_POST['prix_pass'])){
		
             $pays = $values['prix_pass'];		
	       }
	 
	       else{
		 
		     $pays= $values['paypass'];
	        }
				
			}
			
			
			$total = $total +($pays*$_POST['nbjour']);
			 
			echo'<div class="hom"><h5>'.$values['type'].'</h5>
			<span class="d">'.$values['chambre'].'</span><span class="dg">'.$pays.'x'.$_POST['nbjour'].' xof</span></div>';
		
		    }
		
	  }
      else{
        echo'pas d\'enregsitrement de locaux en cours';
	  }		  
      
    }
 
 ?>