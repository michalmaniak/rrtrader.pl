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


 $link= $_POST['link'];
 $findme   = 'm.';

 $pos = strpos($link, $findme);

 if ($pos != true) {
 $pc=$link;
 } else {
 $pc=str_replace("m.rival","rival",$link);
 }

 $value= $_POST['nick'];


  $query= $conn->prepare("SELECT * FROM users WHERE link_pc=?");
 $query->bind_param('s', $zmienna7); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
 $zmienna7=$pc;
 $query->execute();
 $result = $query->get_result(); // retrieve the result so it can be used inside PHP
 $r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
 $pass_2=$r['id']; // actually perform the query

//UPDATE `users` SET `uprawnienia` = '1' WHERE `users`.`id` = 45;

header("Location: /mod/find.php?id=".$pass_2, true, 301);
$query->close();

$conn->close();
exit();
 ?>
