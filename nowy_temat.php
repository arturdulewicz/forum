<?php
error_reporting(0);
session_start();

require("konfiguracja.php");
require("funkcje.php");

$db = mysql_connect($dbhost, $dbuser, $dbpassword);
mysql_select_db($dbdatabase, $db);

$forchecksql = "SELECT * FROM fora;";
$forcheckresult = mysql_query($forchecksql);
$forchecknumrows = mysql_num_rows($forcheckresult);

if($forchecknumrows == 0) {
	header("Location: " . $config_basedir);
}

if(isset($_GET['id']) == TRUE) {
	if(is_numeric($_GET['id']) == FALSE) {
		$error = 1;
	}
	
	if($error == 1){
		header("Location: " . $config_basedir);
	}
	else {
		$validforum = $_GET['id'];
	}
}
else {
	$validforum = 0;
}

if(isset($_SESSION['USERNAME']) == FALSE) {
	header("Location: " . $config_basedir ."/logowanie.php?ref=newpost&id=" . $validforum);
}

if($_POST['submit']) {
	if($validforum == 0) {
		$topicsql = "INSERT INTO tematy(data, id_uzytkownika, id_forum, temat) 
		VALUES(NOW()
		, " . $_SESSION['USERID']
		. ", ". $_POST['forum']
		.",'". $_POST['temat']
		."');";
	}
	else {
		$topicsql= "INSERT INTO tematy(data, id_uzytkownika, id_forum, temat)
		VALUES(NOW()
		,". $_SESSION['USERID']
		.",". $validforum
		.",'". $_POST['temat']
		."');";
	}
	
	mysql_query($topicsql);
	$topicid = mysql_insert_id();
	
	$messagesql = "INSERT INTO wiadomosci(data, id_uzytkownika, id_tematu, temat, tresc) VALUES(NOW()
	,". $_SESSION['USERID']
	.",". mysql_insert_id()
	.",'". $_POST['temat']
	."','" . $_POST['tresc']
	."');";
	mysql_query($messagesql);
	header("Location: " . $config_basedir .
	"/wyswietlanie_wiadomosci.php?id=" . $topicid);
}
else {
	require("naglowek.php");
	
	if($validforum != 0) {
		$namesql = "SELECT nazwa FROM fora ORDER BY nazwa;";
		$nameresult = mysql_query($namesql);
		$namerow = mysql_fetch_assoc($nameresult);
		echo "<h2>Dodaj nową wiadomość do forum " . "
		</h2>";
	}
	else {
		echo "<h2>Zamieszczanie nowej wiadomości</h2>";
	}
	?>


<form action="<?php echo pf_script_with_get($_SERVER['SCRIPT_NAME']); ?>" method="post">
<table>
<?php

if($validforum == 0) {
	$forumssql = "SELECT * FROM fora ORDER BY nazwa;";
	$forumresult = mysql_query($forumssql);
?>

<tr>
	<td>Forum</td>
	<td>
	<select name="forum">
	<?php
		while($forumsrow = mysql_fetch_assoc($forumsresult)) {
			echo "<option value='" . $forumsrow['id'] . "'>" .
			$forumsrow['nazwa'] . "</option>";
		}
	?>
	</select>
	</td>
</tr>

<?php
}
?>

<tr>
	<td>Temat</td>
	<td><input type="text" name="temat"></td>
</tr>
<tr>
	<td>Treść</td>
	<td><textarea name="tresc" rows="10" cols="50"></textarea></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" name="submit" value="Dodaj!"></td>
</tr>
</table>
</form>

<?php
}

require("stopka.php");

