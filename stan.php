<html>
    <head>
          <link rel="Stylesheet" type="text/css" href="pit.css" />
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
  
         <form  method="post">
Telefon: <input type="text" name="tel"><br>
<input type="submit" name="klik" value="Szukaj">

         
         
        <?php
             //$sql = "SELECT * FROM $tablename WHERE item='$item' AND (start_day>=$start_day OR end_day>=$start_day) AND canceled=0";


$tel= $_POST['tel'];
             
             
              $link = mysqli_connect ("mikozniak.nazwa.pl", "mikozniak_proo", "Miko1996","mikozniak_proo") or die ("Nie można połączyć się z serwerem BD"); 
    
    
    if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
    mysqli_set_charset($link, "utf8");
    $query = "SELECT * FROM rejestracja WHERE phone='$tel'";
    
              if ($result = mysqli_query($link, $query)) 
    {  
        echo '<br>';
        print "0zł oznacza brak wyceny przez pracownika";
        print "<TABLE CELLPADDING=5 BORDER=1>";
        print "<TR><TD>ID</TD><TD>Rodzaj naprawy</TD><TD>Przewidywana cena[zł]</TD><TD>Data oddania </TD><TD>Godzina oddania</TD><TD>Czy gotowy do odbioru?</TD></TR>\n"; 
        
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
             date_default_timezone_set('Europe/Warsaw');
            $id = $row[0];
            $cena = $row[10];
            $oo = $row[11];
            $do = $row[6];
            $ssd =date("Y-m-d",$do);
            $et = $row[8];
            $eet=date("H:i",$et);
            $item = $row[4];
            $do;
            print "<TR><TD>$id</TD><TD>$item</TD><TD>$cena</TD><TD>$ssd</TD><TD>$eet</TD><TD>$oo</TD></TR>\n";
        
        
  
    }
        
     print"</TABLE>";   
        
       /*     mysqli_num_rows($result));  */
    }
             
        ?>
 </form>  
   <a href="index.php">Powrót do strony głównej</a>     
    </body>
</html>