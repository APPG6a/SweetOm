<?php
/**
 * Created by PhpStorm.
 * User: THEOPHILE
 * Date: 12/12/2017
 * Time: 11:57
 */

namespace SweetIt\SweetOm\Model;


class CatalogManager extends Manager
{
    private $ID;
    private $name;
    private $price;
    private $ref;
    private $description;
    private $imageURL;
    private $type;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param mixed $ref
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getImageURL()
    {
        return $this->imageURL;
    }

    /**
     * @param mixed $imageURL
     */
    public function setImageURL($imageURL)
    {
        $this->imageURL = $imageURL;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    public function insertIntoDataBase()
    {
        $db = $this->dbConnect();

        $req = $db->prepare("INSERT INTO catalogue (Urlphoto, Nom, Description, Prix, Type_materiel, Modele) VALUES (?, ?, ?, ?, ?, ?)");
        $req->execute(array($this->getImageURL(),$this->getName(),$this->getDescription(),$this->getPrice(),$this->getType(),$this->getRef()));
        $req->closeCursor();
    }
}