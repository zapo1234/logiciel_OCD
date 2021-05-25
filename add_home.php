<?php
include('connecte_db.php');
include('inc_session.php');

    
	if($_POST['action']=="add"){
	 
	 if(!empty($_POST['prix_nuite'])){
		
        $prix_nuite = $_POST['prix_nuite'];	
        $paynuite =0;		
	 }
	 
	 else{
		 
		 $prix_nuite =0;
		 $paynuite = $_POST['paynuite'];
	 }
	 
	  if(!empty($_POST['prix_pass'])){
		
        $prix_pass = $_POST['prix_pass'];
        $paypass =0;		
	 }
	 
	 else{
		 
		 $prix_pass = 0;
		 $paypass = $_POST['paypass'];
	 }
	 
	 
	if(isset($_SESSION['add_home'])){
		
	$item_array_id = array_column($_SESSION['add_home'], 'id');	
		
		if(!in_array($_POST['id'], $item_array_id))
		{
		  $count = count($_SESSION['add_home']);
		  $item_array = array(
         'id'          =>   $_POST['id'],
		 'nbjour'      =>   $_POST['nbjour'],
         'prix_nuite'  =>   $prix_nuite,
         'prix_pass'   =>   $prix_pass,
		 'paynuite'    =>   $paynuite,
		 'paypass'     =>   $paypass,
         'type'        =>   $_POST['type'],
		 'chambre'     =>   $_POST['chambre']

         );
		 
		 $_SESSION['add_home'][$count] = $item_array;
				
	 }
	 
	 else{
		 
		 
	 }
		
	}
	
	else{
	 
	    $item_array = array(
         'id'          =>   $_POST['id'],
		 'nbjour'      =>   $_POST['nbjour'],
         'prix_nuite'  =>   $prix_nuite,
         'prix_pass'   =>   $prix_pass,
		 'paynuite'    =>   $paynuite,
		 'paypass'     =>   $paypass,
         'type'        =>   $_POST['type'],
		 'chambre'     =>   $_POST['chambre']

         );
         
         // enregistrer les élement dans un tableau
         $_SESSION['add_home'][0] = $item_array;		 
		   
	   }
	  
	  
		  
        		
		if(!empty($_SESSION['add_home'])){
			
			$total =0;
			$count =count($_SESSION['add_home']);
			if($count ==1){
			  $local ="local";
			}
			
			else{
				$local ="locaux";
			}
			echo'<div><div class="titre">vous avez selectionnez '.$count.' '.$local.'</div></div>';
			
			foreach($_SESSION['add_home'] as $keys => $values){
		
		     
			 if($_POST['to']=="séjour" OR $_POST['to']=="réservation"){
				
               	if(!empty($_POST['prix_nuite'])){
		
                $pay = $_POST['prix_nuite'];	
          		
	            }
	 
	       else{
		 
		     $pay = $_POST['paynuite'];
	         }
	
	 	    }
			
			if($_POST['to']=="horaire"){
				
				if(!empty($_POST['prix_pass'])){
		
               $pay = $_POST['prix_pass'];
         	   }
	 
	      else{
		 
		      $pay= $_POST['paypass'];
	        }
			 
			}
			
			if($_POST['to']=="réservation") {
				
			 $adjout ='<div>Acompte(+):<br/><input type="number" id="account" name="account"></div>
			<div>Reste à payér:<br/><input type="number" id="rpay" name="rpay"></div>';
			
			}
			if($_POST['to']=="séjour" OR $_POST['to']=="horaire") {
				
				$adjout="";
				
			}
			
			$total = $total +($pay*$_POST['nbjour']);
			 
			echo'<div class="hom"><h5>'.$values['type'].'</h5>
			<span class="d">'.$values['chambre'].'</span><span class="dg">'.$pay.'x'.$_POST['nbjour'].' xof</span> 
			<input type="hidden" name="chambr[]" value="'.$values['chambre'].'">
			<input type="hidden" name"="typ[]" value="'.$values['type'].'">
			<input type="hidden" name="paynuite[]" value="'.$pay.'">
			<span class="remov"><a href ="#" data-id3="'.$_POST['id'].'" class="remove" title="annuler la prise"><i class="fas fa-minus-circle" style="color:#F7890E;font-size:14px;"></i></a></span>
			</div>';
			
			
			}
			
			
			
			echo'<div class="montant"><h5>récapitulatif des montants</h5>
			<div class="reser">'.$adjout.'</div>
			<div>Repas(+):<br/><input type="number" id="monts" name="monts"></div>
			<div>TVA(optionnel):<br/><input type="number" id="tva" name="tva"></div>
			<div class="tot">Montant <span class="mont">'.number_format($total,2).'xof</div>
			</div>';
			
			echo'</div>';
		}
      }


      if($_POST['action']=="remove") {



	  }		  
	 
 

 ?>








