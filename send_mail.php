<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Load PHPMailer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipientEmail = $_POST['email'];

    // Generate a random serial number
    $serialNumber = strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 10));

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'patelaryan5636@gmail.com'; // Your Gmail Address
        $mail->Password = 'xarq luyb tkix qwey'; // Your Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        // Set email format to HTML
        $mail->isHTML(true);

        // Email settings
        $mail->setFrom('patelaryan5636@gmail.com', 'Event Team'); 
        $mail->addAddress($recipientEmail);
        $mail->Subject = "Successful Participation - Site Visit Confirmation";

        // Email Body (HTML)
        $mail->isHTML(true);
        $mail->Body = "
            <div style='font-family: Arial, sans-serif; padding: 20px; text-align: center; background-color: #f4f4f4;'>
                <h2 style='color: #4CAF50;'>🎉 Congratulations! 🎉</h2>
                <p style='font-size: 16px;'>Dear Participant,</p>
                <p style='font-size: 16px;'>You have successfully participated in our site visit. Thank you for being a part of this event!</p>
                
                <div style='display: inline-block; background: linear-gradient(135deg, #ff416c, #ff4b2b); padding: 20px; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);'>
                    <h3 style='color: #fff;'>Your Unique Serial Number</h3>
                    <h1 style='color: #fff; font-size: 36px; font-weight: bold; letter-spacing: 2px;'>$serialNumber</h1>
                </div>

                <p style='margin-top: 20px; font-size: 16px;'>Visit our site for more details:</p>
                <a href='https://yoursite.com' style='display: inline-block; background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; font-size: 18px; border-radius: 5px;'>Visit Website</a>

                <p style='margin-top: 20px; font-size: 14px; color: gray;'>If you did not participate, please ignore this email.</p>
            </div>
        ";

        // Send Email
        $mail->send();
        // echo "Email sent successfully!";
    } catch (Exception $e) {
        echo "Error: {$mail->ErrorInfo}";
    }
}
?>
