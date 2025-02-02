<?php
require "includes/scripts/connection.php";

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure `member-1` and `member-2` exist in the POST request
    
    $event_id = $_POST['event_id'];
    $team_name = $_POST['team_name'];
    $leader_name = $_POST['team_leader_enrollment'];
    $leader_id = $_POST['leader_id'];

    if (isset($_POST["member-2"])) {
        $member2 = $_POST["member-2"];
    }
    if (isset($_POST["member-3"])) {
        $member3 = $_POST["member-3"];
    }
    if (isset($_POST["member-4"])) {
        $member4 = $_POST["member-4"];
    }
    if (isset($_POST["member-5"])) {
        $member5 = $_POST["member-5"];
    }
    if (isset($_POST["member-6"])) {
        $member6 = $_POST["member-6"];
    }

    // for team 2 person
    if(isset($_POST["member-2"]) && !isset($_POST["member-3"]) && !isset($_POST["member-4"])){
       $sql = "INSERT INTO `group_master`(`event_id`, `leader_id`, `member_1`, `member_2`, `is_confirmed`) VALUES ('$event_id','$leader_id','$leader_name','$member2',0);";
       $result2 = mysqli_query($conn,$sql);
       if($result2){
          header("Location: pending.php");
       }
    }
    // for team 3 person
    if(isset($_POST["member-2"]) && ($_POST["member-3"]) && !isset($_POST["member-4"])){
       $sql = "INSERT INTO `group_master`(`event_id`, `leader_id`, `member_1`, `member_2`,`member_3`, `is_confirmed`) VALUES ('$event_id','$leader_id','$leader_name','$member2','$member3',0);";
       $result2 = mysqli_query($conn,$sql);
       if($result2){
          header("Location: pending.php");
       }
    }
    if(isset($_POST["member-2"]) && ($_POST["member-3"]) && ($_POST["member-4"]) && !isset($_POST["member-5"])){
       $sql = "INSERT INTO `group_master`(`event_id`, `leader_id`, `member_1`, `member_2`,`member_3`,`member_4`, `is_confirmed`) VALUES ('$event_id','$leader_id','$leader_name','$member2','$member3','$member4',0);";
       $result2 = mysqli_query($conn,$sql);
       if($result2){
          header("Location: pending.php");
       }
    }
    if(isset($_POST["member-2"]) && ($_POST["member-3"]) && ($_POST["member-4"]) && isset($_POST["member-5"]) && !isset($_POST["member-6"])){
       $sql = "INSERT INTO `group_master`(`event_id`, `leader_id`, `member_1`, `member_2`,`member_3`,`member_4`,`member_5` `is_confirmed`) VALUES ('$event_id','$leader_id','$leader_name','$member2','$member3','$member4',$member5,0);";
       $result2 = mysqli_query($conn,$sql);
       if($result2){
          header("Location: pending.php");
       }
    }
}

?>
