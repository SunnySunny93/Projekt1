<!-- III Spielinformationen -->
<?php
	$karte = $getOffeneKarte();			//ToDo: Verknüpfung zu Datei.
	$katenName = $karte[1]; 				//gibt den Bildnamen aus;
	$spielerName = $getName();			//ToDo: Verknüpfung zu Datei.

	function anzahl($katenName) {
		$katenName = this->$katenName;
		if (strpos($katenName,"Eins")!==false) {
			return 1;
		} elseif (strpos($katenName,"Zwei")!==false) {
			return 2;
		} elseif (strpos($katenName,"Drei")!==false) {
			return 3;
		} elseif (strpos($katenName,"Vier")!==false) {
			return 4;
		} else {
			return false;
		}
	}
	$anzahl = anzahl($katenName);
	function mauer($katenName, $anzahl) {
		$katenName = $this->$katenName;
		$anzahl = $this->$anzahl;
		if (strpos($katenName,"Setzen")!==false){
			return "Setz $anzahl Mauerstück/e!";
		} elseif (strpos($katenName,"Verschieben")!==false) {
			return "Verschiebe $anzahl Mauerstück/e!";
		} elseif (strpos($katenName,"Entfernen")!==false) {
			return "Entferne $anzahl Mauerstück/e!";
		}
	}
	function ablauf($ablauf){
		switch ($ablauf) {
			case '1':
				"Ziehe eine Karte";
				break;
			case '2':
				"Setze deinen Stein oder schlage einen gegnerischen Spielstein";
				break;
			case '3':
				"Spiele deine Mauerkarte: " + mauer($katenName, $anzahl);				//Überprüfen ob das geht
				break;
			default:
				# code...
				break;
		}
	}

	$ablauftext = ablauf($ablauf);
	// $partie = array("Du", "Tom", "Anna", "Julia", "Chris", "Trudi"); //Nur zum ausprobieren
	// $zahl = rand(0,5);
	// $spieler = $partie[$zahl];
	// if ($spieler == "Du") {
	// 	$zugausgabe = "Du bist am Zug";
	// } else {
	// 	$zugausgabe = "$spieler ist am Zug";
	// }
	// $ablauf = rand(0,3);
	// //1: Karte ziehen, 2: Spielstein setzen, 3: Gegner schlagen, 4: Mauer setzen
	// if ($spieler == "Du"){
	// 	if ($ablauf == 0) {
	// 		$ablauftext = "Ziehe eine Karte!";
	// 	}
	// 	if ($ablauf == 1) {
	// 		$ablauftext = "Ziehe einen Stein!";
	// 	}
	// 	if ($ablauf == 2) {
	// 		$ablauftext = "Schlage einen Gegner!";
	// 	}
	// 	if ($ablauf == 3) {
	// 		$ablauftext = "Führe deine Mauerkarte aus!";
	// 	}
	// } else {
	// 	if ($ablauf == 0) {
	// 		$ablauftext = "$spieler zieht eine Karte!";
	// 	}
	// 	if ($ablauf == 1) {
	// 		$ablauftext = "$spieler zieht seinen Stein!";
	// 	}
	// 	if ($ablauf == 2) {
	// 		$ablauftext = "$spieler schlägt einen Gegner!";
	// 	}
	// 	if ($ablauf == 3) {
	// 		$ablauftext = "$spieler führt seine Mauerkarte aus!";
	// 	}
	// }

	echo "<header>";
		echo "<h2><label for='feedback'>$spielerName ist am Zug.</label> - <label for='ablauf'>$ablauftext</label><h2>";
	echo "</header>";
?>
