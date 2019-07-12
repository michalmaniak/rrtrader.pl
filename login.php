<?php session_start();
include ("connect.php");
date_default_timezone_set('Europe/Warsaw');
include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
	$securimage = new Securimage();
	if ($securimage->check($_POST['captcha_code']) == false) {
header("Location: /send_button.php?result=4", true, 301);
exit();
	}
	else{

	$user = $_POST['username'];
$password = $_POST['code'];


 $query= $conn->prepare('Select nick FROM users WHERE nick=?');
            $query->bind_param("s",$zmienna10);
			$zmienna10=$user;
            $query->execute();
			$query->store_result();
			$nick_check="";
			$query->bind_result($nick);
			$query->fetch();

if($query->num_rows == 0){
	$conn->close();
	header("Location: /loguj.php?result=1", true, 301);
$query->close();
exit();
} else {
	$query->close();
	$query = $conn->prepare("SELECT * from users WHERE nick=?"); // prepate a query
$query->bind_param('s', $zmienna7); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
$zmienna7=$user;
$query->execute(); // actually perform the query
$result = $query->get_result(); // retrieve the result so it can be used inside PHP
$r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
$pass_2=$r['password'];
if (password_verify($password, $pass_2)) {
 $_SESSION['perm'] = $r['uprawnienia'];
 $_SESSION['login'] = 1;
  $_SESSION['nick'] = $user;

	$query->close();

	$query = $conn->prepare("INSERT INTO `log_1` (`id`, `nick`, `czynność`, `data`, `ip`, `urządzenie`) VALUES ('', ?, 'loguj', ?, ?, '');"); // prepate a query
$query->bind_param('sss', $zmienna_nick, $zmienna_data, $zmienna_ip);
$zmienna_nick=$user; // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
$zmienna_data=date('Y-m-d H:i:s');
$zmienna_ip=$_SERVER['REMOTE_ADDR'];
$query->execute(); // actually perform the query

$conn->close();
	header("Location: /index.php", true, 301);
exit();
} else {
	$query->close();
$conn->close();
	header("Location: /loguj.php?result=2", true, 301);
exit();
}
}

$conn->close();

	}

?>
