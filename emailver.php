<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>Email Sent</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
      }
      body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #222831;
        text-align: center;
      }
      .container {
        display: flex;
        flex-direction: column;
        align-items: center;
      }
      .circle {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        background-color: #76abae;
        align-items: center;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        position: relative;
      }

      @keyframes clickAnimation {
        0%,
        100% {
          transform: scale(1);
        }
        50% {
          transform: scale(0.9);
        }
      }
      .message {
        margin-top: 20px;
        font-size: 2rem;
        font-weight: bold;
        color: #76abae;
      }
      @media (max-width: 600px) {
        .circle {
          width: 80px;
          height: 80px;
        }
        .circle::before {
          font-size: 30px;
        }
        .message {
          font-size: 16px;
        }
      }
      .home-button {
        position: absolute;
        top: 20px;
        left: 20px;
        background: #76abae;
        border: none;
        padding: 10px 15px;
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.3s ease;
      }
      .home-button i {
        font-size: 30px;
        width: 25px;
        height: 30px;
        display: inline-block;
        text-align: center;
        line-height: 30px;
        color: #222831;
      }

      .home-button:hover {
        background: #76abae3c;
      }
    </style>
  </head>
  <body>
    <div class="home-button">
      <a href="index.php"><i class="fa fa-home"></i></a>
    </div>
    <div class="container">
      <div class="circle">
        <i
          class="fa fa-check-square-o"
          style="font-size: 48px; color: #222831"
        ></i>
      </div>
      <div class="message">Email sent successfully. Now check your mail.</div>
    </div>
  </body>
</html>
