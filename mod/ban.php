<?php
session_start();
include("connect.php");
if(!isset($_SESSION['login'])) // 2
	{
header("Location: /nope.php", true, 301);
exit();
	}

	if($_SESSION['perm']!=5) // 2
	{
header("Location: /nope.php", true, 301);
exit();
	}

 $value=$_POST['value'];
 $dbname = "admin_rrtrader";
 $value= $_POST['nick'];
date_default_timezone_set('Europe/Warsaw');

  $query= $conn->prepare("UPDATE users SET uprawnienia = '2' WHERE nick=?");
 $query->bind_param('s', $zmienna7); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
 $zmienna7=$value;
 $query->execute(); // actually perform the query

//UPDATE `users` SET `uprawnienia` = '1' WHERE `users`.`id` = 45;

$query->close();

$query = $conn->prepare("INSERT INTO `mod_log` (`id`, `nick`, `action`, `ip`, `data`) VALUES ('', ?, ?, ?, ?);");
$query->bind_param('ssss', $zmienna1, $zmienna2, $zmienna3, $zmienna4); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
$zmienna1=$_SESSION['nick'];
$zmienna2="BAN_".$value;
$zmienna3=$_SERVER['REMOTE_ADDR'];
$zmienna4=date('Y-m-d H:i:s');
$query->execute(); // actually perform the query
$query->close();
$conn->close();
header("Location: mod/find.php?id=s", true, 301);
//exit();
 ?>
