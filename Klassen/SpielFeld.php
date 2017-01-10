<?php

class SpielFeld
{
    /**
     * @var array
     */
    private $feldbelegung= array(
        1 => "Sperrfeld",
        2 => 0,
        3 => 0,
        4 => 0,
        5 => 0,
        6 => 0,
        7 => 0,
        8 => "Sperrfeld",
        17 => 1,
        27 => 1,
        38 => 1,
        50 => 1,
        63 => 1,
        77 => 1,
        92 => "Sperrfeld",
        9 => 5,
        18 => 5,
        28 => 5,
        39 => 5,
        51 => 5,
        64 => 5,
        78 => "Sperrfeld",
        93 => 4,
        107 => 4,
        120 => 4,
        132 => 4,
        143 => 4,
        153 => 4,
        162 => "Sperrfeld",
        163 => 3,
        164 => 3,
        165 => 3,
        166 => 3,
        167 => 3,
        168 => 3,
        169 => "Sperrfeld",
        106 => 2,
        119 => 2,
        131 => 2,
        142 => 2,
        152 => 2,
        161 => 2);

    /**
     * @var Feld[]
     */
    private $felder;

    /**
     * SpielFeld constructor.
     * @param array $spieler
     * @param array $felder
     * @param Kartenstapel $kartenstapel
     */
    public function __construct($spieler, $felder = NULL, $kartenstapel = NULL)
    {
        if($felder == NULL){
            for($i = 0;$i < 169;$i++) {
                $this->felder[] = new Feld($i, "");
            }
            foreach ($this->feldbelegung AS $index => $feldbelegung) {
                if($feldbelegung !== "Sperrfeld"){
                    $feldbelegung = new SpielStein($spieler[$feldbelegung]);
                }
                $this->felder[$index-1]->setBelegung($feldbelegung);
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
                $class = "default";
                $id = $row . sprintf('%02d', $col);
                $feldbelegung = $this->felder[$internal_id-1]->getBelegung();
                if($feldbelegung instanceof SpielStein) {
                    $icon = "<img class=\"spielericon\" src=\"" . $feldbelegung->getIcon() . "\" /> ";
                }elseif($feldbelegung == "Sperrfeld") {
                    $class = "sperrfeld";
                    $icon = "";
                }else{
                    $icon = "";
                }
                $html .= "<div class=\"hex " . $class . "\" id=\"" . $internal_id . "\" ><div class=\"top\"></div><div class=\"middle\" style=\"text-align: center\">" . $icon . "</div><div class=\"bottom\"></div></div>";
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
        return $html;
    }

    /**
     * @param string $funktion
     * @param string $liste
     */
    public function mauerAuswerten($funktion, $liste)
    {
      $funktion = $funktion;
      $liste = array explode ( "," , $liste );
      $anzahl = sizeof($liste);
      if (strpos($funktion,"setzen")!==false) {
        for ($i=0; $i < $anzahl; $i++) {
          $this->setzen($liste[$i]);
        }
      }
      if (strpos($funktion,"entfernen")!==false) {
        for ($i=0; $i < $anzahl; $i++) {
          $this->entfernen($liste[$i]);
        }
      }
      if (strpos($funktion,"verschieben")!==false) {
        for ($i=0; $i < $anzahl/2; $i++) {              //geht das mit anzahl/2 ????
          $this->entfernen($liste[$i]);
        }
        for ($i=$anzahl/2; $i < $anzahl; $i++) {
          $this->setzen($liste[$i]);
        }
      }
    }

    /**
     * @param int $feldId
     */
    private function setzen($feldId){
        $this->felder[$feldId]->setBelegung('Mauer');
    }

    /**
     * @param int $feldId
     */
    private function entfernen($feldId){
        $this->felder[$feldId]->setBelegung('');
    }

    /**
     * @param int $start
     * @param int $ziel
     */
    public function spielerZieht($start, $ziel){
        //ToDo: JanR
        $startbelegung = $this->felder[$start]->getBelegung();
        $zielbelegung = $this->felder[$ziel]->getBelegung();

        if($startbelegung instanceof SpielStein){

        }



    }
}
