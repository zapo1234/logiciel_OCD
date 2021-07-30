<?php
include('connecte_db.php');
include('inc_session.php');

   
    // emttre la requete sur le fonction
	$active="on";
    $req=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,equipements,equipement,cout_nuite,cout_pass,icons,infos FROM chambre WHERE email_ocd= :email_ocd AND active= :ac LIMIT 0,9');
    $req->execute(array(':ac'=>$active,
	                    ':email_ocd'=>$_SESSION['email_ocd']));
	
	$don = $req->fetchAll();
	 //// emttre la requete sur le fonction
    //$rec=$bds->query('SELECT id_chambre,date FROM home_occupation');
    //$donns = $rec->fetchAll();
	//$rec->closeCursor();
	
	$rem='<span class="ts"></span>';
	$rt=",";
	$rs='<span class="ts"><i style="font-size:12px" class="fa">&#xf00c;</i></span>';
	
	// on boucle sur les les resultats
       
	echo'<div class="content_home">';
	
	
     foreach($don as $donnees) {
	$rec=$bds->query('SELECT id_chambre,date,dates,type FROM home_occupation WHERE id_chambre="'.$donnees['id_chambre'].'"');
    $donns = $rec->fetchAll();
	 $array = [];
	 $tabs = [];
	 $date=[];
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
		$tabs[] = $values;		
	   }
	   
	   // pour les dates en jours
	   foreach($da as $valus){
		$date[] = $valus;		
	   }
	   
	   // pour les dates en jours
	 }
	}
	}

     $tab = $array;
	 // on verifie le nombre d'élement dans le tableau
	 $nombre = count($array);
	 $nombr = count($tabs);
    
	
	
	if($nombre!=0){	
    $debut = min($array);
    $sortie = max($array);
   // on recupére le premier et la dernier date
    // si le client est facturé sur un séjour ou reservation
	
     if(in_array($_POST['days'],$array)){
      $name='<i class="fas fa-exclamation-circle" style="color:red";></i> indisponible';
		$a="h6";
		$envoi="";
	 }

     if($_POST['days'] < $debut  AND $_POST['das']<$sortie){

       $name='<i class="fas fa-exclamation-circle" style="color:red";></i> indisponible';
		$a="h6";
		$envoi="";

     }		 

     if(in_array($_POST['das'],$array)){

        $name='<i class="fas fa-exclamation-circle" style="color:red;"></i> indisponible';
		$a="h6";
		$envoi="";
	 }
	 
	 
	 if(in_array($_POST['dat'],$array)){

        $name='<i class="fas fa-exclamation-circle" style="color:red;"></i> indisponible';
		$a="h6";
		$envoi="";
	 }
	 
	 if(!in_array($_POST['dat'],$array) AND !in_array($_POST['das'],$array) AND !in_array($_POST['days'],$array)){
	$dates1 = explode('-',$_POST['days']);
	$j = $dates1[2];
	$mm = $dates1[1];
	$an = $dates1[0];
	
	$dates2 = explode('-',$_POST['das']);
	
	$j1 = $dates2[2];
	$mm1 = $dates2[1];
	$an1 = $dates2[0];
	
	// la vairable en envoi
	$envoi='<a href="#" class="add_home" data-id2="'.$donnees['id_chambre'].'" title="facturé le local">Ajouter le local</a>';
   
      
		$name='local disponible du '.$j.'/'.$mm.'/'.$an.' au '.$j1.'/'.$mm1.'/'.$an1.'';
		$a="h5"; 
		 
	 }
	}
	 
	if($nombre==0){
         $dates1 = explode('-',$_POST['days']);
	
	$j = $dates1[2];
	$mm = $dates1[1];
	$an = $dates1[0];
	
	$dates2 = explode('-',$_POST['das']);
	
	$j1 = $dates2[2];
	$mm1 = $dates2[1];
	$an1 = $dates2[0];
	
	// la vairable en envoi
	$envoi='<a href="#" class="add_home" data-id2="'.$donnees['id_chambre'].'" title="facturé le local">Ajouter le local</a>';
   
      
		$name='local disponible du '.$j.'/'.$mm.'/'.$an.' au '.$j1.'/'.$mm1.'/'.$an1.'';
		$a="h5";
	}
	 
	 // si le client est facturé sur une horaire
	 
	 if($nombr==0){
		 $name='local disponible de '.$_POST['tim'].' au '.$_POST['tis'].'';
		 $a="h5";
		 $envoi='<a href="#" class="add_home" data-id2="'.$donnees['id_chambre'].'" title="facturé le local">Ajouter le local</a>'; 
	}
	 
	 if($nombr!=0){
		 $debuts = min($tabs);
           $sorties = max($tabs);
		 
		 if(in_array($_POST['tim'],$tabs) AND in_array($_POST['tis'],$tabs)  AND in_array($_POST['dat'],$date)){

        $name='<i class="fas fa-exclamation-circle" style="color:red";></i> indisponible';
		$a="h6";
		$envoi="";
	 }
	 
      if($debuts < $_POST['tim'] AND $_POST['tim']< $sorties  AND in_array($_POST['dat'],$date)){

        $name='<i class="fas fa-exclamation-circle" style="color:red";></i> indisponible';
		$a="h6";
		$envoi ="";
	 }
	 
	 if(!in_array($_POST['dat'],$date)){
		$name='local disponible de '.$_POST['tim'].' au '.$_POST['tis'].'';
		 $a="h5";
		 $envoi='<a href="#" class="add_home" data-id2="'.$donnees['id_chambre'].'" title="facturé le local">Ajouter le local</a>';
		 
        }
	 
	 if($nombr==0){
		 $name='local disponible de '.$_POST['tim'].' au '.$_POST['tis'].'';
		 $a="h5";
		 $envoi='<a href="#" class="add_home" data-id2="'.$donnees['id_chambre'].'" title="facturé le local">Ajouter le local</a>';
		
		 
	 }
		 
	 }
	
	     echo'<div class="content3">
		     <span class="dc">Type de local :'.$donnees['type_logement'].'</span><br/><span class="df">'.$donnees['chambre'].'</span><br/>
			 <span class="dt">'.str_replace($rt,$rem,$donnees['equipement']).'</span><br/><span class="text"></span>
			 <div class="'.$a.'">'.$name.'</div>
			 <span class="but1"><a href="#" data-id1="'.$donnees['id_chambre'].'" title="voir disponibilité">check</a></span><span class="but2">'.$envoi.'</span>
			 <input type="hidden"  name="hidden_name" id="chambre'.$donnees['id_chambre'].'" value="'.$donnees['chambre'].'">
			 <input type="hidden" id="cout_nuite'.$donnees['id_chambre'].'" value="'.$donnees['cout_nuite'].'">
		     <input type="hidden" id="cout_pass'.$donnees['id_chambre'].'" value="'.$donnees['cout_pass'].'">
			 <input type="hidden" id="chambre'.$donnees['id_chambre'].'" value="'.$donnees['chambre'].'">
			<input type="hidden" id="type'.$donnees['id_chambre'].'" value="'.$donnees['type_logement'].'">
			 </div>';
	
	}
	
  
	
	echo'</div>';

?>