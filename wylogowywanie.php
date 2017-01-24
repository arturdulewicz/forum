<?php

session_start();

unset($_SESSION['USERNAME']);
require("konfiguracja.php");

header("Location: " . $config_basedir);

?>

