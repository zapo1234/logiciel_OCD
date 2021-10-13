<?php

include('connecte_db.php');

if(isset($_POST['id_ocd'])) {
	
	//$options = [
   // 'salt' => your_custom_function_for_salt(), 
    //write your own code to generate a suitable & secured salt
    //'cost' => 12 // the default cost is 10
//];

//$hash = password_hash($your_password, PASSWORD_DEFAULT, $options);
	
	$jour = array("Dim","Lun","Mar","Mercredi","Jeu","Vendr","Sam");
   $mois = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
    $dateDuJour = $jour[date("w")]." ".date("d")." ".$mois[date("n")]." ".date("Y");
    $date=$dateDuJour;
    $heure = date('H:i');
	$date = date('Y-m-d');
	
	$dates1 = explode('-',$date);
	$j = $dates1[2];
	$mm = $dates1[1];
	$an = $dates1[0];
	
	$dat = $j.'-'.$mm.'-'.$an;
	
	$req=$bdd->prepare('SELECT email_ocd,email_user,password,user,permission,active,code,society FROM inscription_client WHERE email_user= :email_user');
   $req->execute(array(':email_user'=>$_POST['email_ocd']));
   $donnees=$req->fetch();
	$req->closeCursor();
    
	
	if($_POST['id_ocd']==$donnees['password'] AND $donnees['email_ocd']=="") {	
	echo'<SCRIPT LANGUAGE="JavaScript">
       document.location.href="gestion_create_users.php"
        </SCRIPT>';	
		
	}
	if($_POST['id_ocd']==$donnees['password']) {
		
		$active="off";
		if($donnees['active']!=$active) {
			
			$_SESSION['email_ocd']=$donnees['email_ocd'];
			$_SESSION['email_user']=$_POST['email_ocd'];
			$_SESSION['pose']= $_POST['id_ocd'];
			$_SESSION['user']= $donnees['user'];
			$_SESSION['permission'] = $donnees['permission'];
			$_SESSION['code']= $donnees['code'];
			$_SESSION['society']= $donnees['society'];
			 $_SESSION['pmd']= sha1(uniqid('',true).'_'.mt_rand());
	          $_SESSION['ip']= $_SERVER["REMOTE_ADDR"];
			  
			  
			  //On modifie les donnees
	           $reks=$bdd->prepare('UPDATE inscription_client SET etat=\'connecte\', date= :nvte, heure = :nvh WHERE email_user= :email_user');
			   $reks->execute(array( ':nvte'=>$date,
									':nvh'=>$heure,
		
		':email_user'=>$_POST['email_ocd']));
	 // on renvoi la page
	  if($donnees['permission']=="user:boss" OR $donnees['permission']=="user:gestionnaire"){
       echo'<SCRIPT LANGUAGE="JavaScript">
       document.location.href="tableau_data_home.php"
        </SCRIPT>';	
			  
		}

		if($donnees['permission']=="user:employes"){
			
			echo'<SCRIPT LANGUAGE="JavaScript">
           document.location.href="gestion_data_home.php?data='.$dat.'"
           </SCRIPT>';	
		}
	}
		
	 else{
	 
      	echo'<SCRIPT LANGUAGE="JavaScript">
           document.location.href="gestion_datas_messanger.php"
           </SCRIPT>';	
	}
		
	}
	
	else{
	 
      	echo'<div class="dnn" style="position:absolute">Vos identifiants OCD sont incorrectes...</div>'; 
	}
	
}

?>