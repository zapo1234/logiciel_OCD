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
   
  // on recupére les variable transmise
  $name = trim(strip_tags($_POST['nam']));
   $email =$_POST['email'];
   $adresse = trim(strip_tags($_POST['adress']));
   $adresse1 =trim(strip_tags($_POST['adress']));
   $numero =$_POST['numero'];
   $numero1 =$_POST['numero'];
   $compt = trim(strip_tags($_POST['compt']));
   $enre = trim(strip_tags($_POST['enre']));
   $active ="off";
   
    // on recupere toutes les email 
   // on recupére le nom de l'image dans la base de données
   $res=$bdd->prepare('SELECT email_ocd,email_user,logo FROM inscription_client WHERE email_user= :email_user');
   $res->execute(array(':email_user'=>$_SESSION['email_user']));
   $donnees=$res->fetch();
   
   if(isset($_FILES['logo']['name']) AND $_FILES['logo']['error']==0) {
   $infosfichier=pathinfo($_FILES['logo']['name']);
  $extension_upload= strtolower($infosfichier['extension']);
  $type_extension = array('png','jpeg','gif','jpg','PNG','JPG');

  if($_FILES['logo']['size']>1000000) {
	echo'<div class="up">fichier trop lourd</div>';
  }
  elseif(!in_array($extension_upload,$type_extension)) {
  echo'<div class="up">l\'extension du fichier n\'est pas autorisée</div>';
  }
  
  else {
	  
	  if(!empty($donnees)){
     // on suprimer le fichier existant
	  unlink ("image_logo/" .$donnees['logo']);
     }
	// on instruis un nom du fichier
	$nvname = rand(1000,10000000) . '.' . $extension_upload;
    $path= "image_logo/" . $nvname;
    // on enregitre dans la fonction
	move_uploaded_file($_FILES['logo']['tmp_name'], $path);
	}
   }
   
  else{
	  $nvname="zapo";  
   }
  
     if(isset($nvname)){
    echo'<div class="enre"><div><i class="fas fa-check-circle" style="color:green;font-size:16px;"></i> vos données sont bien prises en compte !
		     <div class="dep"><i style="font-size:40px;color:white" class="fa">&#xf250;</i></div></div>';
	
	// modifier le meme logo pour les autres users.
      $ret=$bdd->prepare('UPDATE inscription_client SET  logo= :log WHERE email_ocd= :email_ocd');
       $ret->execute(array(':log'=>$nvname,
	                      ':email_ocd'=>$donnees['email_ocd']));
   // Actualiser des données les données dans la base de données inscription_client
   // Actualiser des données les données dans la base de données inscription_client
   // on modifie les données de la base de données guide
         $ret=$bdd->prepare('UPDATE inscription_client SET email_society= :email, denomination= :des, adresse= :reser, numero_cci= :cci, id_entreprise= :id_en, numero= :res, active= :ac, logo= :log WHERE email_user= :email_user');
        $ret->execute(array(':email'=>$email,
		                    ':des'=>$name,
					        ':reser'=>$adresse,
							':cci'=>$compt,
							':id_en'=>$enre,
							':res'=>$numero,
							':ac'=> $active,
							':log'=>$nvname,
                            ':email_user'=>$_SESSION['email_user']
					 ));
	 }

       ?>