<?php
    require '../includes/scripts/connection.php';  
    session_start();
    if(isset($_SESSION['xenesis_logedin_user_id']) && (trim ($_SESSION['xenesis_logedin_user_id']) !== '')){
        $user_id = $_SESSION['xenesis_logedin_user_id'];
        $query = "SELECT * FROM user_master WHERE user_id = $user_id";
        $result = mysqli_query($conn, $query);
        $userdata = mysqli_fetch_assoc($result);
        $user_role = $userdata["user_role"];
        if($user_role != 1){
            header("Location: ../404.php");
        }
    }else{
        header("Location: ../sign-in.php");
    }
?>
<?php
// Visit https://mpdf.github.io/  for more help
require_once __DIR__ .'/../vendor/autoload.php';






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