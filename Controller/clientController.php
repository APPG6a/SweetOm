<?php

namespace Controller;

/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/01/2018
 * Time: 09:52
 */

use SweetIt\SweetOm\Model\crudModel;
use SweetIt\SweetOm\Model\TimeModel;
use SweetIt\SweetOm\Model\UserManager;

require_once 'Model/CrudModel.php';
require_once 'Model/TimeModel.php';

/**
 * @param $login
 * @param $pass
 */
function connectUser($login, $pass)
{
    $crud = new crudModel();

    $userInfo = $crud->read(array('Login' => $login), 'user', 0)[0];
    if (password_verify($pass, $userInfo['Password'])) {
        $_SESSION['ID'] = $userInfo['ID'];
        $_SESSION['connected'] = true;
    }

    require_once('View/homeUser.php');
}

/**
 * @param $post
 * @return bool
 */
function singInUser($post): bool
{
    $crud = new crudModel();
    $user = new UserManager($post);

    return $crud->create($user->getAll(), 'user');
}

/**
 * @param int $idHouse
 * @return float
 */
function getTemperatureByHouse(int $idHouse): float
{
    $crud = new crudModel();
    $time = new TimeModel();

    $allRooms = $crud->read(array('ID_Domicile' => $idHouse), 'rooms', 0);

    $averageTemperature = 0;
    $counter = 0;

    foreach ($allRooms as $room) {

        $allCeMac = $crud->read(array('ID_Room' => $room['ID'] + 0), 'cemac', 0);
        foreach ($allCeMac as $cemac) {

            $allEquipment = $crud->read(array('ID_CeMac' => $cemac['ID'], 'Type_measure' => 'degrees'), 'equipment', 0);
            foreach ($allEquipment as $equipment) {

                $latestMeasure = $time->readLatest(array('ID_Equipment' => $equipment['ID']), 'measure', 'DateTime');

                $averageTemperature += $latestMeasure["Data"] + 0.0;
                $counter++;
            }
        }
    }

    return round($averageTemperature/$counter, 1);
}

/**
 * @param int $idRoom
 * @return float
 */
function getTemperatureByRoom(int $idRoom): float
{
    $crud = new crudModel();
    $time = new TimeModel();

    $averageTemperature = 0;
    $counter = 0;

    $allCeMac = $crud->read(array('ID_Room' => $idRoom + 0), 'cemac', 0);
    foreach ($allCeMac as $cemac) {

        $allEquipment = $crud->read(array('ID_CeMac' => $cemac['ID'], 'Type_measure' => 'degrees'), 'equipment', 0);
        foreach ($allEquipment as $equipment) {

            $latestMeasure = $time->readLatest(array('ID_Equipment' => $equipment['ID']), 'measure', 'DateTime');

            $averageTemperature += $latestMeasure["Data"] + 0.0;
            $counter++;
        }
    }

    return round($averageTemperature/$counter, 1);
}

/**
 * @param int $idHouse
 * @return float
 */
function getLuminosityByHouse(int $idHouse): float
{
    $crud = new crudModel();
    $time = new TimeModel();

    $allRooms = $crud->read(array('ID_Domicile' => $idHouse), 'rooms', 0);

    $averageTemperature = 0;
    $counter = 0;

    foreach ($allRooms as $room) {

        $allCeMac = $crud->read(array('ID_Room' => $room['ID'] + 0), 'cemac', 0);
        foreach ($allCeMac as $cemac) {

            $allEquipment = $crud->read(array('ID_CeMac' => $cemac['ID'], 'Type_measure' => 'lux'), 'equipment', 0);
            foreach ($allEquipment as $equipment) {

                $latestMeasure = $time->readLatest(array('ID_Equipment' => $equipment['ID']), 'measure', 'DateTime');

                $averageTemperature += $latestMeasure["Data"] + 0.0;
                $counter++;
            }
        }
    }

    return round($averageTemperature/$counter, 1);
}

/**
 * @param int $idRoom
 * @return float
 */
function getLuminosityByRoom(int $idRoom): float
{
    $crud = new crudModel();
    $time = new TimeModel();

    $averageTemperature = 0;
    $counter = 0;

    $allCeMac = $crud->read(array('ID_Room' => $idRoom + 0), 'cemac', 0);
    foreach ($allCeMac as $cemac) {

        $allEquipment = $crud->read(array('ID_CeMac' => $cemac['ID'], 'Type_measure' => 'lux'), 'equipment', 0);
        foreach ($allEquipment as $equipment) {

            $latestMeasure = $time->readLatest(array('ID_Equipment' => $equipment['ID']), 'measure', 'DateTime');

            $averageTemperature += $latestMeasure["Data"] + 0.0;
            $counter++;
        }
    }

    return round($averageTemperature/$counter, 1);
}

/**
 * @param int $idHouse
 * @return float
 */
