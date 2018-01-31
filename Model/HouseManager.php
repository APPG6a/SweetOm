<?php
/**
 * Created by PhpStorm.
 * User: THEOPHILE
 * Date: 13/12/2017
 * Time: 17:26
 */

namespace SweetIt\SweetOm\Model;

require_once('CrudModel.php');

class HouseManager extends CrudModel
{
    private $ID;
    private $Address;
    private $ID_Owner;

    /**
     * HouseManager constructor.
     * @param $ID
     */
    public function __construct($ID)
    {
        $this->ID = $ID;
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
    public function getAddress()
    {
        return $this->Address;
    }

    /**
     * @param mixed $Address
     */
    public function setAddress($Address)
    {
        $this->Address = $Address;
    }

    /**
     * @return mixed
     */
    public function getIDOwner()
    {
        return $this->ID_Owner;
    }

    /**
     * @param mixed $ID_Owner
     */
    public function setIDOwner($ID_Owner)
    {
        $this->ID_Owner = $ID_Owner;
    }

    public function getRooms()
    {
        return $this->read(array('ID_Domicile' => $this->ID), 'room', 0);
    }
}

