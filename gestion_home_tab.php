<?php
include('connecte_db.php');
include('inc_session.php');

   $bd = new PDO('mysql:host=localhost;dbname=hotel_gestion', 'root','');

 function select_box($bd){
	 
    $output = '';
	$req=$bd->prepare('SELECT id,chambre FROM chambre WHERE numero_compte= :numero_compte');
    $req->execute(array(':numero_compte'=>$_SESSION['pose']));
    
   while($donnees = $req->fetch())
	{
	   echo'<option value="'.$donnees['id'].'">'.$donnees['chambre'].'</option>';  
	}
	
   }
	 
?>


<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
  <?php include('inc_entete.php');?>
  <title>Optimisation de comptabilité à distance</title>
  <meta name="description" content="Dynamiser le suivi et la gestion de votre espace hotelier" />
  <style type="text/css">
 


@media (min-width: 1200px) { 
#first{width:100%;height:70px;background-color:white;box-shadow:3px 3px 3px grey;padding-top:20px;padding-left:2%;position:fixed;}
.it{padding-left:3%;} a{color:black;font-family:arial;font-size:11px;text-decoration:none;text-transform:uppercase;}
.home{background-color:#F0F8FF;padding:1%;font-family:arial;font-size:12px;border-radius:15px;}
#second{width:100%;} .box,.box1,.box3{float:left;margin-left:4%;}
.second1{background-color:white;width:90%;height:90px;margin-left:5%;margin-top:10px;padding-top:20px;box-shadow:3px 3px 3px grey;margin-top:75px;}
.box{font-family:arial;font-size:14px;color:#136cbd;font-weight:bold;text-transform:uppercase;} 
.box1{width:30%;} .box3{margin-left:8%;font-family:arial;margin-top:-12px;}
.bos1,.bos2{float:left;} .bos1{width:35%;} .bos2{width:60%;}
#three{width:100%;} .three1{width:90%;height:60px;background-color:#F0F8FF;margin-left:5%;}
.boss1,.boss2{float:left;margin-left:2%;padding-top:7px;} .boss1{width:35%;font-family:arial;} .boss2{width:57%;font-family:arial;font-size:11px;text-transform:uppercase;} .clis{padding-left:3%;} .reser{padding-left:6%;cursor:pointer;}
.dim{padding-left:5%;cursor:pointer;} #four{width:100%;} .four1{width:90%;height:600px;background-color:white;margin-left:5%;margin-top:5px;box-shadow:3px 3px 3px grey;} .x{font-size:12px;width:100px;}
#footer{width:100%;margin-top:5px;} .ocd{width:90%;height:25px;background-color:white;margin-left:5%;font-family:arial;text-align:center;}
.clis{font-family:arial;text-transform:uppercase;font-size:11px;} #dec{background-color:white;color:blue;margin-left:3%;height:25px;border-radius:15px;}
#corps1,#corps2{float:left;} #corps1{width:80%;height:300px;} #corps2{width:35%;}
h1{font-family:arial;font-size:12px;margin-left:1%;width:90%;text-align:center;text-transform:uppercase;border-bottom:1px solid #eee;padding-bottom:3px;color:#136cbd;}
h2{font-family:arial;font-size:11px;margin-left:1%;width:95%;text-align:center;text-transform:uppercase;border-bottom:1px solid #eee;padding-bottom:3px;color:#136cbd;}
#sejour,#pass{width:20%;height:25px;background-color:#eee;color:black}.bir{font-family:arial;font-size:13px;padding-left:2%;}

 td{padding:1%;} .quantite{width:75px;margin-left:50px;} .prix{width:85px;margin-left:50px;} .item{width:100px;margin-left:50px;}
table{100%;} .remove{cursor:pointer;}
}

   
	
  </style>
  </head>
<body style="background-color:#eee">

<div class="container" id="first"> 
 <div class="bos1"><span class="is"><img src="image/logo.jpg" alt="logo" withd="50" height="30"/> <span class="home"><?php 
 
   try{
	   
      // on ecrire la reuete sql pour recuperer le nom
	  $req=$bdd->prepare('SELECT Denomination,numero FROM inscription_client WHERE numero_compte= :numero_compte');
     $req->execute(array(':numero_compte'=>$_SESSION['pose']));
     $donnees= $req->fetch();
	echo'<span class="erf">Entreprise : '.$donnees['Denomination'].' TEL :'.$donnees['numero'].'</span>';
	$req->closeCursor();
   } 
  catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}  
?>
 </span></div><div class="bos2"> <span></span><span class="it"><a href="gestion_home_tab.php" title="suivi de gestion client et location chambre">Tableau bord entrées/réservations</a></span>
<span class="it"> <a href="gestion_home_ocd.php" title="suivi intéreactif des achats/crédit">Tableau bord dépenses</a></span>
<span class="it"><a href="gestion_depeses_ocd.php">Tableau bord Trésorie </a></span>

<span class="dec"><a href="deconnexion.php" title="Quitter sur la plateforme"><button id="dec" style="font-size:14px">Se deconnecter</button></a></span></div>
</div><!--contenair--#id first-->
	
<div class="container" id="second"> 
<div class="second1">

</div><!--contenair--#id second-->
<div id="montant"></div>	
<div class="container" id="three"> 


</div><!--contenair--#id second-->


<div class="container" id="four"> 
<div class="four1">
<div id="corps1">
<form method="post" id="form1" action="">
<table id="affiche" cellspacing="" cellpadding="">
<th> Désignation</th>
<th>quantité</th>
<th>prix</th>
<th>totale item</th>

<tr class ="di">
<td class="f"><input type="text" name="des[]" id="des1" class="designation"></td>
<td class="f"><input type="number" name="qte[]" id="qte1" class="quantite"></td>
<td class="f"><input type="number" name="prix[]" id="prix1" class="prix"></td>
<td class="f"><input type="number" name="item[]" id="item1" class="item" readonly></td>
</tr>
</table>

 <div>Tva Ht <input type="number" min ="1"/></div>
 <div> Total : <span id="total"></span></div>
<input type="hidden" id="table_item" class="table_item">
<input type="submit" value="creer votre facture">

</form>
<div class="cr"> <span class="v">Ajouter une ligne</span></div>
</div></div>

<div id="results">


</div>
</div>


<div id="footer">
<div class="ocd">Optimisation de comptabilité à distance : Dynamiser et innover efficacement le suivi et la gestion de vos biens Hoteliers</div>
</div>

<?php include('inc_foot_scriptjs.php');?>

<script type="text/javascript">
$(function(){
var totale = $('#total').text();
var count = 1;
$(document).on('click','.v', function(){
count = count +1;
$('#table_item').val(count);
var html = '';
html += '<tr id ="row_id_'+count+'">';
html +='<td><input type="text" class="designation" id="des'+count+'" name="des[]"/></td>';
html +='<td><input type="number" class="quantite" id="qte'+count+'" name="qte[]"></td>';
html +='<td><input type="number" class="prix" id="prix'+count+'" name="prix[]"></td>';
html +='<td><input type="number" class="item" id="item'+count+'" name="item[]" readonly></td>';
html +='<td><span class="remove" name="remove" id="'+count+'"><i class="material-icons" style="font-size:25px">highlight_off</i></span></td>';
html +='</tr>';
$('#affiche').append(html);
});

$(document).on('click','.remove', function(){
var id = $(this).attr("id");
$('#row_id_' +id).remove();
var total = 0;
var tot = 0;
var result = 0;

 var total = $('#total').text();
 var result = Number(total);
 var tot = $('#item'+id).val();

results = result - parseFloat(tot);
$('#total').text(results);
i--;
$('#table_item').val(i);

});

function calcul(count) {

 var totale_item = 0;
 var total_items=0;
 for(j=1; j<500; j++) {
 var quantite = 0;
 var price = 0;
 var items = 0;
  quantite = $('#qte'+j).val();
 if(quantite > 0) {
price = $('#prix'+j).val();
 if(price > 0) {
items = parseFloat(quantite)*parseFloat(price);
$('#item'+j).val(items);

totale_item = parseFloat(totale_item)+ parseFloat(items);
	
  }
 }
}

$('#total').text(totale_item);
}
$(document).on('blur','.prix',function() {
calcul(count);	
});

});
</script>

SELECT CLI_NOM, TEL_NUMERO
FROM   T_CLIENT C 
       INNER JOIN T_TELEPHONE T
             ON C.CLI_ID = T.CLI_ID
WHERE  TYP_CODE = 'FAX'