<?php
// Visit https://mpdf.github.io/  for more help
require_once __DIR__ .'/../vendor/autoload.php';

require "../includes/scripts/connection.php";

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Output();


    


// $html = "Hello User!";



// $stylesheet = file_get_contents('pdf.css');

// $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);


// $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']); //To make pdf in landscape mode.
// $mpdf->WriteHTML($html); // To use php variables
// $mpdf->WriteHTML('Insert yout html code here!!'); // To write html

// Define a page using all default values except "L" for Landscape orientation

?>