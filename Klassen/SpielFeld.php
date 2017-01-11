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
                    $icon = "<img class=\"spielericon\" src=\"" . $feldbelegung->getIcon() . "\" /> ";
                } elseif ($feldbelegung == "Sperrfeld") {
                    $class = "sperrfeld";
                    $icon = "";
                } elseif ($feldbelegung == "Mauer") {
                    $class = "wall";
                    $icon = "";
                }  else {
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
    public function mauerAuswerten($json)
    {
        $funktion = $json->funktion;
        $liste = $json->liste;
        $anzahl = sizeof($liste);
        if (strpos($funktion, "setzen") !== false) {
            for ($i = 0; $i < $anzahl; $i++) {
                $this->setzen($liste[$i]);
            }
        }
        if (strpos($funktion, "entfernen") !== false) {
            for ($i = 0; $i < $anzahl; $i++) {
                $this->entfernen($liste[$i]);
            }
        }
        if (strpos($funktion, "verschieben") !== false) {
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
     * @param int $start
     * @param int $ziel
     */
    public function spielerZieht($start, $ziel)
    {
        //ToDo: JanR
        $startbelegung = $this->felder[$start]->getBelegung();
        $zielbelegung = $this->felder[$ziel]->getBelegung();

        if ($startbelegung instanceof SpielStein) {

        }


    }
}
