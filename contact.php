<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    if(!empty($name) && !empty($email) && !empty($message)) {
        echo "<h2>Message sent successfully!</h2>";
    } else {
        echo "Error sending message. Please try again.";
    }
}
?>
