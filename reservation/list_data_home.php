<?php
include('connecte_db.php');
include('inc_session.php');

$record_peage=20;
$page="";

$date_start =$_GET['date_start'];
$date_end =$_GET['date_end'];
$home_user =$_GET['home_user'];
if(isset($_POST['page'])){
$page = $_POST['page'];
}

else {
$page=1;	
}

$smart_from =($page -1)*$record_peage;
    // emttre la requete sur le fonction
	$active="on";
	$req=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,equipements,equipement,cout_nuite,cout_pass,icons,infos,society FROM chambre WHERE email_ocd= :email_ocd AND active= :ac LIMIT '.$smart_from.','.$record_peage.'');
    $req->execute(array(':ac'=>$active,
	                    ':email_ocd'=>$_SESSION['email_ocd']));
	$don = $req->fetchAll();
	
	$rem='<span class="ts"></span>';
	$rt=",";
	$rs='<span class="ts"><i style="font-size:12px" class="fa">&#xf00c;</i></span>';
	// on boucle sur les les resultats
     $sql=$bds->prepare('SELECT chambre.id_chambre, chambre.type_logement,  home_occupation.date, home_occupation.dates, home_occupation.type
      FROM home_occupation
      INNER JOIN chambre ON chambre.id_chambre = home_occupation.id_local WHERE
	  chambre.email_ocd= :email');
	  $sql->execute(array(':email'=>$_SESSION['email_ocd']));
      $dns=$sql->fetchAll();
	  $arr1=[]; // recupere les id_chambre 
	 $array1 =[];// recupere les valeurs pour les sejours et réservation
	  $array2 = [];// recupere les valeurs pour horaires
	  $array3 = [];// pour les chambre bloque;
	  $dones = []; // pour les dates au pour horaire.
	  $color = [];// compter les locaux disponible
	  $color1 = [];//compter le nombre de locaux
	  foreach($dns as $val){
		 // lancer les requetes et enregsitre les données dans les different tableau
		     $data1 = $val['id_chambre'];
			 $datax = $val['type'];
			 $datasx =$val['date'];
			 // regroupe les id_chambre
			 $dat = explode(',',$data1);
			 foreach($dat as $vals){
				$arr1[] = $vals; 
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
				 $datis =$val['dates'];
                 $da = explode(',',$datis);
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
                  $array3[]=$da;				
				 }
				}
			 // recupere les elements dans un tableau.
		      // transmettre les tableau avec les valeurs id_champs et leur date.
	  }
      
	 echo'<div class="content_home">';
	  
	 foreach($don as $donnees) {
	$d = $donnees['id_chambre'];
	// verifier si id_chambre n'est pas dans le tableau des id_local
	if(!in_array($d,$arr1)){
		$css ="dispo";
		$stauts="";
	  $data = explode(',',$d);
	  foreach($data as $val){
		 $color[]=$val; 
	  }
	}
	elseif(in_array($d,$array3)){
		$css="indispo";
		$status="";
	}
	else{
		// boucle sur le premier tableau associative
		// tableau pour recuperer les donnees dont id_chambre 1 valeur du 
		$array =[];// tableau pour les séjour 1 et reservation type 3
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
					  $array[] =$d; 
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
		  // dans le cas ou un local est bloque de type 5
		  
		  // recupere les dates d'enregsitrer dans le cas horaire.
		  foreach($dns as $das){
			 $dones[] = $das;
		  }
		// on verifie le nombre d'élement dans le tableau
	   $nombre = count($array);
	   $nombr = count($b);
	   
	 if($nombre!=0){	
    $debut = min($array);
    $sortie = max($array);
	$date =date('Y-m-d');

    	$dates1 = explode('-',$debut);
	     $j2 = $dates1[2];
	     $mm2 = $dates1[1];
	      $an2 = $dates1[0];
	    $dates2 = explode('-',$sortie);
	     $j3 = $dates2[2];
	     $mm3 = $dates2[1];
	     $an3 = $dates2[0];  
   // on recupére le premier et la dernier date
    // si le client est facturé sur un séjour ou reservation
	if(in_array($date_start,$array)){
      $name='<i class="fas fa-exclamation-circle" style="color:red";></i> indisponible';
        $css="indispo";
		$status="";
	 }
	 if($debut <= $date_start AND $date_end<= $sortie){
     $name='<i class="fas fa-exclamation-circle" style="color:red";></i> indisponible';
		$css="indispo";
		$status="";
     }
    if($debut <= $date_start AND $sortie <= $date_end){
        $name='<i class="fas fa-exclamation-circle" style="color:red";></i> indisponible';
		$css="indispo";
		$status="";
	}		 
    if(in_array($date_end,$array)){
      $name='<i class="fas fa-exclamation-circle" style="color:red;"></i> indisponible';
		$css="indispo";
		$status="";
    }
	
	// if le local est réserve
	if($date_start < $debut){
	$color ='reserve';
	$status ='réservée à partir du <span class="dt">'.$j2.'/'.$mm2.'/'.$an2.'probale disponibilité à compter du '.$j3.'/'.$mm2.'/'.$an2.'</span>';
	}
	
	if(!in_array($date_end,$array) AND !in_array($date_start,$array)){
	$dates1 = explode('-',$date_start);
	$j = $dates1[2];
	$mm = $dates1[1];
	$an = $dates1[0];
	$dates2 = explode('-',$date_end);
	$j1 = $dates2[2];
	$mm1 = $dates2[1];
	$an1 = $dates2[0];
	// la vairable en envoi
	$envoi='<a href="#" class="add_home" data-id2="'.$donnees['id_chambre'].'" title="facturé le local">Ajouter le local</a>';
   $name='local disponible du '.$j.'/'.$mm.'/'.$an.' au '.$j1.'/'.$mm1.'/'.$an1.'';
		$a="h5"; 
		$css="dispo";
		$color1[]='dispo';
		$status="";
	 }
	}
	 if($nombre==0){
    $dates1 = explode('-',$date_start);
	$j = $dates1[2];
	$mm = $dates1[1];
	$an = $dates1[0];
	
	$dates2 = explode('-',$date_end);
	
	$j1 = $dates2[2];
	$mm1 = $dates2[1];
	$an1 = $dates2[0];
	
	// la vairable en envoi
	$envoi='<a href="#" class="add_home" data-id2="'.$donnees['id_chambre'].'" title="facturé le local">Ajouter le local</a>';
     $name='local disponible du '.$j.'/'.$mm.'/'.$an.' au '.$j1.'/'.$mm1.'/'.$an1.'';
		$a="h5";
		$css="dispo";
		$status="";
	}
	 // si le client est facturé sur une horaire
  }
    
	if($donnees['society']==""){
		$map="";
	 }
	else{
	   $map='<img src="img/map.png" alt="map" width="15px" height="15px" />
	      '.$donnees['society'].' ';
	 }
	 $homes='<i class="fas fa-home"></i>';
	
	echo'<div class="homes'.$css.'" id="homes'.$css.'">
	      <div class="resul">
		      <a href="data_homes.php?id_home='.$donnees['id_chambre'].'&home_user='.$home_user.'&date_start='.$date_start.'&date_end='.$date_end.'" title="decouvrir">'.$donnees['type_logement'].'
			  <div class="titre">'.$homes.' '.$donnees['chambre'].'</div>
			  <div style="font-size:14px;"> '.$map.'<br/>
			  
			  </div>
		     </a>
			 <button class="add" data-id2="'.$donnees['id_chambre'].'" title="réservez le local">Ajouter</button>
			 <button class="adds" data-id2="'.$donnees['id_chambre'].'" title="réservez le local">Ajouter</button>
			 </div>

			 <input type="hidden" id="prix_nuite'.$donnees['id_chambre'].'" value="'.$donnees['cout_nuite'].'"><input type="hidden" id="prix_pass'.$donnees['id_chambre'].'" value="'.$donnees['cout_pass'].'"><input type="hidden" id="chambre'.$donnees['id_chambre'].'" value="'.$donnees['chambre'].'"><input type="hidden" id="id_chambre'.$donnees['id_chambre'].'" value="'.$donnees['id_chambre'].'">
			 
			 </div>';	
	     }
	echo'</div>';
	
	if(!isset($color)){
	$total1=0;
	}
	else{
		$total1 =count($color);
	}
	if(empty($color1)){
		$total2=0;
	}
	else{
		$total2 =count($color1);
	}
	
	$total = $total1+$total2;
	 if($total==1){
		echo'<input type="hidden" id="test" value="Reste qu\'une chambre libre">'; 
	  }
	  elseif($total==0){
		echo'<input type="hidden" id="tests">toutes nos chambres sont occupées">';
	  }
	  else{
		  echo'<input type="hidden" id="test" class="er" value="'.$total.' chambres disponibles">';
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

?>