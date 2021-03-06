<?php
include('connecte_db.php');
include('inc_session.php');

   if($_SESSION['code']==0){
    $reh=$bdd->prepare('SELECT id,email_ocd,email_user,denomination,password,user,numero,permission,user,society,categories,etat,date,heure,active,logo FROM inscription_client WHERE email_ocd= :email_ocd');
    $reh->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
   }
    else{
		$reh=$bdd->prepare('SELECT id,email_ocd,email_user,denomination,password,user,numero,permission,user,society,categories,etat,date,heure,active,logo FROM inscription_client WHERE code= :cd AND email_ocd= :email_ocd');
       $reh->execute(array(':cd'=>$_SESSION['code'],
	                       ':email_ocd'=>$_SESSION['email_ocd']));
		}
   
     if($_POST['action']=="fetch"){
		 
		 // requete pour aller chercher les valeurs 
   $home = $_GET['home'];
  // emttre la requete sur le fonction
    $req=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,occupant,nombre_lits,equipements,equipement,cout_nuite,cout_pass,icons,infos,types,active FROM chambre WHERE id_chambre= :id_chambre AND email_ocd= :email_ocd');
    $req->execute(array(':id_chambre'=>$home,
	                    ':email_ocd'=>$_SESSION['email_ocd']
						));
    $data = $req->fetch();
		 
				   echo'<div id="der15">';
					if($data['active']=="on"){
					 echo'<h4>Bloquer toutes actions sur ce local</h4>
					 <div><button class="acces" data-id1="'.$_GET['home'].'">Bloquer l\'accès</button></div>';
					}
					else{
						echo'<h4>Activez l\'accès du local</h4>
					  <div><button class="access" data-id2="'.$_GET['home'].'">Activer l\'accès</button></div>';
					}
					echo'</div>'; 
		}
 // modifie le type de la chambre dans la base de données table chambre
 if($_POST['action']=="acess"){
	 $id = $_POST['id'];
	 $num =2;
	 // on modifie les données de la base de données guide
         $ret=$bds->prepare('UPDATE chambre SET types= :res WHERE email_ocd= :email_ocd AND id_chambre= :id_chambre');
        $ret->execute(array(':res'=>$num,
		                    ':id_chambre'=>$id,
                            ':email_ocd'=>$_SESSION['email_ocd']
							
							));
	    }
		
   if($_POST['action']=="access"){
	 $id = $_POST['id'];
	 $num =1;
	 // on modifie les données de la base de données guide
         $ret=$bds->prepare('UPDATE chambre SET types= :res WHERE email_ocd= :email_ocd AND id_chambre= :id_chambre');
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
   // on recupére les données de la table 
   $req=$bdd->prepare('SELECT email_ocd,email_user,email_society,denomination,adresse,numero_cci,id_entreprise,logo FROM inscription_client WHERE email_user= :email_user');
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
   $email_society=$donnees['email_society'];
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
	   $rev=$bdd->prepare('INSERT INTO inscription_client(email_ocd,email_user,email_society,denomination,adresse,numero_cci,id_entreprise,user,numero,numero1,permission,password,categories,numero_compte,code,society,societys,date,heure,etat,status,active,logo,id_visitor,token_pass) 
		VALUES(:email_ocd,:email_user,:email_society,:denomination,:adresse,:numero_cci,:id_entreprise,:user,:numero,:numero1,:permission,:password,:categories,:numero_compte,:code,:society,:societys,:date,:heure,:etat,:status,:active,:logo,:id_visitor,:token_pass)');
	     $rev->execute(array(':email_ocd'=>$_SESSION['email_ocd'],
		                     ':email_user'=>$email,
							':email_society'=>$email_society,
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
  }
    // afficher les users comptes
  if($_POST['action']=="add_user"){
	         echo'<table id="tab">
					<tr class="tab">
					<th></th>
					<th>Nom && prénom</th>
					<th>Email_user</th>
					<th>Numéro(télephone)</th>
					<th>Poste</th>
					<th>Lieux d\'excercice</th>
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
				   if($donnees['permission']=="user:boss"){
					  $sup=""; 
				   }
				   else{
					   $sup= '<a href="#" data-id2='.$donnees['id'].' class="delete" title="suprimer"><i class="fas fa-trash" style="font-size:15px;color:#DC440F"></i></a></td>';
				   }
				   echo'<tr class="tab">
					<td><i class="far fa-user" style="font-size:15px;color:#4e73df"></i></td>
					<td>'.$donnees['user'].' </td>
					<td>'.$donnees['email_user'].' </td>
					<td>'.$donnees['numero'].'</td>
					<td>'.$donnees['categories'].' </td>
					<td>'.$donnees['society'].'</td>
					<td><a href="gestion_parameter_data.php?user='.$donnees['id'].'"  title="modifier"><i class="fas fa-pencil-alt" font-size:15px;color:#2481CE"></i></a>
					    '.$sup.'
						<td>'.$active.'</td>
						<td>'.$etat.'</td>
					</tr>';
			// pour affichage mobile
            echo'<div id="mobile">';		
			echo'<div class="mobile" style="font-size:15px">
		     <div>'.$donnees['user'].' Numéro:'.$donnees['numero'].'<br/>'.$etat.'</div><br/>
			 <div style="color:#4e73df;">'.$donnees['categories'].'</div>
		     <div class="df">'.$active.' <a href="gestion_parameter_data.php?user='.$donnees['id'].'"  title="modifier"><i class="fas fa-pencil-alt" font-size:15px;color:#2481CE"></i></a>  '.$sup.'</div>
		    </div>
			</div>';
					
					}
					echo'</table>';
		}
  
  // suprimer des users comptes
  if($_POST['action']=="delete"){
	  
	$id =$_POST['id'];
     echo'<div class="enre"><div><i class="fas fa-check-circle" style="color:green;font-size:16px;"></i>  L\'utilisateur à été suprimé !
		     <div class="dep"><i style="font-size:40px;color:white" class="fa">&#xf250;</i></div></div>';
     // surprimer le la ligne 
     $res = $bdd->prepare('DELETE FROM inscription_client WHERE id= :id AND email_ocd= :email_ocd');
     $res->execute(array(':id'=>$id,':email_ocd'=>$_SESSION['email_ocd'])); 
      
   }
   // modifier des users compte
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
	  // on modifie les données de la base de données guide
        echo'<div class="enre"><div><i class="fas fa-check-circle" style="color:green;font-size:16px;"></i>Vos données sont bien modifiées !
		     <div class="dep"><i style="font-size:40px;color:white" class="fa">&#xf250;</i></div></div>';
		
	 $ret=$bdd->prepare('UPDATE inscription_client SET email_user= :email, user= :us, numero1= :num, password= :pass, permission= :perm, categories= :cat, status= :stat   WHERE id= :id AND email_ocd= :email_ocd');
       $ret->execute(array(':email'=>$email,
	                       ':us'=>$noms,
						   ':num'=>$nums,
						   ':pass'=>$hash,
						   ':perm'=>$permission,
						   ':cat'=>$categories,
						   ':stat'=>$status,
						   ':id'=>$ids,
                           ':email_ocd'=>$_SESSION['email_ocd']
					 ));	
	  
 echo'<meta http-equiv="Refresh" content="4; url=https://connect.ocdgestion.com/gestion_parameter_datas.php"/>';
 }
 if($_POST['action']=="bloquer"){
	 $active="off";
	 $id=$_POST['id'];
    //modifier la permission	 
	  $ret=$bdd->prepare('UPDATE inscription_client SET  active= :act  WHERE  id= :ids');
        $ret->execute(array(':act'=>$active,
		                    ':ids'=>$id
					 ));
	    // on modifie les données de la base de données guide
        echo'<div class="enre"><div><i class="fas fa-check-circle" style="color:green;font-size:16px;"></i>vous avez bloqué l\'accès !</div>';
	}
   if($_POST['action']=="acces"){
	 $active="on";
	 $id=$_POST['id'];
    //modifier la permission	 
	  $active="on";
    //modifier la permission	 
	  $ret=$bdd->prepare('UPDATE inscription_client SET  active= :act  WHERE  id= :ids');
        $ret->execute(array(':act'=>$active,
		                    ':ids'=>$id
					 )); 
	// on modifie les données de la base de données guide
        echo'<div class="enre"><div><i class="fas fa-check-circle" style="color:green;font-size:16px;"></i>vous avez activé l\'accès du local !</div>';
	}
// activer l'active sur un local
 if($_POST['action']=="accs"){
	
   $id =$_POST['id'];
   $active="off";
   // Actualiser des données les données dans la base de données inscription_client
   // on modifie les données de la base de données guide
     $id_fact=0;
     $date="";
     $horaires="";
     $active="off";
     $datas_fren="";
	 $dates="";
     $activ=5;
     $code=$_SESSION['code'];		 
		
	  $ret=$bds->prepare('UPDATE chambre SET  active= :act  WHERE id_chambre= :id AND email_ocd= :email_ocd');
        $ret->execute(array(':act'=>$active,
		                    ':id'=>$id,
                            ':email_ocd'=>$_SESSION['email_ocd']
					 ));
		// inserer dans la table home_occupation
		// on recupére les date dans la base de donnnées.
	     $reys=$bds->prepare('INSERT INTO home_occupation (id_local,email_ocds,date,date_french,dates,id_fact,type,code,id_visitor) 
	   VALUES(:id_local,:email_ocds,:date,:date_french,:dates,:id_fact,:type,:code,:id_visitor)');
		 $reys->execute(array(':id_local'=>$id,
		                      ':email_ocds'=>$_SESSION['email_ocd'],
		                      ':date'=>$horaires,
							  ':date_french'=>$datas_fren,
							  ':dates'=>$dates,
							  ':id_fact'=>$id_fact,
							  ':type'=>$activ,
							  ':code'=>$code,
							  ':id_visitor'=>$_SESSION['id_visitor']
	                        ));	

        echo'<div class="enre"><div><i class="fas fa-check-circle" style="color:green;font-size:16px;"></i> le local à été bloqué !
		     <div class="dep"><i style="font-size:40px;color:white" class="fa">&#xf250;</i></div></div>';
	}
// actionner   les actions sur un local
 if($_POST['action']=="acss"){
  $id =$_POST['id'];
   $active ="on";
  $types =5;
	// Actualiser des données les données dans la base de données inscription_client
   // on modifie les données de la base de données guide
        echo'<div class="enre"><div><i class="fas fa-check-circle" style="color:green;font-size:16px;"></i> le local à eté activé !
		     <div class="dep"><i style="font-size:40px;color:white" class="fa">&#xf250;</i></div></div>';
		
  $ret=$bds->prepare('UPDATE chambre SET  active= :act  WHERE id_chambre= :id AND email_ocd= :email_ocd');
        $ret->execute(array(':act'=>$active,
		                    ':id'=>$id,
                            ':email_ocd'=>$_SESSION['email_ocd']
					 ));
					 
	// supprimer l'entrée de la chambre
	$res =$bds->prepare('DELETE FROM home_occupation WHERE id_local= :id AND type= :ty AND email_ocds= :email_ocd');
	$res->execute(array(':id'=>$id,
	                    ':ty'=>$types,
						':email_ocd'=>$_SESSION['email_ocd']
						));
	
	}
	if($_POST['action']=="zoom"){
	   $id=$_POST['id'];
	   $home =$_GET['home'];
	   // afficher l'image en cours
	   $req=$bds->prepare('SELECT name_upload FROM photo_chambre WHERE email_ocd= :email_ocd AND id= :id AND id_chambre= :ids');
       $req->execute(array(':email_ocd'=>$_SESSION['email_ocd'],
                       ':id'=>$id,
					   ':ids'=>$home
					  ));
		$donnees=$req->fetch();
		echo'<img src="upload_image/'.$donnees['name_upload'].'" width="1000px" height="600px">';
	   $req->closeCursor();
   }

?>