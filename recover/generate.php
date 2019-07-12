<?php
session_start();
if(isset($_SESSION['login'])) // 2
	{
header("Location: /index.php", true, 301);
exit();
	}
  include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
  	$securimage = new Securimage();
  	if ($securimage->check($_POST['captcha_code']) == false) {
  header("Location: /recover/index.php?result=3", true, 301);
  exit();
  	}
  	else{

     $conn = new mysqli($servername, $username, $password, $dbname);

     $query = $conn->prepare("SELECT * from users WHERE email=?");
   $query->bind_param('s', $zmienna1xd); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
   $zmienna1xd=$_POST['mail'];

   $query->execute();
   $query->store_result();
       $query->fetch();
   if($query->num_rows == 0){
				 $conn->close();
				header("Location: /recover/index.php?result=2", true, 301);
				exit();
			 }	// actually perform the query
   if($query->num_rows >= 1){



$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 32; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }


    $query = $conn->prepare("INSERT INTO `password_recover` (`id`, `email`, `kod`) VALUES ('', ?, ?);");
$query->bind_param('ss',$zmienna_xd, $zmienna_xd2);
$zmienna_xd=$_POST['mail'];
$zmienna_xd2=$randomString;
$query->execute();
$query->close();

 $zawartosc_email ="Oto link do resetu hasła: https://rrtrader.pl/recover/new.php?id=".$randomString."</br>".
 "Wiadomość wugenerowana automatycznie, proszę nie odpowiadać </br>".
 "Administracja rrtrader.pl";
 	$temat= "rrtrader.pl, odzykaj hasło";
    $adres_do = $_POST['mail'];

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'From: '.$adres_od.''."\r\n".


    mail($adres_do,$temat,$zawartosc_email,$headers);
		    $conn->close();
		header("Location: /recover/index.php?result=1", true, 301);
	  exit();
  }

  }

?>
