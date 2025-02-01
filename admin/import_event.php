<?php
    require '../includes/scripts/connection.php';  
    session_start();
    if(isset($_SESSION['xenesis_logedin_user_id']) && (trim ($_SESSION['xenesis_logedin_user_id']) !== '')){
        $user_id = $_SESSION['xenesis_logedin_user_id'];
        $query = "SELECT * FROM user_master WHERE user_id = $user_id";
        $result = mysqli_query($conn, $query);
        $userdata = mysqli_fetch_assoc($result);
        $user_role = $userdata["user_role"];
        if($user_role != 1){
            header("Location: ../404.php");
        }
    }else{
        header("Location: ../sign-in.php");
    }
?>
<?php 
 // Database connection

if (isset($_POST['import'])) {
  
    // Step 1: Check if a file is uploaded
    if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] == 0) {
        // Step 2: Validate file type
        $fileType = pathinfo($_FILES['csv_file']['name'], PATHINFO_EXTENSION);
        if ($fileType !== 'csv') {
            die("Error: Only CSV files are allowed.");
            $_SESSION['xenesis_import_error_message'] = "Error: Only CSV files are allowed.";
        }

        // Step 3: Open the uploaded CSV file
        $filePath = $_FILES['csv_file']['tmp_name'];
        $file = fopen($filePath, 'r');
        if (!$file) {
            die("Error: Unable to open file.");
            $_SESSION['xenesis_import_error_message'] = "Error: Unable to open file.";
        }

        // Step 4: Read CSV file and insert data into database
        // Skip the header row (first line)
        $header = fgetcsv($file);


        // $conn = new mysqli("localhost", "root", "", "dbms");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Read the file row by row
        while (($row = fgetcsv($file)) !== FALSE) {
            // Map CSV columns to database columns
            $name = $conn->real_escape_string($row[0]);
            $email = $conn->real_escape_string($row[1]);
            $phone = $conn->real_escape_string($row[2]);

            // Insert into database
            $sql = "INSERT INTO users (name, email, phone) VALUES ('$name', '$email', '$phone')";
            if (!$conn->query($sql)) {
                echo "Error inserting row: " . $conn->error . "<br>";
            }
        }

        fclose($file);
        $conn->close();

        echo "Data imported successfully!";
    } else {
        echo "Error: No file uploaded or file upload failed.";
    }
}
