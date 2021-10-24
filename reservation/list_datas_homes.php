<?php
include('../connecte_db.php');
$record_peage=20;
$page="";
// recupere les user_get
$home_user =$_GET['home_user'];

if(isset($_POST['page'])){
$page = $_POST['page'];
}

else {

$page=1;	
	
}

$smart_from =($page -1)*$record_peage;
    $active ="on";
    $req=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,cout_nuite,cout_pass,active,society FROM chambre WHERE active= :ac AND id_visitor= :id LIMIT '.$smart_from.','.$record_peage.'');
    $req->execute(array(':ac'=>$active,
	                    ':id'=>$home_user));
	$don = $req->fetchAll();
  // jointure pour recupérer les données entre les tables
	  $sql=$bds->prepare('SELECT chambre.id_chambre, chambre.type_logement, 
      chambre.chambre,chambre.cout_nuite, chambre.cout_pass, home_occupation.date, home_occupation.dates, home_occupation.type
      FROM home_occupation
      INNER JOIN chambre ON chambre.id_chambre = home_occupation.id_local WHERE
	  chambre.id_visitor= :id');
	  $sql->execute(array(':id'=>$home_user));
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
	   // recupération des variable $_GET date et jours
	  $date_english = date('Y-m-d');
	 $heure =date('H:i');
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
	$status ='réservée à partir du <span class="dt">'.$j.'/'.$mm.'/'.$an.'</span>';
	}
	else{
		$color='libre';
		$status ='disponible';
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
		$status ='disponible';
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
	 $homes='<i class="fas fa-home"></i>';
	 
	 echo'<div class="homes.'.$color.'" id="homes'.$color.'">
	      <div class="resul">
		      <a href="data_home.php?id_home='.$donnees['id_chambre'].'&home_user='.$home_user.'" title="decouvrir">'.$donnees['type_logement'].'
			  <div class="titre">'.$homes.' '.$donnees['chambre'].'</div>
			  <div style="font-size:14px;"> '.$map.'<br/>
			  <div class="'.$color.'">'.$status.'</div>
			  </div>
		     </a>
			 <button class="add" data-id2="'.$donnees['id_chambre'].'" title="réservez le local">Ajouter</button>
			 </div>
			 <input type="hidden" id="prix_nuite'.$donnees['id_chambre'].'" value="'.$donnees['cout_nuite'].'"><input type="hidden" id="prix_pass'.$donnees['id_chambre'].'" value="'.$donnees['cout_pass'].'"><input type="hidden" id="chambre'.$donnees['id_chambre'].'" value="'.$donnees['chambre'].'"><input type="hidden" id="id_chambre'.$donnees['id_chambre'].'" value="'.$donnees['id_chambre'].'">
			 
			 </div>';	
		}

   $reg=$bds->prepare('SELECT count(*) AS nbrs FROM chambre WHERE  id_visitor= :id');
	  $reg->execute(array(':id'=>$home_user));
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