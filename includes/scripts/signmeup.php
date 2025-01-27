<?php
session_start();
// Database connection
require 'connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullname = $_POST["full_name"];
  $email = $_POST["user_email"];
  $enrollment = $_POST["user_enrollment"];
  $password = $_POST["user_password"];
  $hashedpassword = password_hash($_POST["user_password"], PASSWORD_DEFAULT); // Hash the password
  $confirmPassword = $_POST["user_confirm_password"];
  $registrationDate = date("d-m-Y");
  $phone = $_POST["user_phone"];
  $email = mysqli_real_escape_string($conn, $email);

  //for count of enrollment
  $sql = "SELECT COUNT(*) FROM `user_master` WHERE `user_name` = '$enrollment'";
  $res = mysqli_query($conn, $sql);

  if($res) {
    $row = mysqli_fetch_array($res);
    $count = $row[0]; // Number of rows with the specified email
    
    if($count > 0) {
        $_SESSION['xenesis_error_message'] = "enrollment number is already exists.";
        header("Location: ../../sign-up.php");
        exit(); // Always exit after a header redirect
    }
  }

  // to check all fields are empty or not
  if (empty($fullname) || empty($email) || empty($enrollment) || empty($phone) || empty($password) || empty($confirmPassword)) {
    $_SESSION['xenesis_error_message'] = "All fields are required.";
    header("Location: ../../sign-up.php");
    exit();
  }
  

  // to check email_id valid or not
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['xenesis_error_message'] = "Invalid email format.";
    header("Location: ../../sign-up.php");
    exit();
  }

  // to check password and re-confirm password matched or not
  if ($password !== $confirmPassword) {
    $_SESSION['xenesis_error_message'] = "Passwords do not match.";
    header("Location: ../../sign-up.php");
    exit();
  }
  
  // insert into database
   $insertQuery = "INSERT INTO `user_master` ( `user_name`, `email`, `password`, `user_role`, `joined_date`, `full_name`, `phone`) VALUES ( '$enrollment', '$email', '$hashedpassword', '3', current_timestamp(), '$fullname', '$phone')";

  // check insert query ir not
   if ($conn->query($insertQuery) === TRUE) {
    // Registration successful
    $_SESSION['xenesis_success_message'] = "Account created, Please login with correct credentials.";
    header("Location: ../../sign-in.php");
    exit();
    } else {
    // Handle database error
    $_SESSION['xenesis_error_message'] = "Error: " . $insertQuery . "<br>" . $conn->error;
    header("Location: ../../sign-up.php");
    exit();
    }

    $conn->close();
  }
?>