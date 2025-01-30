<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>XENESIS</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="text.css" />
    <style>
      body,
      html {
        margin: 0;
        padding: 0;
        width: 100%;
        min-height: 100%;
        overflow-x: hidden;
        font-family: "Montserrat", sans-serif;
        background: linear-gradient(to bottom, #0d0d2b, #000000);
        color: white;
      }

      ::-webkit-scrollbar {
        width: 6px;
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
        height: 100vh;
        text-align: center;
        padding: 50px 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;
        z-index: 2;
      }

      .container:nth-child(odd) {
        background: rgba(0, 0, 0, 0.253);
      }

      h1 {
        font-size: 4em;
        margin-bottom: 0.5em;
        color: #76abae;
      }

      p {
        font-size: 1.5em;
        margin-bottom: 1em;
      }

      .cta-button {
        background: linear-gradient(135deg, #c0d1d2, #76abae);
        padding: 1em 2em;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        box-shadow: 0 0 15px rgba(255, 64, 129, 0.5);
        transition: background 0.3s ease, box-shadow 0.3s ease;
      }

      .cta-button:hover {
        background: linear-gradient(135deg, #c0d1d2, #76abae);
        box-shadow: 0 0 25px rgba(118, 171, 174, 1);
      }

      .particles {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 1;
      }

      .particle {
        position: absolute;
        width: 2px;
        height: 2px;
        background: white;
        border-radius: 50%;
        opacity: 0;
        box-shadow: 0 0 5px 1px white;
        animation: float 10s infinite;
      }

      @keyframes float {
        0% {
          transform: translateY(0) translateX(0);
          opacity: 0.7;
        }
        50% {
          opacity: 1;
        }
        100% {
          transform: translateY(-100vh) translateX(calc(-50vw + 100%));
          opacity: 0;
        }
      }

      .star-background {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: transparent;
        z-index: 0;
      }

      .star {
        position: absolute;
        width: 1px;
        height: 1px;
        background: white;
        opacity: 0.8;
      }

      .logos {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        padding: 20px;
      }

      .logos img {
        max-width: 100px;
        margin: 20px;
      }

      :root {
        --brand: #76abae;
        --bg-primary: #222831;
      }
      .container1 {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        text-align: center;
        padding: 0 20px;
        flex-direction: row;
      }

      .left-container {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        padding-right: 20px;
        z-index: 2;
      }
      .right-container {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        z-index: 1;
      }

      .hero-visual {
        position: relative;
        width: 80%;
        max-width: 500px;
        height: 500px;
        margin: 0 auto;
      }

      .hero-visual::before {
        content: "";
        position: absolute;
        top: 62%;
        left: 62%;
        z-index: 0;
        transform: translate(-50%, -50%);
        background: var(--brand);
        width: 200px;
        height: 200px;
        border-radius: 50%;
        filter: blur(40px);
        opacity: 0;
        transition: all cubic-bezier(0.5, 0.01, 0.14, 0.99) 600ms;
      }

      .hero__center {
        height: 350px;
        width: 350px;
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        top: 60%;
        left: 60%;
        z-index: 3;
        transform: translate(-50%, -50%);
      }

      .hero__center__appicon {
        height: 380px;
        width: 380px;
        border-radius: 20px;
        background-size: 60% auto;
        background-position: center;
        background-repeat: no-repeat;
        background-image: url("robo.png");
        opacity: 0;
        transition: all cubic-bezier(1, 0, 0.46, 1) 2s;
      }

      .ring {
        margin: 0 auto;
        display: block;
      }

      .ellipse {
        stroke: var(--brand);
        stroke-width: 1;
        transform-origin: center;
        transition: all cubic-bezier(0.5, 0.01, 0.14, 0.99) 6s;
        transform: rotate(0);
        opacity: 0;
      }

      .loading-done .hero-visual::before {
        opacity: 1;
      }

      .loading-done .hero__center__appicon {
        opacity: 1;
      }

      .loading-done .e-1 {
        transform: rotate(165deg);
        opacity: 1;
      }

      .loading-done .e-2 {
        transform: rotate(150deg);
        opacity: 0.9;
      }

      .loading-done .e-3 {
        transform: rotate(135deg);
        opacity: 0.8;
      }

      .loading-done .e-4 {
        transform: rotate(120deg);
        opacity: 0.7;
      }

      .loading-done .e-5 {
        transform: rotate(105deg);
        opacity: 0.6;
      }

      .loading-done .e-6 {
        transform: rotate(90deg);
        opacity: 0.5;
      }

      .loading-done .e-7 {
        transform: rotate(75deg);
        opacity: 0.4;
      }

      .loading-done .e-8 {
        transform: rotate(60deg);
        opacity: 0.3;
      }

      .loading-done .e-9 {
        transform: rotate(45deg);
        opacity: 0.2;
      }

      .loading-done .e-10 {
        transform: rotate(30deg);
        opacity: 0.1;
      }

      .loading-done .e-11 {
        transform: rotate(15deg);
        opacity: 0.06;
      }

      .loading-done .e-12 {
        transform: rotate(0deg);
        opacity: 0.03;
      }

      .spin {
        animation: spin 40s linear infinite;
      }

      @keyframes spin {
        100% {
          transform: rotate(360deg);
        }
      }

      @media (max-width: 1024px) and (min-width: 800px) {
        .container1 {
          flex-direction: column;
          justify-content: center;
          align-items: center;
        }

        .hero-visual {
          margin-bottom: 20px;
        }

        h1 {
          font-size: 2.5em;
        }

        .hero-visual svg {
          width: 800px;
          height: 800px;
          padding-right: 20px;
          margin-right: 10px;
          margin-left: -60px;
        }
        .hero__center__appicon {
          width: 200px;
          height: 200px;
          top: 90%;
          margin-top: -200px;
          margin-left: 150px;
        }

        .hero__center {
          height: 160px;
          width: 160px;
        }
        .left-container {
          display: flex;
          justify-content: center;
          align-items: center;
          padding-right: 20px;
          flex: 1;
          position: relative;
        }

        .right-container {
          width: 100%;
        }

        .hero-visual svg {
          width: 500px; /* Adjusted SVG size for tablets */
          height: 500px;
          top: 50%;
          left: 60%;
        }

        .hero-visual::before {
          display: block;
          content: "";
          position: absolute;
          top: 50%;
          left: 50%;
          z-index: -1;
          transform: translate(-50%, -50%);
          background: #76abae;
          width: 150px;
          height: 150px;
          border-radius: 50%;
          filter: blur(40px);
          opacity: 0;
          animation: circleAnimation 3s forwards;
        }

        @keyframes circleAnimation {
          0% {
            opacity: 0;
            transform: translate(-50%, -50%) scale(0);
          }
          100% {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
          }
        }
      }

      @media (max-width: 768px) {
        .container1 {
          flex-direction: column-reverse;
          justify-content: center;
          align-items: center;
        }

        .hero-visual {
          margin-bottom: 20px;
        }

        h1 {
          font-size: 2em;
        }

        .left-container {
          display: flex;
          justify-content: center;
          align-items: center;
          flex: 1;
          position: relative;
          margin-top: -270px;
        }

        .right-container {
          width: 100%;
          margin-top: 140px;
        }
        .hero-visual svg {
          width: 400px;
          height: 400px;
          padding-right: 20px;
          margin-right: 10px;
          margin-left: -60px;
        }
        .hero__center__appicon {
          width: 250px;
          height: 250px;
          top: 90%;
          margin-top: -200px;
          margin-left: -50px;
        }

        .hero__center {
          height: 300px;
          width: 300px;
        }

        .hero-visual::before {
          display: block;
          content: "";
          position: absolute;
          top: 37%;
          left: 50%;
          z-index: -1;
          transform: translate(-50%, -50%);
          background: #76abae;
          width: 100px;
          height: 100px;
          border-radius: 50%;
          filter: blur(40px);
          opacity: 0;
          animation: circleAnimation 3s forwards;
        }

        @keyframes circleAnimation {
          0% {
            opacity: 0;
            transform: translate(-50%, -50%) scale(0);
          }
          100% {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
          }
        }
      }
    </style>
  </head>
  <body>
    <div class="navbar" id="navbar">
      <div class="logo">
        <a href="index.html" style="font-size: 20px">XENESES</a>
      </div>
      <div class="nav-links" id="nav-links">
        <a href="index.php">HOME</a>
        <a href="/">ABOUT US</a>
        <a href="event.php">EVENTS</a>
        <a href="eventconfirm.php">EVENTS CONFIRM</a>
        <a href="profile">PROFILE</a>
        
      </div>
      <div class="hamburger" id="hamburger" onclick="toggleMenu()">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
    </div>
    <div class="container1">
      <div class="left-container">
        <div class="content">
          <h2>XENESiS</h2>
          <h2>XENESiS</h2>
          <h3>
            "Artificial Intelligence for Aspirational India" <br />
            20<sup>th</sup>, 21<sup>st</sup> FEB
          </h3>
        </div>
      </div>
      <div class="right-container">
        <div class="hero-visual">
          <svg
            width="600"
            height="600"
            viewBox="0 0 456 456"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            class="ring"
          >
            <ellipse cx="228" cy="228" rx="185" ry="135" class="ellipse e-1" />
            <ellipse cx="228" cy="228" rx="185" ry="135" class="ellipse e-2" />
            <ellipse cx="228" cy="228" rx="185" ry="135" class="ellipse e-3" />
            <ellipse cx="228" cy="228" rx="185" ry="135" class="ellipse e-4" />
            <ellipse cx="228" cy="228" rx="185" ry="135" class="ellipse e-5" />
            <ellipse cx="228" cy="228" rx="185" ry="135" class="ellipse e-6" />
            <ellipse cx="228" cy="228" rx="185" ry="135" class="ellipse e-7" />
            <ellipse cx="228" cy="228" rx="185" ry="135" class="ellipse e-8" />
            <ellipse cx="228" cy="228" rx="185" ry="135" class="ellipse e-9" />
            <ellipse cx="228" cy="228" rx="185" ry="135" class="ellipse e-10" />
            <ellipse cx="228" cy="228" rx="185" ry="135" class="ellipse e-11" />
            <ellipse cx="228" cy="228" rx="185" ry="135" class="ellipse e-12" />
          </svg>

          <div class="hero__center">
            <div class="hero__center__appicon"></div>
          </div>
        </div>
      </div>
    </div>
    <h1 class="title">DEPARTMENT</h1>
    <div class="card-container">
      <a href="/event.html" class="card">
        <img src="AI.jpg" alt="Card 1" />
        <h1>INFORMATION TECHNOLOGY</h1>
      </a>
      <a href="/event.html" class="card">
        <img src="AI2.jpg" alt="Card 2" />
        <h1>COMPUTER ENGINEERING</h1>
      </a>
      <a href="/event.html" class="card">
        <img src="AI3.jpg" alt="Card 3" />
        <h1>MECHANICAL ENGINEERING</h1>
      </a>
      <a href="/event.html" class="card">
        <img src="AI.jpg" alt="Card 4" />
        <h1>CIVIL ENGINEERING</h1>
      </a>
      <a href="/event.html" class="card">
        <img src="AI2.jpg" alt="Card 5" />
        <h1>ELECTRICAL ENGINEERING</h1>
      </a>
      <a href="/event.html" class="card">
        <img src="AI3.jpg" alt="Card 6" />
        <h1>ELECTRONIC & COMMUNICATION</h1>
      </a>
      <a href="/event.html" class="card">
        <img src="AI.jpg" alt="Card 7" />
        <h1>MBA</h1>
      </a>
      <a href="/event.html" class="card">
        <img src="AI2.jpg" alt="Card 8" />
        <h1>MCA</h1>
      </a>
      <a href="/event.html" class="card">
        <img src="AI3.jpg" alt="Card 9" />
        <h1>SCIENCE & HUMANITY</h1>
      </a>
    </div>

    <h1 class="title">GALLERY</h1>
    <div class="slider">
      <div class="slides">
        <div class="slide">
          <img src="AI.jpg" alt="Slide 1" />
        </div>
        <div class="slide">
          <img src="AI2.jpg" alt="Slide 2" />
        </div>
        <div class="slide">
          <img src="AI3.jpg" alt="Slide 3" />
        </div>
      </div>
      <div class="slider-buttons">
        <button class="slider-button" id="prevBtn">&#10094;</button>
        <button class="slider-button" id="nextBtn">&#10095;</button>
      </div>
    </div>

    <div class="particles"></div>
    <div class="star-background"></div>
    <div class="map-container">
      <h2 class="map-title">🚀 Join KSV's Biggest TechFest XENESES 2025 🌍</h2>
      <div class="map-frame">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4160.473340968046!2d72.63624846756484!3d23.239306255795842!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395c2b933477ba9f%3A0xe440409e66bea08a!2sLDRP%20Institute%20of%20Technology%20and%20Research!5e0!3m2!1sen!2sin!4v1738168485228!5m2!1sen!2sin"
          width="1200"
          height="300"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </div>
    </div>
    <script>
      function toggleMenu() {
        const navbar = document.getElementById("navbar");
        navbar.classList.toggle("open");
      }

      document.addEventListener("DOMContentLoaded", () => {
        window.addEventListener("load", () => {
          document.body.classList.add("loading-done");

          setTimeout(() => {
            const ring = document.querySelector(".ring");
            if (ring) {
              ring.classList.add("spin");
            }
          }, 2000);
        });
      });

      window.onscroll = function () {
        stickNavbar();
      };

      const navbar = document.getElementById("navbar");
      const sticky = navbar.offsetTop;

      function stickNavbar() {
        if (window.pageYOffset > sticky) {
          navbar.classList.add("sticky");
        } else {
          navbar.classList.remove("sticky");
        }
      }

      const particleContainer = document.querySelector(".particles");
      const starBackground = document.querySelector(".star-background");

      for (let i = 0; i < 100; i++) {
        const particle = document.createElement("div");
        particle.classList.add("particle");
        particle.style.top = `${Math.random() * 100}vh`;
        particle.style.left = `${Math.random() * 100}vw`;
        particle.style.animationDelay = `${Math.random() * 10}s`;
        particleContainer.appendChild(particle);
      }

      for (let i = 0; i < 300; i++) {
        const star = document.createElement("div");
        star.classList.add("star");
        star.style.top = `${Math.random() * 100}vh`;
        star.style.left = `${Math.random() * 100}vw`;
        starBackground.appendChild(star);
      }

      const slides = document.querySelector(".slides");
      const slide = document.querySelectorAll(".slide");
      const prevBtn = document.getElementById("prevBtn");
      const nextBtn = document.getElementById("nextBtn");

      let index = 0;
      let interval;

      function showSlide(n) {
        index += n;
        if (index >= slide.length) {
          index = 0;
        }
        if (index < 0) {
          index = slide.length - 1;
        }
        slides.style.transform = "translateX(" + -index * 100 + "%)";
      }

      function startAutoSlide() {
        interval = setInterval(() => showSlide(1), 3000);
      }

      prevBtn.addEventListener("click", () => {
        showSlide(-1);
        resetTimer();
      });

      nextBtn.addEventListener("click", () => {
        showSlide(1);
        resetTimer();
      });

      document
        .querySelector(".slider")
        .addEventListener("mouseenter", () => clearInterval(interval));
      document
        .querySelector(".slider")
        .addEventListener("mouseleave", startAutoSlide);

      startAutoSlide();
    </script>
  </body>
</html>
