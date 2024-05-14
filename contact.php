<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $to = "sreeskamala@gmail.com";
    $subject = "New Contact Form Submission";
    $body = "Name: $name\nEmail: $email\n\n$message";
   $headers="From: $email";
    if(!empty($name) && !empty($email) && !empty($message)) {
        echo "<h2>Message sent successfully!</h2>";
    } else {
        echo "Error sending message. Please try again.";
    }
}
?>