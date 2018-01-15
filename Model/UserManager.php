<?php
/**
 * Created by PhpStorm.
 * User: THEOPHILE
 * Date: 14/11/2017
 * Time: 11:10
 */

namespace SweetIt\SweetOm\Model;

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
     * @param null $args
     */
    public function __construct($args = null)
    {
        //Actions always executed

        //Check if $args is a non-empty array
        if(is_array($args) && !empty($args))
        {
            //get every key and value
            foreach ($args as $key => $value)
            {
                //if attribute exists, construct it
                if (isset($this->$key)) $this->$key = $value;
            }
        }
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

    public function getAll(): array
    {
        $array = array();
        foreach (get_object_vars($this) as $key => $value)
        {
            if ($value != null) $array[$key] = $value;
        }
        return $array;
    }
}