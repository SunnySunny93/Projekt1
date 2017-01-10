<?php

$html = "";

$html .= "<div style=\"float: left; width: 100%;\">";

$rows = 15;
$cols = 8;
$span = 7;
$operator = 1;
$internal_id = 0;

for($row = 1;$row <= $rows;$row++) {
    if($cols % 2 == 0){
        $even = " even";
    }else{
        $even = "";
    }
    $html .= "<div class=\"hex-row" . $even . "\">";
    $parity = floor(($rows - $cols) / 2);
    for($p = 1; $p <= $parity; $p++){
        $html .= "<div class=\"hex invisible\"><div class=\"top\"></div><div class=\"middle\"></div><div class=\"bottom\"></div></div>";// add invisible hexagons
    }
    for($col = 1;$col <= $cols;$col++) {
        $internal_id++;
        $id = $row . sprintf('%02d', $col);
        //$html .= "<td class=feld colspan=2 id=$internal_id>$id</td>";
        $html .= "<div class=\"hex\"><div class=\"top\"></div><div class=\"middle\" style=\"text-align: center\">" . $id . " </div><div class=\"bottom\"></div></div>";
    }
    $html .= $span != 0 ? "<td colspan=$span></td>" : "";
    $html .= "</div>";
    if($cols >= $rows){
        $operator = -1;
    }
    $cols += $operator;
    $span -= $operator;

}

$html .= "</div>";

?>

<!DOCTYPE html>
<html lang=de>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HEXTEST</title>
    <style>

    </style>
</head>

<body>
    <?php echo $html; ?>
    <!-- <div style="float: left; width: 100%;">
        <div class="hex-row even">
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
        </div>
        <div class="hex-row">
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
        </div>
        <div class="hex-row even">
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
        </div>
        <div class="hex-row">
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
        </div>
        <div class="hex-row even">
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
        </div>
        <div class="hex-row">
            <div class="hex invisible">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
        </div>
        <div class="hex-row even">
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
        </div>
        <div class="hex-row">
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
        </div>
        <div class="hex-row even">
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
        </div>
        <div class="hex-row">
            <div class="hex invisible">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
        </div>
        <div class="hex-row even">
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
        </div>
        <div class="hex-row">
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
        </div>
        <div class="hex-row even">
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
        </div>
        <div class="hex-row">
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
        </div>
        <div class="hex-row even">
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
            </div>
        </div>
    </div> -->
</body>

</html>
