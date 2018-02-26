<html>
    <head>
          <link rel="Stylesheet" type="text/css" href="pit.css" />
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
       
        
         
         
         <form  method="post">
Numer id, ktory chcesz usunąć: <input type="number" name="idm"><br>
<input type="submit" name="klik">

         
         
        <?php
mysql_connect('mikozniak.nazwa.pl', 'mikozniak_proo', 'Miko1996');
mysql_select_db('mikozniak_proo') or die(mysql_error());
$idm = $_POST['idm'];


$query = "DELETE FROM cennik WHERE idc='$idm'";
$qry_result = mysql_query($query) or die(mysql_error());
             if (isset($_POST['klik'])){
             if($qry_result){
                 echo " Pozycja zostało usunięte";
             }
             else{
                 echo" Nie udało się usunąć pozycji";
             }
             }
        ?>
 </form>   
      <a href="index.php">Powrót do strony głównej</a>     
    
    </body>
</html>