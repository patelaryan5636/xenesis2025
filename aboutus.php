<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Xenesis 2025</title>
    <link rel="stylesheet" href="styles.css" />
    <script defer src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/Xenesis2025_logo.png">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css"
    />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap");

      body {
        font-family: "Poppins", sans-serif;
        margin: 0;
        padding: 0;
        background: #222831;
        color: #fff;
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

      .home-button {
        position: absolute;
        top: 12px;
        right: 20px;
        background: #76abae;
        border: none;
        padding: 7px 12px;
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.3s ease;
      }
      .home-button i {
        font-size: 30px;
        width: 29px;
        height: 35px;
        display: inline-block;
        text-align: center;
        line-height: 30px;
        color: white;
      }
      .home-button:hover {
        background: #76abae8f;
      }
      .about-container {
        text-align: center;
        padding: 50px 20px;
      }

      .banner {
        margin-top: 30px;
        background: linear-gradient(135deg, #6da9ad75, #76abae);
        padding: 60px 20px;
        border-radius: 12px;
      }

      .banner h1 {
        font-size: 3rem;
        font-weight: bolder;
      }

      .banner h1 span {
        color: #31363f;
      }

      .content {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        margin-top: 40px;
      }

      .text {
        max-width: 500px;
        text-align: left;
      }

      h2 {
        font-size: 2rem;
        font-weight: bolder;
      }

      .text p {
        text-align: justify;
      }

      .image img {
        width: 100px;
        height: 100px;
        border-radius: 10px;
        margin-left: 60px;
        margin-top: 30px;
      }

      .highlights {
        margin-top: 60px;
      }

      .cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        margin-top: 30px;
      }

      .card {
        background: #76abae;
        padding: 20px;
        border-radius: 12px;
        width: 250px;
        text-align: center;
        transition: transform 0.3s ease-in-out;
      }

      .card:hover {
        transform: scale(1.05);
      }

      .register {
        margin-top: 50px;
      }

      .btn {
        display: inline-block;
        background: #76abae;
        padding: 12px 24px;
        font-size: 1.2rem;
        color: #fff;
        border-radius: 6px;
        text-decoration: none;
        transition: background 0.3s;
      }

      .btn:hover {
        background: #76abae77;
      }

      @media (max-width: 1024px) {
        .banner h1 {
          font-size: 2.5rem;
        }
      }

      @media (max-width: 768px) {
        .about-container {
          padding: 30px 15px;
        }

        .banner {
          margin-top: 50px;
          padding: 40px 15px;
        }

        .banner h1 {
          font-size: 2rem;
        }

        .text {
          max-width: 100%;
          text-align: center;
        }

        .image {
          display: flex;
          justify-content: center;
        }

        .image img {
          width: 80px;
          height: 80px;
          margin: 0;
        }

        .cards {
          flex-direction: column;
          align-items: center;
        }

        .card {
          width: 90%;
        }
      }

      @media (max-width: 480px) {
        .home-btn {
          padding: 8px;
          font-size: 16px;
        }

        .banner h1 {
          font-size: 1.8rem;
        }

        .banner p {
          font-size: 0.9rem;
        }

        h2 {
          font-size: 1.5rem;
        }

        .h2 {
          margin-top: -20px;
        }

        .btn {
          padding: 10px 20px;
          font-size: 1rem;
        }

        .card {
          width: 100%;
        }
      }
    </style>
  </head>
  <body>
    <div class="home-button">
      <a href="index.php"><i class="fa fa-home"></i></a>
    </div>
    <section class="about-container">
      <div class="banner">
        <h1 data-aos="fade-up">Welcome to <span>Xenesis 2025</span></h1>
        <p data-aos="fade-up" data-aos-delay="200">
          The Annual Technical Festival of LDRP Institute of Technology and
          Research
        </p>
      </div>
      <div class="content">
        <div class="text" data-aos="fade-right">
          <h2>The Genesis of XENESES</h2>
          <p>
            The term <strong>"Xenesis"</strong> is derived from "Genesis,"
            symbolizing the beginning of innovation and excellence. Since 2009,
            Xenesis has been a platform for students, professionals, and tech
            enthusiasts to showcase their skills, share knowledge, and embrace
            new technological advancements.
          </p>
        </div>
        <div class="image" data-aos="fade-left">
          <img src="./assets/img/Xenesis2025_logo.png" alt="Xenesis Festival" />
        </div>
      </div>
      <div class="highlights">
        <h2 class="h2">Why Join Xenesis 2025?</h2>
        <div class="cards">
          <div class="card" data-aos="zoom-in" data-aos-delay="100">
            <h3>🚀 Exciting Competitions</h3>
            <p>Engage in thrilling challenges and showcase your skills.</p>
          </div>
          <div class="card" data-aos="zoom-in" data-aos-delay="200">
            <h3>💡 Tech Events</h3>
            <p>Innovate, hack, and explore cutting-edge technology.</p>
          </div>
          <div class="card" data-aos="zoom-in" data-aos-delay="200">
            <h3>🎮 Non-Tech Events</h3>
            <p>Unleash your talent in fun and diverse activities.</p>
          </div>
          <div class="card" data-aos="zoom-in" data-aos-delay="300">
            <h3>🏆 Amazing Prizes</h3>
            <p>Compete for exciting rewards and recognition.</p>
          </div>
          <div class="card" data-aos="zoom-in" data-aos-delay="400">
            <h3>🎉 Creativity</h3>
            <p>Express your ideas through art, design, and innovation.</p>
          </div>
          <div class="card" data-aos="zoom-in" data-aos-delay="400">
            <h3>🍕 Food Stall</h3>
            <p>
              Enjoy student-led stalls, interactive exhibits, and entertainment.
            </p>
          </div>
          <div class="card" data-aos="zoom-in" data-aos-delay="500">
            <h3>🎵 Alumni Meet & Concert</h3>
            <p>Reconnect with alumni and enjoy live music performances.</p>
          </div>
        </div>
      </div>
      <div class="register" data-aos="fade-up">
        <h2>📅 Save the Date & Register Now!</h2>
        <a href="sign-up.php" class="btn">Register Now</a>
      </div>
    </section>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        AOS.init({
          duration: 1000,
          once: true,
        });
      });
    </script>
  </body>
</html>