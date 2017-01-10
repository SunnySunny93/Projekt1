<?php

class SpielStein
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Spieler
     */
    private $spieler;

    /**
     * @var bool
     */
    private $dame;

    /**
     * @var string
     */
    private $icon;

    /**
     * SpielStein constructor.
     * @param Spieler $spieler
     * @param bool $dame
     */
    public function __construct($spieler, $dame = false)
    {
        //$this->id = $id;
        $this->spieler = $spieler;
        $this->istDame = $dame;
        $this->icon = $spieler->getIcon();
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @return boolean
     */
    public function isDame()
    {
        return $this->dame;
    }


}