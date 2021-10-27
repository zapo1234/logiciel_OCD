<?php
include('connecte_db.php');
include('inc_session.php');

$req=$bds->prepare('SELECT id,date,entree,sorties,user_gestionnaire,reservation,reste FROM tresorie_user WHERE email_ocd= :email_ocd ORDER BY id ASC');
 $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
 
 echo'
	 <table class="tb" border="1">
     <tr>
	  <th>Date</th>
	  <th>Encaisses</th>
      <th>Depenses</th>
	  <th>Acompte</th>
	  <th>Reste(Reservation)</th>
      </tr>';
       
	while($donnees = $req->fetch()) {
		$outpout.='
		<tr>
	     <td>'.$donnees['date'].'</td>
		 <td>'.$donnees['entree'].'</td>
		 <td>'.$donnees['sorties'].'</td>
		 <td>'.$donnees['reservation'].'</td>
		 <td>'.$donnees['reste'].'</td>
		 </tr>';
	}
	
	 $outpout.='</table>';
	 // afficher les header
	 header("Content-Type: application/xls");
	 header("Content-Disposition: attachement; filename=fiche_tresorie.xls");
	 echo$outpout;





















?>