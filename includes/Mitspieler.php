<?php 
  include("require.php");
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
