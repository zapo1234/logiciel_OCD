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
$email =$_POST['email'];
$emails = $_POST['emails'];
$id_fact = $_POST['id'];
$lien ='<a href="https://connect.ocdgestion.com/generate_data_pdf.php?user_data='.$emails.'&id_fact='.$id_fact.'">votre facture</a>';

try {
	
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'vps83148.serveur-vps.net';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'admin@ocdgestion.com';                     //SMTP username
    $mail->Password   = '8ad4qT_UyYB'; 
	//SMTP password
	$mail->SMTPSecure = 'ssl';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients (expediteur or destinataire)
    $mail->setFrom("ne-reply@ocdgestion.com");
    $mail->addAddress($email);     //Add a recipient
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Votre facture de séjour';
      $mail->Body    = ' Bonjour'.$email.' Vous trouverez votre facture <br/> en cliquant sur le lien ci-desous!<br/><div class="button">'.$lien.'</b>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<div class="ddn">La facture à été bien transmise !</div>';
} catch (Exception $e) {
   
}

?>