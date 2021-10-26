<?php
include('connecte_db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>logiciel innovant</title>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	  
	<style>
	body{
        padding-top:4.2rem;
		padding-bottom:4.2rem;
		background:rgba(0, 0, 0, 0.76);
        }
        a{
         text-decoration:none !important;
         }
         h1,h2,h3{
         font-family: 'Kaushan Script', cursive;
         }
          .myform{
		position: relative;
		display: -ms-flexbox;
		display: flex;
		padding: 1rem;
		-ms-flex-direction: column;
		flex-direction: column;
		width: 100%;
		pointer-events: auto;
		background-color: #fff;
		background-clip: padding-box;
		border: 1px solid rgba(0,0,0,.2);
		border-radius: 1.1rem;
		outline: 0;
		max-width: 500px;
		 }
         .tx-tfm{
         text-transform:uppercase;
         }
         .mybtn{
         border-radius:50px;
         }
        
         .login-or {
         position: relative;
         color: #aaa;
         margin-top: 10px;
         margin-bottom: 10px;
         padding-top: 10px;
         padding-bottom: 10px;
         }
         .span-or {
         display: block;
         position: absolute;
         left: 50%;
         top: -2px;
         margin-left: -25px;
         background-color: #fff;
         width: 50px;
         text-align: center;
         }
         .hr-or {
         height: 1px;
         margin-top: 0px !important;
         margin-bottom: 0px !important;
         }
         .google {
         color:#666;
         width:100%;
         height:40px;
         text-align:center;
         outline:none;
         border: 1px solid lightgrey;
         }
          form .error {
         color: #ff0000;
         }
         #second{display:none;}
		 label {text-transform:uppercase;}
		 #sub{height:50px;background:#057ABD;width:350px;border:2px solid #0769BA;color:white;border-radius:10px;cursor:pointer;} .text{size:11px;text-align:center;}
			 #as,#ass{position:absolute;color:red;top:300px;z-index:3;left:25%;width:300px;}
			.contact{color:#CE6C0A;font-weight:bold;}
			.dnn{width:300px;margin-left:3%;margin-top:5px;margin-bottom:10px;color:red;font-size:16px;}
			 
	   @media (max-width: 575.98px) { 
	   #sub{height:50px;background:#0769BA;width:300px;border:2px solid #0769BA;color:white;border-radius:10px;cursor:pointer;} 
	   }
	   
	   @media (min-width: 768px) and (max-width: 991px) {
		 .myform{width:400px;margin-left:-15%;}  
	   }
	   
	   @media (min-width: 992px) and (max-width: 1200px) {
		   
		   #sub{height:50px;background:#0769BA;width:300px;border:2px solid #0769BA;color:white;border-radius:10px;cursor:pointer;} 
	   }
	</style>
</head>
<body>
    <div class="container">
        <div class="row">
			<div class="col-md-5 mx-auto">
			<div id="first">
				<div class="myform form ">
					 <div class="logo mb-3">
						 <div class="col-md-12 text-center">
							<div><img src="image/logo.jpg" width="180px" height="100px"></div>
						 </div>
					</div>
                   <form action="index.php"  method="post" id="user_admin" >
                           <div class="form-group">
                              <label for="exampleInputEmail1">Entrez votre EMAIL</label>
                              <input type="email" name="email_ocd"  class="form-control" id="email_ocd" aria-describedby="emailHelp" placeholder="e-mail">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Votre Mot de pass</label>
                              <input type="password" name="id_ocd" id="id_ocd"  class="form-control" aria-describedby="emailHelp" placeholder="Password"><br/><span id="as"></span><span id="ass"></span><!--retour ajax-->
                           </div>
                            
                           <div class="col-md-12 text-center ">
                              <button  type="submit" class="login100-form-btn" id="sub" onKeyPress="if(event.keyCode == 13)envoi()">
							Connectez vous
						</button>
						<?php
						// traiter le formulaire 
						if(isset($_POST['id_ocd'])) {
  $jour = array("Dim","Lun","Mar","Mercredi","Jeu","Vendr","Sam");
   $mois = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
    $dateDuJour = $jour[date("w")]." ".date("d")." ".$mois[date("n")]." ".date("Y");
    $date=$dateDuJour;
    $heure = date('H:i');
	$date = date('Y-m-d');
	// token reset password
	$dates1 = explode('-',$date);
	$j = $dates1[2];
	$mm = $dates1[1];
	$an = $dates1[0];
	
	$dat = $j.'-'.$mm.'-'.$an;
	
	$req=$bdd->prepare('SELECT email_ocd,email_user,password,user,permission,active,code,society, id_visitor FROM inscription_client WHERE email_user= :email_user');
   $req->execute(array(':email_user'=>$_POST['email_ocd']));
   $donnees=$req->fetch();
	$req->closeCursor();
    
	if(password_verify($_POST['id_ocd'],$donnees['password']) AND $donnees['email_ocd']=="") {	
	echo'<SCRIPT LANGUAGE="JavaScript">
       document.location.href="gestion_create_users.php"
        </SCRIPT>';	
	}
	if(password_verify($_POST['id_ocd'],$donnees['password'])) {
		$active="off";
		if($donnees['active']!=$active) {
			$_SESSION['email_ocd']=$donnees['email_ocd'];
			$_SESSION['email_user']=$_POST['email_ocd'];
			$_SESSION['pose']= $_POST['id_ocd'];
			$_SESSION['user']= $donnees['user'];
			$_SESSION['permission'] = $donnees['permission'];
			$_SESSION['code']= $donnees['code'];
			$_SESSION['society']= $donnees['society'];
			$_SESSION['id_visitor'] = $donnees['id_visitor'];
			 $_SESSION['pmd']= sha1(uniqid('',true).'_'.mt_rand());
	          $_SESSION['ip']= $_SERVER["REMOTE_ADDR"];
			  
			  //On modifie les donnees
	           $reks=$bdd->prepare('UPDATE inscription_client SET etat=\'connecte\', date= :nvte, heure = :nvh WHERE email_user= :email_user');
			   $reks->execute(array( ':nvte'=>$date,
									':nvh'=>$heure,
		
		':email_user'=>$_POST['email_ocd']));
	 // on renvoi la page
	  if($donnees['permission']=="user:boss" OR $donnees['permission']=="user:gestionnaire"){
       echo'<SCRIPT LANGUAGE="JavaScript">
       document.location.href="tableau_data_home.php"
        </SCRIPT>';	
		}
         if($donnees['permission']=="user:employes"){
			echo'<SCRIPT LANGUAGE="JavaScript">
           document.location.href="gestion_data_home.php?data='.$dat.'"
           </SCRIPT>';	
		}
	}
		
	 else{
	 
	    $_SESSION['email_ocd']=$donnees['email_ocd'];
			$_SESSION['email_user']=$_POST['email_ocd'];
			$_SESSION['pose']= $_POST['id_ocd'];
			$_SESSION['user']= $donnees['user'];
			$_SESSION['permission'] = $donnees['permission'];
			$_SESSION['code']= $donnees['code'];
			$_SESSION['society']= $donnees['society'];
			 $_SESSION['pmd']= sha1(uniqid('',true).'_'.mt_rand());
	          $_SESSION['ip']= $_SERVER["REMOTE_ADDR"];
			  
	       echo'<SCRIPT LANGUAGE="JavaScript">
           document.location.href="gestion_datas_messanger.php"
           </SCRIPT>';	
	}
	}
	else{
	 echo'<div class="dnn" style="position:absolute">Identifiants OCD incorrectes...</div><br/>'; 
	}
	}					
?>						
						
                           <div class="col-md-12 ">
                              <div class="login-or"><br/>
                                 <hr class="hr-or">
                                
                              </div>
                           </div>
                           <div class="form-group">
                              <p class="text-center">Acccès oubliés? <a href="reset_password_ocd.php" id="signup">Recupérer ces accès !</a><br/><span class="contact">Contactez nous ici</span></p>
                           </div>
						   <div class="form-group">
                              <p class="text">Optimisation de comptabilité à distance,<br/> Tous droits  réservés  2021-2022</p>
                           </div>
						   
                        </form>
                 
				</div>
			</div>
			  
                        </form>
                     </div>
			</div>
		</div>
      
         
</body>
</html>
