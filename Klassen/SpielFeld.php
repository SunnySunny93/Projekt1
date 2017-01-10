<?php

class SpielFeld
{
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
                $this->felder[] = new Feld($i, new SpielStein($spieler[rand(0, 5)]));
            }
//            $this->felder[1] = new Feld($i, new SpielStein($spieler[0]));
//            $this->felder[2] = new Feld($i, new SpielStein($spieler[1]));
//            $this->felder[3] = new Feld($i, new SpielStein($spieler[2]));
//            $this->felder[4] = new Feld($i, new SpielStein($spieler[3]));
//            $this->felder[5] = new Feld($i, new SpielStein($spieler[4]));
//            $this->felder[6] = new Feld($i, new SpielStein($spieler[5]));

            //print_r($this->felder);
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
                $id = $row . sprintf('%02d', $col);
                $feldbelegung = $this->felder[$internal_id-1]->getBelegung();
                if($feldbelegung instanceof SpielStein) {
                    $icon = $feldbelegung->getIcon();
                }else{
                    $icon = "";
                }
                $html .= "<div class=\"hex default\" id=\"" . $internal_id . "\" ><div class=\"top\"></div><div class=\"middle\" style=\"text-align: center\"><img class=\"spielericon\" src=\"" . $icon . "\" /> </div><div class=\"bottom\"></div></div>";
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
