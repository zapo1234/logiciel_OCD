<?php
include('../connecte_db.php');
include('../inc_session.php');

if(!isset($_GET['id_home']) AND !isset($_GET['home_user'])) {
  header('location:home_none.php');
}	

// recupére les variable
$id_home =$_GET['id_home'];
$home_user =$_GET['home_user'];
$req=$bdd->prepare('SELECT denomination,email_user,numero,id_visitor FROM inscription_client WHERE id_visitor= :id');
   $req->execute(array(':id'=>$_GET['home_user']));
   $donnees=$req->fetch();
	$req->closeCursor();
	
	if(!isset($_GET['home_user']) OR $_GET['home_user']!=$donnees['id_visitor']){
	header('location:home_none.php');
}

  // recupere les données des chambre 
   $reg=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,equipements,equipement,cout_nuite,cout_pass,icons,infos,nombre_lits FROM chambre WHERE id_chambre= :id_home AND  id_visitor= :home_user');
    $reg->execute(array(':id_home'=>$id_home,
	                    ':home_user'=>$home_user));
   $donns = $reg->fetch();
   $reg->closeCursor();
   
   // variable
   $button ='<button class="bu">Confirmer votre réservation</button>';
   $button1 ='<button class="retour"><a href="reservation_start.php?user_home='.$donnees['id_visitor'].'">Retour</a></button>';
    // recupere les données des chambre 
    $ret=$bds->prepare('SELECT id,name_upload FROM photo_chambre WHERE id_chambre= :id_home AND email_ocd= :email_ocd');
    $ret->execute(array(':id_home'=>$id_home,
	                    ':email_ocd'=>$_SESSION['email_ocd']));
	// creéation et recuperation des valeur dans un tableau
	$donnes =$ret->fetchAll();
	$data =[];
	foreach($donnes as $datas){
	$da = $datas['name_upload'];
	$datac = explode(',',$da);
	foreach($datac as $values){
	 $data[]=$values;
	}
	}
	 if($donns['nombre_lits']==1){
	$lits = '<i class="fas fa-bed"></i>';
	}
	elseif($donns['nombre_lits']==2){
	 $lits ='<i class="fas fa-bed"></i> <i class="fas fa-bed"></i>';	
	}
	else{
		$lits='<i class="fas fa-bed"></i> <i class="fas fa-bed"></i>
		       <i class="fas fa-bed"></i> plus...';
		}
	
	$reg->closeCursor();
     $rem='<span class="ts"></span>';
	$rt=",";
	$rs='<span class="ts"><i style="font-size:12px;font-weight:200px" class="fa">&#xf00c;</i></span>';
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

    <!-- Custom fonts for this template-->
    <!-- Custom fonts for this template -->
	<link rel="stylesheet" href="/lib/w3.css"><!-- bar progression indicateur-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
     .s{display:none;}
	 h1,select{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:18px;margin-left:8%;color:black}
	 .x{display:none;position:absolute;top:50px;left:80%;z-index:5;cursor:pointer;}
    #collapse{background:white;width:200px;height:800px;position:absolute;top:60px;left:82%;border-shadow:3px 3px 3px black;}
    
    .bs{background:#eee;width:250px;border:1px solid #eee;background:white;}
	.bc{background:white;width:250px;border:1px solid #eee;margin-top:30px;margin-left:3%;color:black;padding:2%;overflow-y:scroll;height:400px;}
	
	.bd{margin-top:10px;margin-left:3%;} .users{width:250px;background:white;color:black;padding:2.5%;margin-left:4%;}
		
.center{background-color:white;width:80%;height:1250px;padding:1.5%;margin-top:5px;} .inputs,.input{margin-left:5%;float:left;}
.nav-search{width:70%;} 

.content2{margin-left:0.2%;}
.dt{font-size:12.3px;color:green;} .prix,.pric{border:1px solid #eee;width:30%;margin-left:2%;}
.dc{padding-bottom: 5px;font-size:14px;font-weight: bold;color: #ACD6EA;} .but2 a{font-size:11px;padding:0.8%;margin-left:50%;background:#111E7F;color:white;text-decoration:none;border:2px solid #111E7F;border-radius:15px;} .but1{margin-left:3%;}

#pak{position: absolute;top: 0;left: 0;width:100%;height: 100%;background-color: black;z-index:2;opacity: 0.8;}
.center{background:#eee;} 

.navbar-nav{background:#eee;}
 .btn{display:none;}
.sup{cursor:pointer;color:white;font-size:12px;}
.but{margin-left:60%;width:200px;height:38px;margin-top:20px;margin-bottom:20px;border: 2px solid #0769BA;background:#0769BA;color:white;}
h1{margin-top:18px;} .resul a{padding:2%;font-size:20px;color:black;width:15%;} .resul{padding:2%;border-bottom:2px solid white;border-top:2px solid white;} .add,.adds{margin-top:5px;margin-left:10%;background:#0769BA;border:2px solid #0769BA;color:white;border-radius:15px;} .resul a:hover{text-decoration:none;} .homesoccupe{display:none;}
.button{width:200px;height:35px;background:green;color:white;border:2px solid green;font-weight:bold;} 
#examp{background:white;width:35%;height:250px;position:absolute;z-index:4;left:30%;top:100px;padding:2%;} .libre{display:none;}
h3{text-center:center;color:#0769BA;} .buttons{margin-left:50%;width:250px;height:40px;background:#0769BA;
color:white;border:2px solid #0769BA;margin-top:20px;font-weight:bold;border-radius:20px;}
label{color:black;font-size:13px;}
table{background:white;} th,td{color:black;font-weight:200}
.vert{font-size:13px;color:green;}
.trs{font-size:25px;color:black;font-weight:bold;}
.df,.data_total{padding-left:2%;color:black;font-family:arial;font-size:23px;}
h3{margin-left:25%;} .recap{text-align:center;margin-left:2%;}
.rows{background:white;width:100%;height:650px;}
.der{float:left;margin-left:2%;margin-top:2%;} #days,#das{width:180px;}
.bu{margin-top:130px;margin-left:26%;width:200px;border-radius:20px;border-radius:20px;
background:#0769BA;border:2px solid #0769BA;color:white;font-weight:bold;}
.retour{color:white;margin-top:20px;margin-left:26%;width:200px;border-radius:20px;border-radius:20px;padding:3%;
background:green;border:2px solid green;color:white;font-weight:bold;}
.retour a{color:white;}
label{width:200px;}#nbjour{width:150px;}
#error{color:red;font-size:13px;} #tab{border-bottom:1px solid #eee;padding:2%;width:200px;} .recap{font-size:20px;color:black;}
.forms{margin-left:10%;} .resultat{margin-left:5%;}
.user_home{position:absolute;top:100px;left:25%;width:30%;background:white;height:570px;z-index:4;padding:5%;} #name,#adresse,#numero,#email{width:250px;}
#envoi{margin-left:25%;width:200px;height:40px;border-radius:20px;}
.hotes{width:95%;color:black;} .hote{margin-left:40%;text-transform:capitalize;font-size:18px;}
.numero{margin-left:3%;} .email{margin-left:3%;}
.der{border:6px solid #eee;cursor:pointer} .error_date{color:red;font-size:12px;}
#mobile{display:none;} #envoi{display:block;} .users{display:none;}
.carous{z-index:4;width:55%;height:400px;position:absolute;left:20%;top:50px;background:white;}

.ml2 {
  font-weight: 700;
  font-size: 1.5em;
  color:green;
}

.ml2 .letter {
  display: inline-block;
  line-height: 1em;
}

.ter {
  font-weight: 900;
  font-size: 1em;
  color:#C10D23;
}

#test{color:green}  .data{display:none;} .img,.imgs{display:none;}
.calenda{display:none;} #panier_mobile{display:none;}
.adds{display:none;}
/*------------------------------------------------------------------
[ Responsive ]*/
@media (max-width: 575.98px) { 
.s{display:block;}

#logo{display:none;} .side{display:none;} .bs{display:none;}.bg{display:none;}
.cont1,.cont12,.cont13,.cont14{display:block;width:250px;margin-top:8px;margin-left:7%;}
.cont2{display:block;width:250px;margin-top:10px;margin-left:8%;} .center{width:95%;height:2400px;}
.us{margin-top:5px;border-bottom:1px solid #eee;color:black;}
#news_data{display:block;} #news{display:none;} .users{display:block;color:black;}
#accordionSidebar{width:100px;} .btn{display:block;}#searchDropdown{display:none;} 
#collapse{display:none;position:absolute;left:1%;height:1500px;}
#im{display:none;} #accordionSidebar{display:none;width:70%;}
.resul{padding:2%;border-bottom:2px solid white;height:145px;border-top:2px solid white;} .add,.adds{margin-top:5px;margin-left:10%;background:#0769BA;border:2px solid #0769BA;color:white;border-radius:15px;} .resul a:hover{text-decoration:none;} .homesoccupe{display:none;}
.button{width:200px;height:35px;background:green;color:white;border:2px solid green;font-weight:bold;} .table{display:none;} #mobile{display:block;background:white;color:black;padding-left:4%;font-size:16px;}
#examp{background:white;width:90%;height:300px;position:absolute;z-index:4;left:5%;top:100px;padding:2%;}.hote,.numero,.email{display:none;} 
.rows{background:white;width:120%;height:650px;margin-left:-3%;} .der{margin-left:-3%;
margin-top:5px;} h3{font-size:20px;margin-left:3Px;margin-top:5px;}
.dat{margin-top:3px;border-bottom:2px solid #eee;}
.buttons{margin-left:10%;width:250px;height:40px;background:#0769BA;
color:white;border:2px solid #0769BA;margin-top:20px;font-weight:bold;border-radius:20px;}
#days,#das{width:250px;}
.resul a{padding:1%;color:black;width:50px;}
.resul{width:500px;padding:1%;border-bottom:2px solid white;border-top:2px solid white;} .data{display:block;} .button{display:none;} .img{display:block;} .calenda{display:block;} .data,.img,.calenda{float:left;} .calenda{margin-left:30%;}
.img{margin-left:10%;} #panier_mobile{display:block;} .titre{display:block;}
#collapse{background:white;width:400px;height:800px;position:absolute;top:60px;left:4%;border-shadow:3px 3px 3px black;}
.bu{margin-top:100px;margin-left:20%;width:200px;border-radius:20px;border-radius:20px;} .bc{width:330px;} .user_home{width:300px;margin-left:-10%;}
.carous{margin-top:150px;width:330px;margin-left:-12%;}
.panier{background:red;color:white;border-radius:50%;border-color:red;}
.add{display:none;}
}

@media (min-width: 768px) and (max-width: 991px) {
#logo{display:none;} .side{display:none;} .bs{display:none;}.bg{display:none;}
 .center{width:100%;margin:0;padding:0;height:2000px;}
 .add,.adds{margin-top:5px;margin-left:10%;background:#0769BA;border:2px solid #0769BA;color:white;border-radius:15px;}
cont1,.cont12,.cont13,.cont14,.titre{font-size:14px;}
 h2{margin-top:20px;border-top:1px solid #eee;color:black;}
.us{margin-top:5px;border-bottom:1px solid #eee;color:black;margin-left:10%;}
#news_data{display:block;} #news{display:none;} 
.users{display:block;color:black;font-family:arial;font-size:13px;} h2{margin-left:3%;}
#caisse{font-size:14px;} .tds,.tdv,.tdc{font-size:22px;font-weight:bold;}
.user{padding-left:7%;} .dtt,.dts{font-size:20px;} .h1{font-size:14px;}
.btn{display:block;} 

.drop{position:absolute;width:300px;left:-20%;top:100px;background:white;}
.drops{padding:2%;position:absolute;left:-40%;width:500px;background:white;
height:2800px;overflow-y:scroll;z-index:5;}
#searchDropdown{display:none;} 
#collapse{displayposition:absolute;display:none;left:62%;height:1200px;}
.img{display:block;} .calenda{display:block;} .data,.img,.calenda{float:left;} .calenda{margin-left:35%;}
.img{margin-left:10%;} #panier_mobile{display:block;} .titre{display:block;}
#collapse{background:white;width:250px;height:800px;position:absolute;top:60px;left:65%;border-shadow:3px 3px 3px black;}
.bu{margin-top:100px;margin-left:20%;width:200px;border-radius:20px;border-radius:20px;} .user_home{width:400px;margin-left:-10%;}
.hote{display:none;}.button{display:none;} .numero{display:none;}
.email{display:none;} .calenda{margin-left:75%;}
.carous{margin-top:150px;width:550px;margin-left:-12%;}
#examp{background:white;width:70%;height:300px;position:absolute;z-index:4;left:10%;top:100px;padding:2%;border:3px solid white;}
.data{display;block;} .panier{border-radius:50%;background:red;border-color:red;color:white;}
.adds{display:block;}
}


@media (min-width: 992px) and (max-width: 1200px) {
#panier{margin-left:-30%;}
#logo{display:none;} .side{display:none;} .bs{display:none;}.bg{display:none;}
#accordionSidebar{display:none;} .center{width:100%;margin:0;padding:0;height:1700px;}
cont1,.cont12,.cont13,.cont14,.titre{font-size:14px;}
 h2{margin-top:20px;border-top:1px solid #eee;color:black;}
.us{margin-top:5px;border-bottom:1px solid #eee;color:black;margin-left:10%;}
#news_data{display:block;} #news{display:none;} 
.users{display:block;color:black;font-family:arial;font-size:13px;} h2{margin-left:3%;}
#caisse{font-size:14px;} .tds,.tdv,.tdc{font-size:22px;font-weight:bold;}
.user{padding-left:7%;} .dtt,.dts{font-size:20px;} .h1{font-size:14px;}
.btn{display:block;} 

.drop{position:absolute;width:300px;left:-20%;top:100px;background:white;}
.drops{padding:2%;position:absolute;left:-40%;width:500px;background:white;
height:2800px;overflow-y:scroll;z-index:5;} #searchDropdown{display:none;}
#collapse{position:absolute;display:none;width:300px;left:75%;height:800px;}
.hote{margin-left:14%;} 
.user_home{position:absolute;top:80px;left:21%;width:48%;background:white;height:570px;z-index:4;padding:5%;}
.bu{margin-top:100px;margin-left:25%;width:200px;border-radius:20px;border-radius:20px;background:green;border:2px solid green;color:white;font-weight:bold;}
.imgs{display:block;position:absolute;left:90%;top:20px;}
.panier{position:absolute;left:92%;border-radius:50%;background:red;border-color:red;color:white;}
}



</style>

</head>

<body id="page-top">
 <div class="x"><i class="fas fa-times" style="color:white;font-size:20px;"></i></div>
        <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <div class="navbar-nav bg-gradient sidebar sidebar-dark accordion" id="accordionSidebar">
		 <div class="df"> <?php echo date('H:i');?> en Direct</div>
		 <span class="ml2"></span>
		 <span class="ter"></span>
		  <div id="result"></div><!--retour ajax list home-->
          
		  
        </div>
		
        <!-- End of Sidebar -->
        <div id="collapse" class="collapse show" aria-labelledby="headingPages"  data-parent="#accordionSidebar">
                    <div class="bn">
                      
                  <div class="container">
 
	              
				  </div><!--live-infos-->
					  
                    </div>
					
					
					<div class="bd">
		
		<div class="users">
		
		</div>
	    <div class="bc">
		<div class="recap">Récapitulatif de réservation</div>
		<form method="post" action="">
		<div class="forms">
       <label for="inputPassword4">Numéro de jours*</label>
      <input type="number" name="nbjour" id="nbjour" class="form-control" id="inputPassword4" placeholder="" required><br/><span id="error"></span>
       </div>
	   <div class="forms">
      <label for="inputPassword4">Option</label>
      <select id="tr" class="tr" name="tr" required>
	 <option value="choix">choix</option>
	 <option value="horaire">horaire</option>
	 <option value="réservation">réservation</option>
	 </select></div>
		<div id="resultat"></div><!--requete ajax-->
		 <div id="resultats"></div><!--requete ajax-->
       </div>
       </form>
		</div>
		
        <div><?php echo$button;?></div>              
        <div><?php echo$button1;?></div>             
                </div>
               
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn rounded-circle mr-3">
                        <i class="fa fa-bars" style="color:blue"></i>
                    </button>
                     <!-- Topbar Search -->
                               <div class="hotes">
                               <button type="button" class="button">choix de disponibilité</button><span class="data"></span><span class="calenda"><i class="fas fa-calendar-alt"></i></span><span class="img"><i class="fas fa-cart-arrow-down"></i></span> <span class="hote"><?php echo $donnees['denomination'];?></span>
							   <span class="numero"><i class="fas fa-phone" style="font-size:14px;"></i> <?php echo$donnees['numero'];?></span><span class="email"><i class="fas fa-envelope"style="font-size:14px"></i> <?php echo $donnees['email_user'];?></span><span class="imgs"><i class="fas fa-cart-arrow-down"></i></span>
							   <span id="panier"></span><!--retour ajax nombre de reservation-->
                           </div>
                        
                     <?php include('inc_menu1.php');?>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- 404 Error Text -->
                    <div class="center">
					<div class="equipement">
                    <table class="table">
       <thead>
    <tr>
      <th scope="col">Type de local</th>
      <th scope="col">Equipements</th>
	  <th scope="col">Occupants</th>
	  <th scope="col">Tarif</th>
      <th scope="col">Divers</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo$donns['type_logement'];?><br/>
	  <i class="fas fa-home" style="font-size:12px"> </i><?php echo $donns['chambre'];?></th>
      <td>Equipements principaux<br/><span class="vert"><?php echo$donns['equipement'];?></span><br/><br/>
	  Equipements secondaires<br/><?php echo str_replace($rt,$rs,$donns['equipements']);?></td>
      <td>Nombre de personnes autorisés<br/><?php echo$donns['icons'];?><br/>
	      Nombre de lits au sein de la chambre<br/>
		  <?php echo$lits;?>
	  </td>
      <td>Prix nuité<br/><span class="trs"><?php echo$donns['cout_nuite'];?>xof</span><br/>Prix horaire<br/><span class="trs"><?php echo$donns['cout_nuite'];?>xof</span><br/>Description<br/><?php echo $donns['infos'];?></td>
    </tr>
    
  </tbody>
</table>

<div id="mobile">

<div><?php echo$donns['type_logement'];?><br/>
	  <i class="fas fa-home" style="font-size:12px"> </i><?php echo $donns['chambre'];?></div>
      <div class="dat">Equipements principaux<br/><span class="vert"><?php echo$donns['equipement'];?></div><br/>
	  Equipements secondaires<br/><?php echo str_replace($rt,$rs,$donns['equipements']);?></td>
      <div class="dat">Nombre de personnes autorisés<br/><?php echo$donns['icons'];?><br/>
	      Nombre de lits au sein de la chambre<br/>
		  <?php echo$lits;?>
	  </div>
      <div class="dat">Prix nuité<br/><span class="trs"><?php echo$donns['cout_nuite'];?>xof</span><br/>Prix horaire<br/><span class="trs"><?php echo$donns['cout_nuite'];?>xof</span><br/>Description<br/><?php echo $donns['infos'];?></div>
    

</div>

<div class="content">
<h3><i class="fas fa-camera"></i> Visualisez le local en images  </h3>
<div class="container">
<div class="rows">
<?php
$count= count($data);
if($count>0){
for($i=0; $i<$count; $i++){
 echo'<div class="der" data-id1="'.$i.'"><img src="upload_image/'.$data[$i].'" width="270px" height=250px"></div>';
}
}

?>
</div>
</div>

<div class="carous" style="display:none">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <?php
	$count= count($data);
	echo'<div class="carousel-item active">
      <img class="d-block w-100" src="upload_image/'.$data[0].'" alt="'.$data[0].'"
	  width="600px" height:500px">
    </div>';
	for($i=1;$i < $count; $i++){
	echo'<div class="carousel-item">
      <img class="d-block w-100" src="upload_image/'.$data[$i].'" alt="'.$data[$i].'"
	  width="500px" height:450px">
    </div>';
	}
    ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div><!--caroussel--!>
 
                     </div>
	                 </div><!--center-->

	
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<div class="user_home" style="display:none">
	 
	 <div class="form-group col-md-6">
      <label for="inputPassword4">Client *</label>
      <input type="text" name="name" id="name" class="form-control" id="inputPassword4" placeholder="Nom & prénom">
    </div>
 
    <div class="form-group col-md-6">
      <label for="inputPassword4">Numéro de phone *</label>
      <input type="number" name="numero" id="numero" class="form-control" id="inputPassword4" placeholder="entre 8 et 14 chiffre">
    </div>
     <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="text" name="email" id="email" class="form-control" placeholder="email par défaut">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Adresse </label>
      <input type="adresse" name="adresse" id="adresse" class="form-control" placeholder="facultatif">
    </div>
	 <div class="form-group col-md-6">
      <label for="inputEmail4">Solder vous un acompte? *</label>
      <input type="checkbox" id="oui" name="oui">Oui <input type="checkbox" id="oui" name="Non">Non
    </div>
	
	<div class="form-group col-md-6">
      <label for="inputEmail4">Confirmer la réservation</label>
      <button type="button" id="envoi" name="envoi">Valider</button>
    </div>
	 
	 </div><!-- information user pour la reservation-->
	   
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; optimisation de comptabilité à distance 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <!-- Modal -->
  <!--div black-->
<div id="pak" style="display:none"></div>

<div id="examp" style="display:none">
<form method="post" id="formA" action="data_home_user.php">
 <h3> check_in et check_out </h3>
   
   <div class="row mb-3">
                    <div class="col">
					  <label>Date d'arrivée</label>
                      <input type="date" id="days" name="days" class="form-control" placeholder="" min="<?php echo date('Y-m-d');?>" required>
                    </div>
                    <div class="col">
					<label>Date de départ</label>
                      <input type="date" id="das" name="das" class="form-control" placeholder="" min="<?php echo date('Y-m-d');?>" required
					  >
					  <div class="error_date"></div>
                    </div>
                </div>
  <span class="errors"></span>
   <button type="button" class="buttons">Rechercher
 <input type="hidden" name="id_visitor" value="<?php echo$home_user;?>">
 <input type="hidden" name="id_chambre" value="<?php echo$id_home;?>">
 <input type="hidden" name="data_days" id="data_days" value="<?php echo date('y-m-d');?>">
<input type="hidden" name="token" id="token" value="<?php
//Le champ caché a pour valeur le jeton
echo $_SESSION['token'];?>">

 </form>
 </div>
</div>
</div>
</div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
<script src="@@path/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <?php include('inc_foot_scriptjs.php');?>
  <script type="text/javascript">
   $(document).ready(function(){
     
	 $('#sidebarToggleTop').click(function(){
		$('#accordionSidebar').slideToggle();
		$('#collapse').css('display','none');
	 });
	 
	 $('#sms').click(function(){
	$('.drop').slideToggle();
	$('.drops').css('display','none');

	});
	
	$('.but').click(function(){
   $('#pak').hide(2000);
   $('#block').hide(1000);
 });
 
 $('.button').click(function(){
	$('#pak').css('display','block');
   $('#examp').css('display','block');	
	 $('.x').css('display','block');
 });
 
 $('.calenda').click(function(){
	$('#pak').css('display','block');
   $('#examp').css('display','block');	
	 $('.x').css('display','block');
	 
 });
 
 $('.img').click(function(){
	$('#collapse').slideToggle();
  });
  
  $('.imgs').click(function(){
	$('#collapse').slideToggle();
  });
  
  $(document).on('click','.panier',function() {
	$('#collapse').slideToggle();
  });
 
 $('.der').click(function(){
 $('.carous').css('display','block');
 $('#pak').css('display','block');
 $('.x').css('display','block');
});
 
 $('.x').click(function(){
	$('#pak').css('display','none');
   $('#examp').css('display','none');	
	$('.x').css('display','none');
	$('.user_home').css('display','none');
	$('.carous').css('display','none');
 });
 
 
 $('#pak').click(function(){
	$('#pak').css('display','none');
   $('#examp').css('display','none');
   $('.carous').css('display','none');  
   $('.user_home').css('display','none');
 });
 
$('#news_data').click(function(){
	$('#collapse').slideToggle();
	$('.drop').css('display','none');
	
	});
	
	 $('#news').click(function(){
	$('.users').slideToggle();
	});
		
   $('.buttons').click(function(){
		 event.preventDefault();
		 var dat1 =$('#days').val();
		 var dat2 = $('#das').val();
	     var date1 = new Date($('#days').val());
	     var date2 =  new Date($('#das').val());
		 if(dat1.length!="" && dat2.length!=""){
		 if(date1 > date2){
		  $('.error_date').text(' *la date de départ doit etre supérieur à la date d\'arrivée'); 
		}
		else{
		$('#formA').submit();
		}
		 }
		else{
			$('.error_date').text(' *remplir les champs de date'); 
		}
	  });
	
	$(document).on('click','.add',function() {

	var id = $(this).data('id2'); // on recupère l'id.
    var action ="add";
	// recupération des variable
	var tr =$('#tr').val();
	var id_chambre = $('#id_chambre'+id).val();
	var prix_nuite = $('#prix_nuite'+id).val();
	var prix_pass = $('#prix_pass'+id).val();
	var chambre =$('#chambre'+id).val();
	var nbjour = $('#nbjour').val();
	
	if(nbjour.length!="" || nbjour.length!=0){
	if(tr!="choix"){
	// on lance l'apel ajax
	$.ajax({
	type: 'POST', // on envoi les donnes
	url: 'add_home.php',// on traite par la fichier
	data:{action:action,tr:tr,id_chambre:id_chambre,prix_nuite:prix_nuite,prix_pass:prix_pass,chambre:chambre,nbjour:nbjour},
	success:function(data) { // on traite le fichier recherche apres le retour
		$('#resultat').html(data);
		$('#error').text('');
		$('.titre').css('display','block');
		panier();
		$('#accordionSidebar').css('display','none');
	 },
	 error: function() {
    $('#resultat').text('vérifier votre connexion'); }
	 });
	 
	 
	}
	else{
	  $('#error').text('choisir une option');
	}
	}
	else{
	  $('#error').text('fournir le nombre de jours/horaire séjour');
	}
	 });
	 
	 $(document).on('click','.adds',function() {
		 var id = $(this).data('id2'); // on recupère l'id.
    var action ="add";
	// recupération des variable
	var tr =$('#tr').val();
	var id_chambre = $('#id_chambre'+id).val();
	var prix_nuite = $('#prix_nuite'+id).val();
	var prix_pass = $('#prix_pass'+id).val();
	var chambre =$('#chambre'+id).val();
	var nbjour = $('#nbjour').val();
	
	if(nbjour.length!="" || nbjour.length!=0){
	if(tr!="choix"){
	// on lance l'apel ajax
	$.ajax({
	type: 'POST', // on envoi les donnes
	url: 'add_home.php',// on traite par la fichier
	data:{action:action,tr:tr,id_chambre:id_chambre,prix_nuite:prix_nuite,prix_pass:prix_pass,chambre:chambre,nbjour:nbjour},
	success:function(data) { // on traite le fichier recherche apres le retour
		$('#resultat').html(data);
		$('#error').text('');
		panier();
		$('#accordionSidebar').css('display','none');
	 },
	 error: function() {
    $('#resultat').text('vérifier votre connexion'); }
	 });
	}
	else{
	  $('#error').text('choisir une option');
	}
	}
	else{
	  $('#error').text('fournir le nombre de jours/horaire séjour');
	}
		
	 });
	 
	$(document).on('click','.remove',function() {
	 var id = $(this).data('id3'); // on recupère l'id.
	 var action="remove";
	 var tr =$('#tr').val();
	 var id_chambre = $('#id_chambre'+id).val();
	 var prix_nuite = $('#prix_nuite'+id).val();
	 var prix_pass = $('#prix_pass'+id).val();
	 var chambre =$('#chambre'+id).val();
	 var nbjour = $('#nbjour').val();
	 
	 $.ajax({
	type: 'POST', // on envoi les donnes
	url: 'add_home.php',// on traite par la fichier
	data:{action:action,tr:tr,id_chambre:id_chambre,prix_nuite:prix_nuite,prix_pass:prix_pass,chambre:chambre,nbjour:nbjour},
	success:function(data) { // on traite le fichier recherche apres le retour
		$('#resultat').html(data);
		$('#error').text('');
		panier();
	 },
	 error: function() {
    $('#resultat').text('vérifier votre connexion'); }
	 });
	 
	 });
	 
	 $('.bu').click(function(){
	 var count =$('.dfc').length;
	    if(count!=0){
	 	$('.user_home').css('display','block');
        $('#pak').css('display','block');
        $('.x').css('display','block');		
		}
		else{
			$('#error').text('*vous n\'avez pas choisir un local'); 
		}
       });
	 
	$('#nbjour').keyup(function(){
	var nbjour =$('#nbjour').val();
	if(nbjour==""){
		nbjour=1;
	}
	var total = $('#tota').val();
	var s = parseFloat(nbjour)*parseFloat(total);
	$('.data_total').text(s);
	});
	
	// pagintion
  $(document).on('click','.bout',function(){
	  var page =$(this).attr("id");
	  list(page);
   });
	
	// compter les nouveaux message
	function list(page) {
				var action="list";
				var  home = $('.homeslibre').length;
				var homes =$('.homesreserve').length;
				var nbr = home+homes;
			
				$.ajax({
					url: "list_datas_homes.php?home_user=<?php echo$_GET['home_user'];?>",
					method: "POST",
					data:{action:action},
					success: function(data) {
						$('#result').html(data);
						var data = $('#test').val();
						var datas = $('#tests').val();
						var dat =$('#datas').val();
						if(data.length!=""){
                        $('.ml2').html(data);
						$('.data').html(data);
						$('.ter').html('');
						}
						if(datas.length!=""){
						 $('.ter').html('<i class="fas fa-dot-circle"></i>'+datas);
						 $('.data').html(data);
						}
					  }
				});
			}

			list();
			
		function session_add(){
		      var action="adds";
				$.ajax({
					url: "add_home.php",
					method: "POST",
					data:{action:action},
					success: function(data) {
						$('#resultat').html(data);
					}
				});
			}
           session_add();
			
			// afficher le pannier
           function panier() {
				var action="count";
				$.ajax({
					url: "add_home.php",
					method: "POST",
					data:{action:action},
					success: function(data) {
						$('#panier').html(data);
					}
				});
			}

			panier();	
			
  // Wrap every letter in a span
var textWrapper = document.querySelector('.ml2');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.ml2 .letter',
    scale: [4,1],
    opacity: [0,1],
    translateZ: 0,
    easing: "easeOutExpo",
    duration: 950,
    delay: (el, i) => 70*i
  }).add({
    targets: '.ml2',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 2500
  });

});
</script>
</body>

</html>