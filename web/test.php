<?php
  include("../includes/require.php");
//session_unset();

if (isset($_SESSION['partie']))
{
    $partie = $_SESSION['partie'];
}else{
    $spieler[] = new Spieler(1, "Jan", "../includes/spielericon.php?form=dreieck&farbe=72152b");
    $spieler[] = new Spieler(2, "Annika", "../includes/spielericon.php?form=kreis&farbe=255ca8");
    $spieler[] = new Spieler(3, "Andreas", "../includes/spielericon.php?form=quadrat&farbe=000000");
    $spieler[] = new Spieler(4, "Jenny", "../includes/spielericon.php?form=kreis&farbe=00ff00");
    $spieler[] = new Spieler(5, "Thomas", "../includes/spielericon.php?form=quadrat&farbe=ffa500");
    $spieler[] = new Spieler(6, "Kim", "../includes/spielericon.php?form=dreieck&farbe=817959");
    $partie = new Partie($spieler);
    $_SESSION['partie'] = $partie;
}

$html = $partie->getHtml();
?>

<!DOCTYPE html>
<html lang=de>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dame 2.0</title>
        <link rel="stylesheet" type="text/css" href="../includes/style.css" />
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
        <script src="../includes/functions.js"></script>
    </head>

    <body>
        <?php echo $html; ?>
    </body>


</html>
