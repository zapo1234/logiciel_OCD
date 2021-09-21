<?php
include('connecte_db.php');
include('inc_session.php');

 $req=$bds->prepare('SELECT entree,sorties,user_gestionnaire,reservation,reste FROM tresorie_user WHERE email_ocd= :email_ocd');
 $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
 $datas=$req->fetchAll();


  // créer 4 tableau vide
	$datac =[];
	$datac1 =[];
	$datac2 =[];
	$datac3 =[];
  foreach($datas as $donnes){

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
	
  }


  // calcule des pourcentage entre entrées et sorties chiffre
	$number1 =array_sum($datac);
	$number2 =array_sum($datac1);
	$number3 =array_sum($datac2);
	$number4 = array_sum($datac3);
	$num_data = $number1+$number3+$number4;
	
	if($number1!=0 OR $number4!=0 OR $number2!=0 OR $number3!=0){
	$data_number =$number1+$number2;
	
	$data_numbers =$num_data +$number2;
	
	// prévision net 
	$a = $number1*100/$data_number;
	$b = $number2*100/$data_number;
	
	// prévision sous réservation
	$c = $num_data*100/$data_numbers;
	$d = $number2*100/$data_numbers;
	
	// prévison net
	if($a > 80) {
		$indicateur='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:85%;background:#3DEA29;font-size:16px;color:#3DEA29;">25</div>
    </div>
    </div><br>';
	$indicateurs='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:7%;background:#F9AABB;font-size:16px;color:#F9AABB;">25</div>
  </div><br>';
	$name= '<i class="fas fa-arrow-circle-down" style="font-size:15px;color:#04850C;"></i> Activité en forte croissance';
	}
	
	elseif(50< $a  AND $a <80){
	$indicateur='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:70%;background:#3DEA29;font-size:16px;color:#3DEA29">25</div>
  </div><br>';
  $indicateurs='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:45%;background:#F9AABB;font-size:16px;color:#F9AABB;">25</div>
  </div><br>';
	$name= '<i class="fas fa-arrow-circle-down" style="font-size:15px;color:#04850C;"></i> Activité en  croissance';
	}
	
	elseif(30<$a  AND $a < 50) {
	$indicateur='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:40%;background:#3DEA29;font-size:16px;color:#3DEA29">25</div>
  </div><br>';
  $indicateurs='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:60%;background:#F9AABB;font-size:16px;color:#F9AABB;">25</div>
  </div><br>';
	  $name= 'trésorerie moyenne';
	}
	
	elseif(10 < $a AND $a <30){
	$indicateur='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:20%;background:#3DEA29;font-size:16px;color:#3DEA29">25</div>
  </div><br>';
  $indicateurs='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:70%;background:#F9AABB;font-size:16px;color:#F9AABB;">25</div>
  </div><br>';
  
	  $name= '<i class="fas fa-exclamation-triangle" style="font-size:15px;color:#BD0423;"></i>  Attention ,trésorerie faible';
		
	}
	
	else{
	$indicateur='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3-blue w3-round-large" style="width:5%;background:#AAF9BB;font-size:16px;color:#AAF9BB;">25</div>
    </div><br>';
  $indicateurs='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:90%;background:#F9AABB;font-size:16px;color:#F9AABB;">25</div>
  </div><br>';
	  $name= '<i class="fas fa-exclamation-triangle" style="font-size:15px;color:#BD0423;"></i>  Attention ,Activité fortement déficitaire';
		
	}
	
	
	// prevision sous réserve de réservation
	
	if($c > 80) {
		$indicateuc='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:85%;background:#AADAF9;font-size:16px;color:#AADAF9;">25</div>
  </div><br>';
	$indicateurc='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:5%;background:#F79F76;font-size:16px;color:#F79F76;">25</div>
  </div><br>';
	$names= 'Activité en forte croissance';
	}
	
	elseif(50< $c  AND $c <80){
	$indicateuc='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:65%;background:#3DEA29;font-size:16px;color:#3DEA29">25</div>
  </div><br>';
  $indicateurc='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:20%;background:#F79F76;font-size:16px;color:#F79F76;">25</div>
  </div><br>';
	$names= 'Activité en  croissance';
	}
	
	elseif(30<$c  AND $c < 50) {
	$indicateuc='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:40%;background:#AADAF9;font-size:16px;color:#AADAF9;">25</div>
  </div><br>';
  $indicateurc='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:60%;background:#F9AABB;font-size:16px;color:#F79F76;">25</div>
  </div><br>';
	  $names= 'trésorerie moyenne';
	}
	
	elseif(10 < $c AND $c <30){
	$indicateuc='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:20%;background:#AADAF9;font-size:16px;color:#AADAF9;">25</div>
  </div><br>';
  $indicateurc='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:70%;background:#F9AABB;font-size:16px;color:#F79F76;">25</div>
  </div><br>';
  
	  $names= '<i class="fas fa-exclamation-triangle" style="font-size:15px;color:#BD0423;"></i>  Attention ,trésorerie faible';
		
	}
	
	else{
	$indicateuc='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:7%;background:#3DEA29;font-size:16px;color:#3DEA29">25</div>
    </div><br>';
  $indicateurc='<div class="w3-light-grey w3-round-large" style="width:350px">
    <div class="w3-container w3 w3-round-large" style="width:90%;background:#F9AABB;font-size:16px;color:#F79F76;">25</div>
  </div><br>';
	  $names= '<i class="fas fa-exclamation-triangle" style="font-size:15px;color:#BD0423;"></i>  Attention ,Activité fortement déficitaire';
		
	}
	// indicateur sur les sorties
	
    echo'<div id="clac">
         <h3>Prévision Net</h3><br/>
		 <h4>Indicateur</h4>
		 <div class="montants"> + '.$number1.'xof</div><br/>
		 <div>'.$indicateur.'</div><br/><br/>
		 <div class="montan"> - '.$number2.' xof</div><br/>
		 <div>'.$indicateurs.'</div><br/><br/>
		 <h4>Résultat attendu</h4>
		 <div class="name">'.$name.'</div><br/><br/>
		 
		 <h4>Prévision attendu(réservation <br/>Acompte/reste à solder)</h4><br/>
		 <div class="monta"> + '.$number3.'xof</div><br/>
		 <div>'.$indicateuc.'</div><br/><br/>
		 
		 <div class="montac">'.$number4.'xof  ?</div><br/>
		 <div>'.$indicateurc.'</div><br/><br/>
		 <h4>Résultat attendu</h4>
		 
		</div>';
	}

	
?>