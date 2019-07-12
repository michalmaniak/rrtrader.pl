pl<?php session_start();
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

include ("connect.php");
?>
<html>
<head>
<title> Strona handlowa polskiego RR</title>
<link href="style.css" type="text/css" rel="stylesheet" />
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120122371-1"></script>
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
	      <a href=\"/send_gold.php\">Złoto</a>
			<a href=\"/send_resource.php\">Surowce</a>
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
	$sql ='SELECT * FROM `resources` WHERE nick="'.$_SESSION['nick'].'"';

$query = mysqli_query($conn, $sql);
if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
 ?>
<fieldset id="lewy">
<legend>Dodaj ofertę:</legend>
<form name="contactform" method="post" action="script_resource.php">
<?php
while ($row = mysqli_fetch_array($query))
{?>
<label>Cena za ropę</br>
<input type="number" name="oil" id="oil" required value="<?php $oil= $row['oil']; echo $oil;  //row id ?>" ><input type="checkbox" name="oil2" value="is_oil"  onclick="myFunction('oil')"/>  <label> Nie sprzedaję
</br>
</br>
<label>Cena za minerały</br>
<input type="number" name="ore" id="ore" required  value="<?php $ore = $row['stone']; echo $ore;  //row id ?>"><input type="checkbox" name="ore2" value="is_ore" onclick="myFunction('ore')" />  <label> Nie sprzedaję
</br>
</br>
<label>Cena za uran</br>
<input type="number" name="uran" id="uran" required  value="<?php $uran= $row['uran']; echo $uran;  //row id ?>"><input type="checkbox" name="uran2" value="is_uran" onclick="myFunction('uran')" />  <label> Nie sprzedaję
</br>
</br>
<label>Cena za diamenty</br>
<input type="number" name="diamond" id="diamond" required  value="<?php $diamond= $row['diamond']; echo $diamond; //row id ?>"><input type="checkbox" name="diamond2" value="is_diamond" onclick="myFunction('diamond')" />  <label> Nie sprzedaję
</br>
</br>


	 <input type=submit value="Zaktualizuj ofertę" onclick="clickHandler()"/>
</br>
<?php
$zmienna=1;
}
if($row['oil']==NULL & $zmienna!=1)
{
?>
<label>Cena za ropę</br>
<input type="number" name="oil" id="oil" required  ><input type="checkbox" name="oil2" value="is_oil"  onclick="myFunction('oil')"/>  <label> Nie sprzedaję
</br>
</br>
<label>Cena za minerały</br>
<input type="number" name="ore" id="ore" required  ><input type="checkbox" name="ore2" value="is_ore" onclick="myFunction('ore')" />  <label> Nie sprzedaję
</br>
</br>
<label>Cena za uran</br>
<input type="number" name="uran" id="uran" required  ><input type="checkbox" name="uran2" value="is_uran" onclick="myFunction('uran')" />  <label> Nie sprzedaję
</br>
</br>
<label>Cena za diamenty</br>
<input type="number" name="diamond" id="diamond" required  ><input type="checkbox" name="diamond2" value="is_diamond" onclick="myFunction('diamond')" />  <label> Nie sprzedaję
</br>
</br>


	 <input type=submit value="Dodaj ofertę" onclick="clickHandler()"/>
</br>
<?php }?>



</br>*Wszystkie ceny należy podać od jednej jednoski danego surowca
</form>
</fieldset>
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
	alert('BŁĄD: złe  hasło');
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
<script>
function myFunction(surowiec) {
   if(document.getElementById(surowiec).disabled == false)
   {
		document.getElementById(surowiec).disabled = true;
		document.getElementById(surowiec).type = 'text';
		document.getElementById(surowiec).value = "Brak";
   }
   else
   {
	   		document.getElementById(surowiec).disabled = false;
							document.getElementById(surowiec).value = "";
			document.getElementById(surowiec).type = 'number';

   }
}
</script>
</body>
</html>
