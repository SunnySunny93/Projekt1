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

print_r($_SESSION['partie']);
if (isset($_SESSION['partie']))
{
    $partie = $_SESSION['partie'];
}else{
    $spieler[] = new Spieler(0, "Jan");
    $spieler[] = new Spieler(1, "Test1");
    $spieler[] = new Spieler(2, "Test2");
    $spieler[] = new Spieler(3, "Test3");
    $spieler[] = new Spieler(4, "Test4");
    $spieler[] = new Spieler(5, "Test5");
    $partie = new Partie($spieler);
    $_SESSION['partie'] = $partie;
}

$partie->getHtml();
