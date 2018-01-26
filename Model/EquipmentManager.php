<?php
/**
 * Created by PhpStorm.
 * User: THEOPHILE
 * Date: 13/12/2017
 * Time: 17:39
 */

namespace SweetIt\SweetOm\Model;

require_once('Manager.php');

class EquipmentManager extends Manager
{
    private $ID;
    private $equipmentType;
    private $measureType;
    private $ID_Catalog;
    private $ID_CeMac;

    /**
     * EquipmentManager constructor.
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
    public function getEquipmentType()
    {
        return $this->equipmentType;
    }

    /**
     * @param mixed $equipmentType
     */
    public function setEquipmentType($equipmentType)
    {
        $this->equipmentType = $equipmentType;
    }

    /**
     * @return mixed
     */
    public function getMeasureType()
    {
        return $this->measureType;
    }

    /**
     * @param mixed $measureType
     */
    public function setMeasureType($measureType)
    {
        $this->measureType = $measureType;
    }

    /**
     * @return mixed
     */
    public function getIDCatalog()
    {
        return $this->ID_Catalog;
    }

    /**
     * @param mixed $ID_Catalog
     */
    public function setIDCatalog($ID_Catalog)
    {
        $this->ID_Catalog = $ID_Catalog;
    }

    /**
     * @return mixed
     */
    public function getIDCeMac()
    {
        return $this->ID_CeMac;
    }

    /**
     * @param mixed $ID_CeMac
     */
    public function setIDCeMac($ID_CeMac)
    {
        $this->ID_CeMac = $ID_CeMac;
    }
    public function listTypesSensors(){
    $db = $this->dbConnect();
    $rep = $db->query('SELECT * FROM equipment_type');
    $listTypesSensors = array();
    while ($values = $rep->fetch()) {

       $listTypesSensors[] = $values['Type'];
    }
    $rep->closeCursor();
    return $listTypesSensors;

    }
    public function addSensorByRoom($arrayRoom, $arrayPost){
        // found in database idcemac and id catalog
        $i = 1;
        foreach ($arrayRoom as $aRoom){
            $db = $this->dbConnect();
            $type = ['Température'.$i,'Luminosité'.$i,'Humidité'.$i,'Fumée'.$i,'Présence'.$i,'CO2'.$i,'Caméra'.$i,'Pression'.$i];
            $req2 = $db->prepare('SELECT ID FROM room WHERE ID_Domicile = ? AND RoomName = ?');
            $req2->execute(array($_SESSION['idHouse'], $aRoom));
            $idRoom = $req2->fetch()[0];
            $req2->closeCursor();
            foreach ($type as $aType) {
                if($arrayPost[$aType]!='Aucun'){
                    $req1 = $db->prepare('SELECT ID FROM catalog where model = ?');
                    $req1->execute(array($arrayPost[$aType]));
                    $idCatalog = $req1->fetch()[0];
                    $req1->closeCursor();
                    $req3 = $db->prepare('SELECT ID FROM cemac WHERE ID_Room = ?');
                    $req3->execute(array($idRoom));
                    $idCemac = $req3->fetch()[0];
                    $req3->closeCursor();
                    $req4 = $db->prepare('INSERT INTO equipment(ID_Catalog, ID_Cemac) VALUES (?,?)');
                    $req4->execute(array($idCatalog,$idCemac));
                    $req4->closeCursor();
                }
            }
            $i++;
        }
       
        
    }
}