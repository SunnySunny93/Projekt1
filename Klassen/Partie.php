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
     * Partie constructor.
     * @param array $spieler
     * @param SpielFeld $spielfeld
     */
    public function __construct($spieler, $spielfeld = NULL)
    {
        if(is_array($spieler)){
            $this->spieler = $spieler;
        }
        if($spielfeld == NULL) {
            $this->spielfeld = new SpielFeld($spieler);
        }
        $this->aktuellerSpieler = $this->spieler[rand(0, sizeof($this->spieler)-1)];
    }

    public function addPlayer($spiel)
    {
        $this->spieler[] = $spieler;
    }

    public function nextTurn()
    {
        $index = array_search($this->aktuellerSpieler, $this->spieler);
        $index++;
        if($index >= sizeof($this->spieler)){
            $index = 0;                                                         //prevent overflow
        }
        $this->aktuellerSpieler = $this->spieler[$index];
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
        $html .=            $this->spielfeld->getKartenstapelHtml();
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
