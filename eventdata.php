<?php
  require 'includes/scripts/connection.php';  
  // include 'includes/scripts/config.php';
  session_start();
  if(isset($_SESSION['xenesis_logedin_user_id']) && (trim ($_SESSION['xenesis_logedin_user_id']) !== '')){
      $user_id = $_SESSION['xenesis_logedin_user_id'];
      $query = "SELECT * FROM user_master WHERE user_id = $user_id";
      $result = mysqli_query($conn, $query);
      $userdata = mysqli_fetch_assoc($result);
      $user_role = $userdata["user_role"];
      if($user_role == 2){
        header("Location: Volunteer/registrationlist.php");
      }else if($user_role == 1){
        header("Location: admin/");
      }
  }

  function decryptId($encryptedId) {
    $key = "aryan5636"; // Same key used for encryption
    return openssl_decrypt(base64_decode($encryptedId), "AES-128-CTR", $key, 0, "1234567891011121");
}

$encryptedId = $_GET['id'];
$id = decryptId($encryptedId);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/Xenesis2025_logo.png">
    <title>Event Details</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Spectral+SC:wght@600&display=swap"
      rel="stylesheet"
    />
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: "Roboto", sans-serif;
        background: linear-gradient(145deg, #222831, #31363f);
        color: #fff;
        overflow-x: hidden;
      }
      ::-webkit-scrollbar {
        width: 8px;
      }

      ::-webkit-scrollbar-track {
        background: #0c0c27;
      }

      ::-webkit-scrollbar-thumb {
        background: #76abae;
        border-radius: 6px;
      }

      ::-webkit-scrollbar-thumb:hover {
        background: #76abae;
      }

      .container {
        width: 100%;
        max-width: 1200px;
        margin: auto;
        padding: 20px;
      }

      header {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
      }

      header img {
        align-items: center;
        justify-content: center;
        width: 100%;
        height: auto;
        object-fit: cover;
        filter: brightness(0.6);
      }

      header .event-name {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 2.9rem;
        text-align: center;
        color: #fff;
        font-family: "Spectral SC", serif;
        font-weight: 600;
        letter-spacing: 1.5px;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);
      }

      .event-info {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 30px;
      }

      .event-info .info-box {
        background: #76abae72;
        padding: 20px;
        border-radius: 12px;
        backdrop-filter: blur(5px);
        transition: transform 0.3s ease;
      }

      .event-info .info-box:hover {
        transform: translateY(-5px);
      }

      .event-info .info-box h4 {
        font-size: 1.2rem;
        color: #76abae;
        margin-bottom: 10px;
      }

      .event-info .info-box p {
        font-size: 1.1rem;
        color: #fff;
      }

      .rounds {
        margin-top: 50px;
      }

      .round {
        background: rgba(1, 1, 48, 0.151);
        padding: 20px;
        border-radius: 12px;
        backdrop-filter: blur(5px);
        margin-bottom: 20px;
      }

      .round h3 {
        font-size: 1.2rem;
        color: #76abae;
      }

      .round p {
        font-size: 1.1rem;
        color: #fff;
        font-family: cursive;
      }

      .participate-btn {
        background-color: #76abae;
        color: #fff;
        padding: 15px 30px;
        font-size: 1.3rem;
        text-align: center;
        border-radius: 12px;
        text-decoration: none;
        display: inline-block;
        transition: background-color 0.3s ease;
        position: relative;
        z-index: 1000;
      }

      .participate-btn:hover {
        background-color: #76abae69;
      }

      @media (max-width: 768px) {
        header .event-name {
          font-size: 2rem;
        }

        header img {
          height: 200px;
          width: auto;
        }

        .event-info {
          grid-template-columns: 1fr;
        }

        .round h3 {
          font-size: 1.2rem;
        }

        .participate-btn {
          font-size: 1.1rem;
          padding: 12px 25px;
          width: 100%;
        }
      }
    </style>
  </head>
  <body>
    <div class="container">
      <header>
        <img src="AI3.jpg" alt="Event Image" />
        <div class="event-name">Tech Innovators 2025</div>
      </header>

      <div class="event-info">
        <div class="info-box">
          <h4>Event Name</h4>
          <p>Tech Innovators 2025</p>
        </div>
        <div class="info-box">
          <h4>Tagline</h4>
          <p>Innovating for a Better Tomorrow</p>
        </div>
        <div class="info-box">
          <h4>Category Name</h4>
          <p>Computer Science</p>
        </div>
        <div class="info-box">
          <h4>Organizer Name</h4>
          <p>Innovators</p>
        </div>
        <div class="info-box">
          <h4>Contact Number</h4>
          <p>(123) 456-7890</p>
        </div>
        <div class="info-box">
          <h4>Registration Fees (Individual)</h4>
          <p>$20</p>
        </div>
        <div class="info-box">
          <h4>Registration Fees (Group)</h4>
          <p>$80</p>
        </div>
        <div class="info-box">
          <h4>Members per Team</h4>
          <p>4</p>
        </div>
        <div class="info-box">
          <h4>Prize for Winner 1</h4>
          <p>$500</p>
        </div>
        <div class="info-box">
          <h4>Prize for Winner 2</h4>
          <p>$300</p>
        </div>
        <div class="info-box">
          <h4>Prize for Winner 3</h4>
          <p>$150</p>
        </div>
        <div class="info-box">
          <h4>Location</h4>
          <p>XYZ University</p>
        </div>
        <div class="info-box">
          <h4>Date</h4>
          <p>March 15, 2025</p>
        </div>
        <div class="info-box">
          <h4>Description</h4>
          <p>A competition to showcase your tech innovation skills.</p>
        </div>
        <div class="info-box">
          <h4>Rules</h4>
          <p>Teams must consist of 4 members. No plagiarism.</p>
        </div>
      </div>

      <div class="rounds">
        <div class="round">
          <h3>ROUND 1: Idea Pitch</h3>
          <p>Present your tech idea in 5 minutes.</p>
        </div>
        <div class="round">
          <h3>ROUND 2: Prototype Development</h3>
          <p>Create a prototype based on your idea.</p>
        </div>
        <div class="round">
          <h3>ROUND 3: Final Presentation</h3>
          <p>Present your solution to the judges.</p>
        </div>
      </div>

      <a href="#register" class="participate-btn">Participate Now</a>
    </div>
  </body>
</html>