<?php
include("../includes/require.php");
if (isset($_SESSION['partie']))
{
    $partie = $_SESSION['partie'];
    $content = file_get_contents('php://input');
    print_r($content);
    if($content != "") {
        echo "\n";
        $json = json_decode($content);
        //if($json->funktion == "checkPlayer")
        echo "test".$partie->getSpielfeld()->javascriptAuswerten($json);
        echo "\n";
        print_r($json);
        echo "\n";
        print_r($partie->getSpielfeld()->felder);
    }else{
        $json["karte"] = $partie->karteAuswerten();
        $json["spieler"]  = $partie->getAktuellerSpieler()->getId();
        echo json_encode($json);
    }
}