<?php
 require __DIR__.'/vendor/autoload.php';
 include('connecte_db.php');
 include('inc_session.php');
  // use dependance html2pdf
  use Spipu\Html2Pdf\Html2Pdf;
  // utilise les ouverture
  ob_start();
  
  if(!isset($_GET['id_fact']) AND !isset($_GET['code_data'])){
	 header('index.php');  
  }
  
  ?>
  
 
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
   <style type="text/css">
    .content2{width:100%;height:200px;border:1px solid #eee;} .conten1{font-size:14px;} 
     .cont1,.conten1{float:left;} #logo{width:140px;height:140px;border-radius:100px;background:white;border:2px solid #eee;} 
	 .cont1{position:absolute;top:100px;left:60%;background:#eee;width:260px;height:180px;border:1px solid #eee;padding-left:30px;padding-top:20px;}
	.content3{margin-top:40px;} .cont1{font-size:15px;}
	.number{font-family:arial;font-size:20px;text-transform:uppercase;}
	.dr{font-family:arial;font-size:15px;padding-left:3%;}
    .dv{padding-left:7%;} 
	
	#tb {font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;
	margin-top:50px;}

#tb td, #tb th {border: 1px solid #ddd;padding: 8px;width:150px;text-align:center;font-size:14px;}

#tb tr:nth-child(even){background-color: #f2f2f2;}

#tb tr:hover {background-color: #ddd;}

#tb th {padding-top: 12px;padding-bottom: 12px;text-align: left;color: black;text-align:center;background:#D2EDF9;border:2px solid #D2EDF9}

 
#tab {font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;
	margin-top:55px;margin-left:63%;}

#tab td, #tab th {border: 1px solid #ddd;padding: 8px;width:100px;text-align:center;font-size:14px;}

#tab tr:nth-child(even){background-color: #f2f2f2;}

#tab tr:hover {background-color: #ddd;}

