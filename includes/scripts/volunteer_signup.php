<?php
session_start();
// Database connection
require 'connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullname = $_POST["v_name"];
  $email = $_POST["v_email"];
  $enrollment = $_POST["v_enno"];
  $password = $_POST["v_pass"];
  $hashedpassword = password_hash($_POST["v_pass"], PASSWORD_DEFAULT); // Hash the password
  $confirmPassword = $_POST["v_pass_confirm"];
  $registrationDate = date("d-m-Y");
  $phone = $_POST["v_number"];
  $email = mysqli_real_escape_string($conn, $email);

//   //for count of enrollment
//   $sql = "SELECT COUNT(*) FROM `user_master` WHERE `user_name` = '$enrollment'";
//   $res = mysqli_query($conn, $sql);
  
//   if($res) {
//     $row = mysqli_fetch_array($res);
//     $count = $row[0]; // Number of rows with the specified email
    
//     if($count > 0) {
//         $_SESSION['xenesis_error_message'] = "enrollment number is already exists.";
//         header("Location: ../../sign-up.php");
//         exit(); // Always exit after a header redirect
//     }
//   }
//   // for count of email id
//   $sql1 = "SELECT COUNT(*) FROM `user_master` WHERE `email` = '$email'";
//   $result = mysqli_query($conn, $sql1);

//   if($result) {
//     $row = mysqli_fetch_array($result);
//     $count = $row[0]; // Number of rows with the specified email
    
//     if($count > 0) {
//         $_SESSION['xenesis_error_message'] = "email is already exists.";
//         header("Location: ../../sign-up.php");
//         exit(); // Always exit after a header redirect
//     }
//   }


  // to check all fields are empty or not
  if (empty($fullname) || empty($email) || empty($enrollment) || empty($phone) || empty($password) || empty($confirmPassword)) {
    $_SESSION['xenesis_error_message'] = "All fields are required.";
    header("Location: ../../Admin/addvolunteer.php");
    exit();
  }
  

  // to check email_id valid or not
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['xenesis_error_message'] = "Invalid email format.";
    header("Location: ../../Admin/addvolunteer.php");
    exit();
  }

  // to check password and re-confirm password matched or not
  if ($password !== $confirmPassword) {
    $_SESSION['xenesis_error_message'] = "Passwords do not match.";
    header("Location: ../../Admin/addvolunteer.php");
    exit();
  }
  
  // insert into database
  $stmt = $conn->prepare("INSERT INTO `user_master` (`user_name`, `email`, `password`, `user_role`, `joined_date`, `full_name`, `phone`,`isVerified`) VALUES (?, ?, ?, '2', current_timestamp(), ?, ?,'1')");
  if ($stmt) {
      // Bind parameters and execute
      $stmt->bind_param("sssss", $enrollment, $email, $hashedpassword, $fullname, $phone);
      if ($stmt->execute()) {
          // Registration successful
          $_SESSION['xenesis_success_message'] = "Account created. Please login with correct credentials.";
          header("Location: ../../Admin/addvolunteer.php");
          exit();
      } else {
          // Handle execution error
          $_SESSION['xenesis_error_message'] = "Error: " . $stmt->error;
          header("Location: ../../Admin/addvolunteer.php");
          exit();
      }
      $stmt->close();
  } else {
      // Handle preparation error
      $_SESSION['xenesis_error_message'] = "Error: " . $conn->error;
      header("Location: ../../Admin/addvolunteer.php");
      exit();
  }
    $stmt->close();
    $conn->close();
  }
?>