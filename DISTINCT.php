<?php

 function foo($idKat){
		$sql = "select  nazwa from kategorie where id=$idKat;";
		$records = mysql_query($sql); 
		while($rows = mysql_fetch_array($records)){
			echo   '</br>' . $rows['nazwa'] ; 
		}
	}
	
 function kategorieBezPowtorzen(){
		$sql = "select distinct id_kat from fora;";
		$records = mysql_query($sql); 
		while($rows = mysql_fetch_array($records)){
			$s='\'';
			$idKat= $s . $rows['id_kat'] . $s;
			echo  foo($idKat); 
		}
	}

?> 

