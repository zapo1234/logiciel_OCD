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
	
	 // récupérer les variables en boucles
	 $req=$bdd->prepare('SELECT denomination,email_ocd,email_user,numero,id_visitor FROM inscription_client WHERE id_visitor= :id');
    $req->execute(array(':id'=>$_GET['home_user']));
   $donnees=$req->fetch();
	$req->closeCursor();
 // recupere les données des chambre 
   $email =$donnees['email_ocd'];
   
   if(!isset($_GET['date_start']){
	$date1 = date('y-m-d');
    $date2 = date('y-m-d');	
   }
   else{
   $date1=$_GET['date_start'];
   $date2=$_GET['date_end'];
   }
    $time1 =date('H:i');
	$time2=date('H:i');
   $chambre = $_POST['chambre'];
   $montant =$_POST['pay'];
   $id_chambre = $_POST['id_chambre'];
   $type = $_POST['typ'];
 // boucler sur les valeurs pour entrer les données dans la bdd
  for($count=0;  $count<count($_POST['chambre']); $count++){ 
     $name_chambre = $chambre[$count];
	 $montants = $montant[$count];
	 $ids_chambre = $id_chambre[$count];
	 $types = $type[$count];
	  // on redirige vers la page
		// on insere les données dans la bds-
		$rey=$bds->prepare('INSERT INTO bord_informations (email_ocd,id_chambre,type_logement,dat,chambre,check_in,check_out,time1,time2,date1,date2,montant,mode,mont_restant,encaisser,rete_payer,id_fact,type,code) 
		VALUES(:email_ocd,:id_chambre,:type_logement,:dat,:chambre,:check_in,:check_out,:time1,:time2,:date1,:date2,:montant,:mode,:mont_restant,:encaisser,:rete_payer,:id_fact,:type,:code)');
	     $rey->execute(array(':email_ocd'=>$email,
	                        ':id_chambre'=>$ids_chambre,
						    ':type_logement'=>$types,
					        ':dat'=>$dat,
						    ':chambre'=>$name_chambre,
					        ':check_in'=>$date1,
						    ':check_out'=>$date2,
							':time1'=>$time,
							':time2'=>$time1,
						    ':date1'=>$date1,
						    ':date2'=>$date2,
						    ':montant'=>$montants,
						    ':mode'=>$mode,
						    ':mont_restant'=>$reste,
						    ':encaisser'=>$encaisser,
						    ':rete_payer'=>$rete_payer,
		                    ':id_fact'=>$id_fact,
						    ':type'=>$ty,
							':code'=>$session
						  ));
						  
		// header location redirigé
		header('location:reservation_home.php?home_user='.$_GET['home_user'].'');
				
}
?>