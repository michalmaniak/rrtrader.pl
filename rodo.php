<?php session_start();?>
<html>
<head>
<title>Strona handlowa polskiego RR</title>
<link href="style.css" type="text/css" rel="stylesheet" />
<meta charset="utf-8">
</head>
<body>
 
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120122371-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-120122371-1');
</script>

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
 <style>

.gdpr
{
	color:  #cccccc;
}
</style>
<div class="gdpr">
 <strong>Polityka prywatności<br />

    Administratorem danych jest Michał Zieliński adres email: michalmaniak@dev.rrtrader.tk Ochrona danych odbywa się zgodnie z wymogami powszechnie obowiązujących przepisów prawa, a ich przechowywanie ma miejsce na zabezpieczonym serwerze.<br />

    Dla interpretacji terminów stosuje się słowniczek podany poniżej:<br />
<br />
   „Użytkownik” /„Ty”- Osoba korzystająca z serwisu<br />
   „Administrator” – Właściciel serwisu.<br />
  „RODO”- Rozporządzenie Parlamentu Europejskiego i Rady (UE) 2016/679 z dnia 27 kwietnia 2016 r. w sprawie ochrony osób fizycznych w związku z przetwarzaniem danych osobowych i w sprawie swobodnego przepływu takich danych oraz uchylenia dyrektywy 95/46/WE.<br />
 <br />
 W celu bezpieczeństwa danych stosuję szyfrowanie SSL.<br />
 <br />
   Dane osobowe są niedostępne dla osób postronnych. Wyjątek stanowią dane udostępnione za zgodą użytkownika w celu wystawienia ogłoszenia (nick oraz link do profilu w dwóch wariantach)<br />


<br />
  Dane które posiadam:<br />
	-Nazwa konta RR;<br />
	-Zaszyfrowane hasło do konta niemożliwe do odczytania;<br />
	-Link do profilu w grze w wariancie PC/MOBILE;<br />
	-Adres email;<br />
	<br />

	Skąd posiadam te dane?<br />
	Dane zostały pozyskane w momencie rejestracji w serwisie dev.rrtrader.tk<br />
	<br />
	Jakie przysługują Ci prawa?<br />
	<br />
	Usunięcie/ poprawa/ przeniesienie danych na prośbę osoby której dane są przetwarzane;<br />
    Zastrzegam sobie prawo do przetwarzania Twoich danych po rozwiązaniu Umowy lub cofnięciu zgody tylko w zakresie na potrzeby dochodzenia ewentualnych roszczeń przed sądem lub jeżeli przepisy krajowe albo unijne bądź prawa międzynarodowego obligują mnie do retencji danych.<br />
    Usługodawca ma prawo udostępniać dane osobowe Użytkownika oraz innych jego danych podmiotom upoważnionym na podstawie właściwych przepisów prawa (np. organom ścigania).<br />
    Usunięcie danych osobowych może nastąpić na skutek cofnięcia zgody bądź wniesienia prawnie dopuszczalnego sprzeciwu na przetwarzanie danych osobowych.<br />
    Usługodawca nie udostępniania danych osobowych innym podmiotom aniżeli upoważnionym na podstawie właściwych przepisów prawa.<br />
    Dane osobowe przetwarzają osoby wyłącznie upoważnione przeze mnie albo przetwarzający, z którymi ściśle współpracuję.<br />
<br />
Pliki cookies<br />

1. Witryna rrtrader używa cookies. Są to niewielkie pliki tekstowe wysyłane przez serwer www i przechowywane przez oprogramowanie komputera przeglądarki. Kiedy przeglądarka ponownie połączy się ze stroną, witryna rozpoznaje rodzaj urządzenia, z którego łączy się użytkownik. Parametry pozwalają na odczytanie informacji w nich zawartych jedynie serwerowi, który je utworzył. Cookies ułatwiają więc korzystanie z wcześniej odwiedzonych witryn. Wśród osób które napiszą "okoń" w komentarzu wylosuję jedną która dostanie 100kkk<br />

Gromadzone informacje dotyczą adresu IP, typu wykorzystywanej przeglądarki, języka, rodzaju systemu operacyjnego, dostawcy usług internetowych, informacji o czasie i dacie, lokalizacji oraz informacji przesyłanych do witryny za pośrednictwem formularza kontaktowego.<br />

2. Zebrane dane służą do monitorowania i sprawdzenia, w jaki sposób użytkownicy korzystają z witryny, aby usprawniać funkcjonowanie serwisu zapewniając bardziej efektywną i bezproblemową nawigację. Monitorowania informacji o użytkownikach dokonuję korzystając z narzędzia Google Analitics, które rejestruje zachowanie użytkownika na stronie.<br />

Cookies identyfikuje użytkownika, co pozwala na dopasowanie treści witryny, z której korzysta, do jego potrzeb. Zapamiętując jego preferencje, umożliwia odpowiednie dopasowanie skierowanych do niego reklam. Stosuję pliki cookies, aby zagwarantować najwyższy standard wygody serwisu, a zebrane dane są wykorzystywane jedynie wewnątrz serwisu w celu optymalizacji działań.<br />

3.  Na mojej witrynie wykorzystuję następujące pliki cookies :<br />

a) „niezbędne” pliki cookies, umożliwiające korzystanie z usług dostępnych w ramach serwisu, np. uwierzytelniające pliki cookies wykorzystywane do usług wymagających uwierzytelniania w ramach serwisu;<br />

b) "preferencyjne" pliki cookies, umożliwiają stronie zapamiętanie informacji, które zmieniają wygląd lub funkcjonowanie strony, np. preferowany język lub region, w którym znajduje się użytkownik. [Obecnie niestosowane]<br />

c) „statystyczne” pliki cookies, używane w celu pozyskania informacji o działaniu strony, dzięki nim możemy wykryć błędy i szykować nowe aktualizacje<br />


4. Użytkownik w każdej chwili ma możliwość wyłączenia lub przywrócenia opcji gromadzenia cookies poprzez zmianę ustawień w przeglądarce internetowej. Instrukcja zarządzania plikami cookies jest dostępna na stronie<br />

http://www.allaboutcookies.org/manage-cookies<br />
<br />
Komu udostępniam dane?<br />
	-Google, usługa google analitics;<br />
	-Nazwa.pl, firma hostingowa do której należy wykorzystywany serwer. Oprócz magazynowania danych wykonuje kopie zapasowe;<br />
	W obu przypadkach udostępniane dane są szczątkowe i podane podmioty nie mają pełnego wglądu.<br />
	<br />
Rejestrując się wyrażasz zgodę na podaną politykę prywatności!

  </strong></div>
</html>
