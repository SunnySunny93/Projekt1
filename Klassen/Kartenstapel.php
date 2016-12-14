<?php

class Kartenstapel
{
    /**
     * @var array
     */
    private $karten;

    /**
     * @var int
     */
    private $limit = 50;

    /**
     * @var Karte
     */
    private $offeneKarte;

    /**
     * Kartenstapel constructor.
     */
    public function __construct()
    {
        for($i = 0;$i <= $this->limit;$i++){
            //ToDO: Kartenverteilung einbauen
            $bild = "";
            $funktion = "";

            //ToDO: Bereits gezogene karten berücksichtigen
            $this->karten[] = new Karte($i, $bild, $funktion);
        }
    }

    public function nächsteKarte()
    {
        $this->offeneKarte = $this->karten[rand(0,5)];
    }

    /**
     * @return Karte
     */
    public function getOffeneKarte()
    {
        return $this->offeneKarte;
    }

    /**
     * @return string
     */
    public function printKartenStapel()
    {
        $bild = $this->offeneKarte->getBild();
        $html = "<aside><img src='Bilder/Kartenstapel.png' width='120' height='180' alt='Bild vom Kartenrücken'> <img src='Bilder/$bild' width='120' height='180' alt='Das ist deine Karte'></aside>";
        return $html;
    }
}