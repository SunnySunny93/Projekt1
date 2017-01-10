<?php

class SpielFeld
{
    /**
     * @var Kartenstapel
     */
    private $kartenstapel;

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
        if($kartenstapel == NULL){
            $this->kartenstapel = new Kartenstapel();
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
     * @return string
     */
    public function getKartenstapelHtml()
    {
        $this->kartenstapel->nächsteKarte();
        return $this->kartenstapel->printKartenStapel();
    }

    /**
     * @param int $feldId
     */
    public function einsSetzen($feldId){
        $this->felder[$feldId]->setBelegung('Mauer');
    }
    //ToDo: Mauer Funktionen Schreiben: Annika
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
