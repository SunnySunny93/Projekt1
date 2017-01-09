<?php

class Partie
{
    /**
     * @var SpielFeld
     */
    private $spielfeld;

    /**
     * @var array
     */
    private $spieler;

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
    }

    /**
     * @return string
     */
    function __toString()
    {
        return serialize($this);
    }

    public function getHtml(){
        //ToDo: Spielernamen anzeigen
        echo "<header><h2><label for=\"feedback\">Tom ist am Zug</label> - <label for=\"ablauf\">Tom schlägt einen Gegner!</label></h2><h2></h2></header>";
        echo "";

        echo "<table><tr>";
            echo "<td>" . $this->spielfeld->getKartenstapelHtml() . "</td>";
            echo "<td>" . $this->spielfeld->getSpielfeldHtml() . "</td>";
        echo "</tr></table>";
    }


}
