<?php
session_start();

require_once("Controller/frontend.php");

try
{
    if (isset($_SESSION['connected']) && $_SESSION['connected'] === true)
    {
        if (isset($_GET['action']))
        {
            if ($_GET['action'] == "dashboard")
            {

            }
        }
        else
        {

        }
    }
    else if (isset($_GET['action']) && $_GET['action'] == 'logout')
    {
        logout();
    }
    else if (isset($_GET['action']) && $_GET['action'] == 'login')
    {
        login();
    }
    else
    {
        login();
    }
}
catch (Exception $e)
{
    echo "Message : ".$e->getMessage();
}
