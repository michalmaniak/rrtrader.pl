<?php session_start();
include ("connect.php");
date_default_timezone_set('Europe/Warsaw');
  if(!isset($_SESSION['login'])) // 2
	{
	header("Location: /loguj.php", true, 301);
exit();
	}
  if($_SESSION['perm']==0)
  {
  	header("Location: index.php?result=4", true, 301);
  exit();
  }




include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
	$securimage = new Securimage();
	if ($securimage->check($_POST['captcha_code']) == false) {
header("Location: /send_button.php?result=4", true, 301);
exit();
	}
	else{

		$query = $conn->prepare("SELECT * from oferty WHERE nick=?");
	$query->bind_param('s', $zmienna1xd); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
	$zmienna1xd=$_SESSION['nick'];

	$query->execute();
	$query->store_result();
			$query->fetch();	// actually perform the query
if($query->num_rows >= 1){

header("Location: /send_button.php?result=1", true, 301);
$query->close();
$conn->close();
exit();
}

		$query->close();

		$zmienna1= $_POST['jednostka'];
$zmienna2= $_POST['jednostka2'];
$month=$_POST['month'];
$six_months=$_POST['six_months'];
if($six_months==NULL)
{
	$six_months="BR";
	$zmienna2="AK";
}
if($month==NULL)
{
	$month="BR";
	$zmienna1="AK";
}
$six_months= $six_months.$zmienna2;
$month= $month.$zmienna1;


$query = $conn->prepare("SELECT link_pc,link_mobile from users WHERE nick=?"); // prepate a query
$query->bind_param('s', $zmienna0); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
$zmienna0=$_SESSION['nick'];
$query->execute(); // actually perform the query
$result = $query->get_result(); // retrieve the result so it can be used inside PHP
$r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
$link1=$r['link_pc'];
	$link2=$r['link_mobile'];

	$query = $conn->prepare("INSERT INTO `oferty` (`id`, `id_konta`, `nick`, `remium_msc`, `premium_full`, `link_pc`, `link_mobile`, `data_oferty`) VALUES ('', '123', ?, ?, ?, ?, ?, '')");
	$query->bind_param('sssss', $zmienna1, $zmienna2, $zmienna3, $zmienna4, $zmienna5); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
	$zmienna1=$_SESSION['nick'];
	$zmienna2=$month;
	$zmienna3=$six_months;
	$zmienna4=$link1;
	$zmienna5=$link2;
	$query->execute(); // actually perform the query
		$query->close();

		$query = $conn->prepare("INSERT INTO `oferty_historia` (`id`, `nick`, `cena_1`, `cena_2`, `data`, `ip`) VALUES ('', ?, ?, ?, ?, ?);");
	$query->bind_param('sssss', $zmienna123, $zmienna22, $zmienna32,$zmienna_data,$zmienna_ip); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
	$zmienna123=$_SESSION['nick'];
	$zmienna22=$month;
	$zmienna32=$six_months;
	$zmienna_data=date('Y-m-d H:i:s');
	$zmienna_ip=$_SERVER['REMOTE_ADDR'];
	$query->execute(); // actually perform the query

		$query->close();

		$conn->close();

	header("Location: /send_button.php?result=3", true, 301);
exit();
}


?>
