<?php
require_once("model/frontend.php");
require_once("model/backend.php");

function saveSystems($systemArray) {
    $dbData = getCapteurDispo();

    foreach ($systemArray as $system) {
        if ($system['id']) {
            updateCapteurDispo($system);
        }
        else {
            addCapteurDispo($system);
        }
    }

    foreach ($dbData as $index => $systemFromDB) {
        $isDeleted = true;
        foreach ($systemArray as $key => $systemFromPage) {
            if ($systemFromPage['id'] == $systemFromDB['ID']) {
                $isDeleted = false;
            }
        }
        if ($isDeleted) {
            deleteCapteurDispo($systemFromDB);
        }
    }
}

function getUserList() {
    $userArray = getUserArray();

    foreach ($userArray as &$user) {
        $user['house'] = getHouse($user['ID']);
    }

    return $userArray;
}
