<?php
namespace View;
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15/01/2018
 * Time: 16:15
 */
use function Controller\getTemperatureByHouse;
use SweetIt\SweetOm\Model\crudModel;

include '../Controller/clientController.php';

echo getTemperatureByHouse(1);

$crud = new crudModel();

$hash = $crud->read(array('Login' => '10769'), 'user', 0)[0]['Password'];

if (password_verify('admin', $hash)) {
    echo 'Le mot de passe est valide !';
    echo $hash;
} else {
    echo 'Le mot de passe est invalide.';
}