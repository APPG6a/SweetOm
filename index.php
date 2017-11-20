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
    else if (isset($_GET['action']) && $_GET['action'] == 'logout')
    {
        logout();
    }
    else
    {
        header("Location: View/accueil_utilisateur.php");
    }
}
catch (Exception $e)
{
    echo "Message : ".$e->getMessage();
}
