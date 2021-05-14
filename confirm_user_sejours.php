<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
  <title>Buisness solution viideaa</title>
  <meta name="description" content="" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
 
 .deps {
  animation: spin 2s linear infinite;
  margin-top:20px;
  }

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
 

#clean{text-align:center;padding:5.5%;font-size:20px;font-weight:bold;width:450px;height:120px;
       margin-left:30%;margin-top:100px;background-color:green;font-family:arial;color:white;}
 
</style>
  </head>
<body>
<div id="clean">
<div class="dir">Vous avez bien enregistré le séjour client !</div>
<div class="deps"><i style="font-size:40px" class="fa">&#xf250;</i></div>
</div>
</body>
<?php include('inc_foot_scriptjs.php');?>
<script type="text/javascript">
setTimeout(function() {
	window.location.href='acceuil_gestion_hotel.php';
  },4000);

</script>
</html>
    
