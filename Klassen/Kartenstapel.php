<?php

class Kartenstapel
{
    /**
     * @var array
     */
    private $abgelegteKarten;

    /**
     * @var array
     */
    private $karten;

    /**
     * @var int
     */
    // Limit darf nur Teiler von 25 sein
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
        //setzen: 7/25 des Stapels sind Setzen-Karten
        $setzenKarten = array("EinsSetzen", "ZweiSetzen", "DreiSetzen", "VierSetzen");
        //verschieben: 9/25 des Stapels sind Verschieben-Karten
        $verschiebenKarten = array("EinsVerschieben", "ZweiVerschieben", "DreiVerschieben", "VierVerschieben");
        //entfernen: 9/25 des Stapels sind Entfernen-Karten
        $entfernenKarten = array("EinsEntfernen", "ZweiEntfernen", "DreiEntfernen", "VierEntfernen");
        $anzahlSetzenKarten = 7/25*$this->limit;
        $anzahlVerschiebenKarten = 9/25*$this->limit;
        $anzahlEntfernenKarten = 9/25*$this->limit;
        $j = 0;
        for ($i=0; $i < $anzahlSetzenKarten; $i++) {
          $zufallszahl = rand(0,3);
          $bild = "Bilder/" . $setzenKarten[$zufallszahl] . ".png";
          $funktion = $setzenKarten[$zufallszahl];
          $j++;
          $this->karten[] = new Karte($j, $bild, $funktion);
        }
        for ($i=0; $i < $anzahlVerschiebenKarten; $i++) {
          $zufallszahl = rand(0,3);
          $bild = "Bilder/" . $verschiebenKarten[$zufallszahl] . ".png";
          $funktion = $verschiebenKarten[$zufallszahl];
          $j++;
          $this->karten[] = new Karte($j, $bild, $funktion);
        }
        for ($i=0; $i < $anzahlEntfernenKarten; $i++) {
          $zufallszahl = rand(0,3);
          $bild = "Bilder/" . $entfernenKarten[$zufallszahl] . ".png";
          $funktion = $entfernenKarten[$zufallszahl];
          $j++;
          $this->karten[] = new Karte($j, $bild, $funktion);
        }
    }

    public function nächsteKarte()
    {
        if(sizeof($this->karten) > 0){                              //prüfe ob noch Karten im Stapel sind
            $anzahlKartenStapel = sizeof($this->karten);            //Anzahl Karten die noch im Stapel sind
            $zufallsZahl = rand(0, $anzahlKartenStapel-1);          //Karte die gezogen wird
            $this->offeneKarte = $this->karten[$zufallsZahl];       //Karte wird ausgegeben
            $this->abgelegteKarten[] = $this->karten[$zufallsZahl]; //Gezogene Karte wird im anderen Array abgespeichert
            unset($this->karten[$zufallsZahl]);                     //Karte wird aus Array entfernt
            $this->karten = array_values($this->karten);            //Array wird wieder zusammen geschoben
        }else{                                                      //wenn keine Karten mehr im stapel sind:
            $this->karten = $this->abgelegteKarten;                 //abgelegte karten mit Stapel tauschen
            $this->abgelegteKarten = NULL;                          //abgelegte karten löschen
        }
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
        $html = "";

        $html .= "    <img src='Bilder/Kartenstapel.png' width='120' height='180' alt='Bild vom Kartenrücken'>";
        $html .= "    <img src='$bild' width='120' height='180' alt='Das ist deine Karte'>";

        return $html;
    }
}
