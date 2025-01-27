
<?php 
 session_start();
?><!DOCTYPE html>
<html lang="en">
  <head>
    <title>Register Page</title>

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
        background: linear-gradient(135deg, #121212, #1e1e2f);
        font-family: "Poppins", sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        color: white;
        overflow: hidden;
      }

      .form-container {
        position: relative;
        background: rgba(255, 255, 255, 0.1);
        padding: 30px;
        width: 500px;
        border-radius: 20px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.18);
        animation: fadeIn 0.8s ease-in-out;
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
        border: 1px solid #23a2f6;
        box-shadow: 0 0 8px rgba(35, 162, 246, 0.6);
      }

      .row {
        display: flex;
        gap: 10px;
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
        background: linear-gradient(135deg, #23a2f6, #ff512f);
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        font-weight: 600;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      button:hover {
        box-shadow: 0 0 15px rgba(255, 81, 47, 0.7),
          0 0 25px rgba(35, 162, 246, 0.6);
        transform: scale(1.03);
      }

      .signup-link {
        text-align: center;
        margin-top: 15px;
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.7);
      }

      .signup-link a {
        color: #ff512f;
        text-decoration: none;
        font-weight: 500;
      }

      .signup-link a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <div class="form-container">
      <div class="header">
        <img src="/logo.png" alt="logo" />
        <h3>BE A PART OF XENESIS</h3>
      </div>
      <form action="includes/scripts/signmeup.php" method="post">
        <p>
        <?php
         if(isset( $_SESSION['xenesis_error_message'])){
          echo  $_SESSION['xenesis_error_message'];
        }
         

        unset($_SESSION['xenesis_error_message']);
    
        

        ?>
        </p>
        <input type="text" name="user_enrollment" placeholder="Enrollment Number" required />
        <input type="email" name="user_email" placeholder="Email ID" required />
        <input type="tel" name="user_phone" placeholder="Mobile Number" required />

        <div class="row">
          <input type="text" name="full_name" placeholder="Full Name" required />
          <div class="password-wrapper">
            <input
              type="password"
              id="password"
              name="user_password"
              placeholder="Password"
              required
            />
            <i class="fas fa-eye toggle-password" id="togglePassword"></i>
          </div>
          <div class="password-wrapper">
            <input
              type="password"
              id="password"
              name="user_confirm_password"
              placeholder="confirm Password"
              required
            />
            <i class="fas fa-eye toggle-password" id="togglePassword"></i>
          </div>
        </div>

        <button type="submit">REGISTER</button>

        <p class="signup-link">
          Already have an account ?<a href="sign-in.php"> Login</a>
        </p>
      </form>
    </div>

    <script>
      const passwordInput = document.getElementById("password");
      const togglePassword = document.getElementById("togglePassword");

      togglePassword.addEventListener("click", () => {
        const type = passwordInput.type === "password" ? "text" : "password";
        passwordInput.type = type;

        togglePassword.classList.toggle("fa-eye-slash");
      });
    </script>
  </body>
</html>
