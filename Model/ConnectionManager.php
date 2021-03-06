<?php
/**
 * Created by PhpStorm.
 * User: THEOPHILE
 * Date: 14/11/2017
 * Time: 12:22
 */

namespace SweetIt\SweetOm\Model;

require_once("Manager.php");

class ConnectionManager extends Manager
{
    public function connect1($login, $password){
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT * FROM user WHERE Login = ?");
        $req->execute(array($login));
        $value = $req->fetch();
        if(!$value['WaitingForSignIn'] && PASSWORD_VERIFY($password,$value['Password'])){
            $_SESSION['connected'] = true;
            $_SESSION['login'] = $value['Login'];
            $_SESSION["ID"] = $value['ID'];
            $_SESSION['userType'] = $value['UserType'];
            $_SESSION['lastName'] = $value['LastName'];
            $_SESSION['firstName'] = $value['FirstName'];
            $_SESSION['waitingForSignIn'] = $value['WaitingForSignIn'];
            $req->closeCursor();
            $req2 = $db->prepare('SELECT ID FROM house WHERE ID_Owner = ?');
            $req2->execute(array($_SESSION["ID"]));
            $_SESSION['idHouse'] = $req2->fetch()[0];
            $req2->closeCursor();
        }else{
            $_SESSION['connected'] = false;
        }

    }

    public function connect2($login, $password){
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT * FROM user WHERE Login = ?");
        $req->execute(array($login));
        $value = $req->fetch();
        if($value['WaitingForSignIn'] && PASSWORD_VERIFY($password,$value['Password'])){
            $_SESSION['connected'] = true;
            $_SESSION['login'] = $value['Login'];
            $_SESSION["ID"] = $value['ID'];
            $_SESSION['userType'] = $value['UserType'];
            $_SESSION['lastName'] = $value['LastName'];
            $_SESSION['firstName'] = $value['FirstName'];
            $_SESSION['waitingForSignIn'] = $value['WaitingForSignIn'];
            $req->closeCursor();
            $req2 = $db->prepare('SELECT ID FROM house WHERE ID_Owner = ?');
            $req2->execute(array($_SESSION["ID"]));
            $_SESSION['idHouse'] = $req2->fetch()[0];
            $req2->closeCursor();
        }else{
            $_SESSION['connected'] = false;
        }

    }

}