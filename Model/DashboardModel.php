<?php

namespace SweetIt\SweetOm\Model;

require_once('CrudModel.php');
require_once('HouseManager.php');
require_once('TimeModel.php');

/**
 * Created by PhpStorm.
 * User: user
 * Date: 26/01/2018
 * Time: 22:52
 */
class DashboardModel extends CrudModel
{

    /**
     * Type of Dashboard in use
     *
     * @var string
     */
    private $type;

    /**
     * Information to display in the upper part of the dashboard
     * may content from 1 to 3 values
     * associative array:
     *  {
     *      "unit to display" => value,
     *      "unit to display" => value,
     *      "unit to display" => value
     * }
     *
     * /!\ Applicable for other types than security [array is empty in this case]
     *
     * @var array
     */
    private $header;

    /**
     * Information to display in the middle part of the dashboard
     *
     * @var mixed
     */
    private $body;

    /**
     * Information to display in the lower part of the dashboard
     *
     * @var mixed
     */
    private $footer;

    /**
     * Dashboard's house's id
     *
     * @var int
     */
    private $idHouse;

    /**
     * Dashboard's house
     *
     * @var HouseManager
     */
    private $house;

    /**
     * DashboardModel constructor.
     * @param string $type
     * @param int $idHouse
     */
    public function __construct(string $type, int $idHouse)
    {
        $this->type = $type;
        $this->idHouse = $idHouse;

        $this->house = new HouseManager($idHouse);

        switch ($this->type) {
            case 'air';
                $this->typeAir($idHouse);
                break;
            case 'all';
                $this->typeAll($idHouse);
                break;
            case 'humidity';
                $this->typeHumidity($idHouse);
                break;
            case 'luminosity';
                $this->typeLuminosity($idHouse);
                break;
            case 'security';
                $this->typeSecurity($idHouse);
                break;
            case 'temperature';
                $this->typeTemperature($idHouse);
                break;
            default;
                die(400);
        }
    }

    /**
     * @return array
     */
    public function getHeader(): array
    {
        return $this->header;
    }

