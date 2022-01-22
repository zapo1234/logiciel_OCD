<?php
include('connecte_db.php');
include('inc_session.php');

   $record_peage=5;
$page="";

if(isset($_POST['page'])){
$page = $_POST['page'];
}

else {

$page=1;	
	
}

// on recupere les variable existante $_SESSION 

$smart_from =($page -1)*$record_peage;
   // emttre la requete sur le fonction
   if($_SESSION['code']!=0) {
    $req=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,equipements,equipement,cout_nuite,cout_pass,icons,infos FROM chambre WHERE email_ocd= :email_ocd AND code= :code ORDER BY id DESC LIMIT '.$smart_from.','.$record_peage.'');
    $req->execute(array(':code'=>$_SESSION['code'],
	                   ':email_ocd'=>$_SESSION['email_ocd']));
   }
   
   else{
	 $req=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,equipements,equipement,cout_nuite,cout_pass,icons,infos,society FROM chambre WHERE email_ocd= :email_ocd  ORDER BY id DESC LIMIT '.$smart_from.','.$record_peage.'');
     $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));  
	 }
	
	$rem='<span class="ts"></span>';
	$rt=",";
	$rs='<span class="ts"><i style="font-size:12px" class="fa">&#xf00c;</i></span>';
	
	// on boucle sur les les resultats
	// entete du tableau
	 echo'<table>
     
     <tr class="ts">
      <th scope="col"><i class="material-icons" style="font-size:17px;color:#111E7F">home</i>Type de logement</th>
	  <th scope="col">Local désigné</th>
	  <th scope="col">équipements</th>
	   <th scope="col">équipements(S)</th>
	   <th scope="col">Nbrs(occupant)</th>
	  <th scope="col">Tarif</th>
	  <th scope="col">Description</th>
	  <th scope="col">Découvrir</th>
	  <th scope="col">modifier</th>
	  <th scope="col">suprimer</th>
      </tr>';
       
	while($donnees = $req->fetch()) {
	
	// afficher dans un tableau les données des chambres
	 echo'<tr class="ts">
      <td> <span class="home">'.$donnees['type_logement'].'</span></td>
	  <td class="color">'.$donnees['chambre'].'</td>
	  <td><h3>équipements</h3><span class="div">'.str_replace($rt,$rem,$donnees['equipement']).'</span></td>
	  <td><i style="font-size:12px" class="fa">&#xf00c;</i> '.str_replace($rt,$rs,$donnees['equipements']).'
	  </td>
      <td>'.$donnees['icons'].'</td>
	  <td class="color">tarif/journalier<br/>'.$donnees['cout_nuite'].' xof<br/><br/>tarif/horaire<br/>'.$donnees['cout_pass'].'xof</td>
      <td>'.$donnees['infos'].'</td>
	  <td><a href="view_data_home.php?home='.$donnees['id_chambre'].'" title="plus d\'infos"><i class="fas fa-eye" style="font-size:13px"></i></a></td>
	  <td><a href="edit_data_home.php?home='.$donnees['id_chambre'].'" title="modifier"><i class="material-icons" style="font-size:13px">create</i></a></td>
	  <td><a href="#" data-id1='.$donnees['id_chambre'].' class="home"><i class="fas fa-trash"></i></a></td>
	  </tr>';
	  
	  echo'<div class="mobiles">
	      <h2>'.$donnees['type_logement'].' '.$donnees['chambre'].'</h2>
	      <div> Tarif/nuité: '.$donnees['cout_nuite'].'<br/></div>
	      </div>';
	}
	
	echo'</table>';
    $req->closeCursor();
   // on compte le nombre de ligne de la table
   if($_SESSION['code']==0){
   $reg=$bds->prepare('SELECT count(*) AS nbrs FROM chambre WHERE email_ocd= :email_ocd');
   $reg->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
   }
   
   else{
	  $reg=$bds->prepare('SELECT count(*) AS nbrs FROM chambre WHERE email_ocd= :email_ocd AND code= :code');
      $reg->execute(array(':code'=>$_SESSION['code'],
	                      ':email_ocd'=>$_SESSION['email_ocd'])); 
   }
   $dns=$reg->fetch();
   $totale_page=$dns['nbrs']/$record_peage;
   $totale_page = ceil($totale_page);
   
   
   echo'<div class="pied_page">';
   if($page > 1){
	  $page =$page-1;
	  echo'<div class="p"><a href="inventaire_gestion_home.php?page='.$page.'"><i class="fa fa-angle-left" aria-hidden="true" style="font-size=33px;color:black"></i></a></div>'; 
   }
   for($i=1; $i<=$totale_page; $i++) {
	   
	   echo'<div class="pied" style="cursor:pointer"><button class="bout" id="'.$i.'">'.$i.'</div>';
    }
	
	if($i > $page){
		$page =$page+1;
		echo'<div class="p"><button><a href="inventaire_gestion_home.php?page='.($page+1).'"><i class="fa fa-angle-right" aria-hidden="true" style="font-size=33px;color:black"></i></a></button>'; 
	}
	
	echo'</div>';
	
	

?>