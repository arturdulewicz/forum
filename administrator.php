<?php
error_reporting(0);
session_start();
require("naglowek.php");
require("konfiguracja.php");
require_once("funkcje.php");

$db = mysql_connect($dbhost, $dbuser, $dbpassword);
mysql_select_db($dbdatabase, $db);

if($_POST['submit']) {
	$sql = "SELECT * FROM administratorzy WHERE nazwa_uzytkownika = '" .
	$_POST['nazwa_uzytkownika'] . "' AND haslo = '" . $_POST['haslo'] . "';";
	
	$result = mysql_query($sql);
	$numrows = mysql_num_rows($result);
	
	if($numrows == 1) {
		$row = mysql_fetch_assoc($result);
		
		$_SESSION['ADMIN'] = $row['nazwa_uzytkownika'];
			
			switch($_GET['ref']) {
				case "add":
					header("Location: " . $config_basedir . "/dodawanie_forum.php");
				break;
				
				case "cat":
					header("Location: " . $config_basedir . "/dodawanie_kategorii.php");
				break;
				
				case "del":
					header("Location: " . $config_basedir);
				break;
				
				default:
					header("Location: " . $config_basedir);
				break;
			}
	}
	else {
		header("Location:" . $config_basedir . "/administrator.php?error=1");
	}
}
else {
	//require("naglowek.php");
		echo "<h2>Logowanie administratora</h2>";
		if($_GET['error']) {
			echo "Logowanie nie powiodło się. Proszę spróbować ponownie!";
		}
?>
<form action="<?php include_once("funkcje.php"); 
					echo pf_script_with_get($_SERVER['SCRIPT_NAME']); ?>" method="post">

<table>
<tr>
	<td>Nazwa uzytkownika</td>
	<td><input type="text" name="nazwa_uzytkownika"></td>
</tr>
<tr>
	<td>Hasło</td>
	<td><input type="password" name ="haslo"></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" name="submit" value="Zaloguj!"></td>
</tr>
</table>
</form>
<?php
}
require("stopka.php");
?> 
