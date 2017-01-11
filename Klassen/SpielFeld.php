<?php

class SpielFeld
{
    /**
     * @var array
     */
    private $feldbelegung = array(
        0 => "Sperrfeld",
        1 => 0,
        2 => 0,
        3 => 0,
        4 => 0,
        5 => 0,
        6 => 0,
        7 => "Sperrfeld",
        16 => 1,
        26 => 1,
        37 => 1,
        49 => 1,
        62 => 1,
        76 => 1,
        91 => "Sperrfeld",
        8 => 5,
        17 => 5,
        27 => 5,
        38 => 5,
        50 => 5,
        63 => 5,
        77 => "Sperrfeld",
        92 => 4,
        106 => 4,
        119 => 4,
        131 => 4,
        142 => 4,
        152 => 4,
        161 => "Sperrfeld",
        162 => 3,
        163 => 3,
        164 => 3,
        165 => 3,
        166 => 3,
        167 => 3,
        168 => "Sperrfeld",
        105 => 2,
        118 => 2,
        130 => 2,
        141 => 2,
        151 => 2,
        160 => 2);

    /**
     * @var Feld[]
     */
    public $felder;

    /**
     * SpielFeld constructor.
     * @param array $spieler
     * @param array $felder
     * @param Kartenstapel $kartenstapel
     */
    public function __construct($spieler, $felder = NULL, $kartenstapel = NULL)
    {
        if ($felder == NULL) {
            for ($i = 0; $i <= 169; $i++) {
                $this->felder[] = new Feld($i, "");
            }
            foreach ($this->feldbelegung AS $index => $feldbelegung) {
                if ($feldbelegung !== "Sperrfeld") {
                    $feldbelegung = new SpielStein($spieler[$feldbelegung]);
                }
                $this->felder[$index]->setBelegung($feldbelegung);
            }
        }
    }

    /**
     * @return string
     */
    public function getSpielfeldHtml()
    {
        $html = "";

        $html .= "<div style=\"float: left; width: 100%;\">";

        $rows = 15;
        $cols = 8;
        $span = 7;
        $operator = 1;
        $internal_id = 0;

        for ($row = 1; $row <= $rows; $row++) {
            if ($cols % 2 == 0) {
                $even = " even";
            } else {
                $even = "";
            }
            $html .= "<div class=\"hex-row" . $even . "\">";
            $parity = floor(($rows - $cols) / 2);
            for ($p = 1; $p <= $parity; $p++) {
                $html .= "<div class=\"hex invisible\"><div class=\"top\"></div><div class=\"middle\"></div><div class=\"bottom\"></div></div>";// add invisible hexagons
            }
            for ($col = 1; $col <= $cols; $col++) {
                $class = "default";
                //$id = $row . sprintf('%02d', $col);
                $feldbelegung = $this->felder[$internal_id]->getBelegung();
                if ($feldbelegung instanceof SpielStein) {
                    $icon = "<img class=\"spielericon spieler" . $feldbelegung->getSpieler()->getId() . "\" src=\"" . $feldbelegung->getIcon() . "\" /> ";
                } elseif ($feldbelegung == "Sperrfeld") {
                    $class = "sperrfeld";
                    $icon = "";
                } elseif ($feldbelegung == "Mauer") {
                    $class = "wall";
                    $icon = "";
                } else {
                    $icon = "";
                }
                $html .= "<div class=\"hex " . $class . "\" id=\"" . $internal_id . "\" ><div class=\"top\"></div><div class=\"middle\" style=\"text-align: center\">" . $icon . "</div><div class=\"bottom\"></div></div>";
                $internal_id++;
            }
            $html .= $span != 0 ? "<td colspan=$span></td>" : "";
            $html .= "</div>";
            if ($cols >= $rows) {
                $operator = -1;
            }
            $cols += $operator;
            $span -= $operator;
        }
        $html .= "</div>";
        return $html;
    }

