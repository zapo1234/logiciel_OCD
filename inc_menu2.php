<?php
 include('connecte_db.php');
include('inc_session.php'); 
   $req=$bdd->prepare('SELECT user,permission,code FROM inscription_client WHERE email_user= :email_user');
   $req->execute(array(':email_user'=>$_SESSION['email_user']));
   $donnes =$req->fetch();
   
   $date=date('Y-m-d');
   $dates =explode('-',$date);
   
    $j = $dates[2];
	$mm = $dates[1];
	$an = $dates[0];
	
	$dats = $j.'-'.$mm.'-'.$an;

  
   $dat =date('H:i');
   
   // compter le nombre de nouveaux message
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
	
	if($num_data==0){
		
	$ac =0;
	$b=0;
	$d=0;
	$indicateuc="";
	$indicateur="";
	$indicateurs="";
	$indicateurc="";
	$cb=0;
	}
	
	if($number1!=0 OR $number4!=0 OR $number2!=0 OR $number3!=0){
	$data_number =$number1+$number2;
	
	$data_numbers =$num_data +$number2;
	
	// prévision net 
	$ac = $number1*100/$data_number;
	$b = $number2*100/$data_number;
	
	// prévision sous réservation
	$cb = $num_data*100/$data_numbers;
	$d = $number2*100/$data_numbers;
	
	$ac =substr($ac,0,4);
	$cb =substr($cb,0,4);
	
	// prévison net
	if($ac > 80) {
		$indicateur='<div class="progress">
  <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width:85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
  </div>
    </div><br>';
	$indicateurs='<div class="progress">
  <div class="progress-bar progress-bg-striped" role="progressbar" style="width:7%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
  </div><br>';
	$name= '<i class="fas fa-arrow-circle-down" style="font-size:15px;color:#04850C;"></i> Activité en forte croissance';
	}
	
	elseif(50< $ac  AND $ac <80){
	$indicateur='<div class="progress">
  <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
</div>
  </div><br>';
  $indicateurs='<div class="progress">
  <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 45%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
</div><br>';
	$name= '<i class="fas fa-arrow-circle-down" style="font-size:15px;color:#04850C;"></i> Activité en  croissance';
	}
	
	elseif(30<$ac  AND $ac < 50) {
	$indicateur='<div class="progress">
  <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width:40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
  </div>
  </div><br>';
  $indicateurs='<div class="progress">
  <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 60%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
</div><br>';
	  $name= 'trésorerie moyenne';
	}
	
	elseif(10 < $ac AND $ac <30){
	$indicateur='<div class="progress">
  <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 20%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
</div>
  </div><br>';
  $indicateurs='<div class="progress">
  <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 70%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
  </div><br>';
  
	  $name= '<i class="fas fa-exclamation-triangle" style="font-size:15px;color:#BD0423;">  Attention ,trésorerie faible';
		
	}
	
	else{
	$indicateur='<div class="progress">
  <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width:5%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
  </div>
    </div><br>';
  $indicateurs='<div class="progress">
  <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 90%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
 </div><br>';
	  $name= '<i class="fas fa-exclamation-triangle" style="font-size:15px;color:#BD0423;">  Attention ,Activité fortement déficitaire';
		
	}
	
	
	// prevision sous réserve de réservation
	
	if($cb > 80) {
		$indicateuc='<div class="progress">
  <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
  </div><br>';
	$indicateurc='<div class="progress">
  <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 5%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
</div><br>';
	$names= 'Activité en forte croissance';
	}
	
	elseif(50< $cb  AND $cb <80){
	$indicateuc='<div class="progress">
  <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 65%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
  </div><br>';
  $indicateurc='<div class="progress">
  <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 20%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
</div><br>';
	$names= '<i class="fas fa-arrow-circle-down" style="font-size:15px;color:#04850C;"> </i> Activité en  croissance';
	}
	
	elseif(30<$cb  AND $cb < 50) {
	$indicateuc='<div class="progress">
  <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
  </div><br>';
  $indicateurc='<div class="progress">
  <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 60%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
</div><br>';
	  $names= 'trésorerie moyenne';
	}
	
	elseif(10 < $cb AND $cb <30){
	$indicateuc='<div class="progress">
  <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 20%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
  </div><br>';
  $indicateurc='<div class="progress">
  <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 70%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
</div><br>';
  
	  $names= '<i class="fas fa-exclamation-triangle" style="font-size:15px;color:#BD0423;">  Attention ,trésorerie faible';
		
	}
	
	else{
	$indicateuc='<div class="progress">
  <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 7%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
    </div><br>';
  $indicateurc='<div class="progress">
  <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 90%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
</div><br>';
	  $names= '<i class="fas fa-exclamation-triangle" style="font-size:15px;color:#BD0423;">  Attention ,Activité fortement déficitaire';
		
	}
}

