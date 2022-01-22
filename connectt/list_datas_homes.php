<?php
include('connecte_db.php');
include('inc_session.php');

 $record_peage=20;
$page="";

if(isset($_POST['page'])){
$page = $_POST['page'];
}

else {

$page=1;	
	
}

$smart_from =($page -1)*$record_peage;

// recupère les dates  par ordre croissant 
  // emttre la requete sur le fonction
  
   // recuperer la permission pour afficher le checkout
   	// emttre la requete sur le fonction
    $rel=$bdd->prepare('SELECT  permission,society,code FROM inscription_client WHERE email_user= :email_user');
    $rel->execute(array(':email_user'=>$_SESSION['email_user']));
	$donns =$rel->fetch();
  
  
    if($donns['permission']=="user:boss"){
	if(!isset($_GET['data_id'])){
	$req=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,active,society FROM chambre WHERE  email_ocd= :email_ocd LIMIT '.$smart_from.','.$record_peage.'');
    $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
	}
	
	elseif($_GET['data_id']=="tous"){
		$req=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,active,society FROM chambre WHERE  email_ocd= :email_ocd LIMIT '.$smart_from.','.$record_peage.'');
       $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
	}
	
	else{
		
		$req=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,equipements,equipement,cout_nuite,cout_pass,icons,infos,active,society FROM chambre WHERE codes= :code AND  email_ocd= :email_ocd LIMIT '.$smart_from.','.$record_peage.'');
    $req->execute(array(':code'=>$_GET['data_id'],
	                    ':email_ocd'=>$_SESSION['email_ocd']));
	   }
		}
		
		else{
	$session=$donns['code'];
	$req=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,equipements,equipement,cout_nuite,cout_pass,icons,infos,active,society FROM chambre WHERE codes= :code AND email_ocd= :email_ocd LIMIT '.$smart_from.','.$record_peage.'');
    $req->execute(array(':code'=>$session,
	                    ':email_ocd'=>$_SESSION['email_ocd']));
		}
	$don = $req->fetchAll();
	
   // jointure pour recupérer les données entre les tables
   if($_SESSION['code']==0){
	  $sql=$bds->prepare('SELECT chambre.id_chambre, chambre.type_logement, 
      chambre.chambre, home_occupation.date, home_occupation.dates, home_occupation.type
      FROM home_occupation
      INNER JOIN chambre ON chambre.id_chambre = home_occupation.id_local WHERE
	  chambre.email_ocd= :email');
	  $sql->execute(array(':email'=>$_SESSION['email_ocd']));
	  }
   
   else{
	    $sql=$bds->prepare('SELECT chambre.id_chambre, chambre.type_logement,  home_occupation.date, home_occupation.dates, home_occupation.type
      FROM home_occupation
      INNER JOIN chambre ON chambre.id_chambre = home_occupation.id_local WHERE
	  chambre.codes= :cd AND chambre.email_ocd= :email');
	  $sql->execute(array(':cd'=>$_SESSION['code'],
	                      ':email'=>$_SESSION['email_ocd']));
   }
	  
	  $dns=$sql->fetchAll();
	 $arr1=[]; // table pour recupérer les id des chambre 
	 $array1 =[];// recupere les valeurs pour les sejours et réservation
	  $array2 = [];// recupere les valeurs pour horaires
	  $array31 = [];// pour les chambre bloque id de chmabre bloque;
	  $data = []; // recupere les dates pour la partie horaire
	  foreach($dns as $val){
		 // lancer les requetes et enregsitre les données dans les different tableau
		     $data1 = $val['id_chambre'];
			 $datax = $val['type'];
			 $datasx =$val['date'];
			 $dats = $val['dates'];
			 
			 // regroupe les id_chambre
			 $dat = explode(',',$data1);
			 foreach($dat as $vals){
				$arr1[] = $vals; 
			}
			 // recuperer les dates pour l'horaire
			 $daty = explode(',',$dats);
			 foreach($daty as $datetime){
				$data[] = $datetime;
			 }
			 
			 if($val['type'] ==1 OR $val['type']== 3){
				 $datc = $val['date'];
				 // tableau associative id_chambre et le type
			     $arra = array(
			    $data1=>$datc
			    );
				$array1[]=$arra;
				}
				
			if($val['type'] ==2){
				 $datc1 = $val['date'];
				 // tableau associative id_chambre et le type
			     $arra1 = array(
			    $data1=>$datc1
			    );
				$array2[]=$arra1;
				}
				
			   // pour les chambre bloque
			   if($val['type']==5){
				 $datc2 = $val['date'];
				 $dats = $val['id_chambre'];
				 $dati = explode(',',$dats);
				 foreach($dati as $da){
				// recupere les id de chambre  de type 5 bloque
                  $array31[]=$da;				
				 }
				}
			   
			 // recupere les elements dans un tableau.
		      // transmettre les tableau avec les valeurs id_champs et leur date.
	  }
	  
	  foreach($don as $donnees) {
	$d = $donnees['id_chambre'];
	// verifier si id_chambre n'est pas dans le tableau des id_local
	if(!in_array($d,$arr1)){
	  $color='libre';
		$status ='le local est disponible <br/><br/><br/>';
	}
	
	elseif(in_array($d,$array31)){
		$color='bloque';
		$status ='le local est bloqué temporairement<br/><br/><span class="drt"><i class="fas fa-minus-circle" style="font-size:16px;padding-left:70%;"></span></i></span>';
	}
	
	else{
		
		// boucle sur le premier tableau associative
		// tableau pour recuperer les donnees dont id_chambre 1 valeur du 
		$a =[];// tableau pour les séjour 1 et reservation type 3
		$b =[];// tableau pour les horaire pass type 2
		$c = [];// tableau pour les chmabre bloque
		 foreach($array1 as $key =>$values){
			$data =$values;
			
			foreach($values as $keys =>$vals){
				if($keys == $donnees['id_chambre']){
				  //$a[] = $vals;
                   $dt = $vals;
				   $dts =explode(',',$dt);
				   foreach($dts as $d){
					  $a[] =$d; 
				   }
			    }
			   }
		     }
		   // dans le cas d'un passage horaire type 2
	     foreach($array2 as $clef =>$valus){
			 $datas1 = $valus;
			 foreach($valus as $clefs =>$valuess){
			if($clefs == $donnees['id_chambre']){
				$dv = $valuess;
				   $ds =explode(',',$dv);
				   foreach($ds as $h){
					  $b[]=$h; 
				   }
				}
			 }
		  }
	// recupére la date passé en paramètre
	  $date =$_GET['data'];
	   $date = explode('-',$date);
       $j = $date[2];
	   $mm = $date[1];
	   $an = $date[0];
	   // recupération des variable $_GET date et jours
	  $date_english = $j.'-'.$mm.'-'.$an;
	 $heure =$_GET['home_heure'];

     // recupéré les valeurs max et min des tableau
	   if(count($a)!=0){
	   $debut = min($a);
	   $sortie = max($a);

       	$dates1 = explode('-',$debut);
	     $j = $dates1[2];
	     $mm = $dates1[1];
	      $an = $dates1[0];
	
	    $dates2 = explode('-',$sortie);
	     $j1 = $dates2[2];
	     $mm1 = $dates2[1];
	     $an1 = $dates2[0];   
	   
	   // on recupére le premier et la dernier date
    // si le client est facturé sur un séjour ou reservation
	if($debut <= $date_english AND $date_english <= $sortie AND in_array($date_english,$a)) {
	$color ='occupe';
	$status ='un client est présent dans le local,<br/>il sera disponible à partir<br/> du <span class="dt">'.$j1.'/'.$mm1.'/'.$an1.'<br/></span><span class="dry"><i class="fas fa-bed" style="font-size:18px"></i></span>';	
	
	}
	
	 // if le local est réserve
	elseif($date_english < $debut){
	$color ='reserve';
	$status ='le local est réservé, et sera occupé <br/> à partir du <span class="dt">'.$j.'/'.$mm.'/'.$an.',sera problement libre le '.$j1.'/'.$mm1.'/'.$an1.'</span><br/>';
	}

	else{
		$color='libre';
		$status ='le local est disponible';
      }
   } 
	 // recupéré les valeurs max et min des tableau
	if(count($b)!=0){
	$debuts = min($b);
	$sorties = max($b);
	
	if(in_array($heure,$b) AND  in_array($date_english,$data)){
		// verification pour le cas des sejours pass
	    $color='occupe';
		$status ='le client fait un pass présentement';
	}
	if(!in_array($date_english,$data)){
		// verification pour le cas des sejours pass
	    $color='libre';
		$status ='le local est disponible <br/><br/><br/>';
	}
	
	}
	
	}
	if($donnees['society']==""){
		$map="";
	 }
	else{
	   $map='<img src="img/map.png" alt="map" width="15px" height="15px" />
	      '.$donnees['society'].' ';
	 }
	 echo'<div><a href="view_data_home.php?home='.$donnees['id_chambre'].'"><div class="homes" id="home'.$color.'">
		      <h3>'.$donnees['type_logement'].'</h3>
			  <div class="titre">'.$donnees['chambre'].'</div><br/>
			  <div class="dt">'.$status.'</div>
			  <div style="font-size:14px;"> '.$map.'</div>
		     </div></a></div>';	
			
	}

   	// on compte le nombre de ligne de la table
	if(!isset($_GET['data_id'])){
   $reg=$bds->prepare('SELECT count(*) AS nbrs FROM chambre WHERE email_ocd= :email_ocd');
   $reg->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
	}
	
	elseif($_GET['data_id']=="tous"){
	$reg=$bds->prepare('SELECT count(*) AS nbrs FROM chambre WHERE email_ocd= :email_ocd');
   $reg->execute(array(':email_ocd'=>$_SESSION['email_ocd']));	
   }
	else{
	  $reg=$bds->prepare('SELECT count(*) AS nbrs FROM chambre WHERE codes= :code AND email_ocd= :email_ocd');
	  $reg->execute(array(':code'=>$_GET['data_id'],
	                      ':email_ocd'=>$_SESSION['email_ocd']));
	}
    
   $dns=$reg->fetch();
   $totale_page=$dns['nbrs']/$record_peage;
   $totale_page = ceil($totale_page);
   echo'<div style="clear:both"></div>';
   echo'<div class="pied_function">';
   for($i=1; $i<=$totale_page; $i++) {
	   
	   echo'<div class="pied_page" style="cursor:pointer"><button class="bout" id="'.$i.'">'.$i.'</div>';
    }
    
	echo'</div>';

?>	