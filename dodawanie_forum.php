<?php
error_reporting(0);
session_start();


require("konfiguracja.php");
require("funkcje.php");

$db = mysql_connect($dbhost, $dbuser, $dbpassword);
mysql_select_db($dbdatabase, $db);

if(isset($_SESSION['ADMIN']) == FALSE) {
	echo "chuj";
}

if($_POST['submit']){
	$topicsql = "INSERT INTO fora(id_kat, nazwa, opis) VALUES("
	. $_POST['cat']
	.",'". $_POST['nazwa']
	."','". $_POST['opis']
	."');";
	
	mysql_query($topicsql);
	
	header("Location: " . $config_basedir);
}
else {
	require("naglowek.php");
?>

<h2>Dodawanie nowego forum</h2>

<form action="<?php echo pf_script_with_get($_SERVER['SCRIPT_NAME']); ?>" method="post">
<table>

<?php
if($validforum == 0) {
	$forumssql = "SELECT * FROM kategorie ORDER BY nazwa;";
	$forumresult = mysql_query($forumssql);
?>

 <tr>
	<td>Forum</td>
	<td>
	<select name="cat">
	<?php
		while($forumsrow = mysql_fetch_assoc($forumsresult)) {
			echo "<option value='" . $forumsrow['id'] . "'>" .$forumsrow['nazwa'] . "</option>";
		}
	?>
	</select>
	</td>
	</tr>
 <?php
}
?>

<tr>
	<td>Nazwa</td>
	<td><input type="text" name="nazwa"></td>
</tr>
<tr>
	<td>Opis</td>
	<td><textarea name="opis" rows="10" cols="50"></textarea></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" name="submit" value="Dodaj forum!"></td>
</tr>
</table>
</form>
<?php
	}
	
	require("stopka.php");
	
?>
