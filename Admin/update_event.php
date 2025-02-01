<?php
require "../includes/scripts/connection.php";

if(isset($_POST['submit'])){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Sanitize user inputs
    $event_id = mysqli_real_escape_string($conn, $_POST['e_id']);
    $event_name = mysqli_real_escape_string($conn, $_POST['e_name']);
    $event_tagline = mysqli_real_escape_string($conn, $_POST['e_tagline']);
    $dept_id = mysqli_real_escape_string($conn, $_POST['e_dept_id']);
    $team_name = mysqli_real_escape_string($conn, $_POST['e_team']);
    $event_leader_mobile = mysqli_real_escape_string($conn, $_POST['team_leader_number']);
    $participant_price = mysqli_real_escape_string($conn, $_POST['e_participation_price']);
    $team_price = mysqli_real_escape_string($conn, $_POST['e_team_par_price']);
    $team_member_count = mysqli_real_escape_string($conn, $_POST['e_total_member']);
    $winner_prize1 = mysqli_real_escape_string($conn, $_POST['e_win1']);
    $winner_prize2 = mysqli_real_escape_string($conn, $_POST['e_win2']);
    $winner_prize3 = mysqli_real_escape_string($conn, $_POST['e_win3']);
    $location = mysqli_real_escape_string($conn, $_POST['e_location']);
    $event_description = mysqli_real_escape_string($conn, $_POST['e_desc']);
    $rules = mysqli_real_escape_string($conn, $_POST['e_rules']);
    $round1_title = mysqli_real_escape_string($conn, $_POST['e_round1_title']);
    $round1_desc = mysqli_real_escape_string($conn, $_POST['e_round1_desc']);
    $round2_title = mysqli_real_escape_string($conn, $_POST['e_round2_title']);
    $round2_desc = mysqli_real_escape_string($conn, $_POST['e_round2_desc']);
    $round3_title = mysqli_real_escape_string($conn, $_POST['e_round3_title']);
    $round3_desc = mysqli_real_escape_string($conn, $_POST['e_round3_desc']);
    $round4_title = mysqli_real_escape_string($conn, $_POST['e_round4_title']);
    $round4_desc = mysqli_real_escape_string($conn, $_POST['e_round4_desc']);
    $round5_title = mysqli_real_escape_string($conn, $_POST['e_round5_title']);
    $round5_desc = mysqli_real_escape_string($conn, $_POST['e_round5_desc']);
    $max_tickets = mysqli_real_escape_string($conn, $_POST['e_max_ticket']);
    $date = mysqli_real_escape_string($conn, $_POST['e_date']);

    // Upload Handling
    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $image_link = '';
    if(isset($_FILES["productImage"]) && $_FILES["productImage"]["error"] == 0){
        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        $fileType = $_FILES["productImage"]["type"];
        $fileSize = $_FILES["productImage"]["size"];

        if(in_array($fileType, $allowedTypes) && $fileSize <= 5*1024*1024){ // Limit to 5MB
            $fileName = basename($_FILES["productImage"]["name"]);
            $image_path = $uploadDir . $fileName;
            $image_link = $image_path;

            move_uploaded_file($_FILES["productImage"]["tmp_name"], $image_path);
        } else {
            die("Invalid file type or file too large.");
        }
    }

    // Update query
    $sql = "UPDATE `event_master` 
            SET `event_name`='$event_name',
                `tagline`='$event_tagline',
                `department_id`='$dept_id',
                `team_name`='$team_name',
                `event_leader_no`='$event_leader_mobile',
                `participation_price`='$participant_price',
                `participation_price_team`='$team_price',
                `team_member_count`='$team_member_count',
                `winner_price1`='$winner_prize1',
                `winner_price2`='$winner_prize2',
                `winner_price3`='$winner_prize3',
                `location`='$location',
                `date`='$date',
                `event_description`='$event_description',
                `rules`='$rules',
                `round1_title`='$round1_title',
                `round1_description`='$round1_desc',
                `round2_title`='$round2_title',
                `round2_description`='$round2_desc',
                `round3_title`='$round3_title',
                `round3_description`='$round3_desc',
                `round4_title`='$round4_title',
                `round4_description`='$round4_desc',
                `round5_title`='$round5_title',
                `round5_description`='$round5_desc',
                `images`='$image_link',
                `image_path`='$image_link',
                `max_tickets`='$max_tickets'
            WHERE `event_id`='$event_id'";

    $res = mysqli_query($conn, $sql);
    if(!$res){
        header("Location: eventlist.php");
    } else {
        header("Location: eventlist.php");
        echo "Event updated successfully!";
    }
}
?>