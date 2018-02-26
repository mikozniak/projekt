<?php
session_start();
?>
<!DOCTYPE html 
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="Stylesheet" type="text/css" href="pit.css" />
	<title>Serwis samochodowy</title>
</head>

<body link="red">

<header id="header">
<H2>Serwis samochodowy</H2>
</header>






	<?php
	// if((isset($_SESSION['zalogowany_pracownik']))&&($_SESSION['zalogowany_pracownik']==true)){
	 if((isset($_SESSION['zalogowany_admin']))&&($_SESSION['zalogowany_admin']==true)){
	 echo ' <ul class="menu_poziome">';
	 echo'<li><a href="index.php">Strona główna</a></li><li><a href="zaloz.php">Załoz konto </a></li><li><a href="cennik.php">Cennik</a></li><li><a href="wloz.php">Dodaj do cennika</a></li><li><a href="us.php">Usuń z cennika</a></li><li><a href="edy.php">Edytuj cennik</a></li><li><a href="indeks.php">Rozpiska </a></li><li><a href="logout.php" class="linkmenu">Wyloguj się!</a></li>';
echo ' </ul><section id="content">';
}
    if ((isset($_SESSION['zalogowany_pracownik']))&&($_SESSION['zalogowany_pracownik']==true)){
         echo ' <ul class="menu_poziome">';
	 echo'<li><a href="index.php">Strona główna</a></li><li><a href="rejestracja.php">Załóż konto </a></li><li><a href="auta.php">Auta </a></li><li><a href="indeks.php">Zapisz klienta</a></li><li><a href="logout.php" class="linkmenu">Wyloguj się!</a></li>';
echo ' </ul><section id="content">';
}
    if ((isset($_SESSION['zalogowany_klient']))&&($_SESSION['zalogowany_klient']==true)){
        echo ' <ul class="menu_poziome">';
	 echo'<li><a href="index.php">Strona główna</a></li><li><a href="stan.php">Stan auta </a></li><li><a href="new.php">Rejestracja </a></li><li><a href="logout.php" class="linkmenu">Wyloguj się!</a></li>';
echo ' </ul><section id="content">';
}
    
    if (((!isset($_SESSION['zalogowany_klient']))&&($_SESSION['zalogowany_klient']==false))&&((!isset($_SESSION['zalogowany_pracownik']))&&($_SESSION['zalogowany_pracownik']==false))&&((!isset($_SESSION['zalogowany_admin']))&&($_SESSION['zalogowany_admin']==false))){
        
        
//    if 
//        ((isset($_SESSION['zalogowany_klient']))&&($_SESSION['zalogowany_klient']==true))
//    &&
//        ((isset($_SESSION['zalogowany_pracownik']))&&($_SESSION['zalogowany_pracownik']==true))
//    &&
//        ((isset($_SESSION['zalogowany_admin']))&&($_SESSION['zalogowany_admin']==true))
    
echo '<ul class="menu_poziome"><li><a href="index.php">Strona główna</a></li><li><a href="wolne.php">Wolne terminy</a></li><li><a href="cennik.php">Cennik</a></li></ul><section id="content"><section id="content">';
print	"Korzystanie z serwisu wymaga zalogowania<br/><form action='zaloguj.php' method='post'>
		Login: <br /> <input type='text' name='login' /> <br />
		Hasło: <br /> <input type='password' name='haslo' /> <br /><br/>
		<select name='status'>
    <option value='klient'>Klient</option>
    <option value='pracownik'>Pracownik</option>
    <option value='admin'>Admin</option>
  </select>
  <br />
    <br />
		<input type='submit' value='Zaloguj się' />
	</form>";   ?>

 
    <center><h5>Serwis samochodowy!</h5></center>
  <center><h5>ul. Pomorska 55 Bydgoszcz</h5></center>
  <center><h5>tel. 764 456 444</h5></center>
  <center> <h5>Jak do nas trafić ?</h5> </center>
<center><iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d598.4329635732241!2d18.005822055394702!3d53.13295892542663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x470313c6ebebf735%3A0xefab843b7b93cc3e!2sPomorska+55%2C+Bydgoszcz!3m2!1d53.133029!2d18.005731!5e0!3m2!1spl!2spl!4v1508053411685" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></center>

<center> <h5> <a href="https://goo.gl/maps/v71dzehoP552">Link do lokalizacji</a> </h5> </center>
    <?php
    
	 if(isset($_SESSION['blad'])){
  echo $_SESSION['blad'];}
    		 if(isset($_SESSION['REJ'])){
  echo $_SESSION['REJ'];}
 }
    
    
    
    
    if(isset($_SESSION['id_klient']))
{
       echo"<H2>Witamy na stronie serwisu</H2>"; 
       echo"<H2>Wybierz interesujące Cię zagadnienie z menu</H2>"; 
      
}

    
    
 /////////////////////////////////   
    
 if(isset($_SESSION['id_pracownik']))
 {
   $polaczenie=@new mysqli("mikozniak.nazwa.pl", "mikozniak_proo", "Miko1996","mikozniak_proo");
     
if ($polaczenie->connect_errno!=0)
{
	echo "Nie można połączyć się z serwerem BD";
}
else
{
    // co widzi klient
	mysqli_set_charset($polaczenie, "utf8");
	echo"<H2>Chętni do rezerwacji</H2>";
		 if(isset($_SESSION['dodaj']))
         {
  echo $_SESSION['dodaj'];
  	unset($_SESSION['dodaj']);
         }
    $query="SELECT * FROM DlaKlienta";
    $result = mysqli_query($polaczenie, $query);
    print "<TABLE CELLPADDING=5 BORDER=1>";
        print "<TR><TD>ID </TD><TD>Imie</TD><TD>Login</TD><TD>Nr. tel.</TD><TD>Rodzaj</TD><TD>Godziny od</TD><TD>Godzina do</TD><TD>Od kiedy</TD><TD>Do kiedy</TD></TR>\n";
while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
    date_default_timezone_set('Europe/Warsaw');
    $id = $row[0];       
    $name = $row[1];       
    $login = $row[2];       
    $phone = $row[4];       
    $item = $row[5];       
    $sd = $row[6];
    $ssd =date("Y-m-d",$sd);
    $ed = $row[7];
    $eed =date("Y-m-d",$ed);
    $st = $row[8];
    $sst=date("H:i",$st);
    $et = $row[9];
    $eet=date("H:i",$et);
        
            print "<TR><TD>$id</TD><TD>$name</TD><TD>$login</TD><TD>$phone</TD><TD>$item</TD><TD>$ssd</TD><TD>$eed</TD><TD>$sst</TD><TD>$eet</TD><TD>$koszt</TD><TD>$odbio</TD></TR>\n";

    }
        
     print"</TABLE>";
  
 }
