<!--Karten -->
<?php
	$kartenstapel = array("MEntfernen", "MVerschieben", "EinsSetzen", "ZweiSetzen", "DreiSetzen", "VierSetzen");
	$zufallszahl = rand(0,5);
	$karte = $kartenstapel[$zufallszahl];
	print "<aside>";
		print "<img src='/Bilder/Kartenstapel.png' width='120' height='180' alt='Bild vom Kartenrücken'> <img src='/Bilder/$karte.png' width='120' height='180' alt='Das ist deine Karte'>"; //<!-- Die gezogenen Handkarten können variiren -->
	print "</aside>";
?>