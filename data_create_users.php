<?php
include('connecte_db.php');
include('inc_session.php');
if($_POST['action']=="parameter") {
	  
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
   
   $req=$bdd->prepare('SELECT email_ocd,email_user FROM inscription_client WHERE email_user= :email_user');
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
   // 
   $pass=$_POST['pass'];
    
	   //hash sur le mot de pass
	   $options = [
       'cost' => 12 // the default cost is 10
       ];

    
	$hash = password_hash($pass, PASSWORD_BCRYPT, $options);
   
    $emails = $_SESSION['email_ocd'];
   
   $name = trim(strip_tags($_POST['nom']));
   $prenom = trim(strip_tags($_POST['prenom']));
   $num="";
   $role =$_POST['role'];
   $log="";
   $numero_compte ="";
   $user =$name.' '.$prenom;
   $etat ="";
   $active="off";
   $code =0;
   $society =$_POST['site'].','.$_POST['site1'].' ,'.$_POST['site2'];
   
   
	 $status=1;
     $categories="dirigeant";
     $permission ="user:boss";	 
	
   
   if($donnees['email_user']!=$_POST['emails']) {
	
  echo'<div class="enre"><div><i class="fas fa-check-circle" style="color:green;font-size:16px;"></i>  Le compte de l\'utilisateur crée  !</button>
		     <div class="dep"><i style="font-size:40px;color:white" class="fa">&#xf250;</i></div></div>';

   // insertion des données pour création des users compte
		$rev=$bdd->prepare('INSERT INTO inscription_client(email_ocd,email_user,denomination,adresse,numero_cci,id_entreprise,user,numero,numero1,permission,password,categories,numero_compte,code,society,date,heure,etat,status,active,logo) 
		VALUES(:email_ocd,:email_user,:denomination,:adresse,:numero_cci,:id_entreprise,:user,:numero,:numero1,:permission,:password,:categories,:numero_compte,:code,:society,:date,:heure,:etat,:status,:active,:logo)');
	     $rev->execute(array(':email_ocd'=>$_SESSION['email_ocd'],
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
							':code'=>$code,
							':society'=>$society,
					        ':date'=>$date,
						    ':heure'=>$heure,
						    ':etat'=>$etat,
							':status'=>$status,
							':active'=>$active,
						    ':logo'=>$log
						  ));

  }
  
  else{
	  
	  echo'<div class="enre"><div><i class="fas fa-check-circle"    style="color:green;font-size:16px;"></i>Modfier le mot de pass ! </button>
		     <div class="dep"><i style="font-size:40px;color:white" class="fa">&#xf250;</i></div></div>';
    }
	
  }