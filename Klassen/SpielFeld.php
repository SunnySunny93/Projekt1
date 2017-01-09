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
            //ToDo: Felder generieren

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
        //ToDO: generiere Spielfeld Tabelle JanR
        $html .= "<table id=\"spielfeld\" border=0 width='849px' height='746' background='Bilder/Spielfeld.png' background-size=auto>";
		$html .= "<colgroup span='32' width=auto></colgroup>";
		$html .= "<tr align='center' valign='center'>";
        $html .= "<td colspan=34></td>";
		$html .= "</tr>";

        //spielfeld generieren
        $rows = 15;
        $cols = 8;
        $span = 7;
        $operator = 1;
        $internal_id = 0;

        for($row = 1;$row <= $rows;$row++) {
            $html .= "<tr align='center' valign='center'>";
            $html .= $span != 0 ? "<td colspan=$span></td>" : "";
            for($col = 1;$col <= $cols;$col++) {
                $internal_id++;
                $id = $row . sprintf('%02d', $col);
                $html .= "<td class=feld colspan=2 id=$internal_id>$id</td>";
            }
            $html .= $span != 0 ? "<td colspan=$span></td>" : "";
            $html .= "</tr>";
            if($cols >= $rows){
                $operator = -1;
            }
            $cols += $operator;
            $span -= $operator;

        }

        $html .= "<tr align='center' valign='center'>";
        $html .= "<td colspan=34></td>";
        $html .= "</tr>";
        $html .= "</table>";
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
