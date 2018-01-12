<?php
/**
 * Created by PhpStorm.
 * User: THEOPHILE
 * Date: 14/11/2017
 * Time: 11:10
 */

namespace SweetIt\SweetOm\Model;

require_once("Manager.php");

class UserManager extends Manager
{
    private $ID;
    private $lastName;
    private $firstName;
    private $login;
    private $password;
    private $cellNumber;
    private $phoneNumber;
    private $mailAddress;
    private $userType;
    private $ID_SuperUser;

    /**
     * UserManager constructor.
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
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getCellNumber()
    {
        return $this->cellNumber;
    }

    /**
     * @param mixed $cellNumber
     */
    public function setCellNumber($cellNumber)
    {
        $this->cellNumber = $cellNumber;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return mixed
     */
    public function getMailAddress()
    {
        return $this->mailAddress;
    }

    /**
     * @param mixed $mailAddress
     */
    public function setMailAddress($mailAddress)
    {
        $this->mailAddress = $mailAddress;
    }

    /**
     * @return mixed
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * @param mixed $userType
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;
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

    function getUser($id)
    {
        $db = $this->dbConnect();

        $req = $db->prepare("SELECT * FROM utilisateurs WHERE ID = ?");
        $user = $req->execute(array($id));

        if (!$info = $user->fetch()){
            return $info;
        }
        else {
            throw new \Exception("User not found");
        }
    }

    function updateUser($ID, $surname, $name, $cell, $phone, $mail, $idSuperUser = null)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE utilisateurs
                                      SET Nom = ?, Prenom = ?, Telephone = ?, Mail = ?, ID_SuperUser = ?, UserType = ? 
                                      WHERE ID = ?');
        $affectedLines = $req->execute(array($surname, $name, $cell, $phone, $mail, $idSuperUser, 'NormalUser', $ID));

        return $affectedLines;
    }

    /**
     * @param $address
     * @param $idOwner
     * @return bool
     */
    function setHome($address, $idOwner)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('INSERT INTO domicile (Adresse, ID_Proprietaire) VALUES (?, ?)');
        $affectedLines = $req->execute(array($address,$idOwner));

        return $affectedLines;
    }

    /*
    function getHouse($idUser){
        $db = $this->dbConnect();

        $req = $db->prepare('');
        $house = $req->execute();

    }*/
}