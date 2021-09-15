<?php
include('connecte_db.php');
include('inc_session.php');

 $record_peage=20;
$page="";

if(isset($_POST['page'])){
$page = $_POST['page'];
}

else {

$page=1;	
	
}

$smart_from =($page -1)*$record_peage;

// recupère les dates  par ordre croissant 
  // emttre la requete sur le fonction
  
   // recuperer la permission pour afficher le checkout
   	// emttre la requete sur le fonction
    $rel=$bdd->prepare('SELECT  permission,society,code FROM inscription_client WHERE email_user= :email_user');
    $rel->execute(array(':email_user'=>$_SESSION['email_user']));
	$donns =$rel->fetch();
  
  
    if($donns['permission']=="user:boss"){
	if(!isset($_GET['data_id'])){
	$req=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,equipements,equipement,cout_nuite,cout_pass,icons,infos,active,society FROM chambre WHERE  email_ocd= :email_ocd LIMIT '.$smart_from.','.$record_peage.'');
    $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
	}
	
	elseif($_GET['data_id']=="tous"){
		$req=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,equipements,equipement,cout_nuite,cout_pass,icons,infos,active,society FROM chambre WHERE  email_ocd= :email_ocd LIMIT '.$smart_from.','.$record_peage.'');
       $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
	}
	
	else{
		
		$req=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,equipements,equipement,cout_nuite,cout_pass,icons,infos,active,society FROM chambre WHERE code= :code AND  email_ocd= :email_ocd LIMIT '.$smart_from.','.$record_peage.'');
    $req->execute(array(':code'=>$_GET['data_id'],
	                    ':email_ocd'=>$_SESSION['email_ocd']));
	   }
		}
		
		else{
	$session=$donns['code'];
	$req=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,equipements,equipement,cout_nuite,cout_pass,icons,infos,active,society FROM chambre WHERE code= :code AND email_ocd= :email_ocd LIMIT '.$smart_from.','.$record_peage.'');
    $req->execute(array(':code'=>$session,
	                    ':email_ocd'=>$_SESSION['email_ocd']));
		}
	$don = $req->fetchAll();
	$arr = [];
	
   // transformez les données en chaine de caractère
   $id_local = implode(',',$arr);
  
      $sql=$bds->prepare('SELECT chambre.id_chambre, chambre.type_logement,  home_occupation.date, home_occupation.dates
      FROM home_occupation
      INNER JOIN chambre ON chambre.id_chambre = home_occupation.id_local WHERE
	  chambre.email_ocd= :email');
	  $sql->execute(array(':email'=>$_SESSION['email_ocd']));
	  
	  $tt=$sql->fetchAll();
	  foreach($tt as $val){
		  echo $val['dates'];
	  }
	
	foreach($don as $donnees) {
	if($_SESSION['code']==0){
	$rec=$bds->query('SELECT id_local,date,dates,type FROM home_occupation WHERE   id_local="'.$donnees['id_chambre'].'"');
	}
	
	else{
		$rec=$bds->query('SELECT id_local,date,dates,type FROM home_occupation WHERE code="'.$_SESSION['code'].'" AND  id_local="'.$donnees['id_chambre'].'"');
	}
    $donns = $rec->fetchAll();
	 $array = [];
	 $tab = [];
	 $date =[];
	 $bloque =[];
	 $reser =[];
	foreach($donns as $datas) {
		
		if($datas['type']!=0){
		//pour sejour ou réservation
		if($datas['type']==1 OR $datas['type']==3){
		$data = $datas['date'];
		$dat = explode(',',$data);
		// pour les sejours et réservation
		foreach($dat as $value){
		$array[] = $value;		
	    }
		}
		// recuperer seulement les reservation
		if($datas['type']==3){
			$rese = $datas['date'];
		   $reses = explode(',',$rese);
		   foreach($reses as $res){
		     $reser[] = $res;	
		  }
		}
		// pour le pass.
		if($datas['type']==2){
		// pour les heures en date
		$datos =$datas['date'];
		// pour les jours en date
		$datis =$datas['dates'];
		
		$dats = explode(',',$datos);
		$da = explode(',',$datis);
		// pour les dates en heures
		foreach($dats as $values){
		$tab[] = $values;		
	   }
	   
	   // pour les dates en jours
	   foreach($da as $valus){
		$date[] = $valus;		
	   }
		
	  }
	  
	  if($datas['type']==5){
		$df =$datas['dates'].',';
        $df = explode(',',$df);
        foreach($df as $valu){
         $bloque[]= $valu;
        }			
		  
	  }
	 }
	}
	
	$nombre = count($array);// pour le sejour et réservation
	$nombres = count($tab);// pour les horaires
	$nombr = count($date);//
	$nom = count($bloque);//pour les chambres bloquées
	$rest = count($reser);
	// recuperer les valeurs des données de la table facture correspondant;
	// recupere les données des valeurs min du tableau
	// aller recupere le client qui as le checkin min de array reser
    // pour les séjour et réservation
	// recupére la date passé en paramètre
	$date =$_GET['data'];
	$date = explode('-',$date);

	$j = $date[2];
	$mm = $date[1];
	$an = $date[0];
	// recupération des variable $_GET date et jours
	$date_english = $j.'-'.$mm.'-'.$an;
	$heure =$_GET['home_heure'];
	if($nombre!=0){		
    // recupéré les valeurs max et min des tableau
	$debut = min($array);
	$sortie = max($array);
	
	// convertion des dates 
	
	$dates1 = explode('-',$debut);
	$j = $dates1[2];
	$mm = $dates1[1];
	$an = $dates1[0];
	
	$dates2 = explode('-',$sortie);
	$j1 = $dates2[2];
	$mm1 = $dates2[1];
	$an1 = $dates2[0];
	
   // on recupére le premier et la dernier date
    // si le client est facturé sur un séjour ou reservation
	if($debut <= $date_english AND $date_english <= $sortie AND in_array($date_english,$array)) {
	$color ='occupe';
	$status ='un client est présent dans le local,<br/>il sera disponible à partir<br/> du <span class="dt">'.$j1.'/'.$mm1.'/'.$an1.'<br/></span><span class="dry"><i class="fas fa-user-friends" style="font-size:18px;"></i></span>';	
	
	}
	
	
	// if le local est réserve
	elseif($date_english < $debut){
	$color ='reserve';
	$status ='le local est réservé, et sera occupé <br/> à partir du <span class="dt">'.$j.'/'.$mm.'/'.$an.'</span>';
	}

	else{
		$color='libre';
		$status ='le local est disponible';
      }
     }
	
	 if($nom!=0){
		$color='bloque';
		$status ='le local est bloqué temporairement<br/><span class="drt"><i class="fas fa-minus-circle" style="font-size:16px;padding-left:70%;"></span></i></span>';
	}
	
	if($nombres!=0){
	// recupéré les valeurs max et min des tableau
	$debuts = min($tab);
	$sorties = max($tab);
	//
	if(in_array($heure,$tab) AND in_array($date_english,$date)){
		// verification pour le cas des sejours pass
	    $color='occupe';
		$status ='le client fait un pass présentement';
	}
	elseif($debuts < $date_english AND $date_english < $sorties AND in_array($date_english,$date)){
		// verification pour le cas des sejours pass
	    $color='occupe';
		$status ='le client fait un pass présentement';
	}
  }
  
	
     if($nombre==0 AND $nombr==0 AND $nombres==0 AND $nom==0){
		$color='libre';
		$status ='le local est disponible';
   }
     if($donnees['society']==""){
		$map="";
	 }
	else{
	   $map='<img src="img/map.png" alt="map" width="15px" height="15px" />
	      '.$donnees['society'].' ';
	 }
	 echo'<div><a href="view_data_home.php?home='.$donnees['id_chambre'].'"><div class="homes" id="home'.$color.'">
		      <h3>'.$donnees['type_logement'].'</h3>
			  <div class="titre">'.$donnees['chambre'].'</div>
			  <div class="dt">'.$status.'</div><br/><br/>
			  <div style="font-size:14px;"> '.$map.'</div>
		     </div></a></div>';	
	
	}

   	// on compte le nombre de ligne de la table
	if(!isset($_GET['data_id'])){
   $reg=$bds->prepare('SELECT count(*) AS nbrs FROM chambre WHERE email_ocd= :email_ocd');
   $reg->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
	}
	
	elseif($_GET['data_id']=="tous"){
	$reg=$bds->prepare('SELECT count(*) AS nbrs FROM chambre WHERE email_ocd= :email_ocd');
   $reg->execute(array(':email_ocd'=>$_SESSION['email_ocd']));	
   }
	else{
	  $reg=$bds->prepare('SELECT count(*) AS nbrs FROM chambre WHERE code= :code AND email_ocd= :email_ocd');
	  $reg->execute(array(':code'=>$_GET['data_id'],
	                      ':email_ocd'=>$_SESSION['email_ocd']));
	}
    
   $dns=$reg->fetch();
   $totale_page=$dns['nbrs']/$record_peage;
   $totale_page = ceil($totale_page);
   echo'<div style="clear:both"></div>';
   echo'<div class="pied_function">';
   for($i=1; $i<=$totale_page; $i++) {
	   
	   echo'<div class="pied_page" style="cursor:pointer"><button class="bout" id="'.$i.'">'.$i.'</div>';
    }
    
	echo'</div>';

?>	