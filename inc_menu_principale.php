<?php
include('connecte_db.php');
include('inc_session.php');

   
  $req=$bdd->prepare('SELECT id,logo FROM inscription_client WHERE email_ocd= :email_ocd');
   $req->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
   $donnees =$req->fetch();

?>

<!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a href="#"  title="importer votre logo" class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="side">
				<div id="upload">
				<?php
				echo'<img id="logo" src="image_logo/'.$donnees['logo'].'" width="155px" height="155px" alt="'.$donnees['logo'].'">';
				?>
				</div><!--affichage ajax log-->
				</div>
            </a><br/><br/><br/><br/>

            <!-- Nav Item - Dashboard -->
            <?php
			
			if($_SESSION['permission']=="user:boss") {
			
            echo'<li class="nav-item">
                <a class="nav-link" href="tableau_bord_data.html">
                    <i class="fas fa-chart-line"></i>
                    <span>Tableau de bord</span></a>
            </li>';			
				
			}
			
			?>
			
			<li class="nav-item">
                <a class="nav-link" href="gestion_data_home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Bord local</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Gestion innovante
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" title="enregistrer vos locaux" href="inventaire_gestion_home.php"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class='fas fa-house-user'></i>
                    <span>Inventaire des locaux </span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" title="séjour/réservation.." href="gestion_homes_data.php" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="far fa-user"></i>
                    <span>clients</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">facturer des chambres</h6>
                        <a class="collapse-item" href="gestion_datas_customer.php">gérer des encaissements</a>
                        <a class="collapse-item" href="gestion_customer_home.php">Carnet d'adresse</a>
                       
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" title="facture clients" href="gestion_facture_customer.php"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Factures</span>
                </a>
                
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="gestion_datas_depenses.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Dépense</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <?php
			
			if($_SESSION['permission']=="user:boss") {
			
            echo'<li class="nav-item">
                <a class="nav-link" href="gestion_data_tresorerie.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Trésorerie</span></a>
            </li>';			
				
			}
			
			?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="gestion_datas_messager.php">
                    <i class="fas fa-comment-alt"></i>
                    <span>Equipes messanger</span></a>
            </li>
			
			<?php
			
			if($_SESSION['permission']=="user:boss") {
			
            echo'<li class="nav-item">
                <a class="nav-link" href="gestion_parameter_datas.php">
                    <i class="fas fa-cog"></i>
                    <span>Paramètre</span></a>
            </li>';			
				
			}
			
			?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
		
		