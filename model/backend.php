<?php

function updateCapteurDispo($system) {
    $db = dbConnect();
    $update = $db->prepare("UPDATE table_capteur_dispo
        SET nom = :title, description = :description, image = :image
        WHERE ID = :id");
    $update->execute($system);
}

function addCapteurDispo($system) {
    $db = dbConnect();
    $add = $db->prepare("INSERT INTO table_capteur_dispo(nom, description, image)
    VALUES (:title, :description, :image)");
    $add->execute(array_slice($system, 1));
}

function deleteCapteurDispo($system) {
    $db = dbConnect();
    $delete = $db->prepare("DELETE FROM table_capteur_dispo WHERE ID = ?");
    $delete->execute(array($system['ID']));
}
