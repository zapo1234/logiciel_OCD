<?php
include('connecte_db.php');
include('inc_session.php');

  if(isset($_GET['data_id'])){
  $id=$_GET['data_id'];
 // recupérer les données de la facture
 // emttre la requete sur le fonction
    $req=$bds->prepare('SELECT  date,adresse,numero,check_in,check_out,time,time1,clients,user,montant,montant_repas,mont_tva,types,id_fact,nombre,type,types,society FROM facture WHERE code= :code AND email_ocd= :email_ocd ORDER BY id_fact ASC');
    $req->execute(array(':code'=>$id,
	                    ':email_ocd'=>$_SESSION['email_ocd']));
	
	 echo'
	 <table class="tb" border="1">
     <tr>
	 <th>N°facture</th>
	  <th>Date</th>
      <th>Clients</th>
	  <th>Numero</th>
	  <th>Date d\'entrée</th>
	  <th>Date de sortie</th>
	  <th>Heure d\'entrée</th>
	  <th>Heure de sortie</th>
	  <th>Montant de repas</th>
	  <th>Montant(TTC)</th>
	  <th>Type</th>
	  <th>Lieux d\'excercice</th>
      </tr>';
       
	while($donnees = $req->fetch()) {
		$outpout.='
		<tr>
	     <td>'.$donnees['id_fact'].'</td>
		 <td>'.$donnees['date'].'</td>
		 <td>'.$donnees['clients'].'</td>
		 <td>'.$donnees['numero'].'</td>
		 <td>'.$donnees['check_in'].'</td>
		 <td>'.$donnees['check_out'].'</td>
		 <td>'.$donnees['time'].'</td>
		 <td>'.$donnees['time1'].'</td>
		 <td>'.$donnees['montant_repas'].'</td>
		 <td>'.$donnees['montant'].'</td>
		 <td>'.$donnees['types'].'</td>
		 <td>'.$donnees['society'].'</td>
		 </tr>';
	}
	
	 $outpout.='</table>';
	 // afficher les header
	 header("Content-Type: application/xls");
	 header("Content-Disposition: attachement; filename=fiche_facture.xls");
	 echo$outpout;



  }


?>