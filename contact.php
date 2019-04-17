<?php
// define variables and set to empty values
$name = $email = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["fullname"]);
    $email = test_input($_POST["email"]);
    $message = test_input($_POST["message"]);
}

if (empty($name) || empty($email) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('missing inputs!');
} else {

    //add your email details here!
    $mySmtpHost = '';
    $myEmail = '';
    $myemailPassword = '';
    require 'mailer.php';
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function prettyPrintR($param)
{
    print("<pre>" . print_r($param, true) . "</pre><hr>");
}
