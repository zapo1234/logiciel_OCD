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
		     echo'<body onload="alert(\'OCD ne vous reconnais pas  , vous n\'avez pas acces a la page \')">';
	           echo'<meta http-equiv = "refresh" content="0; URL= login_user_ocd.php">';
		}
	}
}

  $req=$bds->query('SELECT id_chambre FROM chambre');
  $donnees= $req->fetch();
  $id_chambre = rand(1,10000000);
  
  $rel=$bdd->prepare('SELECT permission,society,code,id_visitor FROM inscription_client WHERE email_user= :email_user');
    $rel->execute(array(':email_user'=>$_SESSION['email_user']));
	$donns =$rel->fetch();
 
if(isset($_POST['ids']) AND isset($_POST['nums']) AND isset($_POST['num']) AND $donnees['id_chambre']!=$id_chambre) {
	
	$ids=html_entity_decode($_POST['ids']);
	$nums=$_POST['nums'];
    $num=$_POST['num'];// nombre de personne 
    if($num==1){
      $icons = '<i class="far fa-user"></i>';
    }
    elseif($num==2){
     $icons='<i class="far fa-user"></i> <i class="far fa-user"></i>';

    }
	
	elseif($num==3){

       $icons='<i class="far fa-user"></i> <i class="far fa-user"></i> <i class="far fa-user"></i>';
     }
	 
	 else{
		 
		 $icons='<i class="far fa-user"></i> <i class="far fa-user"></i> <i class="far fa-user"></i> plus de 3 personnes'; 
	 }

	
	$infos=html_entity_decode(trim($_POST['infos']));
	// type de logement
	$types = $_POST['type'];
	$typs = $_POST['typs'];
	
	$site = $_POST['site'];
	if(empty($site)){
	$site =0;
	}
	else{
	$site = $_POST['site'];
	}
	
	if(!isset($typs)){
	  $typs="";
	}
	
	if(!empty($typs)){
		$type=$_POST['typs'];
		
	}

	
	
	 if($types == 1){
		$type ="chambre single";
	}
	elseif($types == 2){
		
		$type="chambre double";
	}
	
	elseif($types == 3){
		$type="chambre triple";
	}
	
	elseif($types == 4) {
		$type ="chambre twin";
	}
	elseif($types == 5){
		$type ="chambre standard";
	}
	
	elseif($types == 6){
		$type ="studio double";
	}
	
	elseif($types == 7){
		
		$type ="sutdio double";
	}
	
	elseif($types == 8){
		$type ="appartement meublé";
		
	}
	
	else{
		$types = $typs;
	}
	$second_type =html_entity_decode($_POST['typs']);
	
	// cout du locale
	$price_days  = $_POST['cout'];
	$prices_time = $_POST['couts'];
	if(empty($prices_time)){
		$prices_time = 0;
	}
	
	else{
	$prices_time;
	}
	$email_ocd = $_SESSION['email_ocd'];
	
	
	// fichier à upload
	$files=$_FILES['fil']['name'];	

    if(!empty($_POST['ch']) AND !empty($_POST['choix'])){
    $equipement = implode(", ", $_POST['ch']);
	}
	else{
		$equipement="";
	}
	
	if(!empty($_POST['choix'])) {
	$equipements = implode(", ", $_POST['choix']);	
	}
	else {
		$equipements="";
	}
	
	  if($_POST['num'] <0) {
		echo'un nombre positif requis';
	}
	
	elseif($_POST['nums']<0) {
		echo' un nombre positif requis';
	}
	
	else {
		
		$active ="on";
		// insere les données dans la base de données dans la base de donnes chambres
		
		$code = $site;
		$society = trim(strip_tags($_POST['societ']));
		$id_visitor = $donns['id_visitor'];
		$rey=$bds->prepare('INSERT INTO chambre(id_chambre,chambre,email_ocd,type_logement,cout_nuite,cout_pass,occupant,nombre_lits,equipement,equipements,infos,icons,types,active,codes,society,id_visitor) VALUES(:id_chambre,:chambre,:email_ocd,:type_logement,:cout_nuite,:cout_pass,:occupant,:nombre_lits,:equipement,:equipements,:infos,:icons,:types,:active,:codes,:society,:id_visitor)');
	     $rey->execute(array(':id_chambre'=>$id_chambre,
		                   ':chambre'=>$ids,
					      ':email_ocd'=>$email_ocd,
						  ':type_logement'=>$type,
						  ':cout_nuite'=>$price_days,
						  ':cout_pass'=>$prices_time,
						  ':occupant'=>$nums,
						  ':nombre_lits'=>$num,
						  ':equipement'=>$equipement,
						  ':equipements'=>$equipements,
						  ':infos'=>$infos,
                          ':icons'=>$icons,
						  ':types'=>$types,
						  ':active'=>$active,
						  ':codes'=>$code,
						  ':society'=>$society,
						  ':id_visitor'=>$id_visitor
						  ));
						  
		// enregsitrer les images correspondant à la chambre
		
		// traitement des fichier en boucles pour la grille 
		
		for($count =0; $count < 7; $count++) {
    if(!empty($_FILES['fil']['name'][$count]) AND $_FILES['fil']['error'][$count]==0){
	 
		$infosfichier=pathinfo($_FILES['fil']['name'][$count]);
         $extension_upload= $infosfichier['extension'];
        $type_extension = array('png', 'gif', 'jpg', 'jpeg','PNG','JPG');
		if($_FILES['fil']['size'][$count]>2000000) {
	   echo'<div class="up">fichier trop lourd</div>';
	   }
	   elseif(!in_array($extension_upload,$type_extension)) {
	
	   echo'<div class="ups">l\'extension du fichier n\'est pas autorisée(format png,jpeg,jpg)</div>';
     }
	 else{
		 // on instruis un nom du fichier
	    $nvname = rand(1000,10000000) . '.' . $extension_upload;
        $paths= "reservation/upload_image/".$nvname;
		// copiez le fichier vers paths
		copy($_FILES['fil']['tmp_name'][$count],$paths);
		// enregsitrer l'image dans le chemin souhaiter
       $path= "upload_image/" . $nvname;
	   move_uploaded_file($_FILES['fil']['tmp_name'][$count],$path);	
	  // on enregistre
	
		 // inséré les données dans la base de donnnées
		 $ret=$bds->prepare('INSERT INTO photo_chambre (id_chambre,email_ocd,name_upload) VALUES(:id_chambre,:email_ocd,:name_upload)');
	     $ret->execute(array(':id_chambre'=>$id_chambre,
					      ':email_ocd'=>$email_ocd,
						  ':name_upload'=>$nvname
						  ));
						  
	   }

	  }
	 }	// on affiche
		 // on redirige vers la page
             echo'<div class="enre">Votre local: <span class="x">'.$ids.'</span>  à été bien enregsitrée.
		     <div class="dep">...</div></div>';
  
	}
  }
  
  else{
	  echo'valider à nouveau le local';
  }

?>