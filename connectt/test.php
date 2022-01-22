<?php
include('connecte_db.php');
include('inc_session.php');

if(isset($_POST['check'])){
	
	$email =$_SESSION['email_ocd'];
     $check =$_POST['check'];
	 $data = implode('',$check);
	 $datas = explode(',',$data);
	 
	 $tab= [];
	 $array =[];
	 $str = "0.";
	 foreach($datas as $values){
		 
		if(preg_match("/{$str}/i", $values)){
          $tab[] = $values;
        }
        else{
          $array[]=$values;
        }			
	 }
	 
	 foreach($tab as $vales){
		
      foreach($array as $valus){		
		
       	$req="DELETE FROM facture WHERE code='".$valus."' AND id_fact ='".$vales."' AND email_ocd='".$email."'";
		$statement= $bds->prepare($req);
		$statement->execute();
		
		// suprimer dans la table bord_informations
		
		$rev="DELETE FROM bord_informations WHERE code='".$valus."'  AND id_fact ='".$vales."' AND email_ocd='".$email."'";
		$statement= $bds->prepare($rev);
		$statement->execute();
		
		// suprimer dans la table home_occupation
		$reg="DELETE FROM home_occupation WHERE code='".$valus."' AND id_fact ='".$vales."' AND email_ocds='".$email."'";
		$statement= $bds->prepare($reg);
		$statement->execute();

        if(count($tab)==1){
          echo'<div class="enre"><span class="d" style="color:#AB040E;"><i class="fas fa-exclamation-circle" style="font-size:16px;color:#AB040E;"></i> une facture suprimée</span></div>';
		}

        else{
           $a=count($tab);
		   
		   echo'<div class="enre"><span class="d" style="color:#AB040E;"><i class="fas fa-exclamation-circle" style="font-size:16px;color:#AB040E;"></i>'.$a.' factures suprimées</span></div>';

		}			
	  
	  }
	}
   // suprimer dans la table home_occupation
  }
  else{
      echo'<div class="enre"><span class="d" style="color:#AB040E;"><i class="fas fa-exclamation-circle" style="font-size:16px;color:#AB040E;"></i> aucune facture selectionnée</span></div>';
  }

?>