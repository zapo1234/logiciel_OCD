<?php
include('connecte_db.php');
include('inc_session.php');

 // recupérer les données de la facture
if(isset($_GET['data_id'])){
$code =$_GET['data_id'];
 $req=$bds->prepare('SELECT id,date,designation,fournisseur,montant,user,status,numero_facture,society FROM depense WHERE code= :code AND email_ocd= :email_ocd ORDER BY id DESC');
 $req->execute(array(':code'=>$code,
                     ':email_ocd'=>$_SESSION['email_ocd']));
 
	 echo'
	 <table class="tb" border="1">
     <tr>
	  <th>Date</th>
	  <th>N°facture(si existe)</th>
      <th>Désignation</th>
	  <th>fournisseur</th>
	  <th>Montant</th>
      </tr>';
       
	while($donnees = $req->fetch()) {
		$outpout.='
		<tr>
	     <td>'.$donnees['date'].'</td>
		 <td>'.$donnees['numero_facture'].'</td>
		 <td>'.$donnees['designation'].'</td>
		 <td>'.$donnees['fournisseur'].'</td>
		 <td>'.$donnees['montant'].'</td>
		 </tr>';
	}
	
	 $outpout.='</table>';
	 // afficher les header
	 header("Content-Type: application/xls");
	 header("Content-Disposition: attachement; filename=fiche_depense.xls");
	 echo$outpout;
}
?>