    /**
     * @param array $json
     */
    public function javasriptAuswerten($json)
    {
        if($json->funktion == "ziehen"){
            $this->spielerZieht($json->list[0], $json->list[1]);
        }else{
            $this->mauerAuswerten($json);
        }
    }

    /**
     * @param array $json
     */
    public function mauerAuswerten($json)
    {
        $funktion = $json->funktion;
        $liste = $json->liste;
        $anzahl = sizeof($liste);
        if ($funktion == "setzen") {
            for ($i = 0; $i < $anzahl; $i++) {
                $this->setzen($liste[$i]);
            }
        }
        if ($funktion == "entfernen") {
            for ($i = 0; $i < $anzahl; $i++) {
                $this->entfernen($liste[$i]);
            }
        }
        if ($funktion == "verschieben") {
            for ($i = 0; $i < $anzahl / 2; $i++) {              //geht das mit anzahl/2 ????
                $this->entfernen($liste[$i]);
            }
            for ($i = $anzahl / 2; $i < $anzahl; $i++) {
                $this->setzen($liste[$i]);
            }
        }
    }

    /**
     * @param int $feldId
     */
    private function setzen($feldId)
    {
        $this->felder[$feldId]->setBelegung('Mauer');
    }

    /**
     * @param int $feldId
     */
    private function entfernen($feldId)
    {
        $this->felder[$feldId]->setBelegung('');
    }

