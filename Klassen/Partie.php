<?php

class Partie
{
    /**
     * @var SpielFeld
     */
    private $spielfeld;

    /**
     * @var Spieler[]
     */
    private $spieler;

    /**
     * @var Spieler
     */
    private $aktuellerSpieler;

    /**
     * @var Kartenstapel
     */
    private $kartenstapel;

    /**
     * Partie constructor.
     * @param array $spieler
     * @param SpielFeld $spielfeld
     * @param KartenStapel $kartenstapel
     */
    public function __construct($spieler, $spielfeld = NULL, $kartenstapel = NULL)
    {
        if(is_array($spieler)){
            $this->spieler = $spieler;
        }
        if($spielfeld == NULL) {
            $this->spielfeld = new SpielFeld($spieler);
        }
        if($kartenstapel == NULL){
            $this->kartenstapel = new Kartenstapel();
        }
        $this->aktuellerSpieler = $this->spieler[rand(0, sizeof($this->spieler)-1)];
    }

    public function addPlayer($spieler)
    {
        $this->spieler[] = $spieler;
    }

    public function naechsterZug()
    {
        $index = array_search($this->aktuellerSpieler, $this->spieler);
        $index++;
        if($index >= sizeof($this->spieler)){
            $index = 0;                                                         //prevent overflow
        }
        $this->aktuellerSpieler = $this->spieler[$index];
        $this->kartenstapel->nächsteKarte();
    }

    private function karteAuswerten($funktion) {
        //ToDo: Annika hier karte auswerten

        /*
         * Demo:
         * $funktion = "setzen"
         * $anzahl = 3;
         */

    }

    public function getSpieler()
    {
        return $this->spieler;
    }

    public function getHtml()
    {
        //ToDo: Spielernamen anzeigen
        $spielerName = $this->aktuellerSpieler->getName();
        $html = "";

        $html .= "<main>";
        $html .= "  <section id=\"interaktionsmenue\">";
        $html .= "      <header>";
        $html .= "          <span class=\"status\">$spielerName ist am Zug</span>";
        $html .= "          <span class=\"notification\"> $spielerName schlägt einen Gegner!</span>";
        $html .= "      </header>";
        $html .= "      <section id=\"kartenstapel\">";
        $html .=            $this->kartenstapel->getKartenstapelHtml();
        $html .= "      </section>";
        $html .= "      <section id=\"spielsteuerung\">";
        $html .= "          <button onclick=\"mauerFestlegen()\">Mauer so platzieren?</button>";
        $html .= "      </section>";
        $html .= "      <section>";
        $html .= "          <button onclick=\"zugBeenden()\">Zug beenden!</button>";
        $html .= "      </section>";
        $html .= "      <section>";
        $html .= "          <button onclick=\"aufgeben()\">Spiel aufgeben?</button>";
        $html .= "      </section>";
        $html .= "  </section>";
        $html .= "  <section id=\"spielfeld\">";
        $html .=        $this->spielfeld->getSpielfeldHtml();
        $html .= "  </section>";
        $html .= "</main>";

        return $html;
    }

    /**
     * @return string
     */
    function __toString()
    {
        return serialize($this);
    }
}
