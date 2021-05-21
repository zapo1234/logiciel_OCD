<?php
include('connecte_db.php');
include('inc_session.php');

   
   // emttre la requete sur le fonction
    $req=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,equipements,equipement,cout_nuite,cout_pass,icons,infos FROM chambre WHERE email_ocd= :email_ocd');
    $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
	
	
	$rem='<span class="ts"></span>';
	$rt=",";
	$rs='<span class="ts"><i style="font-size:12px" class="fa">&#xf00c;</i></span>';
	
	// on boucle sur les les resultats
       
	echo'<div class="content_home">';
	
	while($donnees = $req->fetch()){
		
		echo'<div class="content3">
		     <span class="dc">Type de local :'.$donnees['type_logement'].'</span><br/><span class="df">'.$donnees['chambre'].'</span><br/>
			 <span class="dt">'.str_replace($rt,$rem,$donnees['equipement']).'</span><br/><span class="text">Prix négocié(nuité)<input type="text" name="count_nuite" class="prix" id="prix'.$donnees['cout_nuite'].'"></span>
			 <span class="tex">Prix négocié(horaire)<input type="text" name="count_pass" class="pric" id="pric'.$donnees['cout_nuite'].'"></span><br/><br/>
			 <span class="but1"><a href="#" data-id1="'.$donnees['id_chambre'].'" title="voir disponibilité">check</a></span> <span id="d'.$donnees['id_chambre'].'"></span> <span class="but2"><a href="#" data-id="'.$donnees['id_chambre'].'" title="facturé le local">Ajouter le local</a></span>
			 <input type="hidden"  name="hidden_name" id="chambre'.$donnees['id_chambre'].'" value="'.$donnees['chambre'].'">
			 <input type="hidden" id="cout_nuit'.$donnees['id_chambre'].'" value="'.$donnees['cout_nuite'].'">
		     <input type="hidden" id="cout_pass'.$donnees['id_chambre'].'" value="'.$donnees['cout_pass'].'">
			 <input type="hidden" id="chambre'.$donnees['id_chambre'].'" value="'.$donnees['chambre'].'">
			
			 </div>';
	}
	
	
	
	echo'</div>';

   

?>