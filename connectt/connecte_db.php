<?php

if (!isset($_SESSION)) {
        session_start();
    }

$lstLangue = array('fr');

    if(isset($_GET['lang']) && isset($lstLangue[$_GET['lang']]))
        $_SESSION['lang'] = $_GET['lang'];

    if(!isset($_SESSION['lang']))
        $_SESSION['lang'] = 'fr';

    $lang = $_SESSION['lang'];

try

{

// on se connecte de la base de donnees
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
   $bdd = new PDO('mysql:host=localhost;dbname=c0client_ocd', 'c0test_souame', 'hB8DqPXp_unG',
   $pdo_options);
   
   // on se connecte de la base de donnees
  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
   $bds = new PDO('mysql:host=localhost;dbname=c0hotel_gestion', 'c0test_souame', 'hB8DqPXp_unG',
   $pdo_options);
   
    // on se connecte de la base de donnees
  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
   $bd = new PDO('mysql:host=localhost;dbname=c0reservation_client', 'c0test_souame', 'hB8DqPXp_unG',
   $pdo_options);
   
  } 
  catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}  

?>