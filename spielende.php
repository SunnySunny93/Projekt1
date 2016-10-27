<!Doctype html>
<html lang=de>
	<head>
		<Meta charset=utf-8 />
		<title>Spielfeld</title>
	</head>
	<body>
		<!-- I Spielende -->
		<h1> Du hast GEWONNEN! </h1>
		<!-- II Spielstatistik -->
		<?php include("/Gruppen_de/statistik.php"); ?>
		
		Das waren deine Mitspieler:
		<?php include("/Gruppen_de/Mitspieler.php"); ?>
		
		<?php include("/Gruppen_de/NeuesSpiel.html"); ?>
	</body>
</html>