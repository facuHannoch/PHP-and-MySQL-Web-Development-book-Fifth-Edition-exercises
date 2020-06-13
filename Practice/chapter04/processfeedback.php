<?php
// create short variable names 
$name = $_POST['name'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];

// set up some static information 
$toaddress = "feedback@example.com";
$subject = "Feedback from web site";

$mailcontent =  "Customer name: " . filter_var($name) . "\n" .
    "Customer email: " . $email . "\n" .
    "Customer comments: " . $feedback . "\n";

// headers are separated by the character string \r\n (carriage return-line feed). We need to take care that user data we use in the email headers does not contain these characters, or we run the risk of a set of attacks, called header injection. 
$mailcontent = "Customer name: " . str_replace("\r\n", "", $name) . "\n" .
    "Customer email: " . str_replace("\r\n", "", $email) . "\n" .
    "Customer comments:\n" . str_replace("\r\n", "", $feedback) . "\n";

$fromaddress = "From: webserver@example.com";

// invoke mail function to send mail 
mail($toaddress, $subject, $mailcontent, $fromaddress);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Feedback submitted</h1>
    <p>Your feedback has been sent.</p>
</body>

</html>