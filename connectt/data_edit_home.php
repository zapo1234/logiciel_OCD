<?php

include('connecte_db.php');
include('inc_session.php');


if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token']))
		
{
	//Si le jeton de la session correspond à celui du formulaire
	if($_SESSION['token'] != $_POST['token'])
	{
		//On stocke le timestamp qu'il était il y a 15 minutes
		$timestamp_ancien = time() - (5*60);
		//Si le jeton n'est pas expiré
		if($_SESSION['token_time'] < $timestamp_ancien)
		{
		     echo'<body onload="alert(\'OCD ne vous reconnais pas  , vous n\'avez pas acces a la page \')">';
	           echo'<meta http-equiv = "refresh" content="0; URL= login_user_ocd.php">';
		}
	}
} 

 if(isset($_GET['home']) AND !empty($_GET['home'])) {

 // requete pour aller chercher les valeurs 
   $home = $_GET['home'];
  // emttre la requete sur le fonction
    $req=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,occupant,nombre_lits,equipements,equipement,cout_nuite,icons,infos FROM chambre WHERE id_chambre= :id_chambre');
    $req->execute(array(':id_chambre'=>$home));
	
	// on recupère les données
	$donnees = $req->fetch();
	// recupére les images existant
	// on recupére les equipement checkbox
	$data = $donnees['equipement'];
	$data1  = $donnees['equipements'];
	// on les transforme en un tableau
	$datas = explode(',', $data);
	$datas = explode(',', $data1);
	
 echo'<div>';	
 echo'<form method="post" id="forms"  enctype="multipart/form-data">
  <h1>Formualire pour modifier les données d\'un local,une chambre ou un appartement de votre espace Hotelier</h1>
   
   <div class="form-row">
    <div class="form-group col-md-6">
	<h2><i style="font-size:16px" class="fa">&#xf044;</i> Informations relatives au type du local</h2>
      <label for="inputPassword4">type de local *</label>
      <select name="type" class="forms form-select-sm" aria-label=".form-select-sm example">
                           <option value="'.$donnees['type_logement'].'">'.$donnees['type_logement'].'</option>
						   <option value="0">chambre single</option><option value="1">chambre double</option>
                           <option value="2">chambre triple</option><option value="3">chambre twin</option><option value="4">chambre standard</option><option value="5">chambre deluxe</option>
                          <option value="6">studio double</option>
                          </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Autre type</label>
      <input type="text" class="form-control" name="typs" id="inputEmail4" value="'.$donnees['type_logement'].'">
    </div>
  

   <div class="form-group col-md-6">
      <label for="inputEmail4">identifier votre local *</label>
      <input type="text" class="form-control" name="ids" id="ids" required value="'.$donnees['chambre'].'" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">occupants possible *</label>
      <input type="number" class="form-control" id="num" name="num" value="'.$donnees['occupant'].'" required>
    </div>
     <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre de lits*</label>
      <input type="number" class="form-control" id="nums" name="nums" value="'.$donnees['nombre_lits'].'">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">cout nuité *</label>
      <input type="number" class="form-control" id="count" name="cout" value="'.$donnees['cout_nuite'].'" required>
    </div>
    
	<div class="form-group col-md-6">
      <label for="inputPassword4">cout pass </label>
      <input type="number" class="form-control" id="counts" name="couts" placeholder="">
    </div>
    
     <div class="form-group col-md-12">
        <h2><i style="font-size:14px" class="fa">&#xf044;</i> Informations relatives aux equipements principales du local</h2>

      <div class="custom-checkbox">
      <input type="checkbox" name="ch[]"  value="<i style=\'font-size:13px\' class=\'fa\'>&#xf2dc;</i> climatisation"> <i style=\'font-size:13px\' class=\'fa\'>&#xf2dc;</i> climatisation
     <input type="checkbox" name="ch[]"  value="<i style=\'font-size:13px\' class=\'fa\'>&#xf108;</i> télévision"> <i style=\'font-size:13px\' class=\'fa\'>&#xf108;</i> télévision<input type="checkbox" name="ch[]"  value="<i style=\'font-size:14px\' class=\'fa\'>&#xf1eb;</i> wiffi">  <i style=\'font-size:14px\' class=\'fa\'>&#xf1eb;</i> wiffi</td> <input type="checkbox" name="ch[]"  value="<i style=\'font-size:14px\' class=\'fa\'>&#xf2a2;</i> salle de baim"> <i style="font-size:14px" class="fa">&#xf2a2;</i> salle de bains
     <input type="checkbox" name="ch[]" value="<i style=\'font-size:16px\' class=\'fas\'>&#xf0f4;</i> Déjeuner"> <i style="font-size:14px" class="fas">&#xf0f4;</i> Déjeuner
	 </div>
	 
	 <h2><i style="font-size:14px" class="fa">&#xf044;</i> Informations relatives aux equipements secondaires du local</h2>
    <input type="checkbox" name="choix[]"  value="toilletes"> toilletes
    <input type="checkbox" name="choix[]"  value="armoie ou penderie"> armoie ou penderie  
   <input type="checkbox" name="choix2[]" value="chaines satellite"> chaines satellite
   <input type="checkbox" name="choix2[]"  value="prise près de lit"> prise près de lit <input type="checkbox" name="choix[]"  value="espace pour pc"> espace pour pc</td> 
   <input type="checkbox" name="choix[]"  value="portant"> portant<br/>
    <input type="checkbox" name="choix[]"  value="baignoire ou douche"> Baignoire ou douche
   <input type="checkbox" name="choix[]"  value="télephone"> télephone
   <input type="checkbox" name="choix[]"  value="microonde"> microonde
   <input type="checkbox" name="choix[]"  value="réfrigérateur"> réfrigerateur
    <input type="checkbox" name="choix[]"  value="machine à laver"> machine à laver<br/>
     <input type="checkbox" name="choix[]"  value="papier toillete"> papier toillete
    <input type="checkbox" name="choix[]"  value="séche cheveux"> séche cheveux
   <input type="checkbox" name="choix[]"  value="petit café">  petit café
   <input type="checkbox" name="choix[]" value="déjeuner"> déjeuner
	</div>
      
    </div>
   <h2>Informations facultatives</h2>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">informations complementaire</label>
    <textarea class="form-control" name="infos" id="infos" rows="3">'.$donnees['infos'].'</textarea>
  </div>
  
  <div class="d"><i class="fas fa-camera"></i> Prise de photo de votre local(au moins 4images)
  <span class="der"><a href="#" class="der">visualiser les images existant</a></span></div>
  <input type="file" class="test" name="fil[]" id="file1"><input type="file" class="test" name="fil[]" id="file2"><input class="test" type="file" name="fil[]" id="file3">
  <input type="file" class="test" name="fil[]" id="file4">
  
  <div><input type="submit" value="Modifier les données" id="his"/></div>
<input type="hidden" name="token" id="token" value="<?php
//Le champ caché a pour valeur le jeton
echo '.$_SESSION['token'].';?>">
  </form><!--fin du form-->
  </div>';
 
?>

<?php 

 // afficher des images existantes
  $home =$_GET['home'];
   $res=$bds->prepare('SELECT name_upload FROM photo_chambre WHERE id_chambre= :id_chambre');
    $res->execute(array(':id_chambre'=>$home));
	
	echo'<div class="homes">';
	while($donnes = $res->fetch()){
	 
	 echo'<div class="text_img"><a href="#" ><img src="upload_image/'.$donnes['name_upload'].'" width="300" height="250"></a><br/>
	 <button type="button" data-id2="'.$home.'" class="imgs">suprimer</button></div>';
	}
	
	echo'</div>';
	
 }
 ?>
 