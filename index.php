<?php

require_once("./Controller/frontend.php");
require_once("./Controller/crudController.php");

try {
    if (isset($_SESSION['connected']) && $_SESSION['connected'] === true) {
        if (isset($_GET['action'])) {
            if ($_GET['action'] == "dashboard") {
                dashboard();
            } else if ($_GET['action'] == 'logout') {
                logout();
            } else if ($_GET['action'] == 'create') {

            } else if ($_GET['action'] == 'read') {

            } else if ($_GET['action'] == 'update') {

            } else if ($_GET['action'] == 'delete') {

            }
        } else {
            dashboard();
        }
    } else if (isset($_GET['action']) && $_GET['action'] == 'connectUser') {
        if (isset($_POST['login']) && isset($_POST['password'])) {
            connectUser($_POST['login'], password_hash($_POST['password'], PASSWORD_DEFAULT));
        }
    } else if (isset($_GET['action']) && $_GET['action'] == 'signInUser') {
        if (isset($_POST['IdDomisep'])) {
            signInUser();
        }
    } else if (isset($_GET['action']) && $_GET['action'] == 'addNewUser') {
        if (!empty($_POST['nom']) &&
            !empty($_POST['prenom']) &&
            !empty($_POST['mail']) &&
            !empty($_POST['numPort']) &&
            !empty($_POST['numFix']) &&
            !empty($_POST['adresse']) &&
            !empty($_POST['cp']) &&
            !empty($_POST['ville']) &&
            !empty($_POST['pays']) &&
            !empty($_SESSION['ID'])) {
            createUser($_POST, $_SESSION['ID']);
        }
    } else if (isset($_GET['action']) && $_GET['action'] == 'login') {
        login();
    } else {
        login();
    }
} catch (Exception $e) {
    echo "Message : " . $e->getMessage();
}
