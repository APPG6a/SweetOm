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
    function getUser($login, $password)
    {
        $db = $this->dbConnect();

        $req = $db->prepare("SELECT * FROM utilisateurs WHERE login = ? AND password = ?");
        $user = $req->execute(array($login, $password));

        if (!$info = $user->fetch()){
            return $info;
        }
        else {
            throw new \Exception("UserName or Password invalid");
        }
    }

    function setUser($surname, $name, $login, $password, $phone, $mail, $idSuperUser = null, $userType)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('INSERT INTO utilisateurs (Nom, Prenom, Login, Password, Telephone, Mail, ID_SuperUser, UserType)
                                      VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $affectedLines = $req->execute(array($surname, $name, $login, password_hash($password, PASSWORD_DEFAULT), $phone, $mail, $idSuperUser, $userType));

        return $affectedLines;
    }

    /*
    function getHouse($idUser){
        $db = $this->dbConnect();

        $req = $db->prepare('');
        $house = $req->execute();

    }*/
}