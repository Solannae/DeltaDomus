<?php
require_once('model/frontend.php');

function redirect($page)
{
    require('view/frontend/'.$page);
}

function login($id, $password, $isChecked)
{
    $idFound = verifyUser($id, $password);
    if ($idFound)
    {
        $_SESSION['idUser'] = $idFound['id'];

        if ($isChecked)
        {
            setcookie('idUser', $id, time()+3600*24*30, null, null, false, true);
            setcookie('pswUser', $password, time()+3600*24*30, null, null, false, true);
            setcookie('remember', true, time()+3600*24*30, null, null, false, true);
        }

        require('view/frontend/accueil.php');
    }
    else
    {
        throw new Exception("No user found");
    }
}

function disconnect()
{
    session_destroy();
    setcookie('remember', false, time()+3600*24*30, null, null, false, true);
}

function recordUser()
{

}
