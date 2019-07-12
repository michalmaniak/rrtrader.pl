<?php session_start();
if(isset($_SESSION['login'])) // 2
	{
header("Location: /index.php", true, 301);
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
    <li><a class="active" href="index.php">Strona glowna</a></li>
   <li><a class="active" href="faq.php">FAQ</a></li>
    <li><a class="active" href="contact.php">Kontakt</a></li>


    <?php

    if(!isset($_SESSION['login'])) // 2
  	{
  		echo "<li style='float:right'><a class='active' href='/rejestracja.php'>Rejestracja</a></li>";
  		echo "<li style='float:right'><a class='active' href='/loguj.php'>Logowanie</a></li>";
  	}
    ?>
  </ul><br />
<?php
$value = $_GET["id"];
if($value==NULL)
{
  header("Location: /recover", true, 301);
  exit();
}

?>
<fieldset id="lewy">
<legend>Zmień hasło</legend>
<form name="contactform" method="post" action="/recover/new_2.php">

<label>Nowe hasło:<br />
<input type="password" name="pass1" maxlength="32" required/></label><br />
</br>
<label>Potwierdź nowe hasło:<br />
<input type="password" name="pass2" maxlength="64" required/></label><br />
<?php echo "<input type='hidden' name='kod' value='".$value."'>";?>

	 <input type=submit value="Zmień hasło" onclick="clickHandler()"/>
</script>
</form>
</fieldset>
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
<?php
$value = $_GET["id"];

if($value == 1)
{
  echo "<script>
  alert('Pomyslnie zmieniono hasło');
  </script>";

}
if($value == 6)
{
  echo "<script>
  alert('Hasła się nie zgadzają');
  </script>";

}?>
</html>
