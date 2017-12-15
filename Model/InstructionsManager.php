<?php
/**
 * Created by PhpStorm.
 * User: THEOPHILE
 * Date: 13/12/2017
 * Time: 17:45
 */

namespace SweetIt\SweetOm\Model;


class InstructionsManager extends Manager
{
    private $ID;
    private $startDate;
    private $startTime;
    private $endDate;
    private $endTime;
    private $recurenceCode;
    private $ID_User;
    private $ID_Equipment;
    private $ID_Function;

    /**
     * InstructionsManager constructor.
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
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param mixed $startTime
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param mixed $endTime
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }

    /**
     * @return mixed
     */
    public function getRecurenceCode()
    {
        return $this->recurenceCode;
    }

    /**
     * @param mixed $recurenceCode
     */
    public function setRecurenceCode($recurenceCode)
    {
        $this->recurenceCode = $recurenceCode;
    }

    /**
     * @return mixed
     */
    public function getIDUser()
    {
        return $this->ID_User;
    }

    /**
     * @param mixed $ID_User
     */
    public function setIDUser($ID_User)
    {
        $this->ID_User = $ID_User;
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

    /**
     * @return mixed
     */
    public function getIDFunction()
    {
        return $this->ID_Function;
    }

    /**
     * @param mixed $ID_Function
     */
    public function setIDFunction($ID_Function)
    {
        $this->ID_Function = $ID_Function;
    }
}