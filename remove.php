<?php session_start();
include ("connect.php");
date_default_timezone_set('Europe/Warsaw');
error_reporting(E_ALL);
ini_set('display_errors', 1);

  if(!isset($_SESSION['login'])) // 2
	{
	header("Location: /loguj.php", true, 301);
exit();
	}



include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
	$securimage = new Securimage();
	if ($securimage->check($_POST['captcha_code']) == false) {
header("Location: /remove_button.php?result=4", true, 301);
$conn->close();
exit();
	}
	else{


if($_POST['premium']="premium_remove")
{
	$query = $conn->prepare("DELETE FROM oferty WHERE nick=?");
$query->bind_param('s', $zmienna021); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
$zmienna021=$_SESSION['nick'];
$query->execute(); // actually perform the query
$query->close();
}


if($_POST['gold']="gold_oferty")
{
		$query = $conn->prepare("DELETE FROM oferty_gold WHERE seller=?");
$query->bind_param('s', $zmienna021); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
$zmienna021=$_SESSION['nick'];
$query->execute(); // actually perform the query
$query->close();
}
header("Location: /remove_button.php?result=3", true, 301);
$conn->close();
exit();

}

?>
