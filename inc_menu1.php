<?php
 include('connecte_db.php');
include('inc_session.php'); 
   $req=$bdd->prepare('SELECT user FROM inscription_client WHERE email_user= :email_user');
   $req->execute(array(':email_user'=>$_SESSION['email_user']));
   $donnees =$req->fetch();
   
   $date=date('Y-m-d');
   $dates =explode('-',$date);
   
    $j = $dates[2];
	$mm = $dates[1];
	$an = $dates[0];
	
	$dats = $j.'-'.$mm.'-'.$an;

  
   $dat =date('H:i');
   
   // compter le nombre de nouveaux message


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
                              
                            <div class="dev">
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
			
		<h2>Historique des utilisateurs(en ligne)</h2>
		
		<div class="users">
		
		<?php
        $rq=$bdd->prepare('SELECT user,permission,numero,date,heure,active,society FROM inscription_client WHERE email_ocd= :email_ocd');
        $rq->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
   		
		  while($dats=$rq->fetch()){
	     if($dato['active']=="on"){
	       $action='<i class="fas fa-circle" style="font-size:12px;color:green;"></i>  en ligne';
	      }
          else{
          $action='en ligne depuis '.$dats['date'].' à '.$dats['heure'].' ';
	     }

         echo'<div class="user"><i class="far fa-user"></i> '.$dats['user'].' '.$action.'<br/> venant de'.$dats['society'].'</div>';	 
       }
     ?>
	 
	 <?php
	 // requete qui va chercher les montants

   $rej=$bds->prepare('SELECT email_ocd,montant,encaisse,reservation,depense,reste FROM tresorie_customer WHERE email_ocd= :email_ocd');
   $rej->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
   $donns=$rej->fetch();
   $rej->closeCursor();

  echo'<h1>Encaissement journalier</h1>

  <div id="caisse">
 <div class="td"> Facture soldée:</div>
 <div class="tds">'.$donns['encaisse'].' XOF</div>

 <div class="td"> Dépense </div>
 <div class="tdv">'.$donns['depense'].' XOF</div>
 
 <div class="td"> Acompte réservation</div>
 <div class="tdc">'.$donns['reservation'].' XOF</div>
 
 <div class="td">Reste à payer réservation</div>
 <div class="tdc">'.$donns['reste'].' XOF</div>
       
  </div>';
 
	?>
						
		</div>
							
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
                                <span id="im" class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo$donnees['user'];?></span>
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