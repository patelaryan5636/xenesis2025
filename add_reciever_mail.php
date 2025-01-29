<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
</head>
<body>
    <h2>Send Email Using PHPMailer</h2>
    <form action="send_mail.php" method="POST">
        <label for="email">Recipient Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="subject">Subject:</label>
        <input type="text" name="subject" required><br><br>

        <label for="message">Message:</label>
        <textarea name="message" required></textarea><br><br>

        <button type="submit">Send Email</button>
    </form>
</body>
</html>
