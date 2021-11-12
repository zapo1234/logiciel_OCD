<?php
include('connecte_db.php');
// traiter le formulaire 
  $req=$bdd->prepare('SELECT token_pass,email_user FROM inscription_client WHERE token_pass= :token');
  $req->execute(array(':token'=>$_GET['user_data']));
                         $donnees=$req->fetch();
							$pass = $_POST['pass1'];
                     //hash sur le mot de pass
	                      $options = [
                     'cost' => 12 // the default cost is 10
                        ];
                      $hash = password_hash($pass, PASSWORD_BCRYPT, $options); 
						
					// un token new
					// creation d'un jeton unique token
	                $rand_token = openssl_random_pseudo_bytes(16);
                   //change binary to hexadecimal
                    $token = bin2hex($rand_token);
					if($donnees['token_pass']!=$token){
					//Modifier le mot de pass ici et le token 
					// on modifie le type dans la table facture
               $ret=$bdd->prepare('UPDATE inscription_client SET  password= :ps WHERE email_user= :email_user');
                      $ret->execute(array(
					  ':ps'=>$hash,
                      ':email_user'=>$donnees['email_user']
					 ));
			// changer le token 
			$ret=$bdd->prepare('UPDATE inscription_client SET token_pass= :ts WHERE email_user= :email_user');
                      $ret->execute(array(
					  ':ts'=>$token,
                      ':email_user'=>$donnees['email_user']
					 ));
					 // afficher un message
					  echo'<div class="ddn" style="font-size:18px;"><i class="far fa-check-circle" style="color:green;font-size:18px;font-weight:bold;"></i> Votre mot de pass a été reinitialisé</div>';
					  echo'<meta http-equiv="Refresh" content="4; url=https://connect.ocdgestion.com/index.php>';
			    }
			 else{
				echo'<div class="ddn">relancer votre action</div>'; 
			 }
					
?>