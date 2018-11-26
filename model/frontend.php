<?php

function dbConnect()
{
    //Connexion a la base de donnée
    $db = new PDO('mysql:host=localhost;dbname=delta_domus;charset=utf8', 'root', '');
    return $db;
}


function verifyUser($idUser, $password)
{
    //Vérification de l'utilisateur dans la base de donnée
    $db = dbConnect();
    $query = $db->prepare("SELECT id FROM table_utilisateur WHERE email = ? AND password = ?");
    $query->execute(array($idUser, $password));
    $id = $query->fetch();
    $query->closeCursor();

    return $id;
}

function addUser($nom, $prenom, $email, $password)
{
    //Ajout d'un utilisateur dans la base de donnée
    $db = dbConnect();
    $adding = $db->prepare("INSERT INTO table_utilisateur(nom, prenom, email, password) VALUES(:nom, :prenom, :email, :password)");
    $adding->execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'password' => $password
    ));
}

function getInfoUser($idUser)
{
    //Récupère les infos d'un utilisateur
    $db = dbConnect();
    $query = $db->prepare("SELECT * FROM table_utilisateur WHERE id = ?");
    $query->execute(array($idUser));
    $info = $query->fetch();
    $query->closeCursor();

    return $info;
}
