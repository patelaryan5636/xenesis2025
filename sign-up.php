
<?php 
 session_start();
?><!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/Xenesis2025_logo.png">
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      rel="stylesheet"
    />
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: "Poppins", sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        color: white;
        overflow: hidden;
        background: url("login-bg.png") no-repeat center center fixed;
        background-size: cover;
      }

      .form-container {
        position: relative;
        background: rgba(0, 0, 0, 0.353);
        padding: 30px;
        width: 500px;
        border-radius: 20px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.18);
        animation: fadeIn 0.8s ease-in-out;
        margin-right: 550px;
      }
      @media screen and (max-width: 1024px) {
        .form-container {
          margin-top: 40px;
          height: auto;
          width: 100%;
          margin-left: 550px;
        }
        .header h3 {
          font-size: 20px;
        }

        .row {
          flex-direction: column;
        }

        .password-wrapper input {
          width: 600px;
        }

        button {
          font-size: 0.9rem;
        }
      }

      @media screen and (max-width: 767px) {
        .form-container {
          height: auto;
          justify-content: center;
          align-items: center;
          width: 100%;
          margin-left: 550px;
          margin-top: -50px;
        }
        .header h3 {
          font-size: 20px;
        }

        .row {
          flex-direction: column;
        }

        .password-wrapper input {
          width: 300px;
        }

        button {
          font-size: 0.9rem;
        }
      }

      @media screen and (max-width: 480px) {
        .form-container {
          width: 95%;
        }
      }

      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: translateY(20px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      .header {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: row;
        gap: 20px;
        margin-bottom: 20px;
      }

      .header img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
      }

      .header h3 {
        font-size: 1.8rem;
        font-weight: 600;
        text-align: center;
        line-height: 1.2;
      }

      input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 5px;
        font-size: 1rem;
        color: white;
        transition: all 0.3s ease;
      }

      input:focus {
        background: rgba(255, 255, 255, 0.2);
        outline: none;
        border: 1px solid #76abae;
        box-shadow: 0 0 8px rgba(35, 162, 246, 0.6);
      }

      .row {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
      }

      .row .password-wrapper {
        flex: 1;
        position: relative;
      }

      .row input {
        flex: 1;
      }

      .password-wrapper input {
        padding-right: 40px;
      }

      #togglePassword1,
      #togglePassword2 {
        color: #76abae;
      }

      .password-wrapper .toggle-password {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.7);
        transition: color 0.3s ease;
      }

      .password-wrapper .toggle-password:hover {
        color: white;
      }

      button {
        width: 100%;
        padding: 12px;
        margin-top: 15px;
        background: #76abae;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        font-weight: 600;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      button:hover {
        box-shadow: 0 0 15px black, gray;
        transform: scale(1.03);
      }

      .signup-link {
        text-align: center;
        margin-top: 15px;
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.7);
      }

      .signup-link a {
        color: #76abae;
        text-decoration: none;
        font-weight: 500;
      }

      .signup-link a:hover {
        text-decoration: underline;
      }

      input::placeholder {
        color: #76abae;
        opacity: 1;
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
        width: 30px;
        height: 30px;
        display: inline-block;
        text-align: center;
        line-height: 30px;
        color: white;
      }
      .home-button:hover {
        background: #76abae8f;
      }  
      .p{
        color:  #76abae;
      }
    </style>
  </head>
  <body>
    <div class="home-button">
      <a href="index.php"><i class="fa fa-home"></i></a>
    </div>
    <div class="form-container">
      <div class="header">
        <img src="logo.png" alt="logo" />
        <h3>BE A PART OF XENESIS</h3>
      </div>
      <form action="includes/scripts/signmeup.php" method="post">
        <p class="p">
          <?php
           if(isset( $_SESSION['xenesis_error_message'])){
            echo  $_SESSION['xenesis_error_message'];
          }
           
  
          unset($_SESSION['xenesis_error_message']);
      
          
  
          ?>
          </p>
        <input type="text" name="user_enrollment"
        pattern="[A-Za-z0-9]{9,16}" 
        title="Enrollment number must be 9-16 characters and contain only letters and digits."
        placeholder="Enrollment Number" required />
        <input type="email"  name="user_email" placeholder="Email ID" required />
        <input type="tel" name="user_phone" placeholder="Mobile Number"
        pattern="[0-9]{10}" 
        title="Mobile number must be exactly 10 digits"
        required />
        <input type="text"  name="full_name" placeholder="Full Name" required />

        <div class="row">
          <div class="password-wrapper">
            <input
              type="password"
              name="user_password"
              id="password1"
              placeholder="Password"
                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
              title="Password must contain at least one uppercase, lowercase, digit, special character, and be at least 8 characters."
              required
            />
            <i class="fas fa-eye toggle-password" id="togglePassword1"></i>
          </div>

          <div class="password-wrapper">
            <input
              type="password"
              id="password2"
              name="user_confirm_password"
              placeholder="Confirm Password"
              required
            />
            <i class="fas fa-eye toggle-password" id="togglePassword2"></i>
          </div>
        </div>

        <button type="submit">REGISTER</button>

        <p class="signup-link">
          Already have an account ?<a href="sign-in.php"> Login</a>
        </p>
      </form>
    </div>

    <script>
      const passwordInput1 = document.getElementById("password1");
      const passwordInput2 = document.getElementById("password2");
      const togglePassword1 = document.getElementById("togglePassword1");
      const togglePassword2 = document.getElementById("togglePassword2");

      togglePassword1.addEventListener("click", () => {
        const type = passwordInput1.type === "password" ? "text" : "password";
        passwordInput1.type = type;

        togglePassword1.classList.toggle("fa-eye-slash");
      });

      togglePassword2.addEventListener("click", () => {
        const type = passwordInput2.type === "password" ? "text" : "password";
        passwordInput2.type = type;

        togglePassword2.classList.toggle("fa-eye-slash");
      });
    </script>
  </body>
</html>