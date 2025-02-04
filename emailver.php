<?php
require 'includes/scripts/connection.php';  
session_start();
if(isset($_SESSION['xenesis_logedin_user_id']) && (trim ($_SESSION['xenesis_logedin_user_id']) !== '')){
    $user_id = $_SESSION['xenesis_logedin_user_id'];
    $query = "SELECT * FROM user_master WHERE user_id = $user_id";
    $result = mysqli_query($conn, $query);
    $userdata = mysqli_fetch_assoc($result);
    $user_role = $userdata["user_role"];
    if($user_role != 3){
        header("Location: 404.php");
    }
} else {
    header("Location: sign-in.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>XENESIS-2025</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background: #222831;
        color: white;
        text-align: center;
      }

      .container {
        background: #76abae;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(10px);
      }

      .animated-image {
        width: 100px;
        height: 100px;
        margin: 20px auto;
        animation: bounce 2s infinite ease-in-out;
      }

      @keyframes bounce {
        0%,
        100% {
          transform: translateY(0);
        }
        50% {
          transform: translateY(-10px);
        }
      }
      h1 {
        font-size: 24px;
        margin: 10px 0;
      }

      button {
        padding: 12px 24px;
        font-size: 16px;
        border: none;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        color: white;
        cursor: pointer;
        border-radius: 5px;
        transition: transform 0.3s ease-in-out, background 0.3s ease-in-out;
      }

      button:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: scale(1.1);
      }

      @media (max-width: 500px) {
        .container {
          width: 90%;
          margin: 20px;
        }
      }
    </style>
  </head>
  <body>
    <div class="container">
      <img src="frobo.png" alt="Small Animated Image" class="animated-image" />
      <h1>Request is Send Successfully !</h1>
      <p>
        Please check your email for the next steps to reset your password.
      </p>
      <button onclick="goHome()">GO TO HOME</button>
    </div>

    <script>
      function goHome() {
        window.location.href = "index.php";
      }
    </script>
  </body>
</html>