    /**
     * @param array $header
     */
    public function setHeader(array $header): void
    {
        $this->header = $header;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body): void
    {
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * @param mixed $footer
     */
    public function setFooter($footer): void
    {
        $this->footer = $footer;
    }

    /**
     * Pseudo-constructor for 'Comfort' type of dashboard
     * @param int $idHouse
     */
    public function typeAir(int $idHouse)
    {
        /**
         * Header Definition
         */

        $content = $this->getAirByHouse($idHouse);
        $this->setHeader($content);

        /**
         * Body Definition
         */

        /**
         * Getting all rooms data
         */
        $data = array();
        foreach ($this->house->getRooms() as $room) {
            $subData = array();
            $subData['name'] = $room['RoomName'];
            $subData['value'] = $this->getAiryByRoom($room['ID']);
            $data[] = $subData;
        }
        $this->setBody($data);

        /**
         * Footer Definition
         */
    }

    /**
     * Pseudo-constructor for 'All' type of dashboard
     * @param int $idHouse
     */
    public function typeAll(int $idHouse)
    {
        /**
         * Header Definition
         */

        $avgTemp = $this->getAllByHouse($idHouse);
        $this->setHeader($avgTemp);

        /**
         * Body Definition
         */

        /**
         * Getting all rooms data
         */
        $data = array();
        foreach ($this->house->getRooms() as $room) {
            $subData = array();
            $subData['name'] = $room['RoomName'];
            $subData['value'] = $this->getAllByRoom($room['ID']);
            $data[] = $subData;
        }
        $this->setBody($data);

        /**
         * Footer Definition
         */
    }

    /**
     * Pseudo-constructor for 'Temperature' type of dashboard
     * @param int $idHouse
     */
    public function typeTemperature(int $idHouse)
    {
        /**
         * Header Definition
         */

        $avgTemp = $this->getTemperatureByHouse($idHouse);
        $this->setHeader(array($avgTemp));

        /**
         * Body Definition
         */

        /**
         * Getting all rooms data
         */
        $data = array();
        foreach ($this->house->getRooms() as $room) {
            $subData = array();
            $subData['name'] = $room['RoomName'];
            $subData['value'] = $this->getTemperatureByRoom($room['ID']);
            $data[] = $subData;
        }
        $this->setBody($data);

        /**
         * Footer Definition
         */
    }

    /**
     * Pseudo-constructor for 'Security' type of dashboard
     * @param int $idHouse
     */
    public function typeSecurity(int $idHouse)
    {
        /**
         * Header Definition
         */

        $security = $this->getSecurityByHouse($idHouse);
        $this->setHeader($security);

        /**
         * Body Definition
         */

        /**
         * Getting all rooms data
         */
        $data = array();
        foreach ($this->house->getRooms() as $room) {
            $subData = array();
            $subData['name'] = $room['RoomName'];
            $subData['value'] = $this->getTemperatureByRoom($room['ID']);
            $data[] = $subData;
        }
        $this->setBody($data);

        /**
         * Footer Definition
         */
    }

    /**
     * Pseudo-constructor for 'Humidity' type of dashboard
     * @param int $idHouse
     */
    public function typeHumidity(int $idHouse)
    {
        /**
         * Header Definition
         */

        $avgTemp = $this->getTemperatureByHouse($idHouse);
        $this->setHeader(array($avgTemp));

        /**
         * Body Definition
         */

        /**
         * Getting all rooms data
         */
        $data = array();
        foreach ($this->house->getRooms() as $room) {
            $subData = array();
            $subData['name'] = $room['RoomName'];
            $subData['value'] = $this->getTemperatureByRoom($room['ID']);
            $data[] = $subData;
        }
        $this->setBody($data);

        /**
         * Footer Definition
         */
    }

    /**
     * Pseudo-constructor for 'Luminosity' type of dashboard
     * @param int $idHouse
     */
    public function typeLuminosity(int $idHouse)
    {
        /**
         * Header Definition
         */

        $avgTemp = $this->getTemperatureByHouse($idHouse);
        $this->setHeader(array($avgTemp));

        /**
         * Body Definition
         */

        /**
         * Getting all rooms data
         */
        $data = array();
        foreach ($this->house->getRooms() as $room) {
            $subData = array();
            $subData['name'] = $room['RoomName'];
            $subData['value'] = $this->getTemperatureByRoom($room['ID']);
            $data[] = $subData;
        }
        $this->setBody($data);

        /**
         * Footer Definition
         */
    }

    /**
     * @param int $idHouse
     * @return float
     */
    function getTemperatureByHouse(int $idHouse): float
    {
        $crud = new crudModel();
        $bdd = $crud->dbConnect();

        $avg = $bdd->query('SELECT AVG(`Data`) FROM (SELECT `Data`,MAX(`DateTime`) FROM `measure` WHERE `ID_Equipment` IN (SELECT `ID` FROM `equipment` WHERE `MeasureType` = \'degrees\' AND `ID_CeMac` IN (SELECT `ID` FROM `cemac` WHERE `ID_Room` IN (SELECT `ID` FROM `room` WHERE `ID_Domicile` = ' . $idHouse . '  ) ) ) GROUP BY `ID_Equipment`) DerivedTable ')->fetchAll()[0][0];
        return round($avg, 1);
    }

    /**
     * @param int $idRoom
     * @return float
     */
    function getTemperatureByRoom(int $idRoom): float
    {
        $crud = new crudModel();
        $bdd = $crud->dbConnect();

        $avg = $bdd->query('SELECT AVG(`Data`) FROM (SELECT `Data`,MAX(`DateTime`) FROM `measure` WHERE `ID_Equipment` IN (SELECT `ID` FROM `equipment` WHERE `MeasureType` = \'degrees\' AND `ID_CeMac` IN (SELECT `ID` FROM `cemac` WHERE `ID_Room` = ' . $idRoom . ' ) ) GROUP BY `ID_Equipment`) DerivedTable ')->fetchAll()[0][0];
        return round($avg, 1);
    }

    /**
     * @param int $idHouse
     * @return float
     */
    function getHumidityByHouse(int $idHouse): float
    {
        $crud = new crudModel();
        $bdd = $crud->dbConnect();

        $avg = $bdd->query('SELECT AVG(`Data`) FROM (SELECT `Data`,MAX(`DateTime`) FROM `measure` WHERE `ID_Equipment` IN (SELECT `ID` FROM `equipment` WHERE `MeasureType` = \'humidityPercentage\' AND `ID_CeMac` IN (SELECT `ID` FROM `cemac` WHERE `ID_Room` IN (SELECT `ID` FROM `room` WHERE `ID_Domicile` = ' . $idHouse . '  ) ) ) GROUP BY `ID_Equipment`) DerivedTable ')->fetchAll()[0][0];
        return round($avg, 1);
    }

    /**
     * @param int $idRoom
     * @return float
     */
    function getHumidityByRoom(int $idRoom): float
    {
        $crud = new crudModel();
        $bdd = $crud->dbConnect();

        $avg = $bdd->query('SELECT AVG(`Data`) FROM (SELECT `Data`,MAX(`DateTime`) FROM `measure` WHERE `ID_Equipment` IN (SELECT `ID` FROM `equipment` WHERE `MeasureType` = \'humidityPercentage\' AND `ID_CeMac` IN (SELECT `ID` FROM `cemac` WHERE `ID_Room` = ' . $idRoom . ' ) ) GROUP BY `ID_Equipment`) DerivedTable ')->fetchAll()[0][0];
        return round($avg, 1);
    }

    /**
     * @param int $idHouse
     * @return float
     */
    function getLuminosityByHouse(int $idHouse): float
    {
        $crud = new crudModel();
        $bdd = $crud->dbConnect();

        $avg = $bdd->query('SELECT AVG(`Data`) FROM (SELECT `Data`,MAX(`DateTime`) FROM `measure` WHERE `ID_Equipment` IN (SELECT `ID` FROM `equipment` WHERE `MeasureType` = \'candela\' AND `ID_CeMac` IN (SELECT `ID` FROM `cemac` WHERE `ID_Room` IN (SELECT `ID` FROM `room` WHERE `ID_Domicile` = ' . $idHouse . '  ) ) ) GROUP BY `ID_Equipment`) DerivedTable ')->fetchAll()[0][0];
        return round($avg, 1);
    }

    /**
     * @param int $idRoom
     * @return float
     */
    function getLuminosityByRoom(int $idRoom): float
    {
        $crud = new crudModel();
        $bdd = $crud->dbConnect();

        $avg = $bdd->query('SELECT AVG(`Data`) FROM (SELECT `Data`,MAX(`DateTime`) FROM `measure` WHERE `ID_Equipment` IN (SELECT `ID` FROM `equipment` WHERE `MeasureType` = \'candela\' AND `ID_CeMac` IN (SELECT `ID` FROM `cemac` WHERE `ID_Room` = ' . $idRoom . ' ) ) GROUP BY `ID_Equipment`) DerivedTable ')->fetchAll()[0][0];
        return round($avg, 1);
    }

    /**
     * @param int $idHouse
     * @return array
     */
    function getAirByHouse(int $idHouse): array
    {
        $crud = new crudModel();
        $bdd = $crud->dbConnect();

        //$avg = $bdd->query('SELECT AVG(`Data`) FROM (SELECT `Data`,MAX(`DateTime`) FROM `measure` WHERE `ID_Equipment` IN (SELECT `ID` FROM `equipment` WHERE `MeasureType` = \'candela\' AND `ID_CeMac` IN (SELECT `ID` FROM `cemac` WHERE `ID_Room` IN (SELECT `ID` FROM `room` WHERE `ID_Domicile` = ' . $idHouse . '  ) ) ) GROUP BY `ID_Equipment`) DerivedTable ')->fetchAll()[0][0];

        $O3 = $bdd->query('SELECT AVG(`Data`) FROM (SELECT `Data`,MAX(`DateTime`) FROM `measure` WHERE `ID_Equipment` IN (SELECT `ID` FROM `equipment` WHERE `MeasureType` = \'O3\' AND `ID_CeMac` IN (SELECT `ID` FROM `cemac` WHERE `ID_Room` IN (SELECT `ID` FROM `room` WHERE `ID_Domicile` = ' . $idHouse . '  ) ) ) GROUP BY `ID_Equipment`) DerivedTable ')->fetchAll()[0][0];
        $SO2 = $bdd->query('SELECT AVG(`Data`) FROM (SELECT `Data`,MAX(`DateTime`) FROM `measure` WHERE `ID_Equipment` IN (SELECT `ID` FROM `equipment` WHERE `MeasureType` = \'SO2\' AND `ID_CeMac` IN (SELECT `ID` FROM `cemac` WHERE `ID_Room` IN (SELECT `ID` FROM `room` WHERE `ID_Domicile` = ' . $idHouse . '  ) ) ) GROUP BY `ID_Equipment`) DerivedTable ')->fetchAll()[0][0];
        $NO2 = $bdd->query('SELECT AVG(`Data`) FROM (SELECT `Data`,MAX(`DateTime`) FROM `measure` WHERE `ID_Equipment` IN (SELECT `ID` FROM `equipment` WHERE `MeasureType` = \'NO2\' AND `ID_CeMac` IN (SELECT `ID` FROM `cemac` WHERE `ID_Room` IN (SELECT `ID` FROM `room` WHERE `ID_Domicile` = ' . $idHouse . '  ) ) ) GROUP BY `ID_Equipment`) DerivedTable ')->fetchAll()[0][0];
        $PM10 = $bdd->query('SELECT AVG(`Data`) FROM (SELECT `Data`,MAX(`DateTime`) FROM `measure` WHERE `ID_Equipment` IN (SELECT `ID` FROM `equipment` WHERE `MeasureType` = \'PM10\' AND `ID_CeMac` IN (SELECT `ID` FROM `cemac` WHERE `ID_Room` IN (SELECT `ID` FROM `room` WHERE `ID_Domicile` = ' . $idHouse . '  ) ) ) GROUP BY `ID_Equipment`) DerivedTable ')->fetchAll()[0][0];

        $return = array($O3 . 'µg/m3 (O3)', $SO2 . 'µg/m3 (SO2)', $NO2 . 'µg/m3 (NO2)', $PM10 . 'µg/m3 (particules)');

        return $return;
    }

    /**
     * @param int $idRoom
     * @return array
     */
    function getAiryByRoom(int $idRoom): array
    {
        $crud = new crudModel();
        $bdd = $crud->dbConnect();

        $O3 = $bdd->query('SELECT AVG(`Data`) FROM (SELECT `Data`,MAX(`DateTime`) FROM `measure` WHERE `ID_Equipment` IN (SELECT `ID` FROM `equipment` WHERE `MeasureType` = \'O3\' AND `ID_CeMac` IN (SELECT `ID` FROM `cemac` WHERE `ID_Room` = ' . $idRoom . ' ) ) GROUP BY `ID_Equipment`) DerivedTable ')->fetchAll()[0][0];
        $SO2 = $bdd->query('SELECT AVG(`Data`) FROM (SELECT `Data`,MAX(`DateTime`) FROM `measure` WHERE `ID_Equipment` IN (SELECT `ID` FROM `equipment` WHERE `MeasureType` = \'SO2\' AND `ID_CeMac` IN (SELECT `ID` FROM `cemac` WHERE `ID_Room` = ' . $idRoom . ' ) ) GROUP BY `ID_Equipment`) DerivedTable ')->fetchAll()[0][0];
        $NO2 = $bdd->query('SELECT AVG(`Data`) FROM (SELECT `Data`,MAX(`DateTime`) FROM `measure` WHERE `ID_Equipment` IN (SELECT `ID` FROM `equipment` WHERE `MeasureType` = \'NO2\' AND `ID_CeMac` IN (SELECT `ID` FROM `cemac` WHERE `ID_Room` = ' . $idRoom . ' ) ) GROUP BY `ID_Equipment`) DerivedTable ')->fetchAll()[0][0];
        $PM10 = $bdd->query('SELECT AVG(`Data`) FROM (SELECT `Data`,MAX(`DateTime`) FROM `measure` WHERE `ID_Equipment` IN (SELECT `ID` FROM `equipment` WHERE `MeasureType` = \'PM10\' AND `ID_CeMac` IN (SELECT `ID` FROM `cemac` WHERE `ID_Room` = ' . $idRoom . ' ) ) GROUP BY `ID_Equipment`) DerivedTable ')->fetchAll()[0][0];

        $return = array($O3 . 'µg/m3 (O3)', $SO2 . 'µg/m3 (SO2)', $NO2 . 'µg/m3 (NO2)', $PM10 . 'µg/m3 (particules)');


        return $return;
    }

    private function getAllByHouse($idHouse): array
    {
        $crud = new crudModel();
        $bdd = $crud->dbConnect();

        $barometer = $bdd->query('SELECT AVG(`Data`) FROM (SELECT `Data`,MAX(`DateTime`) FROM `measure` WHERE `ID_Equipment` IN (SELECT `ID` FROM `equipment` WHERE `MeasureType` = \'bar\' AND `ID_CeMac` IN (SELECT `ID` FROM `cemac` WHERE `ID_Room` IN (SELECT `ID` FROM `room` WHERE `ID_Domicile` = ' . $idHouse . '  ) ) ) GROUP BY `ID_Equipment`) DerivedTable ')->fetchAll()[0][0];
        $hygrometer = $bdd->query('SELECT AVG(`Data`) FROM (SELECT `Data`,MAX(`DateTime`) FROM `measure` WHERE `ID_Equipment` IN (SELECT `ID` FROM `equipment` WHERE `MeasureType` = \'humidityPercentage\' AND `ID_CeMac` IN (SELECT `ID` FROM `cemac` WHERE `ID_Room` IN (SELECT `ID` FROM `room` WHERE `ID_Domicile` = ' . $idHouse . '  ) ) ) GROUP BY `ID_Equipment`) DerivedTable ')->fetchAll()[0][0];
        $thermometer = $bdd->query('SELECT AVG(`Data`) FROM (SELECT `Data`,MAX(`DateTime`) FROM `measure` WHERE `ID_Equipment` IN (SELECT `ID` FROM `equipment` WHERE `MeasureType` = \'degrees\' AND `ID_CeMac` IN (SELECT `ID` FROM `cemac` WHERE `ID_Room` IN (SELECT `ID` FROM `room` WHERE `ID_Domicile` = ' . $idHouse . '  ) ) ) GROUP BY `ID_Equipment`) DerivedTable ')->fetchAll()[0][0];

        return array($barometer . 'bar(s)', $hygrometer . '% HR', $thermometer . '°C');
    }

    private function getAllByRoom($idRoom): array
    {
        $crud = new crudModel();
        $bdd = $crud->dbConnect();

        $barometer = $bdd->query('SELECT AVG(`Data`) FROM (SELECT `Data`,MAX(`DateTime`) FROM `measure` WHERE `ID_Equipment` IN (SELECT `ID` FROM `equipment` WHERE `MeasureType` = \'bar\' AND `ID_CeMac` IN (SELECT `ID` FROM `cemac` WHERE `ID_Room` = ' . $idRoom . ' ) ) GROUP BY `ID_Equipment`) DerivedTable ')->fetchAll()[0][0];
        $hygrometer = $bdd->query('SELECT AVG(`Data`) FROM (SELECT `Data`,MAX(`DateTime`) FROM `measure` WHERE `ID_Equipment` IN (SELECT `ID` FROM `equipment` WHERE `MeasureType` = \'humidityPercentage\' AND `ID_CeMac` IN (SELECT `ID` FROM `cemac` WHERE `ID_Room` = ' . $idRoom . ' ) ) GROUP BY `ID_Equipment`) DerivedTable ')->fetchAll()[0][0];
        $thermometer = $bdd->query('SELECT AVG(`Data`) FROM (SELECT `Data`,MAX(`DateTime`) FROM `measure` WHERE `ID_Equipment` IN (SELECT `ID` FROM `equipment` WHERE `MeasureType` = \'degrees\' AND `ID_CeMac` IN (SELECT `ID` FROM `cemac` WHERE `ID_Room` = ' . $idRoom . ' ) ) GROUP BY `ID_Equipment`) DerivedTable ')->fetchAll()[0][0];

        return array($barometer . 'bar(s)', $hygrometer . '% HR', $thermometer . '°C');
    }

    private function getSecurityByHouse($idHouse): array
    {
        $crud = new crudModel();
        $bdd = $crud->dbConnect();

        $return = array();
        $data = $bdd->query('SELECT `Data`,MAX(`DateTime`) FROM `measure` WHERE `ID_Equipment` IN (SELECT `ID` FROM `equipment` WHERE `MeasureType` = \'security\' AND `ID_CeMac` IN (SELECT `ID` FROM `cemac` WHERE `ID_Room` IN (SELECT `ID` FROM `room` WHERE `ID_Domicile` = ' . $idHouse . '  ) ) ) GROUP BY `ID_Equipment`');

        while ($securityInfo = $data->fetch()) {
            $name = preg_replace('/^(.+)__.+$/isU', '$1', $securityInfo[0]);
            $signalForce = preg_replace('/^.+__([0123])__.+$/isU', '$1', $securityInfo[0]);
            $status = preg_replace('/^.+__(.+)$/is', '$1', $securityInfo[0]);

            $return[] = array('name' => $name,
                'signalForce' => $signalForce,
                'status' => $status);
        }

        $data->closeCursor();

        return $return;
    }
}