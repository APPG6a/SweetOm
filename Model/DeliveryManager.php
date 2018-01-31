<?php
namespace SweetIt\SweetOm\Model;
require_once('Manager.php');

class DeliveryManager extends Manager {


	public function addDelivery($arrayRoom, $arrayPost){
		// found in database price and id equipement
	    $i = 1;
	    $dateLoading = date('Y-m-d H:i:s');
	    foreach ($arrayRoom as $aRoom){
	        $db = $this->dbConnect();
	        $type = ['Température'.$i,'Luminosité'.$i,'Humidité'.$i,'Fumée'.$i,'Présence'.$i,'CO2'.$i,'Caméra'.$i,'Pression'.$i];
	        $req2 = $db->prepare('SELECT ID FROM room WHERE ID_Domicile = ? AND RoomName = ?');
	        $req2->execute(array($_SESSION['idHouse'], $aRoom));
	        $idRoom = $req2->fetch()[0];
	        $req2->closeCursor();
	        $req3 = $db->prepare('SELECT ID FROM cemac WHERE ID_Room = ?');
	        $req3->execute(array($idRoom));
	        $idCemac = $req3->fetch()[0];
	        $j=0; 
	        foreach ($type as $aType) {
	            if($arrayPost[$aType]!='Aucun'){
	                $req1 = $db->prepare('SELECT  Price FROM catalog WHERE model = ?');
	                $req1->execute(array($arrayPost[$aType]));
	                $value = $req1->fetch();
	                $price = floatval($value['Price']);
	                $req1->closeCursor();
	                $req3->closeCursor();
	                $req4 = $db->prepare('SELECT ID FROM equipment  WHERE ID_CeMac = ?');
	                $req4->execute(array($idCemac));
	                $idDelivery = $req4->fetch()[0];
	                $idDelivery+=$j;
	                $req4->closeCursor();
	                $req5 = $db->prepare('INSERT INTO delivery_history(DateLoading,Price,ID_Delivery,ID_User) VALUES (?,?,?,?)');
	                $req5->execute(array($dateLoading,$price,$idDelivery,$_SESSION['ID']));
	                $req5->closeCursor();
	                $j++;
	            }
	            
	        }
	        $i++;
		}
	}
		public function addDeliveryByRoomName($roomName, $arrayPost){
		// found in database price and id equipement
	    $dateLoading = date('Y-m-d H:i:s');
        $db = $this->dbConnect();
        $type = ['Température','Luminosité','Humidité','Fumée','Présence','CO2','Caméra','Pression'];
        $req2 = $db->prepare('SELECT ID FROM room WHERE ID_Domicile = ? AND RoomName = ?');
        $req2->execute(array($_SESSION['idHouse'], $roomName));
        $idRoom = $req2->fetch()[0];
        $req2->closeCursor();
        $req3 = $db->prepare('SELECT ID FROM cemac WHERE ID_Room = ?');
        $req3->execute(array($idRoom));
        $idCemac = $req3->fetch()[0];
        $j=$_SESSION['nbrEquipment']-1; 
        foreach ($type as $aType) {
            if($arrayPost[$aType]!='Aucun'){
                $req1 = $db->prepare('SELECT  Price FROM catalog WHERE model = ?');
                $req1->execute(array($arrayPost[$aType]));
                $value = $req1->fetch();
                $price = floatval($value['Price']);
                $req1->closeCursor();
                $req3->closeCursor();
                $req4 = $db->prepare('SELECT ID FROM equipment  WHERE ID_CeMac = ?');
                $req4->execute(array($idCemac));
                while ($value4 = $req4->fetch()){
                	$idDelivery = $value4['ID'];

                }
                $idDelivery = $idDelivery-$j;
                $req4->closeCursor();
                $req5 = $db->prepare('INSERT INTO delivery_history(DateLoading,Price,ID_Delivery,ID_User) VALUES (?,?,?,?)');
                $req5->execute(array($dateLoading,$price,$idDelivery,$_SESSION['ID']));
                $req5->closeCursor();
                $j--;
            }
		}
		unset($_SESSION['nbrEquipment']);
	}


