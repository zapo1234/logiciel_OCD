<?php
include('connecte_db.php');
include('inc_session.php');


// recupére les données de la base de données
    $id =$_POST['id'];
    $rec=$bds->query('SELECT id_chambre,date,dates FROM home_occupation WHERE id_chambre="'.$id.'"');
    $donns = $rec->fetchAll();
	
	//créer un tableau vide 
	
	$array = [];
	foreach($donns as $dat){
		$dates = $dat['date'];
		
		$dates = explode(',',$dates);
		
		foreach($dates as $dats){
			
			$array[] = $dats;
		}
	}
	
	$tab = $array;
    $nombre = count($array);	
    $debut = current($array);
    $sortie = end($array);
    
	if($_POST['action']=="add"){
	 
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
	 
	 
	
	// créer un tableau de session 
	if(isset($_SESSION['add_home'])){
	
    // pour le choix du séjour ou réservation	
	if($_POST['to']=="séjour" OR $_POST['to']=="réservation") {
     
	 if(in_array(($_POST['days']),$array)){
        
		$total =0;
		$adjout= 0;
	 }

     elseif($_POST['days'] < $debut  AND $_POST['das']> $sortie){
        $total =0;
		$adjout= 0;
     }		 

     elseif(in_array(($_POST['das']),$array)){
        $total =0;
		$adjout= 0;
    
	 }
	 else{
		
	$item_array_id = array_column($_SESSION['add_home'], 'id');	
		
		if(!in_array($_POST['id'], $item_array_id))
		{
		  $count = count($_SESSION['add_home']);
		  $item_array = array(
         'id'          =>   $_POST['id'],
		 'nbjour'      =>   $_POST['nbjour'],
         'prix_nuite'  =>   $pay,
         'prix_pass'   =>   $pay,
		 'paynuite'    =>   $pay,
		 'paypass'     =>   $pay,
         'type'        =>   $_POST['type'],
		 'chambre'     =>   $_POST['chambre']

         );
		 
		 $_SESSION['add_home'][$count] = $item_array;
				
		}
	 
	 else{
		 
		 
	 }
	 
	 }
		
	}
	
	
	// pour les choix sur l'horaire
	if($_POST['to']=="horaire"){
		
	 if(in_array(($_POST['tim']),$array) AND $donns['dates']==$_POST['dat']){
         
		 $total=0;
		 $adjout=0;
     }

     elseif(in_array(($_POST['tis']),$array) AND $donns['dates']==$_POST['dat']){
        $total=0;
		$adjout=0;
     }	 

    elseif(in_array(($_POST['dat']),$array)){
         $total=0;
		 $adjout=0;
     }

 
	 else{
		
	$item_array_id = array_column($_SESSION['add_home'], 'id');	
		
		if(!in_array($_POST['id'], $item_array_id))
		{
		  $count = count($_SESSION['add_home']);
		  $item_array = array(
         'id'          =>   $_POST['id'],
		 'nbjour'      =>   $_POST['nbjour'],
         'prix_nuite'  =>   $pay,
         'prix_pass'   =>   $pay,
		 'paynuite'    =>   $pay,
		 'paypass'     =>   $pay,
         'type'        =>   $_POST['type'],
		 'chambre'     =>   $_POST['chambre']

         );
		 
		 $_SESSION['add_home'][$count] = $item_array;
				
		}
		
		
		
	}
	
	}
	
	}
	
	else{
		
		if($_POST['to']=="séjour" OR $_POST['to']=="réservation") {
     if(in_array(($_POST['days']),$array)){

       
	 }

     elseif($_POST['days'] < $debut  AND $_POST['das']> $sortie){

     }		 

     elseif(in_array(($_POST['das']),$array)){

    
	 }
	 
	 else{
	 
	    $item_array = array(
         'id'          =>   $_POST['id'],
		 'nbjour'      =>   $_POST['nbjour'],
         'prix_nuite'  =>   $pay,
         'prix_pass'   =>   $pay,
		 'paynuite'    =>   $pay,
		 'paypass'     =>   $pay,
         'type'        =>   $_POST['type'],
		 'chambre'     =>   $_POST['chambre']

         );
         
         // enregistrer les élement dans un tableau
         $_SESSION['add_home'][] = $item_array;		 
		   
	   }
	   
	
		}
		
	}
	  
	  if(!empty($_SESSION['add_home'])){
		  
		  if($_POST['to']=="séjour" or $_POST['to']=="réservation") {
			  
			$dat =$_POST['days'];
            $dat1 = $_POST['das'];
            $donns['dates']=0;
            $_POST['dat']=0;			
		  }
		  
		  if($_POST['to']=="horaire") {
			 $dat =$_POST['tim'];
            $dat1 = $_POST['tis'];
            }
		  
		   if(in_array($dat,$array) AND $donns['dates']==$_POST['dat']){
           }

         elseif($dat<$debut  AND $dat1> $sortie AND $donns['dates']==$_POST['dat']){
         }		 

         elseif(in_array($dat1,$array) AND $donns['dates']==$_POST['dat']){
         }
		 
		 elseif(in_array(($_POST['dat']),$array)){

           }
	 
	    else {
			
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
		
			
			if($_POST['to']=="réservation") {
				
			 $adjout ='<div>Acompte(+):<br/><input type="number" id="account" name="account"><span class="account"></span></div>
			<div>Reste à payér:<br/><input type="number" id="rpay" name="rpay"></div>';
			 
			}
			if($_POST['to']=="séjour" OR $_POST['to']=="horaire") {
				
			$adjout ='<div class="dd">Acompte(+):<br/><input type="number" id="account" name="account"><span class="account"></span></div>
			<div class="dd">Reste à payér:<br/><input type="number" id="rpay" name="rpay"></div>';
			
			}
			
			
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
			<span class="d">'.$values['chambre'].'</span><span class="dg">'.$pays.'x'.$_POST['nbjour'].' xof</span> 
			<input type="hidden" name="chambre[]" value="'.$values['chambre'].'">
			<input type="hidden" name="typ[]" value="'.$values['type'].'">
			<input type="hidden" name="pay[]" value="'.$pays.'">
			<input type="hidden" name="id_chambre[]" value="'.$values['id'].'">
			<span class="remov"><a href ="#" class="remove" data-id3="'.$values['id'].'" class="remove" title="annuler la prise"><i class="fas fa-minus-circle" style="color:#F7890E;font-size:14px;"></i></a></span>
			</div>';
			
			
			}
		}
		
	  }
			
			echo'<div class="montant"><h5>récapitulatif des montants</h5>
			<div class="rest">'.$adjout.'</div>
			<div>Repas(+):<br/><input type="number" id="monts" name="monts"></div>
			<div>TVA(%):<br/><input type="number" id="tva" name="tva"> <span class="tva"></span></div>
			<div class="tot">Montant <span class="mont">'.$total.'</span>xof</div>
			<input type="hidden" name="total" id="total" value="'.$total.'"></span>
			<div>facture  payée <input type="checkbox" name="status" value="1">  Non payée <input type="checkbox" name="status" value="2">
			</div>';
			echo'</div>';
			echo'<div><input type="submit" id="add_local" value="valider"></div>';
		
		  }
      


      if($_POST['action']=="remove") {
        
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
	 
	 
	if(isset($_SESSION['add_home'])){
		
	$item_array_id = array_column($_SESSION['add_home'], 'id');	
		
		if(!in_array($_POST['id'], $item_array_id))
		{
		  $count = count($_SESSION['add_home']);
		  $item_array = array(
         'id'          =>   $_POST['id'],
		 'nbjour'      =>   $_POST['nbjour'],
         'prix_nuite'  =>   $pay,
         'prix_pass'   =>   $pay,
		 'paynuite'    =>   $pay,
		 'paypass'     =>   $pay,
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
         'prix_nuite'  =>   $pay,
         'prix_pass'   =>   $pay,
		 'paynuite'    =>   $pay,
		 'paypass'     =>   $pay,
         'type'        =>   $_POST['type'],
		 'chambre'     =>   $_POST['chambre']

         );
         
         // enregistrer les élement dans un tableau
         $_SESSION['add_home'][] = $item_array;		 
		   
	   }
	  
	  if(!empty($_SESSION['add_home'])){
			
			$total =0;
	     	$count =count($_SESSION['add_home']);
			$count = $count -1;
			if($count ==1){
			  $local ="local";
			  echo'<div><div class="titre">vous avez selectionnez '.$count.' '.$local.'</div></div>';
			
			}
			
			if($count >1){
				$local ="locaux";
				echo'<div><div class="titre">vous avez selectionnez '.$count.' '.$local.'</div></div>';
			
			}
			
			if($count ==0){
				
				echo'<div><div class="titre">Aucun local selectionné
				</div></div>';
				
				$total =0;
			}
			
			foreach($_SESSION['add_home'] as $keys => $values){
		
		    if($values['id']==$_POST['id']){
	        // suprimer
	          unset($_SESSION['add_home'][$keys]);
	       }
		   
			if($_POST['to']=="réservation") {
				
			 $adjout ='<div>Acompte(+):<br/><input type="number" id="account" name="account"><span class="account"></span></div>
			<div>Reste à payér:<br/><input type="number" id="rpay" name="rpay"></div>';
			 
			}
			if($_POST['to']=="séjour" OR $_POST['to']=="horaire") {
				
			$adjout ='<div class="dd">Acompte(+):<br/><input type="number" id="account" name="account"><span class="account"></span></div>
			<div class="dd">Reste à payér:<br/><input type="number" id="rpay" name="rpay"></div>';
			
			}
			
			
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
			 
			 if($values['id'] !=$_POST['id']) {
			echo'<div class="hom"><h5>'.$values['type'].'</h5>
			<span class="d">'.$values['chambre'].'</span><span class="dg">'.$pays.'x'.$_POST['nbjour'].' xof</span> 
			<input type="hidden" name="chambre[]" value="'.$values['chambre'].'">
			<input type="hidden" name="typ[]" value="'.$values['type'].'">
			<input type="hidden" name="pay[]" value="'.$pays.'">
			<input type="hidden" name="id_chambre[]" value="'.$values['id'].'">
			<span class="remov"><a href ="#" class="remove" data-id3="'.$values['id'].'" class="remove" title="annuler la prise"><i class="fas fa-minus-circle" style="color:#F7890E;font-size:14px;"></i></a></span>
			</div>';
			 }
			
			}
			
			$totals = $total -($pays*$_POST['nbjour']);
		}
			
			echo'<div class="montant"><h5>récapitulatif des montants</h5>
			<div class="rest">'.$adjout.'</div>
			<div>Repas(+):<br/><input type="number" id="monts" name="monts"></div>
			<div>TVA(%):<br/><input type="number" id="tva" name="tva"><span class="tva"></span></div>
			<div class="tot">Montant <span class="mont">'.$totals.'</span>xof</div>
			<input type="hidden" name="total" id="total" value="'.$totals.'"></span>
			<div>facture  payée <input type="checkbox" name="status" value="1">  Non payée <input type="checkbox" name="status" value="2">
			</div>';
			echo'</div>';
			echo'<div><input type="submit" id="add_local" value="valider"></div>';
		
		  }	
	 
         

 ?>








