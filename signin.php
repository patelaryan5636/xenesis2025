<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login Page</title>

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
        padding: 40px;
        width: 400px;
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
        font-size: 1.6rem;
        font-weight: 600;
        text-align: center;
        line-height: 1.2;
      }

      input {
        width: 100%;
        padding: 15px;
        margin: 15px 0;
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

      .password-wrapper {
        position: relative;
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
        padding: 15px;
        margin-top: 20px;
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
        margin-top: 20px;
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

      .forgot_pass {
        color: #ff512f;
        text-decoration: none;
      }
    </style>
  </head>
  <body>
    <div class="form-container">
      <div class="header">
        <img src="/logo.png" alt="logo" />
        <h3>
          LOGIN INTO <br />
          XENESIS WORLD
        </h3>
      </div>
      <form>
        <input type="text" placeholder="Enrollment Number" required />

        <div class="password-wrapper">
          <input
            type="password"
            id="password"
            placeholder="Password"
            required
          />
          <i class="fas fa-eye toggle-password" id="togglePassword"></i>
        </div>
        <a href="#" class="forgot_pass">Forgot Password?</a>

        <button type="submit">LOGIN</button>

        <p class="signup-link">
          Don't have an account ? <a href="/register.html">Register</a>
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
