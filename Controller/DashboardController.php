<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26/01/2018
 * Time: 22:52
 */

namespace SweetIt\SweetOm\Controller;

use SweetIt\SweetOm\Model\DashboardModel;

require_once('Model/DashboardModel.php');

function initializeDashboard(int $idHouse)
{
    $contents = array('air' => airDashboard($idHouse),
        'all' => allDashboard($idHouse),
        'humidity' => humidityDashboard($idHouse),
        'luminosity' => luminosityDashboard($idHouse),
        'security' => securityDashboard($idHouse),
        'temperature' => temperatureDashboard($idHouse));
    require_once('View/Dashboard.php');
}

function airDashboard($idHouse)
{
    $dashboard = new DashboardModel('air', $idHouse);

    return array('header' => $dashboard->getHeader(),
        'body' => $dashboard->getBody(),
        'footer' => $dashboard->getFooter());
}

function allDashboard($idHouse)
{
    $dashboard = new DashboardModel('all', $idHouse);

    return array('header' => $dashboard->getHeader(),
        'body' => $dashboard->getBody(),
        'footer' => $dashboard->getFooter());
}

function humidityDashboard($idHouse)
{
    $dashboard = new DashboardModel('humidity', $idHouse);

    return array('header' => $dashboard->getHeader(),
        'body' => $dashboard->getBody(),
        'footer' => $dashboard->getFooter());
}

function luminosityDashboard($idHouse)
{
    $dashboard = new DashboardModel('luminosity', $idHouse);

    return array('header' => $dashboard->getHeader(),
        'body' => $dashboard->getBody(),
        'footer' => $dashboard->getFooter());
}

function securityDashboard($idHouse)
{
    $dashboard = new DashboardModel('security', $idHouse);

    return array('header' => $dashboard->getHeader(),
        'body' => $dashboard->getBody(),
        'footer' => $dashboard->getFooter());
}

function temperatureDashboard($idHouse)
{
    $dashboard = new DashboardModel('temperature', $idHouse);

    return array('header' => $dashboard->getHeader(),
        'body' => $dashboard->getBody(),
        'footer' => $dashboard->getFooter());
}
