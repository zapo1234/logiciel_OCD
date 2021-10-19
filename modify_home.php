<?php
include('connecte_db.php');
include('inc_session.php');

if(isset($_GET['id_fact']) AND isset($_GET['code_data'])){
 $id_fact =$_GET['id_fact'];
 $code =$_GET['code_data'];
 $session = $_GET['code_data'];
// recupére les données de la base de données si $_GET['id_fact']
  $req=$bds->prepare('SELECT type_logement,chambre,id_chambre,montant,mont_restant FROM bord_informations WHERE code= :code AND id_fact= :id_fact AND email_ocd= :email_ocd ');
    $req->execute(array(':code'=>$code,
	                   ':id_fact'=>$id_fact,
	                   ':email_ocd'=>$_SESSION['email_ocd']));
	$don = $req->fetchAll();
	$req->closeCursor();
	
	// recupére les données de la facture
	$res=$bds->prepare('SELECT nombre,montant,avance,reste,montant_repas,tva,mont_tva,data_montant,
	moyen_paiement
	FROM facture WHERE code= :code AND id_fact= :id_fact AND email_ocd= :email_ocd ');
    $res->execute(array(':code'=>$code,
	                    ':id_fact'=>$id_fact,
	                   ':email_ocd'=>$_SESSION['email_ocd']));
	$donns= $res->fetch();
	$res->closeCursor();
	
	$rej=$bds->prepare('SELECT email_ocd,montant,encaisse,reservation,reste FROM tresorie_customer WHERE code= :code AND email_ocd= :email_ocd');
    $rej->execute(array(':code'=>$code,
	                    ':email_ocd'=>$_SESSION['email_ocd']));
    $donnes=$rej->fetch();
   //créer un tableau pour la data montant
   $data_user = $donns['data_montant'];
	$datas_user = explode(',',$data_user);
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
	       $total =0;
	     	$montant = $dos['montant']*$donns['nombre'];
			 echo'<div class="data"><div class="hom" id="homs'.$dos['id_chambre'].'"><h5>'.$dos['type_logement'].'</h5>
			<span class="d">'.$dos['chambre'].'</span><span class="dg">'.$dos['montant'].' xof</span><span><input type="hidden" name="paie[]" value="'.$dos['montant'].'"> 
			<input type="hidden" name="chambre[]" value="'.$dos['chambre'].'">
			<input type="hidden" name="typ[]" value="'.$dos['type_logement'].'">
			<input type="hidden" name="pay[]" value="'.$dos['montant'].'">
			<input type="hidden" name="id_chambre[]" value="'.$dos['id_chambre'].'">
			<span class="remov"><a href ="#" class="removes" data-id4="'.$dos['id_chambre'].'" class="remove" title="annuler la prise"><i class="fas fa-minus-circle" style="color:#F7890E;font-size:14px;"></i></a></span>
			</div></div>';
		}
		
		$count =count($tab);
			if($count ==1){
			  $local ="local";
			  echo'<div><div class="titre">vous avez déja  '.$count.' '.$local.'</div></div><br/><span class="eror"></span>';
			}
			
			elseif($count ==0){
				echo'<div><div class="titre"></div></div><br/><span class="eror"></span>';
			}
			else{
				$local ="locaux";
				echo'<div><div class="titre">vous avez déja  '.$count.' '.$local.'<br/>sur la facture</div></div><br/><span class="eror"></span>';
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
			$montants = $donns['montant']-floatval($donns['montant_repas'])-floatval($mont_tva);
			$monta = $donns['montant'];
			$outpout='<div class="datas"><div class="option">Option1 <span class="ouvrir"><i class="fa fa-chevron-down" aria-hidden="true" style="font-size:14px;"></i></span><span class="ouvrir11" style="font-size:14px;"><i class="fa fa-chevron-up" aria-hidden="true"></i></span></div>
			<div class="montant">
			<div class="rest">'.$adjout.'</div>
			<div class="rep">Repas(+):<br/><input type="number" id="rep" name="rep" value="'.$donns['montant_repas'].'"></div>
			<div>TVA(%):<br/><input type="number" id="tva" name="tva" value="'.$donns['tva'].'"> <span class="tva">'.$mont_tva.'</span><input type="hidden" name="mont_ta" value="'.$mont_tva.'">xof</div>
			<div>Remise(sur TTC)<br/><input type="number" id="remise" name="remise"></div>
			</div>
			<div class="tot">
			 <h5>récapitulatif des montants</h5>
			<div>Montant HT <span class="mont">'.$montants.'</span>xof</div>
			<div>Montant TTC <span class="mon">'.$monta.'</span>xof</div>
			<input type="hidden" name="mon" id="mon" value="'.$montants.'">
			</div>
			<div class="option">Option2 <span class="ouvrir1"><i class="fa fa-chevron-down" aria-hidden="true" style="font-size="14px"></i></span><span class="ouvrir12"><i class="fa fa-chevron-up" aria-hidden="true" style="font-size:14px"></i></span></div>
			<div class="montant1"><br/>
			<h3>Moyens de paiment</h3>
			<div>espèce<br/> <input type="number" id="paie1" name="paie1" value="'.$datas_user[0].'"><br/>Carte Bancaire <br/><input type="number" id="paie2" name="paie2" value="'.$datas_user[1].'"><br/>
			 Mobile Monney<br/><input type="number" id="paie3" name="paie3" value="'.$datas_user[2].'"><br/>chéques<br/><input type="number" id="paie4" name="paie4" value="'.$datas_user[3].'"><br/>
			</div></div>';
			echo$outpout;
			echo'<div><br/><input type="submit" id="add_local" value="valider"></div>';
		    echo'</div>';
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
		{$count = count($_SESSION['add_home']);
		  $item_array = array(
         'id'          =>   $_POST['id'],
		 'nbjour'      =>   $_POST['nbjour'],
         'prix_nuite'  =>   $pay,
         'prix_pass'   =>   $pay,
		 'paynuite'    =>   $pay,
		 'paypass'     =>   $pay,
         'type'        =>   $_POST['type'],
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
         'id'          =>   $_POST['id'],
		 'nbjour'      =>   $_POST['nbjour'],
         'prix_nuite'  =>   $pay,
         'prix_pass'   =>   $pay,
		 'paynuite'    =>   $pay,
		 'paypass'     =>   $pay,
         'type'        =>   $_POST['type'],
		 'chambre'     =>   $_POST['chambre'],
		 'montant'    => $pay*$_POST['nbjour']

         );
         
         // enregistrer les élement dans un tableau
         $_SESSION['add_home'][] = $item_array;		 
		   
	   }
	  
	  if(!empty($_SESSION['add_home'])){
		  $total =0;
	     	$count =count($_SESSION['add_home']);
			if($count ==1){
			  $local ="local";
			  $text ="Adjout d'un";
			}
			else{
				$local ="locaux";
				$text = "Adjout de";
			}
			echo'<div><div class="titres">'.$text.' '.$count.' '.$local.'</div></div>';
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
			$som =$pays*$_POST['nbjour'];
			echo'<div class="data1"><div class="hom"><h5>'.$values['type'].'</h5>
			<span class="d">'.$values['chambre'].'</span><span class="dg">'.$pays.' xof</span> 
			<input type="hidden" name="chambre[]" value="'.$values['chambre'].'">
			<input type="hidden" name="typ[]" value="'.$values['type'].'">
			<input type="hidden" name="pay[]" value="'.$pays.'">
			<input type="hidden" name="id_chambre[]" value="'.$values['id'].'">
			<span class="remov"><a href ="#" class="remove" data-id3="'.$values['id'].'" class="remove" title="annuler la prise"><i class="fas fa-minus-circle" style="color:#F7890E;font-size:14px;"></i></a></span>
			</div>';
			}
		   echo'<div class="datas1">
			<div class="tot">Montant Ajoutée <span id="mts" class="montas">'.$total.'</span>xof</div>
			<input type="hidden" name="mons" id="mons" value="'.$total.'"></span>';
			echo'</div></div>';
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
		 'chambre'     =>   $_POST['chambre'],
		 'montant'    =>    $pay*$_POST['nbjour']
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
		 'chambre'     =>   $_POST['chambre'],
		 'montant'     => $pay*$_POST['nbjour']
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
			  echo'<div><div class="titres">a ajouté '.$count.' '.$local.'</div></div>';
			}
			
			if($count >1){
				$local ="locaux";
				echo'<div><div class="titres">a ajoutés '.$count.' '.$local.'</div></div>';
			
			}
			
			if($count ==0){
				
				echo'<div><div class="titres">
				</div></div>';
				
				$total =0;
			}
			
			$tab = [];
			$array = [];
			foreach($_SESSION['add_home'] as $keys => $values){
		
		    if($values['id']==$_POST['id']){
	        // suprimer
	          unset($_SESSION['add_home'][$keys]);
			  $array[] = $values['montant'];
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
			
		    $tab[]= $values['montant'];
			$total = $total +($pays*$_POST['nbjour']);
			 
			 if($values['id'] !=$_POST['id']) {
			echo'<div class="data1"><div class="hom"><h5>'.$values['type'].'</h5>
			<span class="d">'.$values['chambre'].'</span><span class="dg">'.$pays.' xof</span> 
			<input type="hidden" name="chambre[]" value="'.$values['chambre'].'">
			<input type="hidden" name="typ[]" value="'.$values['type'].'">
			<input type="hidden" name="pay[]" value="'.$pays.'">
			<input type="hidden" name="id_chambre[]" value="'.$values['id'].'">
			<span class="remov"><a href ="#" class="remove" data-id3="'.$values['id'].'" class="remove" title="annuler la prise"><i class="fas fa-minus-circle" style="color:#F7890E;font-size:14px;"></i></a></span>
			</div>';
			 }
			}
			// on recupére la dernière valeur du tableau
		   // on recupére le montant de sortie.
		   // on recupére la dernière valeur du tableau
		   // calculer la some des deux tableau
		   $arr1 =array_sum($tab);
		   $arr2 = array_sum($array);
		   $totals = floatval($arr1)-floatval($arr2);
	    }
			
			echo'
			<div class="datas1">
			<div class="tot">Montant <span id="mts" class="montas">'.$totals.'</span>xof</div>
			<input type="hidden" name="mons" id="mons" value="'.$totals.'"></span>
			</div></div>';
		
		  }	
    
      if($_POST['action']=="removes"){
        
		// recupére les données 
       $id=$_POST['id'];
	   $id_fact =$_GET['id_fact'];
	   $session=$_GET['code_data'];
	// recupére les autres données
	$total1 = $_POST['mon'];
	$account1= $_POST['acomp'];
	$reste1 = $_POST['rest'];
	$data = $donns['data_montant'];
	$moyen_paiement = $donns['moyen_paiement'];
	//recupere le motant total des sommes pour le calcule
	
	
	$req=$bds->prepare('SELECT montant,mont_restant FROM bord_informations WHERE  code= :code AND id_chambre= :id  AND id_fact= :id_fact AND email_ocd= :email_ocd ');
    $req->execute(array(':code'=>$session,
	                    ':id'=>$id,
	                    ':id_fact'=>$id_fact,
	                   ':email_ocd'=>$_SESSION['email_ocd']));
	$dnns=$req->fetch();
	
	// le montant du local suprimé
	$montan = $dnns['montant']* floatval($_POST['nbjour']);
    
	// calculons la taxe pour ce montant
	$taxe_mont = $montan*$_POST['taxe']/100;
	

	$monta =$total1-$montan+ floatval($_POST['rep']);
	$taxe = $monta*$_POST['taxe']/100;
	
	$monts = $monta+$taxe;
	
	// remplacer les montant dans la table tabletable_customer
	$montant = $donnes['encaisse']-$montan;
	
	if($total1 !=0 AND $_POST['acompt']!=0) {
	$mont = $monts-$_POST['acomp'];
    }
	
	else{
		
	$mont =0;
	}
	
	if($monts==0){
	// remise à zéro de toute les entrées
	$result = 0;	
	 $_POST['acomp']=0;
	 $_POST['rep']=0;
	 $num=0;
	 $data =$num.','.$num.','.$num.','.$num;
	 $moyen_paiement = 'espéces:'.$num.',Carte bancaire:'.$num.', Mobile Monney:'.$num.',Chéques:'.$num.'';
	 
	 // on modifie les données de la base de données guide
        $rev=$bds->prepare('UPDATE moyen_tresorie SET date= :ds, montant= :mont, montant1= :mont1, montant2= :mont2, montant3= :mont3 WHERE code= :code AND email_ocd= :email_ocd AND id_fact= :id');
        $rev->execute(array(':ds'=>$dat,
		                    ':mont'=>$num,
					        ':mont1'=>$num,
							':mont2'=>$num,
							':mont3'=>$num,
							':code'=>$session,
							':id'=>$id_fact,
                            ':email_ocd'=>$_SESSION['email_ocd']
					 ));
	 
	}
	
	// on compte le nombre d'element dans le tableau.
	$count = count($_SESSION['add_home']);
	
	// modifie les données
	// on modifie les données de la base de données guide
         $ret=$bds->prepare('UPDATE facture SET montant= :des, avance= :ds, reste= :rs,montant_repas= :rps, mont_tva= :tva,moyen_paiement= :moyens, data_montant= :data WHERE code= :code AND email_ocd= :email_ocd AND id_fact= :id');
        $ret->execute(array(':des'=>$monts,
		                    ':ds'=>$_POST['acomp'],
							':rs'=>$monts-$_POST['acomp'],
							':rps'=>$_POST['rep'],
							':tva'=>$taxe,
							':moyens'=>$moyen_paiement,
							':data'=>$data,
							':code'=>$session,
							':id'=>$id_fact,
                            ':email_ocd'=>$_SESSION['email_ocd']
					 ));
					 
	 // on modifie les données de la base de données guide
         $rem=$bds->prepare('UPDATE tresorie_customer SET  encaisse= :des  WHERE code= :code AND email_ocd= :email_ocd');
        $rem->execute(array(':code'=>$session,
		                    ':des'=>$montant-$taxe_mont,
                            ':email_ocd'=>$_SESSION['email_ocd']
					 ));
	
    // on surprime la data de delete dans la tableau
    $res=$bds->prepare('DELETE  FROM bord_informations WHERE code= :code AND id_chambre= :id  AND id_fact= :id_fact AND email_ocd= :email_ocd');
    $res->execute(array(':id'=>$id,
	                    ':code'=>$session,
	                    ':id_fact'=>$id_fact,
	                    ':email_ocd'=>$_SESSION['email_ocd']));
	// on surprime la data de delete dans la tableau
    $rel=$bds->prepare('DELETE  FROM home_occupation WHERE code= :code AND id_local= :id  AND id_fact= :id_fact AND email_ocds= :email_ocd');
    $rel->execute(array(':code'=>$session,
	                    ':id'=>$id,
	                    ':id_fact'=>$id_fact,
	                    ':email_ocd'=>$_SESSION['email_ocd']));				
	
    
	}
}	

 ?>






