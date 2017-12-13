<?php
/**
 * Created by PhpStorm.
 * User: THEOPHILE
 * Date: 13/12/2017
 * Time: 16:46
 */

namespace SweetIt\SweetOm\Model;


class ArticleManager extends Manager
{
    private $ID;
    private $refOrder;
    private $ID_Package;
    private $ID_Model;
    private $quantity;

    /**
     * ArticleManager constructor.
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
    public function getRefOrder()
    {
        return $this->refOrder;
    }

    /**
     * @param mixed $refOrder
     */
    public function setRefOrder($refOrder)
    {
        $this->refOrder = $refOrder;
    }

    /**
     * @return mixed
     */
    public function getIDPackage()
    {
        return $this->ID_Package;
    }

    /**
     * @param mixed $ID_Package
     */
    public function setIDPackage($ID_Package)
    {
        $this->ID_Package = $ID_Package;
    }

    /**
     * @return mixed
     */
    public function getIDModel()
    {
        return $this->ID_Model;
    }

    /**
     * @param mixed $ID_Model
     */
    public function setIDModel($ID_Model)
    {
        $this->ID_Model = $ID_Model;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function insertIntoDataBase()
    {
        $db = $this->dbConnect();

        $req = $db->prepare("INSERT INTO article (ReferenceCommande, ID_Package, ID_Model, Quantite) VALUES (?, ?, ?, ?)");
        $req->execute(array($this->getRefOrder(),$this->getIDPackage(),$this->getIDModel(),$this->getQuantity()));
        $req->closeCursor();
    }
}