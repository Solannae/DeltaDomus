<?php
require_once('controller/frontend.php');
require_once('controller/backend.php');
require_once('vendor/autoload.php');

session_start();

try
{
    //Connecté au site
    if (isset($_SESSION['idUser'])) {
        //Partie site administrateur
        if ($_SESSION['adminSite']) {
            if (isset($_GET['action'])) {
                //Redirection vers une page
                if ($_GET['action'] == 'redirect' AND isset($_GET['page'])) {
                    if ($_GET['page'] == 'accueil.php') {
                        $capteurDispo = getCapteurDispo();
                        require('view/backend/accueil.php');
                    }
                }
                //Fin redirection page

                //Fonctions en sortie de page
                elseif ($_GET['action'] == 'disconnect')//Si déconnexion
                {
                    disconnect();
                    header("Refresh:0; url=index.php");
                }

                elseif ($_GET['action'] == 'saveSystems') {
                    saveSystems($_POST['test']);
                }

                else {
                    $capteurDispo = getCapteurDispo();
                    require('view/backend/accueil.php');
                }
            }
            else {
                $capteurDispo = getCapteurDispo();
                require('view/backend/accueil.php');
            }
        }


        //Partie site utilisateur
        else {
            if (isset($_GET['action']))
            {
                //Redirection vers une page
                if ($_GET['action'] == 'redirect' AND isset($_GET['page']))
                {
                        if ($_GET['page'] == "profil.php")
                        {
                            profil();
                        }
                        elseif ($_GET['page'] == "capteurs.php") {
                            $pieceArray = infosCapteurs();
                            echo "<pre>";
                            print_r($pieceArray);
                            echo "</pre>";
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
                        elseif ($_GET['page'] == "ajout-total.php") {
                            $capteurDispo = getCapteurDispo();
                            require('view/frontend/ajout-total.php');
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
                //Fin redirection page


                //Appel de fonctions en sortie de page
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
                        saveImage();
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

                //Page par défaut si problème de lien
                else {
                    $capteurDispo = getCapteurDispo();
                    require('view/frontend/accueil.php');
                }
            }
            else {
                    $capteurDispo = getCapteurDispo();
                    require('view/frontend/accueil.php');
            }
        }
        //Fin partie utilisateur
    }
    //Fin connecté au site


    //Partie utilisateur lambda
    else
    {
        if (isset($_GET['action'])) {
            //Connexion de l'utilisateur depuis la page de connexion
            if ($_GET['action'] == 'login' AND isset($_POST['uname']) AND isset($_POST['psw'])) {
                if (login(htmlspecialchars($_POST['uname']), htmlspecialchars($_POST['psw']), isset($_POST['remember']))) {
                    header("Refresh:0; url=index.php?action=redirect&page=accueil.php");
                }
            }

            //Création de l'utilisateur
            elseif ($_GET['action'] == 'signin' AND isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['email']) AND isset($_POST['password'])) {
                createUser();
                login(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']), false);
                header("Refresh:0; url=index.php?action=redirect&page=accueil.php");
            }

            //Redirection vers une page accessible sans compte
            elseif ($_GET['action'] == 'redirect' AND isset($_GET['page'])) {
                if ($_GET['page'] == 'create-account.php') {
                    require('view/frontend/'.$_GET['page']);
                }
                elseif ($_GET['page'] == 'contact.php') {
                    require('view/frontend/'.$_GET['page']);
                }
                elseif ($_GET['page'] == 'ajout-total.php') {
                    require('view/frontend/'.$_GET['page']);
                }
                elseif ($_GET['page'] == 'faq.php') {
                    require('view/frontend/'.$_GET['page']);
                }
                elseif ($_GET['page'] == 'login.php') {
                    require('view/frontend/'.$_GET['page']);
                }
                elseif ($_GET['page'] == 'accueil.php') {
                    $capteurDispo = getCapteurDispo();
                    require('view/frontend/accueil.php');
                }
                elseif ($_GET['page'] == 'reset-password.php') {
                    require('view/frontend/reset-password.php');
                }
            }

            //Creation d'un utilisateur avec toutes les infos
            elseif ($_GET['action'] == 'addTotal') {
                createTotal();
                header("Refresh:0; url=index.php?action=redirect&page=accueil.php");
            }

            elseif ($_GET['action'] == 'resetPassword' AND isset($_POST['email'])) {
                resetPassword($_POST['email']);
            }

            else {
                //Connexion avec les cookies
                if (isset($_COOKIE['remember']) AND $_COOKIE['remember'] == true AND isset($_COOKIE['idUser']) AND isset($_COOKIE['pswUser']))
                {
                    login($_COOKIE['idUser'], $_COOKIE['pswUser'], true);
                    header("Refresh:0;");
                }
                //Page par défaut si l'utilisateur tente une page avec compte nécessaire
                else
                {
                    require('view/frontend/login.php');
                }
            }
        }

        //Page par défaut si problème de lien
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
