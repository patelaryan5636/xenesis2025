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
    $key = "aryan5636"; // Use the same key as encryption
    $iv = "1234567891011121"; // Same IV as encryption

    return openssl_decrypt(base64_decode($encryptedId), "AES-128-CTR", $key, 0, $iv);
}

function encryptId($id) {
  $key = "xenesis2025"; // Use a secure key
  $iv = "1234567891011121"; // IV must be 16 bytes for AES-128-CTR

  return base64_encode(openssl_encrypt($id, "AES-128-CTR", $key, 0, $iv));
}


$encryptedId = $_GET['id'];
$id = decryptId($encryptedId);

$sql = "SELECT * FROM `event_master` WHERE `event_id` = $id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$category_id = $row['category_id'];

$sql2 = "SELECT category_name FROM `category_master` WHERE `category_id` = $category_id";
$result2 = mysqli_query($conn,$sql2);
$row3 = mysqli_fetch_assoc($result2);

$sql1 = "SELECT Leader_Name FROM `organizer_master` WHERE `event_id` = $id";
$result1 = mysqli_query($conn,$sql1);
$row2 = mysqli_fetch_assoc($result1);

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
          <p><?php echo $row['event_name']; ?></p>
        </div>
        <div class="info-box">
          <h4>Tagline</h4>
          <p><?php echo $row['tagline'];?></p>
        </div>
        <div class="info-box">
          <h4>Category Name</h4>
          <p><?php echo $row3['category_name'];?></p>
        </div>
        <div class="info-box">
          <h4>Organizer Name</h4>
          <p><?php echo $row2['Leader_Name'];?></p>
        </div>
        <div class="info-box">
          <h4>Contact Number</h4>
          <p><?php echo $row['event_leader_no']; ?></p>
        </div>
        <div class="info-box">
          <h4>Registration Fees (Individual)</h4>
          <p><?php echo $row['participation_price'];?></p>
        </div>
        <div class="info-box">
          <h4>Registration Fees (Group)</h4>
          <p><?php echo $row['participation_price_team'];?></p>
        </div>
        <div class="info-box">
          <h4>Members per Team</h4>
          <p><?Php echo $row['team_member_count'];?></p>
        </div>
        <div class="info-box">
          <h4>Prize for Winner 1</h4>
          <p><?php echo $row['winner_price1']; ?></p>
        </div>
        <div class="info-box">
          <h4>Prize for Winner 2</h4>
          <p><?php echo $row['winner_price2'];?></p>
        </div>
        <div class="info-box">
          <h4>Prize for Winner 3</h4>
          <p><?php echo $row['winner_price3'];?></p>
        </div>
        <div class="info-box">
          <h4>Location</h4>
          <p><?php echo $row['location']; ?></p>
        </div>
        <div class="info-box">
          <h4>Date</h4>
          <p><?php echo $row['date']; ?></p>
        </div>
        <div class="info-box">
          <h4>Description</h4>
          <p><?php echo $row['event_description']; ?></p>
        </div>
        <div class="info-box">
          <h4>Rules</h4>
          <p><?php echo $row['rules']; ?></p>
        </div>
      </div>

      <div class="rounds">
        <div class="round">
          <h3>ROUND 1: <?php echo $row['round1_title']; ?></h3>
          <p><?php echo $row['round1_description'];?></p>
        </div>
        <div class="round">
          <h3>ROUND 2: <?php echo $row['round2_title'];?></h3>
          <p><?php echo $row['round2_description'];?></p>
        </div>
        <div class="round">
          <h3>ROUND 3: <?php echo $row['round3_title'];?></h3>
          <p><?php echo $row['round3_description']?></p>
        </div>
      </div>

      <?php $event_id = encryptId($row['event_id']); 
      if($row['team_member_count'] > 1){
                ?> 
                <a href="group.php?id=<?php echo $event_id;?>" class="participate-btn">Participate Now</a>
                <?php
              }else{
                ?>
                <a href="solo.php?id=<?php echo $event_id;?>" class="participate-btn">Participate Now</a>
                <?php
              }
              ?>
    </div>
  </body>
</html>