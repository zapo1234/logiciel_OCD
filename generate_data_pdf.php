<?php
 require __DIR__.'/vendor/autoload.php';
 include('connecte_db.php');
 include('inc_session.php');
  // use dependance html2pdf
  use Spipu\Html2Pdf\Html2Pdf;
  // utilise les ouverture
  ob_start();
  
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
    .content2{width:100%;height:200px;border:1px solid #eee;} 
    table{margin-top:50px;} .cont1,.conten1{float:left;} #logo{width:140px;height:140px;border-radius:100px;background:white;border:2px solid #eee;} .cont1{position:absolute;top:100px;left:65%;}
	.content3{margin-top:40px;} 
	

   </style>

  <?php
  // id facture
  $id ='0.'.$_GET['id_fact'];
  $req=$bdd->prepare('SELECT id,email_ocd,email_user,denomination,user,numero,adresse,logo FROM inscription_client WHERE email_ocd= :email_ocd');
   $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
   $donnees =$req->fetch();
   // emttre la requete sur le fonction
    $reg=$bds->prepare('SELECT  check_in,check_out,time1,time2,chambre,montant FROM bord_informations WHERE email_ocd= :email_ocd AND id_fact= :id');
    $reg->execute(array(':id'=>$id,
	                   ':email_ocd'=>$_SESSION['email_ocd']));
					   
    // aller chercher les auteurs en écriture sur une facture
   $res=$bds->prepare('SELECT date,check_in,check_out,time,time1,user,clients,numero,email_client,nombre,montant,reste,avance,tva,mont_tva,montant_repas,id_fact,type,types FROM facture WHERE id_fact= :id AND email_ocd= :email_ocd');
   $res->execute(array(':id'=>$id,
                      ':email_ocd'=>$_SESSION['email_ocd']));
   $donns=$res->fetch();
   
   // éditer la facture client
   if($donns['type']==1 OR $donns['type']==3) {
	$date1 = $donns['check_in'];
    $date2 =$donns['check_out'];
    $date = '.Date d\'entrée:'.$date1.' Date de sortie:'.$date2;	
	}
   
   if($donns['type']==2){
	$date1 = $donns['time'];
    $date2 =$donns['time1'];
	$date = '.Heure d\'entrée:'.$date1.' Heure de sortie:'.$date2;	
   }
   
   echo'<div class="content2">
        
		<div class="conten1" style="float:left"><div class="con"><img id="logo" src="image_logo/'.$donnees['logo'].'" alt="'.$donnees['logo'].'"></div>
		<br/><br/><span class="entre">Entreprise '.$donnees['denomination'].'</span><br/><br/>
		<span class="tel">Numéro tel '.$donnees['numero'].'</span><br/><br/>
		<span class="tel">Email '.$donnees['email_ocd'].'</span><br/><br/>
		<span class="adresse">Adresse '.$donnees['adresse'].'</span>
		</div>
		
		<div class="cont1" style="float:left">
	     <span class="fact">Date d\'édition:'.$donns['date'].'</span><br/><br/>
		<span class="name"> Nom client:'.$donns['clients'].'</span><br/><br/>
		<span class="name"> Numéro:'.$donns['numero'].'</span><br/>
		<span class="email">Email:'.$donns['email_client'].'</span><br/>
		
		</div><!--cont1-->
		
	     </div>';
		
	echo'<div class="content3">
	     <div class="dr">Type : '.$donns['types'].' <div class="dr">'.$date.'</div></div>
	     <table class="tb">
		 <tr>
		 <th>Désignation du local</th>
		 <th>Cout(Nuité/horaire)</th>
		 <th>Nombre(jour/heure</th>
		 <th>Total à payer</th>
		 </tr>';
		 
		 while($donnees =$reg->fetch()){
		 echo'<tr>
             <td>'.$donnees['chambre'].'</td>
			 <td>'.$donnees['montant'].'</td>
			 <td>'.$donns['nombre'].'</td>
			 <td>'.$donnees['montant'].'</td>
             </tr>';		 
		}
		 
		echo'</table>';
		
		$montant=$donns['montant']-floatval($donns['mont_tva']);
		echo'<table class="tab">
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
			 <td>Montant(TTC)</td>
			 <td>'.$donns['montant'].' xof</td>
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


