<?php

session_start();

unset($_SESSION['ADMIN']);
require("konfiguracja.php");

header("Location: " . $config_basedir);

?>

