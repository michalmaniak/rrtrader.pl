.p<?php
include ("connect.php");

 require("mailer/phpmailer/PHPMailer.php");
  require("mailer/phpmailer/SMTP.php");


include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';

	$securimage = new Securimage();

	if ($securimage->check($_POST['captcha_code']) == false) {



header("Location: /rejestracja.php?result=4", true, 301);

exit();

	}

	else{



$user = $_POST['username'];

$code2 = $_POST['code2'];

$code = $_POST['code'];


$mail = $_POST['mail'];

$link= $_POST['link'];
$findme   = 'm.';

$pos = strpos($link, $findme);

if ($pos != true) {
$pc=$link;

$mobile=str_replace("rival","m.rival",$link);
} else {
$mobile=$link;
$pc=str_replace("m.rival","rival",$link);
}



if($code != $code2)
{

	header("Location:  /rejestracja.php?result=6", true, 301);

exit();

}

if ($user == NULL or $code == NULL or $mail == NULL or $pc == NULL or $mobile == NULL) {

	header("Location:  /rejestracja.php?result=7", true, 301);

exit();

}







$hash = password_hash($code, PASSWORD_BCRYPT, $options);



 $query= $conn->prepare('Select nick FROM users WHERE nick=?');
            $query->bind_param("s",$zmienna10);
			$zmienna10=$user;
            $query->execute();
			$query->store_result();
			$nick_check="";
			$query->bind_result($nick_check);
			$query->fetch();

if($query->num_rows > 0){
header("Location: /rejestracja.php?result=1", true, 301);
$query->close();

}
$query->close();

 $query= $conn->prepare('Select email FROM users WHERE email=?');
            $query->bind_param("s",$zmienna11);
			$zmienna11=$mail;
            $query->execute();
			$query->store_result();
			$mail_check="";
			$query->bind_result($mail_check);
			$query->fetch();

if($query->num_rows > 0){
header("Location:  /rejestracja.php?result=2", true, 301);
$query->close();
$conn->close();

}
$query->close();

		$query = $conn->prepare("INSERT INTO `users` (`id`, `nick`, `email`, `password`, `link_pc`, `link_mobile`) VALUES ('', ?, ?, ?, ?, ?);");

$query->bind_param('sssss',$zmienna4, $zmienna5, $zmienna6, $zmienna7, $zmienna8);
$zmienna4=$user;
$zmienna5=$mail;
$zmienna6=$hash;
$zmienna7=$pc;
$zmienna8=$mobile;

$query->execute();
$query->close();

$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 32; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

		$query = $conn->prepare("INSERT INTO `weryfikacja_konta` (`id`, `nick`, `kod`) VALUES ('', ?, ?);");
$query->bind_param('ss',$zmienna_xd, $zmienna_xd2);
$zmienna_xd=$user;
$zmienna_xd2=$randomString;
$query->execute();
$query->close();



$zawartosc_email ="<HTML>Dziękujemy za rejestrację w serwisie, poniżej znajduje się kod weryfikacyjny. Prosimy o wysłanie go jednemu z moderatorów poprzez wiadmość prywatną w grze, po weryfikacji konto zostanie w pełni aktywowane."."<BR>"."<BR>".
$randomString."<BR>".
"Listę moderatorów znajdziesz na naszej stronie"."<BR>".
"<BR>".
"Wiadomość wygenerowana automatycznie, proszę nie odpowidać,"."<BR>"
."Administracja dev.rrtrader.tk";

 	$temat= "dev.rrtrader.tk, rejestracja użytkownika";
	
	$plain="Dziękujemy za rejestrację w serwisie, poniżej znajduje się kod weryfikacyjny. Prosimy o wysłanie go jednemu z moderatorów poprzez wiadmość prywatną w grze, po weryfikacji konto zostanie w pełni aktywowane.".
$randomString.
"Listę moderatorów znajdziesz na naszej stronie".
"Wiadomość wygenerowana automatycznie, proszę nie odpowidać,"
."Administracja dev.rrtrader.tk</HTML>";
 $poczta = new PHPMailer\PHPMailer\PHPMailer(true);

    $poczta->IsSMTP(); // enable SMTP

   //$poczta->SMTPDebug = 4; // debugging: 1 = errors and messages, 2 = messages only
    $poczta->SMTPAuth = true; // authentication enabled
    $poczta->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $poczta->Host = "";
	 $poczta->CharSet = 'utf-8';
    $poczta->Port = 465; // or 587
	$poczta->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

    $poczta->Username = "";
    $poczta->Password = "";
    $poczta->SetFrom("");
    $poczta->isHTML(true);                                  // Set email format to HTML
    $poczta->Subject = $temat;
    $poczta->Body    =$zawartosc_email;
    $poczta->AltBody = $plain;
$poczta->AddAddress($mail);
$poczta->Send();


header("Location: /rejestracja.php?result=3", true, 301);

$conn->close();
//exit();



	}

?>
