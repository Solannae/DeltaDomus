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
                    if ($_GET['page'] == "profil.php")
                    {
                        profil();
                    }
                    else
                    {
                        redirect($_GET['page']);
                    }

                }
                else
                {
                    redirect('accueil.php');
                }
            }

            elseif ($_GET['action'] == 'disconnect')
            {
                disconnect();
                redirect('accueil.php');
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

            elseif ($_GET['action'] == 'signin' AND isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['email']) AND isset($_POST['password']))
            {
                    createUser();
            }

            elseif ($_GET['action'] == 'redirect' AND isset($_GET['page']) AND ($_GET['page'] == 'accueil.php' OR $_GET['page'] == 'create-account.php' OR $_GET['page'] == 'contact.php'))
            {
                redirect($_GET['page']);
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
