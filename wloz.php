<html>
    <head>
          <link rel="Stylesheet" type="text/css" href="pit.css" />
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
       
        
         
         
         <form  method="post">
Nazwa: <input type="text" name="nazwa"><br>
Cena: <input type="number" name="cena"><br>
Czas: <input type="number" name="czas"><br>
<input type="submit" name="klik">

         
         
        <?php
mysql_connect('mikozniak.nazwa.pl', 'mikozniak_proo', 'Miko1996');
mysql_select_db('mikozniak_proo') or die(mysql_error());
//$idm = $_POST['idm'];
$nazwa = $_POST['nazwa'];
$cena = $_POST['cena'];
$czas = $_POST['czas'];
mysql_query("SET NAMES utf8");
mysql_query("SET CHARACTER SET utf8");
mysql_query("SET collation_connection = utf8_polish_ci");
//$query = "UPDATE `markers` SET `address`='$opis'WHERE 'id'='$idm'";
//$query = "UPDATE cennik SET nazwa='$nazwa',cena='$cena',czas='$czas' WHERE idc='$idm'";
//$query = "DELETE FROM cennik WHERE idc='$idm'";

             if (isset($_POST['klik'])){
                 $query = "INSERT INTO cennik(idc, nazwa, cena, czas) VALUES (NULL,'$nazwa','$cena','$czas')";
$qry_result = mysql_query($query) or die(mysql_error());
             if($qry_result){
                 echo " Pozycja został dodana";
             }
             else{
                 echo" Nie udało się dodać pozycji ";
             }
             }
        ?>
 </form>  
   <a href="index.php">Powrót do strony głównej</a>     
    </body>
</html>