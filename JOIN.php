<?php

//wyswietlanie postow z przedziałów datowych

function fjoin(){
		$sql = "SELECT wiadomosci.temat, wiadomosci.tresc, uzytkownicy.nazwa_uzytkownika
			FROM wiadomosci
			INNER JOIN uzytkownicy
			ON wiadomosci.id_uzytkownika=uzytkownicy.id;";
		$result = mysql_query($sql); 
		echo "<th>Temat</th>";
		echo "<th>Tresc</th>";
		echo "<th>Autor</th>";
		
		while($values = mysql_fetch_assoc($result)){ 
			$num_rows = $values['temat']; 
			$num_rows2 = $values['tresc']; 
			$num_rows3 = $values['nazwa_uzytkownika']; 
			
			echo "<tr><td>" . $num_rows . "</td> <td>". $num_rows2 ."</td><td>". $num_rows3 . "</td></tr>" ;
		}
	}
?> 
