<?php 
require "../includes/scripts/connection.php";
session_start(); // Ensure session is started

if (isset($_POST['submit'])) {
    $file = $_FILES['csv_file']['tmp_name'];

    if ($_FILES['csv_file']['type'] == 'text/csv') {
        // Open CSV file
        if (($handle = fopen($file, 'r')) !== FALSE) {
            // Skip header row
            fgetcsv($handle);

            $requiredColumns = 18; // Number of expected columns
            $errors = []; // Store row errors

            while (($data = fgetcsv($handle)) !== FALSE) {
                if (count($data) < $requiredColumns) {
                    $errors[] = "Row with missing columns detected.";
                    continue; // Skip this row
                }

                // Get data from CSV columns (adjust based on your CSV format)
                list(
                    $leader_name, $leader_Email , $leader_no ,$member1_name,
                    $member1_email, $member1_mobile , $member2_name ,
                    $member2_email,$member2_mobile ,$member3_name ,
                    $member3_email,$member3_mobile, $member4_name ,
                    $member4_email,$member4_mobile , $member5_name ,
                    $member5_email,$member5_mobile
                ) = $data;
                
                $sql = "SELECT * FROM event_master WHERE event_leader_no = $leader_no";
                $result = mysqli_query($conn,$sql);
                    
                if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)){
                            if($leader_no==$row['event_leader_no']){
                                    $event_id = $row['event_id'];
                            }
                        }
                    }else {
                        echo "!";
                    }
                  

                  
                // Insert data into the database
                $sql = "INSERT INTO organizer_master( Leader_Name, event_id, Leader_email, Leader_mobile, Member1_name, Member1_email, Member1_mobile, Member2_name, Member2_email, Member2_mobile, Member3_name, Member3_email, Member3_mobile, Member4_name, Member4_email, Member4_mobile, Member5_name, Member5_email, Member5_mobile) VALUES ('$leader_name','$event_id','$leader_Email','$leader_no','$member1_name','$member1_email','$member1_mobile','$member2_name','$member2_email','$member2_mobile','$member3_name','$member3_email','$member3_mobile','$member4_name','$member4_email','$member4_mobile','$member5_name','$member5_email','$member5_mobile')";
                // $sql = "INSERT INTO event_master 
                // (event_name, tagline, department_name, team_name, participation_price, participation_price_team, 
                // team_member_count, winner_price1, winner_price2, winner_price3, location, date, 
                // event_description, rules, round1_title, round1_description, round2_title, 
                // round2_description, round3_title, round3_description, round4_title, round4_description, 
                // round5_title, round5_description, images, image_path, max_tickets) 
                // VALUES 
                // ('$event_name', '$event_tagline', '$department_name', '$team_name', '$participant_price', '$team_price', 
                // '$team_member_count', '$winner_prize1', '$winner_prize2', '$winner_prize3', '$location', '$date', 
                // '$event_description', '$rules', '$round1_title', '$round1_desc', '$round2_title', '$round2_desc', 
                // '$round3_title', '$round3_desc', '$round4_title', '$round4_desc', '$round5_title', '$round5_desc', 
                // '$image_link', '$image_path', '$max_tickets')";

                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    $errors[] = "Database error for row: " . mysqli_error($conn);
                }
            }

            fclose($handle);

            if (count($errors) > 0) {
                // $_SESSION["xenesis_error_message"] = implode("<br>", $errors);

                echo "erorr apee che";
            } else {
                header("Location: grouplist.php");
                $_SESSION["xenesis_success_message"] = "CSV data imported successfully!";
                // echo "import success";
            }

            // header("location: eventlist.php");
            
            exit();
        }
    } else {
        header("Location: grouplist.php");
        $_SESSION["xenesis_error_message"] = "Please upload a valid CSV file.";

        // echo "please upload a valid csv file";
        exit();
    }
}



?>