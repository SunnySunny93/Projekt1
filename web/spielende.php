<?php
include("../includes/require.php");
if (isset($_SESSION['partie'])) {
    $partie = $_SESSION['partie'];

    $spieler_tabelle = $partie->getSpielerList();
} else {
    $spieler_tabelle = "no session found";
}
?>
<!Doctype html>
<html lang=de>
	<head>
		<Meta charset=utf-8 />
		<title>Spielfeld</title>
	</head>
	<body>
		<!-- I Spielende -->
		<h1></h1>
		<!-- II Spielstatistik -->
        <!-- Spielstatistik -->
        <table>
            <tr>
                <td><label for="nummer">Partienummer:</label></td><td></td>
            </tr>
            <tr>
                <td><label for="datum">Gespielt am:</label></td><td></td>
            </tr>
            <tr>
                <td><label for="zuege">Gespielte Züge:</label></td><td></td>
            </tr>
            <tr>
                <td><label for="spielende">Zeit bis Spielende:</label></td><td></td>
            </tr>
            <tr>
                <td><label for="gesamtzeit">Gesamtzeit der Partie:</label></td><td></td>
            </tr>
        </table>

		Das waren deine Mitspieler:
		<?php echo $spieler_tabelle; ?>

		<a href="index.php">Neues Spiel</a>
	</body>
</html>
