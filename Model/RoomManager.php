<?php
/**
 * Created by PhpStorm.
 * User: THEOPHILE
 * Date: 13/12/2017
 * Time: 17:53
 */

namespace SweetIt\SweetOm\Model;


class RoomManager extends Manager
{
    private $ID;
    private $surface;
    private $roomType;
    private $roomName;
    private $ID_Address;

    /**
     * RoomManager constructor.
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
    public function getSurface()
    {
        return $this->surface;
    }

    /**
     * @param mixed $surface
     */
    public function setSurface($surface)
    {
        $this->surface = $surface;
    }

    /**
     * @return mixed
     */
    public function getRoomType()
    {
        return $this->roomType;
    }

    /**
     * @param mixed $roomType
     */
    public function setRoomType($roomType)
    {
        $this->roomType = $roomType;
    }

    /**
     * @return mixed
     */
    public function getRoomName()
    {
        return $this->roomName;
    }

    /**
     * @param mixed $roomName
     */
    public function setRoomName($roomName)
    {
        $this->roomName = $roomName;
    }

    /**
     * @return mixed
     */
    public function getIDAddress()
    {
        return $this->ID_Address;
    }

    /**
     * @param mixed $ID_Address
     */
    public function setIDAddress($ID_Address)
    {
        $this->ID_Address = $ID_Address;
    }
}