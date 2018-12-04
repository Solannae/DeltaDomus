<?php
require_once('model/frontend.php');

function redirect($page)
{
    require('view/frontend/'.$page);
}

function login($id, $password, $isChecked)
{
    //Connecter l'utilisateur
    $idFound = verifyUser($id, $password);
    if ($idFound)
    {

        $_SESSION['idUser'] = $idFound['id'];
        $_SESSION['idHouse'] = getHouse($idFound['id']);

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
    //Déconnecter l'utilisateur
    session_destroy();
    setcookie('remember', false, time()+3600*24*30);
}

function createUser()
{
    //Creation d'un utilisateur puis connection au site
    if (!verifyUser($_POST['email'], $_POST['password']))
    {
        addUser($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['password']);
        login($_POST['email'], $_POST['password'], false);
    }
    else {
        throw new Exception("User already existing");
    }
}

function profil()
{
    //Appel des infos utilisateur pour la page profil
    $user = getInfoUser($_SESSION['idUser']);
    $nomUser = $user['nom'];
    $prenomUser = $user['prenom'];
    $emailUser = $user['email'];
    require('view/frontend/profil.php');
}

function infosCapteurs()
{
    //Appel des infos pour la page profil
    if (isset($_SESSION['idHouse'])) {
        $pieceArray = getPieces($_SESSION['idHouse']);
        foreach ($pieceArray as &$piece) {
            $piece[] = getCapteur($piece['id']);
        }

        return $pieceArray;
    }
    else {
        return array();
    }
}
