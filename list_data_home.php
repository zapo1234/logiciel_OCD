<?php
include('connecte_db.php');
include('inc_session.php');

$record_peage=9;
$page="";

if(isset($_POST['page'])){
$page = $_POST['page'];
}

else {
$page=1;	
}

$smart_from =($page -1)*$record_peage;
    // emttre la requete sur le fonction
	$active="on";
	if($_SESSION['code']==0){
		  $session=0;
		}
		else{
		$session=$_SESSION['code'];
		}
    $req=$bds->prepare('SELECT id,id_chambre,chambre,type_logement,equipements,equipement,cout_nuite,cout_pass,icons,infos FROM chambre WHERE email_ocd= :email_ocd AND codes= :code AND active= :ac LIMIT 0,80');
    $req->execute(array(':ac'=>$active,
	                    ':code'=>$session,
	                    ':email_ocd'=>$_SESSION['email_ocd']));
	
    $don = $req->fetchAll();
	
	$rem='<span class="ts"></span>';
	$rt=",";
	$rs='<span class="ts"><i style="font-size:12px" class="fa">&#xf00c;</i></span>';
	// on boucle sur les les resultats
	
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
	 $arr1=[];
	 $array1 =[];// recupere les valeurs pour les sejours et réservation
	  $array2 = [];// recupere les valeurs pour horaires
	  $array3 = [];// pour les chambre bloque;
	  $dones = []; // pour les dates au pour horaire.
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
				 // tableau associative id_chambre et le type
			     $arra2 = array(
			    $data2=>$datc2
			    );
				$array3[]=$arra2;
				}
			   
			 // recupere les elements dans un tableau.
		      // transmettre les tableau avec les valeurs id_champs et leur date.
	  }
      
	 echo'<div class="content_home">';
	  
	
	foreach($don as $donnees) {
	
	$d = $donnees['id_chambre'];
	// verifier si id_chambre n'est pas dans le tableau des id_local
	if(!in_array($d,$arr1)){
	  $color='libre';
		$status ='le local est disponible <br/><br/><br/>';
		$css ="dispo";
		$name="";
		$envoi='<a href="#" class="add_home" data-id2="'.$donnees['id_chambre'].'" title="facturé le local">Ajouter le local</a>';
        $a="h6";
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
	     foreach($array3 as $cle =>$valu){
			 $datas2 = $valu;
			 foreach($valu as $cles =>$valss){
			if($cles == $donnees['id_chambre']){
				$dvs = $valss;
				   $dss =explode(',',$dvs);
				   foreach($dss as $hs){
					  $c[]=$hs; 
				   }
				}
			 }
		  }
		  
		  // recupere les dates d'enregsitrer dans le cas horaire.
		  foreach($dns as $das){
			 $dones[] = $das;
		  }
		
		// on verifie le nombre d'élement dans le tableau
	   
	   $nombre = count($array);
	   $nombr = count($b);
	   
	   if($_POST['to']=="séjour" OR $_POST['to']=="réservation") {
	
	if($nombre!=0){	
    $debut = min($array);
    $sortie = max($array);
	$date =date('Y-m-d');
   // on recupére le premier et la dernier date
    // si le client est facturé sur un séjour ou reservation
	
     if(in_array($_POST['days'],$array)){
      $name='<i class="fas fa-exclamation-circle" style="color:red";></i> indisponible';
		$a="h6";
	     $envoi='<a href="#" class="add_home" data-id2="'.$donnees['id_chambre'].'" title="facturé le local">Ajouter le local</a>';
   
		$css="indispo";
	 }

     if($debut <= $_POST['days'] AND $_POST['das']<= $sortie){
     $name='<i class="fas fa-exclamation-circle" style="color:red";></i> indisponible';
		$a="h6";
		$envoi="";
		$css="indispo";
     }

    if($debut <= $_POST['days'] AND $sortie <= $_POST['das']){
        $name='<i class="fas fa-exclamation-circle" style="color:red";></i> indisponible';
		$a="h6";
		$envoi="";
		$css="indispo";
	}		 
    
	if(in_array($_POST['das'],$array)){
      $name='<i class="fas fa-exclamation-circle" style="color:red;"></i> indisponible';
		$a="h6";
		$envoi="";
		$css="indispo";
	 }
	 
	 if(in_array($_POST['dat'],$array)){
       $name='<i class="fas fa-exclamation-circle" style="color:red;"></i> indisponible';
		$a="h6";
		$envoi="";
		$css="indispo";
	 }
	 
	 if(!in_array($_POST['dat'],$array) AND !in_array($_POST['das'],$array) AND !in_array($_POST['days'],$array)){
	$dates1 = explode('-',$_POST['days']);
	$j = $dates1[2];
	$mm = $dates1[1];
	$an = $dates1[0];
	
	$dates2 = explode('-',$_POST['das']);
	
	$j1 = $dates2[2];
	$mm1 = $dates2[1];
	$an1 = $dates2[0];
	// la vairable en envoi
	$envoi='<a href="#" class="add_home" data-id2="'.$donnees['id_chambre'].'" title="facturé le local">Ajouter le local</a>';
   
      $name='local disponible du '.$j.'/'.$mm.'/'.$an.' au '.$j1.'/'.$mm1.'/'.$an1.'';
		$a="h5"; 
		$css="dispo";
	 }
	}
	 if($nombre==0){
    $dates1 = explode('-',$_POST['days']);
	$j = $dates1[2];
	$mm = $dates1[1];
	$an = $dates1[0];
	
	$dates2 = explode('-',$_POST['das']);
	
	$j1 = $dates2[2];
	$mm1 = $dates2[1];
	$an1 = $dates2[0];
	
	// la vairable en envoi
	$envoi='<a href="#" class="add_home" data-id2="'.$donnees['id_chambre'].'" title="facturé le local">Ajouter le local</a>';
   
      
		$name='local disponible du '.$j.'/'.$mm.'/'.$an.' au '.$j1.'/'.$mm1.'/'.$an1.'';
		$a="h5";
		$css="dispo";
	}
	 // si le client est facturé sur une horaire
	} 
	   
	   if($_POST['to']=="horaire"){
	 if($nombr!=0){
		 $debuts = min($b);
           $sorties = max($b);
		   // pour les dates du jours
		   $sort = max($dones);
		   $date= date('Y-m-d');
		   
		 if(in_array($_POST['tim'],$b) AND in_array($_POST['tis'],$b)  AND in_array($_POST['dat'],$dones)){

        $name='<i class="fas fa-exclamation-circle" style="color:red";></i> indisponible';
		$a="h6";
		$envoi="";
		$css="indispo";
	 }
	 
      if($debuts < $_POST['tim'] AND $_POST['tis']< $sorties  AND in_array($_POST['dat'],$dones)){
       $name='<i class="fas fa-exclamation-circle" style="color:red";></i> indisponible';
		$a="h6";
		$envoi ="";
		$css="indispo";
	 }
	 
	 if(in_array($_POST['dat'],$dones)){
		 $name='<i class="fas fa-exclamation-circle" style="color:red";></i> indisponible';
		$a="h6";
		$envoi ="";
		$css="indispo"; 
	 }
	 
	 if(!in_array($_POST['dat'],$dones)){
		$name='local disponible de '.$_POST['tim'].' au '.$_POST['tis'].'';
		 $a="h5";
		 $envoi='<a href="#" class="add_home" data-id2="'.$donnees['id_chambre'].'" title="facturé le local">Ajouter le local</a>';
		 $css="dispo"; 
	 }
	}
   
  
		if($nombr==0){
		 $name='local disponible de '.$_POST['tim'].' au '.$_POST['tis'].'';
		 $a="h5";
		 $envoi='<a href="#" class="add_home" data-id2="'.$donnees['id_chambre'].'" title="facturé le local">Ajouter le local</a>';
		 $css="dispo";
	  }
	}
	}
	
	
	 echo'<div  class="content3" id="'.$css.'">
		     <span class="dc">Type de local :'.$donnees['type_logement'].'</span><br/><span class="df">'.$donnees['chambre'].'</span><br/>
			 <span class="dt">'.str_replace($rt,$rem,$donnees['equipement']).'</span><br/><span class="text"></span>
			 <div class="'.$a.'">'.$name.'</div>
			 <span class="but1"><a href="#" data-id1="'.$donnees['id_chambre'].'" title="voir disponibilité">check</a></span><span class="but2">'.$envoi.'</span>
			 <input type="hidden"  name="hidden_name" id="chambre'.$donnees['id_chambre'].'" value="'.$donnees['chambre'].'">
			 <input type="hidden" id="cout_nuite'.$donnees['id_chambre'].'" value="'.$donnees['cout_nuite'].'">
		     <input type="hidden" id="cout_pass'.$donnees['id_chambre'].'" value="'.$donnees['cout_pass'].'">
			 <input type="hidden" id="chambre'.$donnees['id_chambre'].'" value="'.$donnees['chambre'].'">
			<input type="hidden" id="type'.$donnees['id_chambre'].'" value="'.$donnees['type_logement'].'">
			 </div>';
      }
	echo'</div>';
   
   

?>