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
     * @param null $ID
     */
    public function __construct($ID = null)
    {
        $this->setID($ID);
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

    public function getEquipments()
    {
        return $this->read(array('ID_CeMac' => $this->ID), 'equipment', 0);
    }

    public function insertIntoDataBase()
    {
        $db = $this->dbConnect();

        $req = $db->prepare("INSERT INTO cemac (ID_Room) VALUES (?)");
        $req->execute(array($this->getIDRoom()));
        $req->closeCursor();
    }

    public function setCeMacByRoom($nbr,$array){
        $listId = array();
        $nbrRoom = count($array)/2;
        for($i = 0; $i<$nbrRoom; $i++){
            $room = 'room'.($i+1);
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT ID FROM room WHERE ID_Domicile = ? AND RoomName=?');
            $req->execute(array($_SESSION['idHouse'],$array[$room]));
            $listId[] = $req->fetch()[0];
            $req->closeCursor();
        }
        foreach ($listId as $idRoom) {
            $db = $this->dbConnect();
            $req = $db->prepare('INSERT INTO cemac(ID_Room) VALUES (?)');
            $req->execute(array($idRoom));
            $req->closeCursor();
        }
    }
}