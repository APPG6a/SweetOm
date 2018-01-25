<?php
namespace SweetIt\SweetOm\Model;

require_once('Manager.php');

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

    public function insertNewSensorIntoDb($array,$urlImg)
    {
        $db = $this->dbConnect();
        $req1 = $db->prepare('SELECT ID FROM equipment_type WHERE Type = ?');
        $req1->execute(array($array['type']));
        $idEquipment = $req1->fetch();
        $req1->closeCursor();
        $req = $db->prepare("INSERT INTO catalog (PhotoUrl, Name, Description, Price, ID_EquipmentType, Model) VALUES (?, ?, ?, ?, ?, ?)");
        $req->execute(array($urlImg, $array['name'],$array['description'],$array['price'][0],$idEquipment[0],$array['model']));
        $req->closeCursor();
    } 


    public function collectData(){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM equipment_type WHERE Type=?');
        $req->execute(array($_POST['Type']));
        $value = $req->fetch();
        $id_type = $value['ID'][0];
        $req->closeCursor();
        $stockage = './Public/Assets/Images_catalog/' . $_FILES['photo']['name'] . '';
        $insertion = $db->prepare('INSERT INTO catalog (PhotoUrl, Name, Description, Price, ID_EquipmentType,Model) VALUES (?, ?, ?,?,?,?)');
        $insertion->execute(array($stockage, $_POST['name'], $_POST['description'], $_POST['price'], $id_type, $_POST['model']));
        $insertion->closeCursor();
    }


    public function listCatalog()
    {
        $db = $this->dbConnect();
        $rep = $db->prepare('SELECT * FROM equipment_type ');
        $rep->execute(array());
        $listCatalog = array();
        while ($value = $rep->fetch()) {
            $capteurType = array();
            $rep2 = $db->prepare('SELECT * FROM catalog WHERE ID_EquipmentType = ? ');
            $rep2->execute(array($value['ID']));
            $capteurType[] = $value['Type'];
            while ($value2 = $rep2->fetch()) {
                $capteurInfoByType = array();

                $capteurInfoByType ['PhotoUrl'] = $value2['PhotoUrl'];
                $capteurInfoByType['Name'] = $value2['Name'];
                $capteurInfoByType['Description'] = $value2['Description'];
                $capteurInfoByType['Price'] = $value2['Price'];
                $capteurInfoByType['Model'] = $value2['Model'];
                $capteurType[] = $capteurInfoByType;
            }
            $listCatalog[] = $capteurType;
        }
        $rep->closeCursor();
        return $listCatalog;
    }
}