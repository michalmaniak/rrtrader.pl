<?php
include ("connect.php");
session_start();
if(!isset($_SESSION['login'])) // 2
{
header("Location: /loguj.php", true, 301);
exit();
}
date_default_timezone_set('Europe/Warsaw');



		$query = $conn->prepare("INSERT INTO `log_1` (`id`, `nick`, `czynność`, `data`, `ip`, `urządzenie`) VALUES ('', ?, 'wyloguj', ?, ?, '');"); // prepate a query
$query->bind_param('sss', $zmienna_nick, $zmienna_data, $zmienna_ip);
$zmienna_nick=$_SESSION['nick']; // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
$zmienna_data=date('Y-m-d H:i:s');
$zmienna_ip=$_SERVER['REMOTE_ADDR'];
$query->execute(); // actually perform the query




session_unset();
session_destroy();
	header("Location: /index.php", true, 301);

exit();
?>
