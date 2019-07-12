r.pl<?php session_start();
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
<html>
<head>
<title>Strona handlowa polskiego RR</title>
<link href="style.css" type="text/css" rel="stylesheet" />
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120122371-1"></script>
<meta charset="utf-8">
</head>
<body>
	<ul>
	  <li><a class="active" href="/index.php">Strona glowna</a></li>
	 <li><a class="active" href="/faq.html">FAQ</a></li>
	  <li><a class="active" href="/contact.php">Kontakt</a></li>
	  <?php
	  if(isset($_SESSION['login'])) // 2
		{
	echo "<li class=\"dropdown\" style='float:right'>
	    <a href=\"javascript:void(0)\" class=\"dropbtn\">Dodaj ofertę</a>
	    <div class=\"dropdown-content\">
	      <a href=\"/send_button.php\">Premium</a>
	      <a href=\"/send_gold.php\">Złoto</a> <a href=\"/send_resource.php\">Surowce</a> 

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
	</ul><br />

<fieldset id="lewy">
<legend>Dodaj ofertę:</legend>
<form name="contactform" method="post" action="/send3.php">


<label>Cena za miesiąc premium</br>
<input type="number" name="month" ></label><select name="jednostka"><option value="kkk">kkk</option><option value="kkkk">kkkk</option></select></br>
</br>

<label>Cena za 6 miesięcy premium</br>
<input type="number" name="six_months" ></label><select name="jednostka2"><option value="kkk">kkk</option><option value="kkkk">kkkk</option></select></br>
<br />
<img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" /><br />
  <input type="button" class="button" value="" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false"s>
  Kod CAPTCHA:
  <input type="text" name="captcha_code" size="10" maxlength="12" /><br />


	 <input type=submit value="Dodaj ofertę" onclick="clickHandler()"/>






</br>*Jeśli nie sprzedajesz premium na dany okres czasu zostaw puste pole
</form>
</fieldset>
<?php
$value = $_GET["result"];

if($value == 1)
{
	echo "<script>
	alert('BŁĄD: Usuń aktualną ofertę');
	</script>";

}
else if($value == 2 )
{
		echo "<script>
	alert('BŁĄD: złe  hasło');
		</script>";
}
else if($value == 3)
{
			echo "<script>
	alert('Pomyślnie dodano ofertę');
			</script>";
}
else if($value == 4)
{
			echo "<script>
	alert('BŁĄD: zły kod CAPTCHA');
			</script>";
}
?>

</body>
</html>
