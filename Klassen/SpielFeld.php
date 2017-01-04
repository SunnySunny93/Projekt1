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
        //ToDO: generiere Spielfeld Tabelle JanR
        return "<table></table>";
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