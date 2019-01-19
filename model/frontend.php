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

function isAdmin($idUser) {
    $db = dbConnect();
    $query = $db->prepare("SELECT admin FROM table_utilisateur WHERE ID = ?");
    $query->execute(array($idUser));
    $id = $query->fetch();
    $query->closeCursor();

    return $id[0];
}

function addUser($nom, $prenom, $email, $password) {
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

function addCapteur($idPiece, $type) {
    //Ajout d'un capteur dans la base de donnée
    $db = dbConnect();
    $adding = $db->prepare("INSERT INTO table_capteurs(id_piece, type) VALUES(?, ?)");
    $adding->execute(array($idPiece, $type));

    $max = $db->query("SELECT MAX(ID) FROM table_capteurs");
    $id = $max->fetch()['MAX(ID)'];
    $max->closeCursor();

    return $id;
}

function addDroit($idRole, $idCapteur, $droit) {
    $db = dbConnect();
    $adding = $db->prepare("INSERT INTO table_droit(id_role, id_capteur, droit) VALUES(?, ?, ?)");
    $adding->execute(array($idRole, $idCapteur, $droit));
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
    $query = $db->prepare("SELECT table_appartements.ID, nom, adresse, superficie FROM table_appartements JOIN tr_role_utilisateur_maison ON table_appartements.ID = id_maison WHERE id_utilisateur = :id");
    $query->execute(array('id' => $id));
    while ($info = $query->fetch()) {
        $infoArray[] = $info;
    }
    $query->closeCursor();

    //Return infos des maison
    if (isset($infoArray)) {
        return $infoArray;
    }
    else {
        return [];
    }
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
    if (isset($pieces)) {
        return $pieces;
    }
    else {
        return [];
    }
}

function getCapteur($idPiece) {
    $db = dbConnect();
    $query = $db->prepare("SELECT ID, id_type, donnee FROM table_capteurs WHERE id_piece = :id");
    $query->execute(array('id' => $idPiece));
    $capteur = [];
    while ($donnees = $query->fetch()) {
        $capteur[] = array(
            'id' => $donnees['ID'],
            'type' => $donnees['id_type'],
            'donnee' => $donnees['donnee']
        );
    }
    echo "<pre>";
    print_r($capteur);
    echo "</pre>";

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
    $query = $db->prepare("SELECT ID, nom FROM table_roles JOIN tr_role_utilisateur_maison ON ID = id_role WHERE id_utilisateur = :idUser AND id_maison = :idHouse");
    $query->execute(array('idUser' => $idUser, 'idHouse' => $idHouse));
    $info = $query->fetch();
    $query->closeCursor();

    //Return ID et nom du role de l'utilisateur
    return $info;
}

function getRolesHouse($idHouse) {
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
    if (isset($roles)) {
        return $roles;
    }
    else {
        return [];
    }
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

function getUsersFromRole($role) {
    $db = dbConnect();
    $query = $db->prepare("SELECT id_utilisateur, nom, prenom FROM tr_role_utilisateur_maison JOIN table_utilisateur ON table_utilisateur.ID = id_utilisateur WHERE id_role = :role");
    $query->execute(array('role' => $role));

    while ($donnees = $query->fetch()) {
        $users[] = array('id' => $donnees['id_utilisateur'], 'nom' => $donnees['nom'], 'prenom' => $donnees['prenom']);
    }
    $query->closeCursor();

    return $users;
}

function getCapteurDispo() {
    $db = dbConnect();
    $query = $db->query("SELECT * FROM table_capteur_dispo");
    while($donnees = $query->fetch()) {
        $capteurs[] = $donnees;
    }

    return $capteurs;
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

function setUser($idUser, $nom, $prenom, $email) {
    $db = dbConnect();
    $query = $db->prepare("UPDATE table_utilisateur
        SET nom = :nom,
        prenom = :prenom,
        email = :email
        WHERE ID = :idUser");
    $query->execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'idUser' =>$idUser
    ));
}

function setRole($idHouse) {
}

function setProfileImage($idUser) {
    $db = dbConnect();
    $query = $db->prepare("UPDATE table_utilisateur SET image_profil = :image WHERE ID = :idUser");
    $query->execute(array('image' => $idUser.".jpg", 'idUser' => $idUser));
}

function updatePassword($email, $password) {
    $db = dbConnect();
    $update = $db->prepare("UPDATE table_utilisateur SET password = :password WHERE email = :email");
}
