<?php session_start();
include ("connect.php");

 $query= $conn->prepare("INSERT INTO `oceny` (`id`, `nick`, `ocena`, `WhoGave`) VALUES ('', ?, ?, ?);");
            $query->bind_param("sis",$_POST['voted'], $_POST['nazwa'], $_SESSION['nick']);
            $query->execute();
			
	header("Location: /index.php", true, 301);
exit();
?>