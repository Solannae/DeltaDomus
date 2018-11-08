<?php
require_once('controller/frontend.php');

session_start();

try
{
    if (isset($_SESSION['idUser']))
    {
        if (isset($_GET['action']))
        {

            if ($_GET['action'] == 'redirect')
            {
                if (isset($_GET['page']))
                {
                    redirect($_GET['page']);
                }
                else
                {
                    redirect('accueil.php');
                }
            }

            elseif ($_GET['action'] == 'disconnect')
            {
                disconnect();
                require('index.php');
            }

        }
        else
        {
            redirect('accueil.php');
        }
    }
    else
    {
        if (isset($_GET['action']))
        {
            if ($_GET['action'] == 'login' AND isset($_POST['uname']) AND isset($_POST['psw']))
            {
                login($_POST['uname'], $_POST['psw'], isset($_POST['remember']));
            }
            elseif ($_GET['action'] == 'redirect' AND isset($_GET['page']) AND $_GET['page'] == 'accueil.php')
            {
                redirect('accueil.php');
            }
            else
            {
                if (isset($_COOKIE['remember']) AND $_COOKIE['remember'] == true AND isset($_COOKIE['idUser']) AND isset($_COOKIE['pswUser']))
                {
                    login($_COOKIE['idUser'], $_COOKIE['pswUser'], false);
                }
                else
                {
                    redirect('login.php');
                }
            }
        }

        else
        {
            redirect('accueil.php');
        }
    }
}
catch(Exception $e)
{
    echo 'Erreur : '.$e->getMessage();
}
