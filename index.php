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

            elseif ($_GET['action'] == 'disconnect') {
                session_destroy();
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
                login();
            }
            elseif ($_GET['action'] == 'redirect' AND isset($_GET['page']) AND $_GET['page'] == 'accueil.php') {
                redirect('accueil.php');
            }
            else
            {
                redirect('login.php');
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
