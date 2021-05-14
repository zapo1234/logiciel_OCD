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
   $bdd = new PDO('mysql:host=localhost;dbname=client_ocd', 'root', '',
   $pdo_options);
   
   // on se connecte de la base de donnees
  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
   $bds = new PDO('mysql:host=localhost;dbname=hotel_gestion', 'root', '',
   $pdo_options);
   
  } 
  catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}  

?>