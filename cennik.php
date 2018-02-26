<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="pl">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <link rel="Stylesheet" type="text/css" href="pit.css" />
   <title>OFERTA</title>
</head>

<body>
  <center> <H2>PRODUKTY</H2> </center>
  
  <br/>
<center>
   <?php
   
    $link = mysqli_connect ("mikozniak.nazwa.pl", "mikozniak_proo", "Miko1996","mikozniak_proo") or die ("Nie można połączyć się z serwerem BD"); 
    
    
    if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
    mysqli_set_charset($link, "utf8");
    $query = "SELECT * FROM cennik";
    
    if ($result = mysqli_query($link, $query)) 
    {  
        
        print "<TABLE CELLPADDING=5 BORDER=1>";
        print "<TR><TD>ID</TD><TD>Nazwa</TD><TD>Cena[zł]</TD><TD>Czas[h]</TD></TR>\n"; 
        
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
            
            $idc = $row[0];
            $nazwa = $row[1];
            $cena = $row[2];
            $czas = $row[3];
            print "<TR><TD>$idc</TD><TD>$nazwa</TD><TD>$cena</TD><TD>$czas</TD></TR>\n";
        
        
  
    }
        
     print"</TABLE>";   
        
       /*     mysqli_num_rows($result));  */
    }
    mysqli_close($link);
        
    ?>
</center>
<br/>
</body>
</html>