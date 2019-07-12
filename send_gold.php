<?php session_start();
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
<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="2023785e-de8b-4c75-99e1-b7d7e6e663ad" type="text/javascript" async></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120122371-1"></script>
<title>Strona handlowa polskiego RR</title>
<link href="style.css" type="text/css" rel="stylesheet" />
 <script src="script.js"></script>
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

<?php
$value = $_GET["result"];

if($value == 1)
{
			echo "<script>
	alert('BŁĄD: zły kod CAPTCHA');
			</script>";
}
if($value == 2)
{
			echo "<script>
	alert('Pomyślnie wysłano');
			</script>";
}
?>
<div id="lewy">
<fieldset>
<legend>Sprzedaj złoto</legend>
<form name="contactform" method="post" action="/send_gold_script.php">

<label> Wstępny opis:<br />
<input type="text" name="basic" maxlength="20" placeholder="do 20 znaków" ></label><br />

<br /><textarea  placeholder="Pełny opis...(do 200 znaków)" onfocus="clearContents(this);" name="full" cols="30" rows="4" required></textarea></label><br />
  <img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" /><br />
  <input type="button" class="button" value="" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false"s>
  Kod CAPTCHA:
  <input type="text" name="captcha_code" size="10" maxlength="6" /><br />
	 <input type=submit value="Wyślij"/>

</script>
</form>
</fieldset>
</div>

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
	alert('BŁĄD: Za długi opis');
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
<div class="footer">
<a class="rodo" href="rodo.html">Polityka Prywatności</a>
<a href="http://rivalregions.com/#newspaper/show/130868"><img style="float:right" class="ds" src="https://i.imgur.com/QSexIhM.png" alt="Mountain View"></a>
<a href="https://discord.gg/495mjEv"><img style="float:right" class="ds" src="discord.png" alt="Mountain View"></a>
</div>
</body>
</html>
