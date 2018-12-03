<?php
include 'db.php';
$pDatabase = Database::getInstance();

if (isset($_POST['sendMail'])) 
{
	require 'PHPMailerAutoload.php';
	require 'credential.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 0;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = EMAIL;                 // SMTP username
$mail->Password = PASS;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom(EMAIL, 'Yound minds ');
$mail->addAddress($_POST['sender_email']);     // Add a recipient
            // Name is optional
$mail->addReplyTo(EMAIL);
    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $_POST['subject'];
$mail->Body    = '<div>This is the verification mail. Your OTP is <b>$otp</b> Enter this to activate your account on Young mind Bikes</div>';
$mail->AltBody = $_POST['message'];

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Mailer</title>
</head>
<body>

<form enctype="multipart/form-data" method="POST" action=""> 
	<label>Your Email <input type="email" name="sender_email" /> </label> 
	<label>Subject <input type="text" name="subject" /> </label> 
	<label>Message <textarea name="message"></textarea> </label> 
	
	<input type="submit" name="sendMail"  value="send" >
</form> 

</body>
</html>
