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
	 
 
 // recuperer la permission pour afficher le checkout
   	// emttre la requete sur le fonction
    $rel=$bdd->prepare('SELECT  permission FROM inscription_client WHERE email_user= :email_user');
    $rel->execute(array(':email_user'=>$_SESSION['email_user']));
	$donns =$rel->fetch();
 
 
 $req=$bds->prepare('SELECT id,date,designation,fournisseur,montant,user,status,numero_facture FROM depense WHERE email_ocd= :email_ocd ORDER BY id DESC LIMIT '.$smart_from.','.$record_peage.'');
 $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
 $datas=$req->fetchAll();
	
  if($donns['permission']=="user:boss" OR $donns['permission']=="user:gestionnaire"){
		
		$puts='<button type="button" class="delete">suprimer <i class="far fa-trash-alt"></i></button>
	<select name="delete_line" id="delete_line">
	<option value="">Suprimer</option>
	<option value="10">10 lignes</option>
	<option value="30">30 lignes</option>
	<option value="50">50 lignes</option>
	</select> ';
		
	}
	else{
		
		$puts="";
	}
	
  // on boucle sur les les resultats
	// on boucle sur les les resultats
	echo'<div class="expor"><h2>Gestion des factures de vos clients</h2><form method="post" action="excels.php"> <span class="export">Export  <button type="submit" class="excel">Excel<i class="far fa-file-excel"></i></button>
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
	if($donns['permission']=="user:boss" OR $donns['permission']=="user:gestionnaire"){
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
		 <td><span class="repas">voir</span><span class="actions" data-id7="'.$donnes['id'].'" title="voir historique"> <i class="fas fa-plus" style="font-size:10px";></i></span>
		 <div class="datis" style="display:none" id="contents'.$donnes['id'].'">'.str_replace($rt,$rem,$donnes['user']).'</div></td>
		 <td>gérer <span class="action" data-id2="'.$donnes['id'].'"><i class="fas fa-angle-down"></i></span><div class="datas" style="display:none" id="content'.$donnes['id'].'">
		 '.$mettre.'<br/>
		 '.$modif.'<br/>
		 '.$annul.'
		  </div></td>
	    </tr>';
		
		echo'<div class="mobile">
		     <div><span class="dat'.$donnes['status'].'"><i class="fas fa-circle" style="font-size:10px;"></i></span><span class="der"> transmis par <br/>'.$j.'/'.$mm.'/'.$an.'<br/>
			  <i class="fas fa-user-edit" style="font-size:13px;color:black;"></i> par '.$data_user.'</span></div>
		     <div><span class="der">N° facture: '.$donnes['numero_facture'].'</span><span class="mt">'.$donnes['montant'].'
			 <div class="data'.$donnes['status'].'">'.$name.'</span></div></div>
		     '.$modif.'<br/>'.$annul.'</div>
	       </div>';
    }

       echo'</table>';

     	// on compte
	 
	 // on compte le nombre de ligne de la table facture
	 if($_SESSION['code']==0){
	 $reg=$bds->prepare('SELECT count(*) AS nbrs FROM depense WHERE email_ocd= :email_ocd');
     $reg->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
	 }
	 
	 else{
		$reg=$bds->prepare('SELECT count(*) AS nbrs FROM depense WHERE code= :code AND email_ocd= :email_ocd');
        $reg->execute(array(':code'=>$_SESSION['code'],
	                    ':email_ocd'=>$_SESSION['email_ocd'])); 
	 }
	$dns=$reg->fetch();
	
	$totale_page=$dns['nbrs']/$record_peage;
	$totale_page = ceil($totale_page);
	
	for($i=1; $i<=$totale_page; $i++) {
	   
	   echo'<div class="pied_page"><button class="bout" id="'.$i.'">'.$i.'</button></div>';
    }   
  }
  
  if($_POST['action']=="annuler"){
	  
	 $id=$_POST['id']; 
     
    $rej=$bds->prepare('SELECT email_ocd,depense FROM tresorie_customer WHERE email_ocd= :email_ocd');
   $rej->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
   $donnees=$rej->fetch();
   $rej->closeCursor();

   // aller chercher les auteurs en écriture sur une facture
	 $res=$bds->prepare('SELECT user,montant FROM depense WHERE id= :ids AND email_ocd= :email_ocd');
   $res->execute(array(':ids'=>$id,
                      ':email_ocd'=>$_SESSION['email_ocd']));
   $donns=$res->fetch();
    
	// on ajoute le user qui as annulé la facture
	// création d'un tableau pour recupérer les users
   $user_data = $donns['user'].', <i class="fas fa-exclamation-circle" style="font-size:13px;color:#AB040E;"></i> '.$_SESSION['user'].' a  annulé le  '.date('d-m-Y').'à  '.date('H:i').'</span>';
   // convertir en chaine de caractère le tableau
   $user = explode(',',$user_data);
   
   $user_datas = implode(',',$user);
    // on modifer le status
	$status=3;
	// on modifie les données de la base de données guide
         $ret=$bds->prepare('UPDATE depense SET status= :stat, user= :us WHERE id= :ids AND email_ocd= :email_ocd');
        $ret->execute(array(':stat'=>$status,
							 ':us'=>$user_datas,
							 ':ids'=>$id,
                            ':email_ocd'=>$_SESSION['email_ocd']
					 ));
    
// on modifie les données de la base de données guide
         $rev=$bds->prepare('UPDATE tresorie_customer SET depense= :dep WHERE  email_ocd= :email_ocd');
        $rev->execute(array(':dep'=>$donnees['depense']-$donnes['montant'],
                            ':email_ocd'=>$_SESSION['email_ocd']));
					 
           echo'<div class="enre"><span class="d" style="color:#AB040E;"><i class="fas fa-exclamation-circle" style="font-size:16px;color:#AB040E;"></i> vous avez annulé la facture</span></div>';
	    
	  
	}
	
	
	if($_POST['action']=="modifier"){
	
	$id =$_POST['id'];
	
	// aller chercher les auteurs en écriture sur une facture
	 $res=$bds->prepare('SELECT date,numero_facture,designation,fournisseur,nature,user,montant,status FROM depense WHERE id= :ids AND email_ocd= :email_ocd');
   $res->execute(array(':ids'=>$id,
                      ':email_ocd'=>$_SESSION['email_ocd']));
   $donns=$res->fetch();
    
	echo'<div class="result">
	     <h4>Modifier les données de la dépense sélectionnée</h4>
		 <form method="post" id="form_modif" action="">
		 <div class="h"><label>N° facture</label><br/> :<input type="text" id="facts" name="facts" value="'.$donns['numero_facture'].'"><br/><span class="error1"></span></div>
		 <div class="h"><label>Status :<br/><select id="status" name="status" required><option value="'.$donns['status'].'">'.$donns['nature'].'</option>
		 <option value="1">dépense effectuée</option><option value="2">crédit fournisseur</option></select><br/></div>
		 <div class="h"><label>Date</label> :<br/><input type="date" id="date" name="dat" value="'.$donns['date'].'" required></div>
		 <div class="h"><label>Désignation:</label><br/><input type="text" name="designatio" id="designatio" value="'.$donns['designation'].'"><br/><span class="error4"></span></div>
		 <div class="h"><label>fournisseur:</label><br/><input type="text" name="fournisseu" id="fournisseu" value="'.$donns['fournisseur'].'"><br/><span class="error3"></span></div>
		 <div class="h"><label>Montant:</label><br/><input type="text" id="monts" value="'.$donns['montant'].'"><br/><span class="error6"></span></div>
		 <input type="hidden" id="md" name="md" value="'.$id.'">
		 <input type="hidden" name="token" id="token" value="'.$_SESSION['token'].'">
		 <div class="h"><input type="button" id="modif" value="Modifier"></label></div>
		 </form>
	  </div>';
   
         
	}
	
	if($_POST['action']=="modi"){
	$id =$_POST['md'];
    
	$designation = trim(strip_tags($_POST['designatio']));
	$fournisseur = trim(strip_tags($_POST['fournisseu']));
	$date =$_POST['date'];
	$fact =$_POST['facts'];
	$status =$_POST['status'];
	$monts =$_POST['monts'];
	
	if($status==1){
    $nature='dépense effectuée'; 
	}
 
    if($status==2){
	$nature='crédit fournisseur'; 
   }
	
	 $ren=$bds->prepare('SELECT email_ocd,depense FROM tresorie_customer WHERE email_ocd= :email_ocd');
   $ren->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
   $donnees=$ren->fetch();
   $ren->closeCursor();

   // aller chercher les auteurs en écriture sur une facture
	 $res=$bds->prepare('SELECT user,montant FROM depense WHERE id= :ids AND email_ocd= :email_ocd');
   $res->execute(array(':ids'=>$id,
                      ':email_ocd'=>$_SESSION['email_ocd']));
   $donns=$res->fetch();
    
	// on ajoute le user qui as annulé la facture
	// création d'un tableau pour recupérer les users
   $user_data = $donns['user'].',  <i class="fas fa-user-edit" style="font-size:13px;color:#4e73df;"></i>'.$_SESSION['user'].' à modifié le  '.date('d-m-Y').'à  '.date('H:i').'<span class="edit"></span>';
   // convertir en chaine de caractère le tableau
   $user = explode(',',$user_data);
   
   $user_datas = implode(',',$user);
    // on modifer les montants
	// on modifie les données de la base de données guide
         $ret=$bds->prepare('UPDATE depense SET date= :dat, numero_facture= :fact, designation= :desi, fournisseur= :fourni, user = :us, nature= :nat, montant= :mont, status= :stat 
		 WHERE id= :ids AND email_ocd= :email_ocd');
        $ret->execute(array(':dat'=>$date,
		                    ':fact'=>$fact,
		                    ':desi'=>$designation,
							':fourni'=>$fournisseur,
							':us'=>$user_datas,
							':nat'=>$nature,
		                    ':stat'=>$status,
							':mont'=>$monts,
							':ids'=>$id,
                            ':email_ocd'=>$_SESSION['email_ocd']
					 ));
    
// on modifie les données de la base de données guide
        $montant =$donnees['depense']-$donns['montant'];
		$montas =$montant+$monts;
         // on modifie les données de la base de données guide
  $ret=$bds->prepare('UPDATE tresorie_customer SET depense= :des WHERE email_ocd= :email_ocd');
  $ret->execute(array(':des'=>$montas,
                       ':email_ocd'=>$_SESSION['email_ocd']
					 ));
							
			
		
	}
	
	
 if($_POST['action']=="delete_check"){
	 
	if(isset($_POST['checkbox_value'])){
   $email=$_SESSION['email_ocd'];
   
	for($count= 0; $count < count($_POST['checkbox_value']); $count++) {
		$req="DELETE FROM depense WHERE id ='".$_POST['checkbox_value'][$count]."' AND email_ocd='".$email."'";
		$statement= $bds->prepare($req);
		$statement->execute();
		
    }
		 
 }
 }
 
  // mise à jour du crédit fournisseur
  if($_POST['action']=="mettre"){
	  $id =$_POST['id'];
	  $ids = $_POST['ids'];
	  $montant = $_POST['mont'];
	 // aller chercher les auteurs en écriture sur une facture
	 $res=$bds->prepare('SELECT user,montant FROM depense WHERE id= :ids AND email_ocd= :email_ocd');
   $res->execute(array(':ids'=>$id,
                      ':email_ocd'=>$_SESSION['email_ocd']));
   $donns=$res->fetch();
    
	$monts=$donns['montant']-$montant;
	// on ajoute le user qui as annulé la facture
	// création d'un tableau pour recupérer les users
   $user_data = $donns['user'].', <i class="fas fa-user-edit" style="font-size:13px;color:#4e73df;"></i>'.$_SESSION['user'].' à payer la somme de '.$montant.' xof  le  '.date('d-m-Y').'à  '.date('H:i').' par   <span class="edit"></span>';
   // convertir en chaine de caractère le tableau
   $user = explode(',',$user_data);
   
   $user_datas = implode(',',$user);
    // on modifer les montants
	// on modifie les données de la base de données guide
        if($montant < $donns['montant']){ 
		$ret=$bds->prepare('UPDATE depense SET user= :us, montant= :mont WHERE id= :ids AND email_ocd= :email_ocd');
        $ret->execute(array(':us'=>$user_datas,
		                    ':mont'=>$monts,
							':ids'=>$id,
                            ':email_ocd'=>$_SESSION['email_ocd']
					 ));
        }
		
		if($montant==$donns['montant']){
		$nature ="remboursement effectué";
        $status=4;		
			
		$ret=$bds->prepare('UPDATE depense SET user= :us, montant= :mont, nature= :nat, status= :stat WHERE id= :ids AND email_ocd= :email_ocd');
        $ret->execute(array(':us'=>$user_datas,
		                    ':mont'=>$monts,
							':nat'=>$nature,
							':stat'=>$status,
							':ids'=>$id,
                            ':email_ocd'=>$_SESSION['email_ocd']
					 ));	
			
		}
      
  }
 