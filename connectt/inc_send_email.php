<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

 require 'PHPMailer/src/Exception.php';
 require 'PHPMailer/src/PHPMailer.php';
 require 'PHPMailer/src/SMTP.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$email =$_POST['email_ocd'];
$email1 ='clients_user@ocdgestion';
$lien ='<a href="https://connect.ocdgestion.com/update_password_user.php?user_data='.$donnees['token_pass'].'">Demander un nouveau mot de pass</a>';

try {
	
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'vps83148.serveur-vps.net';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'clients_user@ocdgestion.com';                     //SMTP username
    $mail->Password   = 'z_mNSR93kg';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $call ="clients_user@ocdgestion.com";
    //Recipients
    $mail->setFrom($call,'Admin');
    $mail->addAddress($email);     //Add a recipient
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Demander un nouveau mot de pass';
      $mail->Body    = 'Pour obtenir la réinitalisation de votre mot de pass <br/> cliquer sur le lien ci-desous pour modifier et obtenir un nouveau mot de pass!<br/><div class="button">'.$lien.'</b>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<div class="ddn">Vous avez reçu un lien dans votre adresse email</div>';
} catch (Exception $e) {
   
}

?>