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
                                    
                                    
                                    // Insert data into the database
                                    $sql1 = "INSERT INTO organizer_master( Leader_Name, event_id, Leader_email, Leader_mobile, Member1_name, Member1_email, Member1_mobile, Member2_name, Member2_email, Member2_mobile, Member3_name, Member3_email, Member3_mobile, Member4_name, Member4_email, Member4_mobile, Member5_name, Member5_email, Member5_mobile) VALUES ('$leader_name','$event_id','$leader_Email','$leader_no','$member1_name','$member1_email','$member1_mobile','$member2_name','$member2_email','$member2_mobile','$member3_name','$member3_email','$member3_mobile','$member4_name','$member4_email','$member4_mobile','$member5_name','$member5_email','$member5_mobile')";
                                    $result1 = mysqli_query($conn, $sql1);
                                    if (!$result1) {
                                        $errors[] = "Database error for row: " . mysqli_error($conn);
                                    }
                                }
                            }
                        }else {
                            echo "!";
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