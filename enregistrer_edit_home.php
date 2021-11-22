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

  
 
if(isset($_GET['home']) AND !empty($_GET['home'])) {
	
	$ids=html_entity_decode($_POST['ids']);
	$nums=$_POST['nums'];
    $num=$_POST['num'];// nombre de personne 
    if($num==1){
      $icons='<i class="far fa-user"></i>';
    }
    elseif($num==2){
     $icons='<i class="far fa-user"></i> <i class="far fa-user"></i>';

    }

     elseif($num==3){

       $icons='<i class="far fa-user"></i> <i class="far fa-user"></i> <i class="far fa-user"></i>';
     }
	 
	 else{
		 
		 $icons='<i class="far fa-user"></i> <i class="far fa-user"></i> <i class="far fa-user"></i>plus..';
	 }

	
	$infos=html_entity_decode(trim($_POST['infos']));
	$site = html_entity_decode(trim($_POST['site']));
	// type de logement
	$types = $_POST['type'];
	$typs = $_POST['typs'];
	$second_type =html_entity_decode($_POST['typs']);
	
	if(!empty($typs)){
		$type=$_POST['typs'];
	}
	
	if($types==1){
		$type ="chambre single";
	}
	elseif($types==2){
	$type="chambre double";
	}
	elseif($types==3){
    $type="chambre triple";
	}
	elseif($types==4) {
		$type ="chambre twin";
	}
	elseif($types==5){
		$type ="chambre standard";
	}
	elseif($types==6){
		$type ="studio double";
	}
	elseif($types==7){
	$type ="sutdio double";
	}
	elseif($types==8){
	$type ="appartement meublé";
	}
	else{
		$type = $second_type;
	}
	// cout du locale
	$price_days  = $_POST['cout'];
	$prices_time = $_POST['couts'];
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
		// modifier  les données dans la base de données dans la base de donnes chambres
		$rey=$bds->prepare('UPDATE chambre SET chambre= :chambr, type_logement= :type_logemen, cout_nuite= :cout_nuit,
		cout_pass= :cout_pas, occupant= :occupan, nombre_lits= :nombre_lit, equipement= :equipemen, equipements= :equipement, infos= :info, icons= :icon, society= :sit WHERE id_chambre= :id_chambre');
		$rey->execute(array(':chambr'=>$ids,
						  ':type_logemen'=>$type,
						  ':cout_nuit'=>$price_days,
						  ':cout_pas'=>$prices_time,
						  ':occupan'=>$nums,
						  ':nombre_lit'=>$num,
						  ':equipemen'=>$equipement,
						  ':equipement'=>$equipements,
						  ':info'=>$infos,
                          ':icon'=>$icons,
						  ':sit'=>$site,
						  ':id_chambre'=>$_GET['home']
						  ));
						  
		// enregsitrer les images correspondant à la chambre
		// traitement des fichier en boucles pour la grille 
		for($count =0; $count < 3; $count++) {
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
       $path= "upload_image/" . $nvname;
    // on enregitre dans la fonction
	  move_uploaded_file($_FILES['fil']['tmp_name'][$count], $path);	
		// inséré les données dans la base de donnnées
		 $ret=$bds->prepare('INSERT INTO photo_chambre (id_chambre,email_ocd,name_upload) VALUES(:id_chambre,:email_ocd,:name_upload)');
	     $ret->execute(array(':id_chambre'=>$_GET['home'],
					      ':email_ocd'=>$email_ocd,
						  ':name_upload'=>$nvname
						  ));
		}
	   }
	 }	// on affiche
				echo'<div id="pak"></div>';
				// on redirige vers la page
             echo'<div class="enre">les mofications du local: <span class="x">'.$ids.'</span>  ont étés prise en compte.
		     <div class="dep">...</div></div>';
             echo'<meta http-equiv="Refresh" content="4; url=https://connect.ocdgestion.com/inventaire_gestion_home.php"/>';
        }
      }
  else{
	  echo'valider à nouveau le local';
  }

?>