?>
   <form method='post'>
       Odrzuć nr. ID: <select name="iddd">
       <?php
     
$polaczenie3=@new mysqli("mikozniak.nazwa.pl", "mikozniak_proo", "Miko1996","mikozniak_proo");
			$rezultat=mysqli_query($polaczenie3, "SELECT * FROM DlaKlienta ");
			while($odpowiedz = mysqli_fetch_array($rezultat))
            {
					$idp=$odpowiedz[0];
					echo"<option value='$idp'>$idp</option>";
            }
            $polaczenie3->close(); 
    
     
     ?></select>
        <input type='submit' name='klik1' value='Usuń propozycję'>
    <!--<input type='number' name='iddd'><br> -->   
    <?php 
     
     $polaczenie=@new mysqli("mikozniak.nazwa.pl", "mikozniak_proo", "Miko1996","mikozniak_proo");
    if ($polaczenie->connect_errno!=0)
{
	echo "Nie można połączyć się z serwerem BD";
}
else
{
    $zmienna=$_POST['iddd'];

             if (isset($_POST['klik1']))
             {
                 $query = "DELETE FROM DlaKlienta WHERE iddk='$zmienna'";
$qry_result = mysqli_query($polaczenie,$query);
             if($qry_result)
             {
                 echo " Pozycja został usunięta";
             }
             else
             {
                 echo" Nie udało się usunąć pozycji ";
             }
             }
  
		$polaczenie->close(); 
 }
 
     ?>
     
      </form> 
    
    
      <form method='post' >
       Numer ID do zarejestrowania: <select name="idd"> 
       <?php    
        $polaczenie4=@new mysqli("mikozniak.nazwa.pl", "mikozniak_proo", "Miko1996","mikozniak_proo");
			$rezultat=mysqli_query($polaczenie4, "SELECT * FROM DlaKlienta ");
			while($odpowiedz = mysqli_fetch_array($rezultat))
            {
					$ikp=$odpowiedz[0];
					echo"<option value='$ikp'>$ikp</option>";
            }
            $polaczenie4->close(); 
     ?>
    </select>
        <input type='submit' name='klik2' value='Dodaj do terminarza'>
        
      <?php  
     $zmienna1=$_POST['idd'];
     $polaczenie=@new mysqli("mikozniak.nazwa.pl", "mikozniak_proo", "Miko1996","mikozniak_proo");
     $polaczenie1=@new mysqli("mikozniak.nazwa.pl", "mikozniak_proo", "Miko1996","mikozniak_proo");
    if ($polaczenie->connect_errno!=0)
{
	echo "Nie można połączyć się z serwerem BD";
}
else
{
    
 if (isset($_POST['klik2']))
     {
        $pomoc = mysqli_query ($polaczenie,"SELECT * FROM DlaKlienta WHERE iddk ='$zmienna1' ");
        while ($row = mysqli_fetch_array($pomoc, MYSQLI_NUM))
        {
                         $name1 = $row[1];
                         $login1 = $row[2];
                         $phone1 = $row[4];
                         $item1 = $row[5];
                         $startd1 = $row[6];
                         $endd1 = $row[7];
                         $startt1 = $row[8];
                         $endt1 = $row[9];

         }
//echo $endt1;
         $que = "INSERT INTO rejestracja(name, login, phone, item, start_day, end_day, start_time, end_time, canceled,odbior) VALUES ('$name1','$login1','$phone1','$item1','$startd1','$endd1','$startt1','$endt1',0,'nie')";
            $qry_res = mysqli_query($polaczenie1,$que);
             if($qry_res)
             {
                 echo " Pozycja został dodana";
                 $polaczenie2=@new mysqli("mikozniak.nazwa.pl", "mikozniak_proo", "Miko1996","mikozniak_proo");
                $qr = mysqli_query($polaczenie2,"DELETE FROM `DlaKlienta` WHERE iddk='$zmienna1'");
                 $polaczenie2->close(); 
             }
             else{
                 echo" Nie udało się dodać pozycji ";
             }
            
  
		$polaczenie->close(); 
		$polaczenie1->close(); 
 }
 
     ?>
         </form>
       <?php  
             
         
  
}  
 }
	

    
    
 //////////////////////////////////////////////   
    
    
    
  
 if(isset($_SESSION['id_admin']))
{
	$polaczenie=@new mysqli("mikozniak.nazwa.pl", "mikozniak_proo", "Miko1996","mikozniak_proo");
if ($polaczenie->connect_errno!=0)
{
	echo "Nie można połączyć się z serwerem BD";
}
else
{
	mysqli_set_charset($polaczenie, "utf8");
	echo"<H2>Auta</H2>";
		 if(isset($_SESSION['dodaj'])){
  echo $_SESSION['dodaj'];
  	unset($_SESSION['dodaj']);
  }
	echo '<table border=”1”>';
	print "<TR><TD>ID </TD><TD>Imię</TD><TD>Rodzaj</TD><TD>Cena</TD><TD>Do odbioru</TD></TR>\n";
		$zapytanie = mysqli_query ($polaczenie,"SELECT * FROM rejestracja");
			$ile = mysqli_num_rows($zapytanie);
		for ($i = 1; $i <= $ile; $i++) 
		{
		$row = mysqli_fetch_assoc($zapytanie);
		$id[$i] = $row['id'];
		$ad[$i] = $row['name'];
		$lat[$i] = $row['item'];
		$lng[$i] = $row['koszt'];
		$type[$i] = $row['odbior'];
		$type1[$i] = $row['start_day'];
		$type2[$i] = $row['end_day'];
		$type3[$i] = $row['end_time'];
		$type4[$i] = $row['start_time'];
		//to bedzie opis
		
		print "<TR ><TD>$id[$i]</TD><TD >$ad[$i]</TD><TD >$lat[$i]</TD><TD >$lng[$i]</TD><TD >$type[$i]</TD></TR>\n";
		}
		echo "</table>";
		$polaczenie->close();
 }
}
    
?>
</section>


</body>
</html>