    /**
     * @param integer $haus
     * @return array
     */
    private function getHaus($haus)
    {
        $hausEins = array(101, 102, 103, 104, 105, 106, 107, 108, 201, 202, 203, 204, 205, 206, 207, 208, 209, 301, 302, 303, 304, 305, 306, 307, 308, 309, 310, 401, 402, 403, 404, 405, 406, 407, 408, 409, 410, 411, 501, 502, 503, 504, 505, 506, 507, 508, 509, 510, 511, 512, 601, 602, 603, 604, 605, 606, 607, 608, 609, 610, 611, 612, 613, 701, 702, 703, 704, 705, 706, 707, 708, 709, 710, 711, 712, 713, 714, 801, 802, 803, 804, 805, 806, 807, 808, 809, 810, 811, 812, 813, 814, 815, 901, 902, 903, 904, 905, 906, 907, 908, 909, 910, 911, 912, 913, 914, 1001, 1002, 1003, 1004, 1005, 1006, 1007, 1008, 1009, 1010, 1011, 1012, 1013, 1101, 1102, 1103, 1104, 1105, 1106, 1107, 1108, 1109, 1110, 1111, 1112, 1201, 1202, 1203, 1204, 1205, 1206, 1207, 1208, 1209, 1210, 1211, 1301, 1302, 1303, 1304, 1305, 1306, 1307, 1308, 1309, 1310, 1401, 1402, 1403, 1404, 1405, 1406, 1407, 1408, 1409, 1501, 1502, 1503, 1504, 1505, 1506, 1507, 1508);
        $hausZwei = array(801, 701, 601, 501, 401, 301, 201, 101, 901, 802, 702, 602, 502, 402, 302, 202, 102, 1001, 902, 803, 703, 603, 503, 403, 303, 203, 103, 1101, 1002, 903, 804, 704, 604, 504, 404, 304, 204, 104, 1201, 1102, 1003, 904, 805, 705, 605, 505, 405, 305, 205, 105, 1301, 1202, 1103, 1004, 905, 806, 706, 606, 506, 406, 306, 206, 106, 1401, 1302, 1203, 1104, 1005, 906, 807, 707, 607, 507, 407, 307, 207, 107, 1501, 1402, 1303, 1204, 1105, 1006, 907, 808, 708, 608, 508, 408, 308, 208, 108, 1502, 1403, 1304, 1205, 1106, 1007, 908, 809, 709, 609, 509, 409, 309, 209, 1503, 1404, 1305, 1206, 1107, 1008, 909, 810, 710, 610, 510, 410, 310, 1504, 1405, 1306, 1207, 1108, 1009, 910, 811, 711, 611, 511, 411, 1505, 1406, 1307, 1208, 1109, 1010, 911, 812, 712, 612, 512, 1506, 1407, 1308, 1209, 1110, 1011, 912, 813, 713, 613, 1507, 1408, 1309, 1210, 1111, 1012, 913, 814, 714, 1508, 1409, 1310, 1211, 1112, 1013, 914, 815);
        $hausDrei = array(1501, 1401, 1301, 1201, 1101, 101, 901, 801, 1502, 1402, 1302, 1202, 1102, 1002, 902, 802, 701, 1503, 1403, 1303, 1203, 1103, 1003, 903, 803, 702, 601, 1504, 1404, 1304, 1204, 1104, 1004, 904, 804, 703, 602, 501, 1505, 1405, 1305, 1205, 1105, 1005, 905, 805, 704, 603, 502, 401, 1506, 1406, 1306, 1206, 1106, 1006, 906, 806, 705, 604, 503, 402, 301, 1507, 1407, 1307, 1207, 1107, 107, 907, 807, 706, 605, 504, 403, 302, 201, 1508, 1408, 1308, 1208, 1108, 1008, 908, 808, 707, 606, 505, 404, 303, 202, 101, 1409, 1309, 1209, 1109, 1009, 909, 809, 708, 607, 506, 405, 304, 203, 102, 1310, 1210, 1110, 1010, 910, 810, 709, 608, 507, 406, 305, 204, 103, 1211, 1111, 1011, 911, 811, 710, 609, 508, 407, 306, 205, 104, 1112, 1012, 912, 812, 711, 610, 509, 408, 307, 206, 105, 1013, 913, 813, 712, 611, 510, 409, 308, 207, 106, 914, 814, 713, 612, 511, 410, 309, 208, 107, 815, 714, 613, 512, 411, 310, 209, 108);
        $hausVier = array(1508, 1507, 1506, 1505, 1504, 1503, 1502, 1501, 1409, 1408, 1407, 1406, 1405, 1404, 1403, 1402, 1401, 1310, 1309, 1308, 1307, 1306, 1305, 1304, 1303, 1302, 1301, 1211, 1210, 1209, 1208, 1207, 1206, 1205, 1204, 1203, 1202, 1201, 1112, 1111, 1110, 1109, 1108, 1107, 1106, 1105, 1104, 1103, 1102, 1101, 1013, 1012, 1011, 1010, 1009, 1008, 1007, 1006, 1005, 1004, 1003, 1002, 1001, 914, 913, 912, 911, 910, 909, 908, 907, 906, 905, 904, 903, 902, 901, 815, 814, 813, 812, 811, 810, 809, 808, 807, 806, 805, 804, 803, 802, 801, 714, 713, 712, 711, 710, 709, 708, 707, 706, 705, 704, 703, 702, 701, 613, 612, 611, 610, 609, 608, 607, 606, 605, 604, 603, 602, 601, 512, 511, 510, 509, 508, 507, 506, 505, 504, 503, 502, 501, 411, 410, 409, 408, 407, 406, 405, 404, 403, 402, 401, 310, 309, 308, 307, 306, 305, 304, 303, 302, 301, 209, 208, 207, 206, 205, 204, 203, 202, 201, 108, 107, 106, 105, 104, 103, 102, 101);
        $hausFuenf = array(815, 914, 1013, 1112, 1211, 1310, 1409, 1508, 714, 814, 913, 1012, 1111, 1210, 1309, 1408, 1507, 613, 713, 813, 912, 1011, 1110, 1209, 1308, 1407, 1506, 512, 612, 712, 812, 911, 1010, 1109, 1208, 1307, 1406, 1505, 411, 511, 611, 711, 811, 910, 1009, 1108, 1207, 1306, 1405, 1504, 310, 410, 510, 610, 710, 810, 909, 1008, 1107, 1206, 1305, 1404, 1503, 209, 309, 409, 509, 609, 709, 809, 908, 1007, 1106, 1205, 1304, 1403, 1502, 108, 208, 308, 408, 508, 608, 708, 808, 907, 1006, 1105, 1204, 1303, 1402, 1501, 107, 207, 307, 407, 507, 607, 707, 807, 906, 1005, 1104, 1203, 1302, 1401, 106, 206, 306, 406, 506, 606, 706, 806, 905, 1004, 1103, 1202, 1301, 105, 205, 305, 405, 505, 605, 705, 805, 904, 1003, 1102, 1201, 104, 204, 304, 404, 504, 604, 704, 804, 903, 1002, 1101, 103, 203, 303, 403, 503, 603, 703, 803, 902, 1001, 102, 202, 302, 402, 502, 602, 702, 802, 901, 101, 201, 301, 401, 501, 601, 701, 801);
        $hausSechs = array(108, 209, 310, 411, 512, 613, 714, 815, 107, 208, 309, 410, 511, 612, 713, 814, 914, 106, 207, 308, 409, 510, 611, 712, 813, 913, 1013, 105, 206, 307, 408, 509, 610, 711, 812, 912, 1012, 1112, 104, 205, 306, 407, 508, 609, 710, 811, 911, 1011, 1111, 1211, 103, 204, 305, 406, 507, 608, 709, 810, 910, 1010, 1110, 1210, 1310, 102, 203, 304, 405, 506, 607, 708, 809, 909, 1009, 1109, 1209, 1309, 1409, 101, 202, 303, 404, 505, 606, 707, 808, 908, 1008, 1108, 1208, 1308, 1408, 1508, 201, 302, 403, 504, 605, 706, 807, 907, 107, 1107, 1207, 1307, 1407, 1507, 301, 402, 503, 604, 705, 806, 906, 1006, 1106, 1206, 1306, 1406, 1506, 401, 502, 603, 704, 805, 905, 1005, 1105, 1205, 1305, 1405, 1505, 501, 602, 703, 804, 904, 1004, 1104, 1204, 1304, 1404, 1504, 601, 702, 803, 903, 1003, 1103, 1203, 1303, 1403, 1503, 701, 802, 902, 1002, 1102, 1202, 1302, 1402, 1502, 801, 901, 101, 1101, 1201, 1301, 1401, 1501);

        switch ($haus) {
            case 1:
                return $hausEins;
                break;
            case 2:
                return $hausZwei;
                break;
            case 3:
                return $hausDrei;
                break;
            case 4:
                return $hausVier;
                break;
            case 5:
                return $hausFuenf;
                break;
            case 6:
                return $hausSechs;
                break;
            default:
                # code...
                break;
        }
    }

