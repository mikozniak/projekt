<?php
            $polaczenie=@new mysqli("mikozniak.nazwa.pl", "mikozniak_proo", "Miko1996","mikozniak_proo");
			$rezultat=mysqli_query($polaczenie, "SELECT * FROM rejestracje ");
			while($odpowiedz = mysqli_fetch_array($rezultat)){
					$idp=$odpowiedz[0];
					echo"<option value='$idp'>$idp</option>";
					}
				echo"</select>";
?>
       
       