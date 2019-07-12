<?php session_start();
 $servername="";
 $username = "";
$password = "";
$dbname = "";
$conn = mysqli_connect($servername, $username, $password, $dbname);
      mysqli_set_charset($conn, "utf8");
	  $conn2 = mysqli_connect($servername, $username, $password, $dbname);
      mysqli_set_charset($conn2, "utf8");
?>