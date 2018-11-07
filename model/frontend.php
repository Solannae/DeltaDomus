<?php

function verifyUser($idUser, $password)
{
    $db = dbConnect();
    $query = $db->prepare("SELECT id FROM table_utilisateur WHERE email = ? AND password = ?");
    $query->execute(array($idUser, $password));
    $id = $query->fetch();
    $query->closeCursor();

    return $id;
}

function dbConnect()
{
    $db = new PDO('mysql:host=localhost;dbname=delta_domus;charset=utf8', 'root', '');
    return $db;
}
