<?php
error_reporting(0);
session_start();
require("naglowek.php");
require("konfiguracja.php");
require_once("funkcje.php");

$db = mysql_connect($dbhost, $dbuser, $dbpassword);
mysql_select_db($dbdatabase, $db);

if($_POST['submit']) {
	$sql = "SELECT * FROM uzytkownicy WHERE nazwa_uzytkownika = '" .
	$_POST['nazwa_uzytkownika'] . "' AND haslo = '" . $_POST['haslo'] . "';";
	
	$result = mysql_query($sql);
	$numrows = mysql_num_rows($result);
	
	if($numrows == 1) {
		$row = mysql_fetch_assoc($result);
		
		if($row['aktywne'] == 1) {
			//session_register("USERNAME");
			//session_register("USERID");
			
			$_SESSION['USERNAME'] = $row['nazwa_uzytkownika'];
			$_SESSION['USERID'] = $row['id'];
			
			switch($_GET['ref']) {
				case "newpost":
				if(isset($_GET['id']) == FALSE) {
					header("Location: " . $config_basedir . "/nowy_temat.php");
				}
				else {
					header("Location: " . $config_base_dir . "/nowy_temat.php?id=" . $_GET['id']);
				}
				break;
				
				case "reply":
					if(isset($_GET['id']) == FALSE) {
						header("Location: " . $config_basedir . "/nowy_temat.php");
					}
					else {
						header("Location: " . $config_basedir . "/nowy_temat.php?id=" . $_GET['id']);
					}
					break;
					
					default:
						header("Location: " . $config_basedir);
					break;
			}
		}
		else {
			//require("naglowek.php");
			echo "Konto nie zostalo jeszcze sprawdzone. W wiadomosci pocztowej wyslano odnosnik umozliwiajacy weryfikacje konta. Prosze kliknąć odnośnik po otrzymaniu wiadomości.";
			
		}
	}
	else {
		header("Location: " . $config_basedir . "/logowanie.php?error=1");
	}
}
else {
	//require("naglowek.php");
	
	if($_GET['error']) {
		echo "Logowanie sie nie powiodlo. prosze sprobowac ponownie!";
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
Nie posiadasz konta? <a href="rejestrowanie.php"> Zarejestruj sie!</a>

<?php
}
require("stopka.php");
?> 
