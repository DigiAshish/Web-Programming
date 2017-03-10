<?php
    $name = $_POST['userName'];
    $email = $_POST['userEmail'];
    $phone = $_POST['userPhone'];
    $message = $_POST['userMsg'];
    $from = 'From: Random Text'; 
    $to = 'example@example.com'; 
    $subject = 'Contacted from random Text';
    $body = "From: $name\n E-Mail: $email\n Phone: $phone\n Message:\n $message";
    if ($_POST['submit']) {
    if (mail ($to, $subject, $body, $from)) { 
    	echo "<script type='text/javascript'>alert('Your message has been sent!');</script>";
    	exit;
    } else { 
    	echo "<script type='text/javascript'>alert('Something went wrong, go back and try again!');</script>";
    	exit;
    }
}
?>