<?php
include('connecte_db.php');
include('inc_session.php');
 
 
if(!isset($_GET['data_id']) AND !isset($_GET['code_id'])) {
	 
	 header('location:index.php');
 }
 
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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>

.detail{width:95%;height:1100px;background:white;border:2px solid #eee;
 font-size:17px;font-family:Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:16px;color:black;
 margin-left:5%;}
  h4{text-align:center;margin-top:8px;font-size:18px;border-bottom:1px solid #eee;}
  .h{padding-left:10%;margin-top:18px;font-size:15px;} .num{padding-left:2%}
  .fact{color:#4e73df;font-weight:bold;font-size:18px;}
  .liste td{width:150px;} .list td{font-size:14px;} .liste{border-top:1px solid #eee;} .hs{padding-left:13%;margin-top:10px;font-size:13px;}
.tds{font-size:28px;margin-left:12%;color:#09A81F;margin-left:10%;}
.tdv{font-size:28px;margin-left:12%;color:#A80913;margin-left:10%;}
.tdc{font-size:28px;margin-left:12%;color:#0E84D1;margin-left:10%;}
.td{margin-left:10%;}



#caisse{font-size:18px;color:black;font-family:arial;} .tds,.tdv,.tdc{font-size:17px;font-weight:bold;}
.h1{padding:1.5%;font-size:14px;color:black;border:1px solid #eee;text-align:center;width:340px;}


	
	#ts{font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;
	margin-top:50px;}
	
	#ts td{padding:4%;border:1px solid black;text-align;}
	
	#tab {font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 60%;
	margin-top:45px;margin-left:33%;font-size:14px;}
	
	#tab td, #tab th {border: 1px solid #ddd;padding: 2px;width:70px;text-align:center;font-size:16px;}

 .text_facture{font-size:120px;
 writing-mode: rl-bt;
 color:#F0EFEF;} .prin{position:fixed;left:65%;top:350px;width:250px;height:55px;color:white;background:#06308E;border-radius:15px;border:2px solid #06308E;font-size:16px;}
 .dz{color:red;font-size:18px;}  .mobiles{display:none;} #rechers{display:none;} #date{width:20%;}
 .but_recher{width:110px;height:30px;border-radius:15px;background:#09AB15;
 border:2px solid #09AB15;color:white;} 
 h3{color:black;font-family:arial;font-size:18px;text-align:center;}
 .v{display:none;} .h5{font-size:14px;} .retour{margin-left:2%;margin-top:10px;margin-left:10%;height:40px;
background:#06308E;color:white;border:2px solid #06308E;font-size:20px;font-weight:bold;
width:80%;border-radius:20px;}
	
	
	</style>
    </head>
	<body id="page-top">
	
	<?php	
	 $code =$_GET['code_id'];
	 $id_fact = $_GET['data_id'];
	// aller chercher les auteurs en écriture sur une facture
	 $res=$bds->prepare('SELECT date,adresse,clients,email_client,numero,check_in,check_out,time,time1,nombre,piece_identite,montant,reste,avance,mont_tva,user,moyen_paiement,types,id_fact,type FROM facture WHERE code= :code AND id_fact= :id AND email_ocd= :email_ocd');
   $res->execute(array(':code'=>$code,
                       ':id'=>$id_fact,
                      ':email_ocd'=>$_SESSION['email_ocd']));
   $donnees=$res->fetch();
   
   // requete 
   // recupére les données de la base de données si $_GET['id_fact']
   $req=$bds->prepare('SELECT type_logement,chambre,id_chambre,montant,mont_restant FROM bord_informations WHERE code= :code AND id_fact= :id_fact AND email_ocd= :email_ocd ');
    $req->execute(array(':code'=>$code,
	                    ':id_fact'=>$id_fact,
	                   ':email_ocd'=>$_SESSION['email_ocd']));
   
    $nombre =substr($donnees['id_fact'],2); 
    
	// modifier en display block $donnees[user] pour écriture
	$rem='<br/>';
	$rt=",";
  	$montant = number_format($donnees['montant'], 2, '.', '');
	$mont_tva = number_format($donnees['mont_tva'], 2, '.', '');
	$montants = $montant - floatval($donnees['avance']);
	
	$date =$donnees['check_in'];
	$date = explode('-',$date);
	$yy = $date[0];
	$mm = $date[1];
	$jj =$date[2];
	
    $date1 =$donnees['check_out'];
	$date1 = explode('-',$date1);
	$yy1 = $date1[0];
	$mm1 = $date1[1];
	$jj1 =$date1[2];
	
	if($donnees['type']==1 OR $donnees['type']==3){
		$client ='Entrée le :'.$jj.'/'.$mm.'/'.$yy.'   sortie'.$jj1.'/'.$mm1.'/'.$yy1;
	}
	
	if($donnees['type']==2) {
		$client ='Entrée le:'.$donnees['time'].'   sortie le '.$donnees['time2'];
	}
	
	 echo'<div class="detail">
	      <h4>Détails de la facture</h4>
	      <div class="h">N° de facture <span class="fact">'.$nombre.'</span><br/><span class="typ">Type de facture :  '.$donnees['types'].'</span></div>
	      <div class="h"><i class="far fa-user" style="font-size:13px;color:#4e73df"></i>  Client :'.$donnees['clients'].'  <span class="num"><i class="fas fa-phone" style="font-size:13px;color:#4e73df;padding-left:2%;"></i> Numéro tél: '.$donnees['numero'].'</span><br/>
		  <i class="fas fa-envelope-open" style="font-size:13px; color:#4e73df"></i> Email :'.$donnees['email_client'].'</div>
		  
		  <div class="h">'.$client.'</div>
		  <div class="h">Local facturé</div>
		  <table class="liste">
		  <th class="h">Type de logement</th>
		  <th class="h">Local facturé</th>
		  <th class="h"> Prix hors taxe(unitaire)</th>
		  ';
		  
		  while($datas=$req->fetch()){
		  echo'<tr>
		  <td class="h">'.$datas['type_logement'].'</td>
		  <td class="h">'.$datas['chambre'].'</td>
		  <td class="h">'.$datas['montant'].'xof x'.$donnees['nombre'].'</td>
		  </tr>';
		  }
		  echo'</table>
		  
		  <div class="h">
		  <table class="list">
		  <tr>
		  <th>Montant à payer </th>
		  <th class="v">Taxe(TVA)</td>
		  <th>Acompte</th>
		  <th> Reste à payer</td>
		  <th> Moyens de paimement</td>
		  </tr>
		  <tr>
		  <td>'.$montant.'xof</td>
		  <td>'.$donnees['avance'].'xof</td>
		  <td>'.$montants.'xof</td>
		  <td>'.str_replace($rt,$rem,$donnees['moyen_paiement']).'</td>
		  </tr>
		  </table>
		  </div>
		  
		  <div class="h"><i class="fas fa-edit" style="color:#4e73df;font-size:20px;"></i> historique ecritures,facture éditéé et modifiée</div>
		  <div class="hs">'.str_replace($rt,$rem,$donnees['user']).'</div>
		  <div><a href="gestion_facture_customer.php"><button type="button" class="retour">Lister les factures</button></a>
          </div>
		  </div> 
		  </div>	  
		  '; 
	
?>

</body>
</html>

