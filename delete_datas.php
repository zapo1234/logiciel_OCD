<?php
include('connecte_db.php');
include('inc_session.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="confirmation">
    <meta name="author" content="">

    <title>Confirmation</title>
     <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom fonts for this template-->
  
    <!-- Custom fonts for this template -->
   
<style>
 
  
 #pak{width:200px;position: fixed;top: 0;left:0;width:100%;height:100%;background-color:black;z-index:2;opacity:0.8;}
label{color:black;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;font-weight:bold;color:black}
 
 .dep {
  animation: spin 2s linear infinite;
  margin-top:10px;font-size:45px;font-weight:bold;
  }

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.nam{color:black;font-weight:bold;}
.enre{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;color:black;z-index:4;position:absolute;top:130px;left:40%;border:2px solid white;font-family:arial;font-size:18px;width:280px;height:200px;padding:2%;text-align:center;background-color:white;
}
.dr{font-size:18px;text-align:center;margin-top:10px;}

@media (max-width: 575.98px) { 
.enre{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;color:black;z-index:4;position:absolute;top:130px;left:20%;border:2px solid white;font-family:arial;font-size:18px;width:200px;height:150px;padding:2%;text-align:center;background-color:white;
}
}
</style>

</head>

<?php



 if(isset($_POST['co1'])){
	 
	$a=$_POST['co1']; 
 }

 if(isset($_POST['co2'])){
	 
	$a=$_POST['co2']; 
 }

 if(isset($_POST['co3'])){
	 
	$a=$_POST['co3']; 
 }
 
 // delete les messager

 $reg=$bds->prepare('DELETE FROM messanger WHERE email_ocd= :email_ocd ORDER BY id ASC LIMIT '.$a.'');
 $reg->execute(array(':email_ocd'=>$_SESSION['email_ocd']));

echo'<div id="pak"></div>
             <div class="enre"><div><i class="fas fa-check-circle" style="color:green;font-size:20px;"></i>vos données sont bien suprimées  <i class="far fa-user" style="color:green;font-size:20px;"></i></div>
			 <div class="dr"></div>
		     <div class="dep"><i class="fa fa-hourglass-end" aria-hidden="true" style="color:green;font-size:15px;"></i></div></div>
             <meta http-equiv="Refresh" content="3; url=https://connect.ocdgestion.com/gestion_datas_messanger.php"/>';




?>