<?php session_start(); ?>
<html>
<head>
<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="2023785e-de8b-4c75-99e1-b7d7e6e663ad" type="text/javascript" async></script>
<title>Strona handlowa polskiego RR</title>
<link href="style.css" type="text/css" rel="stylesheet" />
 <script src="script.js"></script>
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

<form name="contactform" method="post" action="/send.php">
<fieldset>
<legend>Kontakt z administratorem</legend>
<label> Nazwa użytkownika RR:<br />
<input type="text" name="username" maxlength="32" required/></label><br />

<label> Adres email:<br />
 <input type="email" name="mail" maxlength="32" /></label><br />

 <label> Wybierz kategorię:<br />

<input type="radio" name="category" value="sugestion"/> Sugestia
<input type="radio" name="category" value="cheater"/> Zgłoś oszustwo
<input type="radio" name="category" value="inne" checked="checked"/> Inne <br />


  <label><br /><textarea placeholder="Treść wiadomości..." name="message" cols="30" rows="4" required></textarea></label><br />
  <img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" /><br />
  <input type="button" class="button" value="" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false"s>
  Kod CAPTCHA:
  <input type="text" name="captcha_code" size="10" maxlength="6" /><br />
	 <input type=submit value="Wyślij"/>



</fieldset>
</form>
</div>
<div id="prawy"><fieldset>
<legend>Moderacja</legend>
<strong>Oto lista moderacji strony w przypadku chęci kontaktu z konkretną osobą:</strong></br>
</br>
michalmaniak -Właściciel i twórca serwisu dev.rrtrader.tk, Profil w grze <a style="color: #ffffff;" href="http://rivalregions.com/#slide/profile/1603317427188492">[PC]</a><a style="color: #ffffff;" href="http://m.rivalregions.com/#slide/profile/1603317427188492">[MOBILE]</a> Adres służbowy admin@dev.rrtrader.tk;</br>
</br>
BLACK HOOD -Moderator strony, Profil w grze <a style="color: #ffffff;" href="http://rivalregions.com/#slide/profile/147201875">[PC]</a><a style="color: #ffffff;" href="http://m.rivalregions.com/#slide/profile/147201875">[MOBILE]</a> Adres służbowy BRAK;</br>
</br>Spartacus -Moderator strony, Profil w grze <a style="color: #ffffff;" href="http://rivalregions.com/#slide/profile/2000277624">[PC]</a><a style="color: #ffffff;" href="http://m.rivalregions.com/#slide/profile/2000277624">[MOBILE]</a> Adres służbowy BRAK;</br>
</br>Książę Ciemności -Moderator stronyl, Profil w grze <a style="color: #ffffff;" href="http://rivalregions.com/#slide/profile/198671568421909">[PC]</a><a style="color: #ffffff;" href="http://m.rivalregions.com/#slide/profile/198671568421909">[MOBILE]</a> Adres służbowy BRAK;</br>
</br>Generał Antoni Macierewicz -Moderator strony, Profil w grze <a style="color: #ffffff;" href="http://rivalregions.com/#slide/profile/356146419011436?1529329">[PC]</a><a style="color: #ffffff;" href="http://m.rivalregions.com/#slide/profile/356146419011436?1529329">[MOBILE]</a> Adres służbowy BRAK;</br>
</br>Adelut -Moderator strony, Profil w grze <a style="color: #ffffff;" href="http://rivalregions.com/#slide/profile/2000515778">[PC]</a><a style="color: #ffffff;" href="http://m.rivalregions.com/#slide/profile/2000515778">[MOBILE]</a> Adres służbowy adelut@dev.rrtrader.tk;</br>
</fieldset></div>
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
