<!-- IV Spiel Starten -->

<input type="button" value="Einem zufälligen Spiel beitreten">
<h2>Oder lade Freunde in eine Partie ein</h2>
<form>
<table>
	<tr>
		<td><label for="freund">Freund hinzufügen:</label></td> <td><input type="text" id="freund" name="freund"></td>
	</tr>
	<tr>
		<td></td><td><input type="submit" value="hinzufügen"</td>
	</tr>
</table>
</form>
<!-- Hier erscheinen die Mitspieler -->
<?php include("Mitspieler.php"); ?>

<input type="submit" value="Spiel starten">
