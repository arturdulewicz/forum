<?php
	error_reporting(0);
	session_start();
	 
	require("konfiguracja.php");
	
	$db = mysql_connect($dbhost, $dbuser, $dbpassword);
	mysql_select_db($dbdatabase, $db);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-2" />
		<title><?php echo $config_forumsname; ?></title>
		<link rel="stylesheet" href="arkusz_stylow.css" type="text/css" />
	</head>
	
	<tresc>
	<div id="header">
	<h1><?php echo $config_forumsname; ?></h1>
	<div id="menu">
	[<a href="index.php">Główna strona</a>]
	
	
<?php
	if(isset($_SESSION['USERNAME'])==TRUE){
		echo "[<a href='wylogowywanie.php'>Wylogowanie</a>]";
	}
	else {
		echo "[<a href='logowanie.php'>Logowanie</a>]";
		echo "[<a href='rejestrowanie.php'>Rejestrowanie</a>]";
	}
?>

[<a href="nowy_temat.php">Nowy temat</a>]
	</div></div>
<div id="main">
