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
         if($_POST['action'] =="deleted") {
         $id =$_POST['id'];
		 // recupére les image pour les supprimer
		 $req=$bds->prepare('SELECT name_upload FROM photo_chambre WHERE id_chambre = :id_chambre');
         $req->execute(array(':id_chambre'=>$id));
		 
		 $donnes = $req->fetchAll();
         
		   if(!empty($req)){
			 
			 foreach($donnes as $row){
				 
			    $array = $row['name_upload'].',';
				
				$array_name = explode(',', $array);
				
				foreach($array_name as $result) {
					  
					// suprimer 
					// on suprimer le fichier existant
			     unlink ("upload_image/" .$result);
			     
				}
			  }
		   }
		   
          // on suprime les données dans la base de données
		  $ret=$bds->prepare('DELETE FROM chambre WHERE id_chambre= :id_chambre');
          $ret->execute(array(':id_chambre'=>$id)); 
		  
		  // suprimer les données dans photo_chambre
		  $rev=$bds->prepare('DELETE FROM photo_chambre WHERE id_chambre= :id_chambre');
          $rev->execute(array(':id_chambre'=>$id)); 
		  
		  
          // on redirige vers la page
             echo'<div class="enr"> le local <span class="x"></span> à été bien suprimé</div>';
  
            echo'<meta http-equiv="Refresh" content="4; url=//localhost/logiciel_OCD/inventaire_gestion_home.php"/>';
		 }
  
       if($_POST['action']== "delete_img"){
		  // recupére les image pour les supprimer
		 $id =$_POST['ids'];
		 $req=$bds->prepare('SELECT name_upload FROM photo_chambre WHERE id = :id');
         $req->execute(array(':id'=>$id));
		   
		 // on suprime le nom de phot_chambre
		 $reg=$bds->prepare('DELETE  FROM photo_chambre WHERE id= :id');
          $reg->execute(array(':id'=>$id)); 
		  
		  $donnees = $req->fetch();
		  // on suprime 
		  // on suprimer le fichier existant
			     unlink ("upload_image/".$donnees['photo_chambre']);
	 }
?>