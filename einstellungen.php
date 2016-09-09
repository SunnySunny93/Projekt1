<!Doctype html>
<html lang=de>
	<head>
		<Meta charset=utf-8 />
		<title>Einstellungen</title>
	</head>
	<body>
		<main>
			<h1> Noch ein paar Einstellungen und dann kann es losgehen! </h1>
			<!-- III Spielregeln -->
			<h2> Die Spielregeln </h2>
			<?php include("/Gruppen_de/Regeln.php"); ?>
			
			<h2> Wie soll dein Spielstein aussehen? </h2>
			<?php
				if( ! isset ( $_POST['spielstein'])){
					$spielsteinausgabe = "Wähle deinen Spielstein";
				} else {
					$spielstein = .$_POST['spielstein'];
					$farbe = .$_POST['farbe'];
					$spielsteinausgabe = "Du hast einen $farbe $spielstein gewählt";
				}
			?>
			<h2>
			<?php print $spielsteinausgabe ?>
			</h2>
			<form action="<?php print $_SERVER['PHP_SELF']?>" method="post">
			
			<fieldset>
				<table>
					<tr>
						<td><input type="radio" id="kreis" name="spielstein" value="kreis"><label for="spielstein"> Keis</label></td><td><img src="kreis.png" alt="Bild vom Kreis"><!-- Bilddatei für Stein hier einfügen --></td>
					</tr>
					<tr>
						<td><input type="radio" id="quadrat" name="spielstein" value="quadrat"><label for="spielstein"> Quadrat</label></td><td><img src="quadrat.png" alt="Bild vom Quadrat"><!-- Bilddatei für Stein hier einfügen --></td>
					</tr>
					<tr>
						<td><input type="radio" id="dreieck" name="spielstein" value="dreieck"><label for="spielstein"> Dreieck</label></td><td><img src="dreieck.png" alt="Bild vom Dreieck"><!-- Bilddatei für Stein hier einfügen --></td>
					</tr>
				</table>
			</fieldset>
			<h2>Und nun noch eine Farbe:</h2>
			<input type="color" name="farbe" value="#ff0000">
			
			
			<input type="submit" value="Generiere Spielstein">
			</form>
			<!-- Bilddatei mit dem Fertigen Spielstein -->
			
			<!-- IV Spiel starten -->
			<table>
				<tr>
					<td><label for="freund">Freund hinzufügen:</label></td> <td><input type="text" id="freund" name="freund"></td>
				</tr>
				<tr>
					<td></td><td><input type="submit" value="hinzufügen"</td>
				</tr>
			</table>
			
			<h2>Spiele ein Spiel gegen zufällige andere Spieler</h2>
			<input type="button" value="Einem zufälligen Spiel beitreten">
			<h2>Oder lade Freunde in eine Partie ein</h2>
			
			<!-- Hier erscheinen die Mitspieler -->
			<?php include("/Gruppen_de/Mitspieler.php"); ?>
			
			<input type="submit" value="Spiel starten">
		</main>
	</body>
</html>