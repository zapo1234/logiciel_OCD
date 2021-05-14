<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
  <?php include('inc_entete.php');?>
  <title>Buisness solution viideaa</title>
  <meta name="description" content="" />
  <style type="text/css">
 #clean{background-color:black;opacity:0.2;width:100%;height:100%;}
 .dir{margin-left:40%;margin-top:150px;font-family:arial;}
 .loader {
  border: 10px solid #f3f3f3; /* Light grey */
  border-top: 10px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 100px;
  height: 100px;
  animation: spin 2s linear infinite;
  margin-left:40%;
  margin-top:200px;
  position:fixed;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
 
</style>
  </head>
<body>
<div id="clean"></div>
<div class="loader"></div>
<div class="dir"><img src="images/img11.png" alt="img11" width="22px" height="22px"> Vous avez bien enregsitré votre client</div>

</body>
<?php include('inc_foot_scriptjs.php');?>
<script type="text/javascript">
setTimeout(function() {
	window.location.href='index.php';
  },4000);

</script>
</html>
    
