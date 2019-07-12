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
<?php
$value = $_GET["result"];

if($value == 1)
{
	echo "<script>
	alert('BŁĄD: taki nick już istnieje');
	</script>";

}
else if($value == 2 )
{
		echo "<script>
	alert('BŁĄD: taki email już istnieje');
		</script>";
}
else if($value == 3)
{
			echo "<script>
	alert('SUKCES: Pomyślnie zarejestrowano.');
			</script>";
}
else if($value == 4)
{
			echo "<script>
	alert('BŁĄD: zły kod CAPTCHA');
			</script>";
}

else if($value == 7)
{
			echo "<script>
	alert('BŁĄD: Niezydentyfikowany błąd formularza');
			</script>";
}
else if($value == 6)
{
			echo "<script>
	alert('BŁĄD: Hasła się nie zgadzają');
			</script>";
}
?>
<div id="lewy">
<fieldset>
<legend>Rejestracja w serwisie</legend>
<form name="contactform" method="post" action="/send2.php">

<label>Nick z RR:<br />
<input type="text" name="username" maxlength="32" required/></label><br />

<label>Link do profilu (z http/https):<br />
<input type="url" name="link" maxlength="64" required/></label><br />

<label>Hasło:<br />
<input type="password" name="code" maxlength="32" required/></label><br />

<label>Potwierdź hasło:<br />
<input type="password" name="code2" maxlength="32" required/></label><br />

<label> Adres email:<br />
<input type="email" name="mail" maxlength="32" required/></label><br /><br />
<img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" /><br />
  <input type="button" class="button" value="" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false"s>
  Kod CAPTCHA:
  <input type="text" name="captcha_code" size="10" maxlength="12" /><br />
<input type="checkbox" name="regulamin" value="regulamin_true" required />  <label> Potwierdzam przeczytanie regulaminu<br />

	 <input type=submit value="Zarejestruj" onclick="clickHandler()"/>
</script>
</form>
</fieldset>
</div>

 <div id="prawy"><fieldset>
<legend>Regulamin</legend>
<center><strong>$1 Rejestracja</strong></center>
1. Należy podać taki sam nick jaki posiada się w RR. Po za drobnymi wyjątkami:</br>
&nbsp&nbsp&nbsp a) Dopuszczone są inne znaki o tej samej wartości językowej (dziwne czcionki) etc.);</br>
&nbsp&nbsp&nbsp b) Tagi partyjne są dopuszczone ale niezalecane;</br>
&nbsp&nbsp&nbsp c) Zabronione jest używanie symboli w nicku po za tymi dostępnymi w standardowych klawiaturach z układem qwerty;(wyjątek podpunkt a)</br>
2. Należy podać prawidłowy adres email ponieważ jest on potrzebny do weryfikacji konta oraz do opcjonalnego odzyskiwania hasła.</br>
3. Multi konta są dozwolone dopóki każde z nich jest zweryfikowane.</br>
</br>
</br>
<center><strong>$2 Dodawanie/Usuwanie ofert</strong></center>
1. Każdy gracz może wystawić 1 (jedną) ofertę. </br>
2. W przypadku chęci aktualizacji oferty należy ją usunąć i dodać ponownie z nowymi cenami.</br>
3. Sprzedawanie premium po wyższej cenie niż na stronie jest niedozwolome.</br>
4. W przypadku zaprzestania sprzedaży należy usunąć ofertę, niestosowanie się do tej zasady będzie skutkować usunięciem oferty.</br>
</br>
</br>
<center><strong>$3 Weryfikacja konta</strong></center>
Po rejestracji domyślnie każdy użytkownik nie może wystawić oferty. Aby zdjąć to ograniczenie należy wysłać specjalny kod który się otrzymało po rejestracji na skrzynkę pocztową w prywatnej wiadomości do moderatora strony.</br>
Lista moderatów jest dostępna pod tym adresem: <a href="contact.php">[KLIK]</a>;
</br>
</br>
<center><strong>$4 Tabela kar</strong></center>
1. Usunięcie oferty.</br>
2. Czasowa/Pernamentna blokada kontaktowy.</br>
Czas kary jest współmierny do przewinienia.</br>
Istnieje możliwość odwołania się od kary poprzez formularz kontakowy. Zastrzegamy jednak prawo do zignorowania wiadomości.</br>

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
