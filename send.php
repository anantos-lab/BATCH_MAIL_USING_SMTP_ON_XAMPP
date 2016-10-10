<?php
//SMTP REQUIRED FILES

require_once './PHPMailer/PHPMailerAutoload.php';
require_once './PHPMailer/class.phpmailer.php';
require_once './PHPMailer/class.smtp.php';

//htmlentities Encoding
$subject = htmlentities($_POST['subject']);
$messages = htmlentities($_POST['messages']);
$mail = $_POST['mails'];
//Expolde ARRay
$mails = explode(",",$mail);
foreach ($mails as $maile) {
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "Yourgmail@gmail.com";
$mail->Password = "Password";
$mail->SetFrom("rual@rualrobin.com" , "Rual");
$mail->Subject = $subject;
$mail->Body = $messages ;
 $mail->AddAddress($maile);

if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }
 }

?>
