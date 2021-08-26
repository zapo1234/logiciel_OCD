<?php
include('connecte_db.php');
include('inc_session.php');

$code =$_POST['id'];
$record_peage=20;
$page="";
  
  if(isset($_POST['page'])){
$page = $_POST['page'];
}

else {

$page=1;	
	
}


$smart_from =($page -1)*$record_peage;
if($_POST['action']=="fetch") {
	 
 
 // recuperer la permission pour afficher le checkout
   	// emttre la requete sur le fonction
    $rel=$bdd->prepare('SELECT  permission,code FROM inscription_client WHERE email_user= :email_user');
    $rel->execute(array(':email_user'=>$_SESSION['email_user']));
	$donns =$rel->fetch();
 
    if($donns['permission']=="user:boss" OR $donns['permission']=="user:gestionnaire"){
		  $req=$bds->prepare('SELECT id,date,designation,fournisseur,montant,user,status,numero_facture,calls FROM depense WHERE code= :code AND  email_ocd= :email_ocd ORDER BY id DESC LIMIT '.$smart_from.','.$record_peage.'');
		  $req->execute(array(':code'=>$code,
		                     ':email_ocd'=>$_SESSION['email_ocd']));
		}
		
		if($donns['permission']=="user:employes"){
		$req=$bds->prepare('SELECT id,date,designation,fournisseur,montant,user,status,numero_facture,calls FROM depense WHERE code= :code AND email_ocd= :email_ocd ORDER BY id DESC LIMIT '.$smart_from.','.$record_peage.'');
        $req->execute(array(':code'=>$code,
                     ':email_ocd'=>$_SESSION['email_ocd']));
		}
 
    $datas=$req->fetchAll();
	
  if($donns['permission']=="user:boss"){
		
		$puts='<button type="button" class="delete">suprimer <i class="far fa-trash-alt"></i></button>
	<select name="delete_line" id="delete_line">
	<option value="">Suprimer</option>
	<option value="10">10 lignes</option>
	<option value="30">30 lignes</option>
	<option value="50">50 lignes</option>
	</select> ';
	
	$action='<form method="post" action="excels.php"> <span class="export">Export  <button type="submit" class="excel">Excel<i class="far fa-file-excel"></i></button>';
		
	}
	else{
		
		$puts="";
		$action="";
	}
	
  // on boucle sur les les resultats
	// on boucle sur les les resultats
	
	echo'<div class="expor"><h2>Gérez les dépenses de l \'entreprise</h2>'.$action.'
	<span>'.$puts.'</form></div>';
  echo'	<table id="tls">
     <thead>
     <tr class="tf">
	 <th></th>
	  <th scope="col">Date</th>
	  <th scope="col">N°facture(si existe)</th>
      <th scope="col">Désignation</th>
	  <th scope="col">fournisseur</th>
	  <th scope="col">Montant</th>
	  <th scope="col">Gestionnaire(écritures)</th>
	  <th scope="col">Actions</th>
      </tr>
      </thead>
      <tbody>';
  
  foreach($datas as $donnes){

    $nombre =$donnes['status'];
	// afficher la le checkout en fonction de la permission
	if($donns['permission']=="user:boss"){
		$put=' <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="'.$donnes['id'].'">';
	}
	else{
		$put="";
	}
	
	if($donnes['status']==1){
	 $name="dépense effectuée";
	 $mettre ='';
	 $annul='<a href="#" class="annul" title="annuler" data-id4='.$donnes['id'].'><i class="fab fa-telegram"></i> Annuler</a><br/>';
	 $modif ='<a href="#" class="modifier" title="modifier" data-id3='.$donnes['id'].'"><i class="fab fa-telegram"></i> Modifier</a><br/>';
	}
	elseif($donnes['status']==2){
	 $name="crédit fournisseur";
	 $mettre='<a href="#" class="mettre" title="mettre à jour" data-id5='.$donnes['id'].'><i class="fab fa-telegram"></i>Payer le crédit</a><br/>';
	 $annul='<a href="#" class="annul" title="annuler" data-id4='.$donnes['id'].'><i class="fab fa-telegram"></i> Annuler</a><br/>';
	 $modif='<a href="#" class="modifier" title="modifier" data-id3='.$donnes['id'].'><i class="fab fa-telegram"></i> Modifier</a><br/>';
	}
	
	elseif($donnes['status']==4){
	 $name="remboursement effectué";
	 $mettre='';
	 $annul='';
	 $modif='';
	}
	
	else{
	$name="dépense annulée";
	$mettre="";
	$annul="";
	$modif="";
	}

   $date1=$donnes['date'];
	$date1 = explode('-',$date1);
	$j = $date1[2];
	$mm = $date1[1];
	$an = $date1[0];
	
	$data =$donnes['user'];
	$users = explode(',',$data);

	$data_user = $users[0];
	
	
	// modifier en display block $donnees[user] pour écriture
	$rem='<br/>';
	$rt=",";
	
	echo'<tr class="datas'.$donnes['status'].'" id="tf">
	    <td>'.$put.'</td>
	     <td><span class="dat'.$donnes['status'].'"><i class="fas fa-circle" style="font-size:10px;"></i></span><span class="der"> enregistrement effectué le<br/>'.$j.'/'.$mm.'/'.$an.'<br/>
		 <i class="fas fa-user-edit" style="font-size:13px;color:black;"></i> par '.$data_user.'</span></td>
		 <td><span class="der">N° facture: '.$donnes['numero_facture'].'<br/><div class="data'.$donnes['status'].'">'.$name.'</span></div></td>
		 <td><span class="repas">'.$donnes['designation'].'</td>
		 <td><span class="repas">'.$donnes['fournisseur'].'</td>
		 <td><span class="repas">'.$donnes['montant'].'xof</td>
		 <td><span class="dg">'.$donnes['calls'].'</span><br/>voir<span class="actions" data-id7="'.$donnes['id'].'"> <i class="fas fa-plus" style="font-size:10px;"></i></span>
		 <div class="datis" style="display:none" id="contens'.$donnes['id'].'">'.str_replace($rt,$rem,$donnes['user']).'</div></td>
		 <td>gérer <span class="action" data-id2="'.$donnes['id'].'"><i class="fas fa-angle-down"></i></span><div class="datas" style="display:none" id="content'.$donnes['id'].'">
		 '.$mettre.'<br/>
		 '.$modif.'<br/>
		 '.$annul.'
		  </div></td>
	    </tr>';
		
		echo'<div class="mobile">
		     <div><span class="repas"></span><span class="actions" data-id7="'.$donnes['id'].'" title="voir historique"><i class="fa fa-ellipsis-h" aria-hidden="true"></i> </span></div>
			 <div class="datis" style="display:none" id="contents'.$donnes['id'].'">'.str_replace($rt,$rem,$donnes['user']).'</div>
			 <div>'.$put.' <span class="dat'.$donnes['status'].'"><i class="fas fa-circle" style="font-size:10px;"></i></span><span class="der"> transmis le <br/>'.$j.'/'.$mm.'/'.$an.'<br/>
			  <i class="fas fa-user-edit" style="font-size:13px;color:black;"></i> par '.$data_user.'</span></div>
		     <div><span class="der">N° facture: '.$donnes['numero_facture'].'</span><span class="dp">'.$donnes['montant'].'xof
			 <div class="data'.$donnes['status'].'">'.$name.'</div></div>
		     '.$mettre.'   '.$modif.'  '.$annul.'<span class="dg">'.$donnes['calls'].'</span></div>
			 
	       </div>';
    }

       echo'</table>';

     	// on compte
	  $reg=$bds->prepare('SELECT count(*) AS nbrs FROM depense WHERE code= :code AND email_ocd= :email_ocd');
        $reg->execute(array(':code'=>$code,
	                    ':email_ocd'=>$_SESSION['email_ocd'])); 
	 
	$dns=$reg->fetch();
	
	$totale_page=$dns['nbrs']/$record_peage;
	$totale_page = ceil($totale_page);
	
	for($i=1; $i<=$totale_page; $i++) {
	   
	   echo'<div class="pied_page"><button class="bout" id="'.$i.'">'.$i.'</button></div>';
    }   
  }
  ?>