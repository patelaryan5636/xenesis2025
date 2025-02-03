<?php
    require '../includes/scripts/connection.php';  
    session_start();
    if(isset($_SESSION['xenesis_logedin_user_id']) && (trim ($_SESSION['xenesis_logedin_user_id']) !== '')){
        $user_id = $_SESSION['xenesis_logedin_user_id'];
        $query = "SELECT * FROM user_master WHERE user_id = $user_id";
        $result = mysqli_query($conn, $query);
        $userdata = mysqli_fetch_assoc($result);
        $user_role = $userdata["user_role"];
        $user_id = $userdata['user_id'];
        if($user_role != 2){
            header("Location: ../404.php");
        }
    }else{
        header("Location: ../sign-in.php");
    }

    if (isset($_POST['submit'])){
      $id =$_POST['p_id'];
      $enrollment = $_POST['s_num'];
      $event_name = $_POST['s_event_name'];
      $serial_number = $_POST['s_serial'];



      $sql = "UPDATE `participant_master` SET `is_confirmed`=1,`confirmBy`=$user_id,`receipt_no`='$serial_number' WHERE `p_id` = $id";
      $result = mysqli_query($conn,$sql);
      if($result){
        header("Location: soloevent.php");
      }
    }
    
    

?>