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
	
	$req=$bdd->prepare('SELECT email_ocd,email_user,password,user,permission,active FROM inscription_client WHERE email_user= :email_user');
   $req->execute(array(':email_user'=>$_POST['email_ocd']));
   $donnees=$req->fetch();
	$req->closeCursor();
	
	// on verifie la connexion instantanees
   $ren=$bdd->prepare('SELECT email_ocd  FROM activer_compte WHERE email_ocd = :email_ocd');
   $ren->execute(array(':email_ocd'=>$_POST['email_ocd']));
   $fuller=$ren->fetch();
   $ren->closeCursor();
  // on recupere variable
	
	if($_POST['id_ocd']==$donnees['password']) {
		
		$active="off";
		if($donnees['active']!=$active) {
			
			$_SESSION['email_ocd']=$donnees['email_ocd'];
			$_SESSION['email_user']=$_POST['email_ocd'];
			$_SESSION['pose']= $_POST['id_ocd'];
			$_SESSION['user']= $donnees['user'];
			$_SESSION['permission'] = $donnees['permission'];
			 $_SESSION['pmd']= sha1(uniqid('',true).'_'.mt_rand());
	          $_SESSION['ip']= $_SERVER["REMOTE_ADDR"];
			  
			  
			  //On modifie les donnees
	           $reks=$bdd->prepare('UPDATE inscription_client SET etat=\'connecte\', date= :nvte, heure = :nvh WHERE email_user= :email_user');
			   $reks->execute(array( ':nvte'=>$date,
									':nvh'=>$heure,
							       ':email_user'=>$_POST['email_ocd']));
	 // on renvoi la page
       echo'<SCRIPT LANGUAGE="JavaScript">
       document.location.href="tableau_data_home.php"
        </SCRIPT>';	
			  
		}
		
	 else{
	 
      	echo'<div class="dnn">Votre compte est desactivé</div>'; 
	}
		
	}
	
	else{
	 
      	echo'<div class="dnn">Vos identifiants OCD sont incorrectes...</div>'; 
	}
	
}

?>