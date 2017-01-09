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
    private $icon = "spielericon.php";

    /**
     * @var string
     */
    private $name = "";

    /**
     * Spieler constructor.
     * @param int $id
     * @param string $name
     */
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
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
