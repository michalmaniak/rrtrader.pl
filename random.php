<?php session_start();
include ("connect.php");

?>
<?php

   ?>
<html>
<head>
<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="2023785e-de8b-4c75-99e1-b7d7e6e663ad" type="text/javascript" async></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120122371-1"></script>

<title>Strona handlowa polskiego RR</title>
<meta charset="utf-8">
<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php

function has_dupes($array) {
    $dupe_array = array();
    foreach ($array as $val) {
        if (++$dupe_array[$val] > 1) {
            return true;
        }
    }
    return false;
}
date_default_timezone_set('Europe/Warsaw');
$minimum= $_POST['min'];
$max =$_POST['max'];
 $zmienne=array();
$amount=$_POST['amount'];
$i=0;
if($minimum!=NULL and $max!= NULL)
{
	if($minimum<$max & $amount<=$max)
	{
    while($i<$amount)
    {
$zmienna= random_int($minimum, $max);
$zmienne[$i]=$zmienna;
if(has_dupes($zmienne)===true & $_POST['option']=="new")
{
	while(has_dupes($zmienne)===true)
	{
		$zmienna= random_int($minimum, $max);
$zmienne[$i]=$zmienna;
	}
}

$query = $conn->prepare("INSERT INTO `random_history` (`id`, `nick`, `date`, `value`, `przedzial`) VALUES ('', ?, ?, ?, ?);"); // prepate a query
$query->bind_param('ssss', $zmienna_nick, $zmienna_data, $zmienna_value, $przedzial);
$zmienna_nick=$_SESSION['nick'];; // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
$zmienna_data=date('Y-m-d H:i:s');
$zmienna_value=$zmienne[$i];
$przedzial=$minimum.", ".$max;
$query->execute();
$query->close();
$i++;
}
unset($minimum);
unset($max); // actually perform the query
	}
}
?>
<?php
	 $link= $_POST['link'];
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if($link!=NULL)
{

 $findme   = 'm.';

 $pos = strpos($link, $findme);
	 if ($pos != true) {
 $pc=$link;
 } else {
 $pc=str_replace("m.rival","rival",$link);
 }
 $query= $conn->prepare('Select * FROM users WHERE link_pc=?');
            $query->bind_param("s",$zmienna10);
			$zmienna10=$pc;
         $query->execute();
 $result = $query->get_result(); // retrieve the result so it can be used inside PHP
 $r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
 $pass_2=$r['nick']; // actually perform the query

if($pass_2!=NULL)

	$sql ='SELECT * FROM `random_history` WHERE `nick` = \''.$pass_2.'\' ORDER BY `date` DESC';
}
else
{
	$sql ='SELECT * FROM `random_history` ORDER BY `random_history`.`date` DESC  LIMIT 20';
}
	$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>


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
li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color:  #202020;

    min-width: 120px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
	color: white;

    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
 <div id="lewy">
 </br>
 <h1 style="	color: #ffffff;">Ostatnie 20 wyników</h1>
<table>
<tr>
<th>Nick</th>
<th>Data</th>
<td><strong>Wartość</strong></td>
<th>Przedział</th>
</tr>
<?php


while ($row = mysqli_fetch_array($query) )
{
?>
	 <tr>
    <td align="center"><?php echo $row['nick'];  //row id ?></td>
    <td align="center"><?php echo $row['date']; // row first name ?></td>
	<td align="center"><?php echo $row['value']; // row first name ?></td>
		<td align="center"><?php echo $row['przedzial']; // row first name ?></td>
  </tr>
<?php

}
?>
</table>
<form name="check" method="post" action="/random.php">
<label style="	color: #ffffff;">Link do profilu użytkownika którego chcesz sprawdzić:<br />
<input type="url" name="link" maxlength="64" required/></label><br />
	 <input type=submit value="Sprawdź" onclick="clickHandler()"/>
	 </br>
	 	 </br>
		 	 </br>
			 	 </br>
				 	 </br>
					 	 </br>
						 	 </br>
</form>
 </div>

<?php
if($_SESSION['perm']!=2 and $_SESSION['perm']!=0 )
{
echo " <div id=\"prawy\"></br></br>
<fieldset style=\"    max-width: 60%;\">
<legend>Generator liczb losowych</legend>
<form name=\"contactform\" method=\"post\" action=\"/random.php\">
<label>Minimalna liczba:<br />
<input type=\"number\" name=\"min\" maxlength=\"5\" required/></label><br />

<label>Maksymalna liczba:<br />
<input type=\"number\" name=\"max\" maxlength=\"5\" required/></label><br />

<label>Ilość liczb do wylosowanie:<br />
<input type=\"number\" name=\"amount\" maxlength=\"2\" required value=\"1\"/></label><br />
<input type=\"checkbox\" name=\"option\" value=\"new\"  />  <label>Zaznacz jeśli liczby mają być unikalne<br />
<input type=\"checkbox\" name=\"regulamin\" value=\"regulamin_true\" required />  <label>Wyrażam zgodę na publiczne udostępnienie wygenerowanych liczb wraz z aktualnym czasem<br />

	 <input type=submit value=\"Wygeneruj\" onclick=\"clickHandler()\"/>
</script>
</form>
</fieldset>
</div>";
}
?>

<div class="footer">
<a class="rodo" href="rodo.php">Polityka Prywatności</a>
<a href="http://rivalregions.com/#newspaper/show/130868"><img style="float:right" class="ds" src="https://i.imgur.com/QSexIhM.png" alt="Mountain View"></a>
<a href="https://discord.gg/495mjEv"><img style="float:right" class="ds" src="discord.png" alt="Mountain View"></a>
</div>

</body>
</html>
