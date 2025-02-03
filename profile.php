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
    }else{
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
      @import url("https://fonts.googleapis.com/css2?family=Rajdhani:wght@500&display=swap");

      body {
        font-family: "Rajdhani", sans-serif;
        background: #222831;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        overflow: hidden;
      }
      .profile-container {
        background: #76abae;
        border-radius: 15px;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
        text-align: center;
        position: relative;
        width: 350px;
        max-width: 90%;
        overflow: hidden;
        animation: fadeIn 1s ease-in-out;
      }
      .exit-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        border: none;
        background: white;
        color: #222831;
        font-size: 20px;
        cursor: pointer;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        transition: transform 0.3s ease;
      }
      .exit-btn:hover {
        transform: scale(1.1);
      }
      .background-img {
        width: 100%;
        height: 150px;
        object-fit: cover;
      }
      .profile-image {
        position: absolute;
        top: 100px;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid white;
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
      }
      .profile-details {
        margin-top: 60px;
        padding: 20px;
        color: #333;
      }
      .profile-details h2 {
        margin-top: -17px;
        font-size: 22px;
        font-weight: bolder;
        text-transform: uppercase;
      }
      .info-box {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border-radius: 10px;
        padding: 10px;
        margin: 10px 0;
        font-size: 16px;
        font-weight: bold;
        color: #fff;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
      }
      .note {
        margin-top: 20px;
        padding: 10px 15px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(8px);
        border-radius: 10px;
        color: white;
        font-size: 14px;
        font-weight: bold;
        text-align: center;
        max-width: 80%;
      }
      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: translateY(-20px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }
    </style>
  </head>
  <body>
    <div class="profile-container">
      <a href="index.php">
        <button class="exit-btn" onclick="exitProfile()">&times;</button></a
      >
      <img src="AI3.jpg" alt="Background Image" class="background-img" />
      <img src="user.png" alt="User Image" class="profile-image" />
      <div class="profile-details">
        <h2><?php echo $userdata['full_name'];?></h2>
        <div class="info-box">Enrollment No : <?php echo $userdata['user_name'];?></div>
        <div class="info-box">Email ID : <?php echo $userdata['email']; ?></div>
        <div class="info-box">Mobile No : +91 <?php echo $userdata['phone'];?></div>
      </div>
    </div>

    <div class="note">
      <strong>*Note:</strong> If you have filled in any incorrect details by
      chance, please visit us in <strong>LAB AT-3</strong> to fix it.
    </div>

    <script>
      function exitProfile() {
        document.querySelector(".profile-container").style.opacity = "0";
        setTimeout(() => {
          document.querySelector(".profile-container").style.display = "none";
        }, 500);
      }
    </script>
  </body>
</html>