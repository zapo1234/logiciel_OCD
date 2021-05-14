<?php
include('connecte_db.php');
include('inc_session.php');

   
   // emttre la requete sur le fonction
    $req=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,equipements,equipement,cout_nuite,icons,infos FROM chambre WHERE email_ocd= :email_ocd');
    $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
	
	
	$rem='<span class="ts"></span>';
	$rt=",";
	$rs='<span class="ts"><i style="font-size:12px" class="fa">&#xf00c;</i></span>';
	
	// on boucle sur les les resultats
	// entete du tableau
	 echo'	<table class="table">
     <thead>
     <tr>
      <th scope="col">Type de logement</th>
	  <th scope="col">Local désigné</th>
      <th scope="col">Nbrs(occupant)</th>
	  <th scope="col">Tarif du jour</th>
      <th scope="col">équipements</th>
	  <th scope="col">Description</th>
	  <th scope="col">modifier</th>
	  <th scope="col">suprimer</th>
      </tr>
      </thead>
      <tbody>';
       
	while($donnees = $req->fetch()) {
	
	// afficher dans un tableau les données des chambres
	 echo'<tr>
      <td>'.$donnees['type_logement'].'</td>
	  <td>'.$donnees['chambre'].'</td>
      <td>'.$donnees['icons'].'</td>
	  <td>'.$donnees['cout_nuite'].' FR</td>
      <td><span class="div">'.str_replace($rt,$rem,$donnees['equipement']).'</span><br/><br/> <i style="font-size:12px" class="fa">&#xf00c;</i> '.str_replace($rt,$rs,$donnees['equipements']).'</td>
	  <td>'.$donnees['infos'].'</td>
	  <td><a href="edit_data_home.php?home='.$donnees['id_chambre'].'"><i class="material-icons" style="font-size:16px">create</i></a></td>
	  <td><a href="#" data-id1='.$donnees['id_chambre'].' class="home"><i class="fas fa-trash"></i></a></td>
	  </tr>';
	}
	
	echo' 
      </tbody>
     </table>';

   

?>