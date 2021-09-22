<?php
include('connecte_db.php');
include('inc_session.php');

if(!isset($_GET['home'])) {
	
	header('location:index.php');
} 

   // requete pour aller chercher les valeurs 
   $home = $_GET['home'];
  // emttre la requete sur le fonction
    $req=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,occupant,nombre_lits,equipements,equipement,cout_nuite,cout_pass,icons,infos,society FROM chambre WHERE id_chambre= :id_chambre AND email_ocd= :email_ocd');
    $req->execute(array(':id_chambre'=>$home,
	                    ':email_ocd'=>$_SESSION['email_ocd']
						));

    // on recupère les données
	$donnees = $req->fetch();
	// recupére les images existant
	// on recupére les equipement checkbox
	$type =$donnees['type_logement'];
	$occupant =$donnees['occupant'];
	$chambre =$donnees['chambre'];
	$nbrs_lits = $donnees['nombre_lits'];
	$cout_nuite =$donnees['cout_nuite'];
	$cout_pass =$donnees['cout_pass'];
	$infos =$donnees['infos'];
	$data = $donnees['equipement'];
	$data1  = $donnees['equipements'];
	$society = $donnees['society'];
    
	$req->closeCursor();
	 
	$res=$bds->prepare('SELECT id,name_upload FROM photo_chambre WHERE id_chambre= :id_chambre AND email_ocd= :email_ocd');
    $res->execute(array(':id_chambre'=>$home,
	                     ':email_ocd'=>$_SESSION['email_ocd']
	                     
						 ));

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - 404</title>

    <!-- Custom fonts for this template-->
  
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
     h1,select{height:35px;border-color:#eee;text-align:center;border-bottom:1px solid #eee;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:18px;font-weight:300;color:black;margin-left:%;}
    #collapse{width:300px;height:100px;padding:2%;position:fixed;top:60px;left:81%;border-shadow:3px 3px 3px black;}
    .bg{background:white;width:300px;border:2px solid #eee;height:210px;padding:4%;}
.center{background-color:white;width:80%;height:950px;} .inputs,.input{margin-left:5%;float:left;}
.nav-search{width:70%;} .form-select{margin-left:40%;width:200px;height:43px;}
.inputs{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;font-weight:bold;color:green;}
#pak{position: fixed;top: 0;left: 0;width:100%;height: 100%;background-color: black;z-index:2;opacity: 0.6;}
#examp{padding:3%;position:absolute;width:60%;height:1000px;z-index:3;left:18%;top:20px;background-color:white;border-radius:10px;}
.forms{width:200px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;font-weight:bold;color:black}
h2{	font-size:16px;margin-top:30px;width:500px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;color:#4e73df}

input{width:50px;}
#file1,#file2,#file3,#file4{width:250px;}
#inputEmail4{width:250px;}
textarea{width:50%;} #his{width:250px;margin-left:70%;height:40px;background:#4e73df;border:2px solid #4e73df;color:white;font-family:arial;border-radius:15px;}

 #pak{width:200px;position: fixed;top: 0;left: 0;width:100%;height: 100%;background-color: black;z-index:2;opacity: 0.6;}
label{color:black;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;font-weight:bold;color:black}
 .dep {
  animation: spin 2s linear infinite;
  margin-top:10px;font-size:45px;font-weight:bold;
  }

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
#pak{position: fixed;top: 0;left: 0;width:100%;height: 100%;background-color: black;z-index:2;opacity: 0.6;}
.enre{font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;color:black;z-index:4;position:absolute;top:130px;left:40%;border:2px solid white;font-family:arial;font-size:14px;width:280px;height:150px;padding:2%;text-align:center;background-color:white}

.x{color:#4e73df;font-weight:bold;} .ts{padding-left:4%;} .center{width:90%;margin-left:5%;background-color:white;}
.table{width:80%;margin-left:5%;margin-top:14px;} td,th{border:1px solid #5bbaff;text-align:center;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:14px;color:black;}
th{text-align:center;background:#4c76b2;color:white;font-size:13px;border-color:1 px solid #5bbaff}
.div{color:green;} #block_delete{position: absolute;top:200px;left:40%;width:370px;;height:160px;background-color:white;z-index:4;}
 h3{color:black;padding-top:5%;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:16px;text-align:center;}
 #button_annuler{width:120px;margin-left:6%;height:40px;color:white;background:red;margin-top:20px;border:2px solid red;text-align:center;border-radius:15px;}
 #button_delete{width:50px;height:40px;background:#4e73df;color:white;border-radius:50%;margin-left:10%;margin-top:20px;border:2px solid #4e73df;}
 .enr{color:white;padding:2%;font family:arial;background:red;width:150px;height:25px;}
 #data_delete{position:absolute;top:200px;left:15%;} #forms {color:black;}
 .d{border:1px solid #eee;} .homes{overflow-y:scroll;z-index:4;position:absolute;top:20px;left:15%;display:none;width:70%;height:900px;background:white;border:2px solid #eee;} . der{padding-left:2%;}
 .imgs{border-radius:20%;font-weight:bold;width:110px;color:white;text-align:center;padding:1%;background:#FF7133;border:2px solid #FF7133;color:block;margin-top:6px;margin-left:25%;}
 .text_img{padding:1.5%;border:4px solid #eee;width:355px;}
 
 .side{color:#A9D3F2;padding:35%;text-align:center;margin-left:-8%;width:160px;height:160px;border-radius:50%;background:white;border:2px solid white;margin-top:105px;}
ul a{margin-left:3%;} #form_logo{display:none;} #logo{position:absolute;top:30px;left:1.7%;border-radius:50%;}

#message_datas{padding-left:2%;padding-bottom:8px;position:absolute;}
.drop{position:absolute;top:50px;width:240px;height:350px;background:white;border:2px solid white;margin-left:-5px;
background-color: white;
border-radius: 20px;
border-width: 0;
box-shadow: rgba(25,25,25,.04) 0 0 1px 0,rgba(0,0,0,.1) 0 3px 4px 0;
color: black;
cursor: pointer;
display: inline-block;
font-family: Arial,sans-serif;
font-size: 1em;
padding: 0 30px;
transition: all 200ms;
position:absolute;
z-index:3;
}

.ss{padding:2%;width:20px;height:20px;border-radius:40%;border:2px solid #eee;background:#e74a3b;color:white;
margin-left:-10px;} .datas_messanger{border-bottom:1px solid #eee;}

.drops{display:none;}  .users{display:none} #news_data{display:none;}
.mobile{display:none}
.sidebar .nav-item .nav-link span{font-size:14px;font-weight:bold;text-transform:capitalize;}
.navbar-nav{background:#06308E;} .dg{padding-left:2%;color:black;font-size:13px;}
.btn{display:none;}


@media (max-width: 575.98px) { 
#panier{display:none;}
#logo{display:none;} .side{display:none;} .bs{display:none;}.bg{display:none;}
.cont1,.cont12,.cont13,.cont14{display:block;width:250px;margin-top:8px;margin-left:7%;}
.cont2{display:block;width:250px;margin-top:10px;margin-left:8%;} .center{width:95%;height:2100px;}
ul{display:none;}
.bg-gradient-primary{display:none;} .contens,.contens1{display:block;width:250px;margin-top:10px;margin-left:8%;}
.drop{position:absolute;left:7%;width:300px;}
.drops{z-index:4;padding-left:5%;position:absolute;position:absolute;left:1%;width:350px;display:block;background:white;
height:2800px;overflow-y:scroll} h2{margin-top:20px;border-top:1px solid #eee;color:black;}

}

@media (min-width: 768px) and (max-width: 991px) {
#panier{display:none;}
#logo{display:none;} .side{display:none;} .bs{display:none;}.bg{display:none;}
#accordionSidebar{display:none;} .center{width:100%;margin:0;padding:0;height:1000px;}
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
.center{height:1400px;} .der1{display:none;}
}


@media (min-width: 992px) and (max-width: 1200px) {
#panier{display:none;}
#logo{display:none;} .side{display:none;} .bs{display:none;}.bg{display:none;}
#accordionSidebar{display:none;} .center{width:100%;margin:0;padding:0;height:1000px;}
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
.center{height:1600px;} 
}

</style>

</head>

<body id="page-top">

           <?php include('inc_menu_principale.php');?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <!-- End of Sidebar -->
        

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="navbar-search">
                        <div class="input-group">

                        <div class="input"><select class="form-select form-select-sm" aria-label=".form-select-sm example">
                           <option selected>Type de chambre</option>
                           
                         </select>
                          </div>  
                        </div>
                    </form>

                    <?php include('inc_menu1.php');?>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- 404 Error Text -->
                    <div class="center">
                    <!--formulaire affiche-->
  <form method="post" id="forms"  enctype="multipart/form-data">
  <h1> <i class='fas fa-house-user' style='font-size:20px'></i> Formualire pour modifier les données d'un local,une chambre ou un appartement de votre espace Hotelier</h1>
   
   <div class="form-row">
    <div class="form-group col-md-6">
	<h2><i style="font-size:16px" class="fa">&#xf044;</i> Informations relatives au type du local</h2>
      <label for="inputPassword4">type de local *</label>
      <select name="type" class="forms form-select-sm" aria-label=".form-select-sm example">
                           <option value="<?phpecho$type?>"><?phpecho$type;?></option>
						   <option value="0">chambre single</option><option value="1">chambre double</option>
                           <option value="2">chambre triple</option><option value="3">chambre twin</option><option value="4">chambre standard</option><option value="5">chambre deluxe</option>
                          <option value="6">studio double</option>
                          </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Autre type</label>
      <input type="text" class="form-control" name="typs" id="inputEmail4" value="<?php echo$type;?>">
    </div>
  

   <div class="form-group col-md-6">
      <label for="inputEmail4">identifier votre local *</label>
      <input type="text" class="form-control" name="ids" id="ids" required value="<?php echo$chambre;?>" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">occupants possible *</label>
      <input type="number" class="form-control" id="num" name="num" value="<?php echo$occupant;?>" required>
    </div>
     <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre de lits*</label>
      <input type="number" class="form-control" id="nums" name="nums" value="<?php echo$nbrs_lits;?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">cout nuité *</label>
      <input type="number" class="form-control" id="count" name="cout" value="<?php echo$cout_nuite;?>" required>
    </div>
    
	<div class="form-group col-md-6">
      <label for="inputPassword4">cout pass </label>
      <input type="number" class="form-control" id="counts" name="couts" value="<?php echo$cout_pass;?>">
    </div>
    
	<div class="form-group col-md-6">
      <label for="inputPassword4">Nom du site </label>
      <input type="text" class="form-control" id="site" name="site" value="<?php echo$society;?>">
    </div>
	
     <div class="form-group col-md-12">
        <h2><i style="font-size:14px" class="fa">&#xf044;</i> Informations relatives aux equipements principales du local</h2>

      <div class="custom-checkbox">
      <input type="checkbox" name="ch[]"  value="<i style='font-size:13px' class='fa'>&#xf2dc;</i> climatisation" <?php $a = "climatisation"; if(strpos($data,$a) !== false){echo'checked';} else{} ?>> <i style='font-size:13px' class='fa'>&#xf2dc;</i> climatisation
     <input type="checkbox" name="ch[]"  value="<i style='font-size:13px' class='fa'>&#xf108;</i> télévision" <?php $a = "télévision"; if(strpos($data,$a) !== false){echo'checked';} else{} ?>> <i style='font-size:13px' class='fa'>&#xf108;</i> télévision<input type="checkbox" name="ch[]"  value="<i style='font-size:14px' class='fa'>&#xf1eb;</i> wiffi">  <i style='font-size:14px' class='fa'>&#xf1eb;</i> wiffi</td> <input type="checkbox" name="ch[]"  value="<i style='font-size:14px' class='fa'>&#xf2a2;</i> salle de baim"> <i style="font-size:14px" class="fa">&#xf2a2;</i> salle de bains
     <input type="checkbox" name="ch[]" value="<i style='font-size:16px' class='fas'>&#xf0f4;</i> Déjeuner" <?php $a = "Déjeuner"; if(strpos($data,$a) !== false){echo'checked';} else{} ?>> <i style="font-size:14px" class="fas">&#xf0f4;</i> Déjeuner
	 </div>
	 
	 <h2><i style="font-size:14px" class="fa">&#xf044;</i> Informations relatives aux equipements secondaires du local</h2>
    <input type="checkbox" name="choix[]"  value="toilletes" <?php $a = "toilletes"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> toilletes
    <input type="checkbox" name="choix[]"  value="armoie ou penderie" <?php $a = "armoie"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> armoie ou penderie  
   <input type="checkbox" name="choix2[]" value="chaines satellite" <?php $a = "chaines satellite"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> chaines satellite
   <input type="checkbox" name="choix2[]"  value="prise près du lit" <?php $a = "prise près du lit"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> prise près de lit <input type="checkbox" name="choix[]"  value="espace pour pc"> espace pour pc</td> 
   <input type="checkbox" name="choix[]"  value="portant" <?php $a = "portant"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> portant<br/>
    <input type="checkbox" name="choix[]"  value="baignoire ou douche" <?php $a = "baignoire ou douche"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> Baignoire ou douche
   <input type="checkbox" name="choix[]"  value="télephone" <?php $a = "télephone"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> télephone
   <input type="checkbox" name="choix[]"  value="microonde" <?php $a = "microonde"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> microonde
   <input type="checkbox" name="choix[]"  value="fer à repasser" <?php $a = "fer à repasser"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> fer à repasser
   <input type="checkbox" name="choix[]"  value="réfrigérateur" <?php $a = "réfrigerateur"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> réfrigerateur
    <input type="checkbox" name="choix[]"  value="machine à laver" <?php $a = "machine à laver"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> machine à laver<br/>
     <input type="checkbox" name="choix[]"  value="papier toillete" <?php $a = "papier toillette"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> papier toillete
    <input type="checkbox" name="choix[]"  value="séche cheveux" <?php $a = "séche cheveux"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> séche cheveux
   <input type="checkbox" name="choix[]"  value="petit café" <?php $a = "petit café"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>>  petit café
   <input type="checkbox" name="choix[]" value="déjeuner" <?php $a = "déjeuner"; if(strpos($data1,$a) !== false){echo'checked';} else{} ?>> déjeuner
	</div>
      
    </div>
   <h2>Informations facultatives</h2>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">informations complementaire</label>
    <textarea class="form-control" name="infos" id="infos" rows="3"><?php echo$infos;?></textarea>
  </div>
  
  <div class="d"><i class="fas fa-camera"></i> Prise de photo de votre local(au moins 4images)
  <span class="der"><a href="#" class="der">visualiser les images existant</a></span></div>
  <input type="file" class="test" name="fil[]" id="file1"><input type="file" class="test" name="fil[]" id="file2"><input class="test" type="file" name="fil[]" id="file3">
  <input type="file" class="test" name="fil[]" id="file4">
  
  <div><input type="submit" value="Modifier les données" id="his"/></div>
<input type="hidden" name="token" id="token" value="<?php
//Le champ caché a pour valeur le jeton
echo$_SESSION['token'];?>">
  </form><!--fin du form-->
  </div>
	
    <?php 

	echo'<div class="homes">';
	while($donnes = $res->fetch()){
	 
	 echo'<div class="text_img"><a href="#" ><img src="upload_image/'.$donnes['name_upload'].'" width="300" height="250"></a><br/>
	 <button type="button" data-id2="'.$donnes['id'].'" class="imgs">suprimer</button></div>';
	}
	echo'</div>';
 ?>	
					
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

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
 <div id="html"></div><!--affichage retour ajax-->
 <div id="examp" style="display:none">
 <div id="error"></div><!--affichage erreur-->

  <div id="delete_img"></div><!-- affichage retour ajax-->

 </div>

</div>

<div id="data_delete"></div><!--retour ajax-->

<!--div black-->
<div id="pak" style="display:none"></div>

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
    <?php include('inc_foot_scriptjs.php');?>
  <script type="text/javascript">
   $(document).ready(function(){

    $('#sms').click(function(){
	$('.drop').slideToggle();
	});
	
	 $('#news_data').click(function(){
	$('.drops').slideToggle();
	$('.drop').css('display','none');
	 });

   $('#but').click(function(){
   $('#examp').css('display','block');
   $('#pak').css('display','block');
 });
 
 
 
 $('#pak').click(function(){
	$('#examp').css('display','none');
   $('#pak').css('display','none');
   $('#block_delete').hide(); 
   $('.homes').css('display','none');   
 });
 
 
  $('.der').click(function(){ 
	// recupére la variable
	var text = $('.homes').text();
	if(text.length !=""){
	$('.homes').css('display','block');
	$('#pak').css('display','block');
	}
 });
 
 
 // compter le nombre de class
  var thecount = $('.text_img').length;
  
  if(thecount > 3) {
	$('#file2').hide();
	$('#file3').hide();
	$('#file4').hide();
	  
  }
  
  else if(thecount > 1) {
	 $('#file3').hide();
	$('#file4').hide(); 
	  
  }
  
  else if(thecount == 1){
	$('#file1').hide();	 
}

else if(thecount ==4){
	$('#file1').hide();
	$('#file2').hide();
	$('#file3').hide();
	$('#file4').hide();
}

else{
	
	
}
  
  $('#sms').click(function(){
	$('.drop').slideToggle();
	});
	
	// compter les nouveaux message
	function views() {
				var action="fetchs";
				$.ajax({
					url: "news_messages.php",
					method: "POST",
					data:{action:action},
					success: function(data) {
						$('#resultats_messages').html(data);
					}
				});
			}

			views();
			
	// click sur les news message
	
	// compter les nouveaux message
	function view() {
				var action="news";
				$.ajax({
					url: "messanger_datas.php",
					method: "POST",
					data:{action:action},
					success: function(data) {
						$('#sms').html(data);
					}
				});
			}

			view();
			
	// click sur les news message
	
	$(document).on('click','#sms',function(){
		  var action ="click";
		  $.ajax({
            type: 'POST',
            url:'messanger_datas.php',
            data:{action:action},
            async:true,
            success: function(data){
            $('#message_datas').html(data);
	         view();
		    }
          });
		  
	  });
 
 // delete home--
 $(document).on('click','.imgs', function(){
	 // recupere la variable
	 var ids = $(this).data('id2');
	 var action = "delete_img";
    // affiche les differentes
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'data_delete.php',// on traite par la fichier
	data:{ids:ids, action:action},
	success:function(data) { // on traite le fichier recherche apres le retour
     $('#delete_img').html(data);
     }
		
	});
	
	 setInterval(function(){
		 $('#delete_img').html('');
		 location.reload(true);
	 },3000);

 });
 
 $('#forms').on('submit', function(event) {
 event.preventDefault();
 var form_data =$(this).serialize();
  var regex = /^[a-zA-Z0-9]{2,15}(\s[a-zA-Z0-9]{2,20}){0,4}$/;
 var rege = /^[a-zA-Z0-9-]{2,15}(\s[a-zA-Z0-9-]{2,15}){0,3}$/;
 var number = /^[0-9]{1,2}$/;
 var inf = /^[a-zA-Z0-9éàèçé]{0,200}$/;
 var sites = /^[a-zA-Z0-9éàèçé]{0,80}$/;
// on ecrits les variable
var ids =$('#ids').val();
var num =$('#num').val();
var nums =$('#nums').val();
var infos = $('#infos').val();
var site = $('#society').val();


 if(ids.length> 50) {
	$('#error').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i>nombre max de caractère est de 50 nom du client');
	}
	
	else if(num.length > 3) {
	$('#error').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i>nombre max de caractère est de 50 nom du client');
	}
	
	else if (!number.test(num)){
      $('#error').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur de syntaxe sur le nombre compris en 1 et 9 ');
      $('#num').css('border-color','red');
	}
	
	else if (!number.test(nums)){
      $('#error').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur de syntax sur le nombre compris entre 1et 9');
      $('#nums').css('border-color','red');
	}
	
	else if (!sites.test(site)){
      $('#error').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> erreur de symtaxe sur le nom du site(moins de 80 caractères');
      $('#nums').css('border-color','red');
	}
	
	else if (infos.length >300){
      $('#error').html('<i style="font-size:15px;color:red;" class="fa">&#xf05e;</i> nombre de caractères pour les informations ne peuvent pas dépasser 200');
      $('#infos').css('border-color','red');
	}
	
	else{

  $.ajax({
	type:'POST', // on envoi les donnes
	async: false,
	url:"enregistrer_edit_home.php?home=<?php echo$_GET['home'];?>",
    data:new FormData(this),
	contentType:false,
	processData:false,
	success:function(data) {
	$('#html').html(data);
	$('#forms').css('display','none');
	$('#examp').css('display','none');
	}
   });
   
   } 

 });
 });
 
</script>
</body>

</html>