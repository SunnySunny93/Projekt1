<?php

class Feld
{
    /**
     * @var int
     */
    private $id = 0;

    /**
     * @var string/SpielStein
     */
    private $belegung;

    /**
     * Feld constructor.
     * @param int $id
     * @param string/SpielStein $belegung
     */
    public function __construct($id, $belegung = "")
    {
        $this->id = $id;
        $this->belegung = $belegung;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getBelegung()
    {
        return $this->belegung;
    }

    /**
     * @param $belegung
     * @return bool
     */
    public function setBelegung($belegung)
    {
        if($belegung == "" || $belegung == "Mauer" || $belegung == "Sperrfeld" || $belegung instanceof SpielStein){
            $this->belegung = $belegung;
            return true;
        }else{
            return false;
        }
    }
}