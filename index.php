<?php
session_start();

require_once ("Controler/frontend.php");

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
    else if (isset($_GET['logout']))
    {
        logout();
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
