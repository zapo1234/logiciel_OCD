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
	$rec=$bds->query('SELECT id_chambre,date FROM home_occupation WHERE id_chambre="'.$donnees['id_chambre'].'"');
    $donns = $rec->fetchAll();
	 $array = [];
	foreach($donns as $datas) {
		
		$data = $datas['date'];
		
		$dat = explode(',',$data);
		
		foreach($dat as $value){
		
        $array[] = $value;		
	   
	   }
	}	   
	 
     if(in_array(($_POST['days']),$array)){

        $name="";
	 }	

     elseif(in_array(($_POST['das']),$array)){

        $name="";
	 }

     else{

        $name="disponible";
	 }	 

	
	     echo'<div class="content3">
		     <span class="dc">Type de local :'.$donnees['type_logement'].'</span><br/><span class="df">'.$donnees['chambre'].'</span><br/>
			 <span class="dt">'.str_replace($rt,$rem,$donnees['equipement']).'</span><br/><span class="text">Prix négocié(nuité)<input type="number"  class="prix" id="prix'.$donnees['id_chambre'].'"></span>
			 <span class="tex">Prix négocié(horaire)<input type="number"  class="pric" id="pric'.$donnees['id_chambre'].'"></span><br/><br/>
			 <h3>'.$name.'</h3>
			 <span class="but1"><a href="#" data-id1="'.$donnees['id_chambre'].'" title="voir disponibilité">check</a></span><span class="but2"><a href="#" class="add_home" data-id2="'.$donnees['id_chambre'].'" title="facturé le local">Ajouter le local</a></span>
			 <input type="hidden"  name="hidden_name" id="chambre'.$donnees['id_chambre'].'" value="'.$donnees['chambre'].'">
			 <input type="hidden" id="cout_nuite'.$donnees['id_chambre'].'" value="'.$donnees['cout_nuite'].'">
		     <input type="hidden" id="cout_pass'.$donnees['id_chambre'].'" value="'.$donnees['cout_pass'].'">
			 <input type="hidden" id="chambre'.$donnees['id_chambre'].'" value="'.$donnees['chambre'].'">
			<input type="hidden" id="type'.$donnees['id_chambre'].'" value="'.$donnees['type_logement'].'">
			 </div>';
	
	}
	
  
	
	echo'</div>';
    var_dump($array);

?>