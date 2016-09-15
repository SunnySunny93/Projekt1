<!Doctype html>
<html lang=de>
	<head>
		<Meta charset=utf-8 />
		<title>Spielfeld</title>
	</head>
	<body>
		<!-- III Spielinformationen -->
		<?php
			$partie = array("Du", "Tom", "Anna", "Julia", "Chris", "Trudi"); //Nur zum ausprobieren
			$zahl = rand(0,5);
			$spieler = $partie[$zahl];
			if ($spieler == "Du") {
				$zugausgabe = "Du bist am Zug";
			} else {
				$zugausgabe = "$spieler ist am Zug";
			}
			$ablauf = rand(0,3);
			//1: Karte ziehen, 2: Spielstein setzen, 3: Gegner schlagen, 4: Mauer setzen
			if ($spieler == "Du"){
				if ($ablauf == 0) {
					$ablauftext = "Ziehe eine Karte!";
				}
				if ($ablauf == 1) {
					$ablauftext = "Ziehe einen Stein!";
				}
				if ($ablauf == 2) {
					$ablauftext = "Schlage einen Gegner!";
				}
				if ($ablauf == 3) {
					$ablauftext = "Führe deine Mauerkarte aus!";
				}
			} else {
				if ($ablauf == 0) {
					$ablauftext = "$spieler zieht eine Karte!";
				}
				if ($ablauf == 1) {
					$ablauftext = "$spieler zieht seinen Stein!";
				}
				if ($ablauf == 2) {
					$ablauftext = "$spieler schlägt einen Gegner!";
				}
				if ($ablauf == 3) {
					$ablauftext = "$spieler führt seine Mauerkarte aus!";
				}
			}
		
		print "<header>";
			print "<h2><label for='feedback'>$zugausgabe</label> - <label for='ablauf'>$ablauftext</label><h2>";
		print "</header>";
		?>
		<!-- I Spielfeld -->
		<center>
			<?php include("/Gruppen_de/Spielbrett.php"); ?>
		</center>
		
		<!--Karten -->
		<?php
			$kartenstapel = array("MEntfernen", "MVerschieben", "EinsSetzen", "ZweiSetzen", "DreiSetzen", "VierSetzen");
			$zufallszahl = rand(0,5);
			$karte = $kartenstapel[$zufallszahl];
			print "<aside>";
				print "<img src='/Bilder/Kartenstapel.png' width='120' height='180' alt='Bild vom Kartenrücken'> <img src='/Bilder/$karte.png' width='120' height='180' alt='Das ist deine Karte'>"; //<!-- Die gezogenen Handkarten können variiren -->
			print "</aside>";
		?>
		Optionen
		<?php include("/Gruppen_de/Optionen.php"); ?>
	</body>
</html>