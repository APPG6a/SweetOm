<?php
/**
 * Created by PhpStorm.
 * User: THEOPHILE
 * Date: 13/12/2017
 * Time: 17:51
 */

namespace SweetIt\SweetOm\Model;


class FailuresManager extends Manager
{
    private $ID;
    private $dateTime;
    private $failureType;
    private $ID_Equipment;

    /**
     * FailuresManager constructor.
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
    public function getFailureType()
    {
        return $this->failureType;
    }

    /**
     * @param mixed $failureType
     */
    public function setFailureType($failureType)
    {
        $this->failureType = $failureType;
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