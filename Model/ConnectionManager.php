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
    function connect($login, $password){
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT * FROM user WHERE Login = ?");
        $req->execute(array($login));
        $value = $req->fetch();
        if(PASSWORD_VERIFY($password,$value['Password'])){
            $_SESSION['connected'] = true;
            $_SESSION["ID"] = $value['ID'];
            $_SESSION['userType'] = $value['UserType'];
            $_SESSION['lastName'] = $value['LastName'];
            $_SESSION['firstName'] = $value['FirstName'];
    }else{
        $_SESSION['connected'] = false;
    }
    $req->closeCursor();}
}