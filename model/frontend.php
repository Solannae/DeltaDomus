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
    $query = $db->prepare("SELECT ID FROM table_utilisateur WHERE email = ? AND password = ?");
	$hash = hash("sha256", $password);
    $query->execute(array($idUser, $hash));
    $id = $query->fetch();
    $query->closeCursor();

    return $id;
}

function addUser($nom, $prenom, $email, $password)
{
    //Ajout d'un utilisateur dans la base de donnée
    $db = dbConnect();
	$hash = hash("sha256", $password);
    $adding = $db->prepare("INSERT INTO table_utilisateur(nom, prenom, email, password) VALUES(:nom, :prenom, :email, :password)");
    $adding->execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'password' => $hash
    ));
}

function getInfoUser($idUser)
{
    //Récupère les infos d'un utilisateur
    $db = dbConnect();
    $query = $db->prepare("SELECT ID, nom, prenom, email, image_profil FROM table_utilisateur WHERE ID = ?");
    $query->execute(array($idUser));
    $info = $query->fetch();
    $query->closeCursor();

    //Return ID, nom, prenom, email,image_profil de l'utilisateur
    return $info;
}

function getHouse($id)
{
    $db = dbConnect();
    $query = $db->prepare("SELECT table_appartements.ID FROM table_appartements JOIN tr_role_utilisateur_maison ON table_appartements.ID = id_maison WHERE id_utilisateur = :id");
    $query->execute(array('id' => $id));
    $info = $query->fetch();
    $query->closeCursor();

    //Return ID de la maison
    return $info[0];
}

function getPieces($idHouse) {
    $db = dbConnect();
    $query = $db->prepare("SELECT ID, nom FROM table_pieces WHERE id_appartement = :id");
    $query->execute(array('id' => $idHouse));

    while ($donnees = $query->fetch()) {
        $pieces[] = array(
            'id' => $donnees['ID'],
            'nom' => $donnees['nom']
        );
    }

    /*Return
    pieces {
        (int) {
            ['id']
            ['nom']
        }
    }*/
    return $pieces;
}

function getCapteur($idPiece) {
    $db = dbConnect();
    $query = $db->prepare("SELECT ID, type, donnee FROM table_capteurs WHERE id_piece = :id");
    $query->execute(array('id' => $idPiece));

    while ($donnees = $query->fetch()) {
        $capteur[] = array(
            'id' => $donnees['ID'],
            'type' => $donnees['type'],
            'donnee' => $donnees['donnee']
        );
    }

    /*Return
    capteur {
        (int) {
            ['id']
            ['type']
            ['donnee']
        }
    }*/
    return $capteur;
}

function getRole($idUser, $idHouse) {
    $db = dbConnect();
    $query = $db->prepare("SELECT nom FROM table_roles JOIN tr_role_utilisateur_maison ON ID = id_role WHERE id_utilisateur = :idUser AND id_maison = :idHouse");
    $query->execute(array('idUser' => $idUser, 'idHouse' => $idHouse));
    $info = $query->fetch();
    $query->closeCursor();

    //Return nom du role de l'utilisateur
    return $info[0];
}

function getUsers($idHouse) {
    $db = dbConnect();
    $query = $db->prepare("SELECT DISTINCT ID, nom FROM table_roles JOIN tr_role_utilisateur_maison ON id_role = table_roles.ID WHERE id_maison = :id");
    $query->execute(array('id' => $idHouse));

    while ($donnees = $query->fetch()) {
        $roles[] = array('id' => $donnees['ID'], 'nom' => $donnees['nom']);
    }
    $query->closeCursor();

    /*Return roles {
        (int) {
            ['id']
            ['nom']
        }
    }*/
    return $roles;
}

function getDroit($idRole, $idCapteur) {
    $db = dbConnect();
    $query = $db->prepare("SELECT droit FROM table_droit WHERE id_capteur = :capteur AND id_role = :role");
    $query->execute(array(
        'capteur' => $idCapteur,
        'role' => $idRole
    ));
    $droit = $query->fetch();
    $query->closeCursor();

    //Return la valeur de droit pour un role et un capteur
    return $droit['droit'];
}

function setDroit($idRole, $idCapteur, $droit) {
    if ($droit == "") {
        $droit = 0;
    }
    $db = dbConnect();
    $query = $db->prepare("UPDATE table_droit SET droit = :droit WHERE id_role = :role AND id_capteur = :capteur");
    $query->execute(array(
        'droit' => $droit,
        'role' => $idRole,
        'capteur' => $idCapteur
    ));
}
