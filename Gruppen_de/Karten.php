<!--Karten -->
<?php
	$kartenstapel = array("EinsSetzen", "EinsVerschieben", "EinsEntfernen", "ZweiSetzen", "ZweiVerschieben", "ZweiEntfernen", "DreiSetzen", "DreiVerschieben", "DreiEntfernen", "VierSetzen", "VierVerschieben", "VierEntfernen");
	$zufallszahl = rand(0,12);
	$karte = $kartenstapel[$zufallszahl];
	echo "<aside>";
		echo "<img src='Bilder/Kartenstapel.png' width='120' height='180' alt='Bild vom Kartenrücken'> <img src='Bilder/$karte.png' width='120' height='180' alt='Das ist deine Karte'>"; //<!-- Die gezogenen Handkarten können variiren -->
	echo "</aside>";
?>
