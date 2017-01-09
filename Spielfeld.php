<!Doctype html>
<html lang=de>
	<head>
		<Meta charset=utf-8 />
		<title>Spielfeld</title>
	</head>
	<body>
		<!-- III Spielinformationen -->
		<?php include("Gruppen_de/Spielinformation.php");?>
		<!-- I Spielfeld --><!--Karten -->
		<table>
		<tr>
			<td><?php include("Gruppen_de/Karten.php"); ?></td>
			<td><?php include("Gruppen_de/Spielfeld.php"); ?></td>
		</tr>
		
		Optionen
		<?php include("Gruppen_de/Optionen.php"); ?>
	</body>
</html>
