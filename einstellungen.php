<!Doctype html>
<html lang=de>
	<head>
		<Meta charset=utf-8 />
		<title>Einstellungen</title>
	</head>
	<body>
		<main>
			<h1> Noch ein paar Einstellungen und dann kann es losgehen! </h1>
			<!-- V Spielregeln -->
			<h2> Die Spielregeln </h2>
			<form action= "Gruppen_de/Regeln.html">
				<input type="submit" value="Zu den Regeln">
			</form>
			<h2> Wie soll dein Spielstein aussehen? </h2>
			<?php include("Gruppen_de/spielstein.html"); ?>
			
			
			<!-- IV Spiel starten -->
			
			<h2>Spiele ein Spiel gegen zufällige andere Spieler</h2>
			<?php include("Gruppen_de/SpielStarten.php"); ?>
		</main>
	</body>
</html>