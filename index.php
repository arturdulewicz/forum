<?php
error_reporting(0);
require("naglowek.php");

if(isset($_SESSION['ADMIN']) == TRUE) {
	echo "[<a href='dodawanie_kategorii.php'>Dodaj nową kategorię</a>]";
	echo "[<a href='dodawanie_forum.php'>Dodaj nowe forum</a>]";
	echo "[<a href='panel_statystyk.php'>Zobacz statystyki forum</a>]";
} 

$catsql = "SELECT * FROM kategorie;";
$catresult = mysql_query($catsql);

echo "<table cellspacing=0>";

while($catrow = mysql_fetch_assoc($catresult)){
	echo"<tr class='head'><td colspan=2>";
	
	
	if($_SESSION['ADMIN']) {
		echo "[<a href='usuwanie.php?func=cat&id=" . $catrow['id'] . "'>X</a>] - ";
		}
			
	echo "<strong>" . $catrow['nazwa'] . "</strong></td>";
	echo "<tr>";
	
	$forumsql = "SELECT * FROM fora WHERE id_kat = " . $catrow['id'] . ";";
	$forumresult = mysql_query($forumsql);
	$forumnumrows = mysql_num_rows($forumresult);
	if($forumnumrows == 0){
		echo "<tr><td>Brak forów!</td></tr>";
	}
	else{
		while($forumrow = mysql_fetch_assoc($forumresult)){
			echo"<tr>";
			echo"<td>";
			
			if($_SESSION['ADMIN']) {
				echo "[<a href='usuwanie.php?func=forum&id=" . $forumrow['id'] . "'>X</a>] - "; 
			}
			
			echo "<strong><a href='wyswietlanie_forum.php?id=" . $forumrow['id'] . "'>" . $forumrow['nazwa'] . "</a></strong>";
			echo "<br/><i>" . $forumrow['opis'] . "</i>";
			echo "</td>";
			echo "</tr>";
		}
	}
}

echo "</table>";

require("stopka.php");

?>

