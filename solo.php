<?php
require 'includes/scripts/connection.php';  
session_start();
if(isset($_SESSION['xenesis_logedin_user_id']) && (trim ($_SESSION['xenesis_logedin_user_id']) !== '')){
    $user_id = $_SESSION['xenesis_logedin_user_id'];
    $query = "SELECT * FROM user_master WHERE user_id = $user_id";
    $result = mysqli_query($conn, $query);
    $userdata = mysqli_fetch_assoc($result);
    $user_role = $userdata["user_role"];
    if($user_role != 3){
        header("Location: 404.php");
    }
} else {
    header("Location: sign-in.php");
}

function decryptId($encryptedId) {
    $key = "xenesis2025"; 
    $iv = "1234567891011121"; 
    return openssl_decrypt(base64_decode($encryptedId), "AES-128-CTR", $key, 0, $iv);
}

$encryptedId = $_GET['id'];
$id = decryptId($encryptedId);

$student_id = $userdata['user_id'];
 
$sql = "INSERT INTO `participant_master`(`event_id`, `student_id`, `is_confirmed`) VALUES ('$id','$student_id',0);";
$result = mysqli_query($conn,$sql);
if($result){
  header("location: pending.php");
}

?>