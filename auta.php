<html>
    <head>
          <link rel="Stylesheet" type="text/css" href="pit.css" />
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
  
       
         
        <?php
             //$sql = "SELECT * FROM $tablename WHERE item='$item' AND (start_day>=$start_day OR end_day>=$start_day) AND canceled=0";
             //sprintf("%02d:%02d", $row["start_time"]/60/60, ($row["start_time"]%(60*60)/60))
             
 $link = mysqli_connect ("mikozniak.nazwa.pl", "mikozniak_proo", "Miko1996","mikozniak_proo") or die ("Nie można połączyć się z serwerem BD"); 
    
    
    if (mysqli_connect_errno())
    {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
    mysqli_set_charset($link, "utf8");
   // $query = "SELECT * FROM rejestracja WHERE name='$nazwa' AND phone='$tel'";
    $query = "SELECT * FROM rejestracja ";
    $result = mysqli_query($link, $query);
         print "<TABLE CELLPADDING=5 BORDER=1>";
        print "<TR><TD>ID</TD><TD>Rodzaj naprawy</TD><TD>Od kiedy</TD><TD>Do kiedy</TD><TD>Od godziny[h]</TD><TD>Do godziny[h]</TD><TD>Koszt[zł]</TD><TD>Do odbioru</TD></TR>\n"; 
while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
    
    date_default_timezone_set('Europe/Warsaw');
    $id = $row[0];       
    $item = $row[4];       
    $sd = $row[5];
    $ssd =date("Y-m-d",$sd);
    $ed = $row[6];
    $eed =date("Y-m-d",$ed);
    $st = $row[7];
    $sst=date("H:i",$st);
    $et = $row[8];
    $eet=date("H:i",$et);
    $koszt = $row[10];
    $odbio = $row[11];
        
            print "<TR><TD>$id</TD><TD>$item</TD><TD>$ssd</TD><TD>$eed</TD><TD>$sst</TD><TD>$eet</TD><TD>$koszt</TD><TD>$odbio</TD></TR>\n";

    }
        
     print"</TABLE>";   
        
    
   /* date_default_timezone_set('Europe/Berlin');
   echo date("Y-m-d",$i);
    echo '<br/>';
    echo date("Y-m-d",$ia);
    echo '<br />';
 printf("%02d:%02d", $ip/60/60, ($ip%(60*60)/60));
     echo '<br />';
 printf("%02d:%02d", $ik/60/60, ($ik%(60*60)/60));
*/
        
    			// output data of each row
    			
         $link->close();   
        ?>
        
        <form method="post">
Numer ID: <input type="number" name="id"><br>
Cena: <input type="number" name="cena"><br>
Odbior(tak/nie): <input type="text" name="odbior"><br>
<input type="submit" name="klik">       
 <?php
         if (isset($_POST['klik'])){
        $nri=$_POST['id'];
        $cena=$_POST['cena'];
        $odbior=$_POST['odbior'];
           $link1 = mysqli_connect ("mikozniak.nazwa.pl", "mikozniak_proo", "Miko1996","mikozniak_proo") or die ("Nie można połączyć się z serwerem BD"); 
    
    
    if (mysqli_connect_errno())
    {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
    mysqli_set_charset($link1, "utf8");
   // $query = "SELECT * FROM rejestracja WHERE name='$nazwa' AND phone='$tel'";
    $query = "UPDATE rejestracja SET koszt='$cena',odbior='$odbior' WHERE id='$nri' ";
    $result = mysqli_query($link1, $query); 
            //$polaczenie1->close(); 
         }
            
        ?>
         </form>
  <!-- <a href="index.php">Powrót do strony głównej</a>   -->  
    </body>
</html>