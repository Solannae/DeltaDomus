<?php
require_once('model/frontend.php');
require_once('vendor/autoload.php');

function login($id, $password, $isChecked)
{
    $connected = false;
    //Connecter l'utilisateur
    $idFound = verifyUser($id, $password);
    if ($idFound)
    {
        $_SESSION['idUser'] = $idFound['ID'];
        $_SESSION['adminSite'] = isAdmin($idFound['ID']);
        if (isset(getHouse($idFound['ID'])[0]['ID'])) {
            $_SESSION['idHouse'] = getHouse($idFound['ID'])[0]['ID'];
            $_SESSION['droitAdmin'] = getDroit(getRole($idFound['ID'], $_SESSION['idHouse'])['ID'], 0);
        }

        if ($isChecked)
        {
            setcookie('idUser', $id, time()+3600*24*30, null, null, false, true);
            setcookie('pswUser', $password, time()+3600*24*30, null, null, false, true);
            setcookie('remember', true, time()+3600*24*30);
        }
        $connected = true;
    }
    else
    {
        setcookie('remember', false, time()+3600*24*30);
		header("Refresh:0; url=index.php?action=redirect&page=login.php&updated&failed_login=true");
    }
    return $connected;
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
    if (!verifyUser(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password'])))
    {
        addUser(htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']));
    }
    else {
        throw new Exception("User already existing");
    }
}

function createCapteur() {
    $idCapteur = addCapteur($_POST['roomSelect'], $_POST['sensorTypeSelect']);
    $roles = getRolesHouse($_SESSION['idHouse']);
    foreach ($roles as $role) {
        addDroit($role['id'], $idCapteur, 1);
    }
}

function createTotal() {
    $elt_utilisateur = explode(",", $_POST['input_utilisateur']);
    $i = 1;
    $temp = array();
    foreach ($elt_utilisateur as $elt) {
        $temp[] = $elt;
        $i ++;
        if ($i % 5 == 0) {
            addUser($temp[0], $temp[1], $temp[2], $temp[3]);
            $i = 1;
            $temp = array();
        }
        // echo nl2br ("\n");
    }
    $elt_capteur = explode(",", $_POST['input_capteur']);
    $i = 1;
    $temp = array();
    foreach ($elt_capteur as $elt) {
        $temp[] = $elt;
        $i ++;
        if ($i % 3 == 0) {
            addCapteur($temp[1], $temp[0]);
            $i = 1;
            $temp = array();
        }
        // echo nl2br ("\n");
    }
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
        $role = getRole($_SESSION['idUser'], $_SESSION['idHouse'])['nom'];
    }
    else {
        $role = "Undefined";
    }
    require('view/frontend/profil.php');
}

function infosCapteurs()
{
	getPackets();

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
        }*/
        return $pieceArray;
    }
    else {
        return array();
    }
}

function infosDroits() {
    //Appel infos sur les droits
    if (isset($_SESSION['idHouse'])) {
        $roles = getRolesHouse($_SESSION['idHouse']);
        foreach ($roles as &$role) {
            $role['droitAdmin'] = getDroit($role['id'], 0);
            $role['users'] = getUsersFromRole($role['id']);
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
                ['droitAdmin']
                ['users'] {
                    (int) {
                        ['id']
                        ['nom']
                        ['prenom']
                        ['email']
                    }
                }
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

function infosHouses() {
    $houseArray = getHouse($_SESSION['idUser']);

}

function saveDroits() {
    $previous = infosDroits();

    foreach ($previous as $role) {
        if (isset($_POST[$role['id'].'_0']) != $role['droitAdmin']) { //test si droits modifiés
            setDroit($role['id'], 0, isset($_POST[$role['id'].'_0']));
        }
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
    setUser($_SESSION['idUser'], htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['email']));
}

function saveImage() {
    if ($_FILES['file']['size'] <= 1000000)
    {
        $infosfichier = pathinfo($_FILES['file']['name']);
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('jpg', 'jpeg', 'png');
        if (in_array(strtolower($extension_upload), $extensions_autorisees))
        {
            move_uploaded_file($_FILES['file']['tmp_name'], "public/assets/imageProfil/".$_SESSION['idUser'].".jpg");
            setProfileImage($_SESSION['idUser']);
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

function resetPassword($email) {
    $newPassword = generatePassword(10);
    updatePassword($email, hash("sha256", $newPassword));
    sendPassword($email, $newPassword);
}

function generatePassword($length) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = '';
    for ($i=0; $i < $length; $i++) {
        $password .= $chars[rand(0, strlen($chars)-1)];
    }
    return $password;
}

function sendPassword($email, $password) {
    $body = 'Cliquez sur ce lien : <a href="deltadomus/index.php">deltadomus/index.php</a> </br>Connectez vous avec le mot de passe suivant : '.$password;

    // Create the Transport
    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465,'ssl'))
    ->setUsername('DeltaDomusAPP@gmail.com')
    ->setPassword('deltadomuspassword1');


    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

    // Create a message
    $message = (new Swift_Message('Mot de passe oublié'))
      ->setFrom(['DeltaDomusAPP@gmail.com' => 'DeltaDomus'])
      ->setTo([$email])
      ->setBody($body, 'text/html')
      ;

    // Send the message
    $result = $mailer->send($message);
}

function verifyPassword($id, $oldPassword, $newPassword) {
  if (verifyUserFromId($id, $oldPassword)) {
    updatePasswordFromId($id, hash("sha256", $newPassword));
    header("Refresh:0; url=index.php?action=redirect&page=profil.php&updated");
  }
  else {
    header("Refresh:0; url=index.php?action=redirect&page=profil.php");
  }
}
function sendMail($nom, $prenom, $email, $contenu) {
  // Create the Transport
  $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465,'ssl'))
  ->setUsername('DeltaDomusAPP@gmail.com')
  ->setPassword('deltadomuspassword1');


  // Create the Mailer using your created Transport
  $mailer = new Swift_Mailer($transport);

  // Create a message
  $message = (new Swift_Message('Nouveau message'))
    ->setFrom([$email => $nom." ".$prenom])
    ->setTo(["DeltaDomusAPP@gmail.com"])
    ->setBody($contenu, 'text/html')
    ;

  // Send the message
  $result = $mailer->send($message);
}

function addMessageToThread() {
	$subject = $_GET['id'];
	if (isset($_SESSION['idUser'])) {
		$username = $_SESSION['idUser'];
	}
	else {
		$username = "Invite";
	}
	$text = $_POST['subject'];
	addMessageToForum($subject, $username, $text);
}

function addToForum() {
	$title = $_POST['title'];
	$text = $_POST['subject'];
	if (isset($_SESSION['idUser'])) {
		$username = $_SESSION['idUser'];
	}
	else {
		$username = "Invite";
	}
	addSubjectToForum($title, $text, $username);
}

function getConsumption($idUser) {
	$data = getConsumptionBack($idUser);
	return $data;
}

function getConsumptionAdmin() {
	$data = getConsumptionAdminBack();
	return $data;
}