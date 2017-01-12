<!Doctype html>
<?php
	include("functions.php");
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$nickname = filter_var($_POST['nickname'], FILTER_SANITIZE_STRING);
	$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
	$password = md5($password);

	print_r(db_query('INSERT into `User` (`email`, `nickname`, `password`) VALUES ("'.$email.'", "'.$nickname.'", "'.$password.'");'));
?>
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
			<?php include("../includes/Spielstein.html"); ?>


			<!-- IV Spiel starten -->
			<?php include("../includes/SpielStarten.php"); ?>
		</main>
	</body>
</html>
