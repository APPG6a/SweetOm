<?php
/**
 * Created by PhpStorm.
 * User: THEOPHILE
 * Date: 13/12/2017
 * Time: 17:39
 */

namespace SweetIt\SweetOm\Model;


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
}