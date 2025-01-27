<?php
session_start();

// Database connection
require 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_user_name = $_POST["xenesis_login_email"];
    $loginPassword = $_POST["xenesis_login_password"];

    // Validate input (you might want to add more validation checks)
    if (empty($login_user_name) || empty($loginPassword)) {
        $_SESSION['xenesis_error_message'] = "enrollment number and password are required.";
        header("Location: sign-in.php");
    }
      
     // Retrieve hashed password from the database based on the provided email
     $selectQuery = "SELECT * FROM user_master WHERE user_name = '$login_user_name'";
     $result = $conn->query($selectQuery);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $hashedPasswordFromDB = $row["user_password"];
      $isVerified = $row["isVerified"];
      $userId = $row["user_id"];

      // Verify the provided password against the stored hashed password
      if (password_verify($loginPassword, $hashedPasswordFromDB)) {
        // Password is correct, set session variables or perform other actions as needed
        $isVerified = 1;
         if ($isVerified == 1) {
          // Password is correct and the user is verified
          $_SESSION['xenesis_logedin_user_id'] = $row["user_id"];
                          
          header("Location: ../../index.php");
         }
        // else {
        //   // User is not verified
        //   // $_SESSION['educat_error_message'] = "Your account is not verified yet, Please check your email for verification link.";
        //   $_SESSION['educat_temp_data_transfer_variable_between_pages'] = $loginEmail;
        //   header("Location: ../../verify-account.php");
        // }
      }else{
        // Password is incorrect
        $_SESSION['xensis_error_message'] = "Incorrect password.";
        header("Location: ../../sign-in.php");
      }

    }else{
      // Email not found in the database
      $_SESSION['xensis_error_message'] = "enrollment is  not found.";
      header("Location: ../../sign-in.php");
  }
  $conn->close();
}
?>