<?php include ("../connect.php");
 session_start(); ?>
<html>
<head>
<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="2023785e-de8b-4c75-99e1-b7d7e6e663ad" type="text/javascript" async></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Strona handlowa polskiego RR</title>
<meta charset="utf-8">
<link href="https://rrtrader.pl/style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
$sort = $_GET["sort"];
//connect to mysql server with host,username,password
//if connection fails stop further execution and show mysql error
//$connection=mysql_connect('127.0.0.1','admin_mz2000mz','kappa123') or die(mysql_error());
//select a database for given connection
//if database selection  fails stop further execution and show mysql error
//mysql_select_db('admin_rrtrader',$connection) or die(mysql_error());


if($sort==NULL){
$sql = 'SELECT * FROM oferty';
}
if($sort=="m_low")
{
	$sql ='SELECT * FROM `oferty` ORDER BY `oferty`.`remium_msc` ASC ';
}
if($sort=="m_high")
{
	$sql ='SELECT * FROM `oferty` ORDER BY `oferty`.`remium_msc` DESC ';
}
if($sort=="f_low")
{
	$sql ='SELECT * FROM `oferty` ORDER BY `oferty`.`premium_full` ASC ';
}
if($sort=="f_high")
{
	$sql ='SELECT * FROM `oferty` ORDER BY `oferty`.`premium_full` DESC ';
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
<br/>
<br/>
<select onchange=myFunction3(this) id="mySelect">
    <option myid=1>Premium</option>
  <option myid=0>Złoto</option>
  <option myid=2>Surowce</option> 
</select>
<center><table></center>
<tr>
<th>Nazwa Uzytkownika</th>
<th>Ocena</th>
<th onclick="myFunction()">Premium na miesiąc</th>
<th onclick="myFunction2()">Premium na 6 miesięcy</th>
<td colspan="2"><strong>Kontakt</strong></td>

</tr>
<?php


while ($row = mysqli_fetch_array($query))
{?>
	 <tr>
    <td align="center"><?php echo $row['nick'];  //row id ?></td>
    <td align="center"><form name="contactform" method="post" action="/note.php\">	<?php $sql2 ='SELECT * FROM `oceny` WHERE nick="'.$row['nick'].'"';
 $mark=0;
$query2 = mysqli_query($conn2, $sql2);
//  printf("Error: %s\n", mysqli_error($con2));
while ($row2 = mysqli_fetch_array($query2))
{
	$mark=$mark+$row2['ocena'];
}
$wynik=mysqli_num_rows($query2);
if($mark==NULL)
{
	$mark=10;
}
else
{
	$mark=$mark/$wynik;
}

	?>
	<input type="hidden" id="custId" name="voted" value="<?php echo $row['nick'];  //row id ?>">
	<?php echo number_format($mark, 1, '.', '');; ?>/10 (<?php   echo $wynik; ?>)&nbsp <?php if($_SESSION['perm']!=0 & $_SESSION['perm']!=2){?><?php $sql23 ='SELECT * FROM `oceny` WHERE nick="'.$row['nick'].'" AND WhoGave="'.$_SESSION['nick'].'"';

$query23 = mysqli_query($conn2, $sql23);
 $wynik2=mysqli_num_rows($query23);

 if($wynik2==0)
	 echo"<select id=\"check\" onclick=\"note()\" name=\"nazwa\">
		<option>10</option>
		<option>9</option>
		<option>8</option>
		<option>7</option>
		<option>6</option>
		<option>5</option>
		<option>4</option>
		<option>3</option>
		<option>2</option>
		<option>1</option>
	</select><input id=\"button\" style=\"display:none\" type=submit value=\"Oceń\"/></form>";

 ?> <?php }?></form></td>
    <td align="center"><?php echo $row['remium_msc']; // row first name ?></td>
	<td align="center"><?php echo $row['premium_full']; // row first name ?></td>
	<td align="center"><?php echo '<a href="'.$row['link_pc'].'">[PC]</a>';  //row id ?></td>
	<td align="center"><?php echo '<a href="'.$row['link_mobile'].'">[MOBILE]</a>';  //row id ?></td>
  </tr>
<?php


}?>
<script>
function note() {
  // Get the checkbox
  var checkBox = document.getElementById("check");
  var text = document.getElementById("button");
    text.style.display = "inline";
  
} 
</script>
</script>
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
<?php
$value = $_GET["result"];

if($value == 4)
{
	echo "<script>
	alert('BŁĄD: Zweryfikuj konto');
	</script>";

}
if($value == 3)
{
	echo "<script>
	alert('Zostałeś zablokowany za łamanie regulaminu');
	</script>";

}
?>

<?php
echo "<script>";
if($sort==NULL){
echo "function myFunction() {
window.location.href = \"/index.php?sort=m_low\";
}";
echo "function myFunction2() {
window.location.href = \"/index.php?sort=f_low\";
}";
}
if($sort=="m_low")
{
echo "function myFunction() {
window.location.href = \"/index.php?sort=m_high\";
}";
echo "function myFunction2() {
window.location.href = \"/index.php?sort=f_low\";
}";
}
if($sort=="m_high")
{
echo "function myFunction() {
window.location.href = \"/index.php?sort=m_low\";
}";
echo "function myFunction2() {
window.location.href = \"/index.php?sort=f_low\";
}";
}
if($sort=="f_low")
{
echo "function myFunction() {
window.location.href = \"/index.php?sort=m_low\";
}";
echo "function myFunction2() {
window.location.href = \"/index.php?sort=f_high\";
}";
}
if($sort=="f_high")
{
echo "function myFunction() {
window.location.href = \"/index.php?sort=m_low\";
}";
echo "function myFunction2() {
window.location.href = \"/index.php?sort=f_low\";
}";
}
echo "</script>";
?>
<script>
function myFunction3(select) {
var y= select.options[select.selectedIndex].getAttribute("myid");
if(y==1)
{

}
if(y==0)
{
window.location.href = "/gold.php";
}
if(y==2)
{
window.location.href = "/resource.php";
}

}</script>
<div class="footer">

<a class="rodo" href="rodo.php">Polityka Prywatności</a>

<a href="http://rivalregions.com/#newspaper/show/130868"><img style="float:right" class="ds" src="https://i.imgur.com/QSexIhM.png" alt="Mountain View"></a>
<a href="https://discord.gg/495mjEv"><img style="float:right" class="ds" src="discord.png" alt="Mountain View"></a>
 <a style="color: #ffffff; float:right; " href="random.php">Generator liczb losowych</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>

</body>
</html>
