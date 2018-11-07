<?php
require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'redirect') {
            if (isset($_GET['page'])) {
                redirect($_GET['page']);
            }
            else {
                redirect('accueil.php');
            }
        }
    }
    else {
        redirect('accueil.php');
    }
}
catch(Exception $e) {
    echo 'Erreur : '.$e->getMessage();
}
