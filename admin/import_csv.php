<?php 
require "../includes/scripts/connection.php";

if (isset($_POST['submit'])) {
  $file = $_FILES['csv_file']['tmp_name'];

  if ($_FILES['csv_file']['type'] == 'text/csv') {
      // Open CSV file
      if (($handle = fopen($file, 'r')) !== FALSE) {
          // Skip header row
          fgetcsv($handle);

          while (($data = fgetcsv($handle)) !== FALSE) {
              // Get data from CSV columns (adjust based on your CSV format)
              $event_name = $data[0];         
              $event_tagline = $data[1];         
              $department_name = $data[2];        
              $image_link = $data[3]; // 
              $team_name = $data[4];       
              $participant_price = $data[5];         
              $team_price = $data[6];        
              $team_member_count= $data[7]; 
              $winnner_prize1 =  $data[8];      
              $winnner_prize2 =  $data[9];      
              $winnner_prize3 =  $data[10];  
              $location =  $data[11];  
              $date =  $data[12];  
              $event_description =  $data[13];  
              $rules =  $data[14];  
              $round1_title =  $data[15];  
              $round1_desc =  $data[16];  
              $round2_title =  $data[17];  
              $round2_desc =  $data[18];  
              $round3_title =  $data[19];  
              $round3_desc =  $data[20];  
              $round4_title =  $data[21];  
              $round4_desc =  $data[22];  
              $round5_title =  $data[23];  
              $round5_desc =  $data[24];  
              $max_tickets =  $data[25];  
                  

              // Download the image and get the saved path
              $image_path = downloadImage($image_link);

              // // Insert data into database with image path
            $sql = "INSERT INTO `event_master` ( `event_name`, `tagline`, `department_name`, `team_name`, `participation_price`, `participation_price_team`, `team_member_count`, `winner_price1`, `winner_price2`, `winner_price3`, `location`, `date`, `event_description`, `rules`, `round1_title`, `round1_description`, `round2_title`, `round2_description`, `round3_title`, `round3_description`, `round4_title`, `round4_description`, `round5_title`, `round5_description`, `images`, `image_path`, `max_tickets`) VALUES ( '$event_name', '$event_tagline', '$department_name', '$team_name', '$participant_price', '$team_price', '$team_member_count', '$winnner_prize1', '$winnner_prize2', '$winnner_prize3', '$location', '$date', '$event_description', '$rules', '$round1_title', '$round1_desc', '$round2_title', '$round2_desc', '$round3_title', '$round3_desc', '$round4_title', '$round4_desc', '$round5_title', '$round5_desc', '$image_link', '$image_path', '$max_tickets');";

            $result = mysqli_query($conn , $sql);

            if($result){
                echo "insert";
            }else{
                echo "error";
            }
          }

          fclose($handle);
          echo "CSV data imported successfully!";
      }
  } else {
      echo "Please upload a valid CSV file.";
  }
}
function downloadImage($imageUrl) {
  $imageId = getDriveFileId($imageUrl);
  if ($imageId) {
      $downloadLink = "https://drive.google.com/uc?export=download&id=" . $imageId;

      // Download image content
      $imageContent = file_get_contents($downloadLink);

      // Define your save directory
      $savePath = "uploads/" . $imageId . ".jpg"; // Save as JPG (or you can change the format)

      // Create uploads directory if not exists
      if (!is_dir('uploads')) {
          mkdir('uploads', 0777, true);
      }

      // Save the image to the server
      file_put_contents($savePath, $imageContent);

      // Return the path to the saved image
      return $savePath;
  }
  return null;
}

function getDriveFileId($link) {
  if (preg_match('/\/file\/d\/(.*?)\//', $link, $matches)) {
      return $matches[1]; // Extract the file ID
  }
  return null;
}

?>