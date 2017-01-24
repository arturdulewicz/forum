<?php

include("konfiguracja.php");
$db = mysql_connect($dbhost, $dbuser, $dbpassword);

$sql = "SELECT * FROM fora order by id_kat desc";

mysql_select_db($dbdatabase);
$result = mysql_query($sql); 
 
  function foo($idKat){
		$sql = "select  nazwa from kategorie where id=$idKat;";
		$records = mysql_query($sql); 
		while($rows = mysql_fetch_array($records)){
			echo    $rows['nazwa'] ; 
		}
	}
 
 
while($values = mysql_fetch_assoc($result)){
$num_rows = $values['id_kat']; 
$num_rows2 = $values['nazwa']; 
$s = foo($num_rows);
echo  "kat </br>" . $s;
}
?>

