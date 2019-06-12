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

function verifyMail($mail)
{
    //Vérification de l'utilisateur dans la base de donnée
    $db = dbConnect();
    $query = $db->prepare("SELECT ID FROM table_utilisateur WHERE email = ?");
    $query->execute(array($mail));
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
    if (verifyMail($email)) {
        return;
    }
	$hash = hash("sha256", $password);
    $adding = $db->prepare("INSERT INTO table_utilisateur(nom, prenom, email, password) VALUES(:nom, :prenom, :email, :password)");
    $adding->execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'password' => $hash
    ));

    $max = $db->query("SELECT MAX(ID) FROM table_utilisateur");
    $id = $max->fetch()['MAX(ID)'];
    $max->closeCursor();
    return $id;
}

function addCapteur($idPiece, $type) {
    //Ajout d'un capteur dans la base de donnée
    $db = dbConnect();
    $adding = $db->prepare("INSERT INTO table_capteurs(id_piece, id_type) VALUES(?, ?)");
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

function addHouse($idHolder, $name, $adress, $area) {
    $db = dbConnect();
    $adding = $db->prepare("INSERT INTO table_appartements(id_proprietaire, nom, adresse, superficie) VALUES(?, ?, ?, ?)");
    $adding->execute(array($idHolder, $name, $adress, $area));

    $max = $db->query("SELECT MAX(ID) FROM table_appartements");
    $id = $max->fetch()['MAX(ID)'];
    $max->closeCursor();
    return $id;
}

function addRoom($idHouse, $roomName, $roomSize) {
    $db = dbConnect();
    $adding = $db->prepare("INSERT INTO table_pieces(id_appartement, nom, taille) VALUES(?, ?, ?)");
    $adding->execute(array($idHouse, $roomName, $roomSize));

    $max = $db->query("SELECT MAX(ID) FROM table_pieces");
    $id = $max->fetch()['MAX(ID)'];
    $max->closeCursor();
    return $id;
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
		if ($donnees['id_type'] == '1') {	
			$query2 = $db->prepare("SELECT valeur FROM table_trames WHERE type_capteur = 3 ORDER BY date_heure DESC LIMIT 1");
			$query2->execute();
			$data2 = $query2->fetch();
			$capteur[] = array(
				'id' => $donnees['ID'],
				'type' => $donnees['id_type'],
				'donnee' => hexdec($data2['valeur'])
			);
		}
		else if ($donnees['id_type'] == '2') {	
			$query2 = $db->prepare("SELECT valeur FROM table_trames WHERE type_capteur = 2 ORDER BY date_heure DESC LIMIT 1");
			$query2->execute();
			$data2 = $query2->fetch();
			$capteur[] = array(
				'id' => $donnees['ID'],
				'type' => $donnees['id_type'],
				'donnee' => hexdec($data2['valeur'])
			);
		}
		else {
			$capteur[] = array(
				'id' => $donnees['ID'],
				'type' => $donnees['id_type'],
				'donnee' => $donnees['donnee']
			);
		}
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

function getThreads() {
	$db = dbConnect();
	$query = $db->prepare("SELECT table_sujet_forum.ID, table_utilisateur.email, table_sujet_forum.date_creation, table_sujet_forum.nom FROM table_sujet_forum JOIN table_utilisateur ON table_utilisateur.ID = auteur ORDER BY table_sujet_forum.date_creation DESC");
	$query->execute();

	$threads = [];
	while ($donnees = $query->fetch()) {
		$threads[] = array(
			'id' => $donnees['ID'],
			'email' => $donnees['email'],
			'date_creation' => $donnees['date_creation'],
			'nom' => $donnees['nom']
		);
	}

	return $threads;
}

function getSubject($id) {
	$db = dbConnect();
	$query = $db->prepare("SELECT nom FROM table_sujet_forum WHERE ID = :id");
	$query->execute(array('id' => $id));
	$info = $query->fetch();
	return $info;
}

function getMessages($id) {
	$db = dbConnect();
	$query = $db->prepare("SELECT table_utilisateur.email, table_message_forum.date_creation, table_message_forum.contenu FROM table_message_forum JOIN table_utilisateur ON table_utilisateur.ID = auteur WHERE table_message_forum.id_sujet = :id ORDER BY table_message_forum.date_creation ASC");
	$query->execute(array('id' => $id));

	$messages = [];
	while ($donnees = $query->fetch()) {
		$messages[] = array(
			'email' => $donnees['email'],
			'date_creation' => $donnees['date_creation'],
			'contenu' => $donnees['contenu']
		);
	}

	return $messages;
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
    $update->execute(array(
      'password' => $password,
      'email' => $email
    ));
}

function updatePasswordFromId($id, $password) {
  $db = dbConnect();
  $update = $db->prepare("UPDATE table_utilisateur SET password = :password WHERE ID = :id");
  $update->execute(array(
    'password' => $password,
    'id' => $id
  ));
}

function verifyUserFromId($id, $password) {
  $db = dbConnect();
  $query = $db->prepare("SELECT ID FROM table_utilisateur WHERE ID = ? AND password = ?");
  $query->execute(array($id, hash("sha256", $password)));
  return $query->fetch();
}

function addSubjectToForum($title, $text, $username) {
	$db = dbConnect();
	$subject = $db->prepare("INSERT INTO table_sujet_forum(auteur, date_creation, nom) VALUES (?, ?, ?);");
	$date = date_create('now')->format('Y-m-d H:i:s');
	$subject->execute(array($username, $date, $title));

	$id = $db->lastInsertId();
	$subject->closeCursor();

	addMessageToForum($id, $username, $text);
}

function addMessageToForum($subject, $username, $text) {
	$db = dbConnect();
	$message = $db->prepare("INSERT INTO table_message_forum(id_sujet, auteur, date_creation, date_modification, contenu) VALUES (?, ?, ?, ?, ?)");
	$date = date_create('now')->format('Y-m-d H:i:s');
	$message->execute(array($subject, $username, $date, $date, $text));
}

function getConsumptionBack($idUser) {
	$db = dbConnect();
	$query = $db->prepare("SELECT id_appartement, conso_electricite, conso_gaz, date FROM table_consommation JOIN table_appartements ON table_appartements.ID = id_appartement JOIN table_utilisateur ON utilisateur.id = table_appartements.id_proprietaire WHERE table_utilisateur.ID = :id");
	$query->execute(array('id' => $idUser));

	$overall = [];
	while ($donnees = $query->fetch()) {
        $overall[] = array('id_appartement' => $donnees['id_appartement'], 'conso_electricite' => $donnees['conso_electricite'], 'conso_gaz' => $donnees['conso_gaz'], 'date' => $donnees['date']);
    }

	return $overall;
}

function getConsumptionAdminBack() {
	$db = dbConnect();
	#$query = $db->prepare("SELECT id_appartement, conso_electricite, conso_gaz, date FROM table_consommation WHERE YEAR(date) > YEAR(NOW()) - 2 ORDER BY id_appartement ASC");
	$query = $db->prepare("SELECT id_appartement, AVG(conso_electricite) as conso_electricite, AVG(conso_gaz) as conso_gaz, date FROM table_consommation WHERE YEAR(date) > YEAR(NOW()) - 2  GROUP BY id_appartement ASC");
	$query->execute();

	$data = [];

	while($donnees = $query->fetch()) {
		$data[] = array('id_appartement' => $donnees['id_appartement'], 'conso_electricite' => $donnees['conso_electricite'], 'conso_gaz' => $donnees['conso_gaz'], 'date' => $donnees['date']);
	}

	return $data;
}

function getPackets() {
	$db = dbConnect();

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=003E");
	curl_setopt($ch, CURLOPT_HEADER, FALSE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	$data = curl_exec($ch);
	curl_close($ch);

	$data_tab = str_split($data, 33);

	$query = $db->prepare("SELECT COUNT(*) AS count FROM table_trames;");
	$query->execute();
	$table_size = $query->fetch()['count'];
	
	$size = count($data_tab);

	for($i = $table_size; $i < $size; $i++) {
		list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) = sscanf($data_tab[$i],"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
		$message = $db->prepare("INSERT INTO table_trames(type_trame, groupe, type_requete, type_capteur, numero_capteur, valeur, numero_trame, date_heure) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
		$date = new DateTime();
		$date->setDate($year, $month, $day);
		$date->setTime($hour, $min, $sec);
		$date = $date->format('Y-m-d H:i:s');
		$message->execute(array($t, $o, $r, $c, $n, $v, $a, $date));
	}
}