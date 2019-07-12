<?php
 require("mailer/phpmailer/PHPMailer.php");
  require("mailer/phpmailer/SMTP.php");

include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
	$securimage = new Securimage();
	if ($securimage->check($_POST['captcha_code']) == false) {
header("Location: contact.php?result=1", true, 301);
exit();	

	}
	else{
  $subject = 'Wiadomosc ze strony o kategorii: ' . $_POST['category'];
$message1 = 'Nazwa uzytkownika: ' . $_POST['username'] . "<BR>";
$message2 = 'Wiadomosc: ' . $_POST['message'] . "<BR>";
$message3 = 'Email kontaktowy: ' .$_POST['mail'] . "<BR>";
$message = $message1 . $message3 . $message2;
  
 $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    $mail->IsSMTP(); // enable SMTP

 //   $mail->SMTPDebug = 4; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "";
	 $mail->CharSet = 'utf-8';
    $mail->Port = 465; // or 587
	$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

    $mail->Username = "";
    $mail->Password = "";
    $mail->SetFrom("");
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Wiadomosc ze strony o kategorii: ' . $_POST['category'];
    $mail->Body    =$message;
    $mail->AltBody = $message;
$mail->AddAddress("");
$mail->Send();
header("Location: contact.php?result=2", true, 301);
exit();	
	}
?> 

