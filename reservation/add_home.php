<?php
include('connecte_db.php');
include('inc_session.php');
// recupére les données de la base de données
   //créer un tableau vide 
  if($_POST['action']=="add"){
	 if($_POST['tr']=="réservation"){
	   $pay=$_POST['prix_nuite'];
	 }
	 if($_POST['tr']=="horaire"){
	   $pay=$_POST['prix_pass'];
	 }
	 if(empty($_POST['nbjour'])){
		$_POST['nbjour']=1; 
	 }
	// créer un tableau de session 
	if(isset($_SESSION['add_homes'])){
	// pour le choix du séjour ou réservation	
   $item_array_id = array_column($_SESSION['add_homes'], 'id');	
		if(!in_array($_POST['id_chambre'], $item_array_id))
		{
		  $count = count($_SESSION['add_homes']);
		  $item_array = array(
         'id'          =>   $_POST['id_chambre'],
		 'tr'          =>   $_POST['tr'],
		 'nbjour'      =>   $_POST['nbjour'],
         'prix_nuite'  =>   $pay,
         'prix_pass'   =>   $pay,
		 'chambre'     =>   $_POST['chambre'],
		 'montant'     =>   $pay*$_POST['nbjour']
         );
		 $_SESSION['add_homes'][$count] = $item_array;
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
         $_SESSION['add_homes'][] = $item_array;		 
	   }
	   if(!empty($_SESSION['add_homes'])){
		  $total =0;
	     	$count =count($_SESSION['add_homes']);
			if($count ==1){
			  $local ="local selectionné";
			}
			elseif($count > 1){
				$local ="locaux selectionnés";
			}
			else{
				$count="aucun";
				$local="local sélectionné";
			}
			echo'<div><div class="titre"><span class="rr"></span> '.$count.' '.$local.'</div></div>';
			foreach($_SESSION['add_homes'] as $keys => $values){
			if($_POST['tr']=="réservation"){
	           $pays=$values['prix_nuite'];
	         }
	        if($_POST['tr']=="horaire"){
	        $pays=$values['prix_pass'];
	       }
			$total = $total +floatval($pays*$_POST['nbjour']);
			$totals = $total -($pays*$_POST['nbjour']);
			$totas = $pays;
			//$monta = $total + floatval($taxe);
			 echo'<table id="tab" class="dfc">
			<tr><td class="list"><span class="d">'.$values['chambre'].'</span>
			</td></tr>
			<tr><td><span class="dg">'.$pays.'</span>xof</td>
			<td><input type="hidden" name="chambre[]" value="'.$values['chambre'].'"></td>
			</tr>
			<tr><td><span class="remov"><a href ="#" class="remove" data-id3="'.$values['id'].'" class="remove" title="annuler la prise"><i class="fas fa-minus-circle" style="color:#F7890E;font-size:14px;"></i></a></span></td>
			<td><input type="hidden" name="pay[]" value="'.$pays.'"></td>
			<td><input type="hidden" name="id_chambre[]" value="'.$values['id'].'">
			</tr></table>';
		}
		echo'<table>
			<tr>
			<td>Prix(HT):<span class="data_total">'.$total.'</span>xof</td>
			<td><input type="hidden" id="tota" value="'.$totas.'"></td>
			</tr>
			</table>';
		}	
      }
	  
	  if($_POST['action']=="remove") {
      if(empty($_POST['nbjour'])) {
		 $_POST['nbjour']=1; 
	  }
	  if($_POST['tr']=="réservation"){
	   $pay=$_POST['prix_nuite'];
	 }
	 if($_POST['tr']=="horaire"){
	   $pay=$_POST['prix_pass'];
	 }
	 if(isset($_SESSION['add_homes'])){
	$item_array_id = array_column($_SESSION['add_homes'], 'id');	
		if(!in_array($_POST['id_chambre'], $item_array_id))
		{
		  $count = count($_SESSION['add_homes']);
		  $item_array = array(
         'id'          =>   $_POST['id_chambre'],
		 'tr'           =>  $_POST['tr'],
		 'nbjour'      =>   $_POST['nbjour'],
         'prix_nuite'  =>   $pay,
         'prix_pass'   =>   $pay,
		 'chambre'     =>   $_POST['chambre'],
		 'montant'     =>   $pay*$_POST['nbjour']
         );
		 $_SESSION['add_homes'][$count] = $item_array;
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
         $_SESSION['add_homes'][] = $item_array;		 
     }
	  if(!empty($_SESSION['add_homes'])){
			$total =0;
	     	$count =count($_SESSION['add_homes']);
			$count = $count -1;
			if($count ==1){
			  $local =" un local";
			  echo'<div><div class="titre"><span class="rr"></span> '.$count.' '.$local.'</div></div><br/><span class="eror"></span>';
			}
			
			if($count >1){
				$local ="locaux";
				echo'<div><div class="titre"><span class="rr">v</span> '.$count.' '.$local.'selectionnés</div></div><br/><span class="eror"></span>';
			}
			if($count ==0){
				echo'<div><div class="titre">Aucun local selectionné
				</div></div>';
				$total =0;
			}
			$tab = [];
			$array = [];
			foreach($_SESSION['add_homes'] as $keys => $values){
		     if($values['id']==$_POST['id_chambre']){
	        // suprimer
	          unset($_SESSION['add_homes'][$keys]);
			  $array[] = $values['montant'];
	       }
		   if($_POST['tr']=="réservation"){
			$pays = $values['prix_nuite'];	
        	}
	          if($_POST['tr']=="horaire"){
	            $pays = $values['prix_pass'];		
	       }
		   $tab[] = $values['montant'];
		    if(empty($_POST['nbjour'])){
			 $_POST['nbjour']==1;
			}
		    $total = $total +($pays*$_POST['nbjour']);
			if($values['id']!=$_POST['id_chambre']) {
			echo'<table class="dfc">
			<tr><td class="list"><span class="d">'.$values['chambre'].'</span>
			</td></tr>
			<tr><td><span class="dg">'.$pays.'</span>xof</td>
			<td><input type="hidden" name="chambre[]" value="'.$values['chambre'].'"></td>
			</tr>
			<tr><td><span class="remov"><a href ="#" class="remove" data-id3="'.$values['id'].'" class="remove" title="annuler la prise"><i class="fas fa-minus-circle" style="color:#F7890E;font-size:14px;"></i></a></span></td>
			<td><input type="hidden" name="pay[]" value="'.$pays.'"></td>
			<td><input type="hidden" name="id_chambre[]" value="'.$values['id'].'"></td>
			</tr></table>';
			 }
			}
		   $totals = $total -($pays*$_POST['nbjour']);
	      }
		  // on recupére la dernière valeur du tableau
		   // on recupére le montant de sortie.
		   // calculer la some des deux tableau
		   $arr1 =array_sum($tab);
		   $arr2 = array_sum($array);
		   $totals = floatval($arr1)-floatval($arr2);
		    echo'<table>
			<tr>
			<td>Prix(HT):<span class="data_total">'.$totals.'</span>xof</td>
			</tr>
			</table>';
		}

  if($_POST['action']=="adds"){
if(!empty($_SESSION['add_homes']) AND isset($_SESSION['add_homes'])){
   $item_array_id = array_column($_SESSION['add_homes'], 'id');	
		  
		  $total =0;
	     	$count =count($_SESSION['add_homes']);
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
			
			echo'<div class="panie"><i class="fas fa-check-circle" style="color:green;font-size:13px;"></i>  '.$phrase.' '.$count.' '.$local.' en cours'.'</div>';
			echo'<div id="panier_mobile">'.$count.'</div>';
			
			foreach($_SESSION['add_homes'] as $keys => $values){
		    if($values['tr']=="séjour" OR $values['tr']=="réservation"){
			if(!empty($values['prix_nuite'])){
		      $pays = $values['prix_nuite'];	
        	 }
	         else{
		      $pays = $values['paynuite'];
	          }
	         }
			 if($values['tr']=="horaire"){
			  if(!empty($values['prix_pass'])){
		      $pays = $values['prix_pass'];		
	       }
	       else{
		    $pays= $values['paypass'];
	        }
		    }
			
			$total = $total +$pays;
			$totals = $total -($pays);
			$totas = $pays;
			echo'<table class="dfc">
			<tr><td class="list"><span class="d">'.$values['chambre'].'</span>
			</td></tr>
			<tr><td><span class="dg">'.$pays.'</span>xof</td>
			<td><input type="hidden" name="chambre[]" value="'.$values['chambre'].'"></td>
			</tr>
			<tr><td><span class="remov"><a href ="#" class="remove" data-id3="'.$values['id'].'" class="remove" title="annuler la prise"><i class="fas fa-minus-circle" style="color:#F7890E;font-size:14px;"></i></a></span></td>
			<td><input type="hidden" name="pay[]" value="'.$pays.'"></td>
			<td><input type="hidden" name="id_chambre[]" value="'.$values['id'].'"></td>
			</tr></table>';
		     }
			 
			 echo'<table>
			<tr>
			<td>Prix(HT):<span class="data_total">'.$total.'</span>xof</td>
			<td><input type="hidden" id="tota" value="'.$total.'"></td>
			</tr>
			</table>';
	  }
      else{
        echo'<div class="panie">Aucun local selectionné</div>';
	  }
}

  if($_POST['action']=="count"){
     
	 if(!empty($_SESSION['add_homes'])){
		$count = count($_SESSION['add_homes']);
		echo'<button class="panier">'.$count.'</button>';
	 }
	 
	 else{
		echo''; 
	 }

  }	  
 ?>








