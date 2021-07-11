<?php
include('connecte_db.php');
include('inc_session.php');


    $reh=$bdd->prepare('SELECT id,email_ocd,email_user,denomination,password,user,numero,permission,user,categories,etat,date,heure,active FROM inscription_client WHERE email_ocd= :email_ocd');
    $reh->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
 
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
   
   $req=$bdd->prepare('SELECT DISTINCT email_ocd,email_user,denomination,adresse,numero_cci,id_entreprise FROM inscription_client WHERE email_ocd= :email_ocd');
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
   $active="off";
   
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
		$rev=$bdd->prepare('INSERT INTO inscription_client(email_ocd,email_user,denomination,adresse,numero_cci,id_entreprise,user,numero,numero1,permission,password,categories,numero_compte,date,heure,etat,status,active,logo) 
		VALUES(:email_ocd,:email_user,:denomination,:adresse,:numero_cci,:id_entreprise,:user,:numero,:numero1,:permission,:password,:categories,:numero_compte,:date,:heure,:etat,:status,:active,:logo)');
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
							':password'=>$pass,
							':categories'=>$categories,
						    ':numero_compte'=>$numero_compte,
					        ':date'=>$date,
						    ':heure'=>$heure,
						    ':etat'=>$etat,
							':status'=>$status,
							':active'=>$active,
						    ':logo'=>$log
						  ));
  
	  
  }
  
  
  if($_POST['action']=="add_user"){
	  
	        echo'<table class="tab">
					<tr>
					<th></th>
					<th>Nom && prénom</th>
					<th>Email_user</th>
					<th>Numéro(télephone)</th>
					<th>Poste</th>
					<th>Action</th>
					<th>Status(accès)</th>
					<th>Online(user)</th>
					</tr>';
					while($donnees=$reh->fetch()){
					
					if($donnees['active']=="off"){
					$active='<button type="button" class="bl" data-id3="'.$donnees['id'].'" title="activer le user">bloqué</button>';
					}
					
					else{
						$active='<button type="button" class="acs" data-id4="'.$donnees['id'].'" title="désactiver le user">ouvert</button>';
				   }
				   
				   if($donnees['etat']=="connecte"){
					   
					  $etat ='<i class="fas fa-circle" style="font-size:12px;color:#3DEA29"></i>  en ligne';
				   }
				   
				   else{
					   
					   $etat ='<span class="dert">connecté depuis le'.$donnees['date'].', à '.$donnees['heure'].'</span>';
				   }
					echo'<tr>
					<td><i class="far fa-user" style="font-size:15px;color:#4e73df"></i></td>
					<td>'.$donnees['user'].' </td>
					<td>'.$donnees['email_user'].' </td>
					<td>'.$donnees['numero'].'</td>
					<td>'.$donnees['categories'].' </td>
					<td><a href="gestion_parameter_data.php?user='.$donnees['id'].'"  title="modifier"><i class="fas fa-pencil-alt" font-size:15px;color:#2481CE"></i></a>
					    <a href="#" data-id2='.$donnees['id'].' class="delete" title="suprimer"><i class="fas fa-trash" style="font-size:15px;color:#DC440F"></i></a></td>
						<td>'.$active.'</td>
						<td>'.$etat.'</td>
					</tr>';
					}
					echo'</table>';
					
	    }
  
  if($_POST['action']=="delete"){
	  
	$id =$_POST['id'];
     echo'<div class="enre"><div><i class="fas fa-check-circle" style="color:green;font-size:16px;"></i>  L\'utilisateur à été suprimé !
		     <div class="dep"><i style="font-size:40px;color:white" class="fa">&#xf250;</i></div></div>';
     // surprimer le la ligne 
     $res = $bdd->prepare('DELETE FROM inscription_client WHERE id= :id AND email_ocd= :email_ocd');
     $res->execute(array(':id'=>$id,':email_ocd'=>$_SESSION['email_ocd'])); 
      
   }

  if($_POST['action']=="edit"){
	
	// supprimer 
   $id=$_POST['id'];
   $req=$bdd->prepare('SELECT id,email_ocd,email_user,denomination,password,user,numero,permission,user,categories,numero,status FROM inscription_client WHERE email_ocd= :email_ocd AND id= :id');
   $req->execute(array(':email_ocd'=>$_SESSION['email_ocd'],
                       ':id'=>$id
					  ));
  $donnees = $req->fetch();
  $user = $donnees['user'];
  
					  
         echo'<form method="post" id="form3" action="">
                   		
                    <h2>Modifier les données de ce utilisateur</h2>
					<div class="form-row">
                    <div class="col">
                       <label>Nom </label><br/><input type="text" class="form-control" id="noms" name="noms" value="'.$donnees['user'].'" required>
                      <br/><span class="noms"></span></div>
                    </div>
				 
				 <div class="form-row">
                    <div class="col">
                       <label>Numéro télephone</label><br/><input type="text" id="nums" name="nums" class="form-control" value="'.$donnees['numero'].'" placeholder="numero">
                      <br/><span class="nums"></span></div>
                    <div class="col">
                    <br/><select id="roles" name="roles" required>
                   <option value="'.$donnees['status'].'">'.$donnees['categories'].'</option>
                 <option value="1">Dirigeant</option>
				 <option value="2">Responsable</option>
                  <option value="3">Gestionnaire</option>
                  <option value="4">Réceptionniste(caisse)</option>
               </select>
                    <br/><span class="roles"></span></div>
				 
                 </div>
				 
				 <div class="form-row">
                    <div class="col">
                       <label>Email(utilisé)</label><br/><input type="text" id="emais" name="emais" class="form-control" value="'.$donnees['email_user'].'" required><br/>
					   <span class="emais"></span>
                      </div>
                    <div class="col">
                   <label>Nouveau mot de pass</label> <input type="password" id="pas" name="pas" class="form-control">
                    <br/><span class="pas"></span></div>
				   <input type="hidden" name="ids" value="'.$donnees['id'].'">
                  </div>
				 <div class="form-row">
                    <div class="col">
                       <input type="button" id="modifier" value="Modifier">
                      </div>
                 </div>
				 </form>';
		}
		
	
 if($_POST['action']=="bloquer"){
	$id=$_POST['id']; 
	$active="on";
    // Actualiser des données les données dans la base de données inscription_client
   // on modifie les données de la base de données guide
        echo'<div class="enre"><div><i class="fas fa-check-circle" style="color:green;font-size:16px;"></i> ce compte à été activé !
		     <div class="dep"><i style="font-size:40px;color:white" class="fa">&#xf250;</i></div></div>'; 
		 
		 $ret=$bdd->prepare('UPDATE inscription_client SET active= :ac  WHERE id= :id AND email_ocd= :email_ocd');
        $ret->execute(array(':ac'=>$active,
		                    ':id'=>$id,
                            ':email_ocd'=>$_SESSION['email_ocd']
					 ));	
	 }
 
  if($_POST['action']=="acces"){
	 
	 $id =$_POST['id'];
	 // Actualiser des données les données dans la base de données inscription_client
   // on modifie les données de la base de données guide
        echo'<div class="enre"><div><i class="fas fa-check-circle" style="color:green;font-size:16px;"></i> Ce compte à été bloqué !
		     <div class="dep"><i style="font-size:40px;color:white" class="fa">&#xf250;</i></div></div>';
		
		$active="off";
         $ret=$bdd->prepare('UPDATE inscription_client SET  active= :ac  WHERE id= :id AND email_ocd= :email_ocd');
        $ret->execute(array(':ac'=>$active,
		                    ':id'=>$id,
                            ':email_ocd'=>$_SESSION['email_ocd']
					 ));
	 
	 }
	 
	 
	if($_POST['action']=="modipass") {
	
    // Actualiser des données les données dans la base de données inscription_client
   // on modifie les données de la base de données guide
        echo'<div class="enre"><div><i class="fas fa-check-circle" style="color:green;font-size:16px;"></i>Mot de pass crée !
		     <div class="dep"><i style="font-size:40px;color:white" class="fa">&#xf250;</i></div></div>';
		
		$password =$_POST['pass'];  
	  // hash sur le mot de pass
	  $options = [
      'cost' => 12 // the default cost is 10
     ];

    $hash = password_hash($password, PASSWORD_BCRYPT, $options);
	
         $ret=$bdd->prepare('UPDATE inscription_client SET  password= :pass  WHERE  email_user= :email_user');
        $ret->execute(array(':pass'=>$hash,
                            ':email_user'=>$_SESSION['email_user']
					 ));	
		
		}

