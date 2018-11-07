<?php
require_once('model/frontend.php');

function redirect($page)
{
    require('view/frontend/'.$page);
}

function login()
{
    $idFound = verifyUser($_POST['uname'], $_POST['psw']);
    if ($idFound)
    {
        $_SESSION['idUser'] = $idFound['id'];
        require('view/frontend/accueil.php');
    }
    else
    {
        throw new Exception("No user found");
    }
}
