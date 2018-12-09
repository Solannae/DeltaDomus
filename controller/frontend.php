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

        $_SESSION['idUser'] = $idFound['ID'];
        $_SESSION['idHouse'] = getHouse($idFound['ID']);

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

function createCapteur() {
    addCapteur($_POST['roomSelect'], $_POST['sensorTypeSelect']);
}

function profil()
{
    //Appel des infos utilisateur pour la page profil
    $user = getInfoUser($_SESSION['idUser']);
    $nomUser = $user['nom'];
    $prenomUser = $user['prenom'];
    $emailUser = $user['email'];
    if ($user['image_profil'] == null) {
        $image = 'photo.svg';
    }
    else {
        $image = $user['image_profil'];
    }
    if (isset($_SESSION['idHouse'])) {
        $role = getRole($_SESSION['idUser'], $_SESSION['idHouse']);
    }
    else {
        $role = "Undefined";
    }
    require('view/frontend/profil.php');
}

function infosCapteurs()
{
    //Appel des infos pour la page profil
    if (isset($_SESSION['idHouse'])) {
        $pieceArray = getPieces($_SESSION['idHouse']);
        foreach ($pieceArray as &$piece) {
            $piece['capteurs'] = getCapteur($piece['id']);
        }

        /*Return pieceArray {
            (int) {
                ['id']
                ['nom']
                ['capteurs']{
                    (int) {
                        ['id']
                        ['type']
                        ['donnee']
                    }
                }
            }
        }
        */
        return $pieceArray;
    }
    else {
        return array();
    }
}

function infosDroits() {
    //Appel infos sur les droits
    if (isset($_SESSION['idHouse'])) {
        $roles = getUsers($_SESSION['idHouse']);
        foreach ($roles as &$role) {
            $role['piece'] = getPieces($_SESSION['idHouse']);
            foreach ($role['piece'] as &$piece) {
                $piece['capteurs'] = getCapteur($piece['id']);
                foreach ($piece['capteurs'] as &$capteur) {
                    $capteur['droit'] = getDroit($role['id'], $capteur['id']);
                }
            }
        }

        /*Return roles {
            (int) {
                ['id']
                ['nom']
                ['piece'] {
                    (int) {
                        ['id']
                        ['nom']
                        ['capteurs'] {
                            (int) {
                                ['id']
                                ['type']
                                ['donnee']
                                ['droit']
                            }
                        }
                    }
                }
            }
        }*/
        return $roles;
    }
    else {
        return  array();
    }
}

function saveDroits() {
    $previous = infosDroits();

    foreach ($previous as $role) {
        foreach ($role['piece'] as $piece) {
            foreach ($piece['capteurs'] as $capteur) {
                if (isset($_POST[$role['id'].'_'.$capteur['id']]) != $capteur['droit']) { //test si droits modifiés
                    setDroit($role['id'], $capteur['id'], isset($_POST[$role['id'].'_'.$capteur['id']]));
                }
            }
        }
    }
}

function saveUser() {
    setUser($_SESSION['idUser'], $_POST['nom'], $_POST['prenom'], $_POST['email']);
}
