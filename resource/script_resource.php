<?php
session_start();
include ("../connect.php");
date_default_timezone_set('Europe/Warsaw');

$conn = mysqli_connect($servername, $username, $password, $dbname);
   mysqli_set_charset($conn, "utf8");

   $query = $conn->prepare("SELECT link_pc,link_mobile from users WHERE nick=?"); // prepate a query
$query->bind_param('s', $zmienna0); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
$zmienna0=$_SESSION['nick'];
$query->execute(); // actually perform the query
$result = $query->get_result(); // retrieve the result so it can be used inside PHP
$r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
$link1=$r['link_pc'];
	$link2=$r['link_mobile'];
   


if($_POST['oil2']!=NULL)
{
	$oil="Brak";

}
else
{
	 $oil= $_POST['oil'];
}
if($_POST['ore2']!=NULL)
{
	$ore="Brak";

}
else
{
	 $ore= $_POST['ore'];
}

if($_POST['uran2']!=NULL)
{
	$uran="Brak";

}
else
{
	 $uran= $_POST['uran'];
}

if($_POST['diamond2']!=NULL)
{
	$diamond="Brak";

}
else
{
	 $diamond= $_POST['diamond'];
}

if($oil=="Brak" & $ore=="Brak" & $uran=="Brak" & $diamond=="Brak")
{
	  $query = $conn->prepare("DELETE FROM `resources` WHERE `resources`.`nick` = ?");
	  $query->bind_param('s', $_SESSION['nick']);
	  $query->execute();
	  echo "Deleted";
}
else{
			$query = $conn->prepare("SELECT * from `resources` WHERE nick=?");
	$query->bind_param('s', $zmienna1xd); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
	$zmienna1xd=$_SESSION['nick'];

	$query->execute();
	$query->store_result();
			$query->fetch();	// actually perform the query
if($query->num_rows >= 1){
header("Location: https://rrtrader.pl/resource", true, 301);
exit();
}
   $query = $conn->prepare("INSERT INTO `resources` (`id`, `nick`, `oil`, `stone`, `uran`, `diamond`, `link_pc`, `link_mobile`) VALUES ('', ?, ?, ?, ?, ?, ?, ?);"); // prepate a query
$query->bind_param('sssssss', $_SESSION['nick'], $oil, $ore, $uran, $diamond, $link1, $link2); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
$query->execute();
echo "INSERT";
}


?>