<?php

include('connecte_db.php');
include('inc_session.php');

	
$record_peage=15;
$page="";

if(isset($_POST['page'])){
$page = $_POST['page'];
}

else {

$page=1;	
	
}

$smart_from =($page -1)*$record_peage;
	
try
	
	{
		
	 if($_POST['action']=="fecth") {
 
	
     $ref=$bds->prepare('SELECT id,cl_email_viidea,titre,img,nom,prenom,adresse,code_postal,ville,tel,email,commerciale FROM infos_clients WHERE cl_email_viidea= :cl_email_viidea ORDER BY nom ASC LIMIT '.$smart_from.','.$record_peage.'');
     $ref->execute(array(':cl_email_viidea'=>$_SESSION['email']));

     echo'<table id="tabls">
	     <th class="table-header"></th>
		 <th class="table-header"></th>
	      <th class="table-header">client</th>
	   <th class="table-header">adresse</th>
	   <th class="table-header">Téléphone</th>
	   <th class="table-header">e-mail</th>
	   <th class="table-header" >commercial</th>
	   <th class="invisible-cells">action</th>';
	   

	   echo'</tr>';
	$incrementedID=0;
	while($donnes=$ref->fetch()){

		
		if(strlen($donnes['nom']) != 0){
			$incrementedID = $incrementedID +1;
			echo'<tr>';
			echo'<td><input type="checkbox" value="'.$donnes['id'].'"></td>';
			echo'<td class="capitalized_td"><img src="images/connexion/icons/user.png" alt="user" width="13" height="13"></td>';
			echo'<td class="tds">'.$donnes['nom'].'  '.$donnes['prenom'].'</td>';
			echo'<td class="capitalized_td">'.$donnes['adresse'].', '.$donnes['code_postal'].' '.$donnes['ville'].'</td>';
			echo'<td >'.$donnes['tel'].'</td>';
			echo'<td >'.$donnes['email'].'</td>';
			echo'<td id="customs">'.$donnes['commerciale'].'</td>';
			echo'<td id="action"><a href="#" class="select" data-id1="'.$donnes['id'].'" title="Afficher des informations"><img src="images/connexion/icons/search1.png" alt="search1" width="15" height="15"/></a>
			  <a href="document_client_modifiy.php?ids='.$donnes['id'].'&name_client_souscripteurs" title="Modifier les infos clients"><img src="images/connexion/icons/edit.png" alt="edit" width="15" height="15"></a>
		     <a href="#" class="select1" data-id4="'.$donnes['id'].'" title="Supprimer le client"><img src="images/connexion/icons/trash.png" alt="trash" width="15" height="15"></a></td>';
			echo'</tr>';
		}
		
	}
	echo'</table>';

	$ref->CloseCursor();
	
   // on compte le nombre de ligne de la table
   $reg=$bds->prepare('SELECT count(*) AS nbrs FROM infos_clients WHERE cl_email_viidea= :cl_email_viidea');
    $reg->execute(array(':cl_email_viidea'=>$_SESSION['email']));
   $dns=$reg->fetch();
   $totale_page=$dns['nbrs']/$record_peage;
   
   echo'<div class="pied_function">';
   for($i=1; $i<=$totale_page; $i++) {
	   
	   echo'<span class="pied_pag" style="cursor:pointer"><span class="dty" id="'.$i.'">'.$i.'</span></span>';
    }
   
    echo'<span class="pied_page" id="pied_page"><button type="button" class="expo">exporter</button>
	<button type="button" class="sup">suprimer</button><button type="button" class="arc">archiver</button></span>
	</div>';
	
   
}

 if($_POST['action']=="delete") {
	 
	if(isset($_POST['id'])) {
	 $id=$_POST['id'];
  // on supprime les données de notre table
  $req=$bds->prepare('DELETE FROM infos_clients WHERE id= :id');
   $req->execute(array(':id'=>$id)); 
	   echo'<div class="der">le client est bel et bien suprimé !</div>';    
	 } 
	 
	 
 }

}
	catch(Execption $e)
  {
die('Erreur : '.$e->getMessage());
} 

?>
	