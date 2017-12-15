<?php
/**
 * Created by PhpStorm.
 * User: THEOPHILE
 * Date: 13/12/2017
 * Time: 17:36
 */

namespace SweetIt\SweetOm\Model;


class OrderHistory extends Manager
{
    private $ID;
    private $orderDate;
    private $installDate;
    private $price;
    private $ID_Order;
    private $ID_User;

    /**
     * OrderHistory constructor.
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
    public function getOrderDate()
    {
        return $this->orderDate;
    }

    /**
     * @param mixed $orderDate
     */
    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;
    }

    /**
     * @return mixed
     */
    public function getInstallDate()
    {
        return $this->installDate;
    }

    /**
     * @param mixed $installDate
     */
    public function setInstallDate($installDate)
    {
        $this->installDate = $installDate;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getIDOrder()
    {
        return $this->ID_Order;
    }

    /**
     * @param mixed $ID_Order
     */
    public function setIDOrder($ID_Order)
    {
        $this->ID_Order = $ID_Order;
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
}