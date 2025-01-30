<?php
session_start();
// Include PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if email exists in the user table
    $conn = new mysqli('localhost', 'root', '', 'xenesis2025');
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if email is in user table
    $result = $conn->query("SELECT * FROM user_master WHERE email='$email'");
    
    if ($result->num_rows > 0) {
        // Generate a unique token
        $token = bin2hex(random_bytes(50)); // Generate 50 bytes of random data
        $expiry = date("Y-m-d H:i:s", strtotime("+1 hour")); // Token expires in 1 hour

        // Store the token in the forget_password_master table
        $stmt = $conn->prepare("INSERT INTO forget_password_master (email, reset_token, token_expiry) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $token, $expiry);
        $stmt->execute();

        // Send reset email with PHPMailer
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'patelaryan5636@gmail.com'; // Your Gmail Address
            $mail->Password = 'xarq luyb tkix qwey';   // Your Gmail App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Email settings
            $mail->setFrom('patelaryan5636@gmail.com', 'Support');
            $mail->addAddress($email);
            $mail->Subject = "Password Reset Request";

            // Body content with reset link
            $resetLink = "http://localhost/xenesis2025/newpassword.php?token=$token"; // Adjust your domain URL accordingly
            $mail->isHTML(true);
            $mail->Body = "
                <p>Hello,</p>
                <p>You requested a password reset. Click the link below to reset your password:</p>
                <p><a href='$resetLink' style='color: #007BFF;'>Reset Password</a></p>
                <p>This link will expire in 1 hour.</p>
            ";

            $mail->send();
            header("Location: emailver.php");
            // echo "A reset link has been sent to your email!";
        } catch (Exception $e) {
            echo "Error: {$mail->ErrorInfo}";
        }
    } else {
      
      $_SESSION["email_eror_message"] = "email is not found";
      header("Location: forgot.php");
      echo "email is not found";
        // echo "Email not found!";
    }

    $conn->close();
}
?>
