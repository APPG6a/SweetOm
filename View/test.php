<?php
namespace View;
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15/01/2018
 * Time: 16:15
 */
use function Controller\getTemperatureByHouse;

include '../Controller/clientController.php';

echo getTemperatureByHouse(1);