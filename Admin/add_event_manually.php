<?php
    require "../includes/scripts/connection.php";

        $event_name = $_POST['e_name'];
        $event_tagline = $_POST['e_tagline'];
        $department_name = $_POST['e_dept'];
        $team_name = $_POST['e_team'];
        $participant_price = $_POST['e_participation_price'];
        $team_price = $_POST['e_team_par_price'];
        $team_member_count = $_POST['e_total_member'];
        $winner_prize1 = $_POST['e_win1'];
        $winner_prize2 = $_POST['e_win2'];
        $winner_prize3 = $_POST['e_win3'];
        $location = $_POST['e_location'];
        $event_description = $_POST['e_desc'];
        $rules = $_POST['e_rules'];
        $round1_title = $_POST['e_round1_title'];
        $round1_desc = $_POST['e_round1_desc'];
        $round2_title = $_POST['e_round2_title'];
        $round2_desc = $_POST['e_round2_desc'];
        $round3_title = $_POST['e_round3_title'];
        $round3_desc = $_POST['e_round3_desc'];
        $round4_title = $_POST['e_round4_title'];
        $round4_desc = $_POST['e_round4_desc'];
        $round5_title = $_POST['e_round5_title'];
        $round5_desc = $_POST['e_round5_desc'];
        $max_tickets = $_POST['e_max_ticket'];
        $date = $_POST['e_date'];
        
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $uploadDir = "uploads/"; // Folder to store uploaded images

        // Create the uploads folder if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Handle File Upload
        
        if(isset($_POST['submit'])){
            $fileName = basename($_FILES["productImage"]["name"]);
            $image_path = $uploadDir . $fileName;
            $image_link = $image_path;
    
            if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $image_path)) {
                $sql = "INSERT INTO `event_master` (`event_name`, `tagline`, `department_name`, `team_name`, `participation_price`, `participation_price_team`, `team_member_count`, `winner_price1`, `winner_price2`, `winner_price3`, `location`, `date`, `rules`, `event_description`, `round1_title`, `round1_description`, `round2_title`, `round2_description`, `round3_title`, `round3_description`, `round4_title`, `round4_description`, `round5_title`, `round5_description`, `images`, `image_path`, `max_tickets`) VALUES ('$event_name', '$event_tagline', '$department_name', '$team_name', '$participant_price', '$team_price', '$team_member_count', '$winner_prize1', '$winner_prize2', '$winner_prize3', '$location', '$date', '$event_description', '$rules', '$round1_title', '$round1_desc', '$round2_title', '$round2_desc', '$round3_title', '$round3_desc', '$round4_title', '$round4_desc', '$round5_title', '$round5_desc', '$fileName', '$image_path', '$max_tickets');";
                $result = mysqli_query($conn, $sql);
                // Check if the query was successful
                if ($result) {
                    echo "Insert successful!";
                    header("Location: ./eventlist.php");
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                header("Location: ./addevent.php");
                echo "File upload failed.";
            }
        }

?>