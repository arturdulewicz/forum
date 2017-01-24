<?php
//wyswietlanie postow zaczynajacych z szukana fraza
	function szukajPoFrazie($j){
		$sql = "SELECT * FROM fora WHERE nazwa LIKE '%$j%' ";
		$result = mysql_query($sql); 
		while($values = mysql_fetch_assoc($result)){ 
			$num_rows = $values['nazwa']; 
			echo $num_rows . "</br>";
		}
	}
?>
