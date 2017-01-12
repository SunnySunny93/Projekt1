<?php
include("../includes/require.php");
if(isset($_POST['email'])){
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $nickname = filter_var($_POST['nickname'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $password = md5($password);
}

//print_r(db_query('INSERT into `User` (`email`, `nickname`, `password`) VALUES ("'.$email.'", "'.$nickname.'", "'.$password.'");'));

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
    <Meta charset=utf-8/>
    <title>Einstellungen</title>
</head>
<body>
<main>
    <h1> Noch ein paar Einstellungen und dann kann es losgehen! </h1>
    <!-- V Spielregeln -->
    <h2> Die Spielregeln </h2>
    <a href="regeln.html" >Zu den Regeln</a>
    <form action="../includes/spielericon.php" method="GET">
        <h2>Welche Form soll dein Spielstein haben? </h2>
        <fieldset style="border: none;">
            <table>
                <tr>
                    <td><input type="radio" id="kreis" name="form" value="kreis" checked="checked"><label for="kreis"> Keis</label>
                    </td>
                    <td><img src="../includes/spielericon.php?form=kreis&farbe=%23000000"
                             height=50 alt="Bild vom Kreis"><!-- Bilddatei für Stein hier einfügen --></td>
                </tr>
                <tr>
                    <td><input type="radio" id="quadrat" name="form" value="quadrat"><label for="quadrat">
                            Quadrat</label></td>
                    <td>
                        <img src="../includes/spielericon.php?form=quadrat&farbe=%23000000"
                             height=50 alt="Bild vom Q uadrat"><!-- Bild datei fü r Stein hier einfügen --></td>
                </tr>
                <tr>
                    <td><input type="radio" id="dreieck" name="form" value="dreieck"><label for="dreieck">
                            Dreieck</label></td>
                    <td>
                        <img src="../includes/spielericon.php?form=dreieck&farbe=%23000000"
                             height=50 alt="Bild vom Dreieck"><!-- Bilddatei für Stein hier einfügen --></td>
                </tr>
            </table>
        </fieldset>
        <h2>Und nun noch eine Farbe:</h2>
        <input type="color" name="farbe" value="#ff0000">

        <input type="submit" value="Generiere Spielstein">
    </form>


    <!-- IV Spiel starten -->
    <h2>Spiele ein Spiel gegen zufällige andere Spieler</h2>
    <input type="button" value="Einem zufälligen Spiel beitreten">
    <h2>Oder lade Freunde in eine Partie ein</h2>
    <form>
        <table>
            <tr>
                <td><label for="freund">Freund hinzufügen:</label></td>
                <td><input type="text" id="freund" name="freund"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="hinzufügen"</td>
            </tr>
        </table>
    </form>
    <!-- Hier erscheinen die Mitspieler -->
    <?php echo $spieler_tabelle; ?>

    <a href="spiel.php">Spiel Starten</a>
</main>
</body>
</html>
