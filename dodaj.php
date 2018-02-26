<?php
session_start();
if(!isset($_SESSION['zalogowany']))
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
	<title>KOMIS</title>
</head>

<body link="red">

<header id="header">
<H2>KOMIS</H2>
</header>
	<?php
	 if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true)){
	 echo ' <ul class="menu_poziome">';
	 echo'<li><a href="index.php">Strona główna</a></li><li><a href="dodaj.php">Dodaj samochód </a></li><li><a href="logout.php" class="linkmenu">Wyloguj się!</a></li>';
echo ' </ul><section id="content">';
}
 if(isset($_SESSION['id_pracownika']))
{
	$pracownik=$_SESSION['id_pracownika'];
	print	"Dodawanie Samochodow<br/><form action='dodaj.php' method='post'>
		Wlasciciel: <br /> <input type='text' name='wlasciciel' /> <br />
		Marka: <br /> <input type='text' name='marka' /> <br />
		Model: <br /> <input type='text' name='model' /> <br />
		Rocznik: <br /> <input type='text' name='rocznik' /> <br />
		Cena: <br /> <input type='text' name='cena' /> <br /><br />
		<input type='submit' value='Dodaj' />
	</form>";
	 if(isset($_POST['cena'])){
		 $wlasciciel=$_POST['wlasciciel'];
		 $marka=$_POST['marka'];
		 $model=$_POST['model'];
		 $rocznik=$_POST['rocznik'];
		 $cena=$_POST['cena'];
		 $polaczenie=@new mysqli("mikozniak.nazwa.pl", "mikozniak_z14", "Miko1996","mikozniak_z14");
if ($polaczenie->connect_errno!=0)
{
	echo "Nie można połączyć się z serwerem BD";
}
else
{
	mysqli_set_charset($polaczenie, "utf8");
	$zapytanie = mysqli_query ($polaczenie,"SELECT * FROM marka;");
		$ile = mysqli_num_rows($zapytanie);
		for ($i = 1; $i <= $ile; $i++) 
		{
		$row = mysqli_fetch_assoc($zapytanie);
		$nazwa=$row['nazwa'];
		if($marka==$nazwa)
		{
		$idm = $row['idm'];
		}
		}
}
 $polaczenie->close();
		 if(!isset($idm))
 {
	 	$idm = $ile+1;
	$polaczenie=@new mysqli("mikozniak.nazwa.pl", "mikozniak_z14", "Miko1996","mikozniak_z14");
if ($polaczenie->connect_errno!=0)
{
	echo "Nie można połączyć się z serwerem BD";
}
else
{
	mysqli_set_charset($polaczenie, "utf8");
	$zapytanie = mysqli_query ($polaczenie,"INSERT INTO marka(nazwa) VALUES ('$marka');");
	}
		$polaczenie->close(); 
		 }
		 
		 $polaczenie=@new mysqli("mikozniak.nazwa.pl", "mikozniak_z14", "Miko1996","mikozniak_z14");
if ($polaczenie->connect_errno!=0)
{
	echo "Nie można połączyć się z serwerem BD";
}
else
{
	mysqli_set_charset($polaczenie, "utf8");
	$zapytanie = mysqli_query ($polaczenie,"SELECT * FROM model;");
		$ile = mysqli_num_rows($zapytanie);
		for ($i = 1; $i <= $ile; $i++) 
		{
		$row = mysqli_fetch_assoc($zapytanie);
				$nazwa=$row['nazwa'];
			if($model==$nazwa)
		{
		$idmd = $row['idmd'];
		}
}
}
	$polaczenie->close();
				 if(!isset($idmd))
 {
	 	$idmd = $ile+1;
	$polaczenie=@new mysqli("mikozniak.nazwa.pl", "mikozniak_z14", "Miko1996","mikozniak_z14");
if ($polaczenie->connect_errno!=0)
{
	echo "Nie można połączyć się z serwerem BD";
}
else
{
	mysqli_set_charset($polaczenie, "utf8");
	$zapytanie = mysqli_query ($polaczenie,"INSERT INTO model(idm,nazwa) VALUES ($idm,'$model');");
	}
		$polaczenie->close(); 
		 }
$polaczenie=@new mysqli("mikozniak.nazwa.pl", "mikozniak_z14", "Miko1996","mikozniak_z14");
if ($polaczenie->connect_errno!=0)
{
	echo "Nie można połączyć się z serwerem BD";
}
else
{
	mysqli_set_charset($polaczenie, "utf8");
	$zapytanie = mysqli_query ($polaczenie,"SELECT * FROM wlasciciel;");
		$ile = mysqli_num_rows($zapytanie);
		for ($i = 1; $i <= $ile; $i++) 
		{
		$row = mysqli_fetch_assoc($zapytanie);
		$nazwisko=$row['nazwisko'];
		if($wlasciciel==$nazwisko)
		{
		$idw = $row['idw'];
		}
		}
		
}
	$polaczenie->close();
 if(!isset($idw))
 {
	 	$idw = $ile+1;
	$polaczenie=@new mysqli("mikozniak.nazwa.pl", "mikozniak_z14", "Miko1996","mikozniak_z14");
if ($polaczenie->connect_errno!=0)
{
	echo "Nie można połączyć się z serwerem BD";
}
else
{
	mysqli_set_charset($polaczenie, "utf8");
	$zapytanie = mysqli_query ($polaczenie,"INSERT INTO wlasciciel(nazwisko) VALUES ('$wlasciciel');");
	}
		$polaczenie->close(); 
 }
 $polaczenie=@new mysqli("mikozniak.nazwa.pl", "mikozniak_z14", "Miko1996","mikozniak_z14");
if ($polaczenie->connect_errno!=0)
{
	echo "Nie można połączyć się z serwerem BD";
}
else
{
	mysqli_set_charset($polaczenie, "utf8");
	$zapytanie = mysqli_query ($polaczenie,"INSERT INTO samochody(idp,idw,idm,idmd,rocznik,cena) VALUES ($pracownik,$idw,$idm,$idmd,'$rocznik',$cena);");
	}
		$polaczenie->close(); 
			$_SESSION['dodaj']='<span style="color:red">DODANO SAMOCHÓD!</span>';
 print"<script> window.location.replace('index.php');</script>";
 }
}
else 
{
	echo "Tylko pracownicy mogą dodawać samochody";
}




?>
</section>
<footer id="footer">  
 <p>Kontakt do administratora strony: <a href="mailto:mail.pl">admin</a>&nbsp;&nbsp;&nbsp;&nbsp;Gości:<?php include("licznik_wejsc.php"); ?></p>
</footer>

</body>
</html>