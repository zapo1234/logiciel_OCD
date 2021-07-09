<?php
include('connecte_db.php');
include('inc_session.php');

$options = [
    'salt' => your_custom_function_for_salt(), 
    //write your own code to generate a suitable & secured salt
    'cost' => 12 // the default cost is 10
];

$hash = password_hash($your_password, PASSWORD_DEFAULT, $options);
 
     if($_POST['action']=="fetch"){
		 
		 // requete pour aller chercher les valeurs 
   $home = $_GET['home'];
  // emttre la requete sur le fonction
    $req=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,occupant,nombre_lits,equipements,equipement,cout_nuite,cout_pass,icons,infos,type FROM chambre WHERE id_chambre= :id_chambre AND email_ocd= :email_ocd');
    $req->execute(array(':id_chambre'=>$home,
	                    ':email_ocd'=>$_SESSION['email_ocd']
						));
    $datas = $req->fetch();
		 
				   echo'<div id="der15">';
					if($datas['type'] ==0){
					 echo'<h4>Bloquer toutes actions sur ce local</h4>
					 <div><button class="acces" data-id1="'.$_GET['home'].'">Bloquer l\'accès</button></div>';
					}
					
					else{
						echo'<h4>Activez l\'accès du local</h4>
					  <div><button class="access" data-id1="'.$_GET['home'].'">Activer l\'accès</button></div>';
					}
					echo'</div>'; 
		}
 
 
 // modifie le type de la chambre dans la base de données table chambre
 if($_POST['action']=="acess"){
	 $id = $_POST['id'];
	 $num =2;
	 // on modifie les données de la base de données guide
         $ret=$bds->prepare('UPDATE chambre SET type= :res WHERE email_ocd= :email_ocd AND id_chambre= :id_chambre');
        $ret->execute(array(':res'=>$num,
		                    ':id_chambre'=>$id,
                            ':email_ocd'=>$_SESSION['email_ocd']
							
							));
	    }
		
		
  if($_POST['action']=="access"){
	  
	 $id = $_POST['id'];
	 $num =1;
	 // on modifie les données de la base de données guide
         $ret=$bds->prepare('UPDATE chambre SET type= :res WHERE email_ocd= :email_ocd AND id_chambre= :id_chambre');
        $ret->execute(array(':res'=>$num,
		                    ':id_chambre'=>$id,
                            ':email_ocd'=>$_SESSION['email_ocd']
							
							)); 
	  
	  
  }
  
  
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
   
   $req=$bdd->prepare('SELECT DISTINCT email_ocd,denomination,adresse,numero_cci,id_entreprise FROM inscription_client WHERE email_ocd= :email_ocd');
   $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
   $donnees=$req->fetch();
	$req->closeCursor();
	
	$jour = array("Dim","Lun","Mar","Mercredi","Jeu","Vendr","Sam");
   $mois = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
    $dateDuJour = $jour[date("w")]." ".date("d")." ".$mois[date("n")]." ".date("Y");
    $date=$dateDuJour;
    $heure = date('H:i');
   
   // on recupére les variable transmise
   echo$donnees['denomination'];
   $denomination =$donnees['denomination'];
   $adresse =$donnees['adresse'];
   $numero_cci =$donnees['numero_cci'];
   $id_entreprise =$donnees['id_entreprise'];
   $date = $dateDuJour;
   $heure =date('H:i');
   $email =$_POST['emails'];
   $pass =$_POST['password'];
   $emails =$_SESSION['email_ocd'];
   
   $name = trim(strip_tags($_POST['nom']));
   $prenom = trim(strip_tags($_POST['prenom']));
   $role =$_POST['role'];
   $log="";
   $numero_compte ="";
   $user =$name.' '.$prenom;
   $etat ="";
   
   if($role==1){
	 $status=1;
     $categories="dirigeant";
     $permission ="user:boss";	 
	}
   elseif($role==2){
	  $status=2;
     $categories="Responsable";
     $permission ="user:boss";	 
   }
   
   elseif($role==3){
	 $status=3;
     $categories="Gestionnaire";
     $permission ="user:gestionnaire";  
	}
   
   else{
	 $status=4;
     $categories="Receptionniste";
     $permission ="user:employes";  
   }
   $stat="";
   
   echo'<div class="enre"><div><i class="fas fa-check-circle" style="color:green;font-size:16px;"></i>  Le compte à été crée !</button>
		     <div class="dep"><i style="font-size:40px;color:white" class="fa">&#xf250;</i></div></div>';

   // insertion des données dans la table facture
		$rev=$bdd->prepare('INSERT INTO inscription_client(email_ocd,email_user,denomination,adresse,numero_cci,id_entreprise,user,numero,permission,password,categories,numero_compte,date,heure,etat,status,logo) 
		VALUES(:email_ocd,:email_user,:denomination,:adresse,:numero_cci,:id_entreprise,:user,:numero,:permission,:password,:categories,:numero_compte,:date,:heure,:etat,:status,:logo)');
	     $rev->execute(array(':email_ocd'=>$_SESSION['email_ocd'],
		                     ':email_user'=>$email,
		                    ':denomination'=>$denomination,
							':adresse'=>$adresse,
							':numero_cci'=>$numero_cci,
							':id_entreprise'=>$id_entreprise,
							':user'=>$user,
							':numero'=>$_POST['num'],
							':permission'=>$permission,
							':password'=>$pass,
							':categories'=>$categories,
						    ':numero_compte'=>$numero_compte,
					        ':date'=>$date,
						    ':heure'=>$heure,
						    ':etat'=>$etat,
							':status'=>$status,
						    ':logo'=>$log
						  ));
  
	  
  }















?>