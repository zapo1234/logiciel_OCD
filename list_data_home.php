<?php
include('connecte_db.php');
include('inc_session.php');

   
    // emttre la requete sur le fonction
    $req=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,equipements,equipement,cout_nuite,cout_pass,icons,infos FROM chambre WHERE email_ocd= :email_ocd LIMIT 0,12');
    $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
	
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
	
	
	// on récupére les données
	
	
	foreach($don as $donnees) {
	$rec=$bds->query('SELECT id_chambre,date,dates FROM home_occupation WHERE id_chambre="'.$donnees['id_chambre'].'"');
    $donns = $rec->fetchAll();
	 $array = [];
	foreach($donns as $datas) {
		
		$data = $datas['date'];
		
		$dat = explode(',',$data);
		
		foreach($dat as $value){
		
        $array[] = $value;		
	   
	   }
	}

     $tab = $array;
    $nombre = count($array);	
    $debut = current($array);
    $sortie = end($array);
   
	// on recupére le premier et la dernier date
    // si le client est facturé sur un séjour ou reservation
	 
	 if($_POST['to']=="séjour" OR $_POST['to']=="réservation") {
     if(in_array(($_POST['days']),$array)){

        $name='<i class="fas fa-exclamation-circle" style="color:red";></i> indisponible';
		$a="h6";
	 }

     elseif($_POST['days'] < $debut  AND $_POST['das']> $sortie){

       $name='<i class="fas fa-exclamation-circle" style="color:red";></i> indisponible';
		$a="h6";

     }		 

     elseif(in_array(($_POST['das']),$array)){

        $name='<i class="fas fa-exclamation-circle" style="color:red;"></i> indisponible';
		$a="h6";
	 }
	 

     else{
         $dates1 = explode('-',$_POST['days']);
	
	$j = $dates1[2];
	$mm = $dates1[1];
	$an = $dates1[0];
	
	$dates2 = explode('-',$_POST['das']);
	
	$j1 = $dates2[2];
	$mm1 = $dates2[1];
	$an1 = $dates2[0];
   
        $name='local disponible du '.$j.'/'.$mm.'/'.$an.' au '.$j1.'/'.$mm1.'/'.$an1.'';
		$a="h5";
	 }	 
    
	 }
	 
	 // si le client est facturé sur une horaire
	 
	 if($_POST['to']=="horaire"){
		 
		 
		 if(in_array(($_POST['tim']),$array) AND  in_array(($_POST['tis']),$array) AND $donns['dates']==$_POST['dat']){

        $name='<i class="fas fa-exclamation-circle" style="color:red";></i> indisponible';
		$a="h6";
	 }

     elseif(in_array(($_POST['dat']),$array)){

        $name='<i class="fas fa-exclamation-circle" style="color:red;"></i> indisponible';
		$a="h6";
	 }
	 
	 else{
		 
		 $name='local disponible de '.$_POST['tim'].' au '.$_POST['tis'].'';
		$a="h5";
		 
		 
	 }
		 
	 }
	
	     echo'<div class="content3">
		     <span class="dc">Type de local :'.$donnees['type_logement'].'</span><br/><span class="df">'.$donnees['chambre'].'</span><br/>
			 <span class="dt">'.str_replace($rt,$rem,$donnees['equipement']).'</span><br/><span class="text">Prix négocié(nuité)<input type="number"  class="prix" id="prix'.$donnees['id_chambre'].'"></span>
			 <span class="tex">Prix négocié(horaire)<input type="number"  class="pric" id="pric'.$donnees['id_chambre'].'"></span><br/><br/>
			 <div class="'.$a.'">'.$name.'</div>
			 <span class="but1"><a href="#" data-id1="'.$donnees['id_chambre'].'" title="voir disponibilité">check</a></span><span class="but2"><a href="#" class="add_home" data-id2="'.$donnees['id_chambre'].'" title="facturé le local">Ajouter le local</a></span>
			 <input type="hidden"  name="hidden_name" id="chambre'.$donnees['id_chambre'].'" value="'.$donnees['chambre'].'">
			 <input type="hidden" id="cout_nuite'.$donnees['id_chambre'].'" value="'.$donnees['cout_nuite'].'">
		     <input type="hidden" id="cout_pass'.$donnees['id_chambre'].'" value="'.$donnees['cout_pass'].'">
			 <input type="hidden" id="chambre'.$donnees['id_chambre'].'" value="'.$donnees['chambre'].'">
			<input type="hidden" id="type'.$donnees['id_chambre'].'" value="'.$donnees['type_logement'].'">
			 </div>';
	
	}
	
  
	
	echo'</div>';

?>