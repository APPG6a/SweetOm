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
    public function showDashboard($ID_user){
        $db = $this->dbConnect();
        $req1 = prepare('SELECT ID FROM house WHERE ID_user = ?');
        $req1->execute(array($ID_user))
        $ID_house = $req1->fetch();
        $req2 = prepare('SELECT DISTINCT PieceType FROM rooms WHERE ID_house = ?');
        $req2->execute(array($ID_house));
        $listRoom = array();
        while($value2 = $req2->fetch()){
            $listRoomByType = array();
            $i=0;
            $req3 = prepare('SELECT NomPiece,ID FROM rooms WHERE ID_Domicile = ? AND Piece_type = ?');
            $req3->execute(array($domicileID,$value1));
            $listRoomByType[] = $value2["RoomName"]
            while($value3 = $req3->fetch()){
                $aRoom = array();
                $aRoom['roomName'] = $value3['RoomName'];
                $keyRoom = 'room'.$i;
                $listRoomByType[$keyRoom] = $value2['$keyRomm'];
                $req4 = prepare('SELECT ID FROM cemac WHERE ID_ROOM = ?');
                $req4-> execute(array($value2['ID']))
                $ID_cemac = $req4->fetch();
                $req5 = prepare('SELECT ID FROM equipement WHERE ID_cemac = ?');
                $req5->execute(array($ID_cemac));
                $ID_equipement = $req5->fetch();
                $req6 = prepare('SELECT Data FROM measure WHERE ID_equipement = ?');
                $req6->execute(array($ID_equipement));
                $measure = $req6->fetch();
                $aRoom['measure'] = $measure;
                $listRoomByType[] = $aRoom;

            }
            $listRoom[] = $listRoomByType;
        }
    return $listRoom;
    }
}