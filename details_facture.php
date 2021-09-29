<?php
include('connecte_db.php');
include('inc_session.php');
 
 if(!isset($_GET['data_id'])) {
	 
	 header('location:index.php');
 }
 
 else{
	 
	// aller chercher les auteurs en écriture sur une facture
	 $res=$bds->prepare('SELECT date,adresse,clients,email_client,numero,check_in,check_out,time,time1,nombre,piece_identite,montant,reste,avance,mont_tva,user,moyen_paiement,types,id_fact,type FROM facture WHERE code= :code AND id_fact= :id AND email_ocd= :email_ocd');
   $res->execute(array(':code'=>$code,
                       ':id'=>$id_fact,
                      ':email_ocd'=>$_SESSION['email_ocd']));
   $donnees=$res->fetch();
   
   // requete 
   // recupére les données de la base de données si $_GET['id_fact']
   $req=$bds->prepare('SELECT type_logement,chambre,id_chambre,montant,mont_restant FROM bord_informations WHERE code= :code AND id_fact= :id_fact AND email_ocd= :email_ocd ');
    $req->execute(array(':code'=>$code,
	                    ':id_fact'=>$id_fact,
	                   ':email_ocd'=>$_SESSION['email_ocd']));
   
    $nombre =substr($donnees['id_fact'],2); 
    
	// modifier en display block $donnees[user] pour écriture
	$rem='<br/>';
	$rt=",";
  	$montant = number_format($donnees['montant'], 2, '.', '');
	$mont_tva = number_format($donnees['mont_tva'], 2, '.', '');
	$montants = $montant - floatval($donnees['avance']);
	
	 echo'<div class="detail">
	      <h4>Détails de la facture</h4>
	      <div class="h">N° de facture <span class="fact">'.$nombre.'</span><br/><span class="typ">Type de facture :  '.$donnees['types'].'</span></div>
	      <div class="h"><i class="far fa-user" style="font-size:13px;color:#4e73df"></i>  Client :'.$donnees['clients'].'  <span class="num"><i class="fas fa-phone" style="font-size:13px;color:#4e73df;padding-left:2%;"></i> Numéro tél: '.$donnees['numero'].'</span><br/>
		  <i class="fas fa-envelope-open" style="font-size:13px; color:#4e73df"></i> Email :'.$donnees['email_client'].'</div>
		  
		  <div class="h">Local facturé</div>
		  <table class="liste">
		  <th class="h">Type de logement</th>
		  <th class="h">Local facturé</th>
		  <th class="h"> Prix hors taxe(unitaire)</th>
		  <th class="h">Temps éffectué</th>
		  ';
		  
		  while($datas=$req->fetch()){
		  echo'<tr>
		  <td class="h">'.$datas['type_logement'].'</td>
		  <td class="h">'.$datas['chambre'].'</td>
		  <td class="h">'.$datas['montant'].'xof x'.$donnees['nombre'].'</td>
		  </tr>';
		  }
		  echo'</table>
		  
		  <div class="h">
		  <table class="list">
		  <tr>
		  <th>Montant à payer </th>
		  <th>Taxe(TVA)</td>
		  <th>Acompte sur facture</th>
		  <th> Reste à payer</td>
		  <th> Moyens de paimement</td>
		  </tr>
		  <tr>
		  <td>'.$montant.'xof</td>
		  <td>'.$mont_tva.'xof</td>
		  <td>'.$donnees['avance'].'xof</td>
		  <td>'.$montants.'xof</td>
		  <td>'.str_replace($rt,$rem,$donnees['moyen_paiement']).'</td>
		  </tr>
		  </table>
		  </div>
		  
		  <div class="h"><i class="fas fa-edit" style="color:#4e73df;font-size:20px;"></i> historique ecritures,facture éditéé et modifiée</div>
		  <div class="hs">'.str_replace($rt,$rem,$donnees['user']).'</div>
		  </div> 
		  
          </div>		  
		  '; 
	 
	 
	 }



























?>