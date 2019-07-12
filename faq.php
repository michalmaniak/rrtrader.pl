<?php session_start()?>
<html>
<head>
<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="2023785e-de8b-4c75-99e1-b7d7e6e663ad" type="text/javascript" async></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120122371-1"></script>
<title>Strona handlowa polskiego RR</title>
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
  </ul>
<fieldset><strong>Czy jest to strona powiązana z twórcami Rival Regions?</strong><br />Nie, jest to amatorski projekt. Moderatorzy strony NIE SĄ moderatorami RR.</fieldset><br />
<fieldset><strong>Chciałbym zmienić nick na stronie</strong><br />Skontaktuj się z moderatorem i on ci wyjaśni co należy zrobić</fieldset><br />
<fieldset><strong>Co to kod weryfikacyjny i jak go wykorzystać?</strong><br />Jest to kod wygenerowany dla użytkownika podczas rejestracji. Należy go wysłać do moderatora poprzez wiadomość prywatną w grze w celu weryfikacji konta.</fieldset><br />
<fieldset><strong>Czy korzystanie z serwisu jest darmowe?</strong><br />Tak</fieldset><br />
<fieldset><strong>Do czego służy ta strona?</strong><br />Strona umożliwia wystawianie ofert premium oraz złota w Rival Regions za walutę zdobywaną w grze.</fieldset><br />
<fieldset><strong>Kim jest middleman?</strong><br />Jest to osoba pośrednicząca w wymianie. Środki na zakup należy wysyłać do tej osoby. Po zaksięgowaniu wpłaty poinformuje sprzedawcę a ten przekaże zamówione towary. Jest to najlepsza metoda zapobiegania oszustw.</fieldset><br />-->
<fieldset><strong>Zostałem oszukany. Co teraz?</strong><br />Staramy się jak najlepiej eliminować oszustów. Jeśli zostałeś oszukany zgłoś sprawę przez formularz kontaktowy na stronie. Zastrzegamy sobie prawo do zignorowania zgłoszenia jeśli nie jest możliwa weryfikacja (płatność przelewem/ kluczami Steam itp.)</fieldset>
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
