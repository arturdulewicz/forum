<?php

include("konfiguracja.php");

if(isset($_GET['id']) == TRUE)	{
	
	if(is_numeric($_GET['id']) == FALSE)  {
		$error = 1;
		if($error == 1)	{
			header("Location: " . $config_basedir);
		}
	}
	else {
		$validtopic = $_GET['id'];
	}
}
else  {
	header("Location: " . $config_basedir);
}

require("naglowek.php");

$topicsql = "SELECT tematy.temat, tematy.id_forum, fora.nazwa FROM
tematy, fora WHERE tematy.id_forum = fora.id AND tematy.id = " .
$validtopic . ";";
$topicresult = mysql_query($topicsql);

$topicrow = mysql_fetch_assoc($topicresult);

echo "<h2>" . $topicrow['temat'] . "</h2>";

echo "<a href='index.php'>" . $config_forumsname . " fore</a> -> <a href ='wyswietlanie_forum.php?id=" . $topicrow['id_forum'] . "'>".
$topicrow['nazwa'] . "</a> <br /><br />";

$threadsql = "SELECT wiadomosci.*, uzytkownicy.nazwa_uzytkownika FROM
wiadomosci, uzytkownicy WHERE wiadomosci.id_uzytkownika = uzytkownicy.id
AND wiadomosci.id_tematu = " . $validtopic . " ORDER BY wiadomosci.data;";
$threadresult = mysql_query($threadsql);

echo "<table>";

while($threadrow = mysql_fetch_assoc($threadresult)) {
	echo "<tr class='head'><td><strong>Zamieszczone przez <i>" .
	$threadrow['nazwa_uzytkownika'] . "</i> dnia " . date("D jS F Y g.iA", strtotime($threadrow['data'])) . " - <i>" .
	$threadrow['temat'] . "</i></strong></td></tr>";
	echo "<tr><td>" . $threadrow['tresc'] . "</td></tr>";
	echo "<tr></tr>";
}
echo "<tr><td>[<a href='odpowiadanie.php?id=" . $validtopic . 
"'>odpowiedz</a>]</td></tr>";
echo "</table>";

require("stopka.php");

?>
