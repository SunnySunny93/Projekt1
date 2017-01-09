
<?php
require_once "Klassen/Feld.php";
require_once "Klassen/Karte.php";
require_once "Klassen/Kartenstapel.php";
require_once "Klassen/Partie.php";
require_once "Klassen/Spieler.php";
require_once "Klassen/SpielFeld.php";
require_once "Klassen/SpielStein.php";
session_start();
if (isset($_SESSION['partie']))
{
    $partie = $_SESSION['partie'];
	$spielerliste = $partie->getSpieler();

?>
	<table>
		<tr>
			<th>Nummer</th><th>Spieler</th>
		</tr>
		<?php
      $nummer = 1;
			foreach ($spielerliste as $spieler) {
				echo "<tr>";
				echo "	<td>" . $nummer . "</td><td>" . $spieler->getName() . "</td>";
				echo "</tr>";
        $nummer+=1;
			}
		?>
	</table>

<?php

}else{
	echo "no session found";
}
