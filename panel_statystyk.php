<?php
	session_start();
	require("COUNT.php");
	require ("DISTINCT.php");
	require ("LIKE.php");
	require ("BETWEEN.php");
	require ("JOIN.php");
	require("naglowek.php");
	include("konfiguracja.php");
	
	$db = mysql_connect($dbhost, $dbuser, $dbpassword);
	mysql_select_db($dbdatabase, $db);
	
	if(isset($_SESSION['ADMIN']) == FALSE) {
	header("Location: " . $config_basedir . "/administrator.php");
	}
?>

<?php
if(isset($_POST['submit'])){
	
	$id_uzytkownika = $_POST['id_uzytkownika'];
	}
?>
<h1>Statystyki strony</h1>
<form method = "POST" action="panel_statystyk.php">
<table>
<tr>
<th>Wyswietl liczbe postow uzytkownika</th><th></th>
</tr>

<tr>
	<td>id_uzytkownika</td>
	<td><input type="text" name="id_uzytkownika"></td>
	
</tr>

<tr>
	<td></td>
	<td><input type="submit" name="submit" value="Wyswietl!"></td>
</tr>

<tr>
	<td>Liczba postow</td>
	<td><?php echo liczbaWiadomosciUzytkownika($id_uzytkownika) ?></td>
	
</tr>
<tr>
	<td>Imie</td>
	<td><?php echo imieUzytkownika($id_uzytkownika) ?></td>
	
</tr>



</table>

</br>

</form>
<table>
	<tr>	
		<th>Kategorie bez powtórzeń [DISTINCT]</th>
	</tr>
	
	<tr>
		<td>
			<?php echo kategorieBezPowtorzen()?>
		</td>
	</tr>
</table>
<?php
if(isset($_POST['submit1'])){
	
	$fraza = $_POST['fraza'];
	}
?>
</br>
<table>
<form method = "POST" action="panel_statystyk.php">
	<tr>	
		<th>Szukaj tematu po frazie</th><th></th>
	</tr>
	<tr>
	<td>Podaj szukaną frazę</td>
	<td><input type="text" name="fraza"></td>
	
</tr>
	<tr>
	<td>Znalezione tematy</td>
		<td>
			<?php
				szukajPoFrazie($fraza);
			?>
		</td>
	</tr>
	<tr>
	<td></td>
	<td><input type="submit" name="submit1" value="Wyswietl!"></td>
</tr>
</table>

<?php
if(isset($_POST['submit3'])){
	
	$d1 = $_POST['d1'];
	$g1 = $_POST['g1'];
	$d2 = $_POST['d2'];
	$g2 = $_POST['g2'];
	}
?>

</br>
<table>
<form method = "POST" action="panel_statystyk.php">
	<tr>	
		<th>Wyswietl posty od/do</th><th></th>
	</tr>
		<td>Od jakiego terminu</td>
		<td><input type="text" name="d1"></td>
	</tr>
	</tr>
		<tr>
		<td>GODZINA</td>
		<td><input type="text" name="g1"></td>
	</tr>
	</tr>
		<tr>
		<td>Od jakiego terminu</td>
		<td><input type="text" name="d2"></td>
	</tr>
	
	
	<tr>
		<td>GODZINA</td>
		<td><input type="text" name="g2"></td>
	</tr>
	<tr>
	<td>Znalezione tematy</td>
		<td>
			<?php
				$d = "2016-01-19";
				szukajPoDatach($d1,$d2,$g1,$g2);
			?>
		</td>
	</tr>
	<tr>
	<td></td>
	<td><input type="submit" name="submit3" value="Wyswietl!"></td>
</tr>
</table>
	
<table>
<tr><th>OPERACJA JOIN </th>
<th>Złączam wiadomosci.temat,wiadomosci.tresc,uzytkownicy.nazwa_uzytkownika</th>
<th></th>

</tr>
<form method = "POST" action="panel_statystyk.php">
	
		
			<?php fjoin() ;
			echo $num_rows2 ." ". $num_rows . $num_rows3 . "</br>";?>
		</td>
	</tr>

</table>




<?php
	require("stopka.php");
?>

