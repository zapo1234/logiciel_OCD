<?php
include('connecte_db.php');
include('inc_session.php');

   $req=$bdd->prepare('SELECT user,permission FROM inscription_client WHERE email_user= :email_user');
   $req->execute(array(':email_user'=>$_SESSION['email_user']));
   $donnees =$req->fetch();
   $req->closeCursor();
   
   $res=$bds->prepare('SELECT id,name,permission,message,date,heure FROM messanger WHERE email_ocd= :email_ocd ORDER BY id DESC');
   $res->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
   $donnes =$res->fetchAll();


if($_POST['action']=="fetch"){

 // recupére les message dans la table
foreach($donnes as $datas){
	
 if($datas['permission']=="boss"){
	
	$css="boss";
	$names="patron";
	
 }
 
 if($datas['permission']=="gestionnaire"){
	 
	$css="gestionnaire"; 
	$names="gestionnaire";
	 $csss = substr($datas['permission'],5);
 }
	
  if($datas['permission']=="employes"){
	 
	$css="employes"; 
	$names="réceptionniste";
	$csss = substr($datas['permission'],5);
	 
 }
 
 if($datas['permission']=="supboss"){
	 
	$css="supboss"; 
	$names="";
	$csss = substr($datas['permission'],5);
	 
 }
 
 if($datas['permission']=="supgestionnaire"){
	 
	$css="supgestionnaire"; 
	$names="";
	$csss = substr($datas['permission'],5);
	 
 }
 
 if($datas['permission']=="supemployes"){
	 
	$css="supemployes"; 
	$names="";
	$csss = substr($datas['permission'],5);
	 
 }
 
 $dat1 = explode('-',$datas['date']);
	
	$jj = $dat1[2];
	$mm = $dat1[1];
	$an = $dat1[0];
	
 $dat2 = explode(':',$datas['heure']);
 $hh =$dat2[0];
 $hh1=$dat2[1];
	
  // afficher le message
  
  if($datas['permission']=="boss" OR $datas['permission']=="employes" OR $datas['permission']=="gestionnaire"){
  echo'<div class="datas_messanger" id="datas'.$css.'">
      <div><span class="action" data-id1="'.$datas['id'].'" class="datas'.$datas['id'].'" title="action"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></span> <span id="id'.$datas['id'].'" class="divaction" style="display:none"><a href="#" data-id2="'.$datas['id'].'" class="sup_send"><i class="far fa-trash-alt" aria-hidden="true"></i>  suprimer</a></span></div>
	  <div class="hss"><span class="'.$css.'">'.$datas['name'].' </span><span class="dt">'.$jj.'/'.$mm.'/'.$an.' à '.$hh.':'.$hh1.' </div>
	   <div class="donnes">'.htmlspecialchars($datas['message']).'</div>
       <div><span class="status" id="status'.$css.'">'.$names.'</div>
	   </div>';
  
  }
  
  if($datas['permission']=="supboss" OR $datas['permission']=="supemployes" OR $datas['permission']=="supgestionnaire"){
	echo'<div class="datas_messangers" id="'.$css.'">
	   <div class="donnes">'.htmlspecialchars($datas['message']).'<br/><span class="dt">'.$jj.'/'.$mm.'/'.$an.' à '.$hh.':'.$hh1.' </span></div>
	   </div>';
	
 }

 }
 $res->closeCursor();
}

 


if($_POST['action']=="send"){
	
 // definition des variable
 $email_ocd =$_SESSION['email_ocd'];
 $user =$_SESSION['email_user'];
 $users =$donnees['user'];
 $permission =$donnees['permission'];
 $permissions = substr($donnees['permission'],5);
 $message =trim(strip_tags($_POST['message']));
 $date = date('Y-m-d');
 $heure =date('H:i');
 
 
 // insert into table
  // on recupére les date dans la base de donnnées.
	     $reys=$bds->prepare('INSERT INTO messanger (email_ocd,name,permission,message,email_user,date,heure) 
		 VALUES(:email_ocd,:name,:permission,:message,:email_user,:date,:heure)');
		 $reys->execute(array(':email_ocd'=>$email_ocd,
		                      ':name'=>$users,
							  ':permission'=>$permissions,
		                      ':message'=>$message,
							  ':email_user'=>$user,
							  ':date'=>$date,
							  ':heure'=>$heure
	                        ));
     }
	 
	 if($_POST['action']=="sup"){
		 $date = date('Y-m-d');
         $heure = date('H:i');
		 $id=$_POST['id'];
		 
		 $message=$_SESSION['user']. ' a suprimé son message';
		 
		 // on recupere la permission du user connecté
   $res=$bds->prepare('SELECT permission FROM messanger WHERE id= :ids AND  email_ocd= :email_ocd');
   $res->execute(array(':ids'=>$id,
                       ':email_ocd'=>$_SESSION['email_ocd']
					   ));
	$donnees =$res->fetch();
	
	if($donnees['permission']=="boss"){
		$permission ="supboss";
	}
	
	if($donnees['permission']=="gestionnaire"){
		$permission ="supgestionnaire";
	}
	
	if($donnees['permission']=="employes"){
		$permission ="supemployes";
		
	}
     // modifié le message
	 // on modifie les données de la base de données guide
         $ret=$bds->prepare('UPDATE messanger SET  message= :mess, permission= :pm, date= :dt, heure= :ht WHERE id= :ids AND email_ocd= :email');
        $ret->execute(array(':mess'=>$message,
		                    ':pm'=>$permission,
		                    ':dt'=>$date,
					        ':ht'=>$heure,
							':ids'=>$id,
							':email'=>$_SESSION['email_ocd']
							));
		 }
		 
		if($_POST['action']=="count_message"){
		
		// compte le nom de message dans la table
		$reg=$bds->prepare('SELECT count(*) AS nbrs FROM messanger WHERE email_ocd= :email_ocd');
        $reg->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
        $dns=$reg->fetch();
		
         echo'<div class="count">votre compte a emis plus de <br/><span class="dr">'.$dns['nbrs'].'</span></div>';		
			
		}
?>