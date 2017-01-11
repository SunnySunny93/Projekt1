<?php
include("../includes/require.php");
if (isset($_SESSION['partie']))
{
    $partie = $_SESSION['partie'];
    $content = file_get_contents('php://input');
    print_r($content);
    if($content != "") {
        $json = json_decode($content);
        $partie->getSpielfeld()->mauerAuswerten($json);
        print_r($json);
        print_r($partie->getSpielfeld()->felder);
    }else{
        echo json_encode($partie->karteAuswerten());
    }
}