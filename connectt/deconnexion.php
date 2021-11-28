<?php
include('connecte_db.php');
include('inc_session.php');

// modifie l'etat de connexion user
    $jour = array("Dim","Lun","Mar","Mercredi","Jeu","Vendr","Sam");
   $mois = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
    $dateDuJour = $jour[date("w")]." ".date("d")." ".$mois[date("n")]." ".date("Y");
    $date=$dateDuJour;
    $heure = date('H:i');
	$etat="";
    //On modifie les donnees
	           $reks=$bdd->prepare('UPDATE inscription_client SET etat= :et, date= :nvte, heure = :nvh WHERE email_user= :email');
			   $reks->execute(array(':et'=>$etat,
			                        ':nvte'=>$date,
									':nvh'=>$heure,
							        ':email'=>$_SESSION['email_user']
								   ));
// Détruit toutes les variables de session
    $_SESSION = array();
 // Si vous voulez détruire complètement la session, effacez également
   // le cookie de session.
   // Note : cela détruira la session et pas seulement les données de session !
    if (ini_get("session.use_cookies")) {
	$params = session_get_cookie_params();
	setcookie(session_name(), '', time() - 42000,
		$params["path"], $params["domain"],
		$params["secure"], $params["httponly"]
	);
	
	
 session_unset();
 // Finalement, on détruit la session.
    session_destroy();
	  
	  header('location:index.php');
}
 
?>

