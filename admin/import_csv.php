<?php
require '../includes/scripts/connection.php';
session_start();
ini_set('max_execution_time', 300); // 5 minutes
set_time_limit(300);

if (isset($_POST['submit'])) {
    $file = $_FILES['csv_file']['tmp_name'];

    if ($_FILES['csv_file']['type'] == 'text/csv') {
        if (($handle = fopen($file, 'r')) !== FALSE) {
            fgetcsv($handle); // Skip header row

            $batchSize = 50;
            $counter = 0;
            $insertValues = [];

            while (($data = fgetcsv($handle)) !== FALSE) {
                if (count($data) < 27) continue;

                // Sanitize input
                $event_name = mysqli_real_escape_string($conn, $data[0]);
                $event_tagline = mysqli_real_escape_string($conn, $data[1]);
                $department_name = mysqli_real_escape_string($conn, $data[2]);
                $image_link = mysqli_real_escape_string($conn, $data[3]);
                $team_name = mysqli_real_escape_string($conn, $data[4]);
                $leader_no = mysqli_real_escape_string($conn, $data[5]);
                $participant_price = mysqli_real_escape_string($conn, $data[6]);
                $team_price = mysqli_real_escape_string($conn, $data[7]);
                $team_member_count = mysqli_real_escape_string($conn, $data[8]);
                $winner_prize1 = mysqli_real_escape_string($conn, $data[9]);
                $winner_prize2 = mysqli_real_escape_string($conn, $data[10]);
                $winner_prize3 = mysqli_real_escape_string($conn, $data[11]);
                $location = mysqli_real_escape_string($conn, $data[12]);
                $date = mysqli_real_escape_string($conn, $data[13]);
                $event_description = mysqli_real_escape_string($conn, $data[14]);
                $rules = mysqli_real_escape_string($conn, $data[15]);
                $round1_title = mysqli_real_escape_string($conn, $data[16]);
                $round1_desc = mysqli_real_escape_string($conn, $data[17]);
                $round2_title = mysqli_real_escape_string($conn, $data[18]);
                $round2_desc = mysqli_real_escape_string($conn, $data[19]);
                $round3_title = mysqli_real_escape_string($conn, $data[20]);
                $round3_desc = mysqli_real_escape_string($conn, $data[21]);
                $round4_title = mysqli_real_escape_string($conn, $data[22]);
                $round4_desc = mysqli_real_escape_string($conn, $data[23]);
                $round5_title = mysqli_real_escape_string($conn, $data[24]);
                $round5_desc = mysqli_real_escape_string($conn, $data[25]);
                $max_tickets = mysqli_real_escape_string($conn, $data[26]);
                $category_name = mysqli_real_escape_string($conn, $data[27]);
                
                // Get department_id
                $dep_query = "SELECT department_id FROM department_master WHERE department_name = '$department_name'";
                $dep_result = mysqli_query($conn, $dep_query);
                $dep_data = mysqli_fetch_assoc($dep_result);
                $department_id = $dep_data['department_id'] ?? 0;

                // Get category_id
                $cat_query = "SELECT category_id FROM category_master WHERE category_name = '$category_name'";
                $cat_result = mysqli_query($conn, $cat_query);
                $cat_data = mysqli_fetch_assoc($cat_result);
                $category_id = $cat_data['category_id'] ?? 0;

                // **Download Image & Get Local Path**
                $image_path = downloadImage($image_link);

                // Store values for batch insert
                $insertValues[] = "('$event_name', '$event_tagline', '$department_id', '$team_name', '$leader_no', 
                                   '$participant_price', '$team_price', '$team_member_count', '$winner_prize1', 
                                   '$winner_prize2', '$winner_prize3', '$location', '$date', '$event_description', 
                                   '$rules', '$round1_title', '$round1_desc', '$round2_title', '$round2_desc', 
                                   '$round3_title', '$round3_desc', '$round4_title', '$round4_desc', '$round5_title', 
                                   '$round5_desc', '$image_link', '$image_path', '$max_tickets', '$category_id')";

                $counter++;

                // **Batch Insert (Every 50 Rows)**
                if ($counter % $batchSize == 0) {
                    $sql = "INSERT INTO event_master (`event_name`, `tagline`, `department_id`, `team_name`, `event_leader_no`, 
                    `participation_price`, `participation_price_team`, `team_member_count`, `winner_price1`, `winner_price2`, 
                    `winner_price3`, `location`, `date`, `event_description`, `rules`, `round1_title`, `round1_description`, 
                    `round2_title`, `round2_description`, `round3_title`, `round3_description`, `round4_title`, 
                    `round4_description`, `round5_title`, `round5_description`, `images`, `image_path`, `max_tickets`, `category_id`) 
                    VALUES " . implode(',', $insertValues);
                    
                    mysqli_query($conn, $sql);
                    $insertValues = [];
                    sleep(1); // Pause script for 1 second
                }
            }

            // **Insert Remaining Data**
            if (!empty($insertValues)) {
                $sql = "INSERT INTO event_master (`event_name`, `tagline`, `department_id`, `team_name`, `event_leader_no`, 
                `participation_price`, `participation_price_team`, `team_member_count`, `winner_price1`, `winner_price2`, 
                `winner_price3`, `location`, `date`, `event_description`, `rules`, `round1_title`, `round1_description`, 
                `round2_title`, `round2_description`, `round3_title`, `round3_description`, `round4_title`, 
                `round4_description`, `round5_title`, `round5_description`, `images`, `image_path`, `max_tickets`, `category_id`) 
                VALUES " . implode(',', $insertValues);
                
                mysqli_query($conn, $sql);
            }

            fclose($handle);
            $_SESSION["xenesis_success_message"] = "CSV data imported successfully!";
            header("Location: eventlist.php");
            exit();
        }
    } else {
        $_SESSION["xenesis_error_message"] = "Please upload a valid CSV file.";
        header("Location: eventlist.php");
        exit();
    }
}

// **Function to Download Google Drive Image**
function downloadImage($imageUrl) {
    $imageId = getDriveFileId($imageUrl);
    if ($imageId) {
        $downloadLink = "https://drive.google.com/uc?export=download&id=" . $imageId;
        $imageContent = @file_get_contents($downloadLink);
        if ($imageContent !== false) {
            $savePath = "uploads/" . $imageId . ".jpg";

            if (!is_dir('uploads')) {
                mkdir('uploads', 0777, true);
            }

            file_put_contents($savePath, $imageContent);
            return $savePath;
        }
    }
    return "default.jpg"; // **Return Default Image if Download Fails**
}

// **Function to Extract Google Drive File ID**
function getDriveFileId($link) {
    if (preg_match('/\/file\/d\/(.*?)\//', $link, $matches)) {
        return $matches[1];
    }
    return null;
}
?>
