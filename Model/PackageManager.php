<?php
/**
 * Created by PhpStorm.
 * User: THEOPHILE
 * Date: 13/12/2017
 * Time: 17:48
 */

namespace SweetIt\SweetOm\Model;


class PackageManager extends Manager
{
    private $ID;
    private $packageRef;
    private $ID_Product;

    /**
     * PackageManager constructor.
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
    public function getPackageRef()
    {
        return $this->packageRef;
    }

    /**
     * @param mixed $packageRef
     */
    public function setPackageRef($packageRef)
    {
        $this->packageRef = $packageRef;
    }

    /**
     * @return mixed
     */
    public function getIDProduct()
    {
        return $this->ID_Product;
    }

    /**
     * @param mixed $ID_Product
     */
    public function setIDProduct($ID_Product)
    {
        $this->ID_Product = $ID_Product;
    }
}