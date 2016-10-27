<!Doctype html>
<html lang=de>
	<head>
		<Meta charset=utf-8 />
		<title>Index</title>
	</head>
	<body>
		<main>
			<h1> Willkommen bei Dame 2.0 <h1>
			<h2> Login </h2> <!-- I Login -->
			<!-- Hier wird der Benutzername und das Passwort eingegeben
				 In Form einer Tabelle als bessere Übersicht -->
			<?php include("/Gruppen_de/Login.html"); ?>
			
			<h2> Noch keinen Account? </h2> <!-- V Account erstellen -->
			<?php include("/Gruppen_de/AccountE.php"); ?>
			
			<h2> Als Gast spielen </h2> <!-- II Gastzugang erstellen -->
			<?php include("/Gruppen_de/Gastzugang.php"); ?>
		</main>
	</body>

</html>