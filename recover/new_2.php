<?php

 $servername="127.0.0.1";
 $username = "admin_mz2000mz";

$password = "kappa123";

$dbname = "admin_rrtrader";


$code= $_POST['pass1'];
$code2= $_POST['pass2'];




if($code != $code2)
{
	header("Location: new.php?id=6", true, 301);
exit();
}

$options = [

    'cost' => 11,

    'ASGARD' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),

];

$hash = password_hash($code, PASSWORD_BCRYPT, $options);



$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");
 $query= $conn->prepare('Select * FROM password_recover WHERE kod=?');
            $query->bind_param('s', $zmienna7); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
            $zmienna7=$_POST['kod'];
            $query->execute(); // actually perform the query
            $result = $query->get_result(); // retrieve the result so it can be used inside PHP
            $r = $result->fetch_array(MYSQLI_ASSOC); // bind the dat


 $query= $conn->prepare('UPDATE `users` SET `password` = ? WHERE `users`.`email` = ?;');
            $query->bind_param("ss",$zmienna211, $zmienna_xd);
			$zmienna211=$hash;
      $zmienna_xd=$r['email'];
            $query->execute();

            $query = $conn->prepare("DELETE FROM password_recover WHERE kod=?");
            $query->bind_param('s', $zmienna021); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
            $zmienna021=$_POST['kod'];
            $query->execute(); // actually perform the query
            $query->close();

header("Location: https://rrtrader.pl/recover/new.php?id=1", true, 301);
$conn->close();
exit();


?>
