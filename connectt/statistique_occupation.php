<?php
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
	 
 // statistique locaux 
 $req=$bds->prepare('SELECT id,id_chambre,chambre FROM chambre WHERE email_ocd= :email');
    $req->execute(array(':email'=>$_SESSION['email_ocd']));
	$don = $req->fetchAll();
// jointure pour recupérer les données entre les tables
	  $sql=$bds->prepare('SELECT chambre.id_chambre, chambre.type_logement, 
      chambre.chambre,chambre.cout_nuite, chambre.cout_pass, home_occupation.date, home_occupation.dates, home_occupation.type
      FROM home_occupation
      INNER JOIN chambre ON chambre.id_chambre = home_occupation.id_local WHERE
	  chambre.email_ocd= :email');
	  $sql->execute(array(':email'=>$_SESSION['email_ocd']));
	 $dns=$sql->fetchAll();
	 $arr1=[]; // table pour recupérer les id des chambre 
	 $array1 =[];// recupere les valeurs pour les sejours et réservation
	  $array2 = [];// recupere les valeurs pour horaires
	  $array31 = [];// pour les chambre bloque id de chmabre bloque;
	  $data = []; // recupere les dates pour la partie horaire
	  $color1 =[];
	  $color2 =[];
	  $color3 =[];
	  $color4 = [];
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
			}
	 foreach($don as $donnees) {
	$d=$donnees['id_chambre'];
	// verifier si id_chambre n'est pas dans le tableau des id_local
	//mettre les id_chambre dans un tableau
	if(!in_array($d,$arr1)){
		$ds=explode(',',$d);
		foreach($ds as $vae){
		 $color1[]=$vae;
		}
	    $color='libre';
		$status ='le local est disponible <br/><br/><br/>';
	}
	elseif(in_array($d,$array31)){
		//mettre les id_chambre  un tableau
		$color='bloque';
		$ds=explode(',',$d);
		foreach($ds as $vae){
		 $color4[]=$vae;
		}
		$status ='le local est bloqué temporairement<br/><br/><span class="drt"><i class="fas fa-minus-circle" style="font-size:16px;padding-left:70%;"></span></i></span>';
	}
	else{
		// boucle sur le premier tableau associative
		// tableau pour recuperer les donnees dont id_chambre 1 valeur du 
		$a =[];// tableau pour les séjour 1 et reservation type 3
		$b =[];// tableau pour les horaire pass type 2
		$c = [];// tableau pour les chmabre bloque
		$k =[];// les id_chambre associe au tablea
		$j = [];
		 foreach($array1 as $key =>$values){
			$data =$values;
			foreach($values as $keys =>$vals){
				if($keys == $donnees['id_chambre']){
				  //$a[] = $vals;
                   $dt = $vals;
				   $k[]=$donnees['id_chambre'];
				   
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
				$j[] = $donnees['id_chambre'];
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
	 // transormer en chaine de caractere le table
	 $color2[]='occupe';
	$color ='occupe';
	$status ='un client est présent dans le local,<br/>il sera disponible à partir<br/> du <span class="dt">'.$j1.'/'.$mm1.'/'.$an1.'<br/></span><span class="dry"><i class="fas fa-bed" style="font-size:18px"></i></span>';	
	}
	// if le local est réserve
	elseif($date_english < $debut){
	$color3[]='reserve';
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
	    $color2[]='occupe';
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
	}// recuperation des valeurs
	// nombre de chambre librejg
	$local1 =count($color1);// nombre chmabre libre
	$local2 = count($color2);// nombre de chmabre occupé
	$local3 = count($color3);// nombre de chambre reservées
	$local4 = count($color4);// nombre de chambre bloqués
	$total1 = $local2+$local4;
	
	if($local3==1){
		$vc ="une chambre reservée";
		}
	    elseif($local3==0){
		$vc="";
		}
		else{
		$vc ='<button class="t2">'.$local3.'</button> chambres réservées';
		}
		if($local1==1){
		$vh = '<button class="t">'.$local1.'</button>une chambre disponible';
		}
		elseif($local1==0){
		$vh ="";
		}
		else{
		$vh ='<button class="t">'.$local1.'</button> chambres disponibles';
		}
		
		if($local2==1){
		$vb ='<button class="t1">'.$local2.'</button>une chambre occupée';
		}
		elseif($local2==0){
		$vb="";
		}
		else{
		$vb ='<button class="t1">'.$local2.'</button> chambres occupées';
		}
		if($local4==1){
		$vd ='<button class="t3">'.$local4.'</button> une chambre indisponible';
		}
		elseif($local4==0){
		$vd="";
		}
		else{
		$vd ='<button class="t3">'.$local4.'</button> chambres indisponibles';
		}
	