<?php
/**
 * Created by PhpStorm.
 * User: THEOPHILE
 * Date: 28/11/2017
 * Time: 11:41
 */

namespace SweetIt\SweetOm\Model;

require_once("Manager.php");


class ProfileManager extends Manager
{
    private $ID;
    private $Nom;
    private $Prenom;
    private $Login;
    private $Password;
    private $TelephonPortabe;
    private $Mail;
    private $ID_SuperUser;
    private $UserType;
    private $TelephoneFixe;

    /**
     * ProfileManager constructor.
     * @param $ID
     */
    public function __construct($ID)
    {
        $this->ID = $ID;
        $db = $this->dbConnect();

        $req = $db->prepare("SELECT * FROM utilisateurs WHERE ID = ?");
        $req->execute(array($this->getID()));

        $Array = $req->fetch();

        $this->setNom();
        $this->setPrenom($Array['']);
        $this->setLogin($Array['']);
        $this->setPassword($Array['']);
        $this->setTelephonPortabe($Array['']);
        $this->setMail($Array['']);
        $this->set($Array['']);
        $this->set($Array['']);
        $this->set($Array['']);
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
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * @param mixed $Nom
     */
    public function setNom($Nom)
    {
        $this->Nom = $Nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->Prenom;
    }

    /**
     * @param mixed $Prenom
     */
    public function setPrenom($Prenom)
    {
        $this->Prenom = $Prenom;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->Login;
    }

    /**
     * @param mixed $Login
     */
    public function setLogin($Login)
    {
        $this->Login = $Login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * @param mixed $Password
     */
    public function setPassword($Password)
    {
        $this->Password = $Password;
    }

    /**
     * @return mixed
     */
    public function getTelephonPortabe()
    {
        return $this->TelephonPortabe;
    }

    /**
     * @param mixed $TelephonPortabe
     */
    public function setTelephonPortabe($TelephonPortabe)
    {
        $this->TelephonPortabe = $TelephonPortabe;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->Mail;
    }

    /**
     * @param mixed $Mail
     */
    public function setMail($Mail)
    {
        $this->Mail = $Mail;
    }

    /**
     * @return mixed
     */
    public function getIDSuperUser()
    {
        return $this->ID_SuperUser;
    }

    /**
     * @param mixed $ID_SuperUser
     */
    public function setIDSuperUser($ID_SuperUser)
    {
        $this->ID_SuperUser = $ID_SuperUser;
    }

    /**
     * @return mixed
     */
    public function getUserType()
    {
        return $this->UserType;
    }

    /**
     * @param mixed $UserType
     */
    public function setUserType($UserType)
    {
        $this->UserType = $UserType;
    }

    /**
     * @return mixed
     */
    public function getTelephoneFixe()
    {
        return $this->TelephoneFixe;
    }

    /**
     * @param mixed $TelephoneFixe
     */
    public function setTelephoneFixe($TelephoneFixe)
    {
        $this->TelephoneFixe = $TelephoneFixe;
    }
}