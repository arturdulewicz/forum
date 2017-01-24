</div>
<div id="footer">
&copy; 2017 <?php echo "<a href='mailto:" . $config_adminemail . "'>" .$config_admin . "</a>";

if(isset($_SESSION['ADMIN']) == TRUE){
	echo "[<a href='wylogowywanie_administratora.php'>Wylogowanie</a>]";
}
else {
	echo "[<a href='administrator.php'>Logowanie</a>]";
}
?>
</div>
</tresc>
</html>

