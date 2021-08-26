<?php
include('connecte_db.php');
include('inc_session.php');
$id =$_POST['id'];

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
  .enre{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:12px;color:black;z-index:4;position:absolute;top:100px;left:40%;border:2px solid white;font-family:arial;font-size:16px;width:250px;height:150px;padding:2%;text-align:center;background-color:white;font-weight:none;}
  </style>
 
<?php

 if(isset($_POST['id'])){
	$id =$_POST['id'];
	echo'<div id="pak"></div>
             <div class="enre"><div></i>Afficher les factures<br/> 
		     <div class="spinner-border text-primary" role="status">
             <span class="sr-only">Loading...</span>
             </div>
               </div>
             <meta http-equiv="Refresh" content="4; url=//localhost/tresorie_ocd/gestion_facture_site.php?data_id='.$id.'"/>';
	 }


?>

</html>
</body>


<?php


  ?>