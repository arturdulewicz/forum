<?php
error_reporting(0);
session_start();
require("naglowek.php");
require("konfiguracja.php");

$db = mysql_connect($dbhost, $dbuser, $dbpassword);
mysql_select_db($dbdatabase, $db);

if($_POST['submit']) {
	if($_POST['password1'] == $_POST['password2']){
		$checksql = "SELECT * FROM uzytkownicy WHERE nazwa_uzytkownika = '" .
		$_POST['nazwa_uzytkownika'] . "';";
		$checkresult = mysql_query($checksql);
		$checknumrows = mysql_num_rows($checkresult);
		
		if($checknumrows == 1) {
			header("Location: " . $config_basedir .
			"/rejestrowanie.php?error=taken");
		}
		else {
			for($i=0; $i < 16; $i++) {
				$randomstring .= chr(mt_rand(32,126));
			}
			
			$verifyurl = "http://localhost/weryfikowanie.php";
			$verifystring = urlencode($randomstring);
			$verifyemail = urlencode($_POST['email']);
			$validusername = $_POST['nazwa_uzytkownika'];
			
			$sql = "INSERT INTO uzytkownicy(nazwa_uzytkownika, haslo, email, lancuch_weryfikacji, aktywne) VALUES('" 
			. $_POST['nazwa_uzytkownika']
			. "', '" . $_POST['password1']
			. "', '" . $_POST['email']
			. "', '" . addslashes($randomstring)
			. "', 0);";
			echo $sql;
			mysql_query($sql);
			
			//skladnia heredoc
			$mail_body = "text";
			//$mail_body= <<<EMAIL 
		//	Witaj $validusername 
			//W celu weryfikacji nowego konta kliknij poniższy odnośnik:
			//$verifyurl?email=$verifyemail&verify=$verifystring EMAIL;
			
			
				mail($_POST['email'], $config_forumsname . "Weryfikacja konta uzytkownika", $mail_body);
				
				//require("naglowek.php");
				echo "Odnośnik wysłano pod podany adres email. W celu weryfikacji konta należy kliknąć odnośnik zawarty w wiadomości pocztowej.";
		}
	}
	else {
		header("Location: " . $config_basedir . "/rejestrowanie.php?error=pass");
	}
}

else {
	
	//require("naglowek.php");
	
	switch($_GET['error']) {
		case "pass":
			echo "Brak zgodności haseł!";
		break;
		
		case "taken":
			echo "Takie konto już istnieje. Prosze podać inne.";
		break;
		
		case "no":
			echo "Niepoprawne dane logowania!";
		break;
	}
?>

<h2>Rejestrowanie</h2>
W celu zarejestrowania się na froum <?php echo $config_forumsname; ?> 
należy wypełnić poniższy formularz.
<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="POST">
<table>
<tr>
	<td>Nazwa uzytkownika</td>
	<td><input type="text" name="nazwa_uzytkownika"></td>
</tr>
<tr>
	<td>Hasło</td>
	<td><input type="password" name="password1"></td>
</tr>
<tr>
	<td>Hasło (ponownie)</td>
	<td><input type="password" name="password2"></td>
</tr>
<tr>
	<td>E-mail</td>
	<td><input type="text" name="email"></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" name="submit" value="Zarejestruj się!"></td>
</tr>
</table>
</form>
<?php
}

	require("stopka.php");

	?>
	

