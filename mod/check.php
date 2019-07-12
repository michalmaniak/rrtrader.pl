<?php
session_start();
?>
 <?php
 include("connect.php");
 if(!isset($_SESSION['login'])) // 2
 	{
 header("Location: /nope.php", true, 301);
 exit();
 	}

 	if($_SESSION['perm']!=5) // 2
 	{
 header("Location: /nope.php", true, 301);
 exit();
 	}
$value = $_GET["id"];
?>

 <?php if($value!=1)
 {


 $query= $conn->prepare('Select * FROM weryfikacja_konta WHERE kod=?');
$query->bind_param('s', $zmienna7); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
$zmienna7=$value;
$query->execute(); // actually perform the query
$result = $query->get_result(); // retrieve the result so it can be used inside PHP
$r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
$pass_2=$r['nick'];

$query->close();

 $query= $conn->prepare('Select * FROM users WHERE nick=?');
$query->bind_param('s', $zmienna7); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
$zmienna7=$pass_2;
$query->execute(); // actually perform the query
$result = $query->get_result(); // retrieve the result so it can be used inside PHP
$tablica = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
$link1=$tablica['nick'];
$link2=$tablica['link_pc'];
$link3=$tablica['link_mobile'];
if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}}
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

<fieldset>
<legend>Zweryfikuj gracza:</legend>
<form name="contactform" method="post" action="/mod/check_id.php">

<br />

  ID rejestracji:
  <input type="text" name="kod" size="32" maxlength="32" /><br />


	 <input type=submit value="Sprawdź" onclick="clickHandler()"/>

</form>

</fieldset>
<?php


if($value == 1)
{
	echo "<script>
	alert('Pomyślnie zweryfikowano');
	</script>";

}
$conn->close();

echo	"<fieldset>
<legend>Dane podanego gracza:</legend>
Nick: ".$link1."</br>
Link PC: ".$link2."</br>
Link MOBILE: ".$link3."</br>";
if($tablica['uprawnienia']!=0){

echo"Status: Zweryfikowany
</fieldset>";
}
else
	if($value!=NULL or $value!=1)
{
	echo"Status: Nie Zweryfikowany
<form action='check2.php' method='post'>
<input type='hidden' name='nick' value='".$tablica['nick']."'>
<input type='submit' value='Zweryfikuj'>
</form>
</fieldset>";
}


	?>
</body>
</html>
