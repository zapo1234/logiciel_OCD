<?php
include('connecte_db.php');
include('inc_session.php');

// recupére les données de la base de données
   //créer un tableau vide 
  if($_POST['action']=="add"){
	 if(isset($_POST['tr']=="réservation")){
	   $pay=$_POST['prix_nuite'];
	 }
	 if(isset($_POST['tr']=="horaire")){
	   $pay=$_POST['prix_pass'];
	 }
	// créer un tableau de session 
	if(isset($_SESSION['add_home'])){
	// pour le choix du séjour ou réservation	
   $item_array_id = array_column($_SESSION['add_home'], 'id');	
		
		if(!in_array($_POST['id_chambre'], $item_array_id))
		{
		  $count = count($_SESSION['add_home']);
		  $item_array = array(
         'id'          =>   $_POST['id_chambre'],
		 'tr'          =>   $_POST['tr'],
		 'nbjour'      =>   $_POST['nbjour'],
         'prix_nuite'  =>   $pay,
         'prix_pass'   =>   $pay,
		 'chambre'     =>   $_POST['chambre'],
		 'montant'     =>   $pay*$_POST['nbjour']
         );
		 $_SESSION['add_home'][$count] = $item_array;
	   }
	 
	 else{
	 }
	}
	 
	 else{
	     $item_array = array(
         'id'          =>   $_POST['id_chambre'],
		 'tr'          =>   $_POST['tr'],
		 'nbjour'      =>   $_POST['nbjour'],
         'prix_nuite'  =>   $pay,
         'prix_pass'   =>   $pay,
		 'chambre'     =>   $_POST['chambre'],
		 'montant'     =>   $pay*$_POST['nbjour']
        );
         // enregistrer les élement dans un tableau
         $_SESSION['add_home'][] = $item_array;		 
	   }
	   if(!empty($_SESSION['add_home'])){
		  $total =0;
	     	$count =count($_SESSION['add_home']);
			if($count ==1){
			  $local ="local selectionné";
			}
			else{
				$local ="locaux selectionnés";
			}
			echo'<div><div class="titre"><span class="rr"></span> '.$count.' '.$local.'</div></div>';
			
			foreach($_SESSION['add_home'] as $keys => $values){
			
			 if(isset($_POST['tr']=="réservation"){
	           $pays=$values['prix_nuite'];
	         }
	        if(isset($_POST['tr']=="horaire"){
	        $pays=$values['prix_pass'];
	       }
			
			$total = $total +floatval($pays*$_POST['nbjour']);
			$totals = $total -($pays*$_POST['nbjour']);
			$monta = $total + floatval($taxe);
			 
			echo'<div class="datas">
			<div class="list"><span class="d">'.$values['chambre'].'</span><span class="dg">'.$pays.'x'.$_POST['nbjour'].' xof</span>
			<input type="hidden" name="chambre[]" value="'.$values['chambre'].'">
			<input type="hidden" name="pay[]" value="'.$pays.'">
			<input type="hidden" name="id_chambre[]" value="'.$values['id'].'">
			<span class="remov"><a href ="#" class="remove" data-id3="'.$values['id'].'" class="remove" title="annuler la prise"><i class="fas fa-minus-circle" style="color:#F7890E;font-size:14px;"></i></a></span>
			</div></div>';
			
		}
       }	
      }

      if($_POST['action']=="remove") {
	
	if(isset($_POST['tr']=="réservation"){
	   $pay=$_POST['prix_nuite'];
	 }
	 if(isset($_POST['tr']=="horaire"){
	   $pay=$_POST['prix_pass'];
	 }
        
	 if(isset($_SESSION['add_home'])){
		
	$item_array_id = array_column($_SESSION['add_home'], 'id');	
		
		if(!in_array($_POST['id_chambre'], $item_array_id))
		{
		  $count = count($_SESSION['add_home']);
		  $item_array = array(
         'id'          =>   $_POST['id_chambre'],
		 'nbjour'      =>   $_POST['nbjour'],
         'prix_nuite'  =>   $pay,
         'prix_pass'   =>   $pay,
		 'chambre'     =>   $_POST['chambre'],
		 'montant'     =>   $pay*$_POST['nbjour']

         );
		 
		 $_SESSION['add_home'][$count] = $item_array;
				
	 }
	 
	 else{
		 
		 
	 }
		
	}
	
	else{
	 
	    $item_array = array(
         'id'          =>   $_POST['id_chambre'],
		 'tr'          =>   $_POST['tr'],
		 'nbjour'      =>   $_POST['nbjour'],
         'prix_nuite'  =>   $pay,
         'prix_pass'   =>   $pay,
		 'chambre'     =>   $_POST['chambre'],
		 'montant'     =>   $pay*$_POST['nbjour']

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
			  echo'<div><div class="titre"><span class="rr">vous avez selectionnez</span> '.$count.' '.$local.'</div></div><br/><span class="eror"></span>';
			
			}
			
			if($count >1){
				$local ="locaux";
				echo'<div><div class="titre"><span class="rr">vous avez selectionnez</span> '.$count.' '.$local.'</div></div><br/><span class="eror"></span>';
			
			}
			
			if($count ==0){
				
				echo'<div><div class="titre">Aucun local selectionné
				</div></div>';
				
				$total =0;
			}
			
			$tab = [];
			$array = [];
			
		  foreach($_SESSION['add_home'] as $keys => $values){
		
		    if($values['id']==$_POST['id_chambre']){
	        // suprimer
	          unset($_SESSION['add_home'][$keys]);
			  $array[] = $values['montant'];
	       }
		   
		if( $_POST['tr']=="réservation"){
				if(!empty($_POST['prix_nuite'])){
		        $pays = $values['prix_nuite'];	
        }
	      else{
		      $pays = $values['paynuite'];
	          }
	        }
				
		if($_POST['tr']=="horaire"){
		if(!empty($_POST['prix_pass'])){
		  $pays = $values['prix_pass'];		
	       }
	       else{
		    $pays= $values['paypass'];
	        }
		   }
			
			$tab[] = $values['montant'];
		
			$total = $total +($pays*$_POST['nbjour']);
			
			
			 
			 if($values['id'] !=$_POST['id']) {
			echo'<div class="datas"><div class="hom"><h5>'.$values['type'].'</h5>
			<span class="d">'.$values['chambre'].'</span><span class="dg">'.$pays.'x'.$_POST['nbjour'].' xof</span> 
			<input type="hidden" name="chambre[]" value="'.$values['chambre'].'">
			<input type="hidden" name="typ[]" value="'.$values['type'].'">
			<input type="hidden" name="pay[]" value="'.$pays.'">
			<input type="hidden" name="id_chambre[]" value="'.$values['id'].'">
			<span class="remov"><a href ="#" class="remove" data-id3="'.$values['id'].'" class="remove" title="annuler la prise"><i class="fas fa-minus-circle" style="color:#F7890E;font-size:14px;"></i></a></span>
			</div>';
			 }
			
			}
			
			
			if(!isset($_POST['taxe'])){
				$taxe =0;
			}
			
			else{
			$taxe=$_POST['taxe'];
			}
			$totals = $total -($pays*$_POST['nbjour']);
			$monta = $totals + floatval($taxe);
			

		}
		
	     // on recupére la dernière valeur du tableau
		   // on recupére le montant de sortie.
		   // calculer la some des deux tableau
		   $arr1 =array_sum($tab);
		   $arr2 = array_sum($array);
		   $totals = floatval($arr1)-floatval($arr2);
		    
		  $outpout='<div class="option">Option1 <span class="ouvrir"><i class="fa fa-chevron-down" aria-hidden="true" style="font-size:14px"></i></span><span class="ouvrir11"><i class="fa fa-chevron-up" aria-hidden="true" style="font-size:14px"></i></span></div>
		   <div class="montant">
			<div class="rest">'.$adjout.'</div>
			<div class="rep">Repas(+):<br/><input type="number" id="monts" name="monts"></div>
			<div>TVA(%):<br/><input type="number" id="tva" name="tva"> <span class="tva"></span></div>
			<div>Remise(sur TTC)<br/><input type="number" id="remise" name="remise"></div>
			</div>
			
			<div class="tot">
			<br/>
			 <h5>récapitulatif des montants</h5>
			<div>Montant HT <span class="mont">'.$totals.'</span>xof</div>
			<div>Montant TTC <span class="mont">'.$totals.'</span>xof</div>
			<input type="hidden" name="total" id="total" value="'.$totals.'"></span>
			</div>
			
			<div class="option">Option2 <span class="ouvrir1"><i class="fa fa-chevron-down" aria-hidden="true" font-size="14px"></i></span><span class="ouvrir12"><i class="fa fa-chevron-up" aria-hidden="true" style="font-size:14px"></i></span></div>
			
			<div class="montant1"><br/>
			<h3>Moyens de paiment</h3>
			<div>espèce<br/> <input type="number" id="paie1" name="paie1"><br/>Carte Bancaire <br/><input type="number" id="paie2" name="paie2"><br/>
			 Mobile Monney<br/><input type="number" id="paie3" name="paie3"><br/>chéques<br/><input type="number" id="paie4" name="paie4"><br/>
			</div></div>';
			echo$outpout;
			echo'<div><input type="submit" id="add_local" value="valider"></div></div>';
		
		  }	
	 
    
      

 ?>








