<?php
include('connecte_db.php');
include('inc_session.php');

// requete qui va chercher les montants

$rej=$bds->prepare('SELECT email_ocd,montant,encaisse,reservation,depense FROM tresorie_customer WHERE email_ocd= :email_ocd');
   $rej->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
   $donnees=$rej->fetch();
   $rej->closeCursor();

if($_POST['action']== "fetch") {
  

  
  $res=$bds->prepare('SELECT clients,infos_type,montant FROM facture WHERE email_ocd= :email_ocd ORDER BY id DESC LIMIT 0,3');
   $res->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
  // affichage des données
  
  echo'<h1>Encaissement</h1>
 <table id="montant">
 <tr>
 <td class="lien2"><i style="font-size:18px;color:green" class="fa">&#xf063;</i> <span class="mont">facturé:</span></td>
 <td class="t_monts">'.$donnees['encaisse'].' XOF</td>
 </tr>
 <tr>
 <td class="lien2"><i style="font-size:18px;color:red;" class="fa">&#xf062;</i> <span class="mont"> Dépense effectuée</span></td>
 <td class="t_mont">'.$donnees['depense'].' XOF</td>
 </tr>
 <tr>
 <td class="lien2"><i style="font-size:18px;color:#1E90FF" class="fa">&#xf07a;</i> <span class="mont"> Acompte réservation</span></td>
 <td class="t_mont">'.$donnees['reservation'].' XOF</td>
 </tr>
 </table>';
 
 echo'<div class="h2"><button type="button" class="butt"><i style="font-size:15px" class="fa">&#xf0e2;</i>  réinitialiser</button>';
 
 echo'<div class="h2">Derniers clients</div>';
 echo'<div class="slides">';
 while($donnes=$res->fetch()) {
   echo'<div class="element"><i style="font-size:8px;color:white;" class="fa">&#xf111;</i> '.$donnes['clients'].'<span class="das">'.$donnes['infos_type'].'</span></div>';
  }
  echo'</div>';
 $res->closeCursor();

}

if($_POST['action']=="dat"){
$monts=0;

   // on recupere les données pour les injecter dans la base de donnees	 
   // insertion des données dans la table facture
		$rev=$bds->prepare('INSERT INTO tresorie_user (date,email_ocd,user_gestionnaire,entree,sorties,reservation) 
		VALUES(:date,:email_ocd,:user_gestionnaire,:entree,:sorties,:reservation)');
	     $rev->execute(array(':date'=>$_POST['date'],
		                    ':email_ocd'=>$_SESSION['email_ocd'],
							':user_gestionnaire'=>$_SESSION['user'],
							':entree'=>$donnees['encaisse'],
							':sorties'=>$donnees['depense'],
							':reservation'=>$donnees['reservation']
					));
   
   // on modifie les données de la base de données guide
         $ret=$bds->prepare('UPDATE tresorie_customer SET encaisse= :des, depense= :ds, reservation= :rs WHERE email_ocd= :email_ocd');
        $ret->execute(array(':des'=>$monts,
		                    ':ds'=>$monts,
							':rs'=>$monts,
                            ':email_ocd'=>$_SESSION['email_ocd']
					 ));
					 
	  // on redirige vers la page
          echo'<div class="enre"><div>opération réussie <button class="resul">!<div></button>
		     <div class="dep"><i style="font-size:40px;color:green" class="fa">&#xf250;</i></div></div>';
  
			echo'<meta http-equiv="Refresh" content="4; url=//localhost/tresorie_ocd/acceuil_gestion_hotel.php"/>';
  	
	
}

?>