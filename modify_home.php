<?php
include('connecte_db.php');
include('inc_session.php');

if(isset($_GET['id_fact'])){
 $id_fact =$_GET['id_fact'];
// recupére les données de la base de données si $_GET['id_fact']
  $req=$bds->prepare('SELECT type_logement,chambre,id_chambre,montant,mont_restant FROM bord_informations WHERE id_fact= :id_fact AND email_ocd= :email_ocd ');
    $req->execute(array(':id_fact'=>$id_fact,
	                   ':email_ocd'=>$_SESSION['email_ocd']));
	$don = $req->fetchAll();
	$req->closeCursor();
	// recupére les données de la facture
	$res=$bds->prepare('SELECT nombre,montant,avance,reste,montant_repas,tva,mont_tva FROM facture WHERE   id_fact= :id_fact AND email_ocd= :email_ocd ');
    $res->execute(array(':id_fact'=>$id_fact,
	                   ':email_ocd'=>$_SESSION['email_ocd']));
	$donns= $res->fetch();
	//créer un tableau vide 

    if($_POST['action']=="modify"){
		
	 
	 $tab =[];
    foreach($don as $dos){
	 
	 $id =$dos['id_chambre'];
	 $nombre =$donns['nombre'];
	 $pay = $dos['montant'];
	 $type =$dos['type_logement'];
	 $chambre =$dos['chambre'];
	// créer un tableau de de id chambre
	
	$data = explode(',',$id);
	
	// on boucle sur le tableau
	
	foreach($data as $datas){
		// recupération dans un array
		$tab[] = $datas;
	}
	
 
		     echo'<div class="hom" id="homs'.$dos['id_chambre'].'"><h5>'.$dos['type_logement'].'</h5>
			<span class="d">'.$dos['chambre'].'</span><span class="dg">'.$dos['montant'].'x'.$donns['nombre'].' xof</span> 
			<input type="hidden" name="chambre[]" value="'.$dos['chambre'].'">
			<input type="hidden" name="typ[]" value="'.$dos['type_logement'].'">
			<input type="hidden" name="pay[]" value="'.$dos['montant'].'">
			<input type="hidden" name="id_chambre[]" value="'.$dos['id_chambre'].'">
			<span class="remov"><a href ="#" class="removes" data-id4="'.$dos['id_chambre'].'" class="remove" title="annuler la prise"><i class="fas fa-minus-circle" style="color:#F7890E;font-size:14px;"></i></a></span>
			</div>';
			
			
			}
			
		$total =0;
	     	$count =count($tab);
			if($count ==1){
			  $local ="local";
			  echo'<div><div class="titre">vous avez déja  '.$count.' '.$local.'</div></div>';
			}
			
			elseif($count ==0){
				echo'<div><div class="titre"></div></div>';
				
			}
			
			else{
				$local ="locaux";
				echo'<div><div class="titre">vous avez déja  '.$count.' '.$local.'<br/>sur la facture</div></div>';
			}
			
		 
		   if($_POST['to']=="réservation") {
				
			 $adjout ='<div>Acompte(+):<br/><input type="number" id="acomp" name="acomp" value="'.$donns['avance'].'"><span class="account"></span></div>
			<div>Reste à payér:<br/><input type="number" id="rest" name="rest" value="'.$donns['reste'].'"></div>';
			 
			}
			if($_POST['to']=="séjour" OR $_POST['to']=="horaire") {
				
			$adjout ='<div class="dd">Acompte(+):<br/><input type="number" id="acomp" name="acomp" value="'.$donns['avance'].'"><span class="account"></span></div>
			<div class="dd">Reste à payér:<br/><input type="number" id="rest" name="rest" value="'.$donns['reste'].'"></div>';
			
			}
			
	       
		    $mont =$donns['montant'];
			
			if($mont ==0){
			$mont_tva=0;
			}
			
			else{
			$mont_tva = $donns['mont_tva'];
			}
			
			$montants = $donns['montant'];
			
			echo'<div class="montant"><h5>récapitulatif des montants</h5>
			<div class="rest">'.$adjout.'</div>
			<div>Repas(+):<br/><input type="number" id="rep" name="rep"></div>
			<div>TVA(%):<br/><input type="number" id="tva" name="tva" value="'.$donns['tva'].'"> <span class="tva">'.$mont_tva.'</span></div>
			<div class="tot">Montant <span class="mont">'.$montants.'</span>xof</div>
			<input type="hidden" name="mon" id="mon" value="'.$montants.'"></span>
			<div>facture  payée <input type="checkbox" name="status" value="1">  Non payée <input type="checkbox" name="status" value="2">
			</div>';
			echo'</div>';
			echo'<div><input type="submit" id="add_local" value="valider"></div>';
		
	  

	}
	
	 
	 if($_POST['action']=="add"){
		 
		if(!empty($_POST['prix_nuite'])){
		$pay = $_POST['prix_nuite'];	
      }
	 
	 else{
		 $pay = $_POST['paynuite'];
	 }
	 
	 
	  if(!empty($_POST['prix_pass'])){
		 $pay = $_POST['prix_pass'];		
	 }
	 
	 else{
		 $pay= $_POST['paypass'];
	 }
	 
	// créer un tableau de session 
	if(isset($_SESSION['add_home'])){
	
    // pour le choix du séjour ou réservation	
		
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
			if($count ==1){
			  $local ="local";
			}
			
			else{
				$local ="locaux";
			}
			echo'<div><div class="titre">Nouvelle selection de '.$count.' '.$local.'</div></div>';
			
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
		
			
			echo'<div class="montant">
			<div class="tot">Montant Ajoutée <span class="mons">'.$total.'</span>xof</div>
			<input type="hidden" name="mons" id="mons" value="'.$total.'"></span>';
			echo'</div>';
		
	  }	
      
    }
 

	 if($_POST['action']=="remove") {
        
	 if(!empty($_POST['prix_nuite'])){
		
        $pay = $_POST['prix_nuite'];	
        		
	 }
	 
	 else{
		 
		 $pay = $_POST['paynuite'];
	 }
	 
	 
     if(!empty($_POST['prix_pass'])){
		
        $pay = $_POST['prix_pass'];		
	 }
	 
	 else{
		 
		 $pay= $_POST['paypass'];
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
			
			echo'
			<div></div>
			<div class="tot">Montant <span class="mont">'.$totals.'</span>xof</div>
			<input type="hidden" name="total" id="total" value="'.$totals.'"></span>
			</div>';
			echo'</div>';
		
		  }	
    
      if($_POST['action']=="removes"){
        
		// recupére les données 
       $id=$_POST['id'];
	   $id_fact =$_GET['id_fact'];
	
	// recupére les autres données
	$total1 = $_POST['mon'];
	$account1= $_POST['acomp'];
	$reste1 = $_POST['rest'];
    
	//
	
	$req=$bds->prepare('SELECT montant,mont_restant FROM bord_informations WHERE id_chambre= :id  AND id_fact= :id_fact AND email_ocd= :email_ocd ');
    $req->execute(array(':id'=>$id,
	                    ':id_fact'=>$id_fact,
	                   ':email_ocd'=>$_SESSION['email_ocd']));
	$dnns=$req->fetch();
	
	$montan = $dnns['montant']* floatval($_POST['nbjour']);

	
	if(!empty($_POST['acomp'])){
	$monts =$total1-$montan;
	$mont = $reste1+$montan;
	}
	
	else{
		$monts =$total1-$montan;
		$mont=0;
	}

	// modifie les données
	// on modifie les données de la base de données guide
         $ret=$bds->prepare('UPDATE facture SET montant= :des, avance= :ds, reste= :rs,montant_repas= :rps WHERE email_ocd= :email_ocd AND id_fact= :id');
        $ret->execute(array(':des'=>$monts,
		                    ':ds'=>$_POST['acomp'],
							':rs'=>$mont,
							':rps'=>$_POST['rep'],
							':id'=>$id_fact,
                            ':email_ocd'=>$_SESSION['email_ocd']
					 ));
	
    // on surprime la data de delete dans la tableau
    $res=$bds->prepare('DELETE  FROM bord_informations WHERE  id_chambre= :id  AND id_fact= :id_fact AND email_ocd= :email_ocd');
    $res->execute(array(':id'=>$id,
	                    ':id_fact'=>$id_fact,
	                    ':email_ocd'=>$_SESSION['email_ocd']));
	// on surprime la data de delete dans la tableau
    $res=$bds->prepare('DELETE  FROM home_occupation WHERE  id_chambre= :id  AND id_fact= :id_fact AND email_ocd= :email_ocd');
    $res->execute(array(':id'=>$id,
	                    ':id_fact'=>$id_fact,
	                    ':email_ocd'=>$_SESSION['email_ocd']));				
	
	
    
    }
}	

 ?>







