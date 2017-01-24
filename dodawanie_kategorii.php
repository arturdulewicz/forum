<?php
	error_reporting(0);
	session_start();
	
	require("konfiguracja.php");
	require("funkcje.php");
	
	if(isset($_SESSION['ADMIN']) == FALSE) {
		header("Location: " . $config_basedir . "/administrator.php?ref=cat");
	}
	if($_POST['submit']) {
		$db = mysql_connect($dbhost, $dbuser, $dbpassword);
		mysql_select_db($dbdatabase, $db);
		
		$catsql = "INSERT INTO kategorie(nazwa) VALUES('" . $_POST['cat'] . "');";
		mysql_query($catsql);
		
		header("Location: " . $config_basedir);
	}
	else {
		require("naglowek.php");
?>
	
<h2> Dodawanie nowej kategorii</h2>

<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
<table>
<tr>
	<td>Kategoria</td>
	<td><input type="text" name="cat"></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" name="submit" value="Dodaj kategorię!"></td>
</tr>
</table>
</form>

<?php
	}
require("stopka.php");
?> 
