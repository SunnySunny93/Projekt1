<!-- Tabelle des Spielfelds dynamisch generiert -->
<!-- Wie kann hier ein echtes Wabenmuster als Spielfeld entstehen? -->
<!-- 
<?php
	$i = 17;
	print "<table border='0' width=60%>";
	print "<colgroup width='100' span='17'></colgroup>";
	while($i >0){
		$j = 17;
		print "<tr align='center' valign='center'>";
		while($j >0){
			if($i % 2 == 0){
				print "<td><img src='/Bilder/Feld.png' width='50' border='0' alt='Feld'></td>"; //Nur zur Veranschaulichung gewählt
			} else {
				print "<td><img src='/Bilder/Feld2.png' width='50' border='0' alt='Feld'></td>";
			}
			$j -= 1;
		}
		print "</tr>";
		$i -= 1;
	}
	print "</table>";
	//while Schleife mit 2 Variablen zum Zählen der Zeilen und Spalten.
?> 
-->

<!-- Tabelle des Spielfelds statisch -->
<?php
	$i = 17;
	print "<table border='1' width=80% background='/Bilder/Spielfeld.png' background-size=auto>";
	print "<colgroup span='34'></colgroup>";
	while($i >0){
		print "<tr align='center' valign='center'>";
		print "<td colspan=34></td>";
		print "</tr>";
		print "<tr align='center' valign='center'>";
		if($i % 2 ==0){
			$j = 17;
			while($j >0) {
				print "<td colspan=2>1</td>";
				$j -= 1;
			}
		} else {
			print "<td colspan=1>0</td>";
			$j = 16;
			while($j >0) {
				print "<td colspan=2>2</td>";
				$j -= 1;
			}
			print "<td colspan=1>0</td>";
		}
		print "</tr>";
		$i -= 1;
	}
	print "</table>";
	//while Schleife mit 2 Variablen zum Zählen der Zeilen und Spalten.
?>

