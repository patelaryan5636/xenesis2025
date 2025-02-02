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

<div class="header">
    <h1>XENESIS 2025</h1>
    <h2><span>Event Name: </span>Cricket League</h2>
    <div class="type" style="width: 100%;">
        <table style="width: 100%; border: none;">
            <tr>
                <td style="text-align: left; font-weight: bold; border: none;"><span style="color: rgb(75, 0, 75);">Solo event</span></td>
                <td style="text-align: right; font-weight: bold; border: none;"><span style="color: rgb(75, 0, 75);">Class: </span>302</td>
            </tr>
        </table>
    </div>
</div>
<hr>
<h1 style="text-align:center; font-size: 1.7rem; font-family: math; color: rgb(75, 0, 75);";>--------------------- PARTICIPANT LIST ---------------------</h1>
<div class="ptable">
    <table cellpadding="10" cellspacing="0" style="background-color: #eeeeee">
        <thead>
            <tr>
                <th>En.no</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>224SBECE30055</td>
                <td>Pithadiya Priyanshu Anilbhai</td>
            </tr>
            <tr>
                <td>224SBECE30032</td>
                <td>Patel Aryan Harshadbhai</td>
            </tr>
        </tbody>
    </table>
</div>

';



// $html = "Hello User!";



// $stylesheet = file_get_contents('pdf.css');

// $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);


// $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']); //To make pdf in landscape mode.
// $mpdf->WriteHTML($html); // To use php variables
// $mpdf->WriteHTML('Insert yout html code here!!'); // To write html

$mpdf = new \Mpdf\Mpdf();
// Define a page using all default values except "L" for Landscape orientation
$stylesheet = file_get_contents('eventlist.css'); // external css
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($html);
$mpdf->Output();

?>