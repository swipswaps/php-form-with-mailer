<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
  //Server settings
  $mail->SMTPDebug = 2; // Enable verbose debug output
  $mail->isSMTP(); // Set mailer to use SMTP
  $mail->Host = $mySmtpHost; // Specify main and backup SMTP servers
  $mail->SMTPAuth = true; // Enable SMTP authentication
  $mail->Username = $myEmail; // SMTP username
  $mail->Password = $myemailPassword; // SMTP password
  $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587; // TCP port to connect to

  //Recipients
  $mail->setFrom($myEmail, 'Hello From Me!');
  $mail->addAddress($email, $name); // Name is optional
  $mail->addReplyTo($myEmail, 'Information');
  //optional
  // $mail->addCC('cc@example.com');
  // $mail->addBCC('bcc@example.com');

  /*
  // Attachments
  $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
  $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
   */

  // Content
  $mail->isHTML(true); // Set email format to HTML
  $mail->Subject = 'Here is the subject';
  $mail->Body = $message;
  /*
  optional
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
   */
  $mail->send();
  echo 'Message has been sent';
  header("Location: success.html");
} catch (Exception $e) {
  // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  header("Location: failed.html");
}
