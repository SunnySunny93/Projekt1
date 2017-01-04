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
        $j == 0;
        for ($i=0; $i < $anzahlSetzenKarten; $i++) {
          $zufallszahl = rand(0,4);
          $bild = "Bilder/".$setzenKarten[$zufallszahl]."png";
          $funktion = $setzenKarten[$zufallszahl];
          $j++;
          $this->karten[] = new Karte($j, $bild, $funktion);
        }
        for ($i=0; $i < $anzahlVerschiebenKarten; $i++) {
          $zufallszahl = rand(0,4);
          $bild = "Bilder/".$verschiebenKarten[$zufallszahl]."png";
          $funktion = $verschiebenKarten[$zufallszahl];
          $j++;
          $this->karten[] = new Karte($j, $bild, $funktion);
        }
        for ($i=0; $i < $anzahlEntfernenKarten; $i++) {
          $zufallszahl = rand(0,4);
          $bild = "Bilder/".$entfernenKarten[$zufallszahl]."png";
          $funktion = $entfernenKarten[$zufallszahl];
          $j++;
          $this->karten[] = new Karte($j, $bild, $funktion);
        }
        // for($i = 0;$i <= $this->limit;$i++){
        //     //ToDO: Kartenverteilung einbauen
        //     $bild = "";
        //     $funktion = "";
        //
        //     //ToDO: Bereits gezogene karten berücksichtigen
        //     $this->karten[] = new Karte($i, $bild, $funktion);
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
