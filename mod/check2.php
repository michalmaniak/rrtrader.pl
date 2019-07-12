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

 $value=$_POST['username'];
 $dbname = "admin_rrtrader";
 $value= $_POST['nick'];


  $query= $conn->prepare("UPDATE users SET uprawnienia = '1' WHERE nick=?");
 $query->bind_param('s', $zmienna7); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
 $zmienna7=$value;
 $query->execute(); // actually perform the query

//UPDATE `users` SET `uprawnienia` = '1' WHERE `users`.`id` = 45;
$query->close();
header("Location: /mod/check.php?id=1", true, 301);
exit();
 ?>
