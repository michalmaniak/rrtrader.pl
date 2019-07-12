<?php session_start();
if(isset($_SESSION['login'])) // 2
	{
header("Location: https://rrtrader.pl/index.php", true, 301);
exit();
	}

  ?>
  <html>
  <head>
  <title>Strona handlowa polskiego RR</title>
  <link href="style.css" type="text/css" rel="stylesheet" />
  <meta charset="utf-8">
  </head>
  <body>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120122371-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-120122371-1');
  </script>

  <ul>
    <li><a class="active" href="https://rrtrader.pl/index.php">Strona glowna</a></li>
   <li><a class="active" href="https://rrtrader.pl/faq.php">FAQ</a></li>
    <li><a class="active" href="https://rrtrader.pl/contact.php">Kontakt</a></li>


    <?php

    if(!isset($_SESSION['login'])) // 2
    {
      echo "<li style='float:right'><a class='active' href='https://rrtrader.pl/rejestracja.php'>Rejestracja</a></li>";
      echo "<li style='float:right'><a class='active' href='https://rrtrader.pl/loguj.php'>Logowanie</a></li>";
    }
    ?>
  </ul>

<fieldset id="lewy">
  <legend>Odzyskaj hasło</legend>
  <form name="contactform" method="post" action="https://rrtrader.pl/recover/generate.php">

  <label>Adres email:<br />
  <input type="text" name="mail" maxlength="64" required/></label><br />
</br><br />
  <img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" /><br />
    <input type="button" class="button" value="" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false"s>
    Kod CAPTCHA:
    <input type="text" name="captcha_code" size="10" maxlength="8" /><br />

  	 <input type=submit value="Odzyskaj hasło" onclick="clickHandler()"/>
  </script>
  </form>
  </fieldset>
	<?php
	$value = $_GET["result"];

	if($value == 1)
	{
		echo "<script>
		alert('Pomyslnie wysłano link do resetu hasła');
		</script>";

	}
	if($value == 2)
	{
		echo "<script>
alert('BŁĄD: Nie ma  użytkownika o takim adresie email');
		</script>";

	}
	if($value == 3)
	{
		echo "<script>
alert('BŁĄD: zły kod CAPTCHA');
		</script>";

	}?>
