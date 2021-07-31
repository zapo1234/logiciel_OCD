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
	
 if($datas['permission']=="user:boss"){
	
	$css="boss";
	$names="patron";
	
 }
 
 if($datas['permission']=="user:gestionnaire"){
	 
	$css="gestionnaire"; 
	$names="gestionnaire";
	 
 }
	
  if($datas['permission']=="user:employes"){
	 
	$css="employes"; 
	$names="réceptionniste";
	 
 }
 
 $dat1 = explode('-',$datas['date']);
	
	$jj = $dat1[2];
	$mm = $dat1[1];
	$an = $dat1[0];
	
 $dat2 = explode(':',$datas['heure']);
 $hh =$dat2[0];
 $hh1=$dat2[1];
	
  // afficher le message
  
  echo'<div class="datas_messanger" id="datas'.$css.'">
      <div><span class="action" data-id1="'.$datas['id'].'" class="datas'.$datas['id'].'" title="action"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></span> <span id="id'.$datas['id'].'" class="divaction" style="display:none"><a href="#" class="sup_send"><i class="far fa-trash-alt" aria-hidden="true"></i>  suprimer</a></span></div>
	  <div class="hss"><span class="'.$css.'">'.$datas['name'].' </span><span class="dt">'.$jj.'/'.$mm.'/'.$an.' à '.$hh.':'.$hh1.' </div>
	   <div class="donnes">'.htmlspecialchars($datas['message']).'</div>
       <div><span class="status" id="status'.$css.'">'.$names.'</div>
	   </div>';
  
	
}
	
	
}


if($_POST['action']=="send"){
	
 // definition des variable
 $email_ocd =$_SESSION['email_ocd'];
 $user =$_SESSION['email_user'];
 $users =$donnees['user'];
 $permission =$donnees['permission'];
 $message =trim(strip_tags($_POST['message']));
 $date = date('Y-m-d');
 $heure =date('H:i');
 
 // insert into table
  // on recupére les date dans la base de donnnées.
	     $reys=$bds->prepare('INSERT INTO messanger (email_ocd,name,permission,message,email_user,date,heure) 
		 VALUES(:email_ocd,:name,:permission,:message,:email_user,:date,:heure)');
		 $reys->execute(array(':email_ocd'=>$email_ocd,
		                      ':name'=>$users,
							  ':permission'=>$permission,
		                      ':message'=>$message,
							  ':email_user'=>$user,
							  ':date'=>$date,
							  ':heure'=>$heure
	                        ));
             					
 
  }
?>