<?php session_start();
if(!isset($_SESSION['login'])) // 2
	{
header("Location: https://rrtrader.pl/nope.php", true, 301);
exit();
	}

	if($_SESSION['perm']!=5) // 2
	{
header("Location: https://rrtrader.pl/nope.php", true, 301);
exit();
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
	<li style='float:right'><a class='active' href='https://rrtrader.pl/remove_button.php'>Usuń ofertę</a></li>
	<li style='float:right'><a class='active' href='https://rrtrader.pl/dys.php'>Wyloguj</a></li>
	<li style='float:right'><a class='active' href=''>Jesteś zalogowany jako: ".$_SESSION['nick']."</a></li>";

		}
		if(isset($_SESSION['perm']))
		{
			if( $_SESSION['perm']==5)
			{
				echo "<li><a class='active' href='/mod/index.php'>Panel moderatora</a></li>";
			}

		}

	  ?>
	</ul>
</br>
</br>
</br>
</br>
<style>

.info
{
 color:  #cccccc;
}
</style>
<div class="info">
 <strong>Informacje dla moderatorów<br />
   &1 Funkcje panelu<br />
   1.Funkcja "zweryfikuj" ;<br />
   2.Opcja banuj;<br />
   3.Kasowanie ofert<br />
   ps. Wszystkie akcje w panelu są rejestrowane z adresem ip i datą operacji<br />
   <br />
   $2 Weryfikacja [Work in progress]<br />
   1. Po rejestracji każdy użytkownik otrzyma kilkudziesięcio znakowy losowy kod który wyśle moderatorowi w grze.;<br />
   przykładowy kod NNDK5JHV6Kiw7rqYccSi13CDVRcDPrPC <br />
   2. Moderator powinien sprawdzić ten kod w panelu a następnie potwierdzić konto.;<br />
   3. Nick w grze może się minimalnie różnić od tego na stronie (dziwne czcionki ale ta sama litera itp.);<br />
   4. Tagi partyjne są dozwolone w nazwie użytkownika ALE chwilowo nie ma możliwości raz ustawionego nicku;<br />
   5. Chwilowo tylko ja (michalmaniak) ma możliwość odzyskania kodu weryfikacyjnego, jeśli ktoś nie dostanie a w SPAM nie ma to proszę taką osobę oddelegować do mnie;<br />
   <br />
   $3 Ogólne<br />
   1. Każdy moderator otrzyma skrzynkę pocztową w formacie nick@rrtrader.pl (z minimalnymi modyfikacjami jeśli będzie potrzeba);<br />
   2.*Otrzyma  gdy rozwiąże kilka problemów z DKIM (czy jak się to tam nazywa);<br />
   3.Proszę o apolityczność w kwestiach działalności na stronie, łamanie tej reguły będzie karane<br />
   4.Jeśli będą jakieś problemy ze stroną postarama się wysłać informacje na temat tego jak najszybciej<br />


   [Panel cały czas się rozwija]
  </strong></div>
</body>
</html>
