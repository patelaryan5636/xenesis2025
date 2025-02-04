<?php
session_start();
require "../includes/scripts/connection.php";
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

  if($_SERVER["REQUEST_METHOD"] == "POST") {
  $id= $_POST['id'];
  $sname = $_POST['s_name'];
  $enroll = $_POST['s_enroll'];
  $semail = $_POST['s_email'];
  $sphone = $_POST['s_number'];


  $sql = "UPDATE `user_master` SET `user_name`='$enroll',`email`='$semail',`full_name`='$sname',`phone`='$sphone' WHERE `user_id` = $id";
  $result = mysqli_query($conn,$sql);
  if($result){
    $_SESSION['xenesis_success_message'] = "Updated successfully!";
    header("Location: studentlist.php");
  }else{
    $_SESSION['xenesis_error_message']= "don't updated data in studentlist";
    header("Location: studentlist.php");
    // echo die();
  }
}