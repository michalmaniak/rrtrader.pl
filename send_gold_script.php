.<?php
 session_start();
 ?>
<?php
include ("connect.php");
if(!isset($_SESSION['login'])) // 2
	{
header("Location: /loguj.php", true, 301);
exit();
	}
		if($_SESSION['perm']==0)
{
	header("Location: /index.php?result=4", true, 301);
exit();
}
if($_SESSION['perm']==2)
{
header("Location: /index.php?result=3", true, 301);
exit();
}
?>
<?php
	include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
	$securimage = new Securimage();
	if ($securimage->check($_POST['captcha_code']) == false) {
header("Location: /send_gold.php?result=4", true, 301);
exit();
	}
	else{

		$query = $conn->prepare("SELECT * FROM oferty_gold  WHERE seller=?");
	$query->bind_param('s', $zmienna1xd); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
	$zmienna1xd=$_SESSION['nick'];

	$query->execute();
	$query->store_result();
			$query->fetch();	// actually perform the query
if($query->num_rows >= 1){

header("Location: /send_gold.php?result=1", true, 301);
$query->close();
$conn->close();
exit();
}

		$query->close();



$basic=$_POST['basic'];
strip_tags($basic);

$full =$_POST['full'];
if(substr_count($full, '[line]')>100)
{
	header("Location: /send_gold.php?result=2", true, 301);


}
if(substr_count($basic, '[line]')>20)
{
	header("Location: /send_gold.php?result=2", true, 301);


}
strip_tags($full);
$full=str_replace("[line]","</br>",$full);
$full=str_replace("[b]","<strong>",$full);
$full=str_replace("[/b]","</strong>",$full);
$full=str_replace("[center]","<center>",$full);
$full=str_replace("[/center]","</center>",$full);

$query = $conn->prepare("SELECT link_pc,link_mobile from users WHERE nick=?"); // prepate a query
$query->bind_param('s', $zmienna0); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
$zmienna0=$_SESSION['nick'];
$query->execute(); // actually perform the query
$result = $query->get_result(); // retrieve the result so it can be used inside PHP
$r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
$link1=$r['link_pc'];
	$link2=$r['link_mobile'];
		$query->close();

				$query = $conn->prepare("INSERT INTO `oferty_historia_gold` (`id`, `nick`, `basic`, `full`, `date`, `ip`) VALUES ('', ?, ?, ?, ?, ?);");
	$query->bind_param('sssss', $zmienna123, $zmienna22, $zmienna32,$zmienna_data,$zmienna_ip); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
	$zmienna123=$_SESSION['nick'];
	$zmienna22=$basic;
	$zmienna32=$full;
	$zmienna_data=date('Y-m-d H:i:s');
	$zmienna_ip=$_SERVER['REMOTE_ADDR'];
	$query->execute(); // actually perform the query

		$query->close();


	$query = $conn->prepare("INSERT INTO `oferty_gold` (`id`, `seller`, `basic_desc`, `full_desc`, `link_pc`, `link_mobile`) VALUES ('', ?, ?, ?, ?, ?)");
	$query->bind_param('sssss', $zmienna1, $zmienna2, $zmienna3, $zmienna4, $zmienna5); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
	$zmienna1=$_SESSION['nick'];
$zmienna2= $basic;
$zmienna3= $full;
	$zmienna4=$link1;
	$zmienna5=$link2;
	$query->execute(); // actually perform the query
		$query->close();

		$conn->close();

	header("Location: /send_gold.php?result=3", true, 301);

}?>
