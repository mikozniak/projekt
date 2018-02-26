<?php
session_start();
if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: index.php');
		exit();
	}
$polaczenie=@new mysqli("mikozniak.nazwa.pl", "mikozniak_proo", "Miko1996","mikozniak_proo");
if ($polaczenie->connect_errno!=0)
{
	echo "Nie można połączyć się z serwerem BD";
}
else
{
	$login=$_POST['login'];
	$haslo=$_POST['haslo'];
		if( $_POST['status']=='admin')
	{
		$tabela='admin';
	}
	if( $_POST['status']=='pracownik')
	{
		$tabela='pracownik';
	}
    if( $_POST['status']=='klient')
	{
		$tabela='klient';
	}
		$login = htmlentities($login, ENT_QUOTES, 	"UTF-8");
		$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
	if ($rezultat = @$polaczenie->query(
		sprintf('SELECT * FROM '.$tabela.' WHERE 	user="%s" AND pass="%s"',
		mysqli_real_escape_string($polaczenie,$login),
		mysqli_real_escape_string($polaczenie,$haslo))))
	{
	$ilu_userow = $rezultat->num_rows;
		if($ilu_userow>0)
		{	
			
			$wiersz = $rezultat->fetch_assoc();
				if( $_POST['status']=='admin')
                {
                    $_SESSION['zalogowany_admin'] = true;
				$_SESSION['id_admin'] = $wiersz['ida'];
				$id=$_SESSION['id_admin'];
				}
				if( $_POST['status']=='pracownik')
				{
                $_SESSION['zalogowany_pracownik'] = true;
				$_SESSION['id_pracownik'] = $wiersz['idp'];
				$id=$_SESSION['id_pracownik'];
				}
                if( $_POST['status']=='klient')
				{
                $_SESSION['zalogowany_klient'] = true;
				$_SESSION['id_klient'] = $wiersz['idk'];
				$id=$_SESSION['id_klient'];
				}
			$_SESSION['user'] = $wiersz['user'];
			unset($_SESSION['blad']);
			unset($_SESSION['REJ']);
			$rezultat->free_result();
		}
		else
		{
			$_SESSION['blad']='<span style="color:red">Nieprawidłowy login lub hasło!</span>';
			header('Location: index.php');
		}
	}
$polaczenie->close();}

		header('Location: index.php');

?>