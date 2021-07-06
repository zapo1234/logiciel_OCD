<?php
include('connecte_db.php');
include('inc_session.php');

// requete pour aller chercher les valeurs 
   $home = $_GET['home'];
  // emttre la requete sur le fonction
    $req=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,occupant,nombre_lits,equipements,equipement,cout_nuite,cout_pass,icons,infos,type FROM chambre WHERE id_chambre= :id_chambre AND email_ocd= :email_ocd');
    $req->execute(array(':id_chambre'=>$home,
	                    ':email_ocd'=>$_SESSION['email_ocd']
						));
    $datas = $req->fetch();
 
     if($_POST['action']=="fetch"){
		 
				   echo'<div id="der15">';
					if($datas['type'] ==0){
					 echo'<h4>Bloquer toutes actions sur ce local</h4>
					 <div><button class="acces" data-id1="'.$_GET['home'].'">Bloquer l\'accès</button></div>';
					}
					
					else{
						echo'<h4>Activez l\'accès du local</h4>
					  <div><button class="access" data-id1="'.$_GET['home'].'">Activer l\'accès</button></div>';
					}
					echo'</div>'; 
		}
 
 
 // modifie le type de la chambre dans la base de données table chambre
 if($_POST['action']=="acess"){
	 $id = $_POST['id'];
	 $num =2;
	 // on modifie les données de la base de données guide
         $ret=$bds->prepare('UPDATE chambre SET type= :res WHERE email_ocd= :email_ocd AND id_chambre= :id_chambre');
        $ret->execute(array(':res'=>$num,
		                    ':id_chambre'=>$id,
                            ':email_ocd'=>$_SESSION['email_ocd']
							
							));
	    }
		
		
  if($_POST['action']=="access"){
	  
	 $id = $_POST['id'];
	 $num =1;
	 // on modifie les données de la base de données guide
         $ret=$bds->prepare('UPDATE chambre SET type= :res WHERE email_ocd= :email_ocd AND id_chambre= :id_chambre');
        $ret->execute(array(':res'=>$num,
		                    ':id_chambre'=>$id,
                            ':email_ocd'=>$_SESSION['email_ocd']
							
							)); 
	  
	  
  }















?>