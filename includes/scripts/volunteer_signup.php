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


  // to check all fields are empty or not
  if (empty($fullname) || empty($email) || empty($enrollment) || empty($phone) || empty($password) || empty($confirmPassword)) {
    $_SESSION['xenesis_error_message'] = "All fields are required.";
    header("Location: ../../admin/volunteerlist.php");
    exit();
  }
  

  // to check email_id valid or not
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['xenesis_error_message'] = "Invalid email format.";
    header("Location: ../../admin/volunteerlist.php");
    exit();
  }

  // to check password and re-confirm password matched or not
  if ($password !== $confirmPassword) {
    $_SESSION['xenesis_error_message'] = "Passwords do not match.";
    header("Location: ../../admin/volunteerlist.php");
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
          header("Location: ../../admin/volunteerlist.php");
          exit();
      } else {
          // Handle execution error
          $_SESSION['xenesis_error_message'] = "Error: " . $stmt->error;
          header("Location: ../../admin/volunteerlist.php");
          exit();
      }
      $stmt->close();
  } else {
      // Handle preparation error
      $_SESSION['xenesis_error_message'] = "Error: " . $conn->error;
      header("Location: ../../Admin/volunteerlist.php");
      exit();
  }
    $stmt->close();
    $conn->close();
  }
?>