#tab th {padding-top: 12px;padding-bottom: 12px;text-align: left;color: black;text-align:center;}

 .text_facture{font-size:150px;
-webkit-transform: rotate(50deg);
-moz-transform: rotate(50deg);
-o-transform: rotate(50deg);
 writing-mode: rl-bt;
 position:fixed;
 color:#F0EFEF;
 }
	
   </style>

  <?php
  // id facture
  $id ='0.'.$_GET['id_fact'];
  $code=$_GET['code_data'];
  $req=$bdd->prepare('SELECT id,email_ocd,email_user,denomination,user,numero,adresse,logo FROM inscription_client WHERE email_user= :email_user');
   $req->execute(array(':email_user'=>$_SESSION['email_user']));
   $donnees =$req->fetch();
   // emttre la requete sur le fonction
    $reg=$bds->prepare('SELECT  check_in,check_out,time1,time2,chambre,montant FROM bord_informations WHERE code= :code AND email_ocd= :email_ocd AND id_fact= :id');
    $reg->execute(array(':code'=>$code,
	                   ':id'=>$id,
	                   ':email_ocd'=>$_SESSION['email_ocd']));
					   
    // aller chercher les auteurs en écriture sur une facture
   $res=$bds->prepare('SELECT date,check_in,check_out,time,time1,user,clients,numero,email_client,nombre,montant,reste,avance,remise,tva,mont_tva,montant_repas,id_fact,type,types FROM facture WHERE code= :code AND id_fact= :id AND email_ocd= :email_ocd');
   $res->execute(array(':code'=>$code,
                      ':id'=>$id,
                      ':email_ocd'=>$_SESSION['email_ocd']));
   $donns=$res->fetch();
   
   $dates2 = explode('-',$donns['check_in']);
	
	$j = $dates2[2];
	$mm = $dates2[1];
	$an = $dates2[0];
	//
	$dat=$j.'/'.$mm.'/'.$an.'';
	
	$dates1 = explode('-',$donns['check_out']);
	
	$j1 = $dates1[2];
	$mm1 = $dates1[1];
	$an1 = $dates1[0];
   //
	$dat1=$j1.'/'.$mm1.'/'.$an1.'';
   // éditer la facture client
   if($donns['type']==1 OR $donns['type']==3) {
	$date1 = $donns['check_in'];
    $date2 =$donns['check_out'];
    $date = '.Date d\'entrée:'.$dat.' Date de sortie:'.$dat1.'';
     $time = 'Cout/nuité';
     $time1 ='Nombre/jour(s)';	 
	}
   
   if($donns['type']==2){
	$date1 = $donns['time'];
    $date2 = $donns['time1'];
	$date = '.Heure d\'entrée:'.$dat.' Heure de sortie:'.$dat1;	
	$time ='Cout/horaire';
	$time1='Nombre/d\'heure(s)';
   }
   
   echo'<div class="content2">
        <div class="conten1" style="float:left"><div class="con"><img id="logo" src="image_logo/'.$donnees['logo'].'" alt="'.$donnees['logo'].'"></div>
		<br/><br/><span class="entre">Entreprise '.$donnees['denomination'].'</span><br/><br/>
		<span class="tel">Numéro tel '.$donnees['numero'].'</span><br/><br/>
		<span class="tel">Email '.$donnees['email_ocd'].'</span><br/><br/>
		<span class="adresse">Adresse '.$donnees['adresse'].'</span><br/><br/><br/>
		<span class="number">N° facture:<strong>'.$_GET['id_fact'].'</strong></span><br/>
		</div>
		<div class="cont1" style="float:left">
	     <span class="fact">Date d\'édition:'.$donns['date'].'</span><br/><br/>
		<span class="name">Nom client:<br/>'.$donns['clients'].'</span><br/><br/>
		<span class="name">Numéro:'.$donns['numero'].'</span><br/><br/>
		<span class="email">Email:'.$donns['email_client'].'</span><br/><br/>
		
		</div><!--cont1-->
		
	     </div>';
		
	echo'<div class="content3">
	     <div class="dr"> Type : '.$donns['types'].' <span class="dv">'.$date.'</span></div>
	     <table id="tb">
		 <tr>
		 <th>Désignation du local</th>
		 <th>'.$time.'</th>
		 <th>'.$time1.'</th>
		 <th>Total à payer</th>
		 </tr>';
		 
		 while($donnees =$reg->fetch()){
			 
			$montants =$donnees['montant']*$donns['nombre']; 
		 echo'<tr>
             <td>'.$donnees['chambre'].'</td>
			 <td>'.$donnees['montant'].'</td>
			 <td>'.$donns['nombre'].'</td>
			 <td>'.$montants.'</td>
             </tr>';		 
		}
		 
		echo'</table>';
		
		echo'<div class="text_facture">Facture</div>';
		
		$montant=$donns['montant']-floatval($donns['mont_tva']);
		$montant_reel = $donns['montant']-floatval($donns['remise']);
		echo'<table id="tab">
		     <tr>
			 <td>Montant(repas)</td>
			 <td>'.$donns['montant_repas'].'xof</td>
			 </tr>
			 <tr>
			 <td>Montant(HT)</td>
			 <td>'.$montant.' xof</td>
			 </tr>
			 <tr>
			 <td>TVA(%)</td>
			 <td>'.$donns['tva'].' %</td>
			 </tr>
			 <tr>
			 <td>Remise sur facture(TTC)</td>
			 <td>'.$donns['remise'].' xof</td>
			 </tr>
			 <tr>
			 <td>Montant(TTC)</td>
			 <td>'.$donns['montant'].' xof</td>
			 </tr>
			 <tr>
			 <td>Doit payer(TTC)</td>
			 <td>'.$montant_reel.' xof</td>
			 </tr>
		    </table>
	
         </div>';
		 
?>
 <?php

  $content= ob_get_clean();
  $html2pdf = new Html2Pdf('p','A4','fr','true','UTF-8');
  $html2pdf->writeHTML($content);
  ob_end_clean();
  $html2pdf->Output('facture_data.pdf');
  
 
?>


