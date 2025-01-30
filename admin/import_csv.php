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

            $requiredColumns = 27; // Number of expected columns
            $errors = []; // Store row errors

            while (($data = fgetcsv($handle)) !== FALSE) {
                if (count($data) < $requiredColumns) {
                    $errors[] = "Row with missing columns detected.";
                    continue; // Skip this row
                }

                // Get data from CSV columns (adjust based on your CSV format)
                list(
                    $event_name, $event_tagline, $department_name, $image_link, 
                    $team_name,$leader_no, $participant_price, $team_price, $team_member_count, 
                    $winner_prize1, $winner_prize2, $winner_prize3, $location, 
                    $date, $event_description, $rules, $round1_title, 
                    $round1_desc, $round2_title, $round2_desc, $round3_title, 
                    $round3_desc, $round4_title, $round4_desc, $round5_title, 
                    $round5_desc, $max_tickets
                ) = $data;

                // Download the image and get the saved path
                $image_path = downloadImage($image_link);
                
                $sql = "SELECT * FROM `department_master`";
                $result = mysqli_query($conn,$sql);
                    
                if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)){
                            if($department_name==$row['department_name']){
                                    $department_name = $row['department_id'];
                            }
                        }
                    }else {
                        echo "!";
                    }
                
                // Insert data into the database
                $sql = "INSERT INTO `event_master` 
                (`event_name`, `tagline`, `department_id`, `team_name`,`event_leader_no`, `participation_price`, `participation_price_team`, 
                `team_member_count`, `winner_price1`, `winner_price2`, `winner_price3`, `location`, `date`, 
                `event_description`, `rules`, `round1_title`, `round1_description`, `round2_title`, 
                `round2_description`, `round3_title`, `round3_description`, `round4_title`, `round4_description`, 
                `round5_title`, `round5_description`, `images`, `image_path`, `max_tickets`) 
                VALUES 
                ('$event_name', '$event_tagline', '$department_name', '$team_name', '$leader_no','$participant_price', '$team_price', 
                '$team_member_count', '$winner_prize1', '$winner_prize2', '$winner_prize3', '$location', '$date', 
                '$event_description', '$rules', '$round1_title', '$round1_desc', '$round2_title', '$round2_desc', 
                '$round3_title', '$round3_desc', '$round4_title', '$round4_desc', '$round5_title', '$round5_desc', 
                '$image_link', '$image_path', '$max_tickets')";

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
                header("Location: eventlist.php");
                $_SESSION["xenesis_success_message"] = "CSV data imported successfully!";
                // echo "import success";
            }

            // header("location: eventlist.php");
            
            exit();
        }
    } else {
        header("Location: eventlist.php");
        $_SESSION["xenesis_error_message"] = "Please upload a valid CSV file.";

        // echo "please upload a valid csv file";
        exit();
    }
}

// Function to download Google Drive image
function downloadImage($imageUrl) {
    $imageId = getDriveFileId($imageUrl);
    if ($imageId) {
        $downloadLink = "https://drive.google.com/uc?export=download&id=" . $imageId;
        $imageContent = file_get_contents($downloadLink);
        $savePath = "uploads/" . $imageId . ".jpg";

        if (!is_dir('uploads')) {
            mkdir('uploads', 0777, true);
        }

        file_put_contents($savePath, $imageContent);
        return $savePath;
    }
    return null;
}

// Function to extract Google Drive file ID
function getDriveFileId($link) {
    if (preg_match('/\/file\/d\/(.*?)\//', $link, $matches)) {
        return $matches[1];
    }
    return null;
}
?>
