
<?Php
   require('php/fpdf.php');
   $pdf = new FPDF(); 
   $pdf->AddPage();
   $pdf->Image('images/CVAlexKolakowski.png',0,0);
   $pdf->Output();
   ?>
