<?php
 require __DIR__.'/vendor/autoload.php';
 include('connecte_db.php');
 include('inc_session.php');
  
  // use dependance html2pdf
  use Spipu\Html2Pdf\Html2Pdf;
  // utilise les ouverture
  ob_start();
  require_once'print_pdf.php';
  // id facture
  $id =$_GET['id_fact'];
  $content= ob_get_clean();
  
  $html2pdf = new Html2Pdf('p','A4','fr','true','UTF-8');
  $html2pdf->writeHTML($content);
  ob_end_clean();
  $html2pdf->Output('facture_data.pdf');
  
 
?>