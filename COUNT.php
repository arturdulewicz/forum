<?php

function liczbaWiadomosciUzytkownika($id){
	$sql = "SELECT COUNT(*) as count FROM wiadomosci where id_uzytkownika=$id";

	$result = mysql_query($sql); 
	$values = mysql_fetch_assoc($result); 
	$num_rows = $values['count']; 
	return $num_rows;
}

function imieUzytkownika($id){
	$sql = "SELECT nazwa_uzytkownika from uzytkownicy where id=$id";
	$result = mysql_query($sql); 
	$values = mysql_fetch_assoc($result); 
	$num_rows = $values['nazwa_uzytkownika']; 
	return $num_rows;
} 

?>

