<?php
/**
 * Created by PhpStorm.
 * User: THEOPHILE
 * Date: 14/11/2017
 * Time: 11:10
 */

namespace SweetIt\SweetOm\Model;

require_once("Model/Manager.php");

class UserManager extends Manager
{
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
                                      SET Nom = ?, Prenom = ?, Telephone = ?, Mail = ?, ID_SuperUser = ?, UserType = ?)
                                      WHERE ID = ?');
        $affectedLines = $req->execute(array($surname, $name, $cell, $phone, $mail, $idSuperUser, 'NormalUser', $ID));

        return $affectedLines;
    }

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