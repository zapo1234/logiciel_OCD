<?php

$date1 = date('Y-m-d', strtotime($_POST['fis']));
$date2= date('Y-m-d', strtotime($_POST['fls']));

$numero_compte=$_SESSION['pose'];

	 $req=$bds->prepare('SELECT DISTINCT (chambre),id,numero_compte FROM bord_informations  WHERE numero_compte= :numero_compte AND check_out < :date1');
   $req->execute(array(':numero_compte'=>$numero_compte,
                       ':date1'=>$date1));
	
    // on affiche ici
	  
	   echo'<table cellpadding="2" cellspacing="2" border="1">';
		   echo'<tr>';
		   echo'<th class="jaude">Chambres libre</th>';
		   echo'<th width="70" class="jaude">Periode libre</th>';
		   echo'<th class="jaude">Description</th>';
		   echo'<th class="jaude">informations</th>';
		   echo'</tr>';
  while($donnees = $req->fetch()){
	
		   echo'<tr>';
		   echo'<td class="jaude">'.$donnees['chambre'].'</td>';
		   echo'<td width="70" class="jaude">'.$new_date1.' au '.$new_date2.'<span class="tt"><i class="material-icons" style="color:green;font-size:21px">check_circle</i></span></td>';
		   echo'<td class="jaude"><input type="button" value="description" title="voir les details sur la chambre" class="tic" id='.$donnees['id'].'</button></td>';
		   echo'<td class="jaude"><input type="button" value="informations" title="voir les informations" class="tics" id='.$donnees['id'].'</button></td>';
		   echo'</tr>';
	        
	}
	

	echo'</table>';
	   
	 $req->closeCursor(); 


?>
  
   