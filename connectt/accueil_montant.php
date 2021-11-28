<?php
// on declare la session
include('connecte_db.php');
include('inc_session.php');
    
   $rec=$bds->prepare('SELECT avance,encaisse,depense,reservation,credit,monnaie FROM guide WHERE numero_compte= :numero_compte');
   $rec->execute(array(':numero_compte'=>$_SESSION['pose']));
   $donnees=$rec->fetch();
  
  echo'<div class="rrt">Encaissé <span class="cli">'.$donnees['encaisse'].' '.$donnees['monnaie'].'</span></div>';
  echo'<div class="rrt">Réservation <span class="cl">'.$donnees['avance'].' '.$donnees['monnaie'].'</span></div>';
  echo'<div class="rrt">Depenses achats <span class="cic">'.$donnees['depense'].'  '.$donnees['monnaie'].'</span></div>';
  echo'<div class="rrt">Dépenses crédits<span class="clic">'.$donnees['credit'].'  '.$donnees['monnaie'].'</span></div>';
  echo'</div>';
  $rec->closeCursor();
  ?>