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
   $req=$bdd->prepare('SELECT email_ocd,email_user,denomination,adresse,numero_cci,id_entreprise,logo FROM inscription_client WHERE email_user= :email_user');
   $req->execute(array(':email_user'=>$_SESSION['email_user']));
   $donnees=$req->fetch();
	$req->closeCursor();
	
	$jour = array("Dim","Lun","Mar","Mercredi","Jeu","Vendr","Sam");
   $mois = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
    $dateDuJour = $jour[date("w")]." ".date("d")." ".$mois[date("n")]." ".date("Y");
    $date=$dateDuJour;
    $heure = date('H:i');
    // on recupére les variable transmise
   $denomination =$donnees['denomination'];
   $adresse =$donnees['adresse'];
   $numero_cci =$donnees['numero_cci'];
   $id_entreprise =$donnees['id_entreprise'];
   $date = $dateDuJour;
   $heure =date('H:i');
   $email =$_POST['emails'];
   $pass=$_POST['pass'];
    
	   //hash sur le mot de pass
	   $options = [
       'cost' => 12 // the default cost is 10
       ];

   $hash = password_hash($pass, PASSWORD_BCRYPT, $options);
    $emails = $_SESSION['email_ocd'];
   $name = trim(strip_tags($_POST['nom']));
   $prenom = trim(strip_tags($_POST['prenom']));
   $role =$_POST['role'];
   $log=$donnees['logo'];
   $numero_compte ="";
   $user =$name.' '.$prenom;
   $etat ="";
   $active="off";
   $length =78;
  $token_pass = bin2hex(random_bytes($length));
   
   if(empty($_POST['code'])){
	  $code=0; 
   }
   else{
	  $code=$_POST['code']; 
   }
    $society =$_POST['society'];
    $societ="";
   
   if($role==1){
	 $status=1;
     $categories="dirigeant";
     $permission ="user:boss";	 
	}
   
   elseif($role==3){
	 $status=3;
     $categories="gestionnaire";
     $permission ="user:gestionnaire";  
	}
   else{
	 $status=4;
     $categories="receptionniste";
     $permission ="user:employes";  
   }
   $stat="";
   
  if($donnees['email_user']!=$_POST['emails']) {
	   $rev=$bdd->prepare('INSERT INTO inscription_client(email_ocd,email_user,denomination,adresse,numero_cci,id_entreprise,user,numero,numero1,permission,password,categories,numero_compte,code,society,societys,date,heure,etat,status,active,logo,id_visitor,token_pass) 
		VALUES(:email_ocd,:email_user,:denomination,:adresse,:numero_cci,:id_entreprise,:user,:numero,:numero1,:permission,:password,:categories,:numero_compte,:code,:society,:societys,:date,:heure,:etat,:status,:active,:logo,:id_visitor,:token_pass)');
	     $rev->execute(array(':email_ocd'=>$_SESSION['email_ocd'],
		                     ':email_user'=>$email,
		                    ':denomination'=>$denomination,
							':adresse'=>$adresse,
							':numero_cci'=>$numero_cci,
							':id_entreprise'=>$id_entreprise,
							':user'=>$user,
							':numero'=>$_POST['num'],
							':numero1'=>$_POST['num'],
							':permission'=>$permission,
							':password'=>$hash,
							':categories'=>$categories,
						    ':numero_compte'=>$numero_compte,
							':code'=>$code,
							':society'=>$society,
							':societys'=>$societ,
					        ':date'=>$date,
						    ':heure'=>$heure,
						    ':etat'=>$etat,
							':status'=>$status,
							':active'=>$active,
						    ':logo'=>$log,
							':id_visitor'=>$_SESSION['id_visitor'],
							':token_pass'=>$token_pass
						  ));
						  
				 echo'<div class="enre"><div><i class="fas fa-check-circle" style="color:green;font-size:16px;"></i>  Le compte à été crée !</button>
		     <div class="dep"><i style="font-size:40px;color:white" class="fa">&#xf250;</i></div></div>';
          }
     else{
	  echo'<div class="enre"><div><i class="fas fa-check-circle"    style="color:green;font-size:16px;"></i>Changer de mail !</button>
		     <div class="dep"><i style="font-size:40px;color:white" class="fa">&#xf250;</i></div></div>';
	 }  
   
   ?>