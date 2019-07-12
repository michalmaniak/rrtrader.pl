<?php
include ("connect.php");
 session_start(); 
?>
	<?php
//connect to mysql server with host,username,password
//if connection fails stop further execution and show mysql error
//$connection=mysql_connect('127.0.0.1','admin_mz2000mz','kappa123') or die(mysql_error());
//select a database for given connection
//if database selection  fails stop further execution and show mysql error
//mysql_select_db('admin_rrtrader',$connection) or die(mysql_error());

if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$sql = 'SELECT * FROM oferty_gold';

$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<html>
<head>
<title>Strona handlowa polskiego RR</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120122371-1"></script>
<link href="style.css" type="text/css" rel="stylesheet" />
<style>


.active, .accordion:hover {
    background-color: #ccc;
}

.panel {
    padding: 0 18px;
    display: none;
	    border:  groove;
    background-color: rgb(128,128,128);
    overflow: hidden;
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
</head>
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


</ul>
<br/>
<br/>
    <select onchange=myFunction3(this) id="mySelect">
	  <option myid=1>Złoto</option>
    <option myid=0>Premium</option>
  <option myid=2>Surowce</option> 

</select>


<?php
$i=1;
while ($row = mysqli_fetch_array($query))
{

echo "<div class='rTableRow'>
				 <div class='rTableCell' style='width: 20%;'>".$row['seller']."</div>
				 <div class='rTableCell' style='width: 50%;'><p align='left' >".$row['basic_desc']."</p><button onclick=\"myFunction('panel".$i."')\">DETAILS</button></div>


<div class='rTableCell'>      <a href='".$row['link_pc']."'>[PC]</a> <a href='".$row['link_mobile']."'>[MOBILE]</a></div></div>
	<div class='rTableRow'>

<div class='rTableCell' style='margin-right: 30%; margin-left: 15%; display: none;' id='panel".$i."' >
  <p align='left'>".$row['full_desc']."</p>

</div></div>";
$i=$i+1;}
	?>


<style>
.rTable {


    background: rgb(128,128,128);


		}
		.oferta
		{
				display: table-row;
					    height: 40px;
						display: table;
				    background: rgb(128,128,128);

		}
		.rTableRow {
		    	display: table-row;
					    height: 40px;
						display: table;
				    background: rgb(128,128,128);
width: 70%;
				margin-right: 30%;
				margin-left: 15%;
		}

		        .rTableCell2{
		    	display: table-cell;
		    	padding: 3px 10px;
                padding-left: 15px;
				display: table;
				    background: rgb(128,128,128);
width: 70%;
				margin-right: 30%;
				margin-left: 15%;
                text-align: right;
		    	border: 1px solid #999999;
		}
		.rTableCell, .rTableHead {
		    	display: table-cell;
		    	padding: 3px 10px;
		    	border: 1px solid #999999;
		}
		.rTableHeading {
		    	display: table-header-group;
		    	background-color: #ddd;
		    	font-weight: bold;
		}
		.rTableFoot {
		    	display: table-footer-group;
		    	font-weight: bold;
		    	background-color: #ddd;
		}
		.rTableBody {
		    	display: table-row-group;
		}



</style>





<script>
function myFunction(detail) {
    var x = document.getElementById(detail);
    if (x.style.display === "none") {
        x.style.display = "";
    } else {
        x.style.display = "none";
    }
}
function myFunction3(select) {
var y= select.options[select.selectedIndex].getAttribute("myid");

if(y==0)
{
window.location.href = "/";
}
if(y==2)
{
window.location.href = "/resource.php";
}
}
</script>





</body>
</html>
