<?php session_start();
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
?>
<?php
$zmienna=$_POST['subject'];
date_default_timezone_set('Europe/Warsaw');


$sql = 'SELECT * FROM oferty';

$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
$query = $conn->prepare("DELETE FROM oferty WHERE id=?");
$query->bind_param('i', $zmienna021); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
$zmienna021=$zmienna;
$query->execute(); // actually perform the query
$query->close();

$akcja="remove_".$zmienna;

$query = $conn->prepare("INSERT INTO `mod_log` (`id`, `nick`, `action`, `ip`, `data`) VALUES ('', ?, ?, ?, ?);");
$query->bind_param('ssss', $zmienna1, $zmienna2, $zmienna3, $zmienna4); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
$zmienna1=$_SESSION['nick'];
$zmienna2=$akcja;
$zmienna3=$_SERVER['REMOTE_ADDR'];
$zmienna4=date('Y-m-d H:i:s');
$query->execute(); // actually perform the query
$query->close();
header("Location: /mod/offer.php?result=1", true, 301);
$conn->close();
exit();
?>
