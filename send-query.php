<?php
if(isset($_POST['submit'])) {
    $to = "riorigasaki65@gmail.com";
    $subject = "New Query from ".$_POST['name'];
    $message = "Name: ".$_POST['name']."\n";
    $message .= "Email: ".$_POST['email']."\n";
    $message .= "Phone: ".$_POST['phone']."\n";
    $message .= "Message: ".$_POST['message']."\n";
    $headers = "From: ".$_POST['email'];

    if(mail($to, $subject, $message, $headers)) {
        echo "Your message has been sent successfully.";
    } else {
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
}
?>
