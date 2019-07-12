<?php
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 32; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

/*
 $zawartosc_email ="Dziękujemy za rejestrację w serwisie, poniżej znajduje się kod weryfikacyjny. Prosimy o wysłanie go jednemu z moderatorów poprzez wiadmość prywatną w grze, po weryfikacji konto zostanie w pełni aktywowane."."<BR>"."<BR>".
$randomString."<BR>".
"Listę moderatorów znajdziesz na naszej stronie"."<BR>".
"<BR>".
"Wiadomość wygenerowana automatycznie, proszę nie odpowidać,"."<BR>"
."Administracja rrtrader.pl";
 	$temat= "rrtrader.pl, rejestracja użytkownika";
    $adres_do = $mail;
    $adres_od = "admin@rrtrader.pl";

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'From: '.$adres_od.''."\r\n".
	'Reply-To: admin@rrtrader.pl';

    mail($adres_do,$temat,$zawartosc_email,$headers);

//header("Location: /rejestracja.php?result=3", true, 301);*/
echo "Wyślij moderatorowi strony podany kod: </br>";
echo $randomString;
echo "</br>";
echo " Nie zobaczysz tego kodu ponownie";
?>