if($_POST['action']=="editvalidate"){
	  $ids = $_POST['ids'];
     	$password =$_POST['password'];  
	  // hash sur le mot de pass
	  $options = [
      'cost' => 12 // the default cost is 10
   ];

  $hash = password_hash($password, PASSWORD_DEFAULT, $options);
	
	 // recupére les variables
	  $noms =$_POST['noms'];
	  $nums =$_POST['nums'];
	  $roles =$_POST['roles'];
	  $prenom =$_POST['prenom'];
	  $email =$_POST['emais'];
	  
	  if($roles==1){
	 $status=1;
     $categories="dirigeant";
     $permission ="user:boss";	 
	}
   elseif($roles==2){
	  $status=2;
     $categories="Responsable";
     $permission ="user:boss";	 
   }
   
   elseif($roles==3){
	 $status=3;
     $categories="Gestionnaire";
     $permission ="user:gestionnaire";  
	}
   
   else{
	 $status=4;
     $categories="Receptionniste";
     $permission ="user:employes";  
   }
	  // Actualiser des données les données dans la base de données inscription_client
   // on modifie les données de la base de données guide
        echo'<div class="enre"><div><i class="fas fa-check-circle" style="color:green;font-size:16px;"></i>Vos données sont modifiées !
		     <div class="dep"><i style="font-size:40px;color:white" class="fa">&#xf250;</i></div></div>';
	  // modifier les valeurs dans la table
	  
	  $ret=$bdd->prepare('UPDATE inscription_client SET email_user = :email, user:us, numero= :num, password= :pass, permission= :perm, categories= :cat, status= :stat   WHERE id= :id AND email_ocd= :email_ocd');
       $ret->execute(array(':email'=>$email,
	                       ':us'=>$noms,
						   ':num'=>$numero,
						   ':pass'=>$hash,
						   ':perm'=>$permission,
						   ':cat'=>$categories,
						   ':stat'=>$status,
                            ':email_ocd'=>$_SESSION['email_ocd']
					 ));	
	  
 }











?>