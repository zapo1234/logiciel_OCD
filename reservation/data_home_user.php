<?php
include('../connecte_db.php');
include('inc_session.php');
$id =$_POST['days'];

if(!isset($id) AND empty($id)){
header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="confirmation">
    <meta name="author" content="">

    <title>Lister des sites</title>
     <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom fonts for this template-->
  
    <!-- Custom fonts for this template -->
   
  <style>
  .enre{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:12px;color:black;z-index:4;position:absolute;top:100px;left:40%;border:2px solid white;font-family:arial;font-size:16px;width:200px;height:130px;padding:2%;text-align:center;background-color:white;font-weight:none;}
  #pak{position:fixed;top:0;left:0;width:100%;height: 100%;background-color: black;z-index:2;opacity:0.9;} h1{font-size:25px;font-weight:none;}
  .dep {
  animation: spin 2s linear infinite;
  margin-top:10px;font-size:45px;font-weight:bold;
  }

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
  </style>
 
<?php

$id_home=$_POST['id_chambre'];
$home_user =$_POST['id_visitor'];
$data_start =$_POST['days'];
$data_end =$_POST['das'];
 if(isset($_POST['days']) AND isset($_POST['das'])){
	echo'<div id="pak"></div>
             <div class="enre"><h1>Locaux disponible</h1><br/>
			  <div class="dep"><i class="fa fa-hourglass-end" aria-hidden="true" style="color:green;font-size:23px;"></i></div></div>
               </div>
             <meta http-equiv="Refresh" content="4; url=//localhost/logiciel_OCD/reservation/data_homes.php?id_home='.$id_home.'&home_user='.$home_user.'&data_start='.$data_start.'&data_end='.$data_end.'"/>';
	 }
?>

</html>
</body>
