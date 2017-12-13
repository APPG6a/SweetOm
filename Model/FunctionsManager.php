<?php
/**
 * Created by PhpStorm.
 * User: THEOPHILE
 * Date: 13/12/2017
 * Time: 17:33
 */

namespace SweetIt\SweetOm\Model;


class FunctionsManager extends Manager
{
    private $ID;
    private $name;
    private $ceMacCode;

    /**
     * FunctionsManager constructor.
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCeMacCode()
    {
        return $this->ceMacCode;
    }

    /**
     * @param mixed $ceMacCode
     */
    public function setCeMacCode($ceMacCode)
    {
        $this->ceMacCode = $ceMacCode;
    }
}