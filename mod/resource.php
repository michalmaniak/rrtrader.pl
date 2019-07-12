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


$sql = 'SELECT * FROM resources';

$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<html>
<head>

<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="2023785e-de8b-4c75-99e1-b7d7e6e663ad" type="text/javascript" async></script>
<link href="style.css" type="text/css" rel="stylesheet" />
<meta charset="utf-8">
</head>
<body>
	<ul>
	  <li><a class="active" href="/index.php">Strona glowna</a></li>
	 <li><a class="active" href="/faq.php">FAQ</a></li>
	  <li><a class="active" href="/contact.php">Kontakt</a></li>


	  <?php
	  if(isset($_SESSION['login'])) // 2
		{
	echo "<li class=\"dropdown\" style='float:right'>
	    <a href=\"javascript:void(0)\" class=\"dropbtn\">Dodaj ofertę</a>
	    <div class=\"dropdown-content\">
	      <a href=\"/send_button.php\">Premium</a>
	      <a href=\"/send_gold.php\">Złoto</a>

	    </div>
	  </li>
	<li style='float:right'><a class='active' href='/remove_button.php'>Usuń ofertę</a></li>
	<li style='float:right'><a class='active' href='/dys.php'>Wyloguj</a></li>
	<li style='float:right'><a class='active' href=''>Jesteś zalogowany jako: ".$_SESSION['nick']."</a></li>";

		}
		if(isset($_SESSION['perm']))
		{
			if( $_SESSION['perm']==5)
			{
				echo "<li><a class='active' href='/mod/index.php'>Panel moderatora</a></li>";
			}

		}
	  if(!isset($_SESSION['login'])) // 2
		{
			echo "<li style='float:right'><a class='active' href='/rejestracja.php'>Rejestracja</a></li>";
			echo "<li style='float:right'><a class='active' href='/loguj.php'>Logowanie</a></li>";
		}
	  ?>
	</ul>

  <center><table></center>
<tr>
<th><button onclick="myFunction()">Moderuj oferty</button></th>
<form method="post" action="/mod/remove2.php">
<th>Nazwa Uzytkownika</th>
<th>Ropa</th>
<th>Minerały</th>
<th>Uran</th>
<th>Diamenty</th>
<th colspan="2">Kontakt</th>

</tr>
  <?php


  while ($row = mysqli_fetch_array($query))
  {?>

	<?php echo "<td><button class='remove'style='display: none;'  name='subject' type='submit' value=".$row['id'].">Skasuj</button></td>";?>
	   <td align="center"><?php echo $row['nick'];  //row id ?></td>
    <td align="center"><?php echo $row['oil']; // row first name ?></td>
	<td align="center"><?php echo $row['stone']; // row first name ?></td>
	    <td align="center"><?php echo $row['uran']; // row first name ?></td>
	<td align="center"><?php echo $row['diamond']; // row first name ?></td>
	<td align="center"><?php echo '<a href="'.$row['link_pc'].'">[PC]</a>';  //row id ?></td>
	<td align="center"><?php echo '<a href="'.$row['link_mobile'].'">[MOBILE]</a>';  //row id ?></td>
    </tr>
  <?php


  }?>
	<script>

	function myFunction() {
    var x = document.getElementsByClassName("remove");
		var y = x.length;
		for (let i=0; i<=y; i++) {
   if (x[i].style.display === "none") {
       x[i].style.display = "block";
   } else {
        x[i].style.display = "none";
    }

}
}
	</script>
    <?php
$value = $_GET["result"];

if($value == 1)
{
	echo "<script>
	alert('Pomyślnie usunięto');
	</script>";

}
?>
  </form
</ul><br />
</html>