	public function getAllDelivery(){
		$db = $this->dbConnect();
		$listDeliveryByUser = array();
		$listID = array();
		$req1 = $db->prepare('SELECT DISTINCT ID_User FROM delivery_history WHERE delivered = 0');
		$req1->execute(array());
		while ($value1=$req1->fetch()) {
			$listID[] = $value1['ID_User'];
		}
		$req1->closeCursor();

		foreach ($listID as $anID) {
			$aUser = array();

			$reqUser = $db->query('SELECT Login,FirstName,LastName,CellNumber,PhoneNumber FROM user WHERE ID = '.$anID);
			$valueUser = $reqUser->fetch();

			$infoUser = array();
			$infoUser['login'] = $valueUser['Login'];
			$infoUser['name'] = $valueUser['FirstName']." ".$valueUser["LastName"];
			$infoUser['phone'] = $valueUser['PhoneNumber']." ou ".$valueUser['CellNumber'];
            $aUser[] = $infoUser;
            $reqUser->closeCursor();

            $req2 = $db->prepare('SELECT ID_Delivery FROM delivery_history WHERE ID_User = ? AND delivered = 0');
            $req2->execute(array($anID));

			while($value2 = $req2->fetch()){
				$listEquipment = array();

				$req3 = $db->prepare('SELECT ID_Catalog, ID_CeMac FROM equipment WHERE ID = ? ');
				$req3->execute(array($value2['ID_Delivery']));
				$value3 = $req3->fetch();
				$req3->closeCursor();

				$req4 = $db->prepare('SELECT room.RoomName FROM room JOIN cemac ON(room.ID = cemac.ID_Room) WHERE cemac.ID = ?');
				$req4->execute(array($value3['ID_CeMac']));
				$value4 = $req4->fetch();
				$req4->closeCursor();

				$req5 = $db->prepare('SELECT Name, Model, Price FROM catalog WHERE ID = ?');
				$req5->execute(array($value3['ID_Catalog']));
				$value5 = $req5->fetch();
                $req5->closeCursor();

                $listEquipment['place'] = $value4['RoomName'];
                $listEquipment['name'] = $value5['Name'];
                $listEquipment['model'] = $value5['Model'];
                $listEquipment['price'] = $value5['Price'];

                $aUser[] = $listEquipment;
			}
			$listDeliveryByUser[] = $aUser;
		}
		return $listDeliveryByUser;
	}

	public function getADelivery($id){
        $db = $this->dbConnect();
        $aUser = array();

        $reqUser = $db->query('SELECT Login,FirstName,LastName,CellNumber,PhoneNumber FROM user WHERE ID = '.$id);
        $valueUser = $reqUser->fetch();
        $reqUser->closeCursor();

        $infoUser = array();
        $infoUser['login'] = $valueUser['Login'];
        $infoUser['name'] = $valueUser['FirstName']." ".$valueUser["LastName"];
        $infoUser['phone'] = $valueUser['PhoneNumber']." ou ".$valueUser['CellNumber'];
        $aUser[] = $infoUser;

        $reqDelivery = $db->query('SELECT ID_Delivery FROM delivery_history WHERE ID_User = '.$id.' AND delivered = 0');

        while($value2 = $reqDelivery->fetch()){
            $listEquipment = array();

            $req3 = $db->prepare('SELECT ID_Catalog, ID_CeMac FROM equipment WHERE ID = ? ');
            $req3->execute(array($value2['ID_Delivery']));
            $value3 = $req3->fetch();
            $req3->closeCursor();

            $req4 = $db->prepare('SELECT room.RoomName FROM room JOIN cemac ON(room.ID = cemac.ID_Room) WHERE cemac.ID = ?');
            $req4->execute(array($value3['ID_CeMac']));
            $value4 = $req4->fetch();
            $req4->closeCursor();

            $req5 = $db->prepare('SELECT Name, Model, Price FROM catalog WHERE ID = ?');
            $req5->execute(array($value3['ID_Catalog']));
            $value5 = $req5->fetch();
            $req5->closeCursor();

            $listEquipment['place'] = $value4['RoomName'];
            $listEquipment['name'] = $value5['Name'];
            $listEquipment['model'] = $value5['Model'];
            $listEquipment['price'] = $value5['Price'];

            $aUser[] = $listEquipment;
        }

        $reqDelivery->closeCursor();

        return $aUser;
	}

	public function delivered($login){
		$db = $this->dbConnect();
		$dateDelivered = date('Y-m-d H:i:s');
		$req1 = $db->prepare('SELECT ID FROM user WHERE Login = ?');
		$req1->execute(array($login));
		$id = $req1->fetch()[0]; 
		$req = $db->prepare('UPDATE delivery_history SET DateDelivery = ?, delivered = ? WHERE ID_User = ?');
		$req->execute(array($dateDelivered,1,$id));

	}

    public function collectData($infoUser)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT LastName,FirstName,PhoneNumber,CellNumber,Mail FROM user WHERE Login=?');
        $req->execute(array($infoUser));

        $user = $req->fetch();

        if (!$user) {
            die(404);
        } else {
            return array($infoUser,
                $user['FirstName'].' '.$user['LastName'],
                $user['PhoneNumber']. ' ou '.$user['CellNumber']);
        }
    }
}