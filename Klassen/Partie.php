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

    /**
     * @return SpielFeld
     */
    public function getSpielfeld()
    {
        return $this->spielfeld;
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

    /**
     * @return string
     */
    public function karteAuswerten() {
        $steinFunktion = $this->kartenstapel->getOffeneKarte()->getFunktion();
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
        return array("funktion" => $funktion, "anzahl" => $anzahl);
        //return "<script type='javascript'>var funktion = \"" . $funktion . "\";var anzahl = \"" . $anzahl . "\";</script>";
    }

    public function getSpieler()
    {
        return $this->spieler;
    }

    /**
     * @return Spieler
     */
    public function getAktuellerSpieler()
    {
        return $this->aktuellerSpieler;
    }



    public function getHtml()
    {
        if($this->getSpielfeld()->getAblauf() == "mauer"){
            $notification = "Bitte Platziere deine Mauern indem du auf die Felder klickst";
        }elseif($this->getSpielfeld()->getAblauf() == "ziehen"){
            $notification = "Bitte Ziehe eine deiner Spielfiguren ind dem du zuerst eine figur und dann ein benachbartes Feld anklickst";
        }else{

        }
        $spielerName = $this->aktuellerSpieler->getName();
        $icon = "<img class=\"spielericon\" src=\"" . $this->aktuellerSpieler->getIcon() . "\" /> ";
        $html = "";

        $html .= "<main>";
        $html .= "  <section id=\"interaktionsmenue\">";
        $html .= "      <header>";
        $html .= "          <span class=\"status\">$spielerName $icon ist am Zug</span><br/>";
        $html .= "          <span class=\"notification\"> $notification </span>";
        $html .= "      </header>";
        $html .= "      <section id=\"kartenstapel\">";
        $html .=            $this->kartenstapel->getKartenstapelHtml();
        $html .= "      </section>";
        $html .= "      <menu id=\"spielsteuerung\">";
        $html .= "          <button onclick=\"mauerFestlegen()\">Mauer so platzieren?</button>";
        $html .= "          <br/>";
        $html .= "          <button onclick=\"steinBewegen()\">Stein Bewegen</button>";
        $html .= "          <br/>";
        $html .= "          <button onclick=\"zugBeenden()\">Zug beenden!</button>";
        $html .= "          <br/>";
        $html .= "          <button onclick=\"aufgeben()\">Spiel aufgeben?</button>";
        $html .= "          <br/>";
        $html .= "          <button onclick=\"reset()\">reset</button>";
        $html .= "      </menu>";
        $html .= "  </section>";
        $html .= "  <section id=\"spielfeld\">";
        $html .=        $this->spielfeld->getSpielfeldHtml();
        $html .= "  </section>";
        $html .= "</main>";

        return $html;
    }

    public function getSpielerList() {
        $spielerliste = $this->getSpieler();
        $nummer = 1;
        $spieler_tabelle = "";
        $spieler_tabelle .= "<table>";
        $spieler_tabelle .= "    <tr>";
        $spieler_tabelle .= "        <th>Nummer</th>";
        $spieler_tabelle .= "        <th>Spieler</th>";
        $spieler_tabelle .= "    </tr>";
        foreach ($spielerliste as $spieler) {
            $spieler_tabelle .= "<tr>";
            $spieler_tabelle .= "	<td>" . $nummer . "</td><td>" . $spieler->getName() . "</td>";
            $spieler_tabelle .= "</tr>";
            $nummer += 1;
        }
        $spieler_tabelle .= "</table>";
        return $spieler_tabelle;
    }

    /**
     * @return string
     */
    function __toString()
    {
        return serialize($this);
    }
}
