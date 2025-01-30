<?php
session_start();
// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the token and new password from the form
    $token = $_POST['token'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Check if the new password and confirm password match
    if ($newPassword === $confirmPassword) {
        // Hash the new password before storing it
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Connect to the database
        $conn = new mysqli('localhost', 'root', '', 'xenesis2025');
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve the email associated with the reset token
        $stmt = $conn->prepare("SELECT email FROM forget_password_master WHERE reset_token=? AND used=FALSE");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Get the email from the result
            $row = $result->fetch_assoc();
            $email = $row['email'];

            // Update the password in the user table
            $updateStmt = $conn->prepare("UPDATE user_master SET password=? WHERE email=?");
            $updateStmt->bind_param("ss", $hashedPassword, $email);
            $updateStmt->execute();

            // Mark the reset token as used in the forget_password_master table
            $conn->query("UPDATE forget_password_master SET used=TRUE WHERE reset_token='$token'");

            // Close the connection
            $conn->close();

            header("location: sign-in.php");
            $_SESSION["xenesis_success_message"] = "Your password has been successfully updated!";
            // Notify the user that the password has been updated
            // echo "Your password has been successfully updated!";
        } else {
            // If the token is invalid or expired
            header("location: sign-in.php");
            $_SESSION["xenesis_error_message"] = "Invalid or expired token.";
            // echo "Invalid or expired token.";
        }
    } else {
        // If the passwords don't match
        header("Location: newpassword.php?".$token);
        $_SESSION["xenesis_error_message"] = "Passwords do not match.";
        // echo "Passwords do not match.";
    }
}
?>
