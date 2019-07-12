<?php
$zmienna1 = $_POST['kod'];
	header("Location: /mod/check.php?id=".$zmienna1, true, 301);
exit();
?>
