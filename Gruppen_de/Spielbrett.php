<!-- Tabelle des Spielfelds dynamisch generiert -->
<!-- Wie kann hier ein echtes Wabenmuster als Spielfeld entstehen? -->
<!--
<?php
	$i = 17;
	echo "<table border='0' width=60%>";
	echo "<colgroup width='100' span='17'></colgroup>";
	while($i >0){
		$j = 17;
		echo "<tr align='center' valign='center'>";
		while($j >0){
			if($i % 2 == 0){
				echo "<td><img src='Bilder/Feld.png' width='50' border='0' alt='Feld'></td>"; //Nur zur Veranschaulichung gewählt
			} else {
				echo "<td><img src='Bilder/Feld2.png' width='50' border='0' alt='Feld'></td>";
			}
			$j -= 1;
		}
		echo "</tr>";
		$i -= 1;
	}
	echo "</table>";
	//while Schleife mit 2 Variablen zum Zählen der Zeilen und Spalten.
?>
-->

<!-- Tabelle des Spielfelds statisch -->
<?php
	$i = 17;
	echo "<table border='1' width=80% background='Bilder/Spielfeld.png' background-size=auto>";
	echo "<colgroup span='34'></colgroup>";
	while($i >0){
		echo "<tr align='center' valign='center'>";
		echo "<td colspan=34></td>";
		echo "</tr>";
		echo "<tr align='center' valign='center'>";
		if($i % 2 ==0){
			$j = 17;
			while($j >0) {
				echo "<td colspan=2>1</td>";
				$j -= 1;
			}
		} else {
			echo "<td colspan=1>0</td>";
			$j = 16;
			while($j >0) {
				echo "<td colspan=2>2</td>";
				$j -= 1;
			}
			echo "<td colspan=1>0</td>";
		}
		echo "</tr>";
		$i -= 1;
	}
	echo "</table>";
	//while Schleife mit 2 Variablen zum Zählen der Zeilen und Spalten.
?>
