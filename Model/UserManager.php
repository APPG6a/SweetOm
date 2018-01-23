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
    public function listLogin(){
      $db = $this->dbConnect();
      $req = $db->prepare('SELECT Login FROM user');
      $req->execute(array());
      $listLogin =  array();
      while ($value = $req->fetch()){
        $listLogin[] = $value['Login'];
      }
      $req->closeCursor();
      return $listLogin;
    }
    public function addNewUserToDb($login,$password,$mail){
        $db = $this->dbConnect();
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
        $req = $db->prepare('INSERT INTO user(Login,Password,Mail,UserType) VALUES(?,?,?,?)');
        $req->execute(array($login,$passwordHashed,$mail,'customer'));
        $req->closeCursor();
    }
    public function updateDomisep($phoneNumber, $address, $mail){
        $db = $this->dbConnect();
        $req1 = $db->prepare('UPDATE user SET PhoneNumber = ?, Mail = ? WHERE ID=?');
        $req1->execute(array($phoneNumber, $mail, $_SESSION['ID']));
        $req1->closeCursor();
        $req2 = $db->prepare('UPDATE house SET Address = ? WHERE ID_Owner=?');
        $req2->execute(array($address, $_SESSION['ID']));
        $req2->closeCursor();
    }
     public function updateUserProfil($phoneNumber, $address, $mail){
        $db = $this->dbConnect();
        $req1 = $db->prepare('UPDATE user SET PhoneNumber = ?, Mail = ? WHERE ID=?');
        $req1->execute(array($phoneNumber, $mail, $_SESSION['ID']));
        $req1->closeCursor();
        $req2 = $db->prepare('UPDATE house SET Address = ? WHERE ID_Owner=?');
        $req2->execute(array($address, $_SESSION['ID']));
        $req2->closeCursor();
    }
    public function getDomisepInfo($id){
        $db = $this->dbConnect();
        $req1 = $db->prepare('SELECT * FROM user WHERE ID = ?');
        $req1->execute(array($id));
        $user = array();
        $value1 = $req1->fetch();
        $user['phoneNumber'] = $value1['PhoneNumber'];
        $user['mail'] = $value1['Mail'];
        $req1->closeCursor();
        $req2 = $db->prepare('SELECT Address FROM house WHERE ID_Owner = ?');
        $req2->execute(array($id));
        $value2 = $req2->fetch();
        $user['address'] = $value2['Address'];
        $req2->closeCursor();
        return $user;
    }
    public function getUserInfo($id){
        $db = $this->dbConnect();
        $req1 = $db->prepare('SELECT * FROM user WHERE ID = ?');
        $req1->execute(array($id));
        $user = array();
        $value1 = $req1->fetch();
        $user['phoneNumber'] = $value1['PhoneNumber'];
        $user['mail'] = $value1['Mail'];
        $req1->closeCursor();
        $req2 = $db->prepare('SELECT Address FROM house WHERE ID_Owner = ?');
        $req2->execute(array($id));
        $value2 = $req2->fetch();
        $user['address'] = $value2['Address'];
        $req2->closeCursor();
        return $user;
    }
    function updateNewUser($ID, $login, $password, $surname, $name, $cell, $phone, $mail)
    {
        $db = $this->dbConnect();
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
        $req = $db->prepare('UPDATE user
          SET Login = ?, Password = ?, WaitingForSignIn = ?,  LastName = ?, FirstName = ?, PhoneNumber = ?, CellNumber = ?, Mail = ?, UserType = ? 
          WHERE ID = ?');
        $affectedLines = $req->execute(array($login, $passwordHashed, 0, $surname, $name, $cell, $phone, $mail, 'customer', $ID));
        $req->closeCursor();
        return $affectedLines;
    }

    function setHome($idOwner,$address)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('INSERT INTO house(Address, ID_Owner) VALUES (?, ?)');
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