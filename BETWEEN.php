<?php
//wyswietlanie postow z przedziałów datowych

function szukajPoDatach($dataP,$dataK,$godzP,$godzK){
		$sql = "SELECT tresc,data FROM wiadomosci WHERE data BETWEEN ('$dataP $godzP') AND ('$dataK $godzK')";
		$result = mysql_query($sql); 
		while($values = mysql_fetch_assoc($result)){ 
			$num_rows = $values['tresc']; 
			$num_rows2 = $values['data']; 
			echo $num_rows2 ."</br>". $num_rows . "</br>";
		}
	}
	//szukajPoDatach("2016-01-19","2016-01-19","02:05:54","15:07:05");
?> 