function getHumidityByHouse(int $idHouse): float
{
    $crud = new crudModel();
    $time = new TimeModel();

    $allRooms = $crud->read(array('ID_Domicile' => $idHouse), 'rooms', 0);

    $averageTemperature = 0;
    $counter = 0;

    foreach ($allRooms as $room) {

        $allCeMac = $crud->read(array('ID_Room' => $room['ID'] + 0), 'cemac', 0);
        foreach ($allCeMac as $cemac) {

            $allEquipment = $crud->read(array('ID_CeMac' => $cemac['ID'], 'Type_measure' => 'humidityPerCent'), 'equipment', 0);
            foreach ($allEquipment as $equipment) {

                $latestMeasure = $time->readLatest(array('ID_Equipment' => $equipment['ID']), 'measure', 'DateTime');

                $averageTemperature += $latestMeasure["Data"] + 0.0;
                $counter++;
            }
        }
    }

    return round($averageTemperature/$counter, 1);
}

/**
 * @param int $idRoom
 * @return float
 */
function getHumidityByRoom(int $idRoom): float
{
    $crud = new crudModel();
    $time = new TimeModel();

    $averageTemperature = 0;
    $counter = 0;

    $allCeMac = $crud->read(array('ID_Room' => $idRoom + 0), 'cemac', 0);
    foreach ($allCeMac as $cemac) {

        $allEquipment = $crud->read(array('ID_CeMac' => $cemac['ID'], 'Type_measure' => 'humidityPerCent'), 'equipment', 0);
        foreach ($allEquipment as $equipment) {

            $latestMeasure = $time->readLatest(array('ID_Equipment' => $equipment['ID']), 'measure', 'DateTime');

            $averageTemperature += $latestMeasure["Data"] + 0.0;
            $counter++;
        }
    }

    return round($averageTemperature/$counter, 1);
}

/**
 * @param int $idHouse
 * @return float
 */
function getCO2ByHouse(int $idHouse): float
{
    $crud = new crudModel();
    $time = new TimeModel();

    $allRooms = $crud->read(array('ID_Domicile' => $idHouse), 'rooms', 0);

    $averageTemperature = 0;
    $counter = 0;

    foreach ($allRooms as $room) {

        $allCeMac = $crud->read(array('ID_Room' => $room['ID'] + 0), 'cemac', 0);
        foreach ($allCeMac as $cemac) {

            $allEquipment = $crud->read(array('ID_CeMac' => $cemac['ID'], 'Type_measure' => 'co2PerCent'), 'equipment', 0);
            foreach ($allEquipment as $equipment) {

                $latestMeasure = $time->readLatest(array('ID_Equipment' => $equipment['ID']), 'measure', 'DateTime');

                $averageTemperature += $latestMeasure["Data"] + 0.0;
                $counter++;
            }
        }
    }

    return round($averageTemperature/$counter, 1);
}

/**
 * @param int $idRoom
 * @return float
 */
function getCO2ByRoom(int $idRoom): float
{
    $crud = new crudModel();
    $time = new TimeModel();

    $averageTemperature = 0;
    $counter = 0;

    $allCeMac = $crud->read(array('ID_Room' => $idRoom + 0), 'cemac', 0);
    foreach ($allCeMac as $cemac) {

        $allEquipment = $crud->read(array('ID_CeMac' => $cemac['ID'], 'Type_measure' => 'co2PerCent'), 'equipment', 0);
        foreach ($allEquipment as $equipment) {

            $latestMeasure = $time->readLatest(array('ID_Equipment' => $equipment['ID']), 'measure', 'DateTime');

            $averageTemperature += $latestMeasure["Data"] + 0.0;
            $counter++;
        }
    }

    return round($averageTemperature/$counter, 1);
}

/**
 * @param int $idHouse
 * @return float
 */
function getPressureByHouse(int $idHouse): float
{
    $crud = new crudModel();
    $time = new TimeModel();

    $allRooms = $crud->read(array('ID_Domicile' => $idHouse), 'rooms', 0);

    $averageTemperature = 0;
    $counter = 0;

    foreach ($allRooms as $room) {

        $allCeMac = $crud->read(array('ID_Room' => $room['ID'] + 0), 'cemac', 0);
        foreach ($allCeMac as $cemac) {

            $allEquipment = $crud->read(array('ID_CeMac' => $cemac['ID'], 'Type_measure' => 'psi'), 'equipment', 0);
            foreach ($allEquipment as $equipment) {

                $latestMeasure = $time->readLatest(array('ID_Equipment' => $equipment['ID']), 'measure', 'DateTime');

                $averageTemperature += $latestMeasure["Data"] + 0.0;
                $counter++;
            }
        }
    }

    return round($averageTemperature/$counter, 1);
}

/**
 * @param int $idRoom
 * @return float
 */
function getPressureByRoom(int $idRoom): float
{
    $crud = new crudModel();
    $time = new TimeModel();

    $averageTemperature = 0;
    $counter = 0;

    $allCeMac = $crud->read(array('ID_Room' => $idRoom + 0), 'cemac', 0);
    foreach ($allCeMac as $cemac) {

        $allEquipment = $crud->read(array('ID_CeMac' => $cemac['ID'], 'Type_measure' => 'psi'), 'equipment', 0);
        foreach ($allEquipment as $equipment) {

            $latestMeasure = $time->readLatest(array('ID_Equipment' => $equipment['ID']), 'measure', 'DateTime');

            $averageTemperature += $latestMeasure["Data"] + 0.0;
            $counter++;
        }
    }

    return round($averageTemperature/$counter, 1);
}