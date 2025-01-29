<?php
// Visit https://mpdf.github.io/  for more help
require_once __DIR__ .'/../vendor/autoload.php';

require "../includes/scripts/connection.php";




$html='
  <h1> hello workd</h1>
';



// $html = "Hello User!";



// $stylesheet = file_get_contents('pdf.css');

// $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);


// $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']); //To make pdf in landscape mode.
// $mpdf->WriteHTML($html); // To use php variables
// $mpdf->WriteHTML('Insert yout html code here!!'); // To write html

$mpdf = new \Mpdf\Mpdf();
// Define a page using all default values except "L" for Landscape orientation
$mpdf->WriteHTML($html);
$mpdf->Output();

?>