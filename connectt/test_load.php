<?php
include('connecte_db.php');
include('inc_session.php');

		      if($_SESSION['code']==0){
		 $res=$bds->prepare('SELECT id,name,permission,message,date,heure,society FROM messanger WHERE email_ocd= :email_ocd ORDER BY id DESC LIMIT 0,1');
        $res->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
		}
		
		else{
		$session=$_SESSION['code'];
		$res=$bds->prepare('SELECT id,name,permission,message,date,heure,society FROM messanger WHERE code= :code AND email_ocd= :email_ocd ORDER BY id DESC LIMIT 0,1');
        $res->execute(array(':code'=>$session,
		                    ':email_ocd'=>$_SESSION['email_ocd']));
		}
		$datas = $res->fetch();
  
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
	
if($datas['society']==""){
	$taf="";
}
   
else{
	 
	$taf ='<img src="img/map.png" alt="map" width="15px" height="15px"> travail à'.$datas['society'].'';	
 }
  // afficher le message
  
  if($datas['permission']=="boss" OR $datas['permission']=="employes" OR $datas['permission']=="gestionnaire"){
	 
	
  echo'<div class="datas_messanger" id="datas'.$css.'">
      <div><span class="action" data-id1="'.$datas['id'].'" class="datas'.$datas['id'].'" title="action"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></span> <span id="id'.$datas['id'].'" class="divaction" style="display:none"><a href="#" data-id2="'.$datas['id'].'" class="sup_send"><i class="far fa-trash-alt" aria-hidden="true"></i>  suprimer</a></span></div>
	  <div class="hss"><span class="'.$css.'">'.$datas['name'].' </span><span class="dt">'.$jj.'/'.$mm.'/'.$an.' à '.$hh.':'.$hh1.' </div>
	   <div class="donnes">'.htmlspecialchars($datas['message']).'</div>
       <div><span class="status" id="status'.$css.'">'.$names.'<br/>'.$taf.'</div>
	   </div>';
  
  }
  
  if($datas['permission']=="supboss" OR $datas['permission']=="supemployes" OR $datas['permission']=="supgestionnaire"){
	echo'<div class="datas_messangers" id="'.$css.'">
	   <div class="donnes">'.htmlspecialchars($datas['message']).'<br/><span class="dt">'.$jj.'/'.$mm.'/'.$an.' à '.$hh.':'.$hh1.' </span></div>
	   </div>';
	
 }

 $res->closeCursor();	   

?>