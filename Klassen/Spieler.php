<?php

class Spieler
{
    /**
     * @var int
     */
    private $id = 0;

    /**
     * @var string
     */
    private $icon = "";

    /**
     * @var string
     */
    private $name = "";

    /**
     * Spieler constructor.
     * @param int $id
     * @param string $name
     * @param string $icon
     */
    public function __construct($id, $name, $icon)
    {
        $this->id = $id;
        $this->name = $name;
        $this->icon = $icon;
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

}
