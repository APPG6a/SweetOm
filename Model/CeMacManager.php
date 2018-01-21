<?php
/**
 * Created by PhpStorm.
 * User: THEOPHILE
 * Date: 13/12/2017
 * Time: 17:01
 */

namespace SweetIt\SweetOm\Model;


class CeMacManager extends Manager
{
    private $ID;
    private $ID_Room;

    /**
     * CeMacManager constructor.
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
    public function getIDRoom()
    {
        return $this->ID_Room;
    }

    /**
     * @param mixed $ID_Room
     */
    public function setIDRoom($ID_Room)
    {
        $this->ID_Room = $ID_Room;
    }

    public function insertIntoDataBase()
    {
        $db = $this->dbConnect();

        $req = $db->prepare("INSERT INTO cemac (ID_Room) VALUES (?)");
        $req->execute(array($this->getIDRoom()));
        $req->closeCursor();
    }
}