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
        echo "test".$partie->getSpielfeld()->mauerAuswerten($json);
        echo "\n";
        print_r($json);
        echo "\n";
        print_r($partie->getSpielfeld()->felder);
    }else{
        echo json_encode($partie->karteAuswerten());
    }
}