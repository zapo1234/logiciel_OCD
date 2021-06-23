<?php
include('connecte_db.php');
include('inc_session.php');

   

?>

<!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a href="#"  title="importer votre logo" class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="side"><i class="fas fa-camera" style="font-size:20px;"></i></div>
            </a><br/><br/><br/><br/>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tableau de bord</span>
                </a>
            </li>
			
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
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Dépense</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Trésorie</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-comment-alt"></i>
                    <span>Equipes messanger</span></a>
            </li>
			
			<?php
			
			if($_SESSION['permission']=="user:boss") {
			
            echo'<li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Paramètre compte</span></a>
            </li>';			
				
			}
			
			?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
		
		<form id="form_logo" method="post" action="upload_logo.php" enctype="multipart/form-data">
        <input type="file" name="fichier" id="fichier" />
        <input type="submit" id="envoyer" />
       </form>