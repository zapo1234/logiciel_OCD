<?php
include('connecte_db.php');
include('inc_session.php');
	  
	 if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token']))
		
 {
	//Si le jeton de la session correspond à celui du formulaire
	if($_SESSION['token'] != $_POST['token'])
	{
		//On stocke le timestamp qu'il était il y a 15 minutes
		$timestamp_ancien = time() - (5*60);
		//Si le jeton n'est pas expiré
		if($_SESSION['token_time'] < $timestamp_ancien)
		{
		     echo'<body onload="alert(\'OCD ne vous reconnais pas  , vous n\'avez pas acces à la page \')">';
	           echo'<meta http-equiv = "refresh" content="0; URL= index.php">';
		}
	  }
   }
   
   // on recupére les données de la table 
   
   $req=$bdd->prepare('SELECT email_ocd,email_user,token_pass FROM inscription_client WHERE email_user= :email_user');
   $req->execute(array(':email_user'=>$_SESSION['email_user']));
   $donnees=$req->fetch();
	$req->closeCursor();
	
	$jour = array("Dim","Lun","Mar","Mercredi","Jeu","Vendr","Sam");
   $mois = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
    $dateDuJour = $jour[date("w")]." ".date("d")." ".$mois[date("n")]." ".date("Y");
    $date=$dateDuJour;
    $heure = date('H:i');
	
	// creation d'un jeton unique token
	$rand_token = openssl_random_pseudo_bytes(16);
    //change binary to hexadecimal
     $token = bin2hex($rand_token);
   
   // on recupére les variable transmise
   $denomination ="";
   $adresse ="";
   $numero_cci ="";
   $id_entreprise ="";
   $date = $dateDuJour;
   $heure =date('H:i');
   $email =$_POST['emails'];
   $email_ocd = $_POST['ocd'];
   $pass = $_POST['password'];
    //hash sur le mot de pass
	   $options = [
       'cost' => 12 // the default cost is 10
       ];

   $hash = password_hash($pass, PASSWORD_BCRYPT, $options);
   $name = trim(strip_tags($_POST['name']));
   $num="";
   $log="";
   $numero_compte ="";
   $user =$name;
   $etat ="";
   $active="on";
   $code =0;
   $societys ="";
   $society="";
   $id_visitor = $token;
   $status=1;
   $categories="dirigeant";
   $permission ="user:boss";
   // token _password
   $tokens = openssl_random_pseudo_bytes(16);
 //Convert the binary data into hexadecimal representation.
    $token_pass = bin2hex($tokens);
   
   // nombre de site pour les compte tresorie customer
   $sites = $_POST['sites'];
   $reservation =0;
   $reste =0;
   $depense =0;
   $montant =0;
   if($donnees['email_user']!=$_POST['emails'] AND $donnees['token_pass']!=$token_pass) {
	 if(empty($_POST['sites']))
     {
	 $codes=0;
	 $society="";
	 $rev=$bds->prepare('INSERT INTO tresorie_customer (email_ocd,reservation,encaisse,depense,montant,reste,code,society)
	 VALUES(:email_ocd,:reservation,:encaisse,:depense,:montant,:reste,:code,
	 :society)');
	     $rev->execute(array(':email_ocd'=>$email_ocd,
							':reservation'=>$montant,
							':encaisse'=>$montant,
							':depense'=>$montant,
							':montant'=>$montant,
							':reste'=>$montant,
							':code'=>$codes,
							':society'=>$society,
					));
     
	 }
	 
	 else{
		$site = $_POST['sites'];
		$societys = $_POST['site'];
		$society="";
		$codes = $site;
		for($i=0; $i < $site; $i++){
		 $code = $i+1;
		 $soci_data = $societys[$i];
	$rev=$bds->prepare('INSERT INTO tresorie_customer (email_ocd,reservation,encaisse,depense,montant,reste,code,society)VALUES(:email_ocd,:reservation,:encaisse,:depense,:montant,:reste,:code,:society)');
	     $rev->execute(array(':email_ocd'=>$email_ocd,
							':reservation'=>$montant,
							':encaisse'=>$montant,
							':depense'=>$montant,
							':montant'=>$montant,
							':reste'=>$montant,
							':code'=>$code,
							':society'=>$soci_data
					));
			
		}
	 }
      $societ="";
    // insertion des données pour création des users compte
		$rev=$bdd->prepare('INSERT INTO inscription_client(email_ocd,email_user,denomination,adresse,numero_cci,id_entreprise,user,numero,numero1,permission,password,categories,numero_compte,code,society,societys,date,heure,etat,status,active,logo,id_visitor,token_pass) 
		VALUES(:email_ocd,:email_user,:denomination,:adresse,:numero_cci,:id_entreprise,:user,:numero,:numero1,:permission,:password,:categories,:numero_compte,:code,:society,:societys,:date,:heure,:etat,:status,:active,:logo,:id_visitor,:token_pass)');
	     $rev->execute(array(':email_ocd'=>$email_ocd,
		                     ':email_user'=>$email,
		                    ':denomination'=>$denomination,
							':adresse'=>$adresse,
							':numero_cci'=>$numero_cci,
							':id_entreprise'=>$id_entreprise,
							':user'=>$user,
							':numero'=>$num,
							':numero1'=>$_POST['numero'],
							':permission'=>$permission,
							':password'=>$hash,
							':categories'=>$categories,
						    ':numero_compte'=>$numero_compte,
							':code'=>$codes,
							':society'=>$society,
							':societys'=>$societ,
					        ':date'=>$date,
						    ':heure'=>$heure,
						    ':etat'=>$etat,
							':status'=>$status,
							':active'=>$active,
						    ':logo'=>$log,
							':id_visitor'=>$token,
							':token_pass'=>$token_pass
						  ));
						  
		// insert dans la tablea table custommer des caisse
        echo'<div class="enre"><div><i class="fas fa-check-circle"    style="color:green;font-size:16px;"></i>  Le compte user à été crée !
		     <div class="dep"><i style="font-size:40px;color:white" class="fa">&#xf250;</i></div></div>';
   }
  
  else{
	  
	  echo'<div style="color:red"><div><i class="fas fa-check-circle"    style="color:red;font-size:16px;"></i>échec veuillez changer le mail ! 
		     <div class="dep"><i style="font-size:40px;color:white" class="fa">&#xf250;</i></div></div>';
    }
	
  