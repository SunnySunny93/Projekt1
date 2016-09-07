<!Doctype html>
<html lang=de>
	<head>
		<Meta charset=utf-8 />
		<title>Spielfeld</title>
	</head>
	<body>
		<!-- III Spielinformationen -->
		<?php
			$spieler = "Du";
			if ($spieler == "Du") {
				$zugausgabe = "Du bist am Zug";
			} else {
				$zugausgabe = "$spieler ist am Zug";
			}
			$ablauf = array(1,2,3,4);
			//1: Karte ziehen, 2: Spielstein setzen, 3: Gegner schlagen, 4: Mauer setzen
			if ($spieler == "Du"){
				if ($ablauf[0]) {
					$ablauftext = "Ziehe eine Karte!";
				}
				if ($ablauf[1]) {
					$ablauftext = "Ziehe einen Stein!";
				}
				if ($ablauf[2]) {
					$ablauftext = "Schlage einen Gegner!";
				}
				if ($ablauf[3]) {
					$ablauftext = "Führe deine Mauerkarte aus!";
				}
			} else {
				if ($ablauf[0]) {
					$ablauftext = "$spieler zieht eine Karte!";
				}
				if ($ablauf[1]) {
					$ablauftext = "$spieler zieht seinen Stein!";
				}
				if ($ablauf[2]) {
					$ablauftext = "$spieler schlägt einen Gegner!";
				}
				if ($ablauf[3]) {
					$ablauftext = "$spieler führt seine Mauerkarte aus!";
				}
			}
		
		print "<header>";
			print "<h2><label for='feedback'>$zugausgabe</label> - <label for='ablauf'>$ablauftext</label><h2>";
		print "</header>";
		?>
		<!-- I Spielfeld -->
		<center>
			Hier entsteht das Spielfeld
			<?php include("/Gruppen_de/Spielbrett.php"); ?>
		</center>
		
		<!--Karten -->
		<aside>
			<img src="Kartenstapel.png" width="120" height="180" alt="Bild vom Kartenrücken"> <img src="Kartengezogen.png" width="120" height="180" alt="Das ist deine Karte"> <!-- Die gezogenen Handkarten können variiren -->
		</aside>
		
		Optionen
		<?php include("/Gruppen_de/Optionen.php"); ?>
	</body>
</html>