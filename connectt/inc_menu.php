<?php
include('connecte_db.php');
include('inc_session.php');

   
  $req=$bdd->prepare('SELECT id,logo,user,permission,id_visitor FROM inscription_client WHERE email_user= :email_user');
   $req->execute(array(':email_user'=>$_SESSION['email_user']));
   $donnees =$req->fetch();
   
   $date=date('Y-m-d');
   $dates =explode('-',$date);
   
    $j = $dates[2];
	$mm = $dates[1];
	$an = $dates[0];
	
	$dats = $j.'-'.$mm.'-'.$an;

  
   $dat=date('H:i')

?>
<div class="xs"><i class="fas fa-times" style="color:white;font-size:20px;"></i></div>
<div class="menu_mobile">
<?php
			
			if($donnees['permission']=="user:boss") {
			
            echo'<div class="link">
                <a class="nav" href="tableau_data_home.php">
                    <i class="fas fa-chart-line"></i>
                    <span class="nv">Tableau de bord</span></a>
            </div>';			
				
			}
			
			if($donnees['permission']=="user:gestionnaire") {
			
            echo'<div class="link">
                <a class="nav" href="tableau_data_home.php">
                    <i class="fas fa-chart-line"></i>
                    <span class="nv">Tableau de bord</span></a>
            </div>';			
				
			}
			
			?>
			
			<div class="link">
                <a class="nav" href="gestion_data_home.php?data=<?php echo$dats;?>&home_heure=<?php echo$dat;?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="nv">Bord local</span>
                </a>
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            
			<?php
			
	if($donnees['permission']=="user:boss" OR $donnees['permission']=="user:gestionnaire"){
			echo'<div class="link">
                <a class="nav" title="enregistrer vos locaux" href="inventaire_gestion_home.php"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-house-user"></i>
                    <span>Inventaire des locaux </span>
                </a>
            </div>';
	       }
			?>

            <!-- Nav Item - Utilities Collapse Menu -->
            <div class="link">
                <a class="nav" id="navs" title="séjour/réservation.." href="#" 
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="far fa-user"></i>
                    <span class="nv"> Gérer les clients</span><span class="nv"><i class="fas fa-angle-down"></i></span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div id="menu_s" class="bg-white py-2 collapse-inner rounded">
                        <div><a class="collapse-item" href="gestion_datas_customer.php">Gérer des encaissements</a></div>
                        <div><a class="collapse-item" href="gestion_customer_home.php">Agenda des réservation</a></div>
						
						<div><a class="collapse-item" href="externe_customer_home.php" title="intéréagir avec vos clients">Demande client</a></div>
                       
                    </div>
                </div>
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <div class="link">
                <a class="nav" title="facture clients" href="gestion_facture_customer.php"
                    aria-controls="collapsePages">
                    <i class="fas fa-coins"></i>
                    <span class="nv">Factures</span>
                </a>
                
            </div>

            <!-- Nav Item - Charts -->
            <div class="link">
                <a class="nav" href="gestion_datas_depenses.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span class="nv">Dépense</span></a>
            </div>

            <!-- Nav Item - Tables -->
            <?php
			
			if($donnees['permission']=="user:boss") {
			
            echo'<div class="link">
                <a class="nav" href="gestion_data_tresorerie.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span class="nv">Trésorerie</span></a>
            </div>';			
				
			}
			
			if($donnees['permission']=="user:gestionnaire") {
			
            echo'<div class="link">
                <a class="nav" href="gestion_data_tresorerie.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span class="nv">Trésorerie</span></a>
            </div>';			
				
			}
			
			?>

            <!-- Nav Item - Tables -->
            <div class="link">
                <a class="nav" href="gestion_datas_messanger.php">
                    <i class="fas fa-comment-alt"></i>
                    <span class="nv">Equipes messanger</span><span id="data_sms"></span><!--retour ajax--></a>
            </div>
			
			<?php
			
			if($donnees['permission']=="user:boss") {
			
            echo'<div class="link">
                <a class="nav" href="gestion_parameter_datas.php">
                    <i class="fas fa-cog"></i>
                    <span class="nv">Paramètre</span></a>
            </li>';			
				
			}
			
			if($donnees['permission']=="user:gestionnaire") {
			
            echo'<li class="link">
                <a class="nav" href="gestion_parameter_datas.php">
                    <i class="fas fa-cog"></i>
                    <span class="nv">Paramètre</span></a>
            </li>';			
				
			}
			
			
			?>
             
			<!-- Nav Item - Tables -->
            <div class="link">
                <a class="nav" href="https://reservation.ocdgestion.com/index.php?home_user=<?php echo$donnees['id_visitor'];?>">
                    <i class="fas fa-comment-alt"></i>
                    <span class="nv">Blog réservation</span><!--retour ajax--></a>
            </div> 
			
			<!-- Nav Item - Pages Collapse Menu -->
            <div class="link">
                <a class="nav" title="facture clients" href="deconnexion.php"
                    aria-controls="collapsePages">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nv">Déconnexion</span>
                </a>
                
            </div>
			 
            
</div>