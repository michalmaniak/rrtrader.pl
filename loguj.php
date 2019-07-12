<?php session_start();
if(isset($_SESSION['login'])) // 2
	{
header("Location: /index.php", true, 301);
exit();
	}
?>

<html>
<head>
<title> Strona handlowa polskiego RR</title>
<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="2023785e-de8b-4c75-99e1-b7d7e6e663ad" type="text/javascript" async></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<legend>Zaloguj się:</legend>
<form name="contactform" method="post" action="/login.php">

<label>Login do strony:<br />
<input type="text" name="username" maxlength="32" required/></label><br />

<label>Hasło:<br />
<input type="password" name="code" maxlength="32" required/></label><br />

<br />
<img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" /><br />
  <input type="button" class="button" value="" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false"s>
  Kod CAPTCHA:
  <input type="text" name="captcha_code" size="10" maxlength="12" /><br />


	 <input type=submit value="Zaloguj się" onclick="clickHandler()"/></br>
<a style="	color: #ffffff" href='/recover'>Zapomniałem hasła</a>
<?php
$value = $_GET["result"];

if($value == 1)
{
	echo "<script>
	alert('BŁĄD: Taki nick nie istnieje');
	</script>";

}
else if($value == 2 )
{
		echo "<script>
	alert('BŁĄD: złe  hasło');
		</script>";
}
else if($value == 4)
{
			echo "<script>
	alert('BŁĄD: zły kod CAPTCHA');
			</script>";
}
else if($value == 5)
{
			echo "<script>
	alert('BŁĄD: Zaloguj aby kontynuować');
			</script>";
}
?>
</form>
</fieldset>
</br>
</br>
</br>
</br>
<style>
.footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: rgb(86, 86, 86)
    color: white;
    text-align: center;
}
.ds
{
height: 1cm;
}

.rodo
{
	color: #ffffff;
	float:left;
}
</style>

<div class="footer">
<a class="rodo" href="rodo.html">Polityka Prywatności</a>
<a href="http://rivalregions.com/#newspaper/show/130868"><img style="float:right" class="ds" src="https://i.imgur.com/QSexIhM.png" alt="Mountain View"></a>
<a href="https://discord.gg/495mjEv"><img style="float:right" class="ds" src="discord.png" alt="Mountain View"></a>
</div>
</body>
</html>
