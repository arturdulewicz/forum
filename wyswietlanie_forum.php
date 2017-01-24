<?php
error_reporting(0);
include("konfiguracja.php");

if(isset($_GET['id'])==TRUE){
	if(is_numeric($_GET['id'])==FALSE){
		header("Location: " . $config_basedir);
	}

	$validforum=$_GET['id'];
}
else{
	header("Location: " . $config_basedir);
}
require("naglowek.php");

$forumsql = "SELECT * FROM fora WHERE id = " . $validforum . ";";
$forumresult = mysql_query($forumsql);
$forumrow = mysql_fetch_assoc($forumresult);

echo "<h2>" . $forumrow['nazwa'] . "</h2>";

echo "<a href='index.php'>" . $config_forumsname . "</a><br /><br />";

echo "[<a href='nowy_temat.php?id=" . $validforum . "'>Nowy temat</a>]";
echo "<br /><br />";

$topicsql = "SELECT MAX( wiadomosci.data ) AS maxdate, tematy.id AS 
topicid, tematy.*,uzytkownicy.* FROM wiadomosci, tematy, uzytkownicy
WHERE wiadomosci.id_tematu = tematy.id AND tematy.id_uzytkownika =
uzytkownicy.id AND tematy.id_forum = " . $validforum . " GROUP BY
wiadomosci.id_tematu ORDER BY maxdate DESC;";
$topicresult = mysql_query($topicsql);
$topicnumrows = mysql_num_rows($topicresult);

if($topicnumrows == 0){
	echo "<table width='300px'><tr><td>Brak tematow!</td></tr></table>";
}
else{
	
	echo"<table>";
	
	echo "<tr>";
	echo "<th>Tematy</th>";
	echo "<th>Odpowiedzi</th>";
	echo "<th>Autor</th>";
	echo "<th>Data zamieszczenia</th>";
	echo "</tr>";
	while($topicrow = mysql_fetch_assoc($topicresult)){
		$msgsql = "SELECT id FROM wiadomosci WHERE id_tematu = " . $topicrow['topicid'];
		$msgresult = mysql_query($msgsql);
		$msgnumrows = mysql_num_rows($msgresult);
		
		echo "<tr>";
		echo "<td>";
		
		if($_SESSION['ADMIN']) {
			echo "[<a href='usuwanie.php?func=thread&id=" .
			$topicrow['topicid'] . "&forum=" . $validforum . "'>X</a>] - ";
		}
		
		echo "<strong><a href='wyswietlanie_wiadomosci.php?id=" . $topicrow['topicid'] . "'>" . $topicrow['temat'] . "</a></td></strong>";
		echo "<td>" . $msgnumrows . "</td>";
		echo "<td>" . $topicrow['nazwa_uzytkownika'] . "</td>";
		echo "<td>" . date("D jS F Y g.iA", strtotime($topicrow['data'])) . "</td>";
		echo "<tr>";
		
	}
		echo "</table>";
}
	require("stopka.php");
?>

