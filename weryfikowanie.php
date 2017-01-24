<?php
require("naglowek.php");

$verifystring = urldecode($_GET['verify']);
$verifyemail = urldecode($_GET['email']);

$sql = "SELECT id FROM uzytkownicy WHERE lancuch_weryfikacji = '" . $verifystring . "' AND email = '" . $verifyemail . "';";
$result = mysql_query($sql);
$numrows = mysql_num_rows($result);


if($numrows == 1)	{
	$row = mysql_fetch_assoc($result);
	
	$sql = "UPDATE uzytkownicy SET aktywne = 1 WHERE id = " . $row['id'];
	$result = mysql_query($sql);

	echo "Konto zostalo sprawdzone. Mozna sie <a href='logowanie.php'>zalogować</a>";
}
else {
	echo "Weryfikacja konta nie byla mozliwa.";
}

require("stopka.php");

?>

