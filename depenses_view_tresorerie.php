<?php
include('connecte_db.php');
include('inc_session.php');

$record_peage=7;
$page="";
  
  if(isset($_POST['page'])){
$page = $_POST['page'];
}

else {

$page=1;	
	
}

$smart_from =($page -1)*$record_peage;
if($_POST['action']=="fetchs") {
	 
 $req=$bds->prepare('SELECT date,entree,sorties,user_gestionnaire,reservation,reste FROM tresorie_user WHERE email_ocd= :email_ocd ORDER BY id DESC LIMIT 0,10');
 $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
 $datas=$req->fetchAll();
	
	echo'<div id="derr">';
  // on boucle sur les les resultats
	echo'<div class="expor"><h2>Suivi de la trésorie de l\'activité</h2> <span class="export">Export  <button type="button" class="excel">Excel <i class="far fa-file-excel"></i></button>
	<button type="button" class="csv">Csv <i class="fas fa-file-csv"></i></button><span></div>';
  echo'	<table class="table">
     <thead>
     <tr class="tf">
	  <th scope="col">Date de cloture</th>
	  <th scope="col">Entrées en caisse</th>
      <th scope="col">Sorties de caisse</th>
	  <th scope="col">Entrées en caisse(réservation)</th>
	  <th scope="col">Reste à solder(réservation)</th>
	  <th scope="col">Gestionnaire</th>
	  <th scope="col">Détails</td>
      </tr>
      </thead>
      <tbody>';
    
	
	// créer 4 tableau vide
	$datac =[];
	$datac1 =[];
	$datac2 =[];
	$datac3 =[];
  foreach($datas as $donnes){

   $date1=$donnes['date'];
	$date1 = explode('-',$date1);
	$j = $date1[2];
	$mm = $date1[1];
	$an = $date1[0];
	
	// recupére les montant et les mettre dans un tableau
	
	$data1 =$donnes['entree'].',';
	$data2= $donnes['sorties'].',';
	$data3 =$donnes['reservation'].',';
	$data4 =$donnes['reste'].',';
	
	// on créer un tableaux pour mettre les valeurs
	$datas1 = explode(',',$data1);
	$datas2 = explode(',',$data2);
	$datas3 = explode(',',$data3);
	$datas4 = explode(',',$data4);
	
	foreach($datas1 as $values) {
	$datac[] =$values;
	}
	
	foreach($datas2 as $values1) {
	$datac1[] =$values1;
	}
	
	foreach($datas3 as $values2) {
	$datac2[] =$values2;
	}
	
	foreach($datas4 as $values3) {
	$datac3[] =$values3;
	}
	
	// modifier en display block $donnees[user] pour écriture
	$rem='<br/>';
	$rt=",";
	
	echo'<tr class="datas'.$j.'/'.$mm.'/'.$an.'">
	     <td>'.$j.'/'.$mm.'/'.$an.'</td>
		 <td><span class="repas">'.$donnes['entree'].'xof</td>
		 <td><span class="repas">'.$donnes['sorties'].'xof</td>
		 <td><span class="repas">'.$donnes['reservation'].'xof</td>
		 <td><span class="repas">'.$donnes['reste'].'xof</td>
		 <td><span class="repas">'.$donnes['user_gestionnaire'].'</td>
		 <td></td>
		</td></td>
	    </tr>';
    }

       echo'</table>';
    

     	// on compte
		// on compte le nombre de ligne de la table facture
	 $reg=$bds->prepare('SELECT count(*) AS nbrs FROM depense WHERE email_ocd= :email_ocd');
     $reg->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
    $dns=$reg->fetch();
	
	$totale_page=$dns['nbrs']/$record_peage;
	$totale_page = ceil($totale_page);
	
	for($i=1; $i<=$totale_page; $i++) {
	   
	   echo'<div class="pied_page"><button class="bout" id="'.$i.'">'.$i.'</button></div>';
    }
	
	// calcule des pourcentage entre entrées et sorties chiffre
	$number1 =array_sum($datac);
	$number2 =array_sum($datac1);
	
	$data_number =$number1+$number2;
	
	$a = $number1*100/$data_number;
	$b = $number2*100/$data_number;
	
	if($a > 80) {
		$indicateur='<div class="w3-progress-container">
    <div id="myBar" class="w3-progressbar w3-green" style="width:85%">
    <div class="w3-center w3-text-white">25%</div>
    </div>
    </div><br>';
	$indicateurs='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3-red w3-round-large" style="width:5%">25</div>
  </div><br>';
	$name= 'Activité en forte croissance';
	}
	
	elseif(50< $a  AND $a <80){
	$indicateur='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3-blue w3-round-large" style="width:65%">25</div>
  </div><br>';
  $indicateurs='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3-red w3-round-large" style="width:20%">25</div>
  </div><br>';
	$name= 'Activité en  croissance';
	}
	
	elseif(30<$a  AND $a < 50) {
	$indicateur='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3-blue w3-round-large" style="width:40%">25</div>
  </div><br>';
  $indicateurs='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3-red w3-round-large" style="width:60%">25</div>
  </div><br>';
	  $name= 'trésorerie moyenne';
	}
	
	elseif(10 < $a AND $a <30){
	$indicateur='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3-blue w3-round-large" style="width:20%">25</div>
  </div><br>';
  $indicateurs='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3-red w3-round-large" style="width:70%">25</div>
  </div><br>';
  
	  $name= ' Attention ,trésorerie faible';
		
	}
	
	else{
	$indicateur='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3-blue w3-round-large" style="width:5%">25</div>
    </div><br>';
  $indicateurs='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3-red w3-round-large" style="width:90%">25</div>
  </div><br>';
	  $name= ' Attention ,Activité fortement déficitaire';
		
	}
	
	// indicateur sur les sorties
	
	
	
    echo'</div>';
    echo'<div id="indicateur">
         <h3>Prévision Net</h3><br/>
		 <div>Indicateur</div><br/>
		 <div>'.$indicateur.'</div><br/><br/>
		 <div>'.$indicateurs.'</div><br/><br/>
		 
		 <h3>Prévision attendu(réservation)</h3><br/>
		 <h3>Résultat de progression</h3>
        </div>';	
  }
  
  
  