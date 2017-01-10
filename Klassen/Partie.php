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

    private function karteAuswerten($steinFunktion) {
        //ToDo: Annika hier karte auswerten
        $steinFunktion = this->$steinFunktion;
        $anzahl = 0;
        $funktion = "";
    		if (strpos($steinFunktion,"Eins")!==false) {
    			$anzahl = 1;
    		} elseif (strpos($steinFunktion,"Zwei")!==false) {
    			$anzahl = 2;
    		} elseif (strpos($steinFunktion,"Drei")!==false) {
    			$anzahl = 3;
    		} elseif (strpos($steinFunktion,"Vier")!==false) {
    			$anzahl = 4;
    		}

    		if (strpos($steinFunktion,"Setzen")!==false){
    			$funktion = "setzen";
    		} elseif (strpos($steinFunktion,"Verschieben")!==false) {
    			$funktion = "verschieben";
    		} elseif (strpos($steinFunktion,"Entfernen")!==false) {
    			$funktion = "entfernen";
    		}
        //Ausgabe
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
