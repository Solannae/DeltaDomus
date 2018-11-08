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
            setcookie('remember', true, time()+3600*24*30);
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
    setcookie('remember', false, time()+3600*24*30);
}

function createUser()
{
    if (!verifyUser($_POST['email'], $_POST['password']))
    {
        addUser($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['password']);
        login($_POST['email'], $_POST['password'], false);
    }
    else {
        throw new Exception("User already existing");
    }
}
