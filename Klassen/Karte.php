<?php

class Karte
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $bild;

    /**
     * @var string
     */
    private $funktion;

    /**
     * Karte constructor.
     * @param int $id
     * @param string $bild
     * @param string $funktion
     */
    public function __construct($id, $bild, $funktion)
    {
        $this->id = $id;
        $this->bild = $bild;
        $this->funktion = $funktion;
    }

    /**
     * @return string
     */
    public function getBild()
    {
        return $this->bild;
    }

    /**
     * @return string
     */
    public function getFunktion()
    {
        return $this->funktion;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}