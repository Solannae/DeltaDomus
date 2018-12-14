<?php
require_once('controller/frontend.php');

session_start();

try
{
    if (isset($_SESSION['idUser'])) //Condition connecté au site
    {
        if (isset($_GET['action']))
        {
            if ($_GET['action'] == 'redirect')//Si on demande seulement a rediriger vers une page
            {
                if (isset($_GET['page']))
                {
                    if ($_GET['page'] == "profil.php")
                    {
                        profil();
                    }
                    elseif ($_GET['page'] == "capteurs.php") {
                        $pieceArray = infosCapteurs();
                        require('view/frontend/capteurs.php');
                    }
                    elseif ($_GET['page'] == "gestion-droits.php") {
                        if ($_SESSION['droitAdmin']) {
                            $roles = infosDroits();
                            require('view/frontend/gestion-droits.php');
                        }
                    }
                    elseif ($_GET['page'] == "ajout-capteur.php") {
                        if (isset($_SESSION['idHouse'])) {
                            $pieceArray = getPieces($_SESSION['idHouse']);
                        }
                        else {
                            $pieceArray[] = "";
                        }
                        $capteurDispo = getCapteurDispo();
                        require('view/frontend/ajout-capteur.php');
                    }
                    elseif ($_GET['page'] == "houses.php") {
                        $houseArray = getHouse($_SESSION['idUser']);
                        require('view/frontend/houses.php');
                    }
                    elseif ($_GET['page'] == 'accueil.php') {
                        $capteurDispo = getCapteurDispo();
                        require('view/frontend/accueil.php');
                    }
                    else
                    {
                        require('view/frontend/'.$_GET['page']);
                    }

                }
                else
                {
                    $capteurDispo = getCapteurDispo();
                    require('view/frontend/accueil.php');
                }
            }

            elseif ($_GET['action'] == 'disconnect')//Si déconnexion
            {
                disconnect();
                header("Refresh:0; url=index.php");
            }
            elseif ($_GET['action'] == 'saveDroits') {
                saveDroits();
                header("Refresh:0; url=index.php?action=redirect&page=gestion-droits.php");
            }
            elseif ($_GET['action'] == 'saveUser') {
                if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email'])) {
                    saveUser();
                    header("Refresh:0; url=index.php?action=redirect&page=profil.php&updated");
                }
            }
            elseif ($_GET['action'] == 'saveImage') {
                if (isset($_FILES['file']) AND $_FILES['file']['error'] == 0)
                {
                    if ($_FILES['file']['size'] <= 1000000)
                    {
                        echo "good size";
                        $infosfichier = pathinfo($_FILES['file']['name']);
                        $extension_upload = $infosfichier['extension'];
                        $extensions_autorisees = array('jpg', 'jpeg', 'png');
                        if (in_array(strtolower($extension_upload), $extensions_autorisees))
                        {
                            saveImage();
                            header("Refresh:0; url=index.php?action=redirect&page=profil.php");
                        }
                        else {
                            echo "Choisissez une image";
                        }
                    }
                    else {
                        echo "Fichier trop gros";
                    }
                }
                else {
                    throw new Exception("errorFile");
                }
            }
            elseif ($_GET['action'] == 'addCapteur') {
                createCapteur();
                header("Refresh:0; url=index.php?action=redirect&page=ajout-capteur.php&capteurAjoute");
            }
            elseif ($_GET['action'] == 'changeHouse') {
                if (isset($_GET['house'])) {
                    $_SESSION['idHouse'] = $_GET['house'];
                }
                header("Refresh:0; url=index.php?action=redirect&page=capteurs.php");
            }

        }
        else
        {
            $capteurDispo = getCapteurDispo();
            require('view/frontend/accueil.php');
        }
    }
    else
    {
        if (isset($_GET['action']))
        {
            if ($_GET['action'] == 'login' AND isset($_POST['uname']) AND isset($_POST['psw']))//Connecter l'utilisateur depuis la page de connexion
            {
                login(htmlspecialchars($_POST['uname']), htmlspecialchars($_POST['psw']), isset($_POST['remember']));
                $capteurDispo = getCapteurDispo();
                require('view/frontend/accueil.php');
            }

            elseif ($_GET['action'] == 'signin' AND isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['email']) AND isset($_POST['password']))//Créer l'utilisateur
            {
                createUser();
            }

            elseif ($_GET['action'] == 'redirect' AND isset($_GET['page']) AND ($_GET['page'] == 'create-account.php' OR $_GET['page'] == 'contact.php' OR $_GET['page'] == 'ajout-total.php' OR $_GET['page'] == 'faq.php'))//Pages accessibles sans se connecter
            {
                require('view/frontend/'.$_GET['page']);
            }

            elseif ($_GET['action'] == 'redirect' AND isset($_GET['page']) AND $_GET['page'] == 'accueil.php') {
                $capteurDispo = getCapteurDispo();
                require('view/frontend/accueil.php');
            }

            elseif ($_GET['action'] == 'addTotal') {
                createTotal();
                header("Refresh:0; url=index.php?action=redirect&page=accueil.php");
            }

            else
            {
                if (isset($_COOKIE['remember']) AND $_COOKIE['remember'] == true AND isset($_COOKIE['idUser']) AND isset($_COOKIE['pswUser'])) //Si "Se souvenir de moi" est coché, se connecter automatiquement
                {
                    login($_COOKIE['idUser'], $_COOKIE['pswUser'], true);
                }
                else
                {
                    require('view/frontend/login.php');
                }
            }
        }
        else
        {
            $capteurDispo = getCapteurDispo();
            require('view/frontend/accueil.php');
        }
    }
}
catch(Exception $e)
{
    echo 'Erreur : '.$e->getMessage();
}
