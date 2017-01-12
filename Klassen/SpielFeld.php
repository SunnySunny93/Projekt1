<?php
class SpielFeld
{
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
            foreach ($GLOBALS["feldbelegung"] AS $index => $feldbelegung) {
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
    public function javascriptAuswerten($json)
    {
        if ($json->funktion == "ziehen") {
            $this->spielerZieht($json->list[0], $json->list[1]);
        } else {
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
        switch ($haus) {
            case 1:
                return $GLOBALS["hausEins"];
                break;
            case 2:
                return $GLOBALS["hausZwei"];
                break;
            case 3:
                return $GLOBALS["hausDrei"];
                break;
            case 4:
                return $GLOBALS["hausVier"];
                break;
            case 5:
                return $GLOBALS["hausFuenf"];
                break;
            case 6:
                return $GLOBALS["hausSechs"];
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

        print_r($startPunkt);
        echo "<br/>";
        print_r($zielPunkt);
        echo "<br/>";

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
        if (array_search($zielPunkt, $nachbarn) !== false) {
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
     * @param int $haus
     */
    private function steinSchlagen($start, $ziel, $haus)
    {
        $dame = $this->damePruefen($ziel);
        $startid = $this->felder[$start]->getId();
        $zielid = $this->felder[$ziel]->getId();
        $hausArray = $this->getHaus($haus);
        $startPunkt = $hausArray[$startid];
        $zielPunkt = $hausArray[$zielid];

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
            $endpunkte = array_push($endpunkte, $startPunkt + 1, $startPunkt - 1);
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
        if (array_search($zielPunkt, $endpunkte) !== false) {
            return true;
        } else {
            return false;
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
        print_r($startbelegung);
        echo "<br/>";
        print_r($zielbelegung);
        echo "<br/>";
        print_r($haus);
        echo "<br/>";
        if ($startbelegung instanceof SpielStein) {
            print_r("spielstein");
            echo "<br/>";
            if ($zielbelegung == '') {
                print_r("ziel leer");
                echo "<br/>";
                if ($this->isNachbar($start, $ziel, $haus)) {        //Normales Stein ziehen
                    print_r("nachbar");
                    echo "<br/>";
                    $this->felder[$ziel]->setBelegung($startbelegung);
                    $this->felder[$start]->setBelegung('');
                } else {
                    print_r("kein nachbar");
                    echo "<br/>";
                    /*if($this->steinSchlagen($start, $ziel, $haus)){
                        $this->felder[$ziel]->setBelegung($startbelegung);
                        $this->felder[$start]->setBelegung('');
                    }*/
                }
            }
        } else {

        }


    }
}
