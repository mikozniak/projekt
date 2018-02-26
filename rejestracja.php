<?php
session_start();
if(isset($_SESSION['zalogowany']))
{
	header('Location:index.php');
	exit();
}
?>
<!DOCTYPE html 
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="Stylesheet" type="text/css" href="pit.css" />
	<title>REJESTRACJA</title>
</head>

<body>

<header id="header">
<H2>REJESTRACJA</H2>
</header>
   <!--<ul class="menu_poziome">
	<li><a href="index.php">Strona główna</a></li>
	<li><a href="rejestracja.php">Rejestracja</a></li>
 </ul>
 -->
<section id="content">
<br/><form action='rejestracja.php' method='post'>
		Imie: <br /> <input type='text' name='imie' /> <br />
		Nazwisko: <br /> <input type='tesxt' name='nazwisko' /> <br />
		Login: <br /> <input type='text' name='login' /> <br />
		Hasło: <br /> <input type='password' name='haslo' /> <br />
		Kod autoryzacyjny: <br /> <input type='password' name='kod' />
		<br/> <br/>
		<select name="choice">
		
		<option value="klienci">Klient</option>
		</select>
		<br/>	<br/>
		
		<input type='submit' value='Zarejestruj klienta' />
	</form><br/>
<?php
if (isset($_POST['kod']))
{
	if  ($_POST['kod'] === "1996")
	{
		$polaczenie=@new mysqli("mikozniak.nazwa.pl", "mikozniak_pro", "Miko1996","mikozniak_pro");
if ($polaczenie->connect_errno!=0)
{
	echo "Nie można połączyć się z serwerem BD";
}
else
{
	$imie=$_POST['imie'];
	$nazwisko=$_POST['nazwisko'];
	$login=$_POST['login'];
	$haslo=$_POST['haslo'];
	$choice=$_POST['choice'];
		$login = htmlentities($login, ENT_QUOTES, 	"UTF-8");
		$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
		$imie = htmlentities($imie, ENT_QUOTES, 	"UTF-8");
		$nazwisko = htmlentities($nazwisko, ENT_QUOTES, "UTF-8");
		$login= mysqli_real_escape_string($polaczenie,$login);
		$haslo = mysqli_real_escape_string($polaczenie,$haslo);
		$imie= mysqli_real_escape_string($polaczenie,$imie);
		$nazwisko = mysqli_real_escape_string($polaczenie,$nazwisko);
		$zapytanie = mysqli_query ($polaczenie,"INSERT INTO $choice VALUES (NULL, '".$nazwisko."','".$imie."','".$login."' ,'".$haslo."');");
		$polaczenie->close();
		$_SESSION['REJ']='<span style="color:red">Zarejestrowano można się zalogować</span>';
		unset($_SESSION['blad']);
	 	print"<script> window.location.replace('index.php');</script>";
}
	}
	else
	{
		echo "<br/>ZŁY KOD";
	}
}
?>
<br>
</section>
   
   
<footer id="footer">  
 <p>Kontakt do administratora strony: <a href="">admin</a>&nbsp;&nbsp;&nbsp;&nbsp;Gości:<?php include("licznik_wejsc.php"); ?></p>
</footer>

</body>
</html>