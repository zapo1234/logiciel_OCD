<div id="pag"><div class="xee"><i class="material-icons" style="font-size:26px;cursor:pointer;color:white;position:fixed;left:80%;cursor:pointer;top:40px;z-index:5;font-weight:700;">clear</i></div></div>
<div class="content11">
 
 <?php
 // on requete sur la table 
 $rej=$bdd->prepare('SELECT denomination,user FROM inscription_client WHERE email_ocd= :email_ocd');
   $rej->execute(array(':email_ocd'=>$_SESSION['email_ocd']));
   $donnees=$rej->fetch();
 
 echo'<table id="user">
 <tr>
 <td class="name_entreprise"><i style="font-size:20px;color:#1E90FF" class="fa">&#xf2bc;</i> Entreprise :</td>
 <td class="name_eur">'.$donnees['denomination'].'</td>
 </tr>
 <tr>
 <td class="name_entreprise"><i style="color:#1E90FF;font-size:18px" class="fa">&#xf007;</i> User name:</td>
 <td class="name_user">'.$donnees['user'].'</td>
 </tr></table>';
 ?>
 </div><!--div content11-->
 
 <div class="content12">
 <div class="lien1"><i style="font-size:" class="fa" style="color:white;">&#xf0e4;</i> <a href="gestion_bord_recap.php" title="visualiser votre trafic">Tableau de bord</a></div>
 <div class="lien1"><i style="font-size:" class="fa" style="color:white;">&#xf0e4;</i> <a href="gestion_bord_recap.php" title="inventaire des locaux ">Inventaire loacaux</a></div>
 <div class="lien1"><i style="font-size:" class="fa" style="color:white;">&#xf0e4;</i> <a href="gestion_bord_recap.php" title="gérez vos clients">Clients</a></div>
 <div class="lien1"><i style="font-size:" class="fa" style="color:white;">&#xf0e4;</i> <a href="gestion_bord_recap.php" title="visualiser votre trafic">Encaisser/réservation</a></div>
 <div class="lien1"><i style="font-size:" class="fa" style="color:white;">&#xf0e4;</i> <a href="gestion_bord_recap.php" title="visualiser votre trafic">Dépenses</a></div>
 <div class="lien1"><i style="font-size:" class="fa" style="color:white;">&#xf011;</i> <a href="deconnexion.php" title="quitter">Déconnexion</a></div>
 </div><!--content21-->
 