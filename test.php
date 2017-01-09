<?php
require_once "Klassen/Feld.php";
require_once "Klassen/Karte.php";
require_once "Klassen/Kartenstapel.php";
require_once "Klassen/Partie.php";
require_once "Klassen/Spieler.php";
require_once "Klassen/SpielFeld.php";
require_once "Klassen/SpielStein.php";
session_start();
//session_unset();

if (isset($_SESSION['partie']))
{
    $partie = $_SESSION['partie'];
}else{
    $spieler[] = new Spieler(0, "Jan");
    $spieler[] = new Spieler(1, "Annika");
    $spieler[] = new Spieler(2, "Andreas");
    $spieler[] = new Spieler(3, "Jenny");
    $spieler[] = new Spieler(4, "Thomas");
    $spieler[] = new Spieler(5, "Kim");
    $partie = new Partie($spieler);
    $_SESSION['partie'] = $partie;
}

$html = $partie->getHtml();
$partie->nextTurn();
?>

<!DOCTYPE html>
<html lang=de>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dame 2.0</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    </head>

    <body>
        <?php echo $html; ?>
    </body>

</html>
