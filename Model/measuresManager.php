<?php
/**
 * Created by PhpStorm.
 * User: THEOPHILE
 * Date: 13/12/2017
 * Time: 17:43
 */

namespace SweetIt\SweetOm\Model;


class measuresManager extends Manager
{
    private $ID;
    private $dateTime;
    private $data;
    private $ID_Equipment;

    /**
     * measuresManager constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param mixed $ID
     */
    public function setID($ID)
    {
        $this->ID = $ID;
    }

    /**
     * @return mixed
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * @param mixed $dateTime
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getIDEquipment()
    {
        return $this->ID_Equipment;
    }

    /**
     * @param mixed $ID_Equipment
     */
    public function setIDEquipment($ID_Equipment)
    {
        $this->ID_Equipment = $ID_Equipment;
    }
}