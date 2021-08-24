<?php
include('connecte_db.php');
include('inc_session.php');

   $req=$bdd->prepare('SELECT user,permission FROM inscription_client WHERE email_user= :email_user');
   $req->execute(array(':email_user'=>$_SESSION['email_user']));
   $donnees =$req->fetch();
   $req->closeCursor();
   
   $res=$bds->prepare('SELECT id,name,permission,message,date,heure FROM messanger WHERE email_ocd= :email_ocd ORDER BY id DESC LIMIT 0,3');
   $res->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
   $donnes =$res->fetchAll();


if($_POST['action']=="fetchs"){

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
  echo'<div class="datas_messanger">
	  <div class="hss"><span class="'.$css.'">'.$datas['name'].' à envoyé un message </span><span class="dt">'.$jj.'/'.$mm.'/'.$an.' à '.$hh.':'.$hh1.' </div>
       <div><span class="status" id="status'.$css.'">'.$names.'</div>
	   </div>';
  
  }
  
  if($datas['permission']=="supboss" OR $datas['permission']=="supemployes" OR $datas['permission']=="supgestionnaire"){
	echo'<div class="datas_messanger">
	   <div class="donnes">'.htmlspecialchars($datas['message']).'<br/><span class="dt">'.$jj.'/'.$mm.'/'.$an.' à '.$hh.':'.$hh1.' </span></div>
	   </div>';
	
 }

 }
 $res->closeCursor();
}

 