else{
$names="";
$name="";
}
 $req->closeCursor();
 
 // recupérer les donnees sur la facture
 
  $rev=$bds->prepare('SELECT type FROM facture WHERE email_ocd= :email_ocd');
  $rev->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
  $datos=$rev->fetchAll();
  
  $tab=[];
  $tabs=[];
  $array=[];
  foreach($datos as $dataf){
	if($dataf['type']==1 OR $dataf['type']==2 OR $dataf['type']==3) {
    $type =$dataf['type'];
    $types = explode(',',$type);
    foreach($types as $ty){
     $tab[]=$ty;
    }		
   }
   if($dataf['type']==4){
	 $type =$dataf['type'];
    $types = explode(',',$type);
    foreach($types as $ty){
     $tabs[]=$ty;
    }  
	   
   }
   
   if($dataf['type']==3){
	 $dat=$dataf['type'];
	   // on le met dans un tableau
	   $dats = explode(',',$dat);
	   foreach($dats as $valu){
		 $array[]=$valu;
	  }
	}

  }
  
  $a =count($array);
  if($a==1){
	 $reserve ='1 local';
  }
  elseif($a==0 OR empty($array)){
	  
	$reserve ='0 local'; 
  }
  
  else{
	  
	 $reserve=' '.$a.' locaux'; 
  }
  
  // le nombre d'elements dans le tab
  $b=count($tab);
  
  if($b==0 OR empty($b)){
	$clients ='Zéro client facturé';
  }
  
  elseif($b==1){
	 $clients ='un client facturé'; 
  }
  
  else{
	  
	 $clients = ' '.$b.' clients facturés'; 
  }
  
  // le nombre d'elements dans le tabs
  $c=count($tabs);
  
  if($c==0){
	$cl='aucune facture annulée';
  }
  
  elseif($b==1){
	 $cl='une facture annulée'; 
  }
  
  else{
	  
	 $cl = ' '.$c.' factures annulées'; 
  } 


 // recupére les depense du crédit fournisseur dans ta table depense
 $rev=$bds->prepare('SELECT montant,status FROM depense WHERE email_ocd= :email_ocd');
 $rev->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
 $datac=$rev->fetchAll();
 // creer un tableau
 $data =[];
 
 foreach($datac as $dats){
	 if($dats['status']==2){
    $dat= $dats['montant'];
	// créer un tableau
	$dat = explode(',',$dat);
	
	foreach($dat as $value){
	 $data[]=$value;
	}
   }
 }
// la somme des valeur du tableau pour les crédit fournisseur
 $sum = array_sum($data);   
	 
 $rev->closeCursor();

?>

<!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Type ou nombre de place chambre" aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-success badge-counter" id="news_data">1+</span>
                                <span class="badge badge-success badge-counter" id="news">1+</span>
                                
							</a>
                            <!-- Dropdown - Alerts -->
							
							<div class="drops" aria-labelledby="messagesDropdown" style="display:none">
                              
                            <div class="bs">
							<h2>Dernier enregistrement</h2>
							<?php
			// afficher les dernières enregistrements
		// aller chercher les auteurs en écriture sur une facture
	    $reh=$bds->prepare('SELECT date,numero,clients,montant,type,types FROM facture WHERE  email_ocd= :email_ocd  ORDER BY id DESC LIMIT 0,5');
        $reh->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
        				
			while($dones=$reh->fetch()){
			
            if($dones['type']==1){
            $icons='<i class="fas fa-coins" style="font-size:15px;color:#42A50A"></i>';
		    $type ='<span class="sejour">'.$dones['types'].'</span>';
			
		  }
        	
          if($dones['type']==2){
             $icons='<i class="fas fa-coins" style="font-size:15px;color:#650699"></i>';
			 $type ='<span class="pass">'.$dones['types'].'</span>';
		  }

          if($dones['type']==3){
            $icons='<i class="fas fa-wheelchair" style="font-size:15px;color:#063999"></i>';
			$type ='<span class="reservation">'.$dones['types'].'</span>';
		  }

		  if($dones['type']==4){
            $icons='<i class="fas fa-wheelchair" style="font-size:15px;color:#063999"></i>';
			$type ='<span class="annule">'.$dones['types'].'</span>';
		  }
			 
		 echo'<div class="us">'.$icons.'  <i class="far fa-user" style="font-size:15px;padding-left:3px;"></i>  '.$dones['clients'].'<br/>
		       '.$type.' '.$dones['montant'].' xof</div>';
		}
							
		$reh->closeCursor();				
			?>
			
		<div class="bd">
          
              <h1> utilisateurs(en ligne)</h1>
		
		<div class="users">
		
		<?php
        $rq=$bdd->prepare('SELECT user,permission,numero,date,heure,active,society FROM inscription_client WHERE email_ocd= :email_ocd');
        $rq->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
   		
		  while($dato=$rq->fetch()){
		    if($dato['society']==""){
			 $transmi="";  
		   }
		   
		   else{
			   
			  $transmi ='travail à '.$dato['society'].''; 
		   } 
			
	     if($dato['active']=="on"){
	       $action='<i class="fas fa-circle" style="font-size:12px;color:green;"></i>  en ligne';
	      }
          if($dato['active']=="off"){
          $action=' connecté depuis '.$dato['date'].' à '.$dato['heure'].' ';
	     }

         echo'<div class="user"><i class="far fa-user"></i> '.$dato['user'].' '.$action.'<br/>'.$transmi.'</div> ';	 
       }
     ?>
						
	</div>
	 </div>
	 
	 <div class="bc">
		<h1>Résultat de trésorerie</h1>
		<h3>Précision Net:</h3>
		<div class="h"><?php echo$name;?></div><br/>
		<h3>Prévision attendu:</h3>
		<div class="h"><?php echo$names;?></div>
		</div>
	               </div>
                            
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge" id="sms"></span><!--resultat ajax-->
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="drop" aria-labelledby="messagesDropdown" style="display:none">
                                <h6>Derniers Messages</h6>
                                
								<div id="resultats_messages"></div><!--ajax --->
                                
								<div class="views"><a href="gestion_datas_messanger.php" title="voir plus">voir plus</a></div>
                                </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="im" class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div id="data" class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Mon compte
                                </a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="deconnexion.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Déconnexion
                                </a>
                            </div>
                        </li>

                    </ul>