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
    $event_id = $_POST['event_id'];
    $team_name = $_POST['team_name'];
    $leader_name = $_POST['team_leader_enrollment'];
    $leader_id = $_POST['leader_id'];

    // Collecting all members
    $members = [];
    for ($i = 2; $i <= 7; $i++) {
        if (isset($_POST["member-$i"]) && !empty($_POST["member-$i"])) {
            $members[] = $_POST["member-$i"];
        }
    }

    // Creating dynamic SQL query
    $columns = "`event_id`, `leader_id`, `team_name`, `member_1`";
    $values = "'$event_id','$leader_id','$team_name','$leader_name'";

    for ($i = 0; $i < count($members); $i++) {
        $columns .= ", `member_" . ($i + 2) . "`";
        $values .= ", '" . $members[$i] . "'";
    }

    $columns .= ", `is_confirmed`";
    $values .= ", 0";

    $sql = "INSERT INTO `group_master` ($columns) VALUES ($values)";

    $result2 = mysqli_query($conn, $sql);

    if (!$result2) {
        die("Query failed: " . mysqli_error($conn));
    }

    header("Location: pending.php");
    exit;
}

?>