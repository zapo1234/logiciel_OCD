 <?php
 
   //ini_set('session.use_cookies', 1);       // Use cookies to store session.
   //ini_set('session.use_only_cookies', 1); // (phpsessionID forbidden in URL)
   // on defini une variable
   // creation de tokens sécruity
   $token = openssl_random_pseudo_bytes(16);
 //Convert the binary data into hexadecimal representation.
    $token = bin2hex($token);
     $_SESSION['token'] = $token;
	 //On enregistre aussi le timestamp correspondant au moment de la création du token
      $_SESSION['token_time'] = time();
	 //On modifie les donnees
   
	$temps=3600;
	// teste l'existence d'ne variable
	if(isset($_SESSION['last_time'])){
	
    $secondtime	= time()- $_SESSION['last_time'];
	// on defini let temps
    $threetime = $temps * 60;
  if($secondtime >= $threetime) {
	 // on detruit les session
      session_unset();
     // on detruit la session
     session_destroy();
    // on redirige
     header('location:index.php');	 
	}
  }
  
  $_SESSION['last_time'] = time();
  
  
if(!isset($_SESSION['pose']) OR !$_SESSION['pmd']){
	
// on detruire les variable
unset($_SESSION['pose'],$_SESSION['pmd']);
// et on rédirige
 header('Location: index.php');
}

?>