    private function damePruefen($ziel) //was muss übergeben werden?
    {
        $dame = false;
        $belegung = $this->felder[$ziel]->getBelegung();
        if ($belegung instanceof SpielStein) {
            $dame = $belegung->isDame();
        }
        return $dame;
    }

    /**
     * @param int $start
     * @param int $ziel
     * @param int $haus
     * @return bool
     */
    private function isNachbar($start, $ziel, $haus)
    {
        $dame = $this->damePruefen($ziel);
        $startid = $this->felder[$start]->getId();
        $zielid = $this->felder[$ziel]->getId();
        $hausArray = $this->getHaus($haus);
        $startPunkt = $hausArray[$startid];
        $zielPunkt = $hausArray[$zielid];
        if ($dame) {
            if ($startPunkt < 800) {
                $nachbarn = array($startPunkt + 1, $startPunkt - 1, $startPunkt + 100, $startPunkt - 100, $startPunkt + 101, $startPunkt - 101); //Potentielle Nachbarn
            } else {
                $nachbarn = array($startPunkt + 1, $startPunkt - 1, $startPunkt + 100, $startPunkt - 100, $startPunkt + 99, $startPunkt - 99);
            }
        } else {
            if ($startPunkt < 800) {
                $nachbarn = array($startPunkt + 100, $startPunkt + 101);
            } else {
                $nachbarn = array($startPunkt + 100, $startPunkt + 99);
            }
        }
        if (array_search($zielPunkt, $nachbarn) != false) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param int $feldId
     * @param int $spielerId
     * @return bool
     */
    public function isRichtigerSpielstein($feldId, $spielerId)
    {
        $belegung = $this->felder[$feldId]->getBelegung();
        $spieler = $belegung->getSpieler();
        if ($spieler->getId() == $spielerId) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param int $start
     * @param int $ziel
     * @param array $haus
     */
    private function steinSchlagen($start, $ziel, $haus)
    {
        $dame = $this->damePruefen($ziel);
        $startid = $this->felder[$start]->getId();
        $zielid = $this->felder[$ziel]->getId();
        $hausArray = $this->getHaus($haus);
        $startPunkt = $hausArray[$startid];
        $zielPunkt = $hausArray[$zielid];
<<<<<<< HEAD
        if ($dame){
          if ($startPunkt<700) {
            $endpunkte = array ($startPunkt-200, $startPunkt-202, $startPunkt+200, $startPunkt+202);
          } elseif ($startPunkt>700 && $startPunkt<800) {
            $endpunkte = array ($startPunkt-200, $startPunkt-202, $startPunkt+199, $startPunkt+201);
          } elseif ($startPunkt>800 && $startPunkt<900) {
            $endpunkte = array ($startPunkt-200, $startPunkt-202, $startPunkt+198, $startPunkt+200);
          } elseif ($startPunkt>900 && $startPunkt<1000) {
            $endpunkte = array ($startPunkt-201, $startPunkt-199, $startPunkt+198, $startPunkt+200);
          } else {
            $endpunkte = array ($startPunkt-200, $startPunkt-202, $startPunkt+200, $startPunkt+198);
          }
          $endpunkte = arra_push($endpunkte, $startPunkt+1, $startPunkt-1);
=======
        if ($dame) {
            if ($startPunkt < 700) {
                $endpunkte = array($startPunkt - 200, $startPunkt - 202, $startPunkt + 200, $startPunkt + 202);
            } elseif ($startPunkt > 700 && $startPunkt < 800) {
                $endpunkte = array($startPunkt - 200, $startPunkt - 202, $startPunkt + 199, $startPunkt + 201);
            } elseif ($startPunkt > 800 && $startPunkt < 900) {
                $endpunkte = array($startPunkt - 200, $startPunkt - 202, $startPunkt + 198, $startPunkt + 200);
            } elseif ($startPunkt > 900 && $startPunkt < 1000) {
                $endpunkte = array($startPunkt - 201, $startPunkt - 199, $startPunkt + 198, $startPunkt + 200);
            } else {
                $endpunkte = array($startPunkt - 200, $startPunkt - 202, $startPunkt + 200, $startPunkt + 198);
            }
>>>>>>> origin/master
        } else {
            if ($startPunkt < 700) {
                $endpunkte = array($startPunkt + 200, $startPunkt + 202);
            } elseif ($startPunkt > 700 && $startPunkt < 800) {
                $endpunkte = array($startPunkt + 199, $startPunkt + 201);
            } elseif ($startPunkt > 800 && $startPunkt < 1000) {
                $endpunkte = array($startPunkt + 198, $startPunkt + 200);
            } else {
                $endpunkte = array($startPunkt + 200, $startPunkt + 198);
            }
        }
    }

    /**
     * @param int $start
     * @param int $ziel
     */
    public function spielerZieht($start, $ziel)
    {
        $startbelegung = $this->felder[$start]->getBelegung();
        $zielbelegung = $this->felder[$ziel]->getBelegung();
        $spieler = $startbelegung->getSpieler();
        $haus = $spieler->getId();
        if ($startbelegung instanceof SpielStein) {
            if ($zielbelegung == '') {
                if ($this->isNachbar($start, $ziel, $haus)) {        //Normales Stein ziehen
                    $this->felder[$ziel]->setBelegung($startbelegung);
                    $this->felder[$start]->setBelegung('');
                } else {
                    $this->steinSchlagen($start, $ziel, $haus);
                }
            }
        } else {

